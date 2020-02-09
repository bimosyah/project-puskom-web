<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSuhu extends CI_Model {

	public function save($object)
	{
		$query = $this->db->insert('suhu', $object);
		return $query;
	}	

	public function update($id,$object)
	{
		$this->db->where('id', $id);
		$query = $this->db->update('suhu', $object);
		return $query;
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->delete('suhu');
		return $query;
	}

	public function get()
	{
		$this->db->order_by('timestamp', 'desc');
		$query = $this->db->get('suhu');
		return $query->result();
	}

	public function get_today()
	{
		$query = $this->db->query('SELECT * FROM suhu WHERE DATE(timestamp) = CURDATE()');
		return $query->result();	
	}

	public function get_yesterday()
	{
		$query = $this->db->query('SELECT * FROM suhu WHERE timestamp >= DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND timestamp < CURDATE()');
		return $query->result();	
	}

	public function get_by_date($date)
	{
		$this->db->where('DATE(timestamp)',$date);
		$query = $this->db->get('suhu');
		return $query->result();	
	}



}

/* End of file mSuhu.php */
/* Location: ./application/models/mSuhu.php */
