<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{



    
    
  }
  {
  ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Employees Details</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
  <?php include_once('includes/sidebar.php')?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
         <?php include_once('includes/header.php')?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Employees Details</h1>

<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

 <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<tr>
  <th>S no.</th>
  <th>Emp First Name</th>
  <th>Emp Last Name</th>
  <th>Emp Email</th>
  <th>Emp Contact no</th>
  <th>Action</th>
  
</tr>

<?php
$ret=mysqli_query($con,"select * from employeedetail");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

<tr>
  <td><?php echo $cnt;?></td>
   <td><?php echo $row['EmpFname'];?></td>
    <td><?php echo $row['EmpLName'];?></td>
  <td><?php echo $row['EmpEmail'];?></td>
  <td><?php echo $row['EmpContactNo'];?></td>
  <td><a href="editempprofile.php?editid=<?php echo $row['ID'];?>">Edit Profile Details</a>
  </td>
</tr>

<?php 
$cnt=$cnt+1;
}?>

</table>

</div>






        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
   <?php include_once('includes/footer.php');?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
   <!---********************************************************************************************-->
 <!---*****************************************REGISTER MODAL*******************************************-->
 <!---********************************************************************************************-->
 <div class="container">
				<!-- Modal -->
				<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				<div class="modal-header" style="padding:35px 50px;">
        <h4>Register</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body" style="padding:40px 50px;">
				<div>
        
        </div>
				<form role="form" id="rform" method="post">
					<div class="form-group" >
					<label for="FirstName" id="intext"><span class="glyphicon glyphicon-user"></span> First Name</label>
					<input type="text" class="form-control" name="FirstName" placeholder="Enter First Name" required  >
					</div>
					<div class="form-group" >
					<label for="LastName" id="intext"><span class="glyphicon glyphicon-user"></span> Last Name</label>
					<input type="text" class="form-control" name="LastName" placeholder="Enter Last Name"  required>
					</div>
					<div class="form-group">
					<label for="Email" id="intext"><span class="glyphicon glyphicon-envelope"></span> Email</label>
					<input type="text" class="form-control" name="Email" placeholder="Enter email"  required>
					</div>					
					<label for="cpsw3" id="intext"><span class="glyphicon glyphicon-eye-close"></span> Employee Contact No.</label>
          <input type="text" class="form-control form-control-user" id="EmpContactNo" name="EmpContactNo" aria-describedby="emailHelp" placeholder="Enter Contact Number" required >
					</div>
								
					<button type="submit" class="btn btn-warning btn-block"><span class="glyphicon  glyphicon-book"></span> Sign Up</button>
				</form>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
				</div>
				</div>
      			</div>
				</div>
				</div>
  <!-- End of Page Wrapper -->
  
  <!-- Custom AJAX code -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    $("#addemp").click(function(){
  $("#myModal").modal();
  });        
    $('#rform').on('submit', function (event) {

      event.preventDefault();// using this page stop being refreshing 
        //alert($('form').serialize())
        $.ajax({
          type: 'POST',
          url: 'addempprofile.php',
          data: $('form').serialize(),
          success: function (resp) {
            alert(resp)
          }
        });

      });
    </script>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>
  
  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>
<?php }  ?>
