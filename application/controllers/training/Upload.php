<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('Upload_form' , array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './home/debyani/Documents/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('Upload', $config);

		if ( ! $this->Upload->do_upload())
		{
			$error = array('error' => $this->Upload->display_errors());

			$this->load->view('Upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->Upload->data());

			$this->load->view('upload_success', $data);
		}
	}
}
?>