<?php
include('UserSetPassword.php');
$email=$_GET['Email'];
$AlreadySet=$conn->prepare("SELECT * FROM users  WHERE Email= ?");
$AlreadySet->bindValue(1,$email);
$AlreadySet->execute();
if($AlreadySet->rowCount()>0)  //email found
{
  $PasswordAlreadySet='Yes';
}
else
{
  $PasswordAlreadySet='No';
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

  <title>Homerun Brand Login</title>

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
                    <h1 class="h4 text-gray-900 mb-4" class='hideForm'>Set Password</h1>
                  </div>

                  <div >
                  <form class="user" method="post"  id="setUserPassword" >
                  <div class="form-group">
                      <input type="text" name="email" class="form-control form-control-user" id="email" value="<?php echo $email;?>">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password1" class="form-control form-control-user" id="password1" placeholder="Password" onkeyup='check();'>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password2" class="form-control form-control-user" id="password2" placeholder="Confirm Password" onkeyup='check();'>
                    </div>
                    <span id='message'></span><br>
                    <button class="btn btn-primary btn-block" id="submit" name="SetPassword" type="submit"> Set Password</button>
                
                  </form>

  </div>
                  <!-- <hr>
                  <div class="text-center">
                    <p class="small">Create an account: <a href="brandregister.php">Brand</a> or <a href="phregister.php">Production House</a></P>
                  </div> -->

                  <div id="password_already_set" class="password_already_set">
                    <p class="small">Your password is already set!<a href="forgotpassword.php">Forgot Password?</a></p>
                  </div>
                <div>
                <p class="small"><a href="login.php">Login Here!</a></p>
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
<script type="text/javascript">
var check = "<?php echo $PasswordAlreadySet; ?>";
if(check == 'Yes')
{
  // alert("Hide form");
  $("form").hide();
  $("h1").hide();
  $(".password_already_set").show();
  
 
}
else{
  $("form").show();
  $(".password_already_set").hide();

}

var check = function() {
  if (document.getElementById('password1').value ==
    document.getElementById('password2').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Passwords match';
    document.getElementById('submit').disabled = false;
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Passwords do not match';
    document.getElementById('submit').disabled = true;
  }
}


</script>