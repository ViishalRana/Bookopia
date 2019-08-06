<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("brAdmin/UserM","um");
		//$this->load->model("brAdmin/AuthorM","am");
		if(!$this->session->userName)
		{
			redirect("brAdmin/SignupC/");	
		}
	}

	public function index()
	{
		$x=$this->um->getAllUser();
		$temp=array("users"=>$x);
		$this->load->view('brAdmin/default/userView',$temp);
	}

	public function addUser()
	{
		if($this->input->post("btnAdd"))
		{
			$config['upload_path'] = './upload/';     
			$config['allowed_types'] = 'gif|jpg|png|jpeg'; 
			$config['file_name']=$this->session->userFirstName;    
			$this->load->library('upload', $config);

			$data=array(
				"userFirstName"=>$this->input->post("txtFirstName"),
				"userLastName"=>$this->input->post("txtLastName"),
				"userEmail"=>$this->input->post("txtEmail"),
				"userPassword"=>$this->input->post("txtPassword"),
				"userGender"=>$this->input->post("r1"),
				"userBdate"=>$this->input->post("dtBirthDate"),
				"userBio"=>$this->input->post("txtUserBio"),
				"userPhoto"=>"",
				"userCityID"=>$this->input->post("lstCity")
			);
			if(!$this->upload->do_upload('imgPhoto'))
			{
				$error=array('error'=>$this->upload->display_errors());
				$this->load->view("brAdmin/default/addUserView",$error);
			}
			else
			{
			$t=$this->upload->data();
			$data['userPhoto']=$t["file_name"];
			$this->um->addUser($data);
			$this->load->view("brAdmin/default/addUserView");
			}
		}	
		else
		{
			$x=$this->um->getCity();
			$y=$this->um->getCountry();
			$z=$this->um->getState();
			$temp=array('cities'=>$x,
				'countries'=>$y,
				'states'=>$z
			);
			$this->load->view("brAdmin/default/addUserView",$temp);
		}		
	}

	public function stateAjax($id)
	{
		$x=$this->um->stateAjax($id);
		?>
		<option value="0">Select State</option>
		<?php
		foreach ($x as $key) {
			?>
			<option value="<?=$key->stateID?>"><?=$key->stateName?></option>
			<?php
		}
	}

	public function cityAjax($cid)
	{
		$x=$this->um->cityAjax($cid);
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

	public function updUser($uid)
	{
		$x=$this->um->updUser($uid);
		$temp=array("users"=>$x);
		$this->load->view("brAdmin/default/editUserView",$temp);
	}

	public function editUser($userID)
	{
		if($userID!=0)
		{
			if($this->input->post('btnEdit'))
			{
				$users=array(
					"userID"=>$userID,
					"userFirstName"=>$this->input->post("txtFirstName"),
					"userLastName"=>$this->input->post("txtLastName"),
					"userEmail"=>$this->input->post("txtEmail"),
					"userPassword"=>$this->input->post("txtPassword"),
					"userGender"=>$this->input->post("r1"),
					"userBdate"=>$this->input->post("dtBirthDate"),
					"userBio"=>$this->input->post("txtUserBio"),
					"userPhoto"=>""
					//"userCityID"=>$this->input->post("lstCity")
				);
				if(isset($_FILES["imgPhoto"]["name"]) && !empty($_FILES["imgPhoto"]["name"]))
				{
					$users["userPhoto"]=$_FILES["imgPhoto"]["name"];
					$config['upload_path'] = './upload/';     
			        $config['allowed_types'] = 'jpg|png|jpeg';     
			        $this->load->library('upload', $config);
					if(!$this->upload->do_upload('imgPhoto'))
					{
						$error=array('error'=>$this->upload->display_errors());
			         	$this->load->view('brAdmin/default/editUserView',$error);
					}
					else
					{
						$this->um->editUser($users,$userID);
						redirect("brAdmin/UserC");
					}
				}
				else
				{
					$users["userPhoto"]="no image";
			  	    $this->um->editUser($users,$userID);
					redirect("brAdmin/UserC");
				}
			}
			else
			{
				$x=$this->um->updUser($userID);
				$temp=array("users"=>$x);
				$this->load->view("brAdmin/default/editUserView",$temp);
			}
		}
		else
		{
		$this->load->view("brAdmin/default/editUserView");
		}
	}

}
?>