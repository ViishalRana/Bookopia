<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StateC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("brAdmin/StateM","sm");
		$this->load->model("brAdmin/CountryM","cm");
		$this->load->model("brAdmin/CityM","ctm");
		if(!$this->session->userName)
		{
			redirect("brAdmin/SignupC/");	
		}
	}
	public function index()
	{
		$x=$this->sm->getAllStates();
		$y=$this->cm->getAllCountries();
		$temp=array(
			"states"=>$x,
			"countries"=>$y
		);
		$this->load->view("brAdmin/default/stateView",$temp);
	}
	public function countryStates($countryID)
	{
		$x=$this->sm->getCountryStates($countryID);
		$y=$this->cm->getAllCountries();
		$temp=array(
			"states"=>$x,
			"countryID"=>$countryID,
			"countries"=>$y
		);
		$this->load->view("brAdmin/default/stateView",$temp);
	}
	public function getAJAXState($countryID)
	{
		//echo "1";
		echo $this->sm->getAJAXState($countryID);
	}
	public function addState($countryID=null)
	{
		$data=array(
			"stateName"=>$this->input->post("txtstateName"),
			"countryID"=>""	
		);
		if($countryID==null)
		{
			$data["countryID"]=$this->input->post("lstcountryID");
		}
		else
		{
			$data["countryID"]=$countryID;
		}
		$this->sm->addState($data);
		redirect("brAdmin/StateC/");
	}
	public function editState($stateID)
	{
		$data=array(
			"stateName"=>$this->input->post("txtstateName"),
			"countryID"=>$this->input->post("lstcountryID")
		);
		$this->sm->editState($data,$stateID);
		redirect("brAdmin/StateC");
	}
	public function deleteState($stateID)
	{
		$this->ctm->deleteStateCity($stateID);
		$this->sm->deleteState($stateID);
		redirect("brAdmin/StateC");
	}
	public function fillStates($countryID)
	{
		$states=$this->sm->getState($countryID);
		?>
			<option value="-1">Select State</option>
		<?php
		foreach($states as $key)
		{
				?>
				<option value="<?=$key->stateID?>"><?=$key->stateName?></option>
				<?php
		}
	}
}
?>