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
	
	</style>
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
				Home Slider Start
		*************************************-->
		<!--************************************
				Home Slider End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		
		<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="resources2/images/parallax/bgparallax-07.jpg">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-innerbannercontent">
									<h1>Forums</h1>
									<ol class="tg-breadcrumb">
										<li><a href="<?=site_url("brUser/HomeC/")?>">Home</a></li>
										<li class="tg-active">Forums</li>
									</ol>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>

<main id="tg-main" class="tg-main tg-haslayout" style="background-color: white;">				
				<div class="container" style="margin-top: 20px;">
					<div class="row">
							
						<div class="" align="center">
							<button class="btn " type="button" data-toggle="modal" data-target="#forumModal"><i class="fa fa-plus"></i></button><h5>Cretae New Forum</h5>
							
						</div>					
					</div>
				</div>

				<div class="forum-details row" style="text-align: center;">
				<?php
					$i=1;
					foreach($forumdata as $key)
					{
						if($i%2==0)
						{
							$t=" background-color: #e8e8e8;";
						}
						else
						{
							$t="";
						}
						?>
						<div class="row" style="padding: 20px;<?=$t?>">
							<div class="col-sm-6" style="font-size: 20px;color: black;border: 2px;padding: 10px;"><a href="<?=site_url('brUser/ForumC/forumDetail/').$key->forumID?>" style="font-size: 16px;"><?=$key->forumName?></a></div>
							<div class="col-sm-6 row" id="forumContainer">
								<?php
									foreach($key->creatorData as $key1)
									{
										?>
											<div class="col-sm-4" style="font-size: 14px;">
												<?php
													if($key->creatorType=="Author")
													{
														$src=base_url("upload/").$key1->authorPhoto;
														$name=$key1->authorFirstName." ".$key1->authorLastName;
														$href=site_url('brUser/AuthorC/authorInfo/').$key->creatorID;
													}
													else
													{
														$src=base_url("upload/").$key1->userPhoto;
														$name=$key1->userFirstName." ".$key1->userLastName;	
														$href="javascript:void(0)";
													}
												?>
												Created By : <img src="<?=$src?>" style="height: 40px;width: 40px;"><a href="<?=$href?>"><?=$name?></a>
											</div>
											<div class="col-sm-4" style="font-size: 16px;">
												<i class="fa fa-comment-o"></i> <?=$key->reviewsCount?>
											</div>										
										<?php
									}
								?>
								<div class="col-sm-4" style="font-size: 16px;">
															<?php
																	$nd = $key->createdDate;

																	$createDate = new DateTime($nd);

																	$strip = $createDate->format('Y-m-d');
																	//echo $strip;
																?>														

									<i class="fa fa-clock-o"></i><?=$strip?>
								</div>
							</div>
						</div>
						<?php
						$i++;
					}
				?>
			</div>
<div id="forumModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Start Forum</h4>
      </div>
      <div class="modal-body">
      	<form method="post" action="<?=site_url('brUser/ForumC/createForum')?>">
      		<table align="center" cellspacing="5">
      			<tr>
      				<td style="font-size: 16px;">Forum Topic:</td>
      				<td><textarea name="txtforumtopic" placeholder="Enter Topic..." cols="30" rows="6" required></textarea></td>
      			</tr>
      			<tr>
      				<td></td>
      				<td>
      					<button class="btn btn-success" type="submit" id="#createForumButton">Start Forum</button>
      				</td>
      			</tr>
      		</table>	
      	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>			

			<!--************************************
					All Status Start
			*************************************-->
			<!--************************************
					All Status End
			*************************************-->
			<!--************************************
					Best Selling Start
			*************************************-->
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
			<!--************************************
					New Release End
			*************************************-->
			<!--************************************
					Collection Count Start
			*************************************-->
			<!--************************************
					Collection Count End
			*************************************-->
			<!--************************************
					Picked By Author Start
			*************************************-->
			<!--************************************
					Picked By Author End
			*************************************-->
			<!--************************************
					Testimonials Start
			*************************************-->
			<!--************************************
					Testimonials End
			*************************************-->
			<!--************************************
					Authors Start
			*************************************-->
			<!--************************************
					Authors End
			*************************************-->
			<!--************************************
					Call to Action Start
			*************************************-->
			<!--************************************
					Call to Action End
			*************************************-->
			<!--************************************
					Latest News Start
			*************************************-->
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
	<script src="resources2/js/dropzone.js"></script>
	<script type="text/javascript">
		$(".linkReadList").click(function(){
			//	alert($(this).html());
			$(this).html("<span>Added to ReadList</span>");
			  $.ajax({url: '<?=site_url("brUser/HomeC/addToReadList/")?>'+$(this).data("id"), success: function(result){
			  }});			
		});
	</script>
	
</body>

<!-- Mirrored from exprostudio.com/html/book_library/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Apr 2019 12:11:23 GMT -->
</html>
