<?php
$title="Manage Profile";
$desc="This is the description of Profile";
$link="<a href='".site_url('brAdmin/ProfileC/')."'>$title</a>";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?=$title?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<base href="<?=base_url()?>">
		<link rel="stylesheet" type="text/css" href="resources/bower_components/sweetalert/css/sweetalert.css">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<style type="text/css">
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}	
input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}		
		</style>
		
		<?php include_once('topscript.php'); ?>
	</head>
	<body>
		<div class="loader-bg">
			<div class="loader-bar"></div>
		</div>
		<div id="pcoded" class="pcoded">
			<div class="pcoded-overlay-box"></div>
			<div class="pcoded-container navbar-wrapper">
				<?php include_once('nav.php');?>
				<div class="pcoded-main-container">
					<div class="pcoded-wrapper">
						<?php include_once('sidebar.php') ?>
						<div class="pcoded-content">

						
							<!-- CB starts -->
							<div class="pcoded-inner-content">
								<div class="main-body">
									<div class="page-wrapper">
										<div class="page-body">
											<!-- content start -->
											<div class="card">
												
												<div class="card-block tab-icon">

													<div class="row">
														<div class="col-lg-12 col-xl-12">
															<ul class="nav nav-tabs md-tabs " role="tablist">
																<li class="nav-item">
																	<a class="nav-link active" data-toggle="tab" href="#home" role="tab">Home</a>
																	<div class="slide"></div>
																</li>
																<li class="nav-item">
																	<a class="nav-link" data-toggle="tab" href="#books" role="tab">Books</a>
																	<div class="slide"></div>
																</li>
																<li class="nav-item">
																	<a class="nav-link" data-toggle="tab" href="#blogs" role="tab">Blogs</a>
																	<div class="slide"></div>
																</li>
																<li class="nav-item">
																	<a class="nav-link" data-toggle="tab" href="#posts" role="tab">Posts</a>
																	<div class="slide"></div>
																</li>
																<li class="nav-item">
																	<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews</a>
																	<div class="slide"></div>
																</li>
																<li class="nav-item">
																	<a class="nav-link" data-toggle="tab" href="#ratedbooks" role="tab">Rated Books</a>
																	<div class="slide"></div>
																</li>
																
															</ul>

															<div class="tab-content card-block">

																<div class="tab-pane active" id="home" role="tabpanel">
																	<div class="card row" style="background-color: #E1E7E9;">
																		<div class="card-block row">
																			<div class="col-sm-5" align="center">
																				<img src="<?=base_url()?>/upload/<?=$authordata->authorPhoto?>" class="rounded-circle" height="200" width="200">

																			</div>	
																			<div class="col-sm-7">
																				<table style="font-size: 16px;" cellpadding="10" cellspacing="5">
																					<tr>
																						<td>Author Alias :</td>
																						<td>
																							<?=$authordata->authorAlias?>
																						</td>
																					</tr>
																					
																					<tr>
																						<td>Author First Name :</td>
																						<td>
																							<?=$authordata->authorFirstName?>
																						</td>
																					</tr>
																					<tr>
																						<td>Author Last Name :</td>
																						<td>
																							<?=$authordata->authorLastName?>
																						</td>
																					</tr>
																					<tr>
																						<td>Author Email :</td>
																						<td>
																							<?=$authordata->authorEmail?>
																						</td>
																					</tr>
																					<tr>
																						<td>Author Bdate :</td>
																						<td><?=$authordata->authorBdate?></td>
																					</tr>
																					<tr>
																						<td>Author Gender :</td>
																						<td>
																							<?=$authordata->authorGender?>
																						</td>
																					</tr>
																					<tr>
																						<td>Author Bio :</td>
																						<td><?=$authordata->authorBio?></td>
																					</tr>
																					<!-- <tr>
																						<td>Author City :</td>
																						<td><?=$authordata->cityName?></td>
																					</tr>
																					<tr>
																						<td>Author State :</td>
																						<td><?=$authordata->stateName?></td>
																					</tr>
																					<tr>
																						<td>Author Country :</td>
																						<td><?=$authordata->countryName?></td>
																					</tr> -->
																					<tr>
																						<td>Profile Status :</td>
																						<td><?=$authordata->status?></td>
																					</tr>
																					
																				</table>
																				
																				
																			</div>	
																																					
																		</div>
																	</div>

																</div>


																<base href="<?=base_url()?>">
																<div class="tab-pane" id="books" role="tabpanel">
																	<div class="row">
																	<?php
																		foreach ($authorbookdata as $key) {
																			?>
																			
																			<div class="card z-depth-top-3 col-sm-4" style="background-color: #E1E7E9;">
																				<div class="card-block row">
																					<div class="col-sm-12" align="center"><a href="<?=site_url("brAdmin/BookC/bookMasterView/$key->bookID")?>"><img src="<?=base_url()?>/upload/<?=$key->bookCoverImage?>" class="col-sm-12"></a>
																					</div>
																					<div class="col-sm-12">
																						<table align="center">
																							<thead>
																								<tr><th style="text-align: center;"><h4><a href="<?=site_url("brAdmin/BookC/bookMasterView/$key->bookID")?>"><?=$key->bookTitle?>(Edition <?=$key->bookEdition?>)</a></h4></th></tr>
																								<tr><th style="text-align: center;"><a href="<?=site_url("brAdmin/BookC/editBook/$key->bookID")?>"><i class="fa fa-edit"></i></a>
																									<a href="<?=site_url("brAdmin/BookC/deleteBook/$key->bookID")?>"><i class="fa fa-trash"></i></a></th></tr>
																							</thead>
																						</table>
																					</div>
																				</div>
																			</div>
																			<?php
																		}
																	?>
																	</div>
																</div>


																<div class="tab-pane" id="blogs" role="tabpanel">
																	<ul class="list-view">
																		<?php
																			foreach ($authorblogsdata as $key) {
																				?>
																				<li>
																					<div class="card list-view-media" style="background-color: #E1E7E9;">
																						<div class="card-block">
																							<div class="media">
																								<img class="media-left media-object card-list-img" src="<?=base_url()?>/upload/authorblog/<?=$key->image?>" alt="Blog Image" height="200" width="300">
																								
																								
																								<div class="media-body">
																									<div class="col-xs-12">
																										<h3><?=$key->blogTitle?></h3>
																									</div>

																									<div class="f-13 text-muted m-b-15">
																									<?=$key->blogDateTime?>
																									</div>																
																									<div>
																									<label class="switch">
																										<?php
																											if($key->status==1)
																											{
																												$stat="checked";
																											}
																											else
																											{
																												$stat="";
																											}
																										?>
																								  		<input class="btnChangeStat" type="checkbox" data-blog-id="<?=$key->blogID?>" <?=$stat?>>
																								  		<span class="slider"></span>
																										</label>&nbsp;&nbsp;
																										<a href=""><i class="fa fa-heart"></i>101 Likes</a>&nbsp;&nbsp;
																							 	<a href=""><i class="fa fa-commenting"></i>11 Comments</a>
																									</div>						
																									<div>
																										<?=$key->blog?>
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</li>
																				<?php
																			}
																		?>
																	</ul>
																</div>
																<div class="tab-pane" id="posts" role="tabpanel">
																	<div class="row">
																	<?php
																		foreach ($authorpostsdata as $key) {
																			?>
																			<div class="card col-sm-3" style="background-color: #E1E7E9;">
																				<div class="card-block">
																					<?php
																						if($key->imageURL!="")
																						{
																							?>
																							<div align="center">
																								<img src="<?=base_url()?>/upload/authorpost/<?=$key->imageURL?>" class="col-sm-12">
																							</div>
																							<div>
																								<?=$key->postData?>
																							</div>
																							<div class="text-muted">
																								<?=$key->postDate?>
																							</div>
																							<div>
																								<label class="switch">
																										<?php
																											if($key->status==1)
																											{
																												$stat="checked";
																											}
																											else
																											{
																												$stat="";
																											}
																										?>
																								  		<input class="changePostStat" type="checkbox" data-post-id="<?=$key->postID?>" <?=$stat?>>
																								  		<span class="slider"></span>
																								</label>
																							</div>
																							<div>
																								<a href=""><i class="fa fa-heart"></i>101 Likes</a>&nbsp;&nbsp;
																							 	<a href=""><i class="fa fa-commenting"></i>11 Comments</a>
																							</div>
																							<?php
																						}
																						else
																						{
																							?>
																							<div><?=$key->postData?></div>
																							<div class="text-muted">
																								<?=$key->postDate?>
																							</div>
																							<div>
																								<a href=""><i class="fa fa-heart"></i>101 Likes</a>&nbsp;&nbsp;
																							 	<a href=""><i class="fa fa-commenting"></i>11 Comments</a>
																							</div>
																							<div>
																								<label class="switch">
																										<?php
																											if($key->status==1)
																											{
																												$stat="checked";
																											}
																											else
																											{
																												$stat="";
																											}
																										?>
																								  		<input class="changePostStat" type="checkbox" data-post-id="<?=$key->postID?>" <?=$stat?>>
																								  		<span class="slider"></span>
																								</label>
																							</div>
																							<?php
																						}
																					?>
																				</div>																				
																			</div>
																			<?php
																		}
																	?>
																	</div>
																	
																</div>
																<div class="tab-pane" id="reviews" role="tabpanel">
																	<?php
																		foreach ($authorreviewsdata as $key) {
																			?>
																	<ul class="list-view">
																		<li>
																			<div class="card list-view media" style="background-color: #E1E7E9;">
																				<div class="card-block">
																					<div class="media">
																							<a class="media-left" href="#">
																							<img class="media-object card-list-img" src="<?= base_url();?>upload/<?=$key->bookCoverImage?>" alt="Generic placeholder image" height="75" width="75">
																							</a>
																							<div class="media-body">
																							<div class="col-xs-12">
																							<h6 class="d-inline-block">
																								<?=$key->bookTitle?>
																							</h6>
																							<div class="f-13 text-muted m-b-15">
																							<?=$key->dateTime?>
																							</div>
																							</div>
																							 <p>
																							 	<?=$key->reviewData?>
																							 </p>
																							 <p>
																							 	<a href=""><i class="fa fa-heart"></i> 101 Likes</a>&nbsp;&nbsp;
																							 	<a href=""><i class="fa fa-commenting"></i> 11 Comments</a>&nbsp;&nbsp;
																							 	<?php
																							 		if($key->status==1)
																							 		{
																							 			$stat="checked";
																							 		}
																							 		else
																							 		{
																							 			$stat="";
																							 		}
																							 	?>
																								<label class="switch">
																								  <input class="btnChangeReviewStat" type="checkbox" data-review-id="<?=$key->reviewID?>" <?=$stat?>>
																								  <span class="slider"></span>
																								</label>
																							 </p>
																					</div>
																					
																				</div>
																			</div>
																		</li>
																		
																	</ul>																			
																			<?php
																		}
																	?>																	
																	
																</div>
																<div class="tab-pane" id="ratedbooks" role="tabpanel">
																	
																</div>																
															</div>

														</div>
													</div>						
												</div>
											</div>
											<!-- content end -->
										</div>
									</div>
								</div>
							</div>
							<!-- CB Ends -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include_once('Bottom.php') ?>
