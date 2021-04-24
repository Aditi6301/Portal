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
        $_SESSION['existinguser']=1;
        Header( 'Location: phregister.php?existinguser=1');
        
    }
    else
    {
        $sql=$conn->prepare("INSERT INTO `users`(`Type`, `First name`, `Last name`, `CompanyName`, `Designation`, `Email`, `Phone`) VALUES ('$Type','$Firstname','$Lastname','$Name','$Designation','$Email','$Phone')");
        $result=$sql->execute() or die($conn->error);
        if($result)
        {
           
            Header( 'Location: phregister.php?accountsuccess=1');
        }
        else
        {
         
            Header( 'Location: phregister.php?accountsuccess=0');
        }
    }



}

?>
