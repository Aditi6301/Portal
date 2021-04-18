<?php
include('phRegistration.php');
?>

<?php



if ( isset($_GET['accountsuccess']) && $_GET['accountsuccess'] == 1 )
{
  unset($_GET['accountsuccess']);
?>
    <div class="alert alert-success" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Account added successfully!</strong>
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
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars" style="color:#fed136"></i>
          </button>

        

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
      

         
    <div class="container">
     
   <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            
             <center>
              <div class="col-lg-6">
              
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Production House Register</h1>
                  </div>
                 
                  <form class="user" method="POST">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="FirstName" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="LastName" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name" required>
                  </div>
                </div>
                
                <div class="form-group">
                  <input type="text" name="PName" class="form-control form-control-user" id="exampleInputEmail" placeholder="Brand/Company Name" required>
                </div>
                <div class="form-group">
                  <input type="text" name="Designation" class="form-control form-control-user" id="exampleInputEmail" placeholder="Your Designation" required>
                </div>
                <div class="form-group">
                  <input type="email" name="Email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" required>
                </div>
                
                <div class="form-group">
                  <input type="number" name="Phone" class="form-control form-control-user" id="exampleInputEmail" placeholder="Mobile Number" required>
                </div>
                <div class="form-group">
 <button type="submit" name="RegisterProduction" value="RegisterProduction" class="btn btn-primary btn-block" id="submit">Register
                  </button>
                </div>
              </form>
                 
                  <hr>
                  <div class="text-center">
                    <a class="small" href="login.php">Already have an account? Login!</a>
                  </div>
                  
                
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

     
     
  
      
    

         
         
         
         
         


     

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