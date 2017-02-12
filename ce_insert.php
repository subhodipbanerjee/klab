<?php
$con=mysqli_connect("localhost","knowlblv_fscontu","UKTH7fpw[MD?","knowlblv_fscontactus");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="INSERT INTO ce_gs (name_ce, email_ce, phone_ce)
VALUES
('$_POST[name_ce]', '$_POST[email_ce]', '$_POST[phone_ce]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
?>
  
  <Center>
  <?php
// This results in an error.
// The output above is before the header() call
header('Location: ce_syllabus.html');
?></center>
<?php
mysqli_close($con);
?>