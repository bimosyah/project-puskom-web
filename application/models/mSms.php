<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSms extends CI_Model {

	function get()
	{
		$query = $this->db->get('sms')->result();
		return $query;
	}	

	function update($object)
	{
		$this->db->where('id', 1);
		$query = $this->db->update('sms', $object);
		return $query;
	}

}

/* End of file mSms */
/* Location: ./application/models/mSms */