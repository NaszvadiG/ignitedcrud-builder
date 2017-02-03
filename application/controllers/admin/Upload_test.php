<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//quick and dirty upload with validation for crud builder


class Upload_test extends CI_Controller {

	public function index()
	{

		$this->db->select('*');
		$this->db->from('uploads');

		$query = $this->db->get();
		

		$data['query'] = $query;
		


		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('upload/index',$data);
		$this->load->view('admin/footer');
		
	}

	//no params
	public function make_table()
	{
		$this->load->dbforge();
		
		$fields = array(
        	'filename' => array('type' => 'VARCHAR', 'constraint' => 255),
        	// 'full_path' => array('type' => 'VARCHAR', 'constraint' => 1055),
        	'type' => array('type' => 'VARCHAR', 'constraint' => 255),
        	'size' => array('type' => 'VARCHAR', 'constraint' => 255),
        	'last_ammended' => array('type' => 'datetime'),
        	'userid' => array('type' => 'INT', 'constraint' => 11)
		);

		$this->dbforge->add_column('uploads', $fields);
		// Executes: ALTER TABLE table_name ADD preferences TEXT

	}


	//a new file to upload the file
	public function new_view()
	{

		$this->load->view('admin/header');
		$this->load->view('admin/body');
		$this->load->view('upload/new');
		$this->load->view('admin/footer');


	}


	 /**
	  *  @Description: remove the db entry and the actual file
	  *       @Params: id
	  *
	  *  	 @returns: returns
	  */				
	public function delete_file($id)
	{

		//unlink(filename)
		//first get the file path

		$this->db->select('*');
		$this->db->from('uploads');
		$this->db->where('id', $id);
		$this->db->limit(1);

		$query = $this->db->get();
		
		$path = "";
		foreach ($query->result() as $row) 
		{
			$path =  $row->filename;
		}
		

		$path2 = "./assets/uploads/" . $path; 
		unlink($path2);




		$this->db->where('id', $id);
		$this->db->delete('uploads');

		


		$this->session->set_flashdata('type', '1');
		$this->session->set_flashdata('msg', 'File deleted');

		redirect("admin/upload_test","refresh");

	}

	/**
	  *  @Description: upload the image insert into db
	  *       @Params: _POST filename
	  *
	  *  	 @returns: returns
	  */
	public function do_upload()
	{
		$config['upload_path'] = './assets/uploads/';

            
        $config['allowed_types'] = 'gif|jpg|png';
        //$config['encrypt_name'] = TRUE;
        

        $this->load->library('upload', $config);
        /**
             * @Description: unsuccessful
             * @params     : params
             * @returns    : return
             */
        if ( ! $this->upload->do_upload())
        {

        	$errors =  $this->upload->display_errors();
			$this->session->set_flashdata('type', '0');
			$this->session->set_flashdata('msg', " $errors");
			
			redirect('admin/upload_test','refresh');

        }
        //successful
        else
        {
        	$mytry = $this->upload->data();
            $filename = $mytry['raw_name'].$mytry['file_ext'];

            //create a thumbnail
            $config['image_library'] = 'gd2';
			$config['source_image']	= "./assets/uploads/$filename";
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 200;
			$config['height']	= 200;

			$this->load->library('image_lib', $config); 


			/////////////////////////////////////////


			//   TOTALLY NEED THE LINE BELOW!!!!!!

			///////////////////////////////////////
			$this->image_lib->initialize($config);

			////////////////////////////////////////


			$this->image_lib->resize();

			if (!$this->image_lib->resize()) {
     			echo $this->image_lib->display_errors();
			}


			//insert this  into the database
			$thumb = $mytry['raw_name'] . '_thumb' . $mytry['file_ext'];
			$fullsize = $mytry['raw_name'] .  $mytry['file_ext'];
			$type = $mytry['file_ext'];
			$size = $mytry['file_size'];
			$last_ammended =  date('Y-m-d H:i:s');
			$full_path = $mytry['file_path']; //probably don't need


			$object = array(
				'filename' => $fullsize,
				'type' =>$type,
				'size' => $size,
				'last_ammended' => $last_ammended
				
				);
			$this->db->insert('uploads', $object);


			$this->session->set_flashdata('type', '1');
			$this->session->set_flashdata('msg', '<strong>Success</strong> Image uploaded');
			
			redirect('admin/upload_test','refresh');
		}

	}


}

/* End of file Upload_test.php */
/* Location: ./application/controllers/admin/Upload_test.php */