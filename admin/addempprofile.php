<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
$FName=$_POST['FirstName'];
$LName=$_POST['LastName'];
$Email = $_POST['Email'];
$EmpContactNo=$_POST['EmpContactNo'];

$query=mysqli_query($con, "insert into employeedetail (EmpFname,EmpLName,EmpContactNo,EmpEmail) values ('$FName','$LName','$EmpContactNo','$Email')");
    if ($query) {
      echo "Employee added successfully. Please check View Employees tab";
  }
  else
    {
      echo "Operation Failed";
    }
?>
