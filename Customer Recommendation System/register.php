<?php
$institute=$_POST[1];
include("dbcon1.php");
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

<form id="form1" name="form1" method="post" action="register_action.php " onSubmit="return finalchek();" , enctype="multipart/form-data">
  <label>
  <div align="center">
    <p>&nbsp;</p>
    <h2 >APPLY ONLINE</h2>
    <h5 > <em class="third" >(all fields are mandatory)</em></h5>     
  </div>
  </label>

  <p>&nbsp;</p>
  <fieldset class="first"> 



<div> <label>Full Name : </label> 
<input type="text" name="1" id="1" onFocus="atfocus(this,document.getElementById('1h'))"  onblur="check(this,document.getElementById('1h'))" />  <span id="1h"></span>   </div> 
     
<div> <label> AGE : </label> 
<input type="text" name="2" id="2" onFocus="atfocus(this,document.getElementById('2h'))"  onblur="check(this,document.getElementById('2h'))"  />  <span id="2h"></span></div>
  
<div> <label>Annual Income </label> <input type="text" name="3" id="3" onFocus="atfocus(this,document.getElementById('3h'))"  onblur="check(this,document.getElementById('3h'))" />  <span id="3h"></span>   </div> 
     


    

<div> <label>Profession: </label> <select name="4" id="4">
      <option value="student">STUDENT</option>      
      <option value="businessman">BUSINESSMAN</option>
       <option value="engineer">ENGINEER</option>
    </select> </div>  


 <div> <label>Interest 1: </label> <select name="5" id="5">
      <option value="education">EDUCATION</option>      
      <option value="technology">TECHNOLOGY</option>
       <option value="electronics">ELECTRONICS</option>
    </select> </div>  

<div> <label>Interest 2: </label> <select name="6" id="6">
      <option value="sport">SPORTS</option>      
      <option value="clothings">CLOTHINGS</option>
       <option value="fashion">FASHION</option>
    </select> </div>  



 
    
 </fieldset>  
 


<br />

 
<fieldset> <input type="submit" name="40" id="40" value="Submit" />      <input type="reset" name="41"  value="Reset" onClick="clearall(6)" />  </fieldset>
  
  

  
</form>
<div align="center"></div>
</body>
</html>
