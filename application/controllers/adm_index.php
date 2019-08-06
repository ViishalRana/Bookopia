<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adm_index extends CI_Controller 
{
	public function index()
	{
		$this->load->view('id_adm/default/index');
	}
}
