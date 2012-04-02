<html>
<head>
<script type="text/javascript" src="<?php echo base_url()."/jquery.js" ;?>"></script>
<script type="text/javascript">
$(document).ready(function(){
	//this will get the message of the action:insertion/delete/update
	var msg=$("div").attr("id");

	//this will show the required message in the html page
	$("div").html(msg).show().fadeOut(8000);

	//this will print message in the console
	console.log("document.ready");

	//whel delete will be clicked
	$('.delete').click(function(){
	
		//this will print message in console
		console.log("click");
		//this will ask for confirmation to delete
		var ans=confirm( "are you sure you want to delete " );
		//if ok
		if(ans)
		{
			console.log("if block");
			//the primary key to delete an employee
			var key=$(this).attr("id");
			
			$.ajax({	
					
					url:"<?php echo base_url()."index.php/employee/employee_delete";?>/"+key,
					
					
					success: function(data)
					{
						console.log(data);
						//if delete action is successful
						if(data=='success')
						{
							$('#tr_'+key).remove();
						}
					}
					

				});	//end of ajax request
			
		}
		//if dont want to delete
		else
		{
			console.log("else block");
			return false;
		}
   
	});	//end of click

});	//end of document.ready
</script>
</head>
<body>

<table bgcolor="#00FFFF"  align="center" cellspacing='10' cellpadding='10'>

	<tr>
		<td ><div style="color: red" id="<?php echo $msg ;?>"></div></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
<tr><!--heading-->
<th>name</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>

<?php

/*this will show the names of the employee*/
foreach($data as $key =>$value)
{
?>
	

	<tr id="tr_<?php echo $key;?>"><!--Name of  employees-->
			<td><p><?php echo $value;?></p></td>
			<!--EDIT-->
			<td><a class='edit' href="<?php echo base_url()."/index.php/employee/employee_edit/$key";?>">edit</a></td>
			<!--DELETE-->
			<td><a id="<?php echo $key;?>" class='delete' href="#" >delete</a></td>
		
	</tr>
	


<?php
}
?>
<tr>
		<!--ADD NEW EMPLOYEE-->
		<td><a href="<?php echo base_url()."/index.php/employee/add_employee";?>">add new employee</a></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
</tr>
<tr>
		<td><a href="<?php echo base_url()."/index.php/employee/logout";?>">logout</a></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
</tr>
</table>
</body>
</html>
