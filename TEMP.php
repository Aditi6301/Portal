<?php
include_once('dbConn.php');

if(isset($_POST['RegisterBrand']))
{
    $Firstname=$_POST['FirstName'];
    $Lastname=$_POST['LastName'];
    $Name=$_POST['BName'];
    $Designation=$_POST['Designation'];
    $Email=$_POST['Email'];
    $Phone=$_POST['Phone'];

$sql=$conn->prepare("INSERT INTO `users`(`Type`, `First name`, `Last name`, `Name`, `Designation`, `Email`, `Phone`, `Verified`) VALUES (?,?,?,?,?,?,?,?)");
$sql->bindParam("sssssi",$Firstname,$Lastname,$Name,$Designation,$Email,$Phone);
$result=$sql->execute() or die($conn->error);
if($result)
{
    echo 'ty';
}
else
{
    echo "errorrr";
}
// Binding Post Values
// $query->bindParam(':FirstName',$Firstname,PDO::PARAM_STR);
// $query->bindParam(':Lastname',$Lastname,PDO::PARAM_STR);
// $query->bindParam(':Name',$Name,PDO::PARAM_STR);
// $query->bindParam(':Designation',$Designation,PDO::PARAM_STR);
// $query->bindParam(':Email',$Email,PDO::PARAM_STR);
// $query->bindParam(':Phone',$Phone,PDO::PARAM_INT);


}

?>