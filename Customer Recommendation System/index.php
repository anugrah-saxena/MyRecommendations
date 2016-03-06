<?php
session_start();
$username=$_SESSION['myvar'];
include("dbcon1.php");
echo "LIST OF COMPANIES";
echo "<hr>";
echo "<pre>"."</pre>";
$result = mysql_query("SELECT v_id FROM apply WHERE app_id='$username'");



while($row = mysql_fetch_array($result))
{
	$v_id=$row['v_id'];

$result2=mysql_query("select * from profiles where p_id='$v_id'");

while($row = mysql_fetch_array($result2))
  {
  $c_nm=$row['c_nm'];
  $p_nm=$row['p_nm'];
  
    echo "<pre>" ."<a href=student_url1.php?var1=$app_id>$c_nm</a>".":                      "."$p_nm"."<hr>"."</pre>";
 
     
  }

}


mysql_close($con)
?>
