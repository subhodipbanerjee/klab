<?php
$con=mysqli_connect("localhost","knowlblv_fscontu","UKTH7fpw[MD?","knowlblv_fscontactus");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="INSERT INTO amad_gs (name_amad, email_amad, phone_amad)
VALUES
('$_POST[name_amad]', '$_POST[email_amad]', '$_POST[phone_amad]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
?>
  
  <Center>
  <?php
// This results in an error.
// The output above is before the header() call
header('Location: amad_syllabus.html');
?></center>
<?php
mysqli_close($con);
?>