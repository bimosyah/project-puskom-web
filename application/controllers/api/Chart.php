<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mSuhu','suhu');
		$this->load->helper('form');
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
	
	public function get_today()
	{
		$arr = array();
		$data = $this->suhu->get_today();
		foreach ($data as $value) {
			$temp_arr = array(
				'suhu' => $value->suhu,
				'label' => date('H:00', strtotime($value->timestamp)),
			);
			array_push($arr, $temp_arr);
		}
		echo json_encode($arr);
	}

	public function get_yesterday()
	{
		$arr = array();
		$data = $this->suhu->get_yesterday();
		foreach ($data as $value) {
			array_push($arr, $value->suhu);
		}
		echo json_encode($arr);
	}

	public function get_by_date()
	{
		$date_search = $this->input->post('date_search');
		// $date_search = "2020-02-06";
		$get_data = $this->suhu->get_by_date($date_search);

		$data = array();
		$label = array();
		$chart = array();
		$i = 1;
		foreach ($get_data as $value) {
			$date = date_format(date_create($value->timestamp), 'd-m-Y');
			$time = date_format(date_create($value->timestamp), 'H:i:s');
			$temp_arr = array(
				'no' => $i,
				'date' => $date,
				'time' => $time,
				'suhu' => $value->suhu
			);

			array_push($label, date('H:00', strtotime($value->timestamp)));
			array_push($data, $temp_arr);
			array_push($chart, $value->suhu);

			$i++;
		}

		$output = array(
			"draw"    => intval($this->input->post('draw')),
			"recordsTotal"  =>  $this->dataTotal(),
			"recordsFiltered" => $i-1,
			"table"    => $data,
			"chart" => $chart,
			"label" => $label
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
}

/* End of file Chart.php */
/* Location: ./application/controllers/api/Chart.php */