<script type="text/javascript" src="resources/bower_components/sweetalert/js/sweetalert.min.js"></script>

	</body>
</html>
<script>

	$("#oldpass").keyup(function(){
		var y=$("#oldpass").val();
		/*$.ajax({
			url : "<?= site_url("brAdmin/ProfileC/changePass/
		")?>"+y,
			success: function(result){
			$("#res").html(result);
			}
		});*/
		$.ajax({
                url:"<?=site_url("brAdmin/ProfileC/changePass/")?>"+y,
                type:'post',
                success: function(data){
                	$("#oldp").html(data);
                	if(data=='Password is not correct')
                	{
                		$("#btnchange").hide();
                	}
                	else
                	{
                		$("#btnchange").show();	
                	}
                }
        });
	});



$(".btnChangeStat").change(function(){
	var blogID=$(this).data("blog-id");
	//var status=$(this).data("review-status");
	//var stat=$(this).val();
	 // alert($(this).val())
	// alert(1);
	  $.ajax({url: "<?=site_url('brAdmin/AuthorC/changeBlogStat/')?>"+blogID, success: function(result){
	  }});

});

$(".btnChangeReviewStat").change(function(){
	var blogID=$(this).data("review-id");
	//var status=$(this).data("review-status");
	//var stat=$(this).val();
	 // alert($(this).val())
	// alert(1);
	  $.ajax({url: "<?=site_url('brAdmin/AuthorC/changeReviewStat/')?>"+blogID, success: function(result){
	  }});

});
$(".changePostStat").change(function(){
	var postID=$(this).data("post-id");
	//var status=$(this).data("review-status");
	//var stat=$(this).val();
	 // alert($(this).val())
	// alert(1);
	  $.ajax({url: "<?=site_url('brAdmin/AuthorC/changePostStat/')?>"+postID, success: function(result){
	  }});

});



  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');

</script>

