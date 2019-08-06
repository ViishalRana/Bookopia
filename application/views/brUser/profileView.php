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
<!-- 	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
-->
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<base href="<?=base_url();?>">
<link rel="stylesheet" type="text/css" href="resources/bower_components/sweetalert/css/sweetalert.css">
<?php include_once("topscript.php")?>

<style type="text/css">
	.formData{
		margin: 10px;
	}
</style>
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
									<h1>Manage Profile</h1>
									<ol class="tg-breadcrumb">
										<li><a href="<?=site_url("brUser/HomeC/")?>">home</a></li>
										<li class="tg-active">Manage Profile</li>
										<!-- <li class="tg-active">Genre Books</li> -->
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

					<div class="container">
						<h2>Manage Profile</h2>
						<br>
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#home">Manage Details</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#menu1">Change Profile Photo</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#menu2">Change Password</a>
							</li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<div id="home" class="container tab-pane active"><br>
								<div class="row">
									<div class="col-md-5">
										<span style="font-size: 24px;">Manage Details</span>
									</div>
									<div class="col-md-7" align="right">
										<a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i><span>Change Data</span></a>										
									</div>
								</div>

								<div class="row">

									<!-- </span> -->
									<!-- <div class="col-sm-3"> -->
										<?php 
										if($this->session->userType=="User")
										{
											?>
											<table style="width:400px;height:100px;font-size: 16px;">
											<tr>		
												<td><label><b>FirstName</b></label></td>
												<td><label><?=$users->userFirstName?></label></td>
											</tr>

											<tr>
												<td><label><b>LastName</b></label></td>
												<td><label><?=$users->userLastName?></label></td>
											</tr>

											<tr>
												<td><label><b>Email</b></label></td>
												<td><label><?=$users->userEmail?></label></td>
											</tr>

											<tr>
												<td><label><b>Gender</b></label></td>
												<td><label><?=$users->userGender?></label></td>
											</tr>

											<?php
											if(isset($users))
											{
												$nd = $users->userBdate;

												$createDate = new DateTime($nd);

												$strip = $createDate->format('Y-m-d');
											//echo $strip;
											}
											?>
											<tr>
												<td><label><b>Birth Date</b></label></td>
												<td><label><?=$strip?></label></td>
											</tr>

											<tr>	
												<td><label><b>UserBio</b></label></td>
												<td><label><?=$users->userBio?></label></td>
											</tr>

											<tr>
												<td><label><b>City</b></label></td>
												<?php
												if($users->userCityID!=null)
												{
													?>
												<td><label><?=$users->cityName?></label></td>
													<?php
												}
												else
												{
													
												?>
														<td><label></label></td>
													<?php
												}
												?>
											</tr>
											<!-- </div> -->
										</table>
										<?php	
										}
										else
										{
											?>
											<table style="width:400px;height:100px;font-size: 16px;">
											<tr>		
												<td><label><b>FirstName</b></label></td>
												<td><label><?=$users->authorFirstName?></label></td>
											</tr>

											<tr>
												<td><label><b>LastName</b></label></td>
												<td><label><?=$users->authorLastName?></label></td>
											</tr>

											<tr>
												<td><label><b>Email</b></label></td>
												<td><label><?=$users->authorEmail?></label></td>
											</tr>

											<tr>
												<td><label><b>Gender</b></label></td>
												<td><label><?=$users->authorGender?></label></td>
											</tr>

											<?php
											if(isset($users))
											{
												$nd = $users->authorBdate;

												$createDate = new DateTime($nd);

												$strip = $createDate->format('Y-m-d');
											//echo $strip;
											}
											?>
											<tr>
												<td><label><b>Birth Date</b></label></td>
												<td><label><?=$strip?></label></td>
											</tr>

											<tr>	
												<td><label><b>UserBio</b></label></td>
												<td><label><?=$users->authorBio?></label></td>
											</tr>

											<tr>
												<td><label><b>City</b></label></td>
												<?php
												if($users->authorCityID!=null)
												{
													?>
												<td><label><?=$users->cityName?></label></td>
													<?php
												}
												else
												{
													
												?>
														<td><label></label></td>
													<?php
												}
												?>
											</tr>
											<!-- </div> -->
										</table>
											<?php

										}
										?>
										
									</div>



								</div>

								<div id="menu1" class="container tab-pane fade"><br>
									<h3>Change Profile Photo</h3>
									<form method="post" enctype="multipart/form-data" action="<?= site_url("brUser/ManageProfileC/changePic")?>">	

										<div class="form-group row">
											<div class="col-sm-10">
												<?php
												if($this->session->userPhoto!=null)								
												{
													$image="upload/".$this->session->userPhoto;
													?>
												<img src="<?=$image?>" height="200" width="200">
												<?php
												}
												else
												{
													$image="upload/user.jpg";
													?>
													<img src="<?=$image?>" height="200" width="200">
													<?php
												}
												?>
											</div>
										</div>

										<div class="form-group row">
											<div class="col-sm-3">
												<input type="file" name="profile" class="form-control" >
											</div>
										</div>


										<div class="form-group row">
											<!-- <label class="col-sm-2 col-form-label"></label> -->
											<div class="col-sm-10">
												<input type="submit" class="btn btn-inverse btn-round waves-effect waves-light" name="btnChange" value="Change">
											</div>
										</div>
									</form>

								</div>

								<div id="menu2" class="container tab-pane fade"><br>
									<h3>Change Password</h3>
									<form method="post" enctype="multipart/form-data">
										<div class="form-group row">	
											<label class="col-sm-2 col-form-label">Old Password</label>
											<div class="col-sm-10">
												<input type="Password" id="oldpass" name="txtOpassword" class="form-control" placeholder="Enter Old Password">
												<div id="oldp"></div>
											</div>
										</div>


										<div class="form-group row">
											<label class="col-sm-2 col-form-label">New Password</label>
											<div class="col-sm-10">
												<input type="Password" id="newpass" name="txtNpassword" class="form-control" placeholder="Enter New Password">
												<!-- <div id="pass"></div> -->
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Confirm Password</label>
											<div class="col-sm-10">
												<input type="Password" id="cpass" name="txtCpassword" class="form-control" placeholder="Enter Confirm Password">
												<div id="pass"></div>
											</div>
										</div>

										<div class="form-group row"><label class="col-sm-2 col-form-label"></label>
											<div class="col-sm-10">
												<!--<input type="button" id="btnchange" class="btn btn-inverse btn-round waves-effect waves-light " name="btnAdd" value="CHANGE"  > -->

												<div>
													<button type="button" id="btnchange" class="btn btn-success alert-success-msg m-b-10">CHANGE</button>
												</div>
											</div>
										</div>

									</form>
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
				<!-- Trigger the modail with a button -->

				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<form enctype="multipart/form-data" action="<?=site_url("brUser/ManageProfileC/updateDetails");?>" method="post">
								<?php $date=date("Y-m-d");?>
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Modal title</h4>
								</div>
								<div class="modal-body">
									<div class="row formData">
										<label class="col-sm-2 col-form-label">FirstName</label>
										<div class="col-sm-10">
											<input type="text" id="txtuserFirstName" name="txtuserFirstName" class="form-control" placeholder="First Name" value="<?php
											 if($this->session->userType=="User")
											 {	
											 if(isset($users->userFirstName))

											 echo $users->userFirstName;
											 }
											 else
											 {
											 	if(isset($users->authorFirstName))
											 	echo $users->authorFirstName;
											 }
											 ?>"
											 >
										</div>
									</div>

									<div class="row formData">
										<label class="col-sm-2 col-form-label">LastName</label>
										<div class="col-sm-10">
											<input type="text" id=
											"txtuserLastName" name="txtuserLastName" class="form-control" placeholder="Last Name" value="<?php
											 if($this->session->userType=="User")
											 {	
											 if(isset($users->userLastName))

											 echo $users->userLastName;
											 }
											 else
											 {
											 	if(isset($users->authorLastName))
											 	echo $users->authorLastName;
											 }
											 ?>">
										</div>
									</div>

									<div class="row formData">
										<label class="col-sm-2 col-form-label">Email</label>
										<div class="col-sm-10">
											<input type="text" id="txtuserEmail" name="txtuserEmail" class="form-control" placeholder="Email" value="<?php
											 if($this->session->userType=="User")
											 {	
											 if(isset($users->userEmail))

											 echo $users->userEmail;
											 }
											 else
											 {
											 	if(isset($users->authorEmail))
											 	echo $users->authorEmail;
											 }
											 ?>">
										</div>
									</div>

									<?php


									if($this->session->userType=="User")
									{
									if(isset($users->userBdate))
									{
										$nd = $users->userBdate;

										$createDate = new DateTime($nd);

										$strip = $createDate->format('Y-m-d');
																	//echo $strip;
									}
									}
									else
									{
										if(isset($users->authorBdate))
									{
										$nd = $users->authorBdate;

										$createDate = new DateTime($nd);

										$strip = $createDate->format('Y-m-d');
																	//echo $strip;
									}
									}
									?>														
									<div class="row formData">
										<label class="col-sm-2 col-form-label">Birth date</label>
										<div class="col-sm-10">
											 <input type="date" id="userBdate" name="dtuserBdate" class="form-control" value="<?php
											if($this->session->userType=="User")
											{ 
											if(isset($users->userBdate))
											echo $strip; 
											else echo $date;
											}
											else
											{
												if(isset($users->authorBdate))
											echo $strip; 
											else echo $date;	
											}
											?>">
										</div>
									</div>

									<div class="row formData">
										<label class="col-sm-2 col-form-label">Gender</label>
										<div class="form-radio col-sm-10">
											<div class="radio radio-inline">
												<label>
													<input type="radio" name="radGender" value="Male" <?php 
													
													if($this->session->userType=="User")
													{
													if(isset($users->userGender))
														{
															if($users->userGender=="Male")
																echo "checked";
														}
													}
													else
													{
														if(isset($users->authorGender))
														{
															if($users->authorGender=="Male")
																echo "checked";
														}
													}
														?>
														>
													<i class="helper"></i>Male
												</label>
											</div>
											<div class="radio radio-inline">
												<label>
													<input type="radio" name="radGender" value="Female" <?php 
													
													if($this->session->userType=="User")
													{
													if(isset($users->userGender))
														{
															if($users->userGender=="Female")
																echo "checked";
														}
													}
													else
													{
														if(isset($users->authorGender))
														{
															if($users->authorGender=="Female")
																echo "checked";
														}
													}
														?>>
													<i class="helper"></i>Female
												</label>
											</div>
										</div>															
									</div>
									<div class="row formData">
										<label class="col-sm-2 col-form-label">User Bio</label>
										<div class="col-sm-10">
											<textarea style="height: 100px;" id="txtuserBio"  name="txtuserBio" class="form-control" placeholder="User Bio"><?php
											 if($this->session->userType=="User")
											 {	
											 if(isset($users->userBio))

											 echo $users->userBio;
											 }
											 else
											 {
											 	if(isset($users->authorBio))
											 	echo $users->authorBio;
											 }
											 ?></textarea>
										</div>
									</div>
									<div class="row formData">
										<label class="col-sm-2 col-form-label">City</label>
										<div class="col-sm-3">
											<select name="lstCountry" id="lstCountry" class="form-control">
												<!-- <option value="0">Select One Value Only</option> -->
												
												<?php
												if($users->cityData!=null)
												{
													$ctid=$users->cityData->cityID;
													$cid=$users->cityData->countryID;
													$sid=$users->cityData->stateID;
													
												}
												else{
													$ctid=0;
													$cid=0;
													$sid=0;
												}
												foreach ($countries as $co) {
																# code...
													?>
													<option value="<?= $co->countryID?>" <?php if($co->countryID==$cid)echo "selected";?>><?= $co->countryName?></option>
													<?php
												}
												?>
											</select>
										</div>

										<div class="col-sm-3">
											<select name="lstState" id="lstState" class="form-control">
												<option value="0">Select State</option>
												<?php if($users->cityData!=null){
													?>
													<option value="<?=$users->cityData->stateID?>" selected><?=$users->cityData->stateName?></option>
													<?php
												}?>
												<!-- <div id="txthint"></div> -->
											</select>
										</div>

										<div class="col-sm-3">
											<select name="lstCity" id="lstCity" class="form-control">
												<option value="0">Select City</option>
											<?php if($users->cityData!=null){
													?>
													<option value="<?=$users->userCityID?>" selected><?=$users->cityData->cityName?></option>
													<?php
												}?>	
											</select>
										</div>
									</div>	
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary bedit" id="btnSubmit">Save changes</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<?php include_once("bottom.php")?>
		<!--************************************
				Footer End
				*************************************-->


			</div>
	<!--************************************
			Wrapper End
			*************************************-->
			<!-- <script type="text/javascript" src="resources/bower_components/sweetalert/js/sweetalert.min.js"></script> -->
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
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
		</body>

		<!-- Mirrored from exprostudio.com/html/book_library/products.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 May 2019 09:45:48 GMT -->
		</html>
		<script>

			$("#oldpass").keyup(function(){
				var y=$("#oldpass").val();

				$.ajax({
					url:"<?=site_url("brUser/ManageProfileC/changePass/")?>"+y,
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



			$("#cpass").keyup(function(){
				if($("#newpass").val()==$("#cpass").val())
				{
					$("#pass").html("Password match");
					$("#btnchange").removeAttr("disabled");
				}
				else
				{
					$("#pass").html("Password not match");
					$("#btnchange").attr("disabled",true);	
				}
			});


			$("#btnchange").click(function(){
				var y=$("#newpass").val();
				$.ajax({
					url:"<?=site_url("brUser/ManageProfileC/updPass/")?>"+y,
					success: function(data){
						if(data=="success")
						{
							Swal.fire("Password Changed","","success");
							$("#oldp").html("");
							$("#pass").html("");
							$("#btnchange").attr("disabled",true);
							$("#newpass").val("");
							$("#cpass").val("");
							$("#oldpass").val("");
						}
					}
				});

			});

			
			$("#lstCountry").change(function(){
				var countryID=$(this).val();	
				$.ajax({url: "<?=site_url("brUser/ManageProfileC/stateAjax/")?>"+countryID, success: function(result){
					$("#lstState").html(result);
				}});					
			});

			$("#lstState").change(function(){
				var stateID=$(this).val();	
				$.ajax({
					url: "<?=site_url("brUser/ManageProfileC/cityAjax/")?>"+stateID, 
					success: function(result){
						$("#lstCity").html(result);
					}});					
			});


			

		</script>