<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AuthorC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("brUser/AuthorM","am");
		$this->load->model("brUser/HomeM","hm");
		if(!$this->session->userID)
		{
			redirect("brUser/LoginC");
		}
	}

	public function getAuthor()
	{
		$y=$this->am->getAuthor();
		$x=$this->hm->getGenre();
			foreach ($x as $key) 
			{
				$key->gID=$this->hm->fetchBookGenre($key->genreID);
			}
		$temp=array("authors"=>$y,"genres"=>$x);
		$this->load->view('brUser/authorView',$temp);
	}

	public function authorInfo($authorID,$activetab=null)
	{
		$x=$this->am->authorInfo($authorID);
		$y=$this->am->getAuthorBook($authorID);
		$z=$this->am->getFollowStatus($authorID);
		$a=$this->am->getPublishedBooksCount($authorID);
		$b=$this->am->getAuthorBlogs($authorID);
/*		print_r($b);
		die();*/
		$c=$this->am->getAuthorPosts($authorID);
		//print_r($b);
		$x1=$this->hm->getGenre();
			foreach ($x1 as $key) 
			{
				$key->gID=$this->hm->fetchBookGenre($key->genreID);
			}
		foreach ($y as $key) 
		{
			$key->bkID=$this->am->fetchGenre($key->bookID);
		}
		$temp=array(
			"author"=>$x,
			"auth"=>$y,
			"followStatus"=>$z,
			"genres"=>$x1,
			"publishedbooks"=>$a,
			"authorblogs"=>$b,
			"authorposts"=>$c,
			"activetab"=>$activetab
		);
	
		$this->load->view('brUser/authorViewMore',$temp);
	}

	public function unfollowUser($authorID)
	{

		echo $this->am->unfollowUser($authorID);

	}

	public function followUser($authorID)
	{
		$data=array(
			"authorID"=>$authorID,
			"userID"=>$this->session->userID,
			"userType"=>$this->session->userType
		);
		/*$uid=site_url("brUser/AuthorC/authorInfo/").$this->session->userID;*/
		$msg='<a href="javascript:void(0)"><b>'.$this->session->userFirstName." ".$this->session->userLastName."</b> started following you.</a>";
		$this->am->sendAuthorNotification($msg,$authorID);

		echo $this->am->followUser($data);

	}
	public function addPost()
	{
		if($this->input->post("btnpost"))
		{
			$data=array(
				"authorID"=>$this->session->userID,
				"postData"=>addslashes($this->input->post("txtpostData")),
				"imageURL"=>""	
			);
/*			print_r($data);
			die();*/
				$config['upload_path']='./upload/authorpost';
				$config['allowed_types']='gif|jpg|jpeg|png';
			$config['file_name']=$this->session->userFirstName."_post".date("Y_m_d").time();
				$this->load->library('upload',$config);

			if(isset($_FILES["imgFile"]["name"]) && !empty($_FILES["imgFile"]["name"]))
			{

			if(!$this->upload->do_upload('imgFile'))
				{
					$error=array('error'=>$this->upload->display_errors());
					redirect("brUser/HomeC");
				}		
				else
				{
					
					$data['imageURL']=$this->session->userFirstName."_post".date("Y_m_d").time().".jpg";
					$this->am->addPost($data);
							$uid=site_url("brUser/AuthorC/authorInfo/").$this->session->userID;
					$msg='<a href="'.$uid.'"><b>'.$this->session->userFirstName." ".$this->session->userLastName."</b> added a new post.</a>";
					$this->am->sendNotification($msg);
					redirect("brUser/AuthorC/authorInfo/".$this->session->userID."/posts");
				} 

			}
			else
			{
					$this->am->addPost($data);
							$uid=site_url("brUser/AuthorC/authorInfo/").$this->session->userID;
					$msg='<a href="'.$uid.'"><b>'.$this->session->userFirstName." ".$this->session->userLastName."</b> added a new post.</a>";
					$this->am->sendNotification($msg);
					redirect("brUser/AuthorC/authorInfo/".$this->session->userID."/posts");
			}
		}
	}
	public function addBlog()
	{
		if($this->input->post("btnpost"))
		{

				$config['upload_path']='./upload/authorblog';
				$config['allowed_types']='gif|jpg|jpeg';
			$config['file_name']=$this->session->userFirstName."_blog".date("Y_m_d").time();
				$this->load->library('upload',$config);

			$data=array(
				"blogTitle"=>$this->input->post("txtTitle"),
				"image"=>"",
				"blog"=>addslashes($this->input->post("txtblogData")),
				"authorID"=>$this->session->userID
			);
			if(isset($_FILES["imgBlog"]["name"]) && !empty($_FILES["imgBlog"]["name"]))
			{
			if(!$this->upload->do_upload('imgBlog'))
				{
					$error=array('error'=>$this->upload->display_errors());
					print_r($error);
					die();
/*					$this->load->view('brAdmin/default/addAuthorView',$error);
*/				}		
				else
				{
					
					$data['image']=$this->session->userFirstName."_blog".date("Y_m_d").time().".jpg";

					$this->am->addBlog($data);
					$uid=site_url("brUser/AuthorC/authorInfo/").$this->session->userID;
					$msg='<a href="'.$uid.'"><b>'.$this->session->userFirstName." ".$this->session->userLastName."</b> added a new Blog.</a>";
					$this->am->sendNotification($msg);
					redirect("brUser/AuthorC/authorInfo/".$this->session->userID."/blogs");
				} 

			}
			else
			{
					$this->am->addBlog($data);
					$uid=site_url("brUser/AuthorC/authorInfo/").$this->session->userID;
					$msg='<a href="'.$uid.'"><b>'.$this->session->userFirstName." ".$this->session->userLastName."</b> added a new Blog.</a>";
					$this->am->sendNotification($msg);
					redirect("brUser/AuthorC/authorInfo/".$this->session->userID."/blogs");
			}
		}
		else
		{
			echo 1;
			die();
		}
	}
	public function getNotification()
	{
		$x=$this->am->getNotification();
		echo json_encode($x);
	}
	public function getNewNotification($olt)
	{
		$x=$this->am->getNewNotification($olt);
		//print_r($x);
		echo json_encode($x);
	}	
	public function startLiveChat()
	{
		$data=array(
			"authorID"=>$this->session->userID,
			"status"=>1
		);
		$lsid=$this->am->createLiveSession($data);
		$uid=site_url("brUser/AuthorC/loadLiveSession/").$lsid;
		$msg='<a href="'.$uid.'"><b>'.$this->session->userFirstName." ".$this->session->userLastName."</b> is now Live.</a>";
		$this->am->sendNotification($msg);		
		redirect("brUser/AuthorC/loadLiveSession/".$lsid);
	}
	public function loadLiveSession($lsid)
	{
		$x=$this->am->getLiveSessionData($lsid);
		if($this->session->userID==$x->authorID && $this->session->userType=="Author")
		{
			$x->userData=$this->am->getuserData($x->authorID,"Author");
		$y=$this->am->getLiveSessionChats($lsid);
		foreach ($y as $key) {
			$key->userData=$this->am->getuserData($key->senderID,$key->senderType);
		}
		$temp=array(
			"livesessiondata"=>$x,
			"livesessionchats"=>$y
		);
		$this->load->view("brUser/livechat.php",$temp);				


		}
		else if($this->am->checkFollower($x->authorID))
		{
			$x->userData=$this->am->getuserData($x->authorID,"Author");
		$y=$this->am->getLiveSessionChats($lsid);
		foreach ($y as $key) {
			$key->userData=$this->am->getuserData($key->senderID,$key->senderType);
		}
		$temp=array(
			"livesessiondata"=>$x,
			"livesessionchats"=>$y
		);
		$this->load->view("brUser/livechat.php",$temp);				

		}
		else
		{

		redirect("brUser/HomeC");
		}
	}
	public function stopLiveSession()
	{
		$this->am->stopLiveSession();
		$this->session->livesession=0;
		redirect("brUser/AuthorC/authorInfo/".$this->session->userID);
	}
	public function sendchatmsg($sessionID)
	{
		$data=array(
			"senderID"=>$this->session->userID,
			"senderType"=>$this->session->userType,
			"sentMessage"=>$this->input->post("msg"),
			"sessionID"=>$sessionID	
		);
		$this->am->sendmsg($data);
	}
	public function checkSessionStatus($sessionID)
	{
		$x=$this->am->checkSessionStatus($sessionID);
		echo $x->status;
	}
	public function loadchat($sessionID,$olt)
	{
		$x=$this->am->getNewChatMsg($sessionID,$olt);
		foreach ($x as $key) {
			$key->userData=$this->am->getuserData($key->senderID,$key->senderType);
		}
		echo json_encode($x);
	}
}
?>