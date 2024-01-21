<?php
include('include/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $complaintNumber = $_POST['complaintNumber'];
   $action = $_POST['action'];

   if ($action == 'approve') {
      // Implement code for approval if needed
      // Update the status or perform other actions
   } elseif ($action == 'reject') {
      // Implement code for rejection
      // Delete the complaint and related data
      mysqli_query($bd, "DELETE FROM tblcomplaints WHERE complaintNumber = '$complaintNumber'");
      mysqli_query($bd, "DELETE FROM complaintremark WHERE complaintNumber = '$complaintNumber'");

      echo 'Action rejected and data deleted successfully.';
   }
}
?>
