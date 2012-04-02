<?
class Send_Email extends  CI_Controller
{
/*function Send_Email()
 
{
	parent::Controller();
}*/
function index()
{
  $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => 'email_address@gmail.com', // change it to yours
  'smtp_pass' => 'your_password', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);
 
  $this->load->library('email', $config);
  $this->email->set_newline("\r\n");
  $this->email->from('devyani.chinu@gmail.com.com'); // change it to yours
  $this->email->to('devyani.chinu@gmail.com.com'); // change it to yours
  $this->email->subject('Email using Gmail.');
  $this->email->message('Working fine ! !');
 
  if($this->email->send())
 {
  echo 'Email sent.';
 }
 else
{
 show_error($this->email->print_debugger());
}
}
}?>