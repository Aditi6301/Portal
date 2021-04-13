<?php 

include('dbConn.php');
$stmt = $conn->prepare("DELETE FROM listing WHERE Release_date = CURRENT_DATE()"); 
$result=$stmt->execute() or die($conn->error);
    if($result)
    {
        echo "deleted released items";
       
    }
    else
    {
        echo "errorrr";
    }

?>