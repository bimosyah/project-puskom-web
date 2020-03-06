<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mSms','sms');
		$this->load->model('mSuhu','suhu');
		$this->load->model('mBatasSuhu','batas_suhu');
	}

	public function nomer_hp()
	{
		$query = $this->sms->get();
		$nomer_hp = "";
		foreach ($query as $value) {
			$nomer_hp = $value->nomer_hp;
		}
		echo json_encode("+{$nomer_hp}");
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

	public function batas_suhu()
	{
		$query = $this->batas_suhu->get();
		$suhu_bawah = "";
		$suhu_atas = "";

		foreach ($query as $value) {
			$suhu_bawah = $value->suhu_bawah;
			$suhu_atas = $value->suhu_atas;
		}
		echo json_encode(array('suhu_bawah' => $suhu_bawah,'suhu_atas' => $suhu_atas));
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