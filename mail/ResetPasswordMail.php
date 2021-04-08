<?php

include('../dbConn.php');
// echo "Mail";

$user_id=$_GET['user_id'];

echo $user_id;
$verified='Yes';
// $sql = "UPDATE users SET Verified=? WHERE user_id=?";
// $stmt= $conn->prepare($sql);
// $vResult=$stmt->execute([$verified,$user_id]);

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
   // $Message="./SetPassword.php?Email=$Email";

   
   $Message ="http://localhost/Portal/updatePassword.php?Email=$Email";
   $to =$Email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
   $email_subject = "Website Contact Form:  $Name";
   $email_body = "You have received a new message from your website contact form.Click on the link\n\n"."Here are the details:\n\nName: $Name\n\nEmail: $Email\n\nPhone: $Phone\n\nMessage:\n$Message";
   $headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
   $headers .= "Reply-To: shreyakedia149@gmail.com\n";   
   if(mail($to,$email_subject,$email_body,$headers))
   {
      echo "Your Mail is sent successfully.";
      // header("Location:../login.php"); 
   }
   else
   {
      echo "Your Mail is not sent. Try Again."; 
   }
   echo " hi there";

  
   return true; 
}

?>

