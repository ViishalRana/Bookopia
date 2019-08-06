<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerificationM extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getInfo($authorID)
	{
		return $this->db->where("authorID",$authorID)->get("tblAuthor")->result()[0];
	}

	public function updStatus($authorID)
	{
		return $this->db->set("status","1")->where("authorID",$authorID)->update("tblAuthor");
	}
}
