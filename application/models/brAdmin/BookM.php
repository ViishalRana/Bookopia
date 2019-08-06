<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookM extends CI_Model 
{
	public function getbook()
	{
		return $this->db->get("tblbook")->result();
	}
	public function getPublishers()
	{
		return $this->db->get("tblpublisher")->result();
	}

	public function addbook($data)
	{
		$this->db->insert("tblbook",$data);
	}

	public function updBook($id)
	{
		$this->db->where("bookID",$id);
		return $this->db->get("tblbook")->result()[0];
	}

	public function upd_Book($data,$id)
	{
		if($data["bookCoverImage"]=="no image")
		{
		$this->db->set([
			"bookTitle"=>$data["bookTitle"],
			"bookPages"=>$data["bookPages"],
			"bookEdition"=>$data["bookEdition"],
			"bookPublisherID"=>$data["bookPublisherID"],
			"bookSynopsis"=>$data["bookSynopsis"],
			"bookISBN"=>$data["bookISBN"],
			"bookPublisherDate"=>$data["bookPublisherDate"]
		]);
		}
		else
		{
		$this->db->set($data);
		}
		$this->db->where("bookID",$id);
		$this->db->update("tblbook");
	}

	public function srchbook($name=null)
	{
		if($name!=null)
		$qry=$this->db->where("bookTitle",$name);
		return $this->db->get("tblbook")->result();
	}
	public function deleteBook($bookID)
	{
		$this->db->where("bookID",$bookID)->delete("tblbook");
	}
	public function getBookAwards($bookID)
	{
		$this->db->select("a.awardID,a.awardName,a.awardDate,a.description,a.title");
		$this->db->from("tblaward as a");
		$this->db->join("tblbookaward as ba","a.awardID=ba.awardID");
		$this->db->where("ba.bookID",$bookID);
		return $this->db->get()->result();
	}
	public function getBookData($bookID)
	{
		$this->db->select("b.bookID,b.bookTitle,b.bookPages,b.bookEdition,b.bookPublisherID,b.bookSynopsis,b.bookCoverImage,b.bookISBN,b.bookPublisherDate,p.publisherName,p.publisherCityID,p.publisherEmail,p.publisherContactNo");
		$this->db->from("tblbook as b");
		$this->db->join("tblpublisher as p","b.bookPublisherID=p.publisherID");
		$this->db->where("bookID",$bookID);
		return $this->db->get()->result()[0];
	}
	public function getBookRating($bookID)
	{
		$this->db->select("avg(rating) as 'AvgRat'");
		$this->db->from("tblrating");
		$this->db->where("bookID",$bookID);
		return $this->db->get()->result()[0];
	}
	public function getReviews($bookID)
	{
		$x=$this->db->where("bookID",$bookID)->get("tblreview")->result();
		foreach ($x as $key) {
			$key->reviewerData=$this->bm->getUserData($key->userID,$key->userType);
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
	public function addAward($data,$bookID)
	{	
		$this->db->insert("tblaward",$data);
		$awardID=$this->db->insert_id();
		$this->db->set(["bookID"=>$bookID,"awardID"=>$awardID])->insert("tblbookaward");
	}
	public function editAward($data,$awardID)
	{
		$this->db->set($data)->where("awardID",$awardID)->update("tblaward");
	}
	public function changeReviewStat($reviewID)
	{
		$this->db->set("status","1-status",false)->where("reviewID",$reviewID)->update("tblreview");
	}

	public function getGenre()
	{
		return $this->db->get("tblGenre")->result();
	}
	public function deleteAward($awardID)
	{
		$this->db->where("awardID",$awardID)->delete("tblbookaward");
		$this->db->where("awardID",$awardID)->delete("tblaward");
	}	
	public function getGenres()
	{
		return $this->db->get("tblgenre")->result();
	}
	public function addBookGenre($genreID,$bookID)
	{
		$data=array(
			"genreID"=>$genreID,
			"bookID"=>$bookID
		);
		$this->db->insert("tblbookgenre",$data);
	}

	
}

?>