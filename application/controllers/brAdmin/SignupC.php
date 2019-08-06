<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignupC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("brAdmin/SignupM","sim");
		if($this->session->userName)
		{
			redirect("brAdmin/BookC/");
		}
	}

	public function index()
	{
		$this->load->view('brAdmin/default/login');
	}
	// public function signup()
	// {
	// 	$config['upload_path']='./upload/';
	// 	$config['allowed_types']='jpg|jpeg|png';
	// 	$this->load->library('upload',$config);
	// 	$data=array(
	// 		"userName"=>$this->input->post("txtuserName"),
	// 		"adminPassword"=>$this->input->post("txtpassword"),
	// 		"profilePic"=>"",
	// 		"email"=>$this->input->post("txtemail")
	// 	);
	// 	if(!$this->upload->do_upload('imgprofilePhoto'))
	// 	{
	// 		$error=array('error'=>$this->upload->display_errors());
	// 		$this->load->view('brAdmin/default/signup',$error);
	// 		//die();
	// 	}
	// 	else
	// 	{
	// 		$t=$this->upload->data();
	// 		$data['profilePic']=$t["file_name"];
	// 		$this->sim->signup($data);
	// 		//print_r($data);
	// 		$this->load->view('brAdmin/default/login');
	// 	}		
	// }

	public function login()
	{
		$data=array(
			"userName"=>$this->input->post("txtuserName"),
			"adminPassword"=>$this->input->post("txtpassword")
		);
		$x1=$this->sim->login($data);
		if($x1==null)
		{
			echo "Invalid User";
		}
		else
		{
			$this->session->userName=$x1->userName;
			//echo $this->session->userdata("name");
			$this->session->profilePic=$x1->profilePic;
			redirect("brAdmin/BookC/");
		}
	}

}

?>