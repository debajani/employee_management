<?php
/*This the model class*/
class Employee_model extends CI_Model 
{
	//This is the constructor for the model
	 public function __construct()
	       {
			/*This will load the parent class controller*/
			parent::__construct();
			//this will load the database
			$this->load->database();
			
		}
		
		/*This will show the details of the loged in normal user*/
		function select_specific($email_id)
		{
				//.....employee details.......
				
				$query_normal = $this->db->get_where('employee_info',array('official_email'=>$email_id));

				//This function returns a single result row
				$row =$query_normal->row();
						
				return(array($row->name,    //name of normal user   
							//phone of normal user
							$row->Phone,      
							//official email id  of normal user
							$row->official_email,     
							//alternate email of of normal user							
							$row->alternate_email,         
							//qualification of normal user
							$row->highest_qualification,  	
							//address of normal user
							$row->Address,       
							//percentage of normal user
							$row->percentage_secured, 
							 //date of joining of normal user
							$row->Date_join,                 
							$row->photo)
					);
						
					
		}
		
	/*This will varify whether the email id is present or not*/
	function select_login($email_id,$password)
	{
	
				//this will retrive login id and passord
				$query = $this->db->get_where('login',array('email'=>$email_id,'password'=>$password));
				//this will count the number of rows
				$rowcount = $query->num_rows();
				//if email id or password is not present in the database
				if($rowcount==0)
				{
					
					return false;
				}
				//if email and password is present the this block will be exucted
				else
				{
					$row =$query->row();

					//this will retrive the type of the user from the database
					$type=$row->type;
					
					//this will return the type of the user
					return($type);
				}
				
				
	
	}
	/*This will retrive all employees name from the database*/
	function select_all()
	{
		$query_normal = $this->db->get('employee_info');
		
		//this will rerive the name of the employees with their employee_id
		foreach ($query_normal->result() as $row)
		{	
			
			$name_nomaluser[$row->employee_id]=$row->name;
			
			
		}
		
		//this will return to the controller function
		return($name_nomaluser);
	
	}
	
	/*this will update the employee details*/
	function employee_update($id,$arr)
	{
		//this is the where clause
		$this->db->where('employee_id', $id);
		$this->db->update('employee_info', $arr); 
		return 1;
	}
	
	/*this will delete employee*/
	function employee_delete($value)
	{
		
		return($this->db->delete('employee_info', array('employee_id' =>$value)));
		

	}
	
	/*this will insert data in database*/
	function insert($data)
	{
		//returning to calling controller method
		return($this->db->insert('employee_info', $data)); 
		
	}
	
	/*This will select the details of the given employee id and pass it to employee_edit() of controller*/
	function get_user($value)
		{
				
				$query_normal = $this->db->get_where('employee_info',array('employee_id'=>$value));
					foreach ($query_normal->result() as $row)
					{
						//name of employee
						$name_nomaluser=$row->name;
						//phone number
						$phone_nomaluser=$row->Phone;
						//official email id
						$official_email_nomaluser=$row->official_email;
						//alternate email id
						$alternate_email_nomaluser=$row->alternate_email;
						//highest qualification
						$highest_qualification_nomaluser=$row->highest_qualification;
						//salary
						$salary=$row->Salary;
						//percentage secured by employee
						$percentage_secured_normaluser=$row->percentage_secured;
						//joining date
						$Date_join=$row->Date_join;
						//converting the details to array
						$info=array($name_nomaluser,$phone_nomaluser,$official_email_nomaluser,$alternate_email_nomaluser,$highest_qualification_nomaluser,$salary,$percentage_secured_normaluser,$Date_join,$value);
						
					}
					//returning to calling controller method
					return($info);
		}
   
	
}
?>