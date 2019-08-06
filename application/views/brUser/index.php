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
</head>
<body class="tg-home tg-homeone">
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
		<?php include_once("header.php")?>
		
		<!--************************************
				Header End
		*************************************-->
		<!--************************************
				Home Slider Start
		*************************************-->
		<div id="tg-homeslider" class="tg-homeslider tg-haslayout owl-carousel">

			<?php
				foreach ($mostfolllowedauthors as $key) {
					?>
						<div class="item" data-vide-bg="poster: images/slider/img-01.jpg" data-vide-options="position: 0% 50%">
							<div class="container">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-10 col-md-push-1 col-lg-8 col-lg-push-2">
										<div class="tg-slidercontent">
											<a href="javascript:void(0);"><img src="<?=base_url()?>/upload/<?=$key->authorPhoto?>" alt="image description" style="width: 220px;height: 200px;background: #fff;border-radius: 50%;margin: 0 auto 30px;border: 1px solid #dbdbdb;"></a>
											<h1><?php if($key->authorFirstName!=""){echo $key->authorFirstName." ".$key->authorLastName;}else echo '"'.$key->authorAlias.'"';?></h1>
											<h3>Followers : <?=$key->followers?></h3>
											
											<div class="tg-btns">
												<a class="tg-btn" href="<?=site_url('brUser/AuthorC/authorInfo/').$key->authorID?>">View Profile</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	
					<?php		
				}
			?>

		</div>
		<!--************************************
				Home Slider End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					All Status Start
			*************************************-->
			<section class="tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-allstatus">
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<div class="tg-parallax tg-bgbookwehave" data-z-index="2" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-01.jpg">
									<div class="tg-status">
										<div class="tg-statuscontent">
											<span class="tg-statusicon"><i class="icon-book"></i></span>
											<h2>Books we have<span><?=$totalbooks->totalBooks?></span></h2>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<div class="tg-parallax tg-bgtotalmembers" data-z-index="2" data-appear-bottom-offset="600" data-parallax="scroll" data-image-src="resources2/images/parallax/bgparallax-02.jpg">
									<div class="tg-status">
										<div class="tg-statuscontent">
											<span class="tg-statusicon"><i class="icon-user"></i></span>
											<h2>Authors<span><?=$totalauthors->totalAuthors?></span></h2>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<div class="tg-parallax tg-bghappyusers" data-z-index="2" data-appear-top-offset="600" data-parallax="scroll" data-image-src="resources2/images/parallax/bgparallax-03.jpg">
									<div class="tg-status">
										<div class="tg-statuscontent">
											<span class="tg-statusicon"><i class="icon-heart"></i></span>
											<h2>Happy users<span><?=$totalusers->totalUsers?></span></h2>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					All Status End
			*************************************-->
			<!--************************************
					Best Selling Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<h2><span>People’s Choice</span>Most Rated Books</h2>
								<a class="tg-btn" href="">View All</a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div id="tg-bestsellingbooksslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">
									<?php
										foreach ($mostratedbooks as $key) {
											?>
												<div class="item">
													<div class="tg-postbook">
														<figure class="tg-featureimg">
															<div class="tg-bookimg">
																<div class="tg-frontcover"><img src="<?=base_url()?>/upload/<?=$key->bookCoverImage?>" alt="image description" style="height: 220px;"></div>
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
																<?php
																	foreach ($allbookgenres as $key1) {
																		if($key1->bookID==$key->bookID)
																		{
																			?>
																			<li><a href=""><?=$key1->genreName?></a></li>
																			<?php
																		}
																	}
																?>
															</ul>
															<div class="tg-booktitle">
																<h3><a href="javascript:void(0);"><?=$key->bookTitle?></a></h3>
															</div>
															<span class="tg-bookwriter">By: 
																<?php
																	$f=0;
																	foreach ($allbookauthors as $key1) {
																		if($key1->bookID==$key->bookID)
																		{
																			if($f==1)
																			{
																				echo " , ";
																			}
																			?>
																			<a href=""><?php if($key1->authorFirstName!="")echo $key1->authorFirstName." ".$key1->authorLastName;else echo $key1->authorAlias;?></a>
																			<?php
																			$f=1;
																		}
																	}
																?>
															</span>
															<span><span>
															<?php
																for($i=0;$i<$key->avgRating;$i++) {
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
															</span></span>
															
															<a class="tg-btn tg-btnstyletwo" href="<?=site_url("brUser/HomeC/viewMore/$key->bookID")?>">
																<i class="fa fa-plus-circle"></i>
																<em>View More</em>
															</a>
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
			</section>
			<!--************************************
					Best Selling End
			*************************************-->
			<!--************************************
					Featured Item Start
			*************************************-->

			<!--************************************
					Featured Item End
			*************************************-->
			<!--************************************
					New Release Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-newrelease">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="tg-sectionhead">
									<h2><span></span>New Release Books</h2>
								</div>
								
								<div class="tg-btns">
									<a class="tg-btn tg-active" href="<?=site_url('brUser/SearchC/newReleaseBooks/')?>">View All</a>
									
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="row">
									<div class="tg-newreleasebooks">
										<?php
											foreach ($newrelease as $key) {
												?>
										<div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
											<div class="tg-postbook">
												<figure class="tg-featureimg">
													<div class="tg-bookimg">
														<div class="tg-frontcover"><img src="<?=base_url('upload/').$key->bookCoverImage?>" alt="image description"></div>
														<div class="tg-backcover"><img src="resources2/images/books/img-07.jpg" alt="image description"></div>
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
														<?php
															foreach ($key->genreData as $key1) {
																?>
																<li><a href="<?=site_url("brUser/HomeC/getGenrebook/$key1->genreID")?>"><?=$key1->genreName?></a></li>
																<?php
															}
														?>
														
													</ul>
													<div class="tg-booktitle">
														<h3><a href="javascript:void(0);"><?=$key->bookTitle?></a></h3>
													</div>
													<span class="tg-bookwriter">By: <?php
														foreach ($key->authorData as $key1) {
															?>
															<a href="<?=site_url("brUser/AuthorC/authorInfo/$key1->authorID")?>"><?php if($key1->authorFirstName!=""){echo $key1->authorFirstName." ".$key1->authorLastName;}else{echo $key1->authorAlias;}?></a>
															<?php
														}
													?></span>
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
				</div>
			</section>
			<!--************************************
					New Release End
			*************************************-->
			<!--************************************
					Collection Count Start
			*************************************-->
			<section class="tg-parallax tg-bgcollectioncount tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="resources2/images/parallax/bgparallax-04.jpg">
				<div class="tg-sectionspace tg-collectioncount tg-haslayout">
					<div class="container">
						<div class="row">
							<div id="tg-collectioncounters" class="tg-collectioncounters">
								<div class="tg-collectioncounter tg-drama">
									<div class="tg-collectioncountericon">
										<i class="icon-bubble"></i>
									</div>
									<div class="tg-titlepluscounter">
										<h2>Fiction</h2>
										<h3 data-from="0" data-to="19" data-speed="10000" data-refresh-interval="50">19</h3>
									</div>
								</div>
								<div class="tg-collectioncounter tg-horror">
									<div class="tg-collectioncountericon">
										<i class="icon-heart-pulse"></i>
									</div>
									<div class="tg-titlepluscounter">
										<h2>Horror</h2>
										<h3 data-from="0" data-to="3" data-speed="10000" data-refresh-interval="50">3</h3>
									</div>
								</div>
								<div class="tg-collectioncounter tg-romance">
									<div class="tg-collectioncountericon">
										<i class="icon-heart"></i>
									</div>
									<div class="tg-titlepluscounter">
										<h2>Romance</h2>
										<h3 data-from="0" data-to="10" data-speed="10000" data-refresh-interval="50">10</h3>
									</div>
								</div>
								<div class="tg-collectioncounter tg-fashion">
									<div class="tg-collectioncountericon">
										<i class="icon-star"></i>
									</div>
									<div class="tg-titlepluscounter">
										<h2>Self Help</h2>
										<h3 data-from="0" data-to="27" data-speed="10000" data-refresh-interval="50">27</h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Collection Count End
			*************************************-->
			<!--************************************
					Picked By Author Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<h2><span>Some Great Books</span>Most Rated By Authors</h2>
								<a class="tg-btn" href="<?=site_url('brUser/SearchC/mostRatedBooksByAuthor')?>">View All</a>
							</div>
						</div>
						<div id="tg-pickedbyauthorslider" class="tg-pickedbyauthor tg-pickedbyauthorslider owl-carousel">
							<?php
								foreach ($mostratedauthorbooks as $key) {
									?>
										<div class="item">
											<div class="tg-postbook">
												<figure class="tg-featureimg">
													<div class="tg-bookimg">
														<div class="tg-frontcover"><img src="<?=base_url('upload/').$key->bookCoverImage?>" alt="image description"></div>
													</div>
													<div class="tg-hovercontent">
														<div class="tg-description">
															<p><?=substr($key->bookSynopsis,0,200)?></p>
														</div>
														<strong class="tg-bookpage">Book Pages: <?=$key->bookPages?></strong>
														<div class="tg-ratingbox"><span><?php
																for($i=0;$i<$key->avgRating;$i++) {
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
																?></span></div>
													</div>
												</figure>
												<div class="tg-postbookcontent">
													<div class="tg-booktitle">
														<h3><a href="<?=site_url("brUser/HomeC/viewMore/$key->bookID")?>"><?=$key->bookTitle?></a></h3>
													</div>
													
												</div>
											</div>
										</div>									
									<?php
								}
							?>														
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Picked By Author End
			*************************************-->
			<!--************************************
					Testimonials Start
			*************************************-->
			<section class="tg-parallax tg-bgtestimonials tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="resources2/images/parallax/bgparallax-05.jpg">
				<div class="tg-sectionspace tg-haslayout">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
								<div id="tg-testimonialsslider" class="tg-testimonialsslider tg-testimonials owl-carousel">
									<div class="item tg-testimonial">
										<figure><img src="resources2/images/author/1.jpeg" style="height: 150px;width: 150px;" alt="image description"></figure>
										<blockquote><q>" If we encounter a man of rare intellect, we should ask him what books he reads."</q></blockquote>
										<div class="tg-testimonialauthor">
											<h3>Ralph Waldo Emerson</h3>
											
										</div>
									</div>
									<div class="item tg-testimonial">
										<figure><img src="resources2/images/author/2.jpeg" style="height: 150px;width: 150px;" alt="image description"></figure>
										<blockquote><q>"If you only read the books that everyone else is reading, you can only think what everyone else is thinking."</q></blockquote>
										<div class="tg-testimonialauthor">
											<h3>Haruki Murakami</h3>
											
										</div>
									</div>
									<div class="item tg-testimonial">
										<figure><img src="resources2/images/author/3.jpeg" style="height: 150px;width: 150px;" alt="image description"></figure>
										<blockquote><q>"A room without books is like a body without a soul."</q></blockquote>
										<div class="tg-testimonialauthor">
											<h3>Cicero</h3>											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Testimonials End
			*************************************-->
			<!--************************************
					Authors Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<h2><span>Strong Minds Behind Us</span>Active Authors</h2>
								<a class="tg-btn" href="javascript:void(0);">View All</a>
							</div>
						</div>
						<div id="tg-authorsslider" class="tg-authors tg-authorsslider owl-carousel">
							<?php
								foreach ($activeauthors as $key) {
									?>
										<div class="item tg-author">
											<figure><a href="javascript:void(0);"><img style="height: 153px;width: 153px;" src="<?=base_url('upload/').$key->authorPhoto?>" alt="image description"></a></figure>
											<div class="tg-authorcontent">
												<h2><a href="javascript:void(0);"><?=$key->authorFirstName." ".$key->authorLastName?></a></h2>
											</div>
										</div>

									<?php
								}
							?>
							
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Authors End
			*************************************-->
			<!--************************************
					Call to Action Start
			*************************************-->
			<section class="tg-parallax tg-bgcalltoaction tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="resources2/images/parallax/bgparallax-06.jpg">
				<div class="tg-sectionspace tg-haslayout">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-calltoaction">
									<h2>For Book Lovers, From Book Lovers</h2>
									<h3>Bookopia Community</h3>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Call to Action End
			*************************************-->
			<!--************************************
					Latest News Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<h2><span></span>Latest Blogs</h2>
								
							</div>
						</div>
						<div id="tg-postslider" class="tg-postslider tg-blogpost owl-carousel">
							<?php
								foreach ($recentblogs as $key) {
									?>
										<article class="item tg-post">
											<figure style="height: 262.5px;width: 234.67px;"><a style="height: 250.5px;width: 222.67px;" href="javascript:void(0);"><img style="height: 250.5px;width: 222.67px;" src="<?=base_url('upload/authorblog/').$key->image?>" alt="image description"></a></figure>
											<div class="tg-postcontent">
												
												<div class="tg-posttitle">
													<h3><a href="javascript:void(0);"><?=$key->blogTitle?></a></h3>
												</div>
												<span class="tg-bookwriter">By: <a href="<?=site_url('brUser/AuthorC/authorInfo/').$key->authorID?>"><?=$key->authorData->authorFirstName." ".$key->authorData->authorLastName?></a></span>
												
											</div>
										</article>

									<?php
								}
							?>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Latest News End
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
	<div id="ch"></div>
	<!--************************************
			Wrapper End
	*************************************-->
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

<!-- Mirrored from exprostudio.com/html/book_library/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Apr 2019 12:11:23 GMT -->
</html>