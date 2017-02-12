<?php
$con=mysqli_connect("localhost","knowlblv_fscontu","UKTH7fpw[MD?","knowlblv_fscontactus");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="INSERT INTO bim_gs (name_bim, email_bim, phone_bim)
VALUES
('$_POST[name_bim]', '$_POST[email_bim]', '$_POST[phone_bim]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
?>
  
  <Center>
  <?php
// This results in an error.
// The output above is before the header() call
header('Location: bim_syllabus.html');
?></center>
<?php
mysqli_close($con);
?>