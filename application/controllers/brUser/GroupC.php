<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class GroupC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("brUser/AuthorM","am");
		$this->load->model("brUser/UserM","um");
		$this->load->model("brUser/GroupM","gm");
		$this->load->model("brUser/HomeM","hm");		
		if(!$this->session->userID)
		{
			redirect("brUser/LoginC");
		}
	}
	public function index()
	{
		$y=$this->gm->getAllGroups();
		$x=$this->hm->getGenre();
		foreach ($y as $key) {
			$key->adminData=$this->gm->getUserData($key->userID,$key->userType);
			$key->members=$this->gm->getAllMembers($key->groupID);
			$key->membercount=$this->gm->getMembersCount($key->groupID);
		}
		foreach ($x as $key) 
		{
			$key->gID=$this->hm->fetchBookGenre($key->genreID);
		}		
/*
		echo "<pre>";
		print_r($x);
		die();*/
		$temp=array(
			"groupdata"=>$y,
			"genres"=>$x
		);
		$this->load->view("brUser/groupHome",$temp);
	}
	public function searchGroups($searchString=null)
	{
		$x=$this->gm->searchGroups($searchString);
		foreach ($x as $key) {
			$key->adminData=$this->gm->getUserData($key->userID,$key->userType);
			//$key->members=$this->gm->getAllMembers($key->groupID);
			$key->membercount=$this->gm->getMembersCount($key->groupID);
		}				
		echo json_encode($x);
	}
	public function addMember($groupID)
	{
		$t=$this->gm->checkMember($groupID);
		if($t>0)
		{
			echo 1;
		}
		else
		{
			$data=array(
						"userID"=>$this->session->userID,
						"userType"=>$this->session->userType,
						"groupID"=>$groupID
					);
					$this->gm->addMember($data);
			echo 0;	
		}
	}
	public function groupDetails($groupID)
	{
		if($this->gm->checkMember($groupID))
		{
		$y=$this->gm->getGroupData($groupID);
		$y->adminData=$this->gm->getUserData($y->userID,$y->userType);
		$y->members=$this->gm->getAllMembersData($y->groupID);
		$y->membercount=$this->gm->getMembersCount($y->groupID);
/*		echo "<pre>";
		print_r($y);
		die();
*/		$x=$this->hm->getGenre();
		foreach ($x as $key) 
		{
			$key->gID=$this->hm->fetchBookGenre($key->genreID);
		}		
		$temp=array(
			"groupdata"=>$y,
			"genres"=>$x
		);
		$this->load->view("brUser/groupChat",$temp);			
		}
		else
		{
			redirect("brUser/GroupC");
		}
	}
	public function addMessage($groupID)
	{
		$data=array(
			"groupID"=>$groupID,
			"senderID"=>$this->session->userID,
			"senderType"=>$this->session->userType,
			"sentMessage"=>$this->input->post("messageData")
		);
		$this->gm->addMessage($data);
	}
	public function loadGroupChat($groupID)
	{
		$x=$this->gm->loadGroupChat($groupID);
		echo json_encode($x);
	}
	public function loadMembers($groupID)
	{
		$x=$this->gm->loadMembers($groupID);
		echo json_encode($x);
	}
	public function createGroup()
	{
		$this->load->helper('string');
		$data=array(
			"groupName"=>$this->input->post("txtgroupname"),
			"groupBio"=>$this->input->post("txtgroupbio"),
			"userID"=>$this->session->userID,
			"userType"=>$this->session->userType,
			"groupTag"=>random_string('alnum',6)
		);
/*		print_r($data);
		die();
*/		$this->gm->createGroup($data);
		$temp=array(
			"userID"=>$this->session->userID,
			"userType"=>$this->session->userType,
			"groupID"=>$this->db->insert_id()
		);
/*		print_r($temp);
		die();
*/		$this->gm->addMember($temp);
		redirect("brUser/GroupC/myGroups");
	}
	public function myGroups()
	{
		$x=$this->hm->getGenre();
		foreach ($x as $key) 
		{
			$key->gID=$this->hm->fetchBookGenre($key->genreID);
		}
		$y=$this->gm->getGroups();	
		$temp=array(
			"groupdata"=>$y,
			"genres"=>$x
		);	
		$this->load->view("brUser/groupHome",$temp);
	}
	public function leaveGroup($groupID)
	{
		$this->gm->leaveGroup($groupID,$this->session->userID,$this->session->userType);
		redirect("brUser/GroupC/myGroups/");
	}
	public function closeGroup($groupID)
	{
		$this->gm->deleteGroup($groupID);
		redirect("brUser/GroupC/myGroups/");
	}
}
?>