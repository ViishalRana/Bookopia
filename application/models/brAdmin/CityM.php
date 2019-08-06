<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CityM extends CI_Model
{
	public function getstateCityData($stateID)
	{
		$this->db->select("ct.cityID,ct.cityName,ct.stateID,s.stateName,c.countryID,c.countryName");
		$this->db->from("tblcity as ct");
		$this->db->join("tblstate as s","s.stateID=ct.stateID");
		$this->db->join("tblcountry as c","s.countryID=c.countryID");
		$this->db->where("ct.stateID",$stateID);
		return $this->db->get()->result();
	}
	public function getAllCities()
	{
		$this->db->select("ct.cityID,ct.cityName,ct.stateID,s.stateName,c.countryID,c.countryName");
		$this->db->from("tblcity as ct");
		$this->db->join("tblstate as s","s.stateID=ct.stateID");
		$this->db->join("tblcountry as c","s.countryID=c.countryID");
		return $this->db->get()->result();

	}
	public function addCity($data)
	{
		$this->db->insert("tblcity",$data);
	}

	public function deleteStateCity($stateID)
	{
		$this->db->where("stateID",$stateID)->delete("tblcity");
	}
	public function editCity($data,$cityID)
	{
		$this->db->set($data)->where("cityID",$cityID)->update("tblcity");
	}
	public function deleteCity($cityID)
	{
		$this->db->where("cityID",$cityID)->delete("tblcity");
	}
	public function getCity($stateID)
	{
		return $this->db->where("stateID",$stateID)->get("tblcity")->result();
	}
}
?>