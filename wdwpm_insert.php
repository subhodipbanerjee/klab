<?php
$con=mysqli_connect("localhost","knowlblv_fscontu","UKTH7fpw[MD?","knowlblv_fscontactus");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="INSERT INTO wdwpm_gs (name_wdwpm, email_wdwpm, phone_wdwpm)
VALUES
('$_POST[name_wdwpm]', '$_POST[email_wdwpm]', '$_POST[phone_wdwpm]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
?>
  
  <Center>
  <?php
// This results in an error.
// The output above is before the header() call
header('Location: wdwpm_syllabus.html');
?></center>
<?php
mysqli_close($con);
?>