<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GenreM extends CI_Model 
{
	public function getGenre()
	{
		return $this->db->get("tblGenre")->result();
	}

	public function addGenre($data)
	{
		$this->db->insert("tblgenre",$data);
	}

	public function deleteGenre($genreID)
	{
		$this->db->where("genreID",$genreID);
		$this->db->delete("tblGenre");
	}

	public function getGenreData($genreID)
	{
		return $this->db->where("genreID",$genreID)->get("tblgenre")->result()[0];
	}

	public function editGenre($data)
	{
		$this->db->set(["genreName"=>$data['genreName']])->where("genreID",$data['genreID'])->update("tblgenre");
	}
}
?>