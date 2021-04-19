<?php
include('dbConn.php');

if(isset($_POST['AdminRegistration']))
{
    // echo "heyy!";
    $Firstname=$_POST['FirstName'];
    $Lastname=$_POST['LastName'];
    $Email=$_POST['Email'];
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
    $Phone=$_POST['Phone'];
    $Type="Admin";

$checkIfUnique=$conn->prepare("SELECT email FROM users WHERE Email= ?");
$checkIfUnique->bindValue(1,$Email);
$checkIfUnique->execute();
if($checkIfUnique->rowCount()>0)  //similar email found
{
    $_SESSION['existinguser']=1;
    Header( 'Location: admin_register.php');
    
}
else
{
    if ($_POST['password1']!=$_POST['password2'])
    {
        $_SESSION['passwordmismatch']=1;
        Header( 'Location: admin_register.php');
    }
    else
    {
        $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
    
        $sql=$conn->prepare("INSERT INTO `users`(`Type`,`First name`,`Last name`,`Email`,`password`.`Phone`) VALUES ('$Type','$Firstname','$Lastname','$Email','$hashed_password',$Phone)");
        $result=$sql->execute() or die($conn->error);
        if($result)
            {
                $_SESSION['accountsuccess']=1;
                Header( 'Location: admin_register.php');
            }
            else
            {
                $_SESSION['accountsuccess']=0;
                Header( 'Location: admin_register.php');
            }
    }
}




}



?>
