<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageProfileC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("brUser/ManageProfileM","mm");
		$this->load->model("brUser/HomeM","hm");
	}

	public function index()
	{
		$x=$this->mm->getManageData();

		// print_r($x);
		// die();
		if($this->session->userType=="User")
		{
		$y=$this->hm->getGenre();
		$a=$this->mm->getCountry();
		$x->cityData=$this->mm->getCityData($x->userCityID);
		/*	print_r($x);
			die();
		*/	foreach ($y as $key) 
			{
				$key->gID=$this->hm->fetchBookGenre($key->genreID);
			}
		$temp=array(
			"users"=>$x,
			"genres"=>$y,
			"countries"=>$a
			);
		}
		else
		{
			$y=$this->hm->getGenre();
		$a=$this->mm->getCountry();
		$x->cityData=$this->mm->getCityData($x->authorCityID);
		/*	print_r($x);
			die();
		*/	foreach ($y as $key) 
			{
				$key->gID=$this->hm->fetchBookGenre($key->genreID);
			}
		$temp=array(
			"users"=>$x,
			"genres"=>$y,
			"countries"=>$a
			);
		// print_r($temp);
		// die();
		}
		$this->load->view("brUser/profileView",$temp);
	}


	public function updateDetails()
	{
		if($this->session->userType=="User")
		{
		$data=array(
			"userFirstName"=>$this->input->post("txtuserFirstName"),
			"userLastName"=>$this->input->post("txtuserLastName"),
			"userEmail"=>$this->input->post("txtuserEmail"),
			"userBdate"=>$this->input->post("dtuserBdate"),
			"userGender"=>$this->input->post("radGender"),
			"userBio"=>$this->input->post("txtuserBio"),
			"userCityID"=>$this->input->post("lstCity")
			
		);
		}
		else
		{
			$data=array(
			"authorFirstName"=>$this->input->post("txtuserFirstName"),
			"authorLastName"=>$this->input->post("txtuserLastName"),
			"authorEmail"=>$this->input->post("txtuserEmail"),
			"authorBdate"=>$this->input->post("dtuserBdate"),
			"authorGender"=>$this->input->post("radGender"),
			"authorBio"=>$this->input->post("txtuserBio"),
			"authorCityID"=>$this->input->post("lstCity")
			
		);
		}
		$this->mm->updateDetails($data);
		redirect("brUser/ManageProfileC/");
	}

	public function changeProfile()
	{
		$x1=$this->mm->changeProfile();
		// echo $this->session->userType;
		// print_r($x1);
		// die();
		if($x1==null)
		{
			redirect("brUser/ManageProfileC/changePic");
		}
		else
		{
			$this->session->set_userdata("image",$x1->userPhoto);
		}
	}

	public function changePic()
	{
		if(isset($_FILES['profile']['name']))
		{
			$config['upload_path']="./upload/";
			$config['allowed_types']="jpg|jpeg|png";
			$config['overwrite']=true;
			$config['file_name'] = $this->session->userFirstName;
			$this->load->library('upload',$config);

			if($this->session->userType=="User")
			{
			if($this->upload->do_upload('profile'))
			{
				$t=$this->upload->data();
				$temp=$t["file_name"];
				$uname=$this->session->userFirstName;
				$data=array("userPhoto"=>$temp);
				$flag=$this->mm->changepic($data,$uname);
				
				//redirect("brAdmin/ProfileC/");
				// print_r($data);
				// die()
				if($flag)
				{
					$this->session->set_userdata("userPhoto",$temp);
					redirect("brUser/ManageProfileC/");
				}
				else
				{
					echo "Invalid";
				}
			}
			else
			{
				$error=array('error'=>$this->upload->display_errors());
				$this->load->view('brUser/ManageProfileC/changeProfile',$error);

			}
			}
			else
			{
				if($this->upload->do_upload('profile'))
			{
				$t=$this->upload->data();
				$temp=$t["file_name"];
				$uname=$this->session->userFirstName;
				$data=array("authorPhoto"=>$temp);
				$flag=$this->mm->changepic($data,$uname);
				
				//redirect("brAdmin/ProfileC/");
				// print_r($data);
				// die()
				if($flag)
				{
					$this->session->set_userdata("authorPhoto",$temp);
					redirect("brUser/ManageProfileC/");
				}
				else
				{
					echo "Invalid";
				}
			}
			else
			{
				$error=array('error'=>$this->upload->display_errors());
				$this->load->view('brUser/ManageProfileC/changeProfile',$error);

			}
			}
		}
	}

	public function changePass($str)
	{
		if($this->session->userType=="User")
		{
		$data=array(
			"userFirstName"=>$this->session->userFirstName,
			"userPassword"=>$str
		);
		}
		else
		{
			$data=array(
			"authorFirstName"=>$this->session->userFirstName,
			"authorPassword"=>$str
		);
		}
		$x1=$this->mm->changePass($data);
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
		$name=$this->session->userFirstName;
		if($this->session->userType=="User")
		{
		$data=array(
			"userPassword"=>$pass
		);
		}
		else
		{
			$data=array(
			"authorPassword"=>$pass
		);
		}
		$this->mm->updPass($data,$name);
		echo "success";
	}

	public function stateAjax($id)
	{
		$x=$this->mm->stateAjax($id);
		?>
		<option value="0">Select State</option>
		<?php
		foreach ($x as $key) {
			?>
			<option value="<?=$key->stateID?>"><?=$key->stateName?></option>
			<?php
		}

		// $temp=json_encode($x);
		// //echo "<pre>";
		// echo $temp;
		// //die();
	}

	public function cityAjax($cid)
	{
		$x=$this->mm->cityAjax($cid);
		?>
		<option value="0">Select City</option>
		<?php
		foreach ($x as $c) 
		{
			?>
			<option value="<?=$c->cityID?>"><?=$c->cityName?></option>
			<?php
		}		
	}

}
?>