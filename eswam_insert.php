<?php
$con=mysqli_connect("localhost","knowlblv_fscontu","UKTH7fpw[MD?","knowlblv_fscontactus");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="INSERT INTO eswam_gs (name_eswam, email_eswam, phone_eswam)
VALUES
('$_POST[name_eswam]', '$_POST[email_eswam]', '$_POST[phone_eswam]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
?>
  
  <Center>
  <?php
// This results in an error.
// The output above is before the header() call
header('Location: eswam_syllabus.html');
?></center>
<?php
mysqli_close($con);
?>