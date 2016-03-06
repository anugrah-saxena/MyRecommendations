<?php
session_start();
ob_start();
?>

<?php
$c_id=$_POST[1];

session_register("c_id");
$_SESSION['myvar'] = $c_id;
include("dbcon1.php");




$result = mysql_query("SELECT * FROM customer WHERE customer_id='$c_id'");
echo "<table border='1' bgcolor=\"#999999\">";
while($row = mysql_fetch_array($result) )
  {
  
 $age= $row['age'];
 $income= $row['annual_income'];
 
  
    echo "<tr>";
		echo "HI, {$row['name']}";
		    echo "</tr>";
			   echo "<tr>"."</tr>";
			    echo "<tr>";
	  echo "<td>Customer ID: {$row['customer_id']}</td>";
	      echo "</tr>";
		      echo "<tr>";
			  $profession=$row['profession'];
	 echo "<td>Profession: {$row['profession']}</td>";
    echo "</tr>";
  }
  echo "</table>";

echo "<pre>"."</pre>";  
?>
<?php
echo "<pre>"."</pre>";  
include("suggestion.php");
?>

<?php
echo "<pre>"."</pre>";  
echo "<pre>"."</pre>";  
include("suggestion_mostbuy.php");
?>
<?php
  
echo "<pre>"."</pre>";  
echo "<pre>"."</pre>";  
  

$result1 = mysql_query("SELECT * FROM gadget ");
echo "<table border='1' bgcolor=\"#999999\">";
echo "<caption><h3>Various Gadgets</h3></caption>";
echo "<tr><th>Gadget name</th><th>Gadget type</th><th>Gadget Price (in Rs.)</th><th>Buy</th></tr>";
while($row = mysql_fetch_array($result1) )
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
  
$_SESSION['age']=$age;  
 $_SESSION['income']=$income;   

  
  echo "</table>";
mysql_close($con);
?>
