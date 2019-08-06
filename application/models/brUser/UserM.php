<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserM extends CI_Model{
	public function getMostFollowedAuthors()
	{
		//SELECT * from tblauthor where authorID in (select authorID,COUNT(userID) from tblfollow group by authorID order by COUNT(userID) desc LIMIT 2)
		$this->db->select("a.*,count(tf.userID) as 'followers'");
		$this->db->from("tblfollow as tf");
		$this->db->join("tblauthor as a","a.authorID=tf.authorID");
		$this->db->group_by("tf.authorID");
		$this->db->order_by("count(tf.userID)","desc");
		$this->db->limit(5);
		return $this->db->get()->result();
	}
	public function getAllBookData()
	{
		return $this->db->get("tblbook")->result();
	}
	public function getAllGenreData()
	{
		return $this->db->get("tblgenre")->result();
	}
	public function getTotalBooks()
	{
		$this->db->select("count(*) as 'totalBooks'");
		$this->db->from("tblbook");
		return $this->db->get()->result()[0];
	}
	public function getTotalAuthors()
	{
		$this->db->select("count(*) as 'totalAuthors'");
		$this->db->from("tblauthor");
		return $this->db->get()->result()[0];
	}
	public function getTotalUsers()
	{
		$this->db->select("count(*) as 'totalUsers'");
		$this->db->from("tblusermaster");
		return $this->db->get()->result()[0];
	}
	public function getMostRatedBooks()
	{
		$this->db->select("tb.*,avg(tr.rating) as 'avgRating'");
		$this->db->from("tblrating as tr");
		$this->db->join("tblbook as tb","tb.bookID=tr.bookID");
		$this->db->group_by("tr.bookID");
		$this->db->order_by("avg(tr.rating)","desc");
		$this->db->limit(10);
		return $this->db->get()->result();
	}
	public function getMostRatedAuthorsBooks()
	{
		$this->db->select("tb.*,avg(tr.rating) as 'avgRating'");
		$this->db->from("tblrating as tr");
		$this->db->where("tr.userType","Author");
		$this->db->join("tblbook as tb","tb.bookID=tr.bookID");
		$this->db->group_by("tr.bookID");
		$this->db->order_by("avg(tr.rating)","desc");
		$this->db->limit(3);
		return $this->db->get()->result();
	}

	public function getAllGenres()
	{
		$this->db->select("tbg.*,tg.genreName");
		$this->db->from("tblgenre as tg");
		$this->db->join("tblbookgenre as tbg","tbg.genreID=tg.genreID");
		return $this->db->get()->result();
	}
	public function getAllAuthors()
	{
		$this->db->select("tba.*,ta.authorFirstName,ta.authorLastName,ta.authorAlias");
		$this->db->from("tblauthor as ta");
		$this->db->join("tblbookauthor as tba","tba.authorID=ta.authorID");
		return $this->db->get()->result();
	}
	public function getBookData($bookID)
	{
		return $this->db->where("bookID",$bookID)->get("tblbook")->result()[0];
	}
	public function getBookGenreData($bookID)
	{
		$this->db->select("tbg.*,tg.genreName");
		$this->db->from("tblgenre as tg");
		$this->db->join("tblbookgenre as tbg","tbg.genreID=tg.genreID");
		$this->db->where("tbg.bookID","$bookID");
		return $this->db->get()->result();
	}
	public function getBookAuthorData($bookID)
	{
		$this->db->select("tba.bookAuthorID,tba.bookID,ta.*");
		$this->db->from("tblauthor as ta");
		$this->db->join("tblbookauthor as tba","tba.authorID=ta.authorID");
		$this->db->where("tba.bookID",$bookID);
		return $this->db->get()->result();
	}
	public function REgetBookLimitedReviews($bookID)
	{
		$this->db->limit(3);		
		$x=$this->db->where("bookID",$bookID)->where("status",0)->get("tblreview")->result();
		foreach ($x as $key) {
			$key->reviewerData=$this->um->getUserData($key->userID,$key->userType);
		}
		return $x;
	}

	public function getBookLimitedReviews($bookID)
	{
		$this->db->select("tr.*");
		$this->db->from("tblreview as tr");
		$this->db->join("tblusermaster as tu","tu.userID=tr.userID");
		$this->db->where("bookID",$bookID);
		$this->db->where("status",0);
		$this->db->limit(3);
		return $this->db->get()->result();
	}
	public function getBookReviews($bookID)
	{
		$x=$this->db->where("bookID",$bookID)->get("tblreview")->result();
		foreach ($x as $key) {
			$key->reviewerData=$this->um->getUserData($key->userID,$key->userType);
		}
		return $x;
	}	
	public function addReview($data)
	{
		$this->db->insert("tblreview",$data);
	}
	public function addRating($data)
	{
		if($this->session->userID)
		{
			$this->db->insert("tblrating",$data);
		}
	}
	public function getUserBookRating($bookID)
	{
		if($this->session->userID)
		{
			$q=$this->db->where("userID",$this->session->userID)->where("bookID",$bookID)->get("tblrating");
			if($q->num_rows()>0)
			return $this->db->where("bookID",$bookID)->where("userID",$this->session->userID)->get("tblrating")->result()[0];
		}

	}	
	public function addToReadList($data)
	{
		echo "1";
		$this->db->insert("tblreadlist",$data);
	}
	public function getBookAvgRating($bookID)
	{
		$this->db->select("avg(rating) as 'avgRating'");
		$this->db->from("tblrating");
		$this->db->where("bookID",$bookID);
		$this->db->group_by("bookID");
		return $this->db->get()->result();
	}
	public function getRecentBlogs()
	{
		$x=$this->db->limit(8)->order_by("blogDateTime","desc")->get("tblblog")->result();
		foreach ($x as $key) {
			$key->authorData=$this->um->getUserData($key->authorID,"Author");
		}
		return $x;
	}
	public function getUserData($uid,$utype)
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
}
?>