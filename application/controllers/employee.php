<?php
/*This is the controller class*/
class Employee extends CI_Controller {
	/*This is the constructor of the controller class*/
	  public function __construct()
	       {
			/*This will load the parent class controller*/
			parent::__construct();
			/*this will load the model*/
			$this->load->model('employee_model');
			//this will intialize your upload class
			$this->load->library('upload');
			//this is path where the photo will be uploaded
			$config['upload_path'] = '/var/www/upload';
			//type of photo
			$config['allowed_types'] = 'gif|jpg|png';
			//maximum size of the photo
			$config['max_size']     = '2000';
			//max width of the photo
			$config['max_width']  = '1024';
			//max height of the photo
			$config['max_height']  = '768';  
			
	       }
	       
	/*This will call the login view*/
	public function index()
	{
		$this->load->helper(array('form', 'url'));
		//this will load the log in page
		$this->load->view('login.php');
	}
	
	/*This will accept the emailid and password from log in view page*/	
	public function login_varification()
	{
	
		//This is the new data to be stored in the session
			$newdata = array(
					'email'     =>$this->input->post("email"),
					'password' =>$this->input->post("password")
					);
			//this will set the new value in the session 
			$this->session->set_userdata($newdata);
			
			//the password stored in session
			$session_email = $this->session->userdata('email');
	
	
			//the password stored in session
			$session_password= $this->session->userdata('password' );
			
		if(isset($session_email ) && isset($session_password))
		{
			
			//srver side check for email id and password
			if(!empty($session_email) && !empty($session_password))
			{
				/*passing session variable email id and password to the model function*/
				$type=$this->employee_model->select_login($session_email,$session_password);
				
				/*if email id and password  is present in database*/
				//for normal user
				if($type=='normal')
				{
					
						//for type 0 this function is called 
						$this->employee_details($session_email);
					
					
				}
				//for admin user
				else  if($type=='admin')
				{
					
						//this will redirect to the employee_list method 
						redirect('employee/employee_list', 'refresh');
					
				}
				//if email id or password is not present in database
				else
				{
				
					//this will redirect to the index method
					redirect('employee/index', 'refresh');
				}
			}
			//if email id or password is not set then redirect to index
			else
			{
				redirect('employee/index', 'refresh');
			}
		}
		//if value is not set it will go back to the index page
		else
		{
			redirect('employee/index', 'refresh');
		}
		
		
		
		
			
	}
	
	
	/* this function is to show details of normal user*/
	public function employee_details($email_id)
	{
	
	
			$result1=$this->employee_model->select_specific($email_id);
			
			$this->load->view('view',array("data"=>$result1));
	}
	
	
	/* this function is to show details of all normal user  for the admin */
	public function employee_list()
	{
		

			$session_email = $this->session->userdata('email');
			//the password stored in session
			$session_password= $this->session->userdata('password' );
			
		if((isset($session_email ) && isset($session_password)) && ( !empty($session_email) && !empty($session_password)))
		{
			
			
				//this will show message after insert/update/delete
				if( $this->uri->segment(3))
				{
					$value=$this->uri->segment(3);
					if( $value==="updated")
					{
						$msg="one record updated";
						//return $msg;
					}
					else if( $value==="unable")
					{
						$msg= "unable to update record";
						//return $msg;
					}
					else if( $value==="unset")
					{
						$msg= "you have not select any employee to update";
						//return $msg;
					}
					else if( $value==="delete")
					{
						$msg= "one record deleted";
						//return $msg;
					}
					else if( $value==="unable_delete")
					{
						$msg= "unable to delete employee";
						//return $msg;
					}
					else if( $value==="unset_delete")
					{
						$msg= "you have not seleted any employee to delete";
						//return $msg;
					}
					else if( $value==="insert")
					{
						$msg= "successfully added";
						//return $msg;
					}
					else if( $value==="unable_insert")
					{
						$msg= "unable to add";
						//return $msg;
					}
					else if( $value==="unset_insert")
					{
						$msg= "details of employee not set ";
						//return $msg;
					}
					
				}
				else
				{
					$msg=" ";
				}
					
					//this will call the model method to select all the employees
					$name=$this->employee_model-> select_all();
					
					//this will call the view employee_list to see all the employee name
					$this->load->view('employee_list',array("data"=>$name,"msg"=>$msg));
				
			
			
		}
		else
		{
			redirect('employee/index', 'refresh');
			
		}
		
	}//end of function
	
