<?php
class Blog extends CI_Controller {

	public function index()
	{
		$data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');
		$config['hostname'] = "localhost";
		$config['username'] = "root";
		$config['password'] = "gp@123";
		$config['database'] = "Employee_Details";
		$config['dbdriver'] = "mysql";
		$config['dbprefix'] = "";
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
		$data['title'] = "My Real Title";
		$data['heading'] = "My Real Heading";
		$this->load->model('Blogmodel' ,'', $config);
	 	$this->Blogmodel->show(); 
		$this->load->view('blogview', $data);
	}

	public function comments()
	{
		echo 'Look at this!';
	}
/*$config['hostname'] = "localhost";
$config['username'] = "root";
$config['password'] = "gp@123";
$config['database'] = "Employee_Details";
$config['dbdriver'] = "mysql";
$config['dbprefix'] = "";
$config['pconnect'] = FALSE;
$config['db_debug'] = TRUE;
$config['cache_on'] = FALSE;
$config['cachedir'] = "";
$config['char_set'] = "utf8";
$config['dbcollat'] = "utf8_general_ci";

$this->load->database($config);*/
//$dsn = 'mysql://root:gp@123@hostname/database';

//$this->load->database($dsn);
}
?>