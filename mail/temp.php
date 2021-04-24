<?php
    session_start();
    if(isset($_GET['Email'])) 
    {
        $_SESSION['Email']=$_GET['Email'];
        if($_GET['flag']==1)
        {
            Header('Location: ../updatePassword.php' );
        }
        else
        {
            Header('Location: ../SetPassword.php' );
        }
    }
    else
    {
        Header('Location: ../login.php' );
    }
    
    
    
?>