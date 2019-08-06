<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class LoginC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("brUser/LoginM","lm");
		$this->load->model("brUser/HomeM","hm");
		if($this->session->userID)
		{
			redirect("brUser/HomeC/");
		}
	}

	public function index()
	{
		$this->load->view('brUser/login');		
	}

	public function signup()
	{

		if($this->input->post("r2")=="User")
		{
		$data=array(
			"userFirstName"=>$this->input->post("txtFirstName"),
			"userLastName"=>$this->input->post("txtLastName"),
			"userEmail"=>$this->input->post("txtEmail"),
			"userPassword"=>$this->input->post("txtPassword"),
			"userGender"=>$this->input->post("r1"),
			"userBdate"=>$this->input->post("date"),
			"userContactNO"=>$this->input->post("txtuserContactNo")
		);

		$this->lm->signup($data);
		// print_r($data);
		// die();
		$this->load->view('brUser/login');
		
		}
		else
		{
			$data=array(
			"authorFirstName"=>$this->input->post("txtFirstName"),
			"authorLastName"=>$this->input->post("txtLastName"),
			"authorEmail"=>$this->input->post("txtEmail"),
			"authorPassword"=>$this->input->post("txtPassword"),
			"authorGender"=>$this->input->post("r1"),
			"authorBdate"=>$this->input->post("date"),
			"authorContactNO"=>$this->input->post("txtuserContactNo")
		);

		$this->lm->signupAuthor($data);
		// print_r($data);
		// die();

		$config = array(
				"protocol" => 'smtp',
				"smtp_host" => 'ssl://smtp.googlemail.com',
				"smtp_port" => 465,
				"smtp_user" => 'urbanshiksha2019@gmail.com',
				"smtp_pass" => 'urbanshiksha@2019'
			);

			$this->load->library('email',$config);

			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");

			$authorID=$this->db->insert_id();
			$si="<html>";
			$si.="<body>";
			$si.="We have recieved your registration details successfully. We are happy to welcome you to out Bookopia community. <p>Please send us your documents in order to activate your profile. Once we verify your documents you will be all set to join our Bookopia community.</p><br><p>Please send us your documents on this mail 'ranavishal12998@gmail.com' with your registered mail only.</p>";
			$si.="<br>";
			$si.="note: Once you send us your documents ,verification may take 24 hours.";
			$si.="<b>Team Bookopia</b>.";

			// $si.= anchor("brUser/VerificationC/index/".$authorID,"Click here");
			$si.="</body>";
			$si.="</html>";

        //Load email library
			$this->email->from('urbanshiksha2019@gmail.com', 'Registration Success');
			$this->email->to($this->input->post('txtEmail'));
			$this->email->subject('Registration Success');
			$this->email->message($si);
        //Send mail
			// echo "<pre>";
			// print_r($config);
			// print_r($si);
			// die();
			if($this->email->send())
			{
				// echo "string";
        	$this->load->view("brUser/authorRegister.php");
			}
			else
			{
				show_error($this->email->print_debugger());
			}
		}
		// $this->load->view('brUser/login');
	}
	public function loginUser()
	{
		//echo "0";
		if($this->input->post("rad")=="User")
		{
		$data=array(
			"userEmail"=>$this->input->post("txtEmail"),
			"userPassword"=>$this->input->post("txtPassword"),
			"userType"=>$this->input->post("rad")
		);
		//echo "user";
		}
		else
		{
		$data=array(
			"authorEmail"=>$this->input->post("txtEmail"),
			"authorPassword"=>$this->input->post("txtPassword"),
			"userType"=>$this->input->post("rad")
		);
		//echo "author";
		}
		$x1=$this->lm->loginUser($data);
		if($x1==null)
		{
			$data=array(
				"error"=>"Invalid Credentials Or Blocked.Please check your mail with the registered email to check if your account is blocked or not."
			);
			$this->load->view('brUser/login',$data);					
		}
		else
		{
			if($data["userType"]=="User")
			{
			$x=$this->hm->getGenre();
			foreach ($x as $key) 
			{
				$key->gID=$this->hm->fetchBookGenre($key->genreID);
			}
			$temp=array("genres"=>$x);
			 $this->session->userID=$x1->userID;
			 $this->session->userType="User";
			//$this->session->userdata("userID",$x1->userID);
			 $this->session->userPhoto=$x1->userPhoto;
			 $this->session->userFirstName=$x1->userFirstName;
			 $this->session->userLastName=$x1->userLastName;
			 $this->session->livesession=0;
			//  echo "<pre>";
			// // echo $this->session->userID;
			//  print_r($x1);
			//  print_r($temp);
			//  die();
			//echo "loaduser";
			redirect("brUser/HomeC");

			}
			else
			{
			//	echo "loadauthor";
			$x=$this->hm->getGenre();
			foreach ($x as $key) 
			{
				$key->gID=$this->hm->fetchBookGenre($key->genreID);
			}
			$temp=array("genres"=>$x);
			 $this->session->userID=$x1->authorID;
			 $this->session->userType="Author";
			//$this->session->userdata("userID",$x1->userID);
			 $this->session->userPhoto=$x1->authorPhoto;
			 $this->session->userFirstName=$x1->authorFirstName;
			 $this->session->userLastName=$x1->authorLastName;			 
			 $this->session->userAlias=$x1->authorAlias;
			 $this->session->livesession=0;
			 
			//  echo "<pre>";
			// // echo $this->session->userID;
			//  print_r($x1);
			//  print_r($temp);
			//  die();
			
			redirect("brUser/HomeC");

			}
		}	
	}

	public function forgetPassword()
	{
		$data=array(
			"userFirstName"=>$this->input->post("name"),
			"userEmail"=>$this->input->post("mail"),
			"userContactNo"=>$this->input->post("cno")
			);
		$x1=$this->lm->forgetPassword($data);
		 if($x1)
		 {
		 	echo "Mail sent on your email";
		 }
		 else
		 {
		 	echo "Invalid Username or password";
		 }
		// print_r($data);
		// die();
	}

	public function sendMail()
	{
		// $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
  //   	$password = substr( str_shuffle( $chars ), 0, 8 );

		$mail = $this->input->post('mail');
        $config = array(
		    "protocol" => 'smtp',
			"smtp_host" => 'ssl://smtp.googlemail.com',
			"smtp_port" => 465,
			"smtp_user" => 'urbanshiksha2019@gmail.com',
			"smtp_pass" => 'urbanshiksha@2019'
        );
        // print_r($config);
        // die();
        $encrypt_method="AES-256-CBC";
        $key='6818f23eef19d38dad1d2729991f6368';
        $iv='0ac35e3823616c81';
        $enc_user = openssl_encrypt($this->input->post('name'), $encrypt_method, $key, 0, $iv);
    	$enc=strtr(base64_encode($enc_user), '+/=', '._-');
		$this->load->library('email',$config);

		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");
		$si = anchor("brUser/RecoverPassC/index/".$enc,"Click here");
        //Load email library
        $this->email->from('urbanshiksha2019@gmail.com','Identification');
        $this->email->to($mail);
        $this->email->subject('Send Email Codeigniter');
        $this->email->message($si);
		// $this->email->set_alt_message();
        //Send mail
        // echo "<pre>";
        // print_r($config);
        // die();
        if($this->email->send())
        {
        	echo "Correct";
        	// $data = array(
        	// 	"password" => $password
        	// );

        	// $this->fm->updPass($data,$mail);
        }
        else
        {
        	show_error($this->email->print_debugger());
        }
	}
	
} 
?>