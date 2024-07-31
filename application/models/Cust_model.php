<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cust_model extends CI_Model {

	
	public function save()
	{
		$data = array(
            'name'      => $this->input->post('name'),
            'username'  => $this->input->post('username'),
            'password'  => md5($this->input->post('password')),
            'level'      => $this->input->post('level'),
        );
        $this->db->insert('user',$data);
	}
    
}
