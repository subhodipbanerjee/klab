<?php
$con=mysqli_connect("localhost","knowlblv_fscontu","UKTH7fpw[MD?","knowlblv_fscontactus");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="INSERT INTO cae_gs (name_cae, email_cae, phone_cae)
VALUES
('$_POST[name_cae]', '$_POST[email_cae]', '$_POST[phone_cae]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
?>
  
  <Center>
  <?php
// This results in an error.
// The output above is before the header() call
header('Location: cae_syllabus.html');
?></center>
<?php
mysqli_close($con);
?>