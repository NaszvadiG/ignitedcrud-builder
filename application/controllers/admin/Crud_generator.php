<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_generator extends CI_Controller {

	public function index()
	{

		//browse da tables

		$tables = $this->db->list_tables();
		$table = $this->ignore_main($tables);
		$data['tables'] = $table;

		$this->load->view('admin/header');
        $this->load->view('admin/body');
        $this->load->view('admin/crud/crud-gen',$data);
        $this->load->view('admin/footer');
		
	}



	//ignore the main standard tables
	public function ignore_main($tables)
	{
		$tmp = array();

		foreach ($tables as $field) 
		{	
			if($field == "IGS_email")
			{
				//do nothing
			}
			else if($field == "IGS_permission_groups")
			{
				//do nothing
			}
			else if($field == "IGS_permission_map")
			{
				//do nothing 
			}
			else if($field == "IGS_permissions")
			{
				//do nothing				
			}
			else if($field == "IGS_routes")
			{
				//do nothing				
			}
			else if($field == "IGS_site")
			{
				//do nothing				
			}
			else if($field == "IGS_user")
			{
				//do nothing				
			}
			else if($field == "IGS_uploads")
			{
				//do nothing				
			}
			else
			{
				array_push($tmp, $field);
			}
		}
		return $tmp;

	}


	public function get_fields()
	{
		$table = $this->input->post('name');
		$fields = $this->db->field_data($table);

		//generate the code

		//IMPORTANT must assume the table name only has one underscore
		//Reconsider coding too many bugs


		$arr = explode("_", $table);

		
		$this->gen_logic($table);

		//for the writing files
		//$this->tt($arr[1]);


	}


	//process the chosen condition on the columns build array and send to tt() funct
	public function process_conds($table)
	{

		$fields = $this->db->field_data($table);

		$form_array = array();

		foreach ($fields as $key)
		{
			

			$tmp =array(
					  'name' => $key->name, 
                      'type' => $this->input->post($key->name),
                      'helper' => $this->input->post($key->name."-helper"),
                      'required' =>$this->input->post($key->name."-check")
                    );

			array_push($form_array,$tmp);

			
		}

		$arr = explode("_", $table);


		$this->tt($arr[1],$form_array);





	}




	//generate the logic for the controller validation and forms
	public function gen_logic($table)
	{

		$fields = $this->db->field_data($table);

		$data['fields'] = $fields;
		$data['table']  = $table;



		////////////////////////////////////////
		//
		//    Run throught _POST logic todo
		//
		////////////////////////////////////////


		$this->load->view('admin/header');
        $this->load->view('admin/body');
        $this->load->view('admin/crud/crud-opt',$data);
        $this->load->view('admin/footer');

	}


	public function tt($table,$form_array)
	{

		// $form_array = array();
		 
		// $a =array( 'name' => 'name', 
		  //                     'type' => 'pmtext',
		  //                     'helper' => 'please enter a name',
		  //                     'required' =>'1'
		  //                   );

		  //       $b = array( 'name' => 'description', 
		  //                     'type' => 'pmtextbox',
		  //                     'helper' => 'please enter a description',
		  //                     'required' =>'1'

		  //                   );

		  //        $c = array( 'name' => 'type', 
		  //                     'type' => 'pmdate',
		  //                     'helper' => 'please enter the dog type',
		  //                     'required' =>'0'
		  //                   );

		           
		  //       array_push($form_array, $a);
		  //       array_push($form_array, $b);
		  //       array_push($form_array, $c);


        //echo($form_array[0]['name']);


		$this->load->model('crud/crud_model');
		$this->crud_model->generate_model($table);
		$this->crud_model->generate_controller($table,$form_array);
		$this->crud_model->generate_view($table,$form_array);


		$this->session->set_flashdata('type', '1');
		$this->session->set_flashdata('msg', 'Your controller, models and views have been created!');

		redirect("admin/$table","refresh");
	}

}

/* End of file Crud_generator.php */
/* Location: ./application/controllers/crud/Crud_generator.php */