<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageProfileM extends CI_Model
{
	public function changeProfile($data)
	{
		if($this->session->userType=="User")
		{
		$this->db->where($data);
		$x=$this->db->get("tblusermaster");
		}
		else
		{
			$this->db->where($data);
		$x=$this->db->get("tblauthor");
		}
		
		if($x->num_rows()>0)
		{
			return $x->result()[0];
		}
		else
		{
			return null;
		}
	}

	public function changepic($data,$uname)
	{
		if($this->session->userType=="User")
		{
	 	$this->db->set($data);
	 	$this->db->where("userFirstName",$uname);
	 	return $this->db->update("tblusermaster");
	 	}
	 	else
	 	{
	 		$this->db->set($data);
	 	$this->db->where("authorFirstName",$uname);
	 	return $this->db->update("tblauthor");
	 	}
	}

	public function changePass($data)
	{
		if($this->session->userType=="User")
		{
		$this->db->where($data);
		$x=$this->db->get("tblusermaster");
		}
		else
		{
			$this->db->where($data);
		$x=$this->db->get("tblauthor");
		}
		if($x->num_rows()>0)
		{
			return $x->result()[0];
		}
		else
		{
			return null;
		}
	}

	public function updPass($data,$uname)
	{
		if($this->session->userType=="User")
		{
		$this->db->set($data);
		$this->db->where("userFirstName",$uname);
		return $this->db->update("tblusermaster");
		}
		else
		{
			$this->db->set($data);
		$this->db->where("authorFirstName",$uname);
		return $this->db->update("tblauthor");
		}
	}

	public function getManageData()
	{
		if($this->session->userType=="User")
		{	
		$this->db->select("u.*,c.*");
		$this->db->from("tblcity as c");
		$this->db->join("tblusermaster as u","c.cityID=u.userCityID");
		$this->db->where("u.userID",$this->session->userID);
		return $this->db->get("tblusermaster")->result()[0];
		}
		else
		{
			$this->db->select("a.*,c.*");
		$this->db->from("tblcity as c");
		$this->db->join("tblauthor as a","c.cityID=a.authorCityID");
		$this->db->where("a.authorID",$this->session->userID);
		return $this->db->get("tblauthor")->result()[0];

		}
	}

	public function updateDetails($data)
	{
		if($this->session->userType=="User")
		{
		$this->db->set($data);
		$this->db->where("userID",$this->session->userID);
		return $this->db->update("tblusermaster");
		}
		else
		{
				$this->db->set($data);
		$this->db->where("authorID",$this->session->userID);
		return $this->db->update("tblauthor");
		}
	}

	public function getCountry()
	{
		return $this->db->get("tblcountry")->result();
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
	public function getCityData($cid)
	{
		$this->db->select("c.cityName,s.stateID,s.stateName,ct.countryID,ct.countryName");
		$this->db->from("tblcity as c");
		$this->db->join("tblstate as s","c.stateID=s.stateID");
		$this->db->join("tblcountry as ct","ct.countryID=s.countryID");
		$this->db->where("c.cityID",$cid);
		return $this->db->get()->result()[0];
	}

}
?>