<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SignupM extends CI_Model
{
	// public function signup($data)
	// {
	// 	$this->db->insert("tbladmin",$data);
	// }

	public function login($data)
	{
		$this->db->where($data);
		$x=$this->db->get("tbladmin");
		if($x->num_rows()>0)
		{
			return $x->result()[0];
		}
		else
		{
			return null;
		}
	}
}
?>