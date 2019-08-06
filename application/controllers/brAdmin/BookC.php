<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookC extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("brAdmin/BookM","bm");
		if(!$this->session->userName)
		{
			redirect("brAdmin/SignupC/");	
		}
	}

	public function index()
	{
		$x=$this->bm->getbook();
		$temp=array('books'=>$x);
		$this->load->view('brAdmin/default/books',$temp);
	}

	// public function addBooks()
	// {
	// 	$x=$this->bm->getPublishers();
	// 	$temp=array("pubs"=>$x);
	// 	$this->load->view("brAdmin/default/addBookView",$temp);
		
	// }


	public function addBook()
	{
		if($this->input->post('btnAdd')!="")
		{
		$config['upload_path'] = './upload/';     
        $config['allowed_types'] = 'gif|jpg|png|jpeg';     
        $this->load->library('upload', $config);

			$data=array(
			"bookTitle"=>$this->input->post("txtbookTitle"),
			"bookPages"=>$this->input->post("txtbookPages"),
			"bookEdition"=>$this->input->post("txtbookEdition"),
			"bookPublisherID"=>$this->input->post("lstbookPublisher"),
			"bookSynopsis"=>$this->input->post("txtbookSynopsis"),
			"bookISBN"=>$this->input->post("txtbookISBN"),
			"bookPublisherDate"=>$this->input->post("dtbookDate"),
			"bookCoverImage"=>""
			);

		if(!$this->upload->do_upload('imgbookCoverPhoto'))
         {
         	$error=array('error'=>$this->upload->display_errors());
         	$this->load->view('brAdmin/default/addBookView',$error);
         }
         else
         {
         	$t=$this->upload->data();
         	$data['bookCoverImage']=$t["file_name"];
        	 $this->bm->addbook($data);
		 //$this->load->view('product_disp');
		 $this->load->view("brAdmin/default/addBookView");
		 //	redirect("brAdmin/BookC/addBooks");
		 }
		}
		else
		{
		$x=$this->bm->getPublishers();
		$y=$this->bm->getGenre();
		$temp=array("pubs"=>$x,
			"gen"=>$y
		);
		$this->load->view("brAdmin/default/addBookView",$temp);
		}		
	}
	public function editBook($bookid)
	{
		if($bookid!=0)
		{
			if($this->input->post("btnEdit"))
			{
				$books=array(
					"bookID"=>$bookid,
					"bookTitle"=>$this->input->post("txtbookTitle"),
					"bookPages"=>$this->input->post("txtbookPages"),
					"bookEdition"=>$this->input->post("txtbookEdition"),
					"bookPublisherID"=>$this->input->post("lstbookPublisher"),
					"bookSynopsis"=>$this->input->post("txtbookSynopsis"),
					"bookCoverImage"=>"",
					"bookISBN"=>$this->input->post("txtbookISBN"),
					"bookPublisherDate"=>$this->input->post("dtbookDate")
				);
 				if(isset($_FILES["imgbookCoverPhoto"]["name"]) && !empty($_FILES["imgbookCoverPhoto"]["name"]))
				{
//					$tmpImg=$this->upload->data();

					$books["bookCoverImage"]=$_FILES["imgbookCoverPhoto"]["name"];
					$config['upload_path'] = './upload/';     
			        $config['allowed_types'] = 'jpg|png|jpeg';     
			        $this->load->library('upload', $config);			
					if(!$this->upload->do_upload('imgbookCoverPhoto'))
			         {
			         	$error=array('error'=>$this->upload->display_errors());
			         	$this->load->view('brAdmin/default/editBookView',$error);
			         }
			         else
			         {
				  	      $this->bm->upd_Book($books,$bookid);
						 //$this->load->view('product_disp');
						 redirect("brAdmin/BookC");
						 //	redirect("brAdmin/BookC/addBooks");
					 }
				}
				else
				{
					$books["bookCoverImage"]="no image";
			  	      $this->bm->upd_Book($books,$bookid);
					 redirect("brAdmin/BookC");
				}
			}
			else
			{
				$x1=$this->bm->updBook($bookid);
				$x=$this->bm->getPublishers();
				$y=$this->bm->getGenres();

				$temp=array(
					"books"=>$x1,
					"pubs"=>$x,
					"genres"=>$y
				);
				$this->load->view("brAdmin/default/editBookView",$temp);
			}

		}
		else
		{
		$this->load->view("brAdmin/default/editBookView");			
		}
	}
	
	public function updBook($id)
	{
		$x1=$this->bm->updBook($id);
		$x=$this->bm->getPublishers();
		$temp=array(
			"books"=>$x1,
			"pubs"=>$x
		);
		$this->load->view("brAdmin/default/addBookView",$temp);
	}

	public function upd_Book($id)
	 {
	 	if($this->input->post('btnAdd')!="")
		{
		$config['upload_path'] = './upload/';     
        $config['allowed_types'] = 'gif|jpg|png|jpeg';     
        $this->load->library('upload', $config);

			$data=array(
			"bookTitle"=>$this->input->post("txtbookTitle"),
			"bookPages"=>$this->input->post("txtbookPages"),
			"bookEdition"=>$this->input->post("txtbookEdition"),
			"bookPublisherID"=>$this->input->post("lstbookPublisher"),
			"bookSynopsis"=>$this->input->post("txtbookSynopsis"),
			"bookISBN"=>$this->input->post("txtbookISBN"),
			"bookPublisherDate"=>$this->input->post("dtbookDate"),
			"bookCoverImage"=>""
			);

		if(!$this->upload->do_upload('imgbookCoverPhoto'))
         {
         	$error=array('error'=>$this->upload->display_errors());
         	$this->load->view('brAdmin/default/addBookView',$error);
         }
         else
         {
         	$t=$this->upload->data();
         	$data['bookCoverImage']=$t["file_name"];
        	 $this->bm->upd_Book($data,$id);
		 //$this->load->view('product_disp');
		 $this->load->view("brAdmin/default/addBookView");
		 //	redirect("brAdmin/BookC/addBooks");
		 }
		}
		else
		{
		$x=$this->bm->getPublishers();
		$temp=array("pubs"=>$x);
		$this->load->view("brAdmin/default/addBookView",$temp);
		}		
	}


	public function srchbook()
	{
		if($this->input->post("txtsrch"))
			$name=$this->input->post("txtsrch");
		else
			$name=null;
		$x=$this->bm->srchbook($name);
		$temp=array("books"=>$x);
		$this->load->view('brAdmin/default/books',$temp);
	}
	public function deleteBook($bookID)
	{
		$this->bm->deleteBook($bookID);
		redirect("brAdmin/BookC");
	}
	public function bookMasterView($bookID)
	{
		$y=$this->bm->getBookData($bookID);
		$x=$this->bm->getBookAwards($bookID);
		$z=$this->bm->getBookRating($bookID);
		$p=$this->bm->getReviews($bookID);


		//echo $z->AvgRat;
		$temp=array(
			"bookawards"=>$x,
			"bookdata"=>$y,
			"bookAvgRat"=>$z,
			"bookreviews"=>$p
		);
		$this->load->view("brAdmin/default/bookMasterView",$temp);
	}
	public function addAward($bookID)
	{
		$data=array(
			"awardName"=>$this->input->post("txtawardName"),
			"awardDate"=>$this->input->post("dtawardDate"),
			"description"=>$this->input->post("txtawardDescription"),
			"title"=>$this->input->post("txttitle")
		);
		$this->bm->addAward($data,$bookID);
		redirect("brAdmin/BookC/bookMasterView/$bookID");
	}
	public function editAward($awardID,$bookID)
	{
		$data=array(
			"awardName"=>$this->input->post("txtawardName"),
			"awardDate"=>$this->input->post("dtawardDate"),
			"title"=>$this->input->post("txttitle"),
			"description"=>$this->input->post("txtawardDescription")
		);
		$this->bm->editAward($data,$awardID);
		redirect("brAdmin/BookC/bookMasterView/$bookID");

	}
	public function changeReviewStat($reviewID)
	{
		$this->bm->changeReviewStat($reviewID);
		echo 1;
	}
	public function deleteAward($awardID,$bookID)
	{
		$this->bm->deleteAward($awardID);
		redirect("brAdmin/BookC/bookMasterView/$bookID");
	}	
	public function addBookGenre($bookID)
	{
		$genreList=$this->input->post("chkGenre");
		foreach ($genreList as $key) {
			$this->bm->addBookGenre($key,$bookID);
		}
		redirect("brAdmin/BookC/bookMasterView/$bookID");
	}

}
