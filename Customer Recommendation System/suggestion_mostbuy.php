
<?php
session_start();
include("dbcon1.php");
$c_id=$_SESSION['myvar'];



$result = mysql_query("SELECT * FROM customer WHERE customer_id='$c_id'");
$row=mysql_fetch_array($result);



$result5 = mysql_query("SELECT avg(count) FROM gadget");
$avg=mysql_fetch_array($result5);


echo "<pre></pre>";
$result3 = mysql_query("SELECT * FROM gadget where count > '$avg'");
echo "<table border='1' bgcolor=\"#999999\">";
echo "<caption><b>Check our best buy</b></caption>";
echo "<tr><th>Gadget name</th><th>Gadget type</th><th>Gadget Price (in Rs.)</th><th>Buy</th></tr>";
while($row = mysql_fetch_array($result3) )
  {
  	  $gadget=$row['name'];
  	  $pass=$row['product_id'];
    echo "<tr>";
	  echo "<form id=form2 name=form2 method=post action=customer_buy.php>";
    echo "<td>{$row['name']}</td>";
	   echo "<td>{$row['type']}</td>";
	      echo "<td>{$row['price']}</td>";
		    echo "<td>" . "<input type=submit name=submit value=$pass />" . "</td>";
	  echo "</form>";
    echo "</tr>";

  }
  
 echo "</table>";
  //suggestions from customer _owned
  
  
$result4 = mysql_query("SELECT product_id FROM customer_owned where customer_id=$c_id");



  
  
?>