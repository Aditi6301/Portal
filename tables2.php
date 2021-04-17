<?php
include('addTitle.php');
include('editTitle.php');
$stmt = $conn->prepare("DELETE FROM listing WHERE Release_date = CURRENT_DATE()"); 
$result=$stmt->execute() or die($conn->error);
if(!isset($_SESSION['loggedin']))
{
  Header('Location:login.php?illegalaccess=1' );
}
if($_SESSION["Type"]=='Brand')
{
  Header('Location:tables.php?Brand_access=1' );
}
if($_SESSION["Status"]=='Blocked')
{
  Header('Location:login.php?illegalaccess=1' );
}

// session_start();

$idletime=3600;//after 300 seconds the user gets logged out

if (time()-$_SESSION['timestamp']>$idletime){
    // session_destroy();
    // session_unset();
    Header( 'Location:logout.php' );
}else{
    $_SESSION['timestamp']=time();
}



if ( isset($_GET['deletesuccess']) && $_GET['deletesuccess'] == 1 )

{
  unset($_GET['deletesuccess']);
  ?>
     
     <div class="alert alert-success" id="success-alert">
      <button type="button" class="close" data-dismiss="alert">x</button>
      <strong>Deleted SuccessFully! </strong> 
    </div>
    
<?php
}


if ( isset($_GET['updatesuccess']) && $_GET['updatesuccess'] == 1 )
{
  unset($_GET['updatesuccess']);
?>
    <div class="alert alert-success" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Title Updated</strong>
    </div>
<?php
}
if ( isset($_GET['titlesuccess']) && $_GET['titlesuccess'] == 1 )
{
  unset($_GET['titlesuccess']);
?>
    <div class="alert alert-success" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Title sucessfully added!</strong>
    </div>
<?php
}
if ( isset($_GET['Production_access']) && $_GET['Production_access'] == 1 )
{
  unset($_GET['Production_access']);

?>
<div class="alert alert-danger" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Page not accessible.</strong>
    </div>
<?php 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Tables</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/agency.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

   

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-dark bg-white topbar mb-4 static-top shadow">
		<div class="container">
		<a class="navbar-brand js-scroll-trigger" href="index.html"><img src="img/logo.png"></a>
		
		
		</div>
          <!-- Sidebar Toggle (Topbar) 
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
		-->
          <?php 

          if( $_SESSION["Type"]=='Admin')
          {
            ?>

<ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["user_name"]?></span>
                <img class="img-profile rounded-circle" src="img/dp.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="UserProfile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <!-- <a  href="logout.php" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a> -->
                <a href="tables2.php" class="dropdown-item"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Add New Title/Production records</a>
                <div class="dropdown-divider"></div>
                <!-- <a  href="logout.php" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a> -->
                <a href="tables.php" class="dropdown-item"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Brand Records</a>
              
                <div class="dropdown-divider"></div>
                <!-- <a  href="logout.php" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a> -->
                <!-- <a href="login.php" class="dropdown-item"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Admin</a> -->
              
                <a href="LoginTable.php" class="dropdown-item"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Login Records</a>
                <div class="dropdown-divider"></div>
                <a href="adminpage.php" class="dropdown-item"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Verify Users</a>
                <!-- <a  href="logout.php" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a> -->
                <div class="dropdown-divider"></div>
                <a href="logout.php" class="dropdown-item"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
</div>
              
            </li>

          </ul>

          


          <?php
          }
          else
          {
          ?>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["user_name"]?></span>
                <img class="img-profile rounded-circle" src="img/dp.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="UserProfile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
               
                <div class="dropdown-divider"></div>
                <!-- <a  href="logout.php" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a> -->
                <a href="login.php" class="dropdown-item"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Admin</a>
                
                <div class="dropdown-divider"></div>
                <a href="logout.php" class="dropdown-item"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
              </div>
            </li>
          </ul>

          <?php
          }
          ?>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
          <p class="mb-4"><a class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" href="#AddNewModal"> <span class="text">Add New Title</span></a></p>
		  <h1 class="h3 mb-2 text-gray-800">Your Listings</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Movie Name</th>
                      <th>Genre</th>
                      <th>Cast</th>
                      <th>Release Date</th>
                      <th>Budget Range ₹</th>
                      <th></th>
                    </tr>
                  </thead>
                  
                  <tbody>

                  <?php
                    $Type=$_SESSION["Type"];
                    $user_id=$_SESSION["user_id"];
                    if($Type =='Admin')
                    {
                      $data = $conn->query("SELECT * FROM listing")->fetchAll();
                    }
                    else
                    {
                      $data = $conn->query("SELECT * FROM listing where user_id =$user_id")->fetchAll();
                    }
                    
                    foreach ($data as $row) 
                    {
                      
                      ?>
                    
                      <tr>
                      <td><?php echo $row['Type']; ?></td>
                      <td><?php echo $row['Title']; ?></td>
                      <td><?php echo $row['genre']; ?></td>
                      <td><?php echo $row['starcast']; ?></td>
                      <td><?php echo $row['Release_date']; ?></td>
                      <td>₹<?php echo $row['min_cost']; ?> to ₹<?php echo $row['max_cost']; ?> </td>
                      <td>
                      <a class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" href="#editModal<?php echo $row['listing_no']; ?>"> <span class="text">Edit</span></a>
                      <a class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" href="#deleteModal<?php echo $row['listing_no']; ?>"> <span class="text">Delete</span></a>
                      </td>
                    </tr>
                     <!-- Edit details modal -->


    
             <!-- delete confirmation madal -->
             <div class="portfolio-modal modal fade" id="deleteModal<?php echo $row['listing_no']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
        <center>
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <form method='post'>
                  <h1>Delete Title</h1>
                  <p>Are you sure you want to delete this title?</p>
                  <a class="btn btn-light btn-icon-split btn-lg" href="tables2.php"><span class="text">Cancel</span></a>
                  <a class="btn btn-danger btn-icon-split btn-lg" href="deleteTitle.php?listing_no=<?php echo $row['listing_no']; ?>"><span class="text">Delete</span></a>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
               




                    <?php
                    }
                    ?>
                   
                
                   
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
<form method="post" enctype="multipart/form-data">

 <div class="portfolio-modal-lg modal fade" id="AddNewModal" tabindex="-1" role="dialog" aria-hidden="true">
 
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
        <center>
          <div class="row">
            <div class="col-lg-10 mx-auto">
              <div class="modal-body">
               
               
                <ul class="list-inline">
                    
                    <div class="form-group">
                     <select name="Type" class="form-control custom-select" data-toggle="tooltip" data-placement="top" title="Production Type">
                        <label>Type of Opportunity</label>
                        <option name="In_Film" value="In_Film">In Film</option>
                        <option name="Out_Film" value="Out_Film">Out Film</option>
                    </select>
                    </div>
                    <div class="form-group">
                      <input name="Title" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Movie/Series Title">
                    </div>
                    <div class="form-group">
                      <input name="genre" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Genre">
                    </div>
                    <div class="form-group">
                      <input name="starcast" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Starcast">
                    </div>
                    <div class="form-group">
                      <textarea name="synopsis" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Synopsis"></textarea>
                    </div>
                    
                     <div class="form-group">
                      <input name="Release_date" type="date" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Release Date">
                    </div>
                 	
                 	 <div class="form-group">
                      <input name="min_cost" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Min Association Cost">
                    </div>
                     <div class="form-group">
                      <input name="max_cost" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Max Association Cost">
                    </div>
                    <div class="form-group">
                      <textarea name="tentative_deliverables" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Add Tentative deliverables"></textarea>
                    </div>
                    
                	<div class="form-group">
                      <input name="link" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Trailer Link">
                    </div>
                	
                	 <div class="custom-file">
                   <input name="image" class="custom-file-input" type="file" id="file-upload" name="movie_image"
                   />
                              <label class="custom-file-label" for="file-upload" id="file-upload-filename">Poster Image</label>
                     </div>
                
                    
                    </ul>
                
                
                    
                    
                <button value="Add_title" class="btn btn-primary" name="Add_title" type="submit">Add New Title</button>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- edit modal -->
<?php
                   
                    $user_id=$_SESSION["user_id"];
                    if($Type =='Admin')
                    {
                      $data = $conn->query("SELECT * FROM listing")->fetchAll();
                    }
                    else
                    {
                      $data = $conn->query("SELECT * FROM listing where user_id =$user_id")->fetchAll();
                    }
                    foreach ($data as $row) 
                    {
                      ?>


        <form  method="post" enctype="multipart/form-data">
        <div class="portfolio-modal-lg modal fade" id="editModal<?php echo $row['listing_no']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            
        <div class="modal-dialog">
              <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                  <div class="lr">
                    <div class="rl"></div>
                  </div>
                </div>
                <div class="container">
                <center>
                  <div class="row">
                    <div class="col-lg-10 mx-auto">
                      <div class="modal-body">
                      
                      
                        <ul class="list-inline">
                        <div class="form-group">
                              <input name="listing_no" type="hidden" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Movie/Series Title" value="<?php echo $row['listing_no']; ?>">
                            </div>
                            <div class="form-group">
                            <select name="Type" class="form-control custom-select" data-toggle="tooltip" data-placement="top" title="Production Type">
                                <label>Type of Opportunity</label>
                                <option name="In_Film" value="In_Film">In Film</option>
                                <option name="Out_Film" value="Out_Film">Out Film</option>
                            </select>
                            </div>

                            <div class="form-group">
                              <input name="Title" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Movie/Series Title" value="<?php echo $row['Title']; ?>">
                            </div>
                            <div class="form-group">
                              <input name="genre" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Genre" value="<?php echo $row['genre']; ?>">
                            </div>
                            <div class="form-group">
                              <input name="starcast" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Starcast" value="<?php echo $row['starcast']; ?>">
                            </div>
                            <div class="form-group">
                              <textarea name="synopsis" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Synopsis"><?php echo $row['synopsis']; ?></textarea>
                            </div>
                            
                            <div class="form-group">
                              <input name="Release_date" type="date" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Release Date" value="<?php echo $row['Release_date']; ?>">
                            </div>
                          
                          <div class="form-group">
                              <input name="min_cost" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Min Association Cost" value="<?php echo $row['min_cost']; ?>">
                            </div>
                            <div class="form-group">
                              <input name="max_cost" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Max Association Cost" value="<?php echo $row['max_cost']; ?>">
                            </div>
                            <div class="form-group">
                              <textarea name="tentative_deliverables" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Tentative deliverables"><?php echo $row['deliverables']; ?></textarea>
                            </div>
                            
                          <div class="form-group">
                              <input name="link" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Trailer Link" value="http://www.youtube.com/embed/<?php echo $row['link']; ?>">
                            </div>
                          
                            <div class="custom-file">
                              <input name="image" class="custom-file-input" type="file" id="file-upload" name="movie_image"/>
                              <label class="custom-file-label" for="file-upload"><?php echo $row['image']; ?></label>
                              <div id="file-upload-filename"></div>
                
                            </div>

                            </ul> 
                        <button type="submit" name="Edit_title" class="btn btn-primary" id="customFileInput" >Add New Title</button>
                        <button class="btn btn-primary" data-dismiss="modal" type="button">
                          <i class="fas fa-times"></i>
                          Close Project</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>

                              <?php
                    }
                    ?>




<a href="select.php">See Image</a>


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- modal -->
  <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
        <center>
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Tiger Zinda Hai</h2>
                <p class="item-intro text-muted"><b>Genre:</b> Action, Drama</p>
                 <img class="img-fluid d-block mx-auto" src="img/portfolio/tzh.jpg" alt="">
                  <p></p>
                  <div class="iframe-container">
                  <iframe src="https://www.youtube.com/embed/ePO5M5DE01I" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                   </div>
                   <p></p>
                <ul class="list-inline">
                  <li><b>Cast:</b> Salman Khan, Katrina Kaif</li>
                  <p></p>
                
                  <li align="left"><b>Synopsis:</b> Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</li>
                  <p></p>
               
                  <li><b>Release Date:</b> 15/08/2019</li>
                  <p></p>
                  <li><b>Budget Range:</b> INR 10,00,000 to INR 1,00,00,000</li>
                  <p></p>
                  <li><b>Tentative Deliverables:</b><br>Active/Passive Scenes<br>Logo Presence on movie opening slate<br>Digital bytes from actors</li>
                 
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script>
  $(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
  </script>
 
  
</body>

</html>

<script>
$(document).ready(function() {
    // show the alert
    setTimeout(function() {
        $(".alert").alert('close');
    }, 3000);
});
</script>
<script>
$('#inputGroupFile02').on('change',function(){
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
})
</script>

      <!-- $(".alert").first().hide().slideDown(500).delay(4000).slideUp(500, function () {
         $(this).remove(); 
      });
  }); -->
