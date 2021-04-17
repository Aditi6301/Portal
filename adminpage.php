<?php
include('UserLogin.php');
?>
<?php
if ( isset($_GET['mailsuccess']) && $_GET['mailsuccess'] == 1 )
{
  unset($_GET['mailsuccess']);
?>
    <div class="alert alert-success" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Approval mail sent successfully!</strong>
    </div>
<?php
}
if ( isset($_GET['blocksuccess']) && $_GET['blocksuccess'] == 1 )
{
  unset($_GET['blocksuccess']);
?>
<div class="alert alert-success" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>User Blocked successfully!</strong>
    </div>

<?php
}
else if( isset($_GET['blocksuccess']) && $_GET['blocksuccess'] == 0 )
{
  unset($_GET['blocksuccess']);
?>
<div class="alert alert-danger" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>User was not blocked.Please try again</strong>
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
              <!-- <div class="dropdown-divider"></div> -->
                <a href="LoginTable.php" class="dropdown-item"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Login Records</a>
                <div class="dropdown-divider"></div>
                <!-- <a  href="logout.php" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a> -->
                <a href="logout.php" class="dropdown-item"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
</div>
              
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Registered Users</h1>
          <!-- <p class="mb-4">Once you have shortlisted an opportunity, click on Request Details and we will soon get back to you with a detailed proposal!</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>User id</th>
                      <th>User Name</th>
                      <th>Type</th>
                      <th>Company Name</th>
                      <th>Designation</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Verified?</th>
                      <th>Block user</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      include('dbConn.php');
                      $data = $conn->query("SELECT * FROM users WHERE NOT Type='Admin' ORDER BY user_id ASC")->fetchAll();
                        // and somewhere later:
                         
                    foreach ($data as $row) 
                      
                    {
                        $user_id=$row['user_id'];
                        $first_name=$row['First name'];
                        $last_name=$row['Last name'];
                        $user_name=$first_name.' '.$last_name;

                        echo '<tr>';
                        // echo '<td>'.$row['user_id'].'</td>';
                        echo '<td>'.$row['user_id'].'</td>';
                        echo '<td>'.$user_name.'</td>';
                        echo '<td>'.$row['Type'].'</td>';
                        echo '<td>'.$row['CompanyName'].'</td>';
                        echo '<td>'.$row['Designation'].'</td>';
                        echo '<td>'.$row['Email'].'</td>';
                        echo '<td>'.$row['Phone'].'</td>';

                        if($row['Verified']=='No')
                        {
                         echo "<td ><a href='./mail/contact_me.php?user_id=$user_id'><button style='display: block; margin: auto' type='button' class='btn btn-warning '><i class='fa fa-check' aria-hidden='true'></i>&nbsp;Verify&nbsp;</button></a></td>";
                        }
                      else if($row['Verified']=='Blocked')
                        {
                            echo "<td ><a href=''><button style='display: block; margin: auto' type='button' class='btn btn-light'>&nbsp;Blocked</button></a></td>";
                        }
                        else
                        {
                            echo "<td ><a href=''><button style='display: block; margin: auto' type='button' class='btn btn-success'><i class='fa fa-check' aria-hidden='true'></i>&nbsp;Verified</button></a></td>";
                        }

                        if($row['Verified']=='Blocked')
                        {
                         echo "<td ><a href=''><button style='display: block; margin: auto' type='button' class='btn btn-light '>&nbsp;Blocked</button></a></td>";
                        }
                      else
                        {
                          ?>
                        <td>
                        <a  style='display: block;margin:auto' class="btn btn-danger " data-toggle="modal" href="#blockModal<?php echo $user_id; ?>"> <span class="text">Block?</span></a>
                        </td>
                        <?php
                        }

                        echo '</tr>';

                      ?>
                     <div class="portfolio-modal modal fade" id="blockModal<?php echo $user_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
            <div class="col-md-4 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <form method='post'>
                  <h1>Block User</h1>
                  <p>Are you sure you want to block user <?php echo $user_name; ?>?</p>
                  <a class="btn btn-light btn-icon-split btn-lg" href="adminpage.php"><span class="text">Cancel</span></a>
                  <a class="btn btn-danger btn-icon-split btn-lg" href="blockuser.php?user_id=<?php echo $user_id; ?>&flag=0"><span class="text">Yes</span></a>
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
      
  </div>
    <!-- End of Content Wrapper -->

  </div>


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
  $('form').each(function() { this.reset() });
  $(document).ready(function() {
    // show the alert
    setTimeout(function() {
        $(".alert").alert('close');
    }, 3000);
});
</script>
