<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MBatasSuhu extends CI_Model {

	function get()
	{
		$query = $this->db->get('batas_suhu')->result();
		return $query;
	}	

	function update($object)
	{
		$this->db->where('id', 1);
		$query = $this->db->update('batas_suhu', $object);
		return $query;
	}

}

/* End of file mBatasSuhu.php */
/* Location: ./application/models/mBatasSuhu.php */