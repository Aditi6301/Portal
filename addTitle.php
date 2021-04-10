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
    $deliverables=$_POST["tentative_deliverables"];
    $link=$_POST["link"];
    parse_str(parse_url($link, PHP_URL_QUERY), $variables);
    $store_link= $variables['v'];
    $folder ="uploads/"; 

$image = $_FILES['image']['name']; 

$path = $folder . $image ; 

$target_file=$folder.basename($_FILES["image"]["name"]);


$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);


$allowed=array('jpeg','png' ,'jpg'); $filename=$_FILES['image']['name']; 

$ext=pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$allowed) ) 

{ 

 echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";

}
else{
    move_uploaded_file( $_FILES['image'] ['tmp_name'], $path); 

    $sql=$conn->prepare("INSERT INTO `listing`(`listing_no`, `user_id`, `Type`, `Title`, `genre`, `starcast`, `synopsis`, `Release_date`, `min_cost`, `max_cost`,`deliverables`, `link`,`image`) VALUES (NULL,'$user_id','$Type','$Title','$genre','$starcast','$synopsis','$Release_date','$min_cost','$max_cost','$deliverables','$store_link','$image')");
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

       
    }





?>