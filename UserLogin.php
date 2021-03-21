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

if(isset($_POST['Login']))
{

    $email=$_POST['email'];
    $password=$_POST['password'];
    $getPassword=$conn->prepare("SELECT * FROM login  WHERE Email= ?");
    $getPassword->bindValue(1,$email);
    $getPassword->execute();
    if($getPassword->rowCount()>0)  //email found
    {
        while($row = $getPassword->fetch())
        {
            if(password_verify($password,$row['password']))
            {
                $getType=$conn->prepare("SELECT * FROM users WHERE Email= ?");
                $getType->bindValue(1,$email);
                $getType->execute();
                if($getType->rowCount()>0)
                {
                    while($Trow = $getType->fetch())
                    {
                        if($Trow['Type']=='Production')
                        {
                            echo "<script>alert('Login Successful!!'); window.location='tables2.html'</script>";
                        }
                        elseif($Trow['Type'] =='Brand')
                        {
                            echo "<script>alert('Login Successful!!'); window.location='tables.html'</script>";
                        }
                        else
                        {
                            echo "<script>alert('Login Successful!!'); window.location='adminpage.html'</script>";
                        }
                        
                    }
                }

                

                
            }
            else
            {
                echo "<script>alert('Login failed!!'); window.location='login.php'</script>";
            }
        }
        
    }
    else
    {
        echo "User does not exist.Please register first";
    }
    

}






?>