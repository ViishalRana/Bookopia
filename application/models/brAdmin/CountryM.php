<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CountryM extends CI_Model
{
	public function getAllCountries()
	{
		return $this->db->get("tblcountry")->result();
	}
	public function addCountry($data)
	{
		$this->db->insert("tblcountry",$data);
	}
	public function getCountryData($countryID)
	{
		return $this->db->where("countryId",$countryID)->get("tblcountry")->result()[0];
		
	}
	public function editCountry($data)
	{
		$this->db->set(["countryName"=>$data['countryName'],"countryCode"=>$data['countryCode']])->where("countryID",$data['countryID'])->update("tblcountry");
	}
	public function deleteCountry($countryID)
	{
		$this->db->where("countryID",$countryID)->delete("tblcountry");
	}
	public function getCountryStateID($countryID)
	{
		return $this->db->select("stateID")->where("countryID",$countryID)->get("tblstate")->result();
	}	

}

?>