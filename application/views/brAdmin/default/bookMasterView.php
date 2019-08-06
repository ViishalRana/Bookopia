<?php
	$title="Books";
	$desc="this is the description of book";
	$link="<a href='".site_url('brAdmin/BookC/')."'>$title</a>";
	$date=date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?=$title?></title>

		<meta name="viewport" content="widp=device-widp, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<style type="text/css">
			.fa {
			font-size: 25px;
			}

			.checked {
			color: orange;
			}
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

							<div class="page-header card">
								<div class="row align-items-end">
									<div class="col-lg-8">
										<div class="page-header-title">
											<i class="feather icon-home bg-c-blue"></i>
											<div class="d-inline">
											<h5><?= $title?></h5>
											<span><?= $desc ?></span>
											</div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="page-header-breadcrumb">
											<ul class=" breadcrumb breadcrumb-title">
												<li class="breadcrumb-item">
												<a href="index.html"><i class="feather icon-home"></i></a>
												</li>
												<li class="breadcrumb-item"><?= $link ?> </li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						
							<!-- CB starts -->

							<div class="pcoded-inner-content">
								<div class="main-body">
									<div class="page-wrapper">
										<div class="page-body row">
											<div class="card col-sm-8" style="background-color: #D8D8D8;">
												<div class="card-header row">
	
												 
																<div class="col-md-12">
																	<ul class="list-view">
																		<li>
																			<div class="card list-view media">
																				<div class="card-block">
																					<div class="media">
																							<a class="media-left" href="#">
																							<img class="media-object card-list-img" src="<?= base_url();?>upload/<?= $bookdata->bookCoverImage?>" alt="Generic placeholder image" height="250" width="250">
																							</a>
																							<div class="media-body">
																							<div class="col-xs-12">
																							<h3><?=$bookdata->bookTitle?></h3>
																							</div>
																								<p class="card-text">Pages :
																								<?=$bookdata->bookPages?></p>
																								<p class="card-text">Edition :
																								<?=$bookdata->bookEdition?></p>
																								<p class="card-text">Publisher :
																								<span class="mytooltip tooltip-effect-5">
																								<span class="tooltip-item"><?=$bookdata->publisherName?></span>
																								<span class="tooltip-content clearfix">
																								<span class="tooltip-text">
																								<?=$bookdata->publisherEmail?><br>
																								Contact:<?=$bookdata->publisherContactNo?>
																								</span>
																								</span>
																								</span>
																								</p>
																								<p class="card-text">Synopsis :
																								<?=$bookdata->bookSynopsis?></p>
																								<p class="card-text">ISBN :
																								<?=$bookdata->bookISBN?></p>
																								<p class="card-text">Published Date :
																								<?=$bookdata->bookPublisherDate?></p>
																								<p>
																								Average Ratings :	
																								<?php
																									for($i=0;$i<$bookAvgRat->AvgRat;$i++) {
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
																									?><?=$bookAvgRat->AvgRat." "."Stars"?>
																								</p>
																						
																					</div>
																					
																				</div>
																			</div>
																		</li>
																		
																	</ul>														
																</div>												
												 															

												</div>
												<div class="row card-block">
													<div class="card-header">
														<h3 class="card-title">Reviews</h3>

													</div>
													<?php
														foreach ($bookreviews as $key) {
															if($key->userType=="User")
															{
																$img=$key->reviewerData->userPhoto;
																$name=$key->reviewerData->userFirstName." ".$key->reviewerData->userLastName;
															}
															else
															{
																$img=$key->reviewerData->authorPhoto;
																$name=$key->reviewerData->authorFirstName." ".$key->reviewerData->authorLastName;	
															}
															?>
																<div class="col-md-12">
																	<ul class="list-view">
																		<li>
																			<div class="card list-view media">
																				<div class="card-block">
																					<div class="media">
																							<a class="media-left" href="#">
																							<img class="media-object card-list-img" src="<?= base_url();?>upload/<?=$img?>" alt="Generic placeholder image" height="75" width="75">
																							</a>
																							<div class="media-body">
																							<div class="col-xs-12">
																							<h6 class="d-inline-block">
																								<?=$name?>
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
																								  		<input class="btnChangeReviewStat" type="checkbox" data-review-id="<?=$key->reviewID?>" <?=$stat?>>
																								  		<span class="slider"></span>
																								</label>
																							</div>			
																							 </p>
																					</div>
																					
																				</div>
																			</div>
																		</li>
																		
																	</ul>														
																</div>											

															<?php
														}
													?>
		
												</div>														
											</div>
											<div class="card col-sm-4 text-white card-inverse latest-update-card">
												<div class="card-header row">
													<div class="col-sm-6"><h3>Awards</h3></div>
													<div class="col-sm-6"><button type="button" class="btn waves-effect waves-light btn-grd-danger md-trigger" data-modal="modal-11" style="text-align: right;">Add Award</button></div>
												</div>
												<div class="card-body">
												
													<?php
														foreach ($bookawards as $key) {
														?>
														<div class="card" style="color: black;background-color: #BDC3C7;">
															<div class="card-header row">
																<div class="col-sm-6"><?=$key->awardName?></div>
																<?php
																if(isset($bookawards))
																{
																	$nd = $key->awardDate;

																	$createDate = new DateTime($nd);

																	$strip = $createDate->format('Y-m-d');
																	//echo $strip;
																}
																?>
																<div class="col-sm-6" style="text-align: right;"><button class="bedit btn btn-primary btn-round waves-effect waves-light" data-toggle="modal" data-target="#myModal" data-book-id="<?=$bookdata->bookID?>" data-award-id="<?=$key->awardID?>" data-award-name="<?=$key->awardName?>" data-award-title="<?=$key->title?>" data-award-date="<?=$strip?>" data-award-description="<?=$key->description?>"><i class="fa fa-edit"></i></button></div>
																<hr style="color: black;"></div>
															<div class="card-body">
															<h5 class="card-title"><?=$key->title?></h5>
															<div style="font-size: 12px;color:#727272;" >
															<?=$key->awardDate?>
															</div>
															<p class="card-text"><?=$key->description?></p>
															</div>
															</div>		
														<?php
														}
													?>
																								
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
<div class="md-modal md-effect-11" id="modal-11">
<div class="md-content">
<h3>Add Award</h3>
<div>
											<div class="card">
												<div class="card-block">

													<form enctype="multipart/form-data" action="<?=site_url("brAdmin/BookC/addAward/$bookdata->bookID")?>" id="formaddAuthor" method="post">

														<div class="form-group row">
														<label class="col-sm-4 col-form-label">Award Name</label>
														<div class="col-sm-7">
														<input type="text" name="txtawardName" class="form-control" placeholder="Enter Award Name">
														</div>
														</div>

														<div class="form-group row">
														<label class="col-sm-4 col-form-label">Award Title</label>
														<div class="col-sm-7">
														<input type="text" name="txttitle" class="form-control" placeholder="Enter Title">
														</div>
														</div>

														<div class="form-group row">
														<label class="col-sm-4 col-form-label">Award Description</label>
														<div class="col-sm-7">
														<textarea rows="5" cols="5" name="txtawardDescription" class="form-control" placeholder="Enter Description"></textarea>
														</div>
														</div>



														<div class="form-group row">
														<label class="col-sm-4 col-form-label">Date</label>
														<div class="col-sm-7">
															<input type="date" name="dtawardDate" class="form-control" placeholder="Enter Date" value="<?=$date?>">
														</div>
														</div>

														<div class="form-group row">
															<label class="col-sm-4 col-form-label"></label>
															<div class="col-sm-7">
																<input type="submit" class="form-control btn btn-inverse btn-round waves-effect waves-light" name="btnAdd" value="Add Award" id="btnAdd">
															</div>		
														</div>
														

													</form>													
												</div>
											</div>

<button type="button" class="btn btn-primary waves-effect md-close">Close</button>
</div>
</div>
</div>	
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Award</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
			<div class="card">
				<div class="card-block">

					<form enctype="multipart/form-data" action="" id="formeditAward" method="post">

						<div class="form-group row">
						<label class="col-sm-4 col-form-label">Award Name</label>
						<div class="col-sm-7">
						<input type="text" id="txtawardName" name="txtawardName" class="form-control" placeholder="Enter Award Name">
						</div>
						</div>

						<div class="form-group row">
						<label class="col-sm-4 col-form-label">Award Title</label>
						<div class="col-sm-7">
						<input type="text" id="txttitle" name="txttitle" class="form-control" placeholder="Enter Title">
						</div>
						</div>

						<div class="form-group row">
						<label class="col-sm-4 col-form-label">Award Description</label>
						<div class="col-sm-7">
						<textarea id="txtawardDescription" rows="5" cols="5" name="txtawardDescription" class="form-control" placeholder="Enter Description"></textarea>
						</div>
						</div>



						<div class="form-group row">
						<label class="col-sm-4 col-form-label">Date</label>
						<div class="col-sm-7">
							<input id="dtawardDate" type="date" name="dtawardDate" class="form-control" placeholder="Enter Date" value="<?=$date?>">
						</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label"></label>
							<div class="col-sm-7">
								<input type="submit" class="form-control btn btn-inverse btn-round waves-effect waves-light" name="btnEdit" value="Edit Award" id="btnEdit">
							</div>		
						</div>
						

					</form>													
				</div>
			</div>
      </div>

      <!-- Modal footer -->


    </div>
  </div>
</div>		
		<?php include_once('Bottom.php') ?>
		<script type="text/javascript">
			$(".bedit").click(function(){
				var bookID=$(this).data("book-id");
				var awardID=$(this).data("award-id");
				var awardName=$(this).data("award-name");
				var title=$(this).data("award-title");
				var date=$(this).data("award-date");
				var description=$(this).data("award-description");
				$("#txtawardName").val(awardName);
				$("#txttitle").val(title);
				$("#dtawardDate").val(date);
				$("#txtawardDescription").html(description);
				$("#formeditAward").attr("action","<?=site_url('brAdmin/BookC/editAward/')?>"+awardID+"/"+bookID);
			});
			$(".btnChangeStat").click(function(){
				var reviewID=$(this).data("review-id");
				var status=$(this).data("review-status");
				var stat=$(this).html();
				  $.ajax({url: "<?=site_url('brAdmin/BookC/changeReviewStat/')?>"+reviewID, success: function(result){
				  }});
				  if(stat=="Enabled")
				  {
				  	$(this).html("Disabled");
				  }				
				  else
				  {
				  	$(this).html("Enabled");
				  }
			});
$(".btnChangeReviewStat").change(function(){
	var blogID=$(this).data("review-id");
	//var status=$(this).data("review-status");
	//var stat=$(this).val();
	 // alert($(this).val())
	// alert(1);
	  $.ajax({url: "<?=site_url('brAdmin/AuthorC/changeReviewStat/')?>"+blogID, success: function(result){
	  }});

});		</script>

	</body>
</html>
