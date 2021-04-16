<?php
include('dbConn.php');



if(isset($_POST['RegisterBrand']))
{
    // echo "heyy!";
    $Firstname=$_POST['FirstName'];
    $Lastname=$_POST['LastName'];
    $Name=$_POST['BName'];
    $Designation=$_POST['Designation'];
    $Email=$_POST['Email'];
    $Phone=$_POST['Phone'];
    $Type="Brand";

$checkIfUnique=$conn->prepare("SELECT email FROM users  WHERE Email= ?");
$checkIfUnique->bindValue(1,$Email);
$checkIfUnique->execute();
if($checkIfUnique->rowCount()>0)  //similar email found
{
    echo "<script>alert('Email already exists!'); window.location='brandregister.php'</script>";
    
}
else
{
    $sql=$conn->prepare("INSERT INTO `users`(`Type`, `First name`, `Last name`, `CompanyName`, `Designation`, `Email`, `Phone`) VALUES ('$Type','$Firstname','$Lastname','$Name','$Designation','$Email','$Phone')");
    $result=$sql->execute() or die($conn->error);
    if($result)
    {
        Header( 'Location: brandregister.php?accountsuccess=1' );

    }
    else
    {
        echo "errorrr";
    }
}





}

?>