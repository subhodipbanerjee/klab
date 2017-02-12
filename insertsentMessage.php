<?php
$con=mysqli_connect("localhost","knowlblv_fscontu","UKTH7fpw[MD?","knowlblv_fscontactus");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="INSERT INTO contact_us (name, email, phone, message)
VALUES
('$_POST[name]', '$_POST[email]', '$_POST[phone]', '$_POST[message]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
?>
  
  <Center><?php
// This results in an error.
// The output above is before the header() call
header('Location: thankyou_contactus.html');
?></center>
<?php
mysqli_close($con);
?>