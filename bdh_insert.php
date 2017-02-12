<?php
$con=mysqli_connect("localhost","knowlblv_fscontu","UKTH7fpw[MD?","knowlblv_fscontactus");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="INSERT INTO bdh_gs (name_bdh, email_bdh, phone_bdh)
VALUES
('$_POST[name_bdh]', '$_POST[email_bdh]', '$_POST[phone_bdh]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
?>
  
  <Center>
  <?php
// This results in an error.
// The output above is before the header() call
header('Location: bdh_syllabus.html');
?></center>
<?php
mysqli_close($con);
?>