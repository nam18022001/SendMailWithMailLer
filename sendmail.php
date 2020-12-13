<?php
    //goi thu vien
    include('PHPMailer-5.2.26/class.smtp.php');
    include "PHPMailer-5.2.26/class.phpmailer.php"; 
    $nFrom = "Hoàng Nam";    //mail duoc gui tu dau, thuong de ten cong ty ban
    $mFrom = 'hnvnam.19it3@vku.udn.vn';  //dia chi email cua ban 
    $mPass = '********************************';       //mat khau email cua ban
    $nTo = ''; //Ten nguoi nhan
    $mTo=$e;

    // $mTo = 'phsang.19it2@vku.udn.vn';   //dia chi nhan mail
    $mail             = new PHPMailer();
    $body='
    <!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Style -->
    <style>
        .top{
            background-color: rgba(0, 0, 0, 0.299);
            text-align: center;
            border: 1px rgb(6, 69, 133) solid;
            
        }
        .logo{text-align: center;}

        .info h1, .info h3, .info h2{
            letter-spacing: 1px;
            text-align: center;
            font-family: Courier;
            color: rgb(255, 255, 255);
        }
        
        .background{
                
                background-repeat: no-repeat;
                background-image: url(https://daphovinahotel.com/wp-content/uploads/2019/07/N5_9842_SENIOR_6.jpg) ;
                background-size: cover;
        }
        .btn{
            
            text-decoration: none;
            display:inline-block;font-weight:400;color:#212529;text-align:center;vertical-align:middle;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;background-color:transparent;border:1px solid transparent;padding:.375rem .75rem;font-size:1rem;line-height:1.5;border-radius:.25rem;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out}@media (prefers-reduced-motion:reduce){.btn{transition:none}}.btn:hover{color:#212529;text-decoration:none}.btn.focus,.btn:focus{outline:0;box-shadow:0 0 0 .2rem rgba(0,123,255,.25)}
        .btn-success{color:rgb(31, 131, 231);background-color:#00ffe5;border-color:#28a745}.btn-success:hover{color:#fff;background-color:#00ddff;border-color:#1e7e34}.btn-success.focus,.btn-success:focus{box-shadow:0 0 0 .2rem rgba(72,180,97,.5)}
        .buttonrVerify{
            font-family:times;
            text-align: center;
        }
    </style>
  </head>
  <body>
        <div class="cover">
      <div class="background">
          <br>
        <div class="logo"><img src="https://lh3.googleusercontent.com/cef4ULEs_cuzSi_PRU3w73P_vEmtqSFBz3TdyZZwb_XJk3ue-4lhBkW9hoc6i-FHkXnycLHAQzda4beNM3hc4NHj-tx7MpKPFgBy417ISuTYFdJG_Eeo0m7EVjo-BjWdML19M_i9fUI9BnrFwnT6u8KHYuCwCL5vY0X3EHpLwUFXc06DmZQV3YnI5OCQ6GEkr4vvwPlpomZvsAjA6aaeyPp6iMJ0mfwFhQrXvtC8VU97EAd4yWiqfuGufdNVl-ca2Ai-I8IieE5jp-fABZ5XQaDnzmw-jjbKHUuAeySd0h9i8WoBKyiq0AsZEmEDW8eFSKeXveqUVQu6blPmnDlonhj6n3JdVXAG_vlyhgjn-31L26JmZ33jxJQvilx_ePXNLVomdC3xmiXqphNipHiSGRGF3X9G2nsVuDF8t2i92aIjCAZeAjdH0bn3F86xsc2jMnALAbO_PQIoaiaRSZhvx7ayCLZudCIlVL3hnBSbxmaN-ofapTuWyWzGEwXH-IMD0gPRJyxMxqoRyfcS-yMTXU-2BkaEEv-q-cfWdDb8AYRWjUlnI8tmoQVICqhwRSGAk0bijPIcNQTBFvtsJn1AkHPsVjSs5jijnIjxwFUGpTeR33e1TjWgUnemAkxnncuLbHJsFQre07pOkJiz6fGyYCnKhuv5jmaEhEBGfwzUPnrhwMTtQULqK522VO8=s500-no?authuser=0" width="30%" alt="" srcset=""></div>
          <div class=" top">
                    <div class="info">
                        <h1>Xin Chào, <b>'.$u.'</b></h1>
                        <h2>Hãy xác nhận email của bạn</h2>
                        <h3>Đây là code của bạn: <b>'.$activation.'</b></h3>
                        <h3>Hoặc bạn có thể bấm vào nút ở dưới</h3>
          </div>
           
        </div>
                <br><br><br>
        <div class="buttonrVerify mt-3">
            <a class="btn btn-success" href="'.$base_url.'verify.php?vkey='.$activation.'">VeriFy Email</a>
            <br><br><br>
        </div>
</div>
</div>
  </body>
</html>

            ';    
    // $body             = 'Chèo bẹn Seng';   // Noi dung email
    $title="Email verification";
    // $title = 'Hướng dẫn gửi mail bằng PHPMailer';   //Tieu de gui mail
    $mail->IsSMTP();             
    $mail->CharSet  = "utf-8";
    $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";    // sever gui mail.
    $mail->Port       = 465;         // cong gui mail de nguyen
    // xong phan cau hinh bat dau phan gui mail
    $mail->Username   = $mFrom;  // khai bao dia chi email
    $mail->Password   = $mPass;              // khai bao mat khau
    $mail->SetFrom($mFrom, $nFrom);
    $mail->AddReplyTo('hnvnam.19it3@vku.udn.vn', 'Hoàng Nam'); //khi nguoi dung phan hoi se duoc gui den email nay
    $mail->Subject    = $title;// tieu de email 
    // $mail->isHTML(TRUE);
    $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
    $mail->AddAddress($mTo, $nTo);
    // thuc thi lenh gui mail 
    //Gửi mail
                if(!$mail->Send()) {
                echo 'Co loi!';
                
                
              } 
              else {
                
                echo 'Mail Sent';
              }
    
?>
