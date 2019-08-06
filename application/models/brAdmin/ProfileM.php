<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileM extends CI_Model
{
	public function changeProfile($data)
	{
		$this->db->where($data);
		$x=$this->db->get("tbladmin");
		if($x->num_rows()>0)
		{
			return $x->result()[0];
		}
		else
		{
			return null;
		}
	 }

	 public function changepic($data,$aname)
	 {
	 	$this->db->set($data);
	 	$this->db->where("userName",$aname);
	 	return $this->db->update("tblAdmin");
	 }

	public function changePass($data)
	{
		$this->db->where($data);
		$x=$this->db->get("tblAdmin");
		if($x->num_rows()>0)
		{
			return $x->result()[0];
		}
		else
		{
			return null;
		}
	}

	public function updPass($data,$aname)
	{
		$this->db->set($data);
		$this->db->where("userName",$aname);
		return $this->db->update("tbladmin");
	}
}
?>