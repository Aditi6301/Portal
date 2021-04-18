<?php
include('UserLogin.php');
$store_link="";
// $image="";
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
    $deliverables=$_POST["tentative_deliverables"];
    $link=$_POST["link"];
    parse_str(parse_url($link, PHP_URL_QUERY), $variables);
    $store_link= $variables['v'];
    $folder ="uploads/"; 

    $uploads_dir = "uploads/";;

    echo $_FILES["image"]["name"]; 
    echo $_FILES["image"]["size"];
    echo $_FILES["image"]["type"];
    $pname = $_FILES["image"]["name"]; 
    $tname=$_FILES["image"]["tmp_name"];
  
    $name = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
    $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
  
     $increment = 0; 
     $pname = $name . '.' . $extension;
     while(is_file($uploads_dir.'/'.$pname)) {
       $increment++;
       $pname = $name . $increment . '.' . $extension;
     }
     move_uploaded_file($tname, $uploads_dir.'/'.$pname);

    $sql=$conn->prepare("INSERT INTO `listing`(`listing_no`, `user_id`, `Type`, `Title`, `genre`, `starcast`, `synopsis`, `Release_date`, `min_cost`, `max_cost`,`deliverables`, `link`,`image`) VALUES (NULL,'$user_id','$Type','$Title','$genre','$starcast','$synopsis','$Release_date','$min_cost','$max_cost','$deliverables','$store_link','$pname')");
    $result=$sql->execute() or die($conn->error);
    if($result)
    {
        Header( 'Location: tables2.php?titlesuccess=1');
    }
    else
    {
        echo "errorrr";
    }
    

}

       






?>