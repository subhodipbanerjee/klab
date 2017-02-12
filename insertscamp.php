<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Knowledgelab</title>

<meta charset="utf-8">

<style>
.head
{
text-indent:5px;
margin-top:8px;
width:85%;
font-family:Arial, Helvetica, sans-serif;
font-size:14px;
font-weight:bold;
color:#0180c7;
}
</style>

</head>


<table width="90%" border="1" align="center" style="border-collapse:collapse;">
<tr>
<td>

<table width="100%" border="0" align="center">
  <tr>
    <td><img src="images/logo small.jpg" alt="logo" style="width:25%" /> </td>
  </tr>
</table>


<table width="100%" border="0" align="center"  style="margin-top:5px;">
  <tr>
    <td style="font-size:26px; font-weight:bold; font-family:Arial, Helvetica, sans-serif; text-align:center; color:#0180c7; background-color:#eeeeff; " >SUMMER TRAINING ENROLLMENT FORM </td>
  </tr>
</table>


<table width="100%" border="0" align="center"   style="margin-top:5px;" >
  <tr>
    <td style="font-size:20px; font-weight:bold; font-family:Arial, Helvetica, sans-serif; text-align:center; color:#0180c7; border-bottom-style:dotted; margin-top:10px;" >Registration Form for B. Tech Students </td>
  </tr>
</table>
<?php
$con=mysqli_connect("localhost","knowlblv_fscontu","UKTH7fpw[MD?","knowlblv_fscontactus");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="INSERT INTO strf2016 (course, email, mobile, fname, lname, address, city, pin, college, stream, year)
VALUES
('$_POST[choose_course]', '$_POST[email]', '$_POST[mobile]', '$_POST[first_name]', '$_POST[last_name]', '$_POST[address]', '$_POST[city]', '$_POST[pin_code]', '$_POST[college_name]', '$_POST[stream_name]', '$_POST[year]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
?>
  
  <Center><?php
// This results in an error.
// The output above is before the header() call
header('Location: form2.html');
?></center>
<?php
mysqli_close($con);
?>