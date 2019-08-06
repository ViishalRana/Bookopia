<?php

defined('BASEPATH') OR exit('Ille');
/**
 * 
 */
class RecoverPassC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("brUser/RecoverPassM","rm");
	}

	public function index($name)
	{
		$encrypt_method="AES-256-CBC";
        $key='6818f23eef19d38dad1d2729991f6368';
        $iv='0ac35e3823616c81';
        $dec=base64_decode(strtr($name, '._-', '+/='));
    	$dec_user = openssl_decrypt($dec, $encrypt_method, $key, 0, $iv);
		$data = array("userFirstName"=>$dec_user);
		$this->load->view("brUser/recoverPass",$data);
	}

	public function chngPass($userName)
	{
		$data = array(
			"userPassword" => $this->input->post('npass')
		);

		$this->rm->chngPass($data,$userName);
		$this->load->view("brUser/login");
	}

	/*public function check($name)
	{
		$encrypt_method="AES-256-CBC";
        $key='6818f23eef19d38dad1d2729991f6368';
        $iv='0ac35e3823616c81';
        $enc_user = openssl_encrypt($name, $encrypt_method, $key, 0, $iv);
        echo "encrypt = ".$enc_user;
        echo "<br>";
        $enc=strtr(base64_encode($enc_user), '+/=', '._-');
        echo "encode = ".$enc;
        echo "<br>";

        // $dec=rawurldecode($enc);
        $dec=base64_decode(strtr($enc, '._-', '+/='));
    	echo "decode = ".$dec;
    	echo "<br>";
    	$dec_user = openssl_decrypt($dec, $encrypt_method, $key, 0, $iv);
    	echo "decrypt = ".$dec_user;
        echo "<br>";
	}*/
}


?>