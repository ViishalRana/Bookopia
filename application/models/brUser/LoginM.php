<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginM extends CI_Model
{
	public function signup($data)
	{
		$this->db->insert("tblusermaster",$data);
	}

	public function loginUser($data)
	{
		if($data["userType"]=="User")
		{
		$this->db->where("userEmail",$data["userEmail"])->where("userPassword",$data["userPassword"])->where("status",0);			
		$x=$this->db->get("tblusermaster");
		}
		else
		{
		$this->db->where("authorEmail",$data["authorEmail"])->where("authorPassword",$data["authorPassword"])->where("status",1);			
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

	public function signupAuthor($data)
	{
		$this->db->insert("tblAuthor",$data);
	}
	 public function forgetPassword($data)
	{
		$this->db->where($data);
		$x=$this->db->get("tblusermaster");
		if($x->num_rows()>0)
		{
			return $x->result()[0];
		}
		else
		{
			return false;
		}
	}	
		
}
?>