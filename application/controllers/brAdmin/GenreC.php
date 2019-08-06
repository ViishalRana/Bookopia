<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GenreC extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("brAdmin/GenreM","gm");
		if(!$this->session->userName)
		{
			redirect("brAdmin/SignupC/");	
		}
	}

	public function index()
	{
		$x=$this->gm->getGenre();
		$temp=array("genres"=>$x);
		$this->load->view('brAdmin/default/genreView',$temp);
	}

	public function addGenre()
	{
		$data=array(
			"genreName"=>$this->input->post("txtgenreName")
		);
		$this->gm->addGenre($data);
		redirect("brAdmin/GenreC/");
	}

	public function deleteGenre($genreID)
	{
		$this->gm->deleteGenre($genreID);
		redirect("brAdmin/GenreC/");
	}

	public function getGenreData($genreID)
	{
		$x=$this->gm->getGenreData($genreID);
		$temp=json_encode($x);
		echo $temp;
	}

	public function editGenre($genreID)
	{
		$data=array(
			"genreName"=>$this->input->post("txtgenreName"),
			"genreID"=>$genreID
		);
		$this->gm->editGenre($data);
		redirect("brAdmin/GenreC");
	}
}
?>