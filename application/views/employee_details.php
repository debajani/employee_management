<html>
<head>
<script type="text/javascript" src="<?php echo base_url()."/jquery.js" ;?>"></script>
<script language='javascript'>
$(document).ready(function(){

	$("form").submit(function ()
	{
		/*This will check all the functions for each field */
		if(validateName()&&validatePhone() && validateOfficeId() && validateAlternateId() && validateQualification() && validatePercentage() && validateSalary())
		{
			return true;
		}
		
		//if any of the fild is not validate then it will return false
		else
		return false;
		
	
	});



});

/*This will validate the name filed*/
function validateName()
	{

		var name=$("input:text#textName").val();
		
		//document.write(name);
		var firstAlpha=name.charAt(0);
		
		//this will check for special character
		var patt1=/\W/g;
		
		//this will check for numbers
		var patt2=/[0-9]/g;
		
		//this will check for special characters,if it is present then it will return true else it will return true
		var str1=patt1.test(firstAlpha) ;
		
		//this will check for numbers,if it is present then it will return true else it will return true
		var str2=patt2.test(firstAlpha);	
		
		//it will check for empty field for name
		if(name=="")
		{	
				
				$("#div1").html("name field can not be left blank");	
				$("#div1").show();
				$("#div1").fadeOut(4000);
				return false;
				
		}
		//it will check that the first letter should be an alphabet
		
		else if(str1!==false || str2!=false)
		{	
			$("#div1").html("name should contain  an alphabet as first letter");
			$("#div1").show();
			$("#div1").fadeOut(4000);
			return false;
		}
		
		else
		{
			return true;
		}
	
	} 
	


/*This will validate the phone number*/
function validatePhone()
{
	//it will get value from html page
	var phno=$("input:text#phoneId").val();
	
	//it will check for empty field
	if(phno=="")
	{	
		
		$('#div3').html("please enter a phone number");
		$("#div3").show();
		$("#div3").fadeOut(4000);
		return false;
	}
	//it will check for length of phone number
	else  if (phno.length>10 ||  phno.length<10)
	{
		
			$('#div3').html("enter 10 numbers ");
			$("#div3").show();
			$("#div3").fadeOut(4000);
			return false;
	}
	//it will check the entered value is number or not
	  else  if(isNaN(phno)||phno.indexOf(" ")!=-1)
           {
               $('#div3').html("Enter numeric value");
		$("#div3").show();
		$("#div3").fadeOut(4000);
		return false;
           }
	   else
	   return true;
}


/*this will validate the official email id*/
function validateOfficeId()
{
	//it will get the entered official email id
	var off_id=$("input:text#official_id").val();
	//this is the pattern of the email id
	 var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
	//this will check for empty field
	if(off_id=="")
	{
		$("#div4").html("please enter official email id");
		$("#div4").show();
		$("#div4").fadeOut(8000);
		return false;
	}
	//this will check for proper email id pattern,if not proper it will return false
	else if(emailPattern.test(off_id )==false)
	{
		$("#div4").html("enter in the format aaa@sss.com");
		$("#div4").show();
		$("#div4").fadeOut(8000);
		return false;
	}
	else
	{
		return true;
	}
}

/*This will validate the altenate email id*/
function validateAlternateId()
{
	//it will get alternate email id from the html page
	var alt_id=$("#alt_id").val();
	//this is the patter of the email id
	 var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
	 
	//check for empty filed
	if(alt_id=="")
	{
		$("#div5").html("please enter official email id");
		$("#div5").show();
		$("#div5").fadeOut(8000);
		return false;
	}
	
	//check for pattern
	else if(emailPattern.test(alt_id)==false)
	{
		$("#div5").html("enter in the format aaa@sss.com");
		$("#div5").show();
		$("#div5").fadeOut(8000);
		return false;
	}
	
	else
	{
		return true;
	}
}

