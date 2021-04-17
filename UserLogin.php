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
            if($row['Verified']=='Blocked')
           {
                Header('Location: login.php?BlockedUser=1' );
           }
            
            else if(password_verify($password,$row['password']))
            {
                
                $user_id=$row['user_id'];
                $hashed_password=$row['password'];
                $BrandName=$row['CompanyName'];
                $FirstName=$row['First name'];
                $LastName=$row['Last name'];
                $Designation=$row['Designation'];
                
                $Type=$row['Type'];

                $_SESSION["loggedin"] = true;
                $_SESSION["user_id"] = $user_id;
                $_SESSION["email"] = $email;
                $_SESSION["Type"] = $Type;
                $_SESSION["Status"] =$row['Verified'] ;	
                //on session creation
                $_SESSION['timestamp']=time();
                echo $_SESSION["user_name"]=$FirstName.' '.$LastName;
                $user_status='Active';
                echo $BrandName;
                echo $Designation;
                echo $Type;
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
                            Header('Location: tables2.php?loginsuccess=1' );
                        }
                        elseif($Trow['Type'] =='Brand')
                        {
                            Header('Location: tables.php?loginsuccess=1' );
                        }
                        elseif($Trow['Type'] =='Admin')
                        {

                            Header('Location: adminpage.php?loginsuccess=1' );
                        }
                        
                    }
                }
                
            }
            else
            {
                Header('Location: login.php?loginsuccess=0' );
            }
        }
        
    }
    else
    {
        echo "</br>";
        Header('Location: login.php?nouser=1' );
    }
    

}






?>