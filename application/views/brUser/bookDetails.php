<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang=""> <!--<![endif]-->

<!-- Mirrored from exprostudio.com/html/book_library/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Apr 2019 12:10:28 GMT -->
<head>
	<title>Bookopia</title>
	<base href="<?=base_url();?>">
	<link rel="icon" href="resources/assets/icon/title_icon.png" type="image/x-icon">	
	<?php include_once("topscript.php")?>
	<style type="text/css">
	*{
		margin: 0;
		padding: 0;
	}
	.rate {
		float: left;
		height: 46px;
		padding: 0 10px;
	}
	.rate:not(:checked) > input {
		position:absolute;
		top:-9999px;
	}
	.rate:not(:checked) > label {
		float:right;
		width:1em;
		overflow:hidden;
		white-space:nowrap;
		cursor:pointer;
		font-size:30px;
		color:#ccc;
	}
	.rate:not(:checked) > label:before {
		content: '★ ';
	}
	.rate > input:checked ~ label {
		color: #ffc700;    
	}
	.rate:not(:checked) > label:hover,
	.rate:not(:checked) > label:hover ~ label {
		color: #deb217;  
	}
	.rate > input:checked + label:hover,
	.rate > input:checked + label:hover ~ label,
	.rate > input:checked ~ label:hover,
	.rate > input:checked ~ label:hover ~ label,
	.rate > label:hover ~ input:checked ~ label {
		color: #c59b08;
	}

