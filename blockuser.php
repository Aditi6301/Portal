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
        Header('Location: LoginTable.php?blocksuccess=1' );
    }
    else
    {
        Header('Location: adminpage.php?blocksuccess=1' );
    }
    
}
else
{
    if($flag==1)
    {
        Header('Location: LoginTable.php?blocksuccess=0' );
    }
    else
    {
        Header('Location: adminpage.php?blocksuccess=0' );
    }
}
?>