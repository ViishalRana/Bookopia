<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StateM extends CI_Model
{
	public function getCountryStates($countryID)
	{
		$this->db->select("s.stateID,s.stateName,s.countryID,c.countryName");
		$this->db->from("tblstate as s");
		$this->db->join("tblcountry as c","c.countryID=s.countryID");
		$this->db->where("s.countryID",$countryID);
		return $this->db->get()->result();
	}
	public function getAJAXState($countryID)
	{
		$x=$this->db->where("countryID",$countryID)->get("tblstate")->result();
		$output="<select name='lstState' id='lstState' class='form-control'>";
		$output.='<option value="0">Choose One Option</option>';
		foreach ($x as $key) {
			$output.='<option value="'.$key->stateID.'">'.$key->stateName.'</option>';
		}
		$output.="</select>";
		return $output;

	}
	public function addState($data)
	{
		$this->db->insert("tblstate",$data);
	}
	public function getAllStates()
	{
		//select * from tblstate s,tblcountry c where s.countryID=c.countryID 
		$this->db->select("s.stateID,s.stateName,s.countryID,c.countryName");
		$this->db->from("tblstate as s");
		$this->db->join("tblcountry as c","c.countryID=s.countryID");
		return $this->db->get()->result();
	}
	public function getstateCountryData($stateID)
	{
		$this->db->select("c.countryID,c.countryName");
		$this->db->from("tblcountry as c");
		$this->db->join("tblstate as s","s.countryID=c.countryID");
		$this->db->where("s.stateID",$stateID);
		return $this->db->get()->result();
	}
	public function deleteCountryState($countryID)
	{
		$this->db->where("countryID",$countryID)->delete("tblstate");
	}
	public function editState($data,$stateID)
	{
		$this->db->set($data)->where("stateID",$stateID)->update("tblstate");
	}
	public function deleteState($stateID)
	{
		$this->db->where("stateID",$stateID)->delete("tblstate");
	}	
	public function getState($countryID)
	{
		return $this->db->where("countryID",$countryID)->get("tblstate")->result();
	}

}

?>