<?php
include('UserLogin.php');
if(!isset($_SESSION['loggedin']))
{
  Header('Location:login.php?illegalaccess=1' );
}
$stmt = $conn->prepare("DELETE FROM listing WHERE Release_date = CURRENT_DATE()"); 
$result=$stmt->execute() or die($conn->error);
if($_SESSION["Type"]=='Production')
{
  Header('Location:tables2.php?Production_access=1' );
}
// session_start();

$idletime=3600;//after 60 seconds the user gets logged out

if (time()-$_SESSION['timestamp']>$idletime){
    // session_destroy();
    // session_unset();
    Header( 'Location:logout.php' );
}else{
    $_SESSION['timestamp']=time();
}
if ( isset($_GET['mailsuccess']) && $_GET['mailsuccess'] == 1 )
{
  unset($_GET['mailsuccess']);
?>
<div class="alert alert-success" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Mail successfully sent! We will get back to you soon!</strong>
    </div>
<?php
}
if ( isset($_GET['mailsuccess']) && $_GET['mailsuccess'] == 0 )
{
  unset($_GET['mailsuccess']);
?>
<div class="alert alert-danger" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Error occured.Please try again.</strong>
    </div>
<?php 
}
if ( isset($_GET['Brand_access']) && $_GET['Brand_access'] == 1 )
{
  unset($_GET['Brand_access']);
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
  <style>
        #footer {
            position: fixed;
        }
    </style>

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
        
          <!-- Topbar Navbar -->
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
      <div class="dropdown-divider"></div>
      <!-- <a  href="logout.php" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Logout
      </a> -->
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
      <!-- <a  href="logout.php" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Logout
      </a> -->
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
          <h1 class="h3 mb-2 text-gray-800">Available Association Opportunities</h1>
          <p class="mb-4">Once you have shortlisted an opportunity, click on Request Details and we will soon get back to you with a detailed proposal!</p>

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
                      <th>Starcast</th>
                      <th>Release Date</th>
                      <th>Budget Range ₹</th>
                      <th></th>
                    </tr>
                  </thead>
                  
                  <tbody>

                  <?php
                   
                    
                    $data = $conn->query("SELECT * FROM listing")->fetchAll();
                    foreach ($data as $row) 
                    {
                      ?>
                    
                      <tr>
                      
                      <td><?php echo $row['Type']; ?></td>
                      <td><?php echo $row['Title'] ?></td>
                      <td><?php echo $row['genre']; ?></td>
                      <td><?php echo $row['starcast']; ?></td>
                      <td><?php echo $row['Release_date']; ?></td>
                      <td>₹<?php echo $row['min_cost']; ?> to ₹<?php echo $row['max_cost']; ?> </td>
                      <td>
                <?php
                $title=$row['Title'];
                ?>
                      <a class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" href="#portfolioModal1<?php echo $row['listing_no']; ?>"> <span class="text">View More</span></a>
                      <a href="./mail/RequestDetails.php?Title=<?php echo $title;?>"class="btn btn-warning btn-icon-split btn-sm"><span class="text">Request Details</span></a>
        
                      </td>
                    </tr>

    <div class="portfolio-modal modal fade" id="portfolioModal1<?php echo $row['listing_no']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                
                
                <h2 class="text-uppercase"><?php echo $row['Title']; ?></h2>
                <p class="item-intro text-muted"><b>Genre:</b><?php echo $row['genre']; ?></p>
                 <img class="img-fluid d-block mx-auto" src="./uploads/<?php echo $row['image']; ?>" alt="">
                  <p></p>
                  <?php 
                  if($row['link'])
                    {
                    ?>
                  <div class="iframe-container">
                  
                  <iframe src="http://www.youtube.com/embed/<?php echo $row['link']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                   </div>
                   <p></p>
                 <?php 
                }
                else
                    {
                ?>
                   <p><b>Link:</b>Not provided</p>
                <?php 
              }
              ?>
                <ul class="list-inline">
                  <li><b>Cast:</b> <?php echo $row['starcast']; ?></li>
                  <p></p>
                
                  <li align="left"><b>Synopsis:</b> <?php echo $row['synopsis']; ?></li>
                  <p></p>
               
                  <li><b>Release Date:</b><?php echo $row['Release_date']; ?></li>
                  <p></p>
                  <li><b>Budget Range:</b> INR <?php echo $row['min_cost']; ?> to <?php echo $row['max_cost']; ?></li>
                  <p></p>
                  <li><b>Tentative Deliverables:</b><br><?php echo $row['deliverables']; ?></li>
                 
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
      
  </div>
    <!-- End of Content Wrapper -->

  </div>


 

  
  <!-- End of Page Wrapper -->

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
