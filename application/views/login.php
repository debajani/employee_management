<html>
<head>
<script type="text/javascript" src="<?php echo base_url()."/jquery.js" ;?>"></script>
<script type="text/javascript">
var status = false;
$(document).ready(function(){

	$("form").submit(function ()
		{
			//it will get entered value for email
			var email=$("input:text#email").val();
			
			//pattern of email id
			 var emailPattern =new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i); 
						 
			 //it will get input value for password
			 var password=$("input:password#pswd").val();
			 
			//check for digit
			var patt1=/[0-9]/g;
			
			//check for non digit
			var patt2=/\W/g;
			//this will check for special numbers,if it is present then it will return true else it will return true
			var str1=patt1.test(password);
			//this will check for special characters,if it is present then it will return true else it will return true
			var str2=patt2.test(password);
			
			//this will check whther this field is filled or not
			if(email=="")
			{
	
				$("#div1").html("enter your email id").show().fadeOut(8000);
				console.log("email false");
				status = false;
			}
			else
			{
				console.log("email true");
				status = true;
			}
			
			//this will check the email pattern
			 if(emailPattern.test(email)==false)
			{
	
				$("#div1").html("enter in the format aaa@sss.com").show().fadeOut(8000);
				console.log("emailPattern false");
				status = false;
			}
			else
			{
				console.log("emailPattern true");
				status = true;
			}
			//if password field is empty
			 if(password=="")
			{
				
				$("#div3").html("enter your password").show().fadeOut(8000);
				console.log("password false");
				
				status = false;
			}
			else
			{
				console.log("password true");
				status = true;
			}
			//this will check for password length
			 if(password.length<4 || password.length>10)
			{
					
				$("#div3").html("password should be within 4 to 10").show().fadeOut(8000);
				console.log("password  length false");
				
				status = false;
			}
			else
			{
				console.log("password  length true");
				status = true;
			}
			//it will check whether the input value contains a number and special character
			 if(str1==false || str2==false)
			{
					
				$("#div3").html("password field should <br>contain a number <br>and special character").show().fadeOut(8000);
				console.log("password  number and special character false");
				status = false;
			}
			else
			{
				console.log("password  number and special character true");
				status = true;
			}
			
			
			return status;
	
	});



});
</script>
</head>
	<body>
	
	<!-- this will open a form-->
	<?php echo form_open('employee/login_varification'); ?>
	
	<table bgcolor="#0000FF" cellspacing="5" cellpadding="5" align="center">
	<tr><!--email address -->
		<td>Email</td>
		<td><input type="text" id="email" name="email"  ></td>
		<td><div style="color: red" id="div1" ></div></td>
	</tr>
	<tr><!--password -->
		<td>Password:</td>
		<td><input type="password" id="pswd" name="password" ></td>
		<td><div style="color: red" id="div3" ></div></td>
	</tr>
	<tr>
		<td><input type="submit" value="submit"></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	</table>
	</form><!-- end of form form-->
	</body>
	</html>
