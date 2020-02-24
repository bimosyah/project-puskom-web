<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mSuhu','suhu');
	}

	public function post()
	{
		$suhu = $this->input->post("suhu");
		$keterangan = $this->input->post("keterangan");

		$object = array(
			'suhu' => $suhu,
			'keterangan' => $keterangan
		);

		if (($suhu != "") || ($suhu != null)) {
			// echo json_encode($object);
			$query = $this->suhu->save($object);

			if ($query) {
				echo json_encode(array('status' => 'ok'));
			}else {
				echo json_encode(array('status' => 'gagal'));
			}
		}else {
			echo json_encode(array('status' => 'empty'));
		}
	}


	public function getData()
	{
		$all_data = $this->suhu->get_today();

		$data = array();
		$i = 1;
		foreach ($all_data as $value) {
			$date = date_format(date_create($value->timestamp), 'd-m-Y');
			$time = date_format(date_create($value->timestamp), 'H:i:s');
			$temp_arr = array(
				'no' => $i,
				'date' => $date,
				'time' => $time,
				'suhu' => $value->suhu
			);

			array_push($data, $temp_arr);

			$i++;
		}

		$output = array(
			"data"    => $data
		);

		echo json_encode($output);
	}

	public function dataTotal()
	{
		$get = $this->suhu->get();
		$i = 0;
		foreach ($get as $value) {
			$i++;
		}
		return $i;
	}

	public function test()
	{
		for ($i = 0; $i <= 23; $i++) {
			$object = array(
				'suhu' => round($this->randomFloat(25, 35),1),
				'keterangan' => "",
				'timestamp' => "2020-02-21 ".$i.":00:00"
			);	
			// $query = $this->suhu->save($object);
		}
		// echo round($this->randomFloat(25, 35),1);
	}

	function randomFloat($min, $max) {
		return $min + mt_rand() / mt_getrandmax() * ($max - $min);
	}

}

/* End of file Data.php */
/* Location: ./application/controllers/api/Data.php */