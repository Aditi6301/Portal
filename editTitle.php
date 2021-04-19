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
        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=embed/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $link, $matches);
        $store_link=$matches[0]; 
        // if (strpos($link, 'embed') !== false) {
           
        //     $temp = explode('embed/', $link);
        //     $store_link=$temp[1];
        // }
        // else
        // {
           
        //     parse_str(parse_url($link, PHP_URL_QUERY), $variables);
        //     $store_link= $variables['v'];
        // }
        $image=$_POST["image"];
        
        
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
                while(is_file($uploads_dir.'/'.$pname)) 
                {
                $increment++;
                $pname = $name . $increment . '.' . $extension;
                }
         move_uploaded_file($tname, $uploads_dir.'/'.$pname);
         if ((!($_FILES['image']['name']))){
            $sql = "UPDATE listing SET Type=?,Title=?,genre=?,starcast=?,synopsis=?,Release_date=?,min_cost=?,max_cost=?,deliverables=?,link=? WHERE listing_no=?";
            $stmt= $conn->prepare($sql);
            $result=$stmt->execute([$Type,$Title,$genre,$starcast,$synopsis,$Release_date,$min_cost,$max_cost,$deliverables,$store_link,$listing_no]) or die($conn->error);

         }
         else{
            $sql = "UPDATE listing SET Type=?,Title=?,genre=?,starcast=?,synopsis=?,Release_date=?,min_cost=?,max_cost=?,deliverables=?,link=?,image=? WHERE listing_no=?";
            $stmt= $conn->prepare($sql);
            $result=$stmt->execute([$Type,$Title,$genre,$starcast,$synopsis,$Release_date,$min_cost,$max_cost,$deliverables,$store_link,$pname,$listing_no]) or die($conn->error);
         }
       
        if($result)
        {
            $_SESSION['updatesuccess']=1;
            Header( 'Location: tables2.php' );
        }
        else
        {
            $_SESSION['updatesuccess']=0;
            Header( 'Location: tables2.php' );
        }

    
    }
    
           
}

?>