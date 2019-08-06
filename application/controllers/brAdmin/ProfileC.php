<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("brAdmin/BookM","bm");
		$this->load->model("brAdmin/ProfileM","pm");
		if(!$this->session->userName)
		{
			redirect("brAdmin/SignupC/");	
		}
	}

	public function index()
	{
		$x=$this->bm->getbook();
		$temp=array('books'=>$x);
		$this->load->view("brAdmin/default/profile",$temp);
	}

	public function changeProfile()
	{
		$x1=$this->pm->changeProfile($data);
		if($x1==null)
		{
			echo "Null";
		}
		else
		{
			$this->session->set_userdata("image",$x1->profilePic);
		}
	}

	public function changePic()
	{
		if(isset($_FILES['profile']['name']))
		{
			$config['upload_path']="./upload/";
			$config['allowed_types']="jpg|jpeg|png";
			$config['overwrite']=true;
			$config['file_name'] = $this->session->userName;
			$this->load->library('upload',$config);

			if($this->upload->do_upload('profile'))
			{
				$t=$this->upload->data();
				$temp=$t["file_name"];
				$aname=$this->session->userName;
				$data=array("profilePic"=>$temp);
				$flag=$this->pm->changepic($data,$aname);
				//redirect("brAdmin/ProfileC/");
				if($flag)
				{
					redirect("brAdmin/ProfileC/");
				}
				else
				{
					echo "Invalid";
				}
			}
			else
			{
				$error=array('error'=>$this->upload->display_errors());
				$this->load->view('brAdmin/ProfileC/changeProfile',$error);

			}
		}
	}

	public function changePass($str)
	{
		$data=array(
			"userName"=>$this->session->userName,
			"adminPassword"=>$str
		);
		$x1=$this->pm->changePass($data);
		if($x1)
		{
			echo "Password is correct";
		}
		else
		{
			echo "Password is not correct";
		}
	}

	public function updPass($pass)
	{
		$name=$this->session->userName;
		$data=array(
			"adminPassword"=>$pass
		);
		$this->pm->updPass($data,$name);
		echo "success";
	}

}
?>