<?php
$con=mysqli_connect("localhost","knowlblv_fscontu","UKTH7fpw[MD?","knowlblv_fscontactus");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="INSERT INTO program_fee (mobile, programfee, payment_option)
VALUES
('$_POST[mobile]', '$_POST[programfee]', '$_POST[payment_option]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
?>
  
  <Center><?php
// This results in an error.
// The output above is before the header() call
header('Location: thankyou_enrollment.html');
?></center>
<?php
mysqli_close($con);
?>