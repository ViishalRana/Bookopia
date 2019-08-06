<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthorC extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("brAdmin/AuthorM","am");
		$this->load->model("brAdmin/BookM","bm");
		$this->load->model("brAdmin/CityM","ctm");
		$this->load->model("brAdmin/StateM","sm");
		$this->load->model("brAdmin/CountryM","cm");
		if(!$this->session->userName)
		{
			redirect("brAdmin/SignupC/");	
		}		
	}

	
	public function addAuthor()
	{
		if($this->input->post('btnAdd')!="")
		{
			$flag=0;
			if(empty($this->input->post("chkprofileStatus")))
			{
				$data=array(
					"authorAlias"=>$this->input->post("txtauthorAlias"),
					"authorFirstName"=>"".$this->input->post("txtauthorFirstName"),
					"authorLastName"=>"".$this->input->post("txtauthorLastName")
				);
				$this->am->addAuthor($data,$flag);
			}
			else
			{
				$config['upload_path']='./upload/';
				$config['allowed_types']='gif|jpg|jpeg';
				$this->load->library('upload',$config);
				$data=array(
					"authorAlias"=>$this->input->post("txtauthorAlias"),
					"authorFirstName"=>$this->input->post("txtauthorFirstName"),
					"authorLastName"=>$this->input->post("txtauthorLastName"),
					"authorEmail"=>$this->input->post("txtauthorEmail"),
					"authorPassword"=>$this->input->post("txtauthorPassword"),
					"authorBdate"=>$this->input->post("dtauthorBdate"),
					"authorGender"=>$this->input->post("radGender"),
					"authorBio"=>$this->input->post("txtauthorBio"),
					"authorPhoto"=>"",
					"authorCityID"=>$this->input->post("lstCity"),
					"accountCreatedDate"=>$this->input->post("dtaccountCreatedDate"),
					"status"=>1
				);
				$flag=1;

				if(!$this->upload->do_upload('imgauthorProfilePhoto'))
				{
					$error=array('error'=>$this->upload->display_errors());
					$this->load->view('brAdmin/default/addAuthorView',$error);
				}		
				else
				{
					$t=$this->upload->data();
					$data['authorPhoto']=$t["file_name"];
					$this->am->addAuthor($data,$flag);
					$this->load->view('brAdmin/default/authors');
				}
			}
			redirect("brAdmin/AuthorC");
		}
		else
		{
			$x=$this->cm->getAllCountries();
			$y=$this->sm->getAllStates();
			$z=$this->ctm->getAllCities();
			$temp=array(
				"countries"=>$x,
				"states"=>$y,
				"cities"=>$z,
			);
			$this->load->view("brAdmin/default/addAuthorView",$temp);
		}	
	}

	public function index()
	{
		$x=$this->am->getAllAuthors();
		$temp=array("authors"=>$x);
		$this->load->view('brAdmin/default/authors',$temp);
	}


	public function updAuthor($id)
	{
		$x=$this->am->updAuthor($id);
		$temp=array('author'=>$x);
		$this->load->view("brAdmin/default/addAuthorView",$temp);
	}
	public function editAuthor($authorID=null)
	{		
		$x=$this->cm->getAllCountries();
		$y=$this->sm->getAllStates();
		$z=$this->ctm->getAllCities();

		if($authorID!=null)
		{
			if($this->input->post("btnEdit"))
			{
				if(empty($this->input->post("chkprofileStatus")))
				{
					$stat=0;
				}
				else
				{
					$stat=1;
				}
				if(isset($_FILES["imgauthorProfilePhoto"]["name"]) && !empty($_FILES["imgauthorProfilePhoto"]["name"]))
				{
					$data=array(
						"authorAlias"=>$this->input->post("txtauthorAlias"),
						"authorFirstName"=>$this->input->post("txtauthorFirstName"),
						"authorLastName"=>$this->input->post("txtauthorLastName"),
						"authorEmail"=>$this->input->post("txtauthorEmail"),
						"authorPassword"=>$this->input->post("txtauthorPassword"),
						"authorBdate"=>$this->input->post("dtauthorBdate"),
						"authorGender"=>$this->input->post("radGender"),
						"authorBio"=>$this->input->post("txtauthorBio"),
						"authorPhoto"=>"",
						"authorCityID"=>$this->input->post("lstCity"),
						"accountCreatedDate"=>$this->input->post("dtaccountCreatedDate"),
						"status"=>$stat
					);
					$data["authorPhoto"]=$_FILES["imgauthorProfilePhoto"]["name"];
					$config['upload_path']='./upload/';
					$config['allowed_types']='jpg|jpeg|png';
					$this->load->library('upload',$config);
					
					if(!$this->upload->do_upload('imgauthorProfilePhoto'))
					{
						$error=array('error'=>$this->upload->display_errors());
						$this->load->view("brAdmin/default/authors",$error);
					}
					else
					{
						$this->am->editAuthor($data,$authorID);
						redirect("brAdmin/AuthorC");
					}

				}
				else
				{					
					$data=array(
						"authorAlias"=>$this->input->post("txtauthorAlias"),
						"authorFirstName"=>$this->input->post("txtauthorFirstName"),
						"authorLastName"=>$this->input->post("txtauthorLastName"),
						"authorEmail"=>$this->input->post("txtauthorEmail"),
						"authorPassword"=>$this->input->post("txtauthorPassword"),
						"authorBdate"=>$this->input->post("dtauthorBdate"),
						"authorGender"=>$this->input->post("radGender"),
						"authorBio"=>$this->input->post("txtauthorBio"),
						"authorCityID"=>$this->input->post("lstCity"),
						"accountCreatedDate"=>$this->input->post("dtaccountCreatedDate"),
						"status"=>$stat
					);
					$this->am->editAuthor($data,$authorID);
					redirect("brAdmin/AuthorC");
				}
			}
			else
			{
				//$p1=$this->am->updAuthor($authorID);
				$p=$this->am->getAuthorData($authorID);
				$q=$this->am->getBookData();		
				/*print_r($q);
				die();	*/
				$temp=array(
					"countries"=>$x,
					"states"=>$y,
					"cities"=>$z,
					"authordata"=>$p,
					"bookdata"=>$q

				);			
				$this->load->view("brAdmin/default/editAuthor",$temp);							
			}
		}
		else
		{
			$temp=array(
				"countries"=>$x,
				"states"=>$y,
				"cities"=>$z
			);
			$this->load->view("brAdmin/default/editAuthor",$temp);			

		}
	}
	public function deleteAuthor($authorID)
	{
		$this->am->deleteAuthor($authorID);
		redirect("brAdmin/AuthorC");
	}
	public function viewMore($authorID)
	{
		$x=$this->am->getAuthorData($authorID);
		$y=$this->am->getAuthorBooksData($authorID);
		$z=$this->am->getAuthorBlogsData($authorID);
		$a=$this->am->getAuthorPostsData($authorID);
		$b=$this->am->getAuthorReviewsData($authorID);
		$temp=array(
			"authordata"=>$x,
			"authorbookdata"=>$y,
			"authorblogsdata"=>$z,
			"authorpostsdata"=>$a,
			"authorreviewsdata"=>$b
		);

		$this->load->view("brAdmin/default/authorMasterView",$temp);
	}
	public function changeBlogStat($blogID)
	{
		$this->am->changeBlogStat($blogID);
		echo 1;
	}	
	public function changePostStat($postID)
	{
		$this->am->changePostStat($postID);
		echo 1;
	}	
	public function changeReviewStat($reviewID)
	{
		$this->am->changeReviewStat($reviewID);
		echo 1;
	}
	public function changeUserStat($userID,$oldval)
	{
		$this->am->changeUserStat($userID);
		$x=$this->am->getUserData($userID);
		if($oldval==0)
		{
			//to be blocked
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
			$si.="Hello ".$x->userFirstName." ".$x->userLastName.",<br> <p>This is to inform you that your account has been blocked due to unusual activity or in violation of our poilicy.</p><br><p>Please contact us on this mail 'ranavishal12998@gmail.com' with your registered mail only.</p>";
			$si.="<br>";
			$si.="<b>Team Bookopia</b>.";

			// $si.= anchor("brUser/VerificationC/index/".$authorID,"Click here");
			$si.="</body>";
			$si.="</html>";

        //Load email library
			$this->email->from('urbanshiksha2019@gmail.com', 'Account Help');
			$this->email->to($x->userEmail);
			$this->email->subject('Account Help');
			$this->email->message($si);
        //Send mail
			// echo "<pre>";
			// print_r($config);
			// print_r($si);
			// die();
			if($this->email->send())
			{
				 echo "mail sent";
			}
			else
			{
				show_error($this->email->print_debugger());
			}

		}
		else
		{
			//to be unblocked
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
			$si.="Hello ".$x->userFirstName." ".$x->userLastName.",<br> <p>This is to inform you that your account has been unblocked.Thank you for your cooperation.</p>";
			$si.="<br>";
			$si.="<b>Team Bookopia</b>.";

			// $si.= anchor("brUser/VerificationC/index/".$authorID,"Click here");
			$si.="</body>";
			$si.="</html>";

        //Load email library
			$this->email->from('urbanshiksha2019@gmail.com', 'Account Help');
			$this->email->to($x->userEmail);
			$this->email->subject('Account Help');
			$this->email->message($si);
        //Send mail
			// echo "<pre>";
			// print_r($config);
			// print_r($si);
			// die();
			if($this->email->send())
			{
				 echo "mail sent";
			}
			else
			{
				show_error($this->email->print_debugger());
			}
		}
		//echo 1;
	}
	public function searchBooks($srs)
	{
		$x=$this->am->searchBooks($srs);
		echo json_encode($x);
	}	
	public function addAuthorBook($authorID)
	{
		$bookList=$this->input->post("chkBook");
		foreach ($bookList as $key) {
			$this->am->addAuthorBook($authorID,$key);
		}
		$x=$this->cm->getAllCountries();
		$y=$this->sm->getAllStates();
		$z=$this->ctm->getAllCities();		
				$p=$this->am->getAuthorData($authorID);
				$q=$this->am->getBookData();		
				/*print_r($q);
				die();	*/
				$temp=array(
					"countries"=>$x,
					"states"=>$y,
					"cities"=>$z,
					"authordata"=>$p,
					"bookdata"=>$q

				);			
				$this->load->view("brAdmin/default/editAuthor",$temp);			
	}
}