	/*This will call the edit view page*/
	public function employee_edit($employee_id)
	{
		$session_email = $this->session->userdata('email');
			//the password stored in session
			$session_password= $this->session->userdata('password' );
			
		if((isset($session_email ) && isset($session_password)) && ( !empty($session_email) && !empty($session_password)))
		{
		
			//this function will select details of employee using the employee id
			$info=$this->employee_model->get_user($employee_id);
			
			//this will show the details of the employee in edit page
			$this->load->view('edit',array("data"=>$info));
		}
		//if email id/password is not set
		else
		{
			redirect('employee/index', 'refresh');
		}
	}
	
	/*This function will call the update model method*/
	public function update()
	{
		$session_email = $this->session->userdata('email');
			//the password stored in session
			$session_password= $this->session->userdata('password' );
			
		if((isset($session_email ) && isset($session_password)) && ( !empty($session_email) && !empty($session_password)))
		{
			//name of the employee
			$name = $this->input->post("txtName");
			
			//phone number of the employee
			$phone = $this->input->post("textphone");
			
			//official email id of employee
			$office_id= $this->input->post("off_email");
			
			//alternate email id of employee
			$alt_id= $this->input->post("alt_email");
			
			//qualification of the employee
			$qualification= $this->input->post("txtqualification");
			
			//percentage secured
			$percentage= $this->input->post("percentage");
			
			//salary of the employee
			$salary= $this->input->post("txtSalary");
			
			//employee id
			$employee_id=$this->input->post("employee_id");
			
			//this is server side validation to check all the field are filled or not
			if(isset($name) && isset($phone)
				&& isset($office_id)&& isset($alt_id)
				&& isset($qualification )&&isset($percentage)
				&& isset($salary) &&  isset($employee_id) )
			{
				//converting the details into an associative array
				$employee_info=array(
									'name'=>$name,
									'Phone'=>$phone,
									'official_email'=>$office_id,
									'alternate_email'=>$alt_id,
									'highest_qualification'=>$qualification,
									'percentage_secured'=>$percentage,
									'Salary'=>$salary);
				//this is called to update the employee's information					
				$result=$this->employee_model-> employee_update($employee_id,$employee_info);
				
				//after successfull updation
				if($result==1)
				{
					
					//this will redirect to the previous view after successfull updation
					redirect('employee/employee_list/updated', 'refresh');
				}
				//if updation does not occure
				else
				{
					//echo "unable to update";
					redirect('employee/employee_list/unable', 'refresh');
				}
			}
			// values to be updated are not set  ";
			else
			{
				
				redirect('employee/employee_list/unset', 'refresh');
			}
		}
		//if email id/password is not set
		else
		{
			redirect('employee/index', 'refresh');
		}
	}
	/*This will calll the delete model method*/
	public function employee_delete($value)
	{
		$session_email = $this->session->userdata('email');
			//the password stored in session
			$session_password= $this->session->userdata('password' );
			
		if((isset($session_email ) && isset($session_password)) && ( !empty($session_email) && !empty($session_password)))
		{
			//will check if the value to be deleted is set or not
			if(isset($value))
			{
				$msg_delete=$this->employee_model->employee_delete($value);
				//if successful delition
				if($msg_delete)
				{
					
					//~ redirect('/employee/employee_list/delete','refresh');
					
					echo "success";
					
				}
				//if delition did not occure
				else
				{
					//~ redirect('/employee/employee_list/unable_delete','refresh');
					
					echo "failiure";
					
				}
			}
			//if the value to be deleted is not set
			else
			{
				//~ redirect('/employee/employee_list/unset_delete','refresh');
				
				echo "failiure";
			}
		}
		//if email id/password is not set
		else
		{
			//redirect('employee/index', 'refresh');
			
			echo "failiure";
		}
	}
	
