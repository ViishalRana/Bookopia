<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class HomeC extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model("brUser/UserM","um");
			$this->load->model("brUser/HomeM","hm");
			$this->load->model("brUser/AuthorM","am");

			if(!$this->session->userID)
			{
				redirect("brUser/LoginC/");
			}
		}

		public function index()
		{
			if($this->session->userID)
			{
				if($this->session->userType=="User")
				{
					$a=$this->um->getMostFollowedAuthors();
					$b=$this->um->getTotalBooks();
					$c=$this->um->getTotalAuthors();
					$d=$this->um->getTotalUsers();
					$e=$this->um->getMostRatedBooks();
					$i=$this->um->getMostRatedAuthorsBooks();
					$j=$this->am->getActiveAuthor(15);
					$k=$this->um->getRecentBlogs();
					//echo "<pre>";print_r($j);die();
					/*print_r($i);
					die();*/
					$f=$this->um->getAllGenres();
					$g=$this->um->getAllAuthors();
					$x=$this->hm->getGenre();
					$v=$this->hm->getReadListBooks();
					$y=$this->hm->getNewRelease();
					foreach ($y as $key) {
						$key->genreData=$this->hm->getBookGenreData($key->bookID);
						$key->authorData=$this->hm->getBookAuthorData($key->bookID);
					}
					foreach ($x as $key) 
					{
						$key->gID=$this->hm->fetchBookGenre($key->genreID);
					}			
					//echo "<pre>";
					//print_r($g);
					$temp=array(
						"activeauthors"=>$j,
						"mostfolllowedauthors"=>$a,
						"totalbooks"=>$b,
						"totalauthors"=>$c,
						"totalusers"=>$d,
						"mostratedbooks"=>$e,
						"allbookgenres"=>$f,
						"allbookauthors"=>$g,
						"genres"=>$x,
						"readlistbooks"=>$v,
						"newrelease"=>$y,
						"mostratedauthorbooks"=>$i,
						"activeauthors"=>$j,						
						"recentblogs"=>$k
					);
					//print_r($e);
					$this->load->view('brUser/index',$temp);					

				}
				else
				{
					$a=$this->um->getMostFollowedAuthors();
					$b=$this->um->getTotalBooks();
					$c=$this->um->getTotalAuthors();
					$d=$this->um->getTotalUsers();
					$e=$this->um->getMostRatedBooks();
					$f=$this->um->getAllGenres();
					$g=$this->um->getAllAuthors();
					$i=$this->um->getMostRatedAuthorsBooks();
					$j=$this->am->getActiveAuthor(15);
					$k=$this->um->getRecentBlogs();
					$x=$this->hm->getGenre();
					$v=$this->hm->getReadListBooks();
					$y=$this->hm->getNewRelease();
					foreach ($y as $key) {
						$key->genreData=$this->hm->getBookGenreData($key->bookID);
						$key->authorData=$this->hm->getBookAuthorData($key->bookID);
					}					
					foreach ($x as $key) 
					{
						$key->gID=$this->hm->fetchBookGenre($key->genreID);
					}			
					//echo "<pre>";
					//print_r($g);
					$temp=array(
						"activeauthors"=>$j,
						"mostfolllowedauthors"=>$a,
						"totalbooks"=>$b,
						"totalauthors"=>$c,
						"totalusers"=>$d,
						"mostratedbooks"=>$e,
						"allbookgenres"=>$f,
						"allbookauthors"=>$g,
						"genres"=>$x,
						"readlistbooks"=>$v,
						"newrelease"=>$y,
						"mostratedauthorbooks"=>$i,
						"activeauthors"=>$j,						
						"recentblogs"=>$k
					);
					//print_r($e);
					$this->load->view('brUser/index1',$temp);					
				}
			}
		}
		public function viewMore($bookID)
		{
			$a=$this->um->getBookData($bookID);

			$a->avgRating=$this->um->getBookAvgRating($bookID);
/*			print_r($a);
			die();
*/			$b=$this->um->getBookGenreData($bookID);
			$c=$this->um->getBookAuthorData($bookID);
			$d=$this->um->REgetBookLimitedReviews($bookID);

			$x=$this->hm->getGenre();
			$y=$this->um->getUserBookRating($bookID);
			$v=$this->hm->getReadListBooks();
			$w=$this->hm->getBookAwards($bookID);
			foreach ($x as $key) 
			{
				$key->gID=$this->hm->fetchBookGenre($key->genreID);
				$key->count=$this->hm->fetchGenreCount($key->genreID);
			}			

			//print_r($d);
			$temp=array(
				"bookdata"=>$a,
				"bookgenredata"=>$b,
				"bookauthordata"=>$c,
				"bookreviews"=>$d,
				"genres"=>$x,
				"userbookrating"=>$y,
				"readlistbooks"=>$v,
				"bookaward"=>$w

			);
			$this->load->view("brUser/bookDetails",$temp);
		}
		public function viewMuchMore($bookID)
		{
			$a=$this->um->getBookData($bookID);
			$a->avgRating=$this->um->getBookAvgRating($bookID);
			$b=$this->um->getBookGenreData($bookID);
			$c=$this->um->getBookAuthorData($bookID);
			$d=$this->um->getBookReviews($bookID);
			$x=$this->hm->getGenre();
			$v=$this->hm->getReadListBooks();	
						$w=$this->hm->getBookAwards($bookID);		
						$y=$this->um->getUserBookRating($bookID);
			foreach ($x as $key) 
			{
					$key->count=$this->hm->fetchGenreCount($key->genreID);
			$key->gID=$this->hm->fetchBookGenre($key->genreID);
			}			

			//print_r($d);
			$temp=array(
				"bookdata"=>$a,
				"bookgenredata"=>$b,
				"bookauthordata"=>$c,
				"bookreviews"=>$d,
				"genres"=>$x,
				"userbookrating"=>$y,
				"readlistbooks"=>$v,
				"bookaward"=>$w

			);
			$this->load->view("brUser/bookDetails",$temp);
		}		
		public function addReview($bookID)
		{
			if($this->input->post("btnSubmit") && !empty($this->input->post("btnSubmit")))
			{				
			$data=array(
				"userID"=>$this->session->userID,
				"bookID"=>$bookID,
				"reviewData"=>$this->input->post("txtreviewData"),
				"userType"=>$this->session->userType
			);
			$this->um->addReview($data);
			redirect("brUser/HomeC/viewMore/$bookID");
			}
		}
		public function bookView()
		{
			$this->load->view('brUser/genreView');
		}	
		public function addRating($rating,$bookID)
		{
			if($this->session->userID)
			{
				$data=array(
					"userID"=>$this->session->userID,
					"bookID"=>$bookID,
					"rating"=>$rating,
					"userType"=>$this->session->userType
				);
			$this->um->addRating($data);
			}

		}
		public function deleteReview($reviewID,$bookID)
		{
			$this->db->where("reviewID",$reviewID)->delete("tblreview");
			redirect("brUser/HomeC/viewMore/$bookID");
		}	
		public function addToReadList($bookID)
		{
			if(isset($this->session->userID))
			{

				$data=array(
					"bookID"=>$bookID,
					"userID"=>$this->session->userID,
					"userType"=>$this->session->userType
				);

				$this->um->addToReadList($data);
			}
		}

		public function getGenreBook($genreID)
		{
			// echo "string";
			// die();
			$x=$this->hm->getGenre();
			$y=$this->hm->getGenreBook($genreID);
			$v=$this->hm->getReadListBooks();			
			// echo $this->db->last_query();
			foreach ($x as $key) 
			{
				$key->gID=$this->hm->fetchBookGenre($key->genreID);
				$key->count=$this->hm->fetchGenreCount($key->genreID);
			}
			foreach ($y as $key1) 
			{
				$key1->avg=$this->hm->bookRating($key1->bookID);
			}
			$temp=array(
				"gen"=>$y,
				"genres"=>$x,
				"readlistbooks"=>$v				
			);
			/*echo "<pre>";
			print_r($y);
			die();*/
			$this->load->view('brUser/genreView',$temp);
		}
		public function setLastActiveSession($olt)
		{
			$this->hm->setLastActiveSession($olt);
		}	
		public function getNewNoti()
		{
			//echo 1;
			$y=$this->hm->getLastActiveSession();
			$lastactive=urlencode($y->lastactive);
			$x=$this->hm->getNewNoti($lastactive);
			echo $x;
		}	
		public function getReadListData($limit=5)
		{
			$x=$this->hm->getReadListData();
			foreach ($x as $key) {
				$key->bookData=$this->hm->getBookData($key->bookID);
			}
			echo json_encode($x);
		}
		public function getReadListCount()
		{
			$x=$this->hm->getReadListCount();
			echo $x; 
		}

		public function removeBookFromReadList($readListID)
		{
			$this->hm->removeBookFromReadList($readListID);
		}	
		public function getUserStatus()
		{
			$x=$this->hm->getUserStatus();
			echo $x->status;
		}	
	}
?>
