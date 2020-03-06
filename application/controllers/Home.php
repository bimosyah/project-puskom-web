<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mSuhu','suhu');
		$this->load->model('mSms','sms');
		$this->load->model('mBatasSuhu','batas_suhu');
	}

	public function index()
	{
		$this->load->view('home/index');
	}

	public function sms()
	{
		$data = $this->sms->get();
		
		foreach ($data as $value) {
			$data['nomer_hp'] = $value->nomer_hp;
			$data['dibuat'] = $value->created_at;
			$data['diganti'] = $value->update_at;
		}

		$this->load->view('home/sms',$data);
	}

	public function sms_update()
	{
		$nomer_hp = $this->input->post('nomer_hp');
		$query = $this->sms->update(array('nomer_hp' => $nomer_hp));
		if ($query) {
			redirect('home/sms','refresh');
		}
	}

	public function batas_suhu()
	{
		$data = $this->batas_suhu->get();
		
		foreach ($data as $value) {
			$data['suhu_bawah'] = $value->suhu_bawah;
			$data['suhu_atas'] = $value->suhu_atas;
			$data['diganti'] = $value->updated_at;
		}

		$this->load->view('home/batas_suhu',$data);
	}

	public function batas_suhu_update()
	{
		$suhu_bawah = $this->input->post('suhu_bawah');
		$suhu_atas = $this->input->post('suhu_atas');
		$query = null;

		if ($suhu_bawah == "" && $suhu_atas != "") {
			$query = $this->batas_suhu->update(array('suhu_atas' => $suhu_atas));	
		}

		if ($suhu_atas == "" && $suhu_bawah != "") {
			$query = $this->batas_suhu->update(array('suhu_bawah' => $suhu_bawah));	
		}

		if ($suhu_bawah != "" && $suhu_atas != "") {
			if ($suhu_bawah > $suhu_atas) {
				redirect('home/batas_suhu','refresh');
			}else {
				$query = $this->batas_suhu->update(array('suhu_bawah' => $suhu_bawah,'suhu_atas' => $suhu_atas));		
			}			
		}

		if ($suhu_bawah == "" && $suhu_atas == "") {
			redirect('home/batas_suhu','refresh');
		}
		
		if ($query) {
			redirect('home/batas_suhu','refresh');
		}	
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */