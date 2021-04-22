<?php
    session_start();
    $_SESSION['Email']=$_GET['Email'];
    if($_GET['flag']==1)
    {
        Header('Location: ../updatePassword.php' );
    }
    else
    {
        Header('Location: ../SetPassword.php' );
    }
    
?>