	/*This will call employee_details view page to insert the details of the employee*/
	public function add_employee()
	{
		
	
		//this is calling the view page employee_details to insert the employee's details
		$this->load->view('employee_details');
	}
	
	/*This method will accept the details from the view and pass them to the model method insert() to store in database*/
	public function employee_insert()
	{
		$session_email = $this->session->userdata('email');
			//the password stored in session
			$session_password= $this->session->userdata('password' );
			
		if((isset($session_email ) && isset($session_password)) && ( !empty($session_email) && !empty($session_password)))
		{
			//name of the employee
			$name = $this->input->post("txtName");
			
			//date of birth of employee
			$dob = $this->input->post("dob");
			
			//joining date of employee
			$doj = $this->input->post("doj");
			
			//gender of the employee
			$gender = $this->input->post("gender");
			
			//phone number of the employee
			$phone = $this->input->post("textphone");
			
			//address of the employee
			$address = $this->input->post("textAddress");
			
			//official email id of employee
			$office_id= $this->input->post("off_email");
			
			//alternate email id of employee
			$alt_id= $this->input->post("alt_email");
			
			//qualification of the employee
			$qualification= $this->input->post("txtqualification");
			
			//percentage secured
			$percentage= $this->input->post("percentage");
			
			//salary of the employee
			$salary= $this->input->post("txtSalary");
			//photo of the employee
			$photo= $this->input->post("image");
			
			//this will check all the values to be inserted are set or not 
			if(isset($name) && isset($phone) 
				&& isset($dob)  && isset($doj)
				&& isset($office_id)  && isset($alt_id) 
				&& isset($gender)  && isset($address) 
				&& isset($qualification ) &&isset($percentage) 
				&& isset($salary))
			{
				if(!empty($name) && !empty($phone) 
				&& !empty($dob) &&  !empty($doj) && 
				!empty($office_id) && !empty($alt_id) && !empty($gender)) 
				{
					
					//converting the details into an associative array
					$employee_info=array(
										'name'=>$name,
										'date_birth'=>$dob ,
										'Gender'=>$gender,
										'Phone'=>$phone,
										'Address'=>$address,
										'official_email'=>$office_id,
										'alternate_email'=>$alt_id,
										'highest_qualification'=>$qualification,
										'percentage_secured'=>$percentage,
										'Date_join'=>$doj ,
										'Salary'=>$salary,
										'photo'=>$photo);
										
					//sending an associative array to insert in the database
					$result=$this->employee_model->insert($employee_info);
					
					//after successful pdation it will send mail
					if($result==1)
					{
						
						
						//this will load the email library class
						
						$this->email->initialize();
						//the email id of sender
						$this->email->from('admin@greenprint.com', 'Admin');
						//email id of reciever
						$this->email->to($alt_id);
						//cc email id
						$this->email->cc('devyani.chinu@gmail.com');
						//bcc email id
						$this->email->bcc('smita.greenprnt@gmail.com');
						//subject of email
						$this->email->subject('official email id');
						//body of email
						$this->email->message($office_id);
						//this will send the email
						$this->email->send();
						 //this will redirect to the previous page after insertion
						redirect('employee/employee_list/insert', 'refresh');

						//echo $this->email->print_debugger();
					}
					
					//if insertion does not occure
					else
					{
						redirect('employee/employee_list/unable_insert', 'refresh');
					}
				}
				//if any of the field is empty
				else
				{
						redirect('employee/employee_list/unable_insert', 'refresh');
				}
			}
			
			//if any of the values is not set,it will come to this block
			else
			{
				redirect('employee/employee_list/unset_insert', 'refresh');

			}
		}
		//if email id/password is not set
		else
		{
			redirect('employee/index', 'refresh');
		}
		
	}
	
	//logout function
	public function logout()
	{
		//this will unset the email id from session
		$this->session->unset_userdata('email');
		//this will unset the password from session
		$this->session->unset_userdata('password');
		//this will destroy the session
		$this->session->sess_destroy();
		redirect('employee/index', 'refresh');
		
	}
	
}
?>
