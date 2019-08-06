<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ForumM extends CI_Model
{
	public function getAllForums()
	{
		return $this->db->where("status",0)->get("tblforum")->result();
	}
	public function createForum($data)
	{
		$this->db->insert("tblforum",$data);
	}
	public function getCreatorData($cid,$ctype)
	{
		if($ctype=="Author")
		{
			$this->db->select("authorFirstName,authorLastName,authorPhoto");
			$this->db->from("tblauthor");
			$this->db->where("authorID",$cid);
			return $this->db->get()->result();
		}
		else
		{
			$this->db->select("userFirstName,userLastName,userPhoto");
			$this->db->from("tblusermaster");
			$this->db->where("userID",$cid);
			return $this->db->get()->result();
		}
	}
	public function getReviewsCount($forumID)
	{
		return $this->db->where("forumID",$forumID)->get("tblforumpost")->num_rows();
	}
	public function getForumDetail($forumID)
	{
		return $this->db->where("forumID",$forumID)->get("tblforum")->result()[0];
	}
	public function getForumPosts($forumID)
	{
		$this->db->limit(10);

		return $this->db->where("forumID",$forumID)->order_by("postDate","desc")->get("tblforumpost")->result();
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
	public function getPostLikes($forumPostID)
	{
			$x=$this->db->where("forumPostID",$forumPostID)->get("tblforumpostlike");
			return $x->num_rows();
	}
	public function addForumPost($data)
	{
		$this->db->insert("tblforumpost",$data);
	}
	public function addForumPostLike($data)
	{
		if($this->db->where("forumPostID",$data["forumPostID"])->where("userID",$data["userID"])->where("userType",$data["userType"])->get("tblforumpostlike")->num_rows())
		{
			$this->db->where("forumPostID",$data["forumPostID"])->where("userID",$data["userID"])->where("userType",$data["userType"])->delete("tblforumpostlike");
			return 1;
		}
		else
		{			
		$this->db->insert("tblforumpostlike",$data);	
		return 0;		
		}
	}
	public function countPostLike($forumPostID)
	{
		return $this->db->where("forumPostID",$forumPostID)->get("tblforumpostlike")->num_rows();
	}
	public function getLikedPosts($userID,$userType)
	{
		$this->db->select("forumPostID");
		$this->db->from("tblforumpostlike");
		$this->db->where("userID",$userID);
		$this->db->where("userType",$userType);
		return $this->db->get()->result();
	}
	public function getPostComments($forumPostID)
	{
		return $this->db->where("forumPostID",$forumPostID)->get("tblforumpostcomment")->num_rows();
	}
	public function getForumPostComments($forumPostID)
	{
		$this->db->limit(10);
		return $this->db->where("forumPostID",$forumPostID)->order_by("commentDate","desc")->get("tblforumpostcomment")->result();
	}
	public function addForumPostComment($data)
	{
		$this->db->insert("tblforumpostcomment",$data);
	}

	public function searchForum($forum)
	{
		if($this->session->userType=="User")
		{
			return $this->db->where("status",0)->like("forumName",$forum)->get("tblforum")->result();
		}
		else
		{
			return $this->db->where("status",0)->like("forumName",$forum)->get("tblforum")->result();	
		}
	}
}