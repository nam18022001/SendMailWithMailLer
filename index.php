<?php 
    $con = mysqli_connect('localhost', 'root', '', 'sendemail');
  $base_url='http://localhost/sendmail/';
  $msg = '';
    if (isset($_REQUEST['username'])) {
        # code...
      $u = stripslashes($_REQUEST['username']);
      $u = mysqli_real_escape_string($con,$u);
      $e = stripslashes($_REQUEST['email']);
      $e = mysqli_real_escape_string($con,$e);
      $p = stripslashes($_REQUEST['password']);
      $p = mysqli_real_escape_string($con,$p);
      $p2 = stripslashes($_REQUEST['password2']);
      $p2 = mysqli_real_escape_string($con,$p2);
        // kiểm tra định dạng email nhập đúng chưa
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';

        if(preg_match($regex, $e))
        {
            $p=md5($p); // mã hóa password
            $activation=md5($e.time()); // mã hóa email và thời gian
            $sql_email = ("SELECT uid FROM users WHERE email='$e'");
            $count=$con->query($sql_email);

              # code...
            // Kiểm tra email đã có trong cơ sở dữ liệu chưa
            if(mysqli_num_rows($count) < 1)
            {
              mysqli_query($con,"INSERT INTO users(username, email, password, activation) VALUES('$u', '$e','$p','$activation')");
              // sending email
               //goi thu vien
              include('sendmail.php');
 
            }
             else
               {
                   $msg= 'The email is already taken, please try new.';
                }
              
               } else
        {
           $msg = 'The email you have entered is invalid, please try again.';
        }
      }
      ?>

<!doctype html>
<html lang="en">
  <head>
    <title>Send Email</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <style>
        #username{
          text-transform: capitalize;
        }
      </style>
</head>
  <body>
      
        <form action="" method="post">
            <label for="username">UserName:</label>
            <input type="text" name="username" id="username"><br>
            <label>Email:</label>
            <input type="text" name="email" class="input" autocomplete="off"/><br>
            <label>Password: </label>
            <input type="password" name="password" class="input" autocomplete="off"/><br/>
            <label>Password-ReType: </label>
            <input type="password" name="password2" class="input" autocomplete="off"/><br/>
            <input type="submit" class="button" value="Registration" />
            <span class='msg'><?php echo $msg; ?></span>
        </form>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>