<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SearchM extends CI_Model
{
	public function getAllBooks($pageNo,$rowPage,$genreList=null,$rateList=null)
	{
		$this->db->limit($rowPage,$pageNo);
		$this->db->distinct("b.bookID");
		$this->db->select("b.*");
		$this->db->from("tblbook as b");
		$this->db->order_by("b.bookPublisherDate","desc");
		if($genreList!="0")
		{
			$this->db->join("tblbookgenre as tbg","tbg.bookID=b.bookID");
			$this->db->join("tblgenre as tg","tg.genreID=tbg.genreID");
			$genre=explode(",",$genreList);
			foreach ($genre as $key)
			{
				if($genre!=0)
				{
					$this->db->or_where("tbg.genreID",$key);	
				}
				
			}
		}
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
		$this->db->limit(20);
		return $this->db->get()->result();
	}	
	public function getNewRelease($sl,$el)
	{
		$this->db->limit(20);
		return $this->db->order_by("bookPublisherDate","desc")->get("tblbook")->result();
	}	

	public function getCountBooks($genreList=null,$rateList=null)
	{
		if($genreList!=null)
		{
			// echo "1";
			$this->db->distinct("tgb.bookID");
			$this->db->select("tgb.bookID");
			$this->db->from("tblbookgenre as tgb");
			if($genreList!=null)
			{
				$genre=explode(",",$genreList);
				foreach ($genre as $key)
				{
					$this->db->or_where("genreID",$key);
				}
			}
			$bid=$this->db->get();
			return $bid->num_rows();
		}
		else if($rateList!=null)
		{
			// echo "1";
			$this->db->distinct("tgb.bookID");
			$this->db->select("tgb.bookID");
			$this->db->from("tblbookgenre as tgb");
			if($rateList!=null)
			{
				$rate=explode(",",$rateList);
				foreach ($rate as $key0)
				{
					$this->db->or_where("ID",$key0);
				}
			}
			$bid=$this->db->get();
			return $bid->num_rows();
		}
		else
		{
			return $this->db->get("tblbook")->num_rows();
		}
	}

	public function getBookRating($bookID)
	{
		$this->db->select("avg(r.rating) as 'avgRating'");
		$this->db->from("tblbook as b");
		$this->db->join("tblRating as r","b.bookID=r.bookID");
		$this->db->group_by("r.bookID");
		$this->db->where("r.bookID",$bookID);
		return $this->db->get()->result();
		
/*		echo $this->db->last_query();
		die();
*/	}

	public function getBookGenres($bookID)
	{
		$this->db->select("g.*");
		$this->db->from("tblgenre as g");
		$this->db->join("tblbookgenre as tbg","tbg.genreID=g.genreID");
		$this->db->where("tbg.bookID",$bookID);
		return $this->db->get()->result();
	}
	public function getBookAuthors($bookID)
	{
		$this->db->select("a.*");
		$this->db->from("tblauthor as a");
		$this->db->join("tblbookauthor as tba","tba.authorID=a.authorID");
		$this->db->where("tba.bookID",$bookID);
		return $this->db->get()->result();
	}

	public function searchBook($bookTitle)
	 {
		$this->db->limit(5);
		$this->db->like("bookTitle",$bookTitle);
		$this->db->or_like("bookISBN",$bookTitle);
		return $this->db->get("tblbook")->result();
	}

	public function searchAdvanceBook($bookTitle)
	 {
		// $this->db->limit(5);
		$this->db->like("bookTitle",$bookTitle);
		$this->db->or_where("bookISBN",$bookTitle);
		return $this->db->get("tblbook")->result();
	}

	public function searchAuthorBook($bookTitle)
	{
		$this->db->select("b.bookTitle,b.bookCoverImage");
		$this->db->from("tblbookauthor as ab");
		$this->db->join("tblbook as b","b.bookID=ab.bookID");
		$this->db->join("tblauthor as a","a.authorID=ab.authorID");
		$this->db->like("a.authorAlias",$bookTitle);
		$this->db->or_like("a.authorFirstName",$bookTitle);
		$this->db->or_like("a.authorLastName",$bookTitle);
		return $this->db->get()->result();
	}

	public function searchAdvanceAuthorBook($bookTitle)
	{
		$b1=explode(" ", $bookTitle);
		
		$this->db->select("b.bookID,b.bookTitle,b.bookCoverImage");
		$this->db->from("tblbookauthor as ab");
		$this->db->join("tblbook as b","b.bookID=ab.bookID");
		$this->db->join("tblauthor as a","a.authorID=ab.authorID");
		foreach ($b1 as $key) {
		$this->db->like("a.authorAlias",$key);
		$this->db->or_like("a.authorFirstName",$key);
		$this->db->or_like("a.authorLastName",$key);
		}
		return $this->db->get()->result();

	}

	public function getAllGenre()
	{
		$this->db->limit(10);
		$this->db->order_by("genreName","asc");
		return $this->db->get("tblgenre")->result();
	}

	public function getMoreGenre()
	{
		// $this->db->limit(10);
		$this->db->order_by("genreName","asc");
		return $this->db->get("tblgenre")->result();
	}
}
?>