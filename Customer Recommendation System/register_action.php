<?php
session_start();
include("dbcon1.php");



function createid($length,$chars) {
	
	$i = 0;
	$customer_id = "";
	while ($i <= $length) {
		$customer_id .= $chars{mt_rand(0,strlen($chars))};
		$i++;
	}
	return $customer_id;
}
$customer_id = createid(4,$_POST[1]);

echo $customer_id;	

$age=$_POST[2];
$income=$_POST[3];





if ($age<25)
$age='Y';
else if ($age<50)
$age='M';
else  
$age='S';



if ($income<300000)
$income='L';
else if ($income<700000)
$income='M';
else  
$income='H';

echo $age;
echo $income;

$sql="INSERT INTO customer (customer_id,name,age,annual_income,profession,interest1,interest2)
VALUES
('$customer_id','$_POST[1]','$age','$income','$_POST[4]','$_POST[5]','$_POST[6]')";


if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
else {

echo "<pre>"."<pre>";
echo "PEASE NOTE THE FOLLOWING DETAILS";
echo "<pre>"."<pre>";
echo "your user name is: ".$customer_id;

}



mysql_close($con)
?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><a href="login.php">login</a></p>
