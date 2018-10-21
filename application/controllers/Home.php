<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/**
* @author jay rathod
*/
class Home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('admin_id')) : redirect('account/login') ; endif ;
		$this->load->model('admin');
	}
	public function index()
	{
		$this->load->view('home_view');
	}
	public function stock_entry()
	{
		$this->form_validation->set_rules('medicine_name', 'Medicicine Name', 'required');
		$this->form_validation->set_rules('expiry_date', 'Expiry Date', 'required');
		$this->form_validation->set_rules('batch_id', 'Batch Id', 'required');
		$this->form_validation->set_rules('batch_stage', 'Batch Stage', 'required');
		if ($this->input->server('REQUEST_METHOD') == 'POST' && $this->form_validation->run()) {
			$this->response = json_decode($this->admin->setStock($this->input->post()));
			if ($this->response->status) {
				if ($this->admin->setExpiry($this->input->post('expiry_date') , $this->response->last_inserted_id)) {
					$this->session->set_userdata('success','Medicicine Record Insert Successfully..!!');
					redirect('home/stock_entry');
				} else {
					$this->session->set_userdata('error','Error..!!');
					redirect('home/stock_entry');
				}
			}
		}
		$this->data['medicine_info_key'] = $this->admin->getMedicineInfo();
		$this->load->view('stock_entry_view',$this->data);
	}
}