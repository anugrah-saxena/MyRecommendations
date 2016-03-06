<?php
session_start();
include("dbcon1.php");
$c_id=$_SESSION['myvar'];
$pass=$_POST['submit'];
echo $pass;
echo $c_id;
 $sql="INSERT INTO customer_owned(customer_id,product_id)
VALUES
('$c_id','$pass')";


$result2 = mysql_query("SELECT count FROM gadget WHERE product_id='$pass'");
$row=mysql_fetch_array($result2);
$count=$row['count'];
$count=$count+1;
 $sql2="UPDATE gadget SET count='$count' WHERE product_id='$pass'";




if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  if (!mysql_query($sql2,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

mysql_close($con);



?>