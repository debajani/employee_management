<html>
<?php
$newdata = array('email'     =>$this->input->post("email"),
			'password' =>$this->input->post("password") );
			
			$this->session->unset_userdata($newdata);
			echo base_url()."/index.php/employee/";
?>
</html>