</style>
</head>
<body class="tg-home tg-homeone">
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
	?>
	<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="<?=base_url()?>resources2/images/parallax/bgparallax-07.jpg">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="tg-innerbannercontent">
						<h1><?=$bookdata->bookTitle?></h1>
						<ol class="tg-breadcrumb">
							<li><a href="<?=site_url("brUser/HomeC")?>">Home</a></li>
							<li><a href="javascript:void(0);">Books</a></li>
							<li class="tg-active"><?=$bookdata->bookTitle?></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
	<main id="tg-main" class="tg-main tg-haslayout" style="background-color: white;">
			<!--************************************
					News Grid Start
					*************************************-->
					<div class="tg-sectionspace tg-haslayout">
						<div class="container">
							<div class="row">
								<div id="tg-twocolumns" class="tg-twocolumns">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<figure class="tg-newsdetailimg">
											<img src="<?=base_url()?>/upload/<?=$bookdata->bookCoverImage?>" alt="image description" style="height: 750px;width: 1170px;">
										</figure>
									</div>
									<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
										<div id="tg-content" class="tg-content">
											<div class="tg-newsdetail">
												<ul class="tg-bookscategories">
													<?php
													foreach($bookgenredata as $key)
													{
														?>
														<li><a href=""><?=$key->genreName?></a></li>
														<?php
													}
													?>

												</ul>
												<div>
													<p align="center" style="font-size: 20px;">Average Ratings :
														<?php
														if(!empty($bookdata->avgRating))
														{
															foreach ($bookdata->avgRating as $key1) {
																for($i=0;$i<$key1->avgRating;$i++) {
																	?>
																	<i class="fa fa-star f-12 text-c-yellow"></i>
																	<?php
																}
																for($j=$i;$j<10;$j++)
																{
																	?>
																	<i class="fa fa-star f-12 text-default"></i>
																	<?php
																}
															}
														}
														?>												
													</p>
													<p align="center" style="font-style: italic;font-size: 18px;align-content: center;"><?='"'?><?=$bookdata->bookSynopsis?><?='"'?></p>

												</div>
												<?php
												foreach($bookauthordata as $key)
												{
													?>
													<div class="tg-authorbox" style="background-color: #484848;border-color: white;color: white;">
														<figure class="tg-authorimg"style="width: 70px;height: 70px;background: #fff;border-radius: 50%;margin: 0 auto 30px;border: 1px solid #dbdbdb;">
															<img src="<?=base_url()?>/upload/<?=$key->authorPhoto?>" alt="image description" style="width: 70px;height: 70px;background: #fff;border-radius: 50%;margin: 0 auto 30px;border: 1px solid #dbdbdb;">
														</figure>													
														<div class="tg-authorinfo">
															<div class="tg-authorhead">
																<div class="tg-leftarea">
																	<div class="tg-authorname">
																		<h2 style="color: white;"><?=$key->authorFirstName." ".$key->authorLastName?></h2>
																		<?php
																		if(!empty($key->authorAlias))
																		{
																			?>
																			<h2 style="color: white;"><?='"'.$key->authorAlias.'"'?></h2>
																			<?php
																		}
																		?>
																		<?php
																		if(isset($bookdata->bookPublisherDate))
																		{
																			$nd = $bookdata->bookPublisherDate;

																			$createDate = new DateTime($nd);

																			$strip = $createDate->format('Y-m-d');
																				//echo $strip;
																		}
																		?>																			
																		<span>Published Date : <?=$strip?></span>
																	</div>
																</div>
																
															</div>
															<a class="tg-btn tg-active" href="<?=site_url("brUser/AuthorC/authorInfo/$key->authorID/books")?>">View All Books</a>
														</div>
													</div>		
													<?php
												}
												?>


												<div class="tg-commentsarea">
													<div class="tg-sectionhead">
														<h3>Reviews</h3>
													</div>
													<div class="tg-sectionspace">

														<ul id="tg-comments" class="tg-comments">
															<?php
															foreach($bookreviews as $key)
															{
																if($key->userType=="User")
																{
																	$src=$key->reviewerData->userPhoto;
																	$name=$key->reviewerData->userFirstName." ".$key->reviewerData->userLastName;
																}
																else
																{
																	$src=$key->reviewerData->authorPhoto;
																	$name=$key->reviewerData->authorFirstName." ".$key->reviewerData->authorLastName;
																}

																?>
																<li>
																	<div class="tg-authorbox">
																		<figure class="tg-authorimg" style="width: 70px;height: 70px;background: #fff;border-radius: 50%;margin: 0 auto 30px;border: 1px solid #dbdbdb;">
																			<img src="<?=base_url()?>/upload/<?=$src?>" alt="image description" alt="image description" style="width: 70px;height: 70px;background: #fff;border-radius: 50%;margin: 0 auto 30px;border: 1px solid #dbdbdb;">
																		</figure>
																		<div class="tg-authorinfo">
																			<div class="tg-authorhead">
																				<div class="tg-leftarea">
																					<div class="tg-authorname">
																						<div>
																							<h2><?=$name?>
																							</h2>
																							<span><?=$key->dateTime?></span>
																						</div>
																						
																					</div>
																				</div>
																			</div>
																			<div class="tg-description card">
																				<p class="card-block"><?=$key->reviewData?></p>
																			</div>
																			<?php
																			if($key->userID==$this->session->userID && $key->userType==$this->session->userType)
																			{
																				?>

																				<a href="<?=site_url("brUser/HomeC/deleteReview/$key->reviewID/$bookdata->bookID")?>" style="color: red;">
																					Delete<i class="fa fa-trash-o"></i> 
																				</a>											

																				<?php
																			}
																			?>
																		</div>
																		<div class="tg-bottomarrow"></div>
																	</div>
																</li>														
																<?php													
															}
															?>

														</ul>
														<a class="tg-btn tg-active" href="<?=site_url("brUser/HomeC/viewMuchMore/$bookdata->bookID")?>" align="center" id="btnvm">View More</a>
														<a class="tg-btn tg-active" href="<?=site_url("brUser/HomeC/viewMore/$bookdata->bookID")?>" align="center" id="btnvm">View Less</a>
													</div>
												</div>
												<div class="tg-leaveyourcomment">
													<div class="tg-sectionhead">

														<?php
														if($userbookrating!=null)
														{
															?>
															<p align="center" style="font-size: 20px;">
																<?php
																for($i=0;$i<$userbookrating->rating;$i++) {
																	?>
																	<i class="fa fa-star f-12 text-c-yellow"></i>
																	<?php
																}
																for($j=$i;$j<10;$j++)
																{
																	?>
																	<i class="fa fa-star f-12 text-default"></i>
																	<?php
																}
																?>	
															Your Ratings</p>
															<?php															
														}
														else
														{
															?>
															<h2>Rate this book?<div class="rate">
																<input type="radio" id="star10" name="rate" value="10" />
																<label for="star10" title="10">10 stars</label>
																<input type="radio" id="star9" name="rate" value="9" />
																<label for="star9" title="9">9 stars</label>
																<input type="radio" id="star8" name="rate" value="8" />
																<label for="star8" title="8">8 stars</label>
																<input type="radio" id="star7" name="rate" value="7" />
																<label for="star7" title="7">7 stars</label>
																<input type="radio" id="star6" name="rate" value="6" />
																<label for="star6" title="6">6 stars</label>
																<input type="radio" id="star5" name="rate" value="5" />
																<label for="star5" title="5">5 stars</label>
																<input type="radio" id="star4" name="rate" value="4" />
																<label for="star4" title="4">4 stars</label>
																<input type="radio" id="star3" name="rate" value="3" />
																<label for="star3" title="3">3 stars</label>
																<input type="radio" id="star2" name="rate" value="2" />
																<label for="star2" title="2">2 stars</label>
																<input type="radio" id="star1" name="rate" value="1" />
																<label for="star1" title="1">1 star</label>
															</div></h2>
															<?php
														}
														?>

													</div>
												</div>
												<div class="tg-leaveyourcomment">
													<div class="tg-sectionhead">
														<h2>Leave Your Review</h2>
													</div>
													<form class="tg-formtheme tg-formleavecomment" method="post" enctype="multipart/form-data" action='<?=site_url("brUser/HomeC/addReview/$bookdata->bookID")?>'>
														<fieldset>
															<div class="form-group">
																<textarea placeholder="Review" name="txtreviewData"></textarea>
															</div>
															<div class="form-group">
																<input type="submit" class="tg-btn tg-active" name="btnSubmit" value="Submit">
															</div>
														</fieldset>
													</form>
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
											<h3>Awards</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												<?php
												foreach ($bookaward as $key) 
												{
													?>
													<li style="font-size: 16px;"><a href="javascript:void(0);"><?= $key->awardName?></a></li>
													<?php
												}
												?>

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
				<script src="resources2/js/vendor/jquery-library.js"></script>
				<script src="resources2/js/vendor/bootstrap.min.js"></script>
				<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
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
					<?php
					for($i=1;$i<=10;$i++)
					{
						?>
						$("#star<?=$i?>").click(function(){
							//alert('<?=site_url("brUser/HomeC/addRating/")?>'+$(this).val()+'/'+<?=$bookdata->bookID?>);
							$.ajax({url: '<?=site_url("brUser/HomeC/addRating/")?>'+$(this).val()+'/'+<?=$bookdata->bookID?>, success: function(result){	
								//alert();
								location.reload();			
							}});
						});			
						<?php
					}
					?>
				</script>
			</body>

			<!-- Mirrored from exprostudio.com/html/book_library/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Apr 2019 12:11:23 GMT -->
			</html>