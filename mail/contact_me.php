<?php

include('../dbConn.php');
echo "Mail";

$user_id=$_GET['user_id'];
$verified='Yes';
$sql = "UPDATE users SET Verified=? WHERE user_id=?";
$stmt= $conn->prepare($sql);
$vResult=$stmt->execute([$verified,$user_id]);

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
   $Message ="http://localhost/Portal/SetPassword.php?Email=$Email";
   $to =$Email; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
   $email_subject = "Website Contact Form:  $Name";
   $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $Name\n\nEmail: $Email\n\nPhone: $Phone\n\nMessage:\n$Message";
   $headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
   $headers .= "Reply-To: shreyakedia149@gmail.com\n";   
   if(mail($to,$email_subject,$email_body,$headers))
   {
      echo "Your Mail is sent successfully.";
      header("Location:../adminpage.php"); 
   }
   else
   {
      echo "Your Mail is not sent. Try Again."; 
   }
   echo " hi there";

   // $to = "aditi6301@gmail.com"; 
   // $sub = "Generic Mail"; 
   // $msg="Hello Geek! This is a generic email."; 
   // if (mail($to,$sub,$msg)) 
   //       echo "Your Mail is sent successfully."; 
   // else
   //       echo "Your Mail is not sent. Try Again."; 



  
   return true; 
   // if($vResult)
   // {
      
   // }
    
}






// Check for empty fields
// if(empty($_POST['name'])      ||
//    empty($_POST['email'])     ||
//    empty($_POST['phone'])     ||
//    empty($_POST['message'])   ||
//    !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
//    {
//    echo "No arguments Provided!";
//    return false;
//    }
   
// $name = strip_tags(htmlspecialchars($_POST['name']));
// $email_address = strip_tags(htmlspecialchars($_POST['email']));
// $phone = strip_tags(htmlspecialchars($_POST['phone']));
// $message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
// $to = 'yourname@yourdomain.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
// $email_subject = "Website Contact Form:  $name";
// $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
// $headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
// $headers .= "Reply-To: $email_address";   
// mail($to,$email_subject,$email_body,$headers);
// return true;         
?>