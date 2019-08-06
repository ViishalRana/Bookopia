<?php
	$title="Add Books";
	$desc="Add a Book";
	$link="<a href='".site_url('brAdmin/BookC/')."'>Books</a>";
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
													<h4 class="sub-title">Books Detail</h4>
												</div>
												<div class="card-block">

													<form enctype="multipart/form-data" action=
															"<?php echo site_url("brAdmin/BookC/addBook");?>" method="post">

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Book Title</label>
														<div class="col-sm-10">
														<input type="text" name="txtbookTitle" class="form-control" placeholder="Enter Book Name">
														</div>
														</div>
														
														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Book Pages</label>
														<div class="col-sm-10">
														<input type="text" name="txtbookPages" class="form-control" placeholder="Enter total Book Pages">
														</div>
														</div>

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Book Edition</label>
														<div class="col-sm-10">
														<input type="text" name="txtbookEdition" class="form-control" placeholder="Enter Book Edition">
														</div>
														</div>

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Book Synopsis</label>
														<div class="col-sm-10">
														<textarea rows="5" cols="5" name="txtbookSynopsis" class="form-control" placeholder="Enter Book Synopsis"></textarea>
														</div>
														</div>

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Book ISBN</label>
														<div class="col-sm-10">
														<input type="text" name="txtbookISBN" class="form-control" placeholder="Enter Book ISBN">
														</div>
														</div>

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Book Published Date</label>
														<div class="col-sm-10">
														<input type="date" name="dtbookDate" class="form-control" placeholder="Enter Book Published Date" value="<?=$date?>">
														</div>
														</div>

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Book Publisher</label>
														<div class="col-sm-10">
														<select name="lstbookPublisher" class="form-control">
														<option value="0">Select One Value Only</option>
														<?php
															foreach ($pubs as $pub) {
																# code...
																?>
																<option value="<?=$pub->publisherID?>"><?=$pub->publisherName?></option>
																<?php
															}
														?>
														</select>
														</div>
														</div>

														<div class="form-group row">
															 <label class="col-sm-2 col-form-label">Book Cover Photo</label>
														<div class="col-sm-10">
														<input type="file" name="imgbookCoverPhoto" class="form-control" >
														</div>
														</div>


														
														</div>

														<div class="form-group row"><label class="col-sm-2 col-form-label"></label>
														<div class="col-sm-10">
															<!-- <button class="btn btn-inverse btn-round waves-effect waves-light">Inverse Button</button> -->
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
	</body>
</html>
<script type="text/javascript">
	$("#bAdd").click(function(){
		var selT = $("#lstbookGenre").find("option:selected").text();
		var selV = $("#lstbookGenre").val();
		$("#bookGenre").val($("#bookGenre").val()+selT+",");
		var gen=$("#bookGenre1").val($("#bookGenre1").val()+selV+",");
		// var ar=$.makeArray(gen);
		alert(ar);
		
	});
</script>
