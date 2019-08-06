<?php
	$title="Add Award";
	$desc="Add an Award";
	$link="<a href='".site_url('brAdmin/BookC/')."'>Home</a>";
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
													<h4 class="sub-title">Add Award</h4>
												</div>
												<div class="card-block">

													<form enctype="multipart/form-data" action="<?=site_url("brAdmin/BookC/addAward")?>" id="formaddAuthor" method="post">

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Award Name</label>
														<div class="col-sm-10">
														<input type="text" name="txtawardName" class="form-control" placeholder="Enter Alias">
														</div>
														</div>

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Award Title</label>
														<div class="col-sm-10">
														<input type="text" name="txttitle" class="form-control" placeholder="Enter First Name">
														</div>
														</div>

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Award Description</label>
														<div class="col-sm-10">
														<input type="date" name="dtawardDate" class="form-control" placeholder="Enter Birth date" value="<?=$date?>">
														</div>
														</div>



														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Date</label>
														<div class="col-sm-10">
															<input type="checkbox" class="js-single" id="chkprofileStatus" name="chkprofileStatus"/>
														</div>
														</div>

														<div class="form-group row">
															<label class="col-sm-2 col-form-label"></label>
															<div class="col-sm-10">
																<input type="submit" class="form-control btn btn-inverse btn-round waves-effect waves-light" name="btnAdd" value="Add Award" id="btnAdd">
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

	</body>
</html>
