<?php
session_start();
include("dbcon1.php");
$c_id=$_SESSION['myvar'];

$result = mysql_query("SELECT * FROM customer WHERE customer_id='$c_id'");
$row=mysql_fetch_array($result);
$profession=$row['profession'];




echo "<pre></pre>";
$result3 = mysql_query("SELECT * FROM gadget where target_profession1='$profession'");
echo "<table border='1' bgcolor=\"#999999\">";
echo "<caption><b>CHECK out what other '$profession' BUY</b></caption>";
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
  
  
  //suggestions from customer _owned
  
  
$result4 = mysql_query("SELECT product_id FROM customer_owned where customer_id=$c_id");



  
  
?>