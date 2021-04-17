<?php
// include('UserLogin.php');
$store_link="";
$image="";
if(isset($_POST['Edit_title']))
    {
        echo "hi there";
        // print_r($_POST);
        // $user_id= $_SESSION["user_id"];
        $listing_no=$_POST['listing_no'];
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
        if (strpos($link, 'embed') !== false) {
           
            $temp = explode('embed/', $link);
            $store_link=$temp[1];
        }
        else
        {
           
            parse_str(parse_url($link, PHP_URL_QUERY), $variables);
            $store_link= $variables['v'];
        }
        
        $folder ="uploads/"; 
    
    $image = $_FILES['image']['name'];
    echo '<br>'; 
    echo "image:";
    echo $image;
    
    $path = $folder . $image ; 
    echo '<br>'; 
    echo "path:";
    echo $path;
    
    $target_file=$folder.basename($_FILES["image"]["name"]);
    echo '<br>'; 
    echo "target_file:";
    echo $target_file;
    
    
    $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
    echo '<br>'; 
    echo "imageFileType";
    echo $imageFileType;
    
    $allowed=array('jpeg','png' ,'jpg',NULL);
    $filename=$_FILES['image']['name']; 
    
    $ext=pathinfo($filename, PATHINFO_EXTENSION);
    
    if(!in_array($ext,$allowed) ) 
    
    { 
    
     echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
    
    }
    else{
        move_uploaded_file( $_FILES['image'] ['tmp_name'], $path); 
        $sql = "UPDATE listing SET Type=?,Title=?,genre=?,starcast=?,synopsis=?,Release_date=?,min_cost=?,max_cost=?,deliverables=?,link=?,image=? WHERE listing_no=?";
        $stmt= $conn->prepare($sql);
        $result=$stmt->execute([$Type,$Title,$genre,$starcast,$synopsis,$Release_date,$min_cost,$max_cost,$deliverables,$store_link,$image,$listing_no]) or die($conn->error);
        if($result)
        {
             Header( 'Location: tables2.php?updatesuccess=1' );
        }
        else
        {
            echo "errorrr";
        }
        
    
    }
    
           
        }
?>