<?php
$institute=$_POST[1];
include("../dbcon1.php");
?>


<script>
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	
	
	function getCity(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>APPLY ONLINE</title>
<link rel="stylesheet" type="text/css" href="css/form.css" />

<script type="text/javascript" src="student_register_js.js"></script>
   
<style type="text/css">
#form1 div p .third {
	color: #F00;
}
#form1 div h5 .third {
	color: #F00;
}
</style>
</head>

<body background="images/emblem.gif">
<form id="form1" name="form1" method="post" action="register_action.php " onSubmit="return finalchek();" , enctype="multipart/form-data">
  <label>
  <img src="images/head2.jpg" width="100%" height="99" alt="mhrd" />
  <div align="center">
    <p>&nbsp;</p>
    <h2 >APPLY ONLINE</h2>
    <h5 > <em class="third" >(all fields are mandatory)</em></h5>     
  </div>
  </label>

  <p>&nbsp;</p>
  <fieldset class="first"> 

<div> <label>Select Institute : </label> <select name="16" id="16"> 
       <?php
		

		
$result2 = mysql_query("SELECT name FROM institute WHERE type_ins='$institute'"); 
while($row = mysql_fetch_array($result2))
{$ins_name=$row['name'];
		echo "<option value={$ins_name}>{$ins_name}</option>";
  ?>
  
  <?php }  ?>  
       </select> </div>    
       
<div> <label>  Scheme : </label> <select name="17" id="17">      
      <option value="0">10+2</option>
      <option value="1">graduation</option>
    </select> </div>
 
     
<div> <label>Category : </label> <select name="18" id="18">
      <option value="SC">SC</option>
      <option value="ST">ST</option>
      <option value="OBC">OBC</option>
    </select> </div>       
       

<div> <label>Full Name : </label> <input type="text" name="1" id="1" onFocus="atfocus(this,document.getElementById('1h'))"  onblur="check(this,document.getElementById('1h'))" />  <span id="1h"></span>   </div> 
     
<div> <label> DOB : </label> <input type="text" name="2" id="2" onFocus="atfocus(this,document.getElementById('2h'))"  onblur="check(this,document.getElementById('2h'))"  />  <span id="2h"></span></div>
  
<div> <label>Roll no: </label> <input type="text" name="3" id="3" onFocus="atfocus(this,document.getElementById('3h'))"  onblur="check(this,document.getElementById('3h'))" />  <span id="3h"></span>   </div> 
     
<div> <label> Father's Name: </label> <input type="text" name="4" id="4" onFocus="atfocus(this,document.getElementById('4h'))"  onblur="check(this,document.getElementById('4h'))"  />  <span id="4h"></span></div>                                       

<div> <label>Address line 1: </label> <input type="text" name="20" id="20" onFocus="atfocus(this,document.getElementById('20h'))"  onblur="check(this,document.getElementById('20h'))"  />  <span id="20h"></span> </div>

<div> <label>Address line 2: </label> <input type="text" name="21" id="21" onFocus="atfocus(this,document.getElementById('21h'))"  onblur="check(this,document.getElementById('21h'))"  />  <span id="21h"></span> </div>  
 

<div> <label>State : </label> <select name="state" id="23" onChange="getCity('findcity.php?state='+this.value)">
 
	<option value="">Select State</option>
	<option value="RAJASTHAN">RAJASTHAN</option>
	<option value="UTTAR PRADESH">UTTAR PRADESH</option>
        </select>
  
    <div> <label>Select City  :</label>
    <div id="citydiv"><select name="city" id="22">
	<option>Select City</option>
        </select></div>






 





                                            


<div> <label>Pincode: </label> <input type="text" name="24" id="24" onFocus="atfocus(this,document.getElementById('24h'))"  onblur="check(this,document.getElementById('24h'))"  />  <span id="24h"></span> </div>  

<div> <label>Name Of Examination : </label> <select name="6" id="6">
      <option value="IIT">IIT</option>
      <option value="AIEEE">AIEEE</option>
      <option value="CAT">CAT</option>
      <option value="GATE">GATE</option>
      <option value="GMAT">GMAT</option>
    </select> </div> 

<div> <label>Rank in Examination : </label> <input type="text" name="7" id="7" onFocus="atfocus(this,document.getElementById('7h'))"  onblur="check(this,document.getElementById('7h'))" />  <span id="7h"></span> </div> 
 
<div> <label>Rank in Institute : </label> <input type="text" name="8" id="8" onFocus="atfocus(this,document.getElementById('8h'))"  onblur="check(this,document.getElementById('8h'))" />   <span id="8h"></span> </div>
 
      
<div> <label>Course of Study : </label> <select name="9" id="9">
      <option value="BTECH">BTECH</option>
      <option value="BCOM">BCOM</option>
      <option value="MTECH">MTECH</option>
      <option value="MBA">MBA</option>
      <option value="PHD">PHD</option>
    </select> </div> 
    
<div> <label>Duration of Course : </label> <select name="10" id="10">
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="7">7</option>
    </select> </div>                                            

<div> <label>Present Year Of Study: </label> <select name="11" id="11">
      <option value="1">1</option>      
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
    </select> </div>  

 
<div> <label>Parents annual income : </label> <input type="text" name="12" id="12" onFocus="atfocus(this,document.getElementById('12h'))"  onblur="check(this,document.getElementById('12h'))" />  <span id="12h"></span> </div> 
  
<div> <label>Annual fee : </label> <input type="text" name="13" id="13" onFocus="atfocus(this,document.getElementById('13h'))"  onblur="check(this,document.getElementById('13h'))" />  <span id="13h"></span> </div> 
  
<div> <label>Other non refundable charges : </label> <input type="text" name="14" id="14" onFocus="atfocus(this,document.getElementById('14h'))"  onblur="check(this,document.getElementById('14h'))" />  <span id="14h"></span> </div> 
   
<div> <label>Lodging & Boarding Charges : </label> <input type="text" name="15" id="15" onFocus="atfocus(this,document.getElementById('15h'))"  onblur="check(this,document.getElementById('15h'))" />  <span id="15h"></span> </div> 
        
<br />

 

    
 <div> <label>10 th marksheet: </label>
 <input type="file" name="file1" id="file1" />
<br /></div>
       
  <div> <label>12 th marksheet: </label>
 <input type="file" name="file2" id="file2" />
<br /></div>

 <div> <label>Photograph: </label>
 <input type="file" name="file3" id="file3" />
<br /></div>

 <div> <label>ID Card: </label>
 <input type="file" name="file4" id="file4" />
<br /></div>

 <div> <label>Caste Certificate : </label>
 <input type="file" name="file5" id="file5" />
<br /></div>
 
    
 </fieldset>  
 


<br />

 
<fieldset> <input type="submit" name="40" id="40" value="Submit" />      <input type="reset" name="41"  value="Reset" onClick="clearall(6)" />  </fieldset>
  
  

  
</form>
<div align="center"></div>
</body>
</html>
