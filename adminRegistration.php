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
    echo "<script>alert('Email already exists!'); window.location='login.php'</script>";
    
}
else
{
    if ($_POST['password1']!=$_POST['password2'])
    {
        //header('location:UserLogin.php');
        echo("Oops! Password does not match! Try again. ");
    }
    else
    {
        $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
    
        $sql=$conn->prepare("INSERT INTO `users`(`Type`,`First name`,`Last name`,`Email`,`password`.`Phone`) VALUES ('$Type','$Firstname','$Lastname','$Email','$hashed_password',$Phone)");
        $result=$sql->execute() or die($conn->error);
        if($result)
            {
                echo "<script>alert('Account successfully added!'); window.location='login.php'</script>";
            }
            else
            {
                echo "errorrr";
            }
    }
}




}



?>
