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
		// $message = "Hello! ".$res['user_fname']." ".$res['user_lname']." \n";
		// $message .= "Please click '".url."password_reset.php?id=".$res['user_id']."' to add your Password";
		$message = ' 
    <html> 
    <head> 
        <title>Welcome !</title> 
    </head> 
    <body> 
        <h1 style="margin-left: 30%;">Thank you for contacting us!</h1> 
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
            <tr> 
                <th>Full Name:</th><td>'.$res['user_fname'].' '.$res['user_lname'].'</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Email:</th><td>'.$res['user_email'].'</td> 
            </tr>
        </table>
        <h2 style="margin-left: 22%;">Please click below button to change your password!</h2>
        <br>
        <a href="'.url.'password_reset.php?id='.$res['user_id'].'" style="margin-left: 37%;background-color: #15c;font-size: 40px;color: #fff;padding: 20px;border-radius: 25px;text-decoration: none;">Click Here!
        </a> 
    </body> 
    </html>';
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