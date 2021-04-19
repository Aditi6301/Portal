<?php
include('UserLogin.php');
$listing_no= $_GET['listing_no'];
$stmt = $conn->prepare("DELETE FROM listing WHERE listing_no = $listing_no"); 
// $stmt->bindParam(':userID', $userid, PDO::PARAM_INT); 
$result=$stmt->execute() or die($conn->error);
    if($result)
    {
        // echo "<script>window.location='tables2.php'</script>";
        $_SESSION['deletesuccess']=1;
        Header( 'Location: tables2.php' );
    }
    else
    {
        $_SESSION['deletesuccess']=0;
        Header( 'Location: tables2.php' );
    }

?>