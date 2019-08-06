<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CityC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("brAdmin/CityM","ctm");
		$this->load->model("brAdmin/StateM","sm");
		$this->load->model("brAdmin/CountryM","cm");
		if(!$this->session->userName)
		{
			redirect("brAdmin/SignupC/");	
		}
	}
	public function index()
	{
		$x=$this->ctm->getAllCities();
		$y=$this->cm->getAllCountries();
		$temp=array(
			"cityData"=>$x,
			"countryData"=>$y
		);
		$this->load->view("brAdmin/default/cityView",$temp);
	}
	public function stateCities($stateID,$countryID)
	{
		$x=$this->ctm->getstateCityData($stateID);
		$y=$this->cm->getAllCountries();
		$temp=array(
			"cityData"=>$x,
			"countryData"=>$y,
			"stateID"=>$stateID,
			"countryID"=>$countryID
		);
		$this->load->view("brAdmin/default/cityView",$temp);
	}
	public function addCity($stateID=null)
	{
		$data=array(
			"cityName"=>$this->input->post("txtcityName"),
			"stateID"=>$this->input->post("lstState")
		);
		$this->ctm->addCity($data);
		redirect("brAdmin/CityC");
	}
	public function editCity($cityID)
	{
		$data=array(
			"cityName"=>$this->input->post("txtcityName"),
			"stateID"=>$this->input->post("lstState")
		);
		$this->ctm->editCity($data,$cityID);
		redirect("brAdmin/CityC");

	}
	public function deleteCity($cityID)
	{
		$this->ctm->deleteCity($cityID);
		redirect("brAdmin/CityC");
	}
	public function fillCities($stateID)
	{
		$states=$this->ctm->getcity($stateID);
		?>
		<option value="-1">Select City</option>
		<?php
		foreach ($states as $key) {
			?>
			<option value="<?=$key->cityID?>"><?=$key->cityName?></option>
			<?php
			# code...
		}
	}
}
?>