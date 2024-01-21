<?php
session_start();
include('include/config.php');

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['update'])) {
        $complaintnumber = $_GET['cid'];
        $status = $_POST['status'];
        $remark = $_POST['remark'];

        // Insert into complaintremark table
        $query = mysqli_query($bd, "INSERT INTO complaintremark (complaintNumber, status, remark) VALUES ('$complaintnumber', '$status', '$remark')");

        // Update tblcomplaints table
        $sql = mysqli_query($bd, "UPDATE tblcomplaints SET status='$status' WHERE complaintNumber='$complaintnumber'");

        if ($query && $sql) {
            echo "<script>alert('Complaint details updated successfully');</script>";
        } else {
            echo "<script>alert('Error updating complaint details');</script>";
        }
    }
}
?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Profile</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="margin-left:50px;">
<form name="updatecomplaint" id="updatecomplaint" method="post" enctype="multipart/form-data">
    <!-- ... existing form fields ... -->

    <tr height="50">
        <td><b>Status</b></td>
        <td>
            <select name="status" required="required">
                <option value="">Select Status</option>
                <option value="in process">In Process</option>
                <option value="closed">Closed</option>
            </select>
        </td>
    </tr>

    <tr height="50">
        <td><b>Remark</b></td>
        <td><textarea name="remark" cols="50" rows="10" required="required"></textarea></td>
    </tr>

    <tr height="50">
        <td>&nbsp;</td>
        <td><input type="submit" name="update" value="Submit"></td>
    </tr>
</form>

</div>

</body>
</html>

     <?php } ?>