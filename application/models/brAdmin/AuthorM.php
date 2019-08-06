<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthorM extends CI_Model 
{
	
	public function addauthor($data,$flag)
	{
		if($flag==0)
		{
			$this->db->set(["authorAlias"=>$data["authorAlias"],"authorFirstName"=>$data["authorFirstName"],"authorLastName"=>$data["authorLastName"],"status"=>$flag])->insert("tblauthor");
		}
		else
		{
			$this->db->insert("tblauthor",$data);
		}
	}

	public function getAllAuthors()
	{
		return $this->db->get('tblauthor')->result();
	}

	public function getcity()
	{
		return $this->db->get('tblcity')->result();
	}

	public function updAuthor($id)
	{
		$this->db->where("authorID",$id);
		$this->db->get("tblAuthor")->result()[0];
	}
	public function getAuthorData($authorID)
	{
		/*select a.authorID,a.authorFirstName,a.authorLastName,a.authorEmail,a.authorPassword,a.authorBdate,a.authorGender,a.authorBio,a.authorPhoto,a.authorCityId,s.stateID,c.countryID,a.status from author a,city ct,state s,country c where a.authorID=$authorID and a.authorCityID=ct.cityID and ct.stateID=s.stateID and s.countryID=c.countryID*/
		$t=$this->db->select("authorCityID")->where("authorID",$authorID)->get("tblauthor")->result();
		$v=0;
		foreach ($t as $key) {
				$v=$key->authorCityID;
				break;
					}			
		if($v==0)
		{
/*			echo $authorID." ".$v." ";*/
			return $this->db->where("authorID",$authorID)->get("tblauthor")->result()[0];			
		}	
		else
		{
		$this->db->select("a.authorID,a.authorAlias,a.authorFirstName,a.authorLastName,a.authorEmail,a.authorPassword,a.authorBdate,a.authorGender,a.authorBio,a.authorPhoto,a.authorCityID,s.stateID,c.countryID,a.status,a.accountCreatedDate");
		$this->db->from("tblauthor as a");
		$this->db->join("tblcity as ct","a.authorCityID=ct.cityId");
		$this->db->join("tblstate as s","ct.stateID=s.stateID");
		$this->db->join("tblcountry as c","c.countryID=s.countryID");
		$this->db->where("a.authorID",$authorID);			
		return $this->db->get()->result()[0];
		}
	}
	public function editAuthor($data,$authorID)
	{
		$this->db->set($data)->where("authorID",$authorID)->update("tblauthor");
	}
	public function deleteAuthor($authorID)
	{
		$this->db->where("authorID",$authorID)->delete("tblauthor");
	}
		public function getAuthorBooksData($authorID)
	{
		$this->db->select("b.*");
		$this->db->from("tblbookauthor as ba");
		$this->db->join("tblbook as b","b.bookID=ba.bookID");
		$this->db->where("ba.authorID",$authorID);
		return $this->db->get()->result();
	}
	public function getAuthorBlogsData($authorID)
	{
		return $this->db->where("authorID",$authorID)->get("tblblog")->result();
	}
	public function changeBlogStat($blogID)
	{
		$this->db->set("status","1-status",false)->where("blogID",$blogID)->update("tblblog");
	}	
	public function getAuthorPostsData($authorID)
	{
		return $this->db->where("authorID",$authorID)->order_by("postDate","asc")->get("tblpost")->result();
	}
	public function changePostStat($postID)
	{
		$this->db->set("status","1-status",false)->where("postID",$postID)->update("tblpost");
	}
	public function changeReviewStat($reviewID)
	{
		$this->db->set("status","1-status",false)->where("reviewID",$reviewID)->update("tblreview");
	}

	public function getAuthorReviewsData($authorID)
	{
		$this->db->select("b.*,ar.userID,ar.reviewID,ar.reviewData,ar.dateTime,ar.status");
		$this->db->from("tblbook as b");
		$this->db->join("tblreview as ar","b.bookID=ar.bookID");
		$this->db->where("ar.userID",$authorID);
		$this->db->where("ar.userType","Author");
		return $this->db->get()->result();
	}	
	public function changeUserStat($userID)
	{
		$this->db->set("status","1-status",false)->where("userID",$userID)->update("tblusermaster");		
	}
	public function getUserData($userID)
	{
		$this->db->select("userFirstName,userLastName,userEmail");
		$this->db->from("tblusermaster");
		$this->db->where("userID",$userID);
		return $this->db->get()->result()[0];
	}	
	public function getBookData()
	{
		$this->db->select("bookID,bookTitle,bookISBN");
		$this->db->from("tblbook");
		return $this->db->get()->result();
	}
	public function searchBooks($srs)
	{
		$srs=urldecode($srs);
		$b1=explode(" ", $srs);
		
		$this->db->select("b.bookID,b.bookTitle,b.bookISBN");
		$this->db->from("tblbook as b");
		foreach ($b1 as $key) {
		$this->db->like("b.bookTitle",$key);
		}
		$this->db->or_like("b.bookISBN",$srs);
		return $this->db->get()->result();

	}	
	public function addAuthorBook($authorID,$bookID)
	{
		$data=array(
			"bookID"=>$bookID,
			"authorID"=>$authorID
		);
		$this->db->insert("tblbookauthor",$data);
	}			
}

?>