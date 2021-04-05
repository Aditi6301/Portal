<?php
include('dbConn.php');



if(isset($_POST['RegisterProduction']))
{
    // echo "heyy!";
    $Firstname=$_POST['FirstName'];
    $Lastname=$_POST['LastName'];
    $Name=$_POST['PName'];
    $Designation=$_POST['Designation'];
    $Email=$_POST['Email'];
    $Phone=$_POST['Phone'];
    $Type="Production";

    $checkIfUnique=$conn->prepare("SELECT email FROM users  WHERE Email= ?");
    $checkIfUnique->bindValue(1,$Email);
    $checkIfUnique->execute();
    if($checkIfUnique->rowCount()>0)  //similar email found
    {
        echo "<script>alert('Email already exists!'); window.location='phregister.php'</script>";
        
    }
    else
    {
        $sql=$conn->prepare("INSERT INTO `users`(`Type`, `First name`, `Last name`, `CompanyName`, `Designation`, `Email`, `Phone`) VALUES ('$Type','$Firstname','$Lastname','$Name','$Designation','$Email','$Phone')");
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



}

?>
