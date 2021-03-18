<?php
include('dbConn.php');



if(isset($_POST['RegisterProduction']))
{
    echo "heyy!";
    $Firstname=$_POST['FirstName'];
    $Lastname=$_POST['LastName'];
    $Name=$_POST['PName'];
    $Designation=$_POST['Designation'];
    $Email=$_POST['Email'];
    $Phone=$_POST['Phone'];
    $Type="Production";

$sql=$conn->prepare("INSERT INTO `users`(`Type`, `First name`, `Last name`, `Name`, `Designation`, `Email`, `Phone`) VALUES ('$Type','$Firstname','$Lastname','$Name','$Designation','$Email','$Phone')");
$result=$sql->execute() or die($conn->error);
if($result)
{
    echo "<script>alert('Account successfully added!'); window.location='phregister.php'</script>";
}
else
{
    echo "errorrr";
}



}

?>
