<?php
	$title="Add Author";
	$desc="Add an Author";
	$link="<a href='".site_url('brAdmin/AuthorC/')."'>Authors</a>";
	$sublink="<a href='".site_url('brAdmin/AuthorC/addAuthor')."'>AddAuthor</a>";
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
												<a href="<?=site_url("brAdmin/BookC/")?>"><i class="feather icon-home"></i></a>
												</li>
												<li class="breadcrumb-item"><?= $link ?> </li>
												<li class="breadcrumb-item"><?=$sublink?></li>
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
													<h4 class="sub-title">Author Detail</h4>
												</div>
												<div class="card-block">

													<form enctype="multipart/form-data" action="<?=site_url("brAdmin/AuthorC/addAuthor")?>" id="formaddAuthor" method="post">

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Author Alias</label>
														<div class="col-sm-10">
														<input type="text" name="txtauthorAlias" class="form-control" placeholder="Enter Alias">
														</div>
														</div>

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Author Firstname</label>
														<div class="col-sm-10">
														<input type="text" name="txtauthorFirstName" class="form-control" placeholder="Enter First Name">
														</div>
														</div>

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Author Lastname</label>
														<div class="col-sm-10">
														<input type="text" name="txtauthorLastName" class="form-control" placeholder="Enter Last Name">
														</div>
														</div>



														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Profile Status</label>
														<div class="col-sm-10">
															<input type="checkbox" class="js-single" id="chkprofileStatus" name="chkprofileStatus"/>
														</div>
														</div>

														<div id="profileDetails">
														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Author Email</label>
														<div class="col-sm-10">
														<input type="text" name="txtauthorEmail" class="form-control" placeholder="Enter First Name">
														</div>
														</div>

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Author Password</label>
														<div class="col-sm-10">
														<input type="password" name="txtauthorPassword" class="form-control" placeholder="Enter Last Name">
														</div>
														</div>

															<div class="form-group row">
															<label class="col-sm-2 col-form-label">Author Bdate</label>
															<div class="col-sm-10">
															<input type="date" name="dtauthorBdate" class="form-control" placeholder="Enter Birth date" value="<?=$date?>">
															</div>
															</div>

															<div class="form-group row">
																<label class="col-sm-2 col-form-label">Author Gender</label>
																<div class="form-radio col-sm-10">
																	<div class="radio radio-inline">
																		<label>
																		<input type="radio" name="radGender" value="Male" checked="checked">
																		<i class="helper"></i>Male
																		</label>
																	</div>
																	<div class="radio radio-inline">
																		<label>
																		<input type="radio" name="radGender" value="Female">
																		<i class="helper"></i>Female
																		</label>
																	</div>
																</div>															
															</div>
															<div class="form-group row">
																<label class="col-sm-2 col-form-label">Author Bio</label>
																<div class="col-sm-10">
																<textarea rows="5" cols="5" name="txtauthorBio" class="form-control" placeholder="Enter Author Bio"></textarea>
																</div>
															</div>	
															
															<div class="form-group row">
																 <label class="col-sm-2 col-form-label">Author Profile Image</label>
															<div class="col-sm-10">
															<input type="file" name="imgauthorProfilePhoto" class="form-control">
															</div>
															</div>

															<div class="form-group row">
																<label class="col-sm-2 col-form-label">Select Country</label>
															<div class="col-sm-10 row">
																<select name="lstCountry" class="form-control form-control-primary fill col-sm-4" id="lstCountry">
																	<option value="0">Select Country</option>
																	<?php
																		foreach ($countries as $key) {
																			# code...
																			?>
																			<option value="<?=$key->countryID?>"><?=$key->countryName?></option>
																			<?php
																		}
																	?>
																</select>
																<select name="lstState" id="lstState" class="form-control form-control-primary fill col-sm-4">
																	<option value="0">Select State</option>
																</select>															
																<select name="lstCity" id="lstCity" class="form-control form-control-primary fill col-sm-4">
																	<option value="0">Select City</option>
																</select>															
															</div>
															</div>

															<div class="form-group row">
															<label class="col-sm-2 col-form-label">Account Created Date</label>
															<div class="col-sm-10">
															<input type="date" name="dtaccountCreatedDate" class="form-control" placeholder="Enter Birth date" value="<?=$date?>">
															</div>
															</div>
														
														</div>
														<div class="form-group row">
															<label class="col-sm-2 col-form-label"></label>
															<div class="col-sm-10">
																<input type="submit" class="form-control btn btn-inverse btn-round waves-effect waves-light" name="btnAdd" value="Add Author" id="btnAdd">
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
			$("document").ready(function(){
				$("#profileDetails").hide();
			});
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
			$("#chkprofileStatus").change(function(){
				if($(this).is(':checked'))
				{
					$("#profileDetails").show();
				}
				else
				{					
					$("#profileDetails").hide();
				}
			});

		</script>

	</body>
</html>
