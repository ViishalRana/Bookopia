<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CountryC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("brAdmin/CountryM","cm");
		$this->load->model("brAdmin/StateM","sm");
		$this->load->model("brAdmin/CityM","ctm");
		if(!$this->session->userName)
		{
			redirect("brAdmin/SignupC/");	
		}
	}
	public function index()
	{
		$x=$this->cm->getAllCountries();
		$temp=array(
			"countries"=>$x
		);
		$this->load->view("brAdmin/default/countryView",$temp);
	}
	public function addCountry()
	{
		$data=array(
			"countryName"=>$this->input->post("txtcountryName"),
			"countryCode"=>$this->input->post("lstcountryCode")
		);
		$this->cm->addCountry($data);
		redirect("brAdmin/CountryC/");
	}
	public function getAJAXCountry($countryID)
	{
		$x=$this->cm->getCountryData($countryID);
		$xJSON=json_encode($x);
		echo $xJSON;
	}
	public function editCountry($countryID)
	{
		$data=array(
			"countryName"=>$this->input->post("txtcountryName"),
			"countryCode"=>$this->input->post("lstcountryCode"),
			"countryID"=>$countryID
		);
		$this->cm->editCountry($data);
		redirect("brAdmin/CountryC");
	}
	public function deleteCountry($countryID)
	{
		$x=$this->cm->getCountryStateID($countryID);
		foreach($x as $key)
		{
			$this->ctm->deleteStateCity($key->stateID);			
		}
		$this->sm->deleteCountryState($countryID);
		$this->cm->deleteCountry($countryID);
		redirect("brAdmin/CountryC");
	}
}
?>