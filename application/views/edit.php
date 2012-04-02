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
		
		$('#div2').html("please enter a phone number");
		$("#div2").show();
		$("#div2").fadeOut(4000);
		return false;
	}
	//it will check for length of phone number
	else  if (phno.length>10 ||  phno.length<10)
	{
		
			$('#div2').html("enter 10 numbers ");
			$("#div2").show();
			$("#div2").fadeOut(4000);
			return false;
	}
	//it will check the entered value is number or not
	  else  if(isNaN(phno)||phno.indexOf(" ")!=-1)
           {
               $('#div2').html("Enter numeric value");
		$("#div2").show();
		$("#div2").fadeOut(4000);
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
		$("#div3").html("please enter official email id");
		$("#div3").show();
		$("#div3").fadeOut(4000);
		return false;
	}
	//this will check for proper email id pattern,if not proper it will return false
	else if(emailPattern.test(off_id )==false)
	{
		$("#div3").html("enter in the format aaa@sss.com");
		$("#div3").show();
		$("#div3").fadeOut(4000);
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
	var alt_id=$("input:text#alt_d").val();
	//this is the patter of the email id
	 var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
	 
	//check for empty filed
	if(alt_id=="")
	{
		$("#div4").html("please enter official email id");
		$("#div4").show();
		$("#div4").fadeOut(4000);
		return false;
	}
	
	//check for pattern
	else if(emailPattern.test(alt_id)==false)
	{
		$("#div4").html("enter in the format aaa@sss.com");
		$("#div4").show();
		$("#div4").fadeOut(4000);
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
	var qual=$("input:text#qual_id").val();
	
	//check for empty filed
	if(qual=="")
	{
		$("#div5").html("please enter qualification of employee");
		$("#div5").show();
		$("#div5").fadeOut(4000);
		return false;
	}
	
	else
		return true;
}
/*This function will validate percentage*/
function validatePercentage()
{
	//get entered value for percentage
	var per=$("input:text#percentage_id").val();
	//check for empty field
	if(per=="")
	{
		document.getElementById("div6").innerHTML="please enter % secured by  employee";
		$("#div6").show();
		$("#div6").fadeOut(4000);
		return false;
	}
	//check the entered value is a number or not
	else  if(isNaN(per)||per.indexOf(" ")!=-1)
           {
               $('#div6').html("Enter numeric value");
			$("#div6").show();
			$("#div6").fadeOut(4000);
			return false;
           }
	   
	   else
	   return true;
}

/*This funtion will validate salary*/

function validateSalary()
{
	//get the entered value for salary
	var salary=$("input:text#salary_id").val();
	//check for empty filed
	if(salary=="")
	{	//alert("blank");
		$("#div7").html("please enter employee's salary");
		$("#div7").show();
		$("#div7").fadeOut(4000);
		return false;
	}
	//check the entered value is number or not
	else  if(isNaN(salary)|salary.indexOf(" ")!=-1)
	{
		$('#div7').html("Enter numbrs for salary");
		$("#div7").show();
		$("#div7").fadeOut(4000);
		return false;
	}
	
	   else
	   return true;
}

</script>

</head>
<body>
<?php 
foreach($data as $value)
{	
$name=$data[0];
$phone=$data[1];
$official_id=$data[2];
$alte_id=$data[3];
$qualfi=$data[4];
$salary=$data[5];
$percentage =$data[6];
$date_join=$data[7];
$employee_id=$data[8];

}
?>
	<?php echo form_open('employee/update'); ?>
	
	<table bgcolor="#0000FF" cellspacing="5" cellpadding="5" align="center">
	<input type='hidden' name="employee_id" value="<?php echo $employee_id;?>">
	<tr>
		<td>Name</td>
		<td><input type='text' name='txtName' id='textName' value="<?php echo $name;?>" ></td>
		<td><div style="color: red"  id="div1" ></div></td>
	</tr>
	
	<tr>
		<td>phone</td>
		<td><input type='text' name="textphone" id='phoneId' value="<?php echo $phone;?>" ></td>
		<td><div style="color: red" id="div2" ></div></td>
	</tr>

	<tr>
		<td>official email</td>
		<td><input type='text' name='off_email' id='official_id' value="<?php echo $official_id;?>"></td>
		<td><div style="color: red" id="div3" ></div></td>
	</tr>
	<tr>
		<td>alternate email</td>
		<td><input type='text' name='alt_email' id='alt_d' value="<?php echo $alte_id;?>"></td>
		<td><div style="color: red" id="div4" ></div></td>
	</tr>
	<tr>
		<td>highest qualification</td>
		<td><input type='text' name='txtqualification' id='qual_id' value="<?php echo $qualfi;?>"></td>
		<td><div style="color: red" id="div5" ></div></td>
	</tr>
	<tr>
		<td>percentage secured</td>
		<td><input type='text' name='percentage' id='percentage_id' value="<?php echo $percentage;?>"></td>
		<td><div style="color: red" id="div6" ></div></td>
	</tr>
	<tr>
		<td>salary</td>
		<td><input type='text' name='txtSalary' id='salary_id' value="<?php echo $salary;?>"></td>
		<td><div style="color: red" id="div7" ></div></td>
	</tr>
	<tr>
		<td><input type="submit" value="submit"  ></td>
		<td><input type='reset' value='reset'></td>
		<td>&nbsp;</td>
	</tr>
	
	</table>
	</form>
</body>
</html>