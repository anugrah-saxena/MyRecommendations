<?php
session_start();
include("dbcon1.php");
$age=$_SESSION['age'];
$income=$_SESSION['income'];

echo "HI age".$age;
echo "<pre>"."</pre>";
echo "HI income".$income;
echo "<pre>"."</pre>";

/*echo "<table border='1' bgcolor=\"#999999\">";
echo "<caption><b>CHECK out BAYESIAN BUY RECOMMENDATIONS</b></caption>";
echo "<tr><th>Gadget name</th><th>Gadget type</th><th>Gadget Price (in Rs.)</th><th>Buy</th></tr>";
*/

$result = mysql_query("SELECT distinct product_id FROM  customer_owned ");

while($row = mysql_fetch_array($result) )

{

  
$product="P".$row['product_id'];
$pid=$row['product_id'];
echo "<pre>"."</pre>";
echo "<pre>"."</pre>";
echo "<pre>"."</pre>";
echo $product;
echo "<pre>"."</pre>";
echo "i m pid".$pid;
echo "<pre>"."</pre>";


$sql="CREATE table $product SELECT customer_id,age,annual_income,buy FROM customer";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

$sql2="UPDATE  $product SET $product.buy=1 WHERE customer_id IN(
select customer_id from customer_owned where product_id='$pid')";

if (!mysql_query($sql2,$con))
  {
  die('Error: ' . mysql_error());
  }
  
  
$sql3="UPDATE  $product SET $product.buy=0 WHERE customer_id IN(
select customer_id from customer_owned where product_id!='$pid')";

if (!mysql_query($sql3,$con))
  {
  die('Error: ' . mysql_error());
  }  


$result2 = mysql_query("SELECT  * FROM  $product  ");



$count=0;
$yes=0;
$no=0;
$age_yes=0;
$age_no=0;
$income_yes=0;
$income_no=0;


while($row2 = mysql_fetch_array($result2) )
{

$count=$count+1;
if($row2['buy']==1)
$yes=$yes+1;
if($row2['buy']==0)
$no=$no+1;

if ($row2['age']==$age && $row2['buy']==1)
$age_yes=$age_yes+1;
if ($row2['age']==$age && $row2['buy']==0)
$age_no=$age_no+1;
if ($row2['annual_income']==$income && $row2['buy']==1)
$income_yes=$income_yes+1;
if ($row2['annual_income']==$income && $row2['buy']==0)
$income_no=$income_no+1;

}
echo "hey i m count".$count;
echo "<pre>"."</pre>";
echo "hey i m yes".$yes;
echo "<pre>"."</pre>";
echo "hey i m no".$no;
echo "<pre>"."</pre>";
echo "hey i m age_yes".$age_yes;
echo "<pre>"."</pre>";
echo "hey i m age_no".$age_no;
echo "<pre>"."</pre>";
echo "hey i m income_yes".$income_yes;
echo "<pre>"."</pre>";
echo "hey i m income_no".$income_no;
echo "<pre>"."</pre>";
$prob_yes=$yes/$count;
echo "hey i m yes_prob".$prob_yes;
echo "<pre>"."</pre>";
$prob_no=$no/$count;
echo "hey i m no_prob".$prob_no;
echo "<pre>"."</pre>";
//age starts here
$prob_age_yes=$age_yes/$yes;
echo "hey i m prob_age_yes".$prob_age_yes;
echo "<pre>"."</pre>";
$prob_age_no=$age_no/$no;
echo "hey i m prob_age_no".$prob_age_no;
//income starts here
$prob_income_yes=$income_yes/$yes;
echo "hey i m prob_income_yes".$prob_income_yes;
echo "<pre>"."</pre>";
$prob_income_no=$income_no/$no;
echo "hey i m prob_income_no".$prob_income_no;

//final calculations
echo "<pre>"."</pre>";
$prob_product_yes=$prob_age_yes*$prob_income_yes*$yes;
echo "hey i m final_yes".$prob_product_yes;


echo "<pre>"."</pre>";
$prob_product_no=$prob_age_no*$prob_income_no*$no;
echo "hey i m final_no".$prob_product_no;


//$resultn = mysql_query("SELECT * FROM gadget where product_id='$pid'");
if($prob_product_yes>$prob_product_no)
{
echo "<pre>"."</pre>";
echo "HEY CHECK OUT OUR LABOURED RECOMMENDATION FOR YOU THAT IS OUR PRODUCT NO ::::".$pid;
echo "<pre>"."</pre>";
  /*  echo "<tr>";
	  echo "<form id=form2 name=form3 method=post action=customer_buy.php>";
    echo "<td>{$row['name']}</td>";
	   echo "<td>{$row['type']}</td>";
	      echo "<td>{$row['price']}</td>";
		    echo "<td>" . "<input type=submit name=submit value=$pass />" . "</td>";
	  echo "</form>";
    echo "</tr>";
*/
}
else
{
echo "<pre>"."</pre>";
echo "SORRY WE HAVE NO RECOMMENDATION FOR YOU RIGHT NOW".$pid;
echo "<pre>"."</pre>";
}


mysql_query("drop table $product",$con);




}


?>



