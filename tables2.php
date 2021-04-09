<?php
include('addTitle.php');
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
                <a href="logout.php" class="dropdown-item"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
              </div>
            </li>

          </ul>

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
                    <tr>
                      <td>Co-Branding</td>
                      <td>Tiger Zinda Hai</td>
                      <td>Action, Drama </td>
                      <td>Salman Khan, Katrina Kaif</td>
                      <td>2019/15/08</td>
                      <td>10,00,000 to 1,00,00,000</td>
                      <td>
                      <a class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" href="#portfolioModal1"> <span class="text">Edit</span></a>
                      <a class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" href="#"> <span class="text">Delete</span></a>
                      </td>
                    </tr>
                
                    <tr>
                      <td>In-Film</td>
                      <td>Cara Stevens</td>
                      <td>Sales Assistant</td>
                      <td>New York</td>
                      <td>2011/12/06</td>
                      <td>10,000 to 1,00,000</td>   
                     <td>
                      <a class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" href="#portfolioModal1"> <span class="text">Edit</span></a>
                      <a class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" href="#"> <span class="text">Delete</span></a>
                      </td>
                    </tr>
                   
                   
                    
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
                      <input name="link" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Trailer Link">
                    </div>
                	
                	 <div class="custom-file">
                        <input name="image" type="file" class="custom-file-input"name="movie_image" id="customFile" data-toggle="tooltip" data-placement="top">
                        <label align="left" class="custom-file-label" for="customFile">Poster Image</label>
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
<a href="select.php">See Image</a>


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
