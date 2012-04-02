<html>
<head>
</head>
<body>
<?php

foreach($data as $value)
{
//name
$name=$data[0];
//phone number
$phone=$data[1];
//official email address
$official_id=$data[2];
//alternate email address
$alte_id=$data[3];
//qualification
$qualfi=$data[4];
//address
$address=$data[5];
//percentage
$percentage =$data[6];
//joining date
$date_join=$data[7];
//$photo=$data[8];

}
?>

<table bgcolor="#00FFFF"  align="center" cellspacing='10' cellpadding='10'>
	
	<tr><td>name</td>
		<td>
			<?php echo $name; ?>
		</td>
	</tr>
	<tr><td>phone</td>
		<td>
			<?php echo $phone; ?>
		</td>
	</tr>
	<tr><td>official email</td>
		<td>
			<?php echo $official_id; ?>
		</td>
	</tr>
	<tr><td>alternate email</td>
		<td>
			<?php echo$alte_id; ?>
		</td>
	</tr>
	<tr><td>highest qualification</td>
		<td>
			<?php echo $qualfi; ?>
		</td>
	</tr>
	<tr><td>Address</td>
		<td>
			<?php echo $address; ?>
		</td>
	</tr>
	<tr><td>percentage secured</td>
		<td>
			<?php echo $percentage; ?>
		</td>
	</tr>
	<tr><td>date of join</td>
		<td>
			<?php echo $date_join; ?>
		</td>
	</tr>
	

	<tr>
		<td><a href="<?php echo base_url()."/index.php/employee";?>">logout</a></td>
		<td>&nbsp;</td>
	</tr>
</table>

</body>
</html>