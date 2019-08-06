<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class GroupM extends CI_Model
{
	public function getAllGroups()
	{
		return $this->db->get("tblgroup")->result();
	}
	public function getUserData($uid,$utype)
	{
		if($utype=="Author")
		{
			$this->db->select("authorFirstName,authorLastName,authorPhoto");
			$this->db->from("tblauthor");
			$this->db->where("authorID",$uid);
			return $this->db->get()->result()[0];
		}
		else
		{
			$this->db->select("userFirstName,userLastName,userPhoto");
			$this->db->from("tblusermaster");
			$this->db->where("userID",$uid);
			return $this->db->get()->result()[0];
		}
	}
	public function getAllMembers($groupID)
	{
		$x=$this->db->where("groupID",$groupID)->get("tblgroupmember")->result();
/*		foreach ($x as $key) {
			$key->memberData=$this->gm->getUserData($key->userID,$key->userType);
		}*/
		return $x;
	}
	public function getMembersCount($groupID)
	{
		return $this->db->where("groupID",$groupID)->get("tblgroupmember")->num_rows();
	}	
	public function searchGroups($searchString)
	{
		$searchString=strtolower($searchString);
		if($searchString!="")
		{
			$this->db->where("groupTag",$searchString);
		}
		return $this->db->get("tblgroup")->result();
	}
	public function addMember($data)
	{
		$this->db->insert("tblgroupmember",$data);
	}
	public function checkMember($groupID)
	{
		return $this->db->where("userID",$this->session->userID)->where("userType",$this->session->userType)->where("groupID",$groupID)->get("tblgroupmember")->num_rows();
	}
	public function getGroupData($groupID)
	{
		return $this->db->where("groupID",$groupID)->get("tblgroup")->result()[0];	
	}
	public function getAllMembersData($groupID)
	{
		$x=$this->db->where("groupID",$groupID)->get("tblgroupmember")->result();
		foreach ($x as $key) {
			$key->memberData=$this->gm->getUserData($key->userID,$key->userType);
		}
		return $x;
	}	
	public function addMessage($data)
	{
		$this->db->insert("groupMessage",$data);
	}
	public function loadGroupChat($groupID)
	{
		$x=$this->db->where("groupID",$groupID)->get("groupMessage")->result();
		foreach ($x as $key) {
			$key->senderData=$this->gm->getUserData($key->senderID,$key->senderType);
		}
		return $x;
	}
	public function loadMembers($groupID)
	{
		$x=$this->db->where("groupID",$groupID)->get("tblgroupmember")->result();
		foreach ($x as $key) {
			$key->memberData=$this->gm->getUserData($key->userID,$key->userType);
		}
		return $x;
	}
	public function createGroup($data)
	{
		$this->db->insert("tblgroup",$data);
	}
	public function getGroups()
	{	
		$temp=array();
		$y=$this->gm->getAllGroups();
		foreach ($y as $key) {
			if($this->gm->checkMember($key->groupID))
			{
			$key->membercount=$this->gm->getMembersCount($key->groupID);
			$key->adminData=$this->gm->getUserData($key->userID,$key->userType);

				$temp[]=$key;
			}		

		}
		return $temp;
	}
	public function leaveGroup($groupID,$userID,$userType)
	{
		$this->db->where("groupID",$groupID)->where("userID",$userID)->where("userType",$userType)->delete("tblgroupmember");
	}
	public function deleteGroup($groupID)
	{
		$this->db->where("groupID",$groupID)->delete("groupMessage");
		$this->db->where("groupID",$groupID)->delete("tblgroupmember");
		$this->db->where("groupID",$groupID)->delete("tblgroup");

	}

}
?>