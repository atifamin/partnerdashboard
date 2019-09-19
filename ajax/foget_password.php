<?php
session_start();
include "../config/config_main.php";
include "../config/base_path.php";
$Email = $_POST['email'];

if (isset($Email) && !empty($Email)) {
	$Query1 = "SELECT * FROM `user` WHERE `user_email` = '".$Email."' ";
	$Query1R = mysqli_query($con_MAIN,$Query1);
	if(mysqli_num_rows($Query1R)>0){

		$res = mysqli_fetch_assoc($Query1R);
		$to_email = $res['user_email'];
		//$to_email = 'usama-javed@hotmail.com';
		$subject = 'Password Recovery';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$message = '<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Password Reset</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
  @media screen {
    @font-face {
      font-family: "Source Sans Pro";
      font-style: normal;
      font-weight: 400;
      src: local("Source Sans Pro Regular"), local("SourceSansPro-Regular"), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format("woff");
    }
    @font-face {
      font-family: "Source Sans Pro";
      font-style: normal;
      font-weight: 700;
      src: local("Source Sans Pro Bold"), local("SourceSansPro-Bold"), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format("woff");
    }
  }
  body,
  table,
  td,
  a {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
  }
  table,
  td {
    mso-table-rspace: 0pt;
    mso-table-lspace: 0pt;
  }
  img {
    -ms-interpolation-mode: bicubic;
  }
  a[x-apple-data-detectors] {
    font-family: inherit !important;
    font-size: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
    color: inherit !important;
    text-decoration: none !important;
  }
  div[style*="margin: 16px 0;"] {
    margin: 0 !important;
  }
  body {
    width: 100% !important;
    height: 100% !important;
    padding: 0 !important;
    margin: 0 !important;
  }
  table {
    border-collapse: collapse !important;
  }
  a {
    color: #1a82e2;
  }
  img {
    height: auto;
    line-height: 100%;
    text-decoration: none;
    border: 0;
    outline: none;
  }
  </style>

</head>
<body style="background-color: #e9ecef;">
  <div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;">
    A preheader is the short summary text that follows the subject line when an email is viewed in the inbox.
  </div>
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td align="center" bgcolor="#e9ecef">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
          <tr>
            <td align="center"  style="padding: 36px 24px;">
              <h2>Hello '.$res['user_fname'].' '.$res['user_lname'].'!</h2>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td align="center" bgcolor="#e9ecef">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
          <tr style="text-align:center;">
            <td bgcolor="#ffffff" style="padding: 15px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;">
              <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Reset Your Password</h1>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td align="center" bgcolor="#e9ecef">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
          <tr>
            <td align="center" bgcolor="#ffffff" style="padding:10px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
              <p style="padding:15px;">Tap the button below to reset your customer account password. If you did not request a new password, you can safely delete this email.</p>
            </td>
          </tr>
          <tr>
            <td align="left" bgcolor="#ffffff">
              <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td align="center" bgcolor="#ffffff" style="padding: 12px;">
                    <table border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" bgcolor="#1a82e2" style="border-radius: 6px;">
                          <a href="'.url.'password_reset.php?id='.$res['user_id'].'" style="display: inline-block;
    padding: 16px 36px;font-size: 16px;color: #ffffff;text-decoration: none;border-radius: 6px;">Reset Password</a>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td align="center" bgcolor="#ffffff" style="padding: 24px; font-family: "Source Sans Pro", Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
              <p style="margin: 0;">If that does not work, copy and paste the following link in your browser:</p>
              <p style="margin: 0;"><a href="'.url.'password_reset.php?id='.$res['user_id'].'">'.url.'password_reset.php?id='.$res['user_id'].'</a></p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>';
		// $message .= "Please click '".url."password_reset.php?id=".$res['user_id']."' to add your Password";
		// $message = ' 
  //   <html> 
  //   <head> 
  //       <title>Welcome !</title> 
  //   </head> 
  //   <body> 
  //       <h1 style="margin-left: 30%;">Thank you for contacting us!</h1> 
  //       <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
  //           <tr> 
  //               <th>Full Name:</th><td>'.$res['user_fname'].' '.$res['user_lname'].'</td> 
  //           </tr> 
  //           <tr style="background-color: #e0e0e0;"> 
  //               <th>Email:</th><td>'.$res['user_email'].'</td> 
  //           </tr>
  //       </table>
  //       <h2 style="margin-left: 22%;">Please click below button to change your password!</h2>
  //       <br>
  //       <a href="'.url.'password_reset.php?id='.$res['user_id'].'" style="margin-left: 37%;background-color: #15c;font-size: 40px;color: #fff;padding: 20px;border-radius: 25px;text-decoration: none;">Click Here!
  //       </a> 
  //   </body> 
  //   </html>';
		//$message = file_get_contents("../FlightCheckinnemail.html");

		if(mail($to_email,$subject,$message,$headers)){
			echo "<div style='font-size:20px;text-align:center;color:#0c627b;text-transform:uppercase;margin-top:30px;'>MAIL HAS BEEN SENT TO YOUR MAIL ADDRESS.......</div>";
		}else{
			echo "<div style='font-size:19px;text-align:center;color:#aa0a0a;text-transform:uppercase;margin-top:28px;'>Failed to Recover your password, try again</div>";
		}

	}else{
		echo "<div style='font-size:19px;text-align:center;color:#aa0a0a;text-transform:uppercase;margin-top:28px;'>USER EMAIL DOES NOT EXIST IN DATABASE</div>";
	}
}else{
	echo "<div style='font-size:19px;text-align:center;color:#aa0a0a;text-transform:uppercase;margin-top:28px;'>PLEASE ENTER YOUR MAIL ADDRESS....</div>";
}

?>