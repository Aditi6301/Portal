<?php
include('dbConn.php');
$email="";
$password1="";
$password2="";
$password="";
session_start();
if(isset($_POST['Login']))
{

    $email=$_POST['email'];
    $password=$_POST['password'];
    $getPassword=$conn->prepare("SELECT * FROM users  WHERE Email= ? LIMIT 1");
    $getPassword->bindValue(1,$email);
    $getPassword->execute();
    if($getPassword->rowCount()>0)  //email found
    {
        while($row = $getPassword->fetch())
        {
            
            if(password_verify($password,$row['password']))
            {
                
                $user_id=$row['user_id'];
                $hashed_password=$row['password'];
                $BrandName=$row['CompanyName'];
                $FirstName=$row['First name'];
                $LastName=$row['Last name'];

                $_SESSION["loggedin"] = true;
                $_SESSION["user_id"] = $user_id;
                $_SESSION["email"] = $email;
                echo $_SESSION["user_name"]=$FirstName.' '.$LastName;

                $user_status='Active';
                echo $BrandName;
                $getType=$conn->prepare("SELECT * FROM users WHERE Email= ? LIMIT 1");
                $getType->bindValue(1,$email);
                $getType->execute();
                $sql=$conn->prepare("INSERT INTO `login`(`user_id`, `Email`, `CompanyName`, `login_time`, `user_status`) VALUES ('$user_id','$email','$BrandName',CURRENT_TIMESTAMP,'$user_status')");
                $result=$sql->execute() or die($conn->error);
                if($getType->rowCount()>0)
                {
                    while($Trow = $getType->fetch())
                    {
                        
                        if($Trow['Type']=='Production')
                        {
                             echo "<script>alert('Login Successful!!'); window.location='tables2.php'</script>";
                        }
                        elseif($Trow['Type'] =='Brand')
                        {
                             echo "<script>alert('Login Successful!!'); window.location='tables.php'</script>";
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
        echo "</br>";
        echo "User does not exist.Please register first";
    }
    

}






?>