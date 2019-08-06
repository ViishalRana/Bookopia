<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AuthorM extends CI_Model
{
	public function getAuthor($limit=null)
	{
		if($limit!=null)
			$this->db->limit($limit);
		return $this->db->get("tblAuthor")->result();
	}
	public function getActiveAuthor($limit=null)
	{
		if($limit!=null)
			$this->db->limit($limit);
		return $this->db->where("status",1)->get("tblAuthor")->result();
	}
	public function authorInfo($authorID)
	{
		$this->db->where("authorID",$authorID);
		return $this->db->get("tblauthor")->result()[0];
	}
	public function checkFollower($authorID)
	{
		return $this->db->where("authorID",$authorID)->where("userID",$this->session->userID)->where("userType",$this->session->userType)->get("tblfollow")->num_rows();
	}
	public function getAuthorBook($authorID)
	{
		$this->db->select("b.bookID,b.bookTitle,b.bookCoverImage,a.authorAlias");
		$this->db->from("tblbookauthor as ab");
		$this->db->join("tblbook as b","b.bookId=ab.bookID");
		$this->db->join("tblauthor as a","a.authorID=ab.authorID");
		$this->db->where("a.authorID",$authorID);
		return $this->db->get()->result();
	}

	public function fetchGenre($bookID)
	{
		$this->db->select("g.genreName");
		$this->db->from("tblbookGenre as gb");
		$this->db->join("tblbook as b","b.bookID=gb.bookID");
		$this->db->join("tblgenre as g","g.genreID=gb.genreID");
		$this->db->where("b.bookID",$bookID);
		return $this->db->get()->result();
	}

	public function getFollowStatus($authorID)
	{
		$this->db->where("authorID",$authorID);
		$this->db->where("userID",$this->session->userID);
		$this->db->where("userType",$this->session->userType);
		$x=$this->db->get("tblFollow");
		if($x->num_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function unfollowUser($authorID)
	{
		$this->db->where("authorID",$authorID);
		$this->db->where("userID",$this->session->userID);
		$this->db->where("userType",$this->session->userType);		
		return $this->db->delete("tblFollow");	
	}

	public function followUser($data)
	{
		return $this->db->insert("tblFollow",$data);
	}	
	public function getPublishedBooksCount($authorID)
	{
		return $this->db->where("authorID",$authorID)->get("tblbookauthor")->num_rows();
	}
	public function getAuthorBlogs($authorID)
	{
		return $this->db->where("authorID",$authorID)->where("status",0)->get("tblblog")->result();		
	}
	public function getAuthorPosts($authorID)
	{
		return $this->db->where("authorID",$authorID)->where("status",0)->order_by("postTime","desc")->get("tblpost")->result();
			
	}
	public function addPost($data)
	{
		$this->db->insert("tblpost",$data);
	}
	public function addBlog($data)
	{
		$this->db->insert("tblblog",$data);
	}
	public function sendNotification($msg)
	{

		$data=array(
			"TouserID"=>"",
			"TouserType"=>"",
			"senderID"=>$this->session->userID,
			"senderType"=>$this->session->userType,
			"message"=>$msg,
		);
		$x=$this->db->where("authorID",$this->session->userID)->get("tblfollow")->result();
		foreach($x as $key)
		{
			$data["TouserID"]=$key->userID;
			$data["TouserType"]=$key->userType;
			$this->db->insert("tblnotification",$data);
		}
	}
	public function sendAuthorNotification($msg,$authorID)
	{

		$data=array(
			"TouserID"=>$authorID,
			"TouserType"=>"Author",
			"senderID"=>$this->session->userID,
			"senderType"=>$this->session->userType,
			"message"=>$msg,
		);
			$this->db->insert("tblnotification",$data);
	}	
	public function sendLikeNotification($msg,$forumPostID)
	{
		$data=array(
			"TouserID"=>"",
			"TouserType"=>"",
			"senderID"=>$this->session->userID,
			"senderType"=>$this->session->userType,
			"message"=>$msg,
		);
		$x=$this->db->where("forumPostID",$forumPostID)->get("tblforumpost")->result();
		foreach($x as $key)
		{
			$data["TouserID"]=$key->userID;
			$data["TouserType"]=$key->userType;
			$this->db->insert("tblnotification",$data);
		}
	}
	public function getNotification()
	{
		$this->db->order_by("createdDate","desc");
		return $this->db->where("TouserID",$this->session->userID)->where("TouserType",$this->session->userType)->get("tblnotification")->result();
	}
	public function getNewNotification($olt)
	{
		$olt=urldecode($olt);
		$this->db->order_by("createdDate","desc");
		return $this->db->where("TouserID",$this->session->userID)->where("TouserType",$this->session->userType)->where("createdDate >=",$olt)->get("tblnotification")->num_rows();
	}

	public function createLiveSession($data)
	{
		$this->db->insert("tbllivesession",$data);
		$this->session->livesession=$this->db->insert_id();
		return $this->db->insert_id();
	}
	public function sendmsg($data)
	{
		$this->db->insert("tblsessionmessage",$data);
		echo $this->db->last_query();
	}
	public function getLiveSessionData($lsid)
	{
		return $this->db->where("sessionID",$lsid)->get("tbllivesession")->result()[0];
	}
	public function getNewChatMsg($sessionID,$olt)
	{
		$olt=urldecode($olt);
		return $this->db->where("sessionID",$sessionID)->where("sentDate >=",$olt)->get("tblsessionmessage")->result();
	}
	public function getuserData($uid,$utype)
	{
		if($utype=="Author")
		{
			$this->db->select("authorFirstName,authorLastName,authorPhoto");
			$this->db->from("tblauthor");
			$this->db->where("authorID",$uid);
			return $this->db->get()->result()[0];
		}
		else
		{
			$this->db->select("userFirstName,userLastName,userPhoto");
			$this->db->from("tblusermaster");
			$this->db->where("userID",$uid);
			return $this->db->get()->result()[0];
		}
	}
	public function getLiveSessionChats($lsid)
	{
		return $this->db->where("sessionID",$lsid)->get("tblsessionmessage")->result();
	}	
	public function stopLiveSession()
	{
		$this->db->where("sessionID",$this->session->livesession)->set("status",0)->update("tbllivesession");
	}
	public function checkSessionStatus($sessionID)
	{
		return $this->db->select("status")->where("sessionID",$sessionID)->get("tbllivesession")->result()[0];
	}

}
?>