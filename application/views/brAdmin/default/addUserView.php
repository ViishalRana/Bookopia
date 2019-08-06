<?php
	$title="Add Users";
	$desc="Add a User";
	$link="<a href='".site_url('brAdmin/UserC/')."'>Users</a>";
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
													<h4 class="sub-title">Users Detail</h4>
												</div>
												<div class="card-block">

													<form enctype="multipart/form-data" action=
															"<?php echo site_url("brAdmin/UserC/addUser");?>" method="post">

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">User First Name</label>
														<div class="col-sm-10">
														<input type="text" name="txtFirstName" class="form-control" placeholder="Enter First Name">
														</div>
														</div>
														
														<div class="form-group row">
														<label class="col-sm-2 col-form-label">User Last Name</label>
														<div class="col-sm-10">
														<input type="text" name="txtLastName" class="form-control" placeholder="Enter Last Name">
														</div>
														</div>

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Email</label>
														<div class="col-sm-10">
														<input type="text" name="txtEmail" class="form-control" placeholder="Enter Email">
														</div>
														</div>

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Password</label>
														<div class="col-sm-10">
														<input type="password" name="txtPassword" class="form-control" placeholder="Enter Password">
														</div>
														</div>

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Gender</label>
														<div class="form-radio col-sm-10">
														<div class="radio radio-inline">
														<label>
														<input type="radio" name="r1" value="Male" checked="checked">
														<i class="helper"></i>Male
														</label>
														</div>
														<div class="radio radio-inline">
														<label>
														<input type="radio" name="r1" value="Female">
														<i class="helper"></i>Female
														</label>
														</div>
														</div>
														</div>

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">User Birth Date</label>
														<div class="col-sm-10">
														<input type="date" name="dtBirthDate" class="form-control" value="<?=$date?>">
														</div>
														</div>
														

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">User Bio</label>
														<div class="col-sm-10">
														<textarea rows="5" cols="5" name="txtUserBio" class="form-control" placeholder="Enter Bio"></textarea>
														</div>
														</div>

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">User Photo</label>
														<div class="col-sm-10">
														<input type="file" name="imgPhoto" class="form-control" >
														</div>
														</div>

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">City</label>
														<div class="col-sm-3">
														<select name="lstCountry" id="lstCountry" class="form-control">
														<option value="0">Select One Value Only</option>
														<?php
															foreach ($countries as $co) {
																# code...
																?>
																<option value="<?= $co->countryID?>"><?= $co->countryName?></option>
																<?php
															}
														?>
														</select>
														</div>

														<div class="col-sm-3">
														<select name="lstState" id="lstState" class="form-control">
														<option value="0">Select State</option>
														<!-- <?php
															foreach ($states as $s) {
																# code...
																?>
																<option value="<?= $s->stateID?>"><?= $s->stateName?></option>
																<?php
															}
														?> -->
														</select>
														</div>

														<div class="col-sm-3">
														<select name="lstCity" id="lstCity" class="form-control">
														<option value="0">Select City</option>
														<!-- <?php
															foreach ($cities as $c) {
																# code...
																?>
																<option value="<?= $c->cityID?>"><?= $c->cityName?></option>
																<?php
															}
														?> -->
														</select>
														</div>
														</div>


														<div class="form-group row"><label class="col-sm-2 col-form-label"></label>
														<div class="col-sm-10">
														<input type="submit" class="btn btn-inverse btn-round waves-effect waves-light" name="btnAdd" value="Add">
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
				var countryID=$(this).val();	
			  $.ajax({url: "<?=site_url("brAdmin/UserC/stateAjax/")?>"+countryID, success: function(result){
			    $("#lstState").html(result);
			  }});					
			});

			$("#lstState").change(function(){
				var stateID=$(this).val();	
			  $.ajax({
			  	url: "<?=site_url("brAdmin/UserC/cityAjax/")?>"+stateID, 
			  	success: function(result){
			    $("#lstCity").html(result);
			  }});					
			});
		</script>
	</body>
</html>

