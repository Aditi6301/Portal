<?php
include('UserLogin.php');
$_SESSION["user_id"];
if(isset($_POST['Add_title']))
{
    echo "hi there";

    $Type=$_POST['Type'];
    $Title=$_POST['Title'];
    $genre=$_POST['genre'];
    $starcast=$_POST['starcast'];
    $synopsis=$_POST['synopsis'];
    $Release_date=$_POST['Release_date'];
    $min_cost=$_POST["min_cost"];
    $max_cost=$_POST["max_cost"];
    $link=$_POST["link"];
    

        $sql=$conn->prepare("INSERT INTO `listing`(`listing_no`, `user_id`, `Type`, `Title`, `genre`, `starcast`, `synopsis`, `Release_date`, `min_cost`, `max_cost`, `link`) VALUES ('$listing_no','$user_id','$Type','$Title','$genre','$starcast','$synopsis','$Release_date','$min_cost','$max_cost','$link','$poster')");
        $result=$sql->execute() or die($conn->error);
        if($result)
        {
            echo "<script>alert('Movie successfully inserted!'); window.location='addTitle.php'</script>";
        }
        else
        {
            echo "errorrr";
        }
        
    }





?>