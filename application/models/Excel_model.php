<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_model extends CI_Model {

	function select()
	{
		$this->db->order_by('id','DESC');
		$query = $this->db->get('user_info');
		return $query;
	}	


	  function insert($data)
                {
                      $this->db->insert_batch('user_info',$data);
                }



}

/* End of file Excel_model.php */
/* Location: ./application/models/Excel_model.php */