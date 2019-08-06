<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("brUser/HomeM","hm");
		$this->load->model("brUser/AuthorM","am");
		$this->load->model("brUser/SearchM","sm");
		$this->load->library("pagination");
	}

	public function index()
	{
		$x=$this->sm->getAllGenre();
		$y=$this->am->getAuthor();
		foreach ($x as $key) 
		{
			$key->gID=$this->hm->fetchBookGenre($key->genreID);
			$key->count=$this->hm->fetchGenreCount($key->genreID);
		}
		$temp=array(
			"genres"=>$x,
			"authors"=>$y,
		);
		$this->load->view('brUser/bookView',$temp);
	}
	public function mostRatedBooksByAuthor()
	{
		$x=$this->sm->getMostRatedAuthorsBooks();
		$y=array();
		$z=$this->sm->getAllGenre();
		
		foreach ($z as $key) 
		{
			$key->gID=$this->hm->fetchBookGenre($key->genreID);
			$key->count=$this->hm->fetchGenreCount($key->genreID);
		}
		$data=array(
			"searchData"=>$x,
			"searchData2"=>$y,
			"genres"=>$z
		);
		// $bookTitle="the 5 AM Club";
/*		echo "<pre>";
		print_r( $data);
		die();
*/		$this->load->view("brUser/advanceSearch",$data);

	}
	public function newReleaseBooks()
	{
		$x=$this->sm->getNewRelease(0,10);
		$y=array();
		$z=$this->sm->getAllGenre();
		
		foreach ($z as $key) 
		{
			$key->gID=$this->hm->fetchBookGenre($key->genreID);
			$key->count=$this->hm->fetchGenreCount($key->genreID);
		}
		$data=array(
			"searchData"=>$x,
			"searchData2"=>$y,
			"genres"=>$z
		);
		// $bookTitle="the 5 AM Club";
/*		echo "<pre>";
		print_r( $data);
		die();
*/		$this->load->view("brUser/advanceSearch",$data);

	}

	public function paginate($pageNo=null,$rateList=null,$genreList=null)
	{

		$genreList=urldecode($genreList);
		$rateList=urldecode($rateList);

		//$pageNo = 0;
/*		$genreList="0,1,5,7";
		$rateList="0,10,9";
*/		// $genre=null;
		$rowPage = 10000;
		
		if($pageNo!=0)
		{
			$pageNo = ($pageNo-1)*$rowPage;
		}
		// echo $pageNo;
		// $genreList='3';
		// $rateList='4';
		//$countBook=0;
		//echo 1;
		/*echo "g".$genreList;*/
		if($genreList!="0")
		{
			$x=$this->sm->getAllBooks($pageNo,$rowPage,$genreList,$rateList);
			foreach ($x as $key) {
			$key->genres=$this->sm->getBookGenres($key->bookID);
			// $countBook++;
			}
			// $countBook = $this->sm->countTotalBook();
			foreach ($x as $key) {
				$key->authors=$this->sm->getBookAuthors($key->bookID);
			}
			// echo $countBook;
			$config = array(
			"base_url" => base_url()."index.php/brUser/SearchC/index/",
			"total_rows" => $this->sm->getCountBooks($genreList,$rateList),
			"per_page" => $rowPage,
			"use_page_numbers" => TRUE,
			"cur_tag_open" => "<a class='current'>",
			"cur_tag_close" => "</a>",
			"next_link" => "Next",
			"prev_link" => "Prev"
			);
			$this->pagination->initialize($config);
			// echo "<pre>";
			// print_r($config);
			$data = array(
			"bookData" => $x,
			"pagination" => explode("&nbsp;",$this->pagination->create_links()),
			"row" => $pageNo
			);
			$temp=array();
/*			echo $rateList;
			echo "<pre>";
			print_r($x);
*/			
			if($rateList!=null)
			{

				$rate=explode(",", $rateList);
				$min=0;
				$t=array();
				for($i=0;$i<count($rate);$i++)
				{
					if($rate[$i]!=0)
					{
						$t[]=$rate[$i];
					}
				}
				if(!empty($t))
				{
					$min=min($t);
				}
				//echo $key->ratings[0]->avgRating;
				// echo min($rate);
				// die();
				foreach ($x as $key) 
				{
					$key->ratings=$this->sm->getBookRating($key->bookID);

					if($key->ratings!=null)
					{

						if($key->ratings[0]->avgRating>=$min)
						{

						$temp[]=$key;
						}
					}
				}
				if($min!=0)
				{
				$data["bookData"]=$temp;					
				}
				else
				{
				$data["bookData"]=$x;
	
				}

			}
			/*echo "<pre>";
			print_r($x);
			echo "</pre>";*/
			echo json_encode($data);


			// print_r($temp);
			// die();
		}
		else
		{

			$x=$this->sm->getAllBooks($pageNo,$rowPage,$genreList,$rateList);
			foreach ($x as $key) {
			$key->genres=$this->sm->getBookGenres($key->bookID);
			// $countBook++;
			}
			
			// $countBook = $this->sm->countTotalBook();
			foreach ($x as $key) {
				$key->authors=$this->sm->getBookAuthors($key->bookID);
			}
			// echo $countBook;
			$config = array(
			"base_url" => base_url()."index.php/brUser/SearchC/index/",
			"total_rows" => $this->sm->getCountBooks($genreList,$rateList),
			"per_page" => $rowPage,
			"use_page_numbers" => TRUE,
			"cur_tag_open" => "<a class='current'>",
			"cur_tag_close" => "</a>",
			"next_link" => "Next",
			"prev_link" => "Prev"
			);
			$this->pagination->initialize($config);
			// echo "<pre>";
			// print_r($config);
			$data = array(
			"bookData" => $x,
			"pagination" => explode("&nbsp;",$this->pagination->create_links()),
			"row" => $pageNo
			);
			$temp=array();
/*			echo $rateList;
			echo "<pre>";
			print_r($x);
*/			
			if($rateList!=null)
			{

				$rate=explode(",", $rateList);
				$min=0;
				$t=array();
				for($i=0;$i<count($rate);$i++)
				{
					if($rate[$i]!=0)
					{
						$t[]=$rate[$i];
					}
				}
				if(!empty($t))
				{
					$min=min($t);
				}
				//echo $key->ratings[0]->avgRating;
				// echo min($rate);
				// die();
				foreach ($x as $key) 
				{
					$key->ratings=$this->sm->getBookRating($key->bookID);

					if($key->ratings!=null)
					{

						if($key->ratings[0]->avgRating>=$min)
						{

						$temp[]=$key;
						}
					}
				}
				if($min!=0)
				{
				$data["bookData"]=$temp;					
				}
				else
				{
				$data["bookData"]=$x;
	
				}

			}
			/*echo "<pre>";
			print_r($x);
			echo "</pre>";*/
			echo json_encode($data);


			// print_r($temp);
			// die();

		}
	}

	public function showLessGenre()
	{
		$x=$this->sm->getAllGenre();
		$y=$this->hm->getGenre();
		foreach ($x as $key) 
		{
			$key->gID=$this->hm->fetchBookGenre($key->genreID);
			$key->count=$this->hm->fetchGenreCount($key->genreID);
		}
		$temp=array("genres"=>$x,"genres1"=>$y);
		// echo "<pre>";
		// print_r($temp);
		echo json_encode($temp);
		// die();
		
		// $this->load->view('brUser/bookView',$temp);
	}

	public function showMore()
	{
		$x=$this->sm->getMoreGenre();
		foreach ($x as $key) 
		{
			$key->gID=$this->hm->fetchBookGenre($key->genreID);
			$key->count=$this->hm->fetchGenreCount($key->genreID);
		}
		$temp=array("genres1"=>$x);
		// echo "<pre>";
		// print_r($temp);
		// die();
		echo json_encode($temp);
	}


	public function searchBook()
	{
		$bookTitle=$this->input->post("search");
		$x=$this->sm->searchBook($bookTitle);
		$y=$this->sm->searchAuthorBook($bookTitle);
		$data=array(
			"searchData"=>$x,
			"searchData2"=>$y
		);
		// $bookTitle="the 5 AM Club";
		// echo "<pre>";
		// print_r( $x);
		// die();
		echo json_encode($data);

	}

	public function searchAdvanceBook()
	{
		$bookTitle=$this->input->post("searchAdvance");
		// echo $bookTitle;
		$x=$this->sm->searchAdvanceBook($bookTitle);
		$y=$this->sm->searchAdvanceAuthorBook($bookTitle);
		$z=$this->sm->getAllGenre();
		
		foreach ($z as $key) 
		{
			$key->gID=$this->hm->fetchBookGenre($key->genreID);
			$key->count=$this->hm->fetchGenreCount($key->genreID);
		}
		$data=array(
			"searchData"=>$x,
			"searchData2"=>$y,
			"genres"=>$z
		);
		// $bookTitle="the 5 AM Club";
	/*	echo "<pre>";
		print_r( $data);
		die();
	*/	$this->load->view("brUser/advanceSearch",$data);
		// redirect("brUser/SearchC/");
		
	}
}
?>