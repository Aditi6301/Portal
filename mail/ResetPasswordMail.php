<?php

include('../dbConn.php');
$type='Admin';
$getAdminEmail=$conn->prepare("SELECT * FROM users  WHERE Type= ? LIMIT 1");
$getAdminEmail->bindValue(1,$type);
$getAdminEmail->execute();
if($getAdminEmail->rowCount()>0)  //email found
{
   while($UserEmail = $getAdminEmail->fetch())
   {
      $AdminEmail=$UserEmail['Email'];
     

  }
}
$user_id=$_GET['user_id'];
$verified='Yes';

$getEmail=$conn->prepare("SELECT * FROM users  WHERE user_id= ?");
$getEmail->bindValue(1,$user_id);
$getEmail->execute();
if($getEmail->rowCount()>0)  //email found
{
   while($UserEmail = $getEmail->fetch())
   {
      $Email=$UserEmail['Email'];
      $FirstName=$UserEmail['First name'];
      $LastName=$UserEmail['Last name'];
      $Phone=$UserEmail['Phone'];

  }
   $Name=$FirstName.' '.$LastName;
   
   $Message ="http://localhost/Portal/mail/temp.php?Email=$Email&flag=1";
   $to =$Email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
   $email_subject = "Website Contact Form:  $Name";
   $email_body = "You have received a new message from your website contact form.Click on the link\n\n"."Here are the details:\n\nName: $Name\n\nEmail: $Email\n\nPhone: $Phone\n\nMessage:\n$Message";
   $headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
   $headers .= "Reply-To:$AdminEmail\n";    
   if(mail($to,$email_subject,$email_body,$headers))
   {
      Header('Location: ../forgotpassword.php?mailsuccess=1' );
   }
   else
   {
      Header('Location: ../forgotpassword.php?mailsuccess=0' );
   }
   return true; 
}

?>

