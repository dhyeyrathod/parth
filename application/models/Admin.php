<?php 
/**
* @author Jay Rathod
*/
class Admin extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function loginAuthentication($email,$password)
	{
		$sql_str = "SELECT * FROM admin WHERE email_id = ".$this->db->escape($email)." AND password = ".$this->db->escape($password);
		return $this->db->query($sql_str)->num_rows();
	}
	public function adminSessionDataGet($email,$password)
	{
		$sql_str = "SELECT * FROM admin WHERE email_id = ".$this->db->escape($email)." AND password = ".$this->db->escape($password);
		return $this->db->query($sql_str)->row();
	}
	public function setStock($data)
	{
		$sql_str = "INSERT INTO stock SET medicine_name = ".$this->db->escape($data['medicine_name']).",batch_id = ".$this->db->escape($data['batch_id']).",batch_stage = ".$this->db->escape($data['batch_stage']);
		if ($this->db->query($sql_str)) {
			return json_encode(array('status' => true,'last_inserted_id'=>$this->db->insert_id()));
		} else {
			return json_encode(array('status' => false));
		}	
	}
	public function setExpiry($expiry_date,$medicine_id)
	{
		$sql_str = "INSERT INTO expiry SET fk_medicine_id = ".$this->db->escape($medicine_id).",expiry_date = ".$this->db->escape($expiry_date);
		return $this->db->query($sql_str);
	}
	public function getMedicineInfo()
	{
		$sql_str = "SELECT * FROM stock INNER JOIN expiry ON stock.id = expiry.fk_medicine_id";
		return $this->db->query($sql_str)->result();
	}

}