/*This function will validate the qualification*/
function validateQualification()
{	
	//get the entered value for email id
	var qual=$("#qual_id").val();
	
	//check for empty filed
	if(qual=="")
	{
		$("#div6").html("please enter qualification of employee");
		$("#div6").show();
		$("#div6").fadeOut(8000);
		return false;
	}
	
	else
		return true;
}
/*This function will validate percentage*/
function validatePercentage()
{
	//get entered value for percentage
	var per=$("#percentage_id").val();
	//check for empty field
	if(per=="")
	{
		document.getElementById("div7").innerHTML="please enter % secured by  employee";
		$("#div7").show();
		$("#div7").fadeOut(8000);
		return false;
	}
	//check the entered value is a number or not
	else  if(isNaN(per)||per.indexOf(" ")!=-1)
           {
               $('#div7').html("Enter numeric value");
			$("#div7").show();
			$("#div7").fadeOut(8000);
			return false;
           }
	   
	   else
	   return true;
}

/*This funtion will validate salary*/

function validateSalary()
{
	//get the entered value for salary
	var salary=$("#salary_id").val();
	//check for empty filed
	if(salary=="")
	{	//alert("blank");
		$("#div9").html("please enter employee's salary");
		$("#div9").show();
		$("#div9").fadeOut(8000);
		return false;
	}
	//check the entered value is number or not
	else  if(isNaN(salary)||salary.indexOf(" ")!=-1)
	{
		$('#div9').html("Enter numbrs for salary");
		$("#div9").show();
		$("#div9").fadeOut(8000);
		return false;
	}
	
	   else
	   return true;
}

</script>



</head>

<body>
<!--This is the form to enter employee details-->
	<?php echo  form_open_multipart('employee/employee_insert'); ?>
	
	<table bgcolor="#0000FF" cellspacing="5" cellpadding="5" align="center">
	<tr><!--name field-->
		<td>Name</td>
		<td><input type='text' name='txtName' id='textName' ></td>
		<td><div id="div1" style="color: red"></div></td>
	</tr>
	
	<tr><!--date of birth field-->
		<td>DOB</td>
		<td><input type='text' name='dob' id='text' value="yyyy/dd/mm"></td>
		<td><div id="div2" style="color: red"></div></td>
												
	</tr>
	
	<tr><!--gender radio button-->
		<td>gender</td>
		<td><input type='radio' name='gender' value='male'  checked='checked'>male
			<input type='radio' name='gender' value='male' >female</td>
		<td>&nbsp;</td>
	</tr>
	
	<tr><!--phone field-->
		<td>phone</td>
		<td><input type='text' name="textphone" id='phoneId' ></td>
		<td><div id="div3" style="color: red"></div></td>
	</tr>
	<tr>
		<td>address</td>
		<td><textarea rows='3' cols='5' name='textAddress'></textarea></td>
		<td>&nbsp;</td>
	</tr>
	
	<tr><!--official email id-->
		<td>official email</td>
		<td><input type='text' name='off_email' id='official_id' ></td>
		<td><div id="div4" style="color: red"></div></td>
	</tr>
	<tr><!--alternate email id-->
		<td>alternate email</td>
		<td><input type='text' name='alt_email' id='alt_id' ></td>
		<td><div id="div5" style="color: red"></div></td>
	</tr>
	<tr><!--highest qualification email id-->
		<td>highest qualification</td>
		<td><select name='txtqualification' id='qual_id'>
			<option value="btech">BTECH</option>
			<option value="mca">MCA</option>
			<option value="mba">MBA</option>
			<option value="Bca">BCA</option>
			</select>
		</td>
		<td><div id="div6" style="color: red"></div></td>
	</tr>
	<tr><!--official email id-->
		<td>percentage secured</td>
		<td><input type='text' name='percentage' id='percentage_id'  ></td>
		<td><div id="div7" style="color: red"></div></td>
	</tr>
	<tr>
		<td>Date of join</td>
		<td><input type='text' name='doj' id='text' value="yyyy/dd/mm"></td>
		<td><div id="div8" style="color: red"></div></td>
	</tr>
	<tr>
		<td>salary</td>
		<td><input type='text' name='txtSalary' id='salary_id' ></td>
		<td><div id="div9" style="color: red"></div></td>
	</tr>
	<tr>
		<td>Image: </td>
		<td><input type="file" name="image" size="20" /> </td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><input type='submit' value='submit' ></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	</table>
	</form>
</body>
</html>