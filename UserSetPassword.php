<?php
include('dbConn.php');
session_start();
if(isset($_POST['SetPassword']))
{

    $email=$_POST['email'];
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
    
    

    if ($_POST['password1']!=$_POST['password2'])
        {
            //header('location:UserLogin.php');
            echo("Oops! Password does not match! Try again. ");
        }
        else
        {
            $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
            // $user_status='Active';

           
            // var_dump($hashed_password);
            $getId=$conn->prepare("SELECT * FROM users WHERE Email= ?");
            $getId->bindValue(1,$email);
            $getId->execute();
            if($getId->rowCount()>0)  //email found
            {
                while($UserId = $getId->fetch())
                {
                $user_id=$UserId['user_id'];
                }
            }
            // $_SESSION["loggedin"] = true;
            // $_SESSION["user_id"] = $user_id;
            // $_SESSION["email"] = $email; 
            
            $sql = "UPDATE users SET password=?  WHERE email=?";
            $stmt= $conn->prepare($sql);
            $result=$stmt->execute([$hashed_password,$email]) or die($conn->error);
            // $sql=$conn->prepare("INSERT INTO `login`(`user_id`, `Email`, `password`,`login_time`,`user_status`) VALUES ('$user_id','$email','$hashed_password',CURRENT_TIMESTAMP,$user_status)");
            // $result=$sql->execute() or die($conn->error);
            if($result)
            {
              Header('Location:login.php?passwordsuccess=1' );
            }
            else
            {
                // $_GET['passwordsuccess']=0;
                Header('Location:SetPassword.php?passwordsuccess=0' );
            }
        }
}
if(isset($_POST['ResetMail']))
{
    $email=$_POST['email'];
    $getId=$conn->prepare("SELECT * FROM users WHERE Email= ?");
    $getId->bindValue(1,$email);
    $getId->execute();
    if($getId->rowCount()>0)  //email found
    {
        while($UserId = $getId->fetch())
        {
           $user_id=$UserId['user_id'];
        }
        echo "<script>alert('Check Your mail to reset password!!');</script>";
        header("location:./mail/ResetPasswordMail.php?user_id=$user_id");
        
    }

}


if(isset($_POST['ResetPassword']))
{

    $email=$_POST['email'];
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
    
    

    if ($_POST['password1']!=$_POST['password2'])
        {
            //header('location:UserLogin.php');
            echo("Oops! Password does not match! Try again. ");
        }
        else
        {
            $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
            // $user_status='Active';

           
            // var_dump($hashed_password);
            $getId=$conn->prepare("SELECT * FROM users WHERE Email= ?");
            $getId->bindValue(1,$email);
            $getId->execute();
            if($getId->rowCount()>0)  //email found
            {
                while($UserId = $getId->fetch())
                {
                $user_id=$UserId['user_id'];
                }
            }
            // $_SESSION["loggedin"] = true;
            // $_SESSION["user_id"] = $user_id;
            // $_SESSION["email"] = $email; 
            
            $sql = "UPDATE users SET password=?  WHERE email=?";
            $stmt= $conn->prepare($sql);
            $result=$stmt->execute([$hashed_password,$email]) or die($conn->error);
            // $sql=$conn->prepare("INSERT INTO `login`(`user_id`, `Email`, `password`,`login_time`,`user_status`) VALUES ('$user_id','$email','$hashed_password',CURRENT_TIMESTAMP,$user_status)");
            // $result=$sql->execute() or die($conn->error);
            if($result)
            {
                $_SESSION['passwordchange']=1;
                Header('Location: login.php');
               
            }
            else
            {
                $_SESSION['passwordchange']=0;
                Header('Location:updatePassword.php');
            }
        }
}

?>