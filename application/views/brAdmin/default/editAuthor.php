<?php
	$title="Edit Author";
	$desc="Edit an Author";
	$link="<a href='".site_url('brAdmin/AuthorC/')."'>Authors</a>";
	$date=date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?=$title?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		
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
										<div class="page-body">
											<!-- content start -->
											<div class="card">
												<div class="card-header">
													<h4 class="sub-title">Edit Author</h4>
													<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Books</button>
												<div id="myModal" class="modal fade" role="dialog">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title">Add Books</h4>
																<button type="button" class="close" data-dismiss="modal" id="modalClose">&times;</button>
															</div>
															<div class="modal-body" id="mb">
																<form method="post" action="<?=site_url("brAdmin/AuthorC/addAuthorBook/").$authordata->authorID?>" enctype="multipart/form-data" id="genreForm">
																	<div class="form-group row">
																		<label class="col-sm-12 col-form-label">Book List</label>

																	<div class="form-group row">
																		<label class="col-sm-12 col-form-label"></label>
																		<div class="col-sm-12">
																			<input class="btn btn-inverse btn-round waves-effect waves-light col-md-12" type="submit" name="btnAdd" value="Add Books" id="btnsubmit">
																		</div>
																	</div>
																		<input type="text" name="txtsearch" id="sb" placeholder="Search Books by title or ISBN" class="form-control col-sm-12">
																		<div class="col-sm-12 row" id="bookList">
																		<?php
																			foreach ($bookdata as $key) {
																				?>
																				<label class="col-sm-6 col-form-label"><?=$key->bookTitle?></label>
																				<label class="col-sm-6 col-form-label">ISBN:<?=$key->bookISBN?>  <input type="checkbox" class="" name="chkBook[]" value="<?=$key->bookID?>"></label>

																				
																				<?php
																			}
																		?>
																		</div>
																	</div>
			     		
																</form>
															</div>
														</div>
													</div>
												</div>
												</div>
												<div class="card-block">
													<?php
														if(isset($authordata->authorID))
															$action=site_url("brAdmin/AuthorC/editAuthor/$authordata->authorID");
														else
															$action="";
													?>
													<form enctype="multipart/form-data" action="<?=$action?>" id="formaddAuthor" method="post">

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Author Alias</label>
														<div class="col-sm-10">
														<input type="text" name="txtauthorAlias" class="form-control" placeholder="Enter Alias" value="<?php if(isset($authordata->authorAlias))echo $authordata->authorAlias?>">
														</div>
														</div>

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Author Firstname</label>
														<div class="col-sm-10">
														<input type="text" name="txtauthorFirstName" class="form-control" placeholder="Enter First Name" value="<?php if(isset($authordata->authorFirstName))echo $authordata->authorFirstName?>">
														</div>
														</div>

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Author Lastname</label>
														<div class="col-sm-10">
														<input type="text" name="txtauthorLastName" class="form-control" placeholder="Enter Last Name" value="<?php if(isset($authordata->authorLastName))echo $authordata->authorLastName?>">
														</div>
														</div>



														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Profile Status</label>
														<div class="col-sm-10">
															<input type="checkbox" class="js-single" id="chkprofileStatus" name="chkprofileStatus" <?php if(isset($authordata->status)){if($authordata->status==1)echo "checked";}?>/>
														</div>
														</div>

														<div id="profileDetails">

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Author Email</label>
														<div class="col-sm-10">
														<input type="text" name="txtauthorEmail" class="form-control" placeholder="Enter Email" value="<?php if(isset($authordata->authorEmail)){echo $authordata->authorEmail;}?>">
														</div>
														</div>

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Author Password</label>
														<div class="col-sm-10">
														<input type="password" name="txtauthorPassword" class="form-control" placeholder="Enter Password" value="<?php if(isset($authordata->authorPassword)){echo $authordata->authorPassword;}?>">
														</div>
														</div>
															<?php
																if(isset($authordata->authorBdate))
																{
																	$nd = $authordata->authorBdate;

																	$createDate = new DateTime($nd);

																	$strip = $createDate->format('Y-m-d');
																	//echo $strip;
																}
																?>														

															<div class="form-group row">
															<label class="col-sm-2 col-form-label">Author Bdate</label>
															<div class="col-sm-10">
															<input type="date" name="dtauthorBdate" class="form-control" placeholder="Enter Birth date" value="<?php if(isset($authordata->authorBdate))echo $strip; else echo $date;?>">
															</div>
															</div>

															<div class="form-group row">
																<label class="col-sm-2 col-form-label">Author Gender</label>
																<div class="form-radio col-sm-10">
																	<div class="radio radio-inline">
																		<label>
																		<input type="radio" name="radGender" value="Male" <?php if(isset($authordata->authorGender)){if($authordata->authorGender=="Male")echo "checked";}?>>
																		<i class="helper"></i>Male
																		</label>
																	</div>
																	<div class="radio radio-inline">
																		<label>
																		<input type="radio" name="radGender" value="Female" <?php if(isset($authordata->authorGender)){if($authordata->authorGender=="Female")echo "checked";}?>>
																		<i class="helper"></i>Female
																		</label>
																	</div>
																</div>															
															</div>
															<div class="form-group row">
																<label class="col-sm-2 col-form-label">Author Bio</label>
																<div class="col-sm-10">
																<textarea rows="5" cols="5" name="txtauthorBio" class="form-control" placeholder="Enter Author Bio"><?php if(isset($authordata->authorBio))echo $authordata->authorBio;?></textarea>
																</div>
															</div>	
															
															<div class="form-group row">
																 <label class="col-sm-2 col-form-label">Author Profile Image</label>
															<div class="col-sm-10">
															<input type="file" name="imgauthorProfilePhoto" class="form-control">
															<?php
																if(isset($authordata->authorPhoto))
																{
																	?>
																	<img src="<?= base_url();?>upload/<?= $authordata->authorPhoto?>" height="100" width="100">
																	<?php
																}
															?>
															</div>
															</div>

															<div class="form-group row">
																<label class="col-sm-2 col-form-label">Select Country</label>
															<div class="col-sm-10 row">
																<select name="lstCountry" class="form-control form-control-primary fill col-sm-4" id="lstCountry">
																	<option value="-1">Select Country</option>
																	<?php
																		foreach ($countries as $key) {
																			# code...
																			?>
																			<option value="<?=$key->countryID?>" <?php if(isset($authordata->countryID)){if($authordata->countryID==$key->countryID)echo "selected";}?>><?=$key->countryName?></option>
																			<?php
																		}
																	?>
																</select>
																<select name="lstState" id="lstState" class="form-control form-control-primary fill col-sm-4">
																	<option value="-1">Select State</option>
																	<?php
																		if(isset($authordata->stateID))
																		{
																			foreach($states as $key)
																			{
																				if($key->countryID==$authordata->countryID)
																				{
																					?>
																					<option value="<?=$key->stateID?>" <?php if($authordata->stateID==$key->stateID)echo "selected"?>><?=$key->stateName?></option>
																					<?php
																				}
																			}
																		}
																	?>
																</select>															
																<select name="lstCity" id="lstCity" class="form-control form-control-primary fill col-sm-4">
																	<option value="-1">Select City</option>
																	<?php
																	if(isset($authordata->stateID))
																	{
																		foreach ($cities as $key) {
																			if($key->stateID==$authordata->stateID)
																			{
																				?>
																				<option value="<?=$key->cityID?>" <?php if($authordata->authorCityID==$key->cityID)echo "selected";?>><?=$key->cityName?></option>
																				<?php
																			}
																		}
																	}
																	?>
																</select>															
															</div>
															</div>
															<?php
																if(isset($authordata->accountCreatedDate))
																{
																	$nd = $authordata->accountCreatedDate;

																	$createDate = new DateTime($nd);

																	$strip = $createDate->format('Y-m-d');
																	//echo $strip;
																}
																?>	
															<div class="form-group row">
															<label class="col-sm-2 col-form-label">Account Created Date</label>
															<div class="col-sm-10">
															<input type="date" name="dtaccountCreatedDate" class="form-control" placeholder="Enter Birth date" value="<?php if(isset($authordata->accountCreatedDate))echo $strip;else echo $date;?>">
															</div>
															</div>
														
														</div>
														<div class="form-group row">
															<label class="col-sm-2 col-form-label"></label>
															<div class="col-sm-10">
																<input type="submit" class="form-control btn btn-inverse btn-round waves-effect waves-light" name="btnEdit" value="Edit Author" id="btnEdit">
															</div>		
														</div>
														

													</form>													
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
		<script type="text/javascript">

			$("#lstCountry").change(function(){
				$("#lstState").html("<option value='-1'>Select State</option>");
				$("#lstCity").html("<option value='-1'>Select City</option>");				
				var countryID=$(this).val();
				  $.ajax({url: "<?=site_url("brAdmin/StateC/fillStates/")?>"+countryID, success: function(result){
				    $("#lstState").html(result);
				  }});
			});
			$("#lstState").change(function(){
				$("#lstCity").html("<option value='-1'>Select City</option>");				
				var stateID=$(this).val();
				  $.ajax({url: "<?=site_url("brAdmin/CityC/fillCities/")?>"+stateID, success: function(result){
				    $("#lstCity").html(result);
				  }});

			});
			$("#sb").keyup(function(){
				var srs=$(this).val();
				srs=encodeURIComponent(srs);
				$.ajax({url:"<?=site_url("brAdmin/AuthorC/searchBooks/")?>"+srs,success:function(result){
					var bookdata=JSON.parse(result);
						/*alert(result);*/
					$("#bookList").html("");
					var res="";
					$.each(bookdata,function(idx,obj){
						res+='<label class="col-sm-6 col-form-label">'+obj.bookTitle+'</label>';
						res+='<label class="col-sm-6 col-form-label">ISBN:'+obj.bookISBN+'  <input type="checkbox" class="" name="chkBook[]" value="'+obj.bookID+'"></label>';
						$("#bookList").append(res);
					});
				}});
			});


		</script>

	</body>
</html>