<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang=""> <!--<![endif]-->

<!-- Mirrored from exprostudio.com/html/book_library/products.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 May 2019 09:45:21 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bookopia</title>
	<base href="<?=base_url();?>">
	<link rel="icon" href="resources/assets/icon/title_icon.png" type="image/x-icon">	
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?=base_url();?>">
	<?php include_once("topscript.php")?>
</head>
<body>
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<!--************************************
			Wrapper Start
	*************************************-->
	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Header Start
		*************************************-->
				<?php
				$rlcnt=0;
			if(!empty($readlistbooks))
			{
			foreach ($readlistbooks as $key) {
				$rlb[]=$key->bookID;
				$rlcnt++;
			}				
			}
			else{
				$rlb[]="";
			}
		?>		

		<?php
			if($this->session->userType=="User")
			{
				include_once("header.php");		
			}
			else
			{
				include_once("header1.php");
			}
		 ?>		<!--************************************
				Header End
		*************************************-->
		<!--************************************
				Inner Banner Start
		*************************************-->
		<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="resources2/images/parallax/bgparallax-07.jpg">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-innerbannercontent">
							<h1>All Books</h1>
							<ol class="tg-breadcrumb">
								<li><a href="<?=site_url("brUser/HomeC/")?>">home</a></li>
								<li class="tg-active">Genre</li>
								<li class="tg-active">Genre Books</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Inner Banner End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					News Grid Start
			*************************************-->
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div id="tg-twocolumns" class="tg-twocolumns">
							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
								<div id="tg-content" class="tg-content">
									<div class="tg-products">
										<div class="tg-sectionhead">
											<h2><span></span></h2>
										</div>

										<div class="tg-productgrid">
											<div class="tg-refinesearch">
											<?php
											foreach ($gen as $key) 
											{
												?>
												<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
												<div class="tg-postbook">
													<figure class="tg-featureimg">
														<div class="tg-bookimg">
															<div class="tg-frontcover"><img src="<?= base_url();?>upload/<?= $key->bookCoverImage?>" alt="Ille" style="height: 200px;"></div>
															<div class="tg-backcover"><img src="resources2/images/books/img-01.jpg" alt="image description"></div>
														</div>
														<a class="tg-btnaddtowishlist linkReadList" href="javascript:void(0)" data-id="<?=$key->bookID?>">
															<?php
																	if(in_array($key->bookID, $rlb))
																	{
																		?><span>Added to ReadList</span><?php
																	}
																	else
																	{
																		?>
																			<i class="icon-heart"></i>
																			<span>Add to ReadList</span>
																		<?php
																	}
																?>
															</a>
													</figure>
													<div class="tg-postbookcontent">
														<ul class="tg-bookscategories">
															<li><a href="javascript:void(0);"><?=$key->genreName?></a></li>
														</ul>
														<!-- <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div> -->
														<div class="tg-booktitle">
															<h3><a href="javascript:void(0);"><?=$key->bookTitle?></a></h3>
														</div>
														<span class="tg-bookwriter">By: <a href="javascript:void(0);"><?=$key->authorAlias?></a></span>
														<!-- <span class="tg-stars"> --><span>
														
													</span>
																							
														 <?php

														 foreach ($key->avg as $row) 
														 {
														 	?>
						 										<p>
																Average Ratings :<br>	
																<?php
																	for($i=0;$i<$row->AvgRat;$i++) 
																	{
															
																?>
																		<i class="fa fa-star f-12" style="color: #ffb64d;"></i>
																<?php
																	}
																	for($j=$i;$j<10;$j++)
																	{
																?>
																		<i class="fa fa-star f-12 text-default"></i>
																<?php
																	}
																	?> 
																</p>
														 	<?php
														 }
														 ?>
 														 								 

														
													</div>
												</div>
											</div>
											<?php
											}
											?>
											</div>

											
										</div>

									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
								<aside id="tg-sidebar" class="tg-sidebar">
									<!-- <div class="tg-widget tg-widgetsearch">
										<form class="tg-formtheme tg-formsearch">
											<div class="form-group">
												<button type="submit"><i class="icon-magnifier"></i></button>
												<input type="search" name="search" class="form-group" placeholder="Search by title, author, key...">
											</div>
										</form>
									</div> -->
									<div class="tg-widget tg-catagories">
										<div class="tg-widgettitle">
											<h3>Genres</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												<?php
												foreach ($genres as $key) 
												{
													?>
													<li><a href="<?=site_url('brUser/HomeC/getGenreBook/').$key->genreID?>"><span><?= $key->genreName?></span><em><?php
														foreach ($key->count as $key1) {
															echo $key1->cnt;
														}
													?></em></a></li>
													<?php
												}
												?>
												<li><a href="javascript:void(0);"><span>View All</span></a></li>
											</ul>
										</div>
									</div>

								</aside>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--************************************
					News Grid End
			*************************************-->
		</main>
		<!--************************************
				Main End
		*************************************-->
		<!--************************************
				Footer Start
		*************************************-->
		<?php include_once("bottom.php")?>
		<!--************************************
				Footer End
		*************************************-->
	</div>
	<!--************************************
			Wrapper End
	*************************************-->
	<script src="resources2/js/vendor/jquery-library.js"></script>
	<script src="resources2/js/vendor/bootstrap.min.js"></script>
	<script src="resources2/https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
	<script src="resources2/js/owl.carousel.min.js"></script>
	<script src="resources2/js/jquery.vide.min.js"></script>
	<script src="resources2/js/countdown.js"></script>
	<script src="resources2/js/jquery-ui.js"></script>
	<script src="resources2/js/parallax.js"></script>
	<script src="resources2/js/countTo.js"></script>
	<script src="resources2/js/appear.js"></script>
	<script src="resources2/js/gmap3.js"></script>
	<script src="resources2/js/main.js"></script>
	<script type="text/javascript">
		$(".linkReadList").click(function(){
			//	alert($(this).html());
			var inhtml=$(this).html();
			inhtml=$.trim(inhtml);

			if(inhtml!="<span>Added to ReadList</span>")
			{
/*				var bookid=$(this).data("id");
				var bookTitle=$(this).data("book-title");
				var bookCoverImage=$(this).data("book-img");
				var	res='<div class="tg-minicarproduct">';
				res+='<figure>';
				res+='<img height="100" width="75" src="'+"<?=base_url('upload/')?>"+bookCoverImage+'" alt="image description">';					
				res+='</figure>';
				res+='<div class="tg-minicarproductdata">';
				res+='<h5><a href="javascript:void(0);">'+bookTitle+'</a></h5>';
				res+='</div>';
				res+='</div>';
				$("#mncb").append(res);*/
				var rlcnt=$("#rlcnt").html();
				rlcnt=parseInt(rlcnt)+1;
				$("#rlcnt").html(""+rlcnt);
			  $.ajax({url: '<?=site_url("brUser/HomeC/addToReadList/")?>'+$(this).data("id"), success: function(result){
			  }});							
			$(this).html("<span>Added to ReadList</span>");
			}
		});
	</script>

</body>

<!-- Mirrored from exprostudio.com/html/book_library/products.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 May 2019 09:45:48 GMT -->
</html>
