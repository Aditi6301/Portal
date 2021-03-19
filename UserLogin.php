<?php
include('dbConn.php');

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
            $sql=$conn->prepare("INSERT INTO `login`(`user_id`, `Email`, `password`) VALUES ('$user_id','$email','$hashed_password')");
             $result=$sql->execute() or die($conn->error);
            if($result)
            {
                echo "<script>alert('Password set successfully!!'); window.location='tables.html'</script>";
            }
            else
            {
                echo "errorrr";
            }
        }
}




?>