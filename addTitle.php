<?php
include('UserLogin.php');

if(isset($_POST['Add_title']))
{
    echo "hi there";
    $user_id= $_SESSION["user_id"];
    $Type=$_POST['Type'];
    $Title=$_POST['Title'];
    $genre=$_POST['genre'];
    $starcast=$_POST['starcast'];
    $synopsis=$_POST['synopsis'];
    $Release_date=$_POST['Release_date'];
    $min_cost=$_POST["min_cost"];
    $max_cost=$_POST["max_cost"];
    $link=$_POST["link"];

    

        $sql=$conn->prepare("INSERT INTO `listing`(`listing_no`, `user_id`, `Type`, `Title`, `genre`, `starcast`, `synopsis`, `Release_date`, `min_cost`, `max_cost`, `link`) VALUES (NULL,'$user_id','$Type','$Title','$genre','$starcast','$synopsis','$Release_date','$min_cost','$max_cost','$link')");
        $result=$sql->execute() or die($conn->error);
        if($result)
        {
            echo "<script>alert('Movie successfully inserted!'); window.location='tables2.php'</script>";
        }
        else
        {
            echo "errorrr";
        }
        
    }





?>