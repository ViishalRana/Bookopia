<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ForumC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("brUser/AuthorM","am");
		$this->load->model("brUser/HomeM","hm");
		$this->load->model("brUser/ForumM","fm");
		if(!$this->session->userID)
		{
			redirect("brUser/LoginC");
		}
	}
	public function createForum()
	{
		$data=array(
			"forumName"=>$this->input->post("txtforumtopic"),
			"creatorID"=>$this->session->userID,
			"creatorType"=>$this->session->userType
		);
		$this->fm->createForum($data);
		redirect("brUser/ForumC/forumDetail/".$this->db->insert_id());
	}
	public function index()
	{
		$x=$this->fm->getAllForums();
		foreach ($x as $key) {
			$key->creatorData=$this->fm->getCreatorData($key->creatorID,$key->creatorType);
			$key->reviewsCount=$this->fm->getReviewsCount($key->forumID);
		}
/*		print_r($x);die();*/
		$y=$this->hm->getGenre();
			foreach ($y as $key) 
			{
				$key->gID=$this->hm->fetchBookGenre($key->genreID);
			}
		$temp=array(
			"forumdata"=>$x,
			"genres"=>$y
		);
		$this->load->view("brUser/forumMain",$temp);
	}
	public function forumDetail($forumID)
	{
		$y=$this->hm->getGenre();
			foreach ($y as $key) 
			{
				$key->gID=$this->hm->fetchBookGenre($key->genreID);
			}
		$x=$this->fm->getForumDetail($forumID);
		$z=$this->fm->getForumPosts($forumID);
		$a=$this->fm->getLikedPosts($this->session->userID,$this->session->userType);

		foreach ($z as $key) {
			$key->userData=$this->fm->getuserData($key->userID,$key->userType);
			$key->postLikes=$this->fm->getPostLikes($key->forumPostID);
			$key->postComments=$this->fm->getPostComments($key->forumPostID);
		}
/*		echo "<pre>";
		print_r($x);
		print_r($z);
		die();*/
		$temp=array(
			"genres"=>$y,
			"forumdata"=>$x,
			"postdata"=>$z,
			"likedposts"=>$a
		);
		$this->load->view("brUser/forumdetail",$temp);

	}
	public function addForumPost()
	{
		$data=array(
			"forumID"=>$this->input->post("forumID"),
			"userID"=>$this->session->userID,
			"userPost"=>$this->input->post("postData"),
			"userType"=>$this->session->userType
		);
		$this->fm->addForumPost($data);
	}
	public function addForumPostLike($forumPostID,$forumID)
	{

		$data=array(
			"forumPostID"=>$forumPostID,
			"userID"=>$this->session->userID,
			"userType"=>$this->session->userType	
		);
		$f=$this->fm->addForumPostLike($data);
		$uid=site_url("brUser/ForumC/forumDetail/").$forumID;
		$msg='<a href="'.$uid.'"><b>'.$this->session->userFirstName." ".$this->session->userLastName."</b> liked your post.</a>";		
		$this->am->sendLikeNotification($msg,$forumPostID);
		$cnt=$this->fm->countPostLike($forumPostID);
		if($f==1)
		{
			echo "Like $cnt";
		}
		else
		{
			echo "Unlike $cnt";
		}
	}
	public function getForumPostComments($forumPostID)
	{

		$x=$this->fm->getForumPostComments($forumPostID);

		foreach ($x as $key) {
			$key->userData=$this->fm->getUserData($key->userID,$key->userType);
		}

		echo json_encode($x);
	}
	public function addForumPostComment($forumPostID,$forumID)
	{
		$temp=array(
			"forumPostID"=>$forumPostID,
			"userID"=>$this->session->userID,
			"userType"=>$this->session->userType,
			"comment"=>$this->input->post("commentData")
		);
		$this->fm->addForumPostComment($temp);
		$uid=site_url("brUser/ForumC/forumDetail/").$forumID;
		$msg='<a href="'.$uid.'" style=""><b>'.$this->session->userFirstName." ".$this->session->userLastName."</b> commented on your post.</a>";
		$this->am->sendLikeNotification($msg,$forumPostID);
/*		echo 1;
*/	}

	public function searchForum()
	{
		$forumName=$this->input->post("forumsearch");
		// echo $forumName;
		// die();
		$x=$this->fm->searchForum($forumName);
		foreach ($x as $key) {
			$key->creatorData=$this->fm->getCreatorData($key->creatorID,$key->creatorType);
		}
		$temp=array("forumdata"=>$x);

		echo json_encode($temp);
		// echo "<pre>";
		// print_r($temp);
		// die();

	}
}
?>