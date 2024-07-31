<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_m extends CI_Model {

	
	public function save()
	{
		$data = array(
            'name_category'      => $this->input->post('name_category'),
			
        );
        $this->db->insert('category',$data);
	}
    

	
}
