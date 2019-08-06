<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerificationC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("brUser/VerificationM","vm");
	}

	public function index($authorID)
	{
		$x = $this->vm->getInfo($authorID);
		if($x->status==0)
		{
			$this->vm->updStatus($authorID);	
			$data = array(
				"authorStatus" => 1 
			);		
			$this->load->view("brUser/login",$data);
		}
		else
		{
			$data = array(
				"authorStatus" => -1
			);		
			$this->load->view("brUser/login",$data);
		}
	}
}
