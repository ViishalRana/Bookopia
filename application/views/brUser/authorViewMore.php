<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang=""> <!--<![endif]-->

<!-- Mirrored from exprostudio.com/html/book_library/authordetail.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 May 2019 09:45:59 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bookopia</title>
	<base href="<?=base_url();?>">
	<link rel="icon" href="resources/assets/icon/title_icon.png" type="image/x-icon">	
	<link rel="icon" href="resources/assets/icon/title_icon.png" type="image/x-icon">	
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
hr.style-one {
border: 0;
height: 1px;
background: #333;
background-image: -webkit-linear-gradient(left, #ccc, #333, #ccc);
background-image: -moz-linear-gradient(left, #ccc, #333, #ccc);
background-image: -ms-linear-gradient(left, #ccc, #333, #ccc);
background-image: -o-linear-gradient(left, #ccc, #333, #ccc);
}

	</style>
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
			if($this->session->userType=="User")
			{
				include_once("header.php");		
			}
			else
			{
				include_once("header1.php");
			}
		 ?> 
		<!--************************************
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
							<h1>Authors</h1>
							<ol class="tg-breadcrumb">
								<li><a href="javascript:void(0);">home</a></li>
								<li><a href="javascript:void(0);">Authors</a></li>
								<li class="tg-active"><?php if(isset($author)){if(!empty($author->authorFirstName) && !empty($author->authorLastName)){echo $author->authorFirstName." ".$author->authorLastName;}else{echo '"'.$author->authorAlias.'"';}}?></li>
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
		<main id="tg-main" class="tg-main tg-haslayout" style="background-color: white;">
			<!--************************************
					Author Detail Start
			*************************************-->
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-authordetail">
								<figure class="tg-authorimg">
									<img src="<?= base_url();?>upload/<?= $author->authorPhoto?>" style="height: 300px;width:300px;">
								</figure>
									
									<div class="tg-authorcontentdetail">
									<div class="tg-sectionhead">
										<h2><span><?=$publishedbooks?> Published Books</span><?php if(isset($author)){if(!empty($author->authorFirstName) && !empty($author->authorLastName)){echo $author->authorFirstName." ".$author->authorLastName;}if(!empty($author->authorAlias)){echo "	".'"'.$author->authorAlias.'"';}}?></h2>
										<?php
											if($author->status==1)
											{
											?>
											<ul class="tg-socialicons">
											<?php
												if($author->authorID==$this->session->userID && $this->session->userType=="Author")
												{

												}
												else
												{
													?>
														<div id="Follow">
															<span><button class="btn btn-primary" id="btnFollow"><i class="fa fa-plus"></i> Follow
															</button></span>

														</div>
														<div id="Unfollow">
															<span><button class="btn btn-danger" id="btnUnfollow"><i class="fa fa-minus"></i> Unfollow
															</button></span>
														</div>	
													<?php

												}
											?>
											<?php
												if($author->authorID==$this->session->userID && $this->session->userType=="Author")
												{
													if(isset($this->session->livesession))
													{
														if($this->session->livesession!=0)
														{
															$href=site_url('brUser/AuthorC/stopLiveSession/');
															$v="Stop Live Session";
															$tr="";
														}
														else
														{
															$href=site_url("brUser/AuthorC/startLiveChat");
															$v="Start Live Session";
															$tr='target="_blank"';
														}
													}
													?>
													<div id="liveChat">
														<a id="btnlvs" href="<?=$href?>" data-flag="1" <?=$tr?>><span><button class="btn" style="background-color: red;color: #00ff00;"><?=$v?></button></span></a>
													</div>
													<?php
												}
											?>
										</ul>											
											<?php	
											}
										?>
									</div>
									<div class="tg-description">
										<p><?php
											if($author->status==1)
											{
												if(!empty($author->authorBio))
													echo $author->authorBio;
											}
											else
											{
												echo "<span style='color:grey;font-size:25px;'>This author does not have an active profile.<span>";
											}
										?></p>
									</div>

								</div>								
							<div class="tg-booksfromauthor">
								<div class="tg-navigationarea" style="margin-top: 50px;text-align: center;background-color: white;">
										<!-- Nav tabs -->
										<ul class="nav nav-tabs" role="tablist" style="display: inline-block;background-color: #c0f09c;">
											<li class="nav-item <?php if($activetab=='books')echo 'active';if($activetab==null)echo 'active';?>">
												<a class="nav-link" data-toggle="tab" href="#books"><h5>Books</h5	></a>
											</li>
											<?php
												if($author->status)
												{
													?>
														<li class="nav-item <?php if($activetab=='blogs')echo 'active';?>">
														<a class="nav-link" data-toggle="tab" href="#blogs"><h5>Blogs</h5></a>
														</li>
														<li class="nav-item <?php if($activetab=='posts')echo 'active';?>">
														<a class="nav-link" data-toggle="tab" href="#posts"><h5>Posts</h5></a>
														</li>
													<?php
												}
											?>
										</ul>									
								</div>
								<div class="tab-content">
									<div id="books" class="container tab-pane <?php if($activetab=='books')echo 'active';if($activetab==null)echo 'active';?>">
										<div class="row">
											<?php 
											foreach ($auth as $key) 
											{
												?>
												<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
												<div class="tg-postbook">
													<figure class="tg-featureimg">
														<div class="tg-bookimg"  style="height: 250px;width:250px">
															<div class="tg-frontcover"><img src="<?= base_url();?>upload/<?= $key->bookCoverImage?>" alt="Ille" style="height: 250px;"></div>
															<div class="tg-backcover"><img src="resources2/images/books/img-01.jpg" alt="image description"></div>
														</div>
															
													</figure>
													<div class="tg-postbookcontent">
														<ul class="tg-bookscategories">
														<?php
														foreach ($key->bkID as $key1) 
														{
															?>
															
															<li><a href="javascript:void(0);"><?=$key1->genreName?></a></li>
															
														<?php	
														}
														?>
														</ul>
														
														<div class="tg-booktitle">
															<h3><a href="javascript:void(0);"><?=$key->bookTitle?></a></h3>
														</div>
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
									<div id="blogs" class="container tab-pane <?php if($activetab=='blogs')echo 'active';?>">
										<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
											<div id="tg-content" class="tg-content">
												<div class="tg-newslist">										
													<div class="row">
														<?php
															if($followStatus==0)
															{
																if($this->session->userID==$author->authorID && $this->session->userType=="Author")
																{
																	?>
														<?php
															if(empty($authorblogs))
															{
																?>
																<div style="font-size: 16px;">
																	No Blogs to show
																</div>
																<?php
															}														
															foreach ($authorblogs as $key) {
																?>
																	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																		<article class="tg-post">
																			<figure style="height: 250px;width: 350px;"><a href="javascript:void(0);" style="height: 250px;width: 350px;"><img src="<?=base_url()?>upload/authorblog/<?=$key->image?>" alt="image description" style="height: 240px;width:340px;"></a></figure>
																			<div class="tg-postcontent">
																				<div class="tg-description">
																					
																					<a href="javascript:(0);" style="font-size: 16px;" class="mdl" data-toggle="modal" data-target="#myModal" data-blog-img="<?=$key->image?>" data-blog-data='<?=stripslashes($key->blog)?>' data-blog-title="<?=$key->blogTitle?>"><?=$key->blogTitle?></a>
																				</div>
																			</div>
																		</article>
																	</div>													
																<?php
															}
														?>																
																<?php
																}
																else
																{
																	?>
																<div style="font-size: 16px;margin: 10px;">
																	<h3 style="color: red;">Blogs are only visible to followers.</h3>
																</div>
																<?php	
																}

																
															}
															else
															{
																?>
														<?php
															if(empty($authorblogs))
															{
																?>
																<div style="font-size: 16px;">
																	No Blogs to show
																</div>
																<?php
															}														
															foreach ($authorblogs as $key) {
																?>
																	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
																		<article class="tg-post">
																			<figure style="height: 250px;width: 350px;"><a href="javascript:void(0);" style="height: 250px;width: 350px;"><img src="<?=base_url()?>upload/authorblog/<?=$key->image?>" alt="image description" style="height: 240px;width:340px;"></a></figure>
																			<div class="tg-postcontent">
																				<div class="tg-description">
																					
																					<a href="javascript:(0);" style="font-size: 16px;" class="mdl" data-toggle="modal" data-target="#myModal" data-blog-img="<?=$key->image?>" data-blog-data='<?=stripslashes($key->blog)?>' data-blog-title="<?=$key->blogTitle?>"><?=$key->blogTitle?></a>
																				</div>
																			</div>
																		</article>
																	</div>													
																<?php
															}
														?>																
																<?php
															}
														?>

													</div>
												</div>
											</div>
										</div>
									</div>
									<div id="posts" class="container tab-pane <?php if($activetab=='posts')echo 'active';?>">
										<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
											<div id="tg-content" class="tg-content">
												<div class="tg-newsgrid">							
													<div class="row">
														
														<?php
															if($followStatus==0)
															{
																if($this->session->userID==$author->authorID && $this->session->userType=="Author")
																{
																	?>
														<?php
															if(empty($authorposts))
															{
																?>
																<div style="font-size: 16px;">
																	No Posts to show
																</div>
																<?php
															}
															foreach ($authorposts as $key) {
																?>

																			<?php
																				if(!empty($key->imageURL))
																				{
																					?>
																				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin-right: 15px">
																					<article class="tg-post">																					
																						<figure style="height: 280px;width: 280px;"><a href="javascript:void(0);" style="height: 280px;width: 280px;"><img src="<?=base_url()?>/upload/authorpost/<?=$key->imageURL?>" alt="image description" style="height: 270px;width:270px;"></a></figure>
																							<div class="tg-postcontent">
																								
																								<div class="tg-posttitle">
																									<h3><?=$key->postData?></h3>
																								</div>
																								<ul class="tg-bookscategories">
																									<li><?=$key->postTime?></li>
																								</ul> 
																								<!-- <ul class="tg-postmetadata">
																									<li><a href="javascript:void(0);" class="commentlink" data-post-id="<?=$key->postID?>"><i class="fa fa-comment-o" style="font-size: 20px;"></i><i>Comment</i></a><a href="javascript:void(0)"><i>(View All 23456)</i></a></li>
																									<li><a href="javascript:void(0);"><i class="fa fa-thumbs-o-up" style="font-size: 20px;"></i><i>Like</i></a><a href="javascript:void(0)"><i>(View All 23456)</i></a></li>
																								</ul>
																								<div class="row" id="comment<?=$key->postID?>" hidden>
																										<input type="text" id="txtcomment<?=$key->postID?>" name="txtcomment" class="col-sm-10">
																										<button class="btn btn-success btn-round waves-effect waves-light col-sm-2 postcmnt" style="padding: 9px 0px;" data-post-id="<?=$key->postID?>">post</button>
																								</div> -->
																							</div>	

																						</article>
																						</div>																							
																					<?php
																				}
																				else
																				{
																					?>
																					<div class="col-xs-6 col-sm-12 col-md-6 col-lg-4" style="margin-right: 15px">
																					<article class="tg-post">	
																					<div class="card">
																							<div class="card-body">
																								<div class="tg-postcontent">
																									
																									<div class="tg-posttitle">
																										<h3><?=$key->postData?></h3>
																									</div>
																									<ul class="tg-bookscategories">
																										<li><?=$key->postTime?></li>
																									</ul> 
																									<!-- <ul class="tg-postmetadata">
																										<li><a href="javascript:void(0);" class="commentlink" data-post-id="<?=$key->postID?>"><i class="fa fa-comment-o" style="font-size: 20px;"></i><i>Comment</i></a><a href="javascript:void(0)"><i>(View All 23456)</i></a></li>
																										<li><a href="javascript:void(0);"><i class="fa fa-thumbs-o-up" style="font-size: 20px;"></i><i>Like</i></a><a href="javascript:void(0)"><i>(View All 23456)</i></a></li>
																									</ul>
																									<div class="row" id="comment<?=$key->postID?>" hidden>
																											<input type="text" id="txtcomment<?=$key->postID?>" name="txtcomment" class="col-sm-10">
																											<button class="btn btn-success btn-round waves-effect waves-light col-sm-2 postcmnt" style="padding: 9px 0px;" data-post-id="<?=$key->postID?>">post</button>
																									</div> -->
																								</div>																								
																							</div>
																						</div>
																					</article>
																					</div>
																																											
																					<?php
																				}
																			?>
																			
																		


																<?php
															}
														?>																
																<?php
																}
																else
																{
																	?>
																<div style="font-size: 16px;margin: 10px;">
																	<h3 style="color: red;">Posts are only visible to followers.</h3>
																</div>
																<?php	
																}
																
															}
															else
															{
																?>
														<?php
															if(empty($authorposts))
															{
																?>
																<div style="font-size: 16px;">
																	No Posts to show
																</div>
																<?php
															}
															foreach ($authorposts as $key) {
																?>

																			<?php
																				if(!empty($key->imageURL))
																				{
																					?>
																				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin-right: 15px">
																					<article class="tg-post">																					
																						<figure style="height: 280px;width: 280px;"><a href="javascript:void(0);" style="height: 280px;width: 280px;"><img src="<?=base_url()?>/upload/authorpost/<?=$key->imageURL?>" alt="image description" style="height: 270px;width:270px;"></a></figure>
																							<div class="tg-postcontent">
																								
																								<div class="tg-posttitle">
																									<h3><?=$key->postData?></h3>
																								</div>
																								<ul class="tg-bookscategories">
																									<li><?=$key->postTime?></li>
																								</ul> 
																								<!-- <ul class="tg-postmetadata">
																									<li><a href="javascript:void(0);" class="commentlink" data-post-id="<?=$key->postID?>"><i class="fa fa-comment-o" style="font-size: 20px;"></i><i>Comment</i></a><a href="javascript:void(0)"><i>(View All 23456)</i></a></li>
																									<li><a href="javascript:void(0);"><i class="fa fa-thumbs-o-up" style="font-size: 20px;"></i><i>Like</i></a><a href="javascript:void(0)"><i>(View All 23456)</i></a></li>
																								</ul>
																								<div class="row" id="comment<?=$key->postID?>" hidden>
																										<input type="text" id="txtcomment<?=$key->postID?>" name="txtcomment" class="col-sm-10">
																										<button class="btn btn-success btn-round waves-effect waves-light col-sm-2 postcmnt" style="padding: 9px 0px;" data-post-id="<?=$key->postID?>">post</button>
																								</div> -->
																							</div>	

																						</article>
																						</div>																							
																					<?php
																				}
																				else
																				{
																					?>
																					<div class="col-xs-6 col-sm-12 col-md-6 col-lg-4" style="margin-right: 15px">
																					<article class="tg-post">	
																					<div class="card">
																							<div class="card-body">
																								<div class="tg-postcontent">
																									
																									<div class="tg-posttitle">
																										<h3><?=$key->postData?></h3>
																									</div>
																									<ul class="tg-bookscategories">
																										<li><?=$key->postTime?></li>
																									</ul> 
																									<!-- <ul class="tg-postmetadata">
																										<li><a href="javascript:void(0);" class="commentlink" data-post-id="<?=$key->postID?>"><i class="fa fa-comment-o" style="font-size: 20px;"></i><i>Comment</i></a><a href="javascript:void(0)"><i>(View All 23456)</i></a></li>
																										<li><a href="javascript:void(0);"><i class="fa fa-thumbs-o-up" style="font-size: 20px;"></i><i>Like</i></a><a href="javascript:void(0)"><i>(View All 23456)</i></a></li>
																									</ul>
																									<div class="row" id="comment<?=$key->postID?>" hidden>
																											<input type="text" id="txtcomment<?=$key->postID?>" name="txtcomment" class="col-sm-10">
																											<button class="btn btn-success btn-round waves-effect waves-light col-sm-2 postcmnt" style="padding: 9px 0px;" data-post-id="<?=$key->postID?>">post</button>
																									</div> -->
																								</div>																								
																							</div>
																						</div>
																					</article>
																					</div>
																																											
																					<?php
																				}
																			?>
																			
																		


																<?php
															}
														?>																
																<?php
															}
														?>
																												
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

									

						</div>
					</div>
				</div>
			</div>
			<!--************************************
					Author Detail End
			*************************************-->
		</main>
		  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modalTitle"></h4>
        </div>
        <div class="modal-body">
        	<img src="" id="modalimg" class="col-sm-12"><hr class="style-one">
<!--         	<h5 class="modal-title" id="modalsubTitle"></h5> -->
			
			<div id="modalbody" class="col-sm-12">	
			</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
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
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
	<script src="resources2/js/owl.carousel.min.js"></script>
	<script src="resources2/js/jquery.vide.min.js"></script>
	<script src="resources2/js/countdown.js"></script>
	<script src="resources2/js/jquery-ui.js"></script>
	<script src="resources2/js/parallax.js"></script>
	<script src="resources2/js/countTo.js"></script>
	<script src="resources2/js/appear.js"></script>
	<script src="resources2/js/gmap3.js"></script>

</body>
</html>
<script type="text/javascript">
	$("#btnlvs").click(function(){
			var f=$(this).data("flag");
			if(f==1)
			{
				$("#liveChat").html("");
				var res='<a id="btnlvs" href="'+"<?=site_url('brUser/AuthorC/stopLiveSession')?>"+'" data-flag="1"><span><button class="btn" style="background-color: red;color: #00ff00;">Stop Live Session</button></span></a>';
				$("#liveChat").html(res);

			}
		});
	<?php
	if($followStatus==0)
	{
		?>
			$("#Follow").show();
			$("#Unfollow").hide();
		<?php
	}
	else
	{
		?>
			$("#Follow").hide();
			$("#Unfollow").show();
		<?php	
	}
	?>
	$("#btnUnfollow").click(function(){
		var authorID="<?= $author->authorID?>";
		$.ajax({
			url:"<?= site_url("brUser/AuthorC/unfollowUser/");?>"+authorID,
			success:function(result)
			{
				$("#Follow").show();
				$("#Unfollow").hide();
			}

		});
	});

	$("#btnFollow").click(function(){
		var authorID="<?= $author->authorID?>";
		$.ajax({
			url:"<?= site_url("brUser/AuthorC/followUser/");?>"+authorID,
			success:function(result)
			{
				$("#Follow").hide();
				$("#Unfollow").show();
			}

		});
	});	
	$(".mdl").click(function(){
		$("#modalTitle").html($(this).data("blog-title"));
		$("#modalsubTitle").html($(this).data("blog-title"));
		$("#modalbody").html("<br><hr class='style-one'>" + $(this).data("blog-data"));
		$("#modalimg").attr("src","<?=base_url()?>/upload/authorblog/"+$(this).data("blog-img"));
	});
	$(".commentlink").click(function(){
		var pid=$(this).data("post-id");
		<?php
			foreach($authorposts as $key)
			{
				?>
				if(pid==<?=$key->postID?>)
				{
					//alert(<?=$key->postID?>);
					$("#comment<?=$key->postID?>").show();
				}
				<?php
			}
		?>
	});
	$(".postcmnt").click(function(){
		var pid=$(this).data("post-id");
		<?php
			foreach($authorposts as $key)
			{
				?>
				if(pid==<?=$key->postID?>)
				{
					
					var cmnt=$("#txtcomment<?=$key->postID?>").val();
					$.ajax({
						url:"<?= site_url("brUser/AuthorC/addComment/");?>"+pid+"/"+cmnt,
						success:function(result)
						{
							
						}

					});					
					
				}
				<?php
			}
		?>
	
	});
</script>
<!--
<script type="text/javascript">
	$(".btnChangeState").click(function(){
				var authorID=$(this).data("author-id");
				var status=$(this).data("follow-status");
				var state=$(this).html();
				  $.ajax({url: "<?=site_url('brUser/AuthorC/changeFollowState/')?>"+authorID, success: function(result){
				  }});
				  if(state=="Follow")
				  {
				  	$(this).html("Unfollow");
				  }				
				  else
				  {
				  	$(this).html("Follow");
				  }
			});

</script> -->