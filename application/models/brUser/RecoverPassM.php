<?php

defined('BASEPATH') OR exit('Ille');
/**
 * 
 */
class RecoverPassM extends CI_Model
{

	public function chngPass($data,$userName)
	{
		return $this->db->set($data)->where("userFirstName",$userName)->update("tblUserMaster");
	}
}
?>