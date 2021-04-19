<?php
include('dbConn.php');
$flag=$_GET['flag'];
$user_id=$_GET['user_id'];
$block='Blocked';
$sql = "UPDATE users SET Verified=? WHERE user_id=?";
$stmt= $conn->prepare($sql);
;
if($bResult=$stmt->execute([$block,$user_id]))
{
    if($flag==1)
    {
        $_SESSION['blocksuccess']=1;
        Header('Location: LoginTable.php' );
    }
    else
    {
        $_SESSION['blocksuccess']=1;
        Header('Location: adminpage.php' );
    }
    
}
else
{
    if($flag==1)
    {
        $_SESSION['blocksuccess']=0;
        Header('Location: LoginTable.php' );
    }
    else
    {
        $_SESSION['blocksuccess']=0;
        Header('Location: adminpage.php' );
    }
}
?>