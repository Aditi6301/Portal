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
    // parse_str(parse_url($link, PHP_URL_QUERY), $variables);
    // $store_link= $variables['v'];
    preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=embed/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $link, $matches);
    $store_link=$matches[0]; 
    $folder ="uploads/"; 

    $uploads_dir = "uploads/";;

    echo $_FILES["image"]["name"]; 
    echo $_FILES["image"]["size"];
    echo $_FILES["image"]["type"];
    $pname = $_FILES["image"]["name"]; 
    $tname=$_FILES["image"]["tmp_name"];
    $allowed=array('jpeg','png' ,'jpg',NULL);
    $name = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
    $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
  
     $increment = 0; 
     $pname = $name . '.' . $extension;
     if(!in_array($extension,$allowed) ) 
    
     { 
     
      echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
     
     }
     else{
        //  move_uploaded_file( $_FILES['image'] ['tmp_name'], $path); 
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
        Header( 'Location: tables2.php?titlesuccess=0');
    }
    

}

       
}





?>