<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserM extends CI_Model
{
	public function getAllUser()
	{
		return $this->db->get('tblusermaster')->result();
	}

	public function addUser($data)
	{
		$this->db->insert("tblusermaster",$data);
	}

	public function getCountry()
	{
		return $this->db->get("tblcountry")->result();
	}

	public function getState()
	{
		return $this->db->get("tblstate")->result();
	}

	public function getCity()
	{
		return $this->db->get("tblcity")->result();
	}

	public function stateAjax($id)
	{
		$this->db->where("countryID",$id);
		$x=$this->db->get("tblstate")->result();
		return $x;
	}

	public function cityAjax($cid)
	{
		$this->db->where("stateID",$cid);
		$x=$this->db->get("tblcity")->result();
		return $x;
	}

	public function updUser($uid)
	{
		$this->db->where("userID",$uid);
		return $this->db->get("tblusermaster")->result()[0];
	}

	public function editUser($data,$id)
	{
		if($data["userPhoto"]=="no image")
		{
			$this->db->set([
				"userFirstName"=>$data["userFirstName"],
				"userLastName"=>$data["userLastName"],
				"userEmail"=>$data["userEmail"],
				"userPassword"=>$data["userPassword"],
				"userGender"=>$data["userGender"],
				"userBdate"=>$data["userBdate"],
				"userBio"=>$data["userBio"]
				//"userCityID"=>$data["userCityID"]
			]);
		}
		else
		{
			$this->db->set($data);
		}
		$this->db->where("userID",$id);
		$this->db->update("tblusermaster");
	}

}
?>