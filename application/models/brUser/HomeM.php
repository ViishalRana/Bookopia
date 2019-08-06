<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class HomeM extends CI_Model
{
	public function getGenre()
	{
		return $this->db->get("tblgenre")->result();
	}
	public function getReadListData($limit=5)
	{	
		return $this->db->select("readListID,bookID")->where("userID",$this->session->userID)->where("userType",$this->session->userType)->order_by("readListID","desc")->get("tblreadlist")->result();
	}
	public function getBookAwards($bookID)
	{	
		$temp=array();
		$x=$this->db->get("tblaward")->result();
		foreach ($x as $key) {
			if($this->hm->checkAward($bookID))
			{
				$temp[]=$key;
			}
		}
		return $temp;
	}
	public function checkAward($bookID)
	{
		return $this->db->where("bookID",$bookID)->get("tblbookaward")->num_rows();
	}
	public function fetchBookGenre($genreID)
	{

		$this->db->select("b.bookTitle,b.bookID,g.*");
		$this->db->from("tblbookGenre as gb");
		$this->db->join("tblbook as b","b.bookID=gb.bookID");
		$this->db->join("tblgenre as g","g.genreID=gb.genreID");
		$this->db->where("g.genreID",$genreID);
		$this->db->limit(10);
		$res=$this->db->get();
		if($res->num_rows()>0)
		{
			return $res->result();
		}
		else
		{
			return null;
		}
	}
	public function getGenreBook($genreID)
	{	
		$this->db->select("b.*,a.*,g.*");
		$this->db->from("tblBookGenre as bg");
		$this->db->join("tblBook as b","b.bookID=bg.bookID");
		$this->db->join("tblBookAuthor as ba","ba.bookID=b.bookID");
		$this->db->join("tblAuthor as a","a.authorID=ba.authorID");
		$this->db->join("tblGenre as g","g.genreID=bg.genreID");
		$this->db->where("g.genreID",$genreID);
		$this->db->order_by("b.bookPublisherDate","desc");
		return $this->db->get()->result();
	}
	public function fetchGenreCount($genreID)
	{
		$this->db->select("count(bookGenreID) as cnt");
		$this->db->from("tblbookGenre");
		$this->db->where("genreID",$genreID);
		return $this->db->get()->result();
	}

	public function bookRating($bookID)
	{
		$this->db->select("avg(rating) as 'AvgRat'");
		$this->db->from("tblrating");
		$this->db->where("bookID",$bookID);
		return $this->db->get()->result();
	}	
	public function setLastActiveSession($olt)
	{
		$olt=urldecode($olt);
//		echo $olt;
		if($this->session->userType=="User")
		{
//			echo 1;
			$this->db->set("lastactive",$olt)->where("userID",$this->session->userID)->update("tblusermaster");
/*			echo $this->db->last_query();
*/		}
		else
		{
			$this->db->set("lastactive",$olt)->where("authorID",$this->session->userID)->update("tblauthor");

		}
	}
	public function getLastActiveSession()
	{
		//echo 1;
		$this->db->select("lastactive");
		if($this->session->userType=="User")
		{
		$this->db->from("tblusermaster");
		$this->db->where("userID",$this->session->userID);			
		}
		else{
		$this->db->from("tblauthor");
		$this->db->where("authorID",$this->session->userID);			
		}
		return $this->db->get()->result()[0];
		//echo $this->db->last_query();
	}
	public function getNewNoti($lastactive)
	{
		$lastactive=urldecode($lastactive);
		return $this->db->where("createdDate >=",$lastactive)->where("TouserID",$this->session->userID)->where("TouserType",$this->session->userType)->get("tblnotification")->num_rows();
	}
	public function getBookData($bookID)
	{
		return $this->db->select("bookID,bookTitle,bookCoverImage")->where("bookID",$bookID)->get("tblbook")->result()[0];
	}
	public function getReadListBooks()
	{
		return $this->db->select("readListID,bookID")->where("userID",$this->session->userID)->where("userType",$this->session->userType)->order_by("readListID","desc")->get("tblreadlist")->result();

	}
	public function getReadListCount()
	{
		return $this->db->where("userID",$this->session->userID)->where("userType",$this->session->userType)->get("tblreadlist")->num_rows();
	}
	public function getNewRelease()
	{
		$this->db->limit(3);
		return $this->db->order_by("bookPublisherDate","desc")->get("tblbook")->result();
	}
	public function getBookGenreData($bookID)
	{
		$this->db->select("g.genreID,g.genreName");
		$this->db->from("tblgenre as g");
		$this->db->join("tblbookgenre as tbg","tbg.genreID=g.genreID");
		$this->db->where("tbg.bookID",$bookID);
		return $this->db->get()->result();
	}
	public function getBookAuthorData($bookID)
	{
		$this->db->select("a.authorID,a.authorFirstName,a.authorLastName,a.authorAlias");
		$this->db->from("tblauthor as a");
		$this->db->join("tblbookauthor as tba","tba.authorID=a.authorID");
		$this->db->where("tba.bookID",$bookID);
		return $this->db->get()->result();

	}
	
	public function removeBookFromReadList($readListID)
	{
		$this->db->where("readListID",$readListID)->delete("tblreadlist");		
	}
	public function getUserStatus()
	{
		$this->db->select("status");
		if($this->session->userType=="User")
		{
			$this->db->from("tblusermaster");
			$this->db->where("userID",$this->session->userID);
		}
		else
		{
			$this->db->from("tblauthor");
			$this->db->where("authorID",$this->session->authorID);
		}
		return $this->db->get()->result()[0];
	}
}
?>