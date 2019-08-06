<?php
	$title="Countries";
	$desc="";
	$link="<a href='".site_url('brAdmin/BookC/')."'>$title</a>";
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


													<!-- <form method="post" action="<?= site_url("brAdmin/BookC/srchbook")?>">

														<div class="form-group row">
														<label class="col-sm-2 col-form-label">Search</label>
														<div class="col-sm-10">
														<input type="text" name="txtbooksrch" class="form-control" placeholder="Enter Book Name" value="<?php if(isset($books->bookTitle))
															echo $books->bookTitle;
														?>">
														</div>
														</div>
														

														<div class="form-group row"><label class="col-sm-2 col-form-label"></label>
														<div class="col-sm-10">
															<!-- <button class="btn btn-inverse btn-round waves-effect waves-light">Inverse Button</button> -->
															<!-- <input type="submit" class="btn btn-inverse btn-round waves-effect waves-light" name="btnAdd" value="Search">
														</div>
														</div>

													</form> -->


											<div class="card-header">
												<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" height="200">Add Country</button>


											</div>
											<div class="block">
												<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<th>CountryId</th>
													<th>CountryName</th>
													<th>Country Code</th>
													<th></th>
													<th></th>
											
												</thead>
												<tbody>
													<?php
													foreach ($countries as $key)
													{
														?>
														<tr>
														<td><?= $key->countryID?></td>
														<td><?= $key->countryName?></td>
														<td><?= $key->countryCode?></td>
														<td><?= anchor("brAdmin/StateC/countryStates/$key->countryID","<button class='btn waves-effect waves-light btn-inverse btn-outline-inverse'>View States</button>")?></td>
														<td>
															<button class="bedit btn btn-primary btn-round waves-effect waves-light" data-toggle="modal" data-target="#myModal" data-id="<?= $key->countryID?>"><i class="fa fa-edit"></i></button>
															<a href="<?=site_url("brAdmin/CountryC/deleteCountry/$key->countryID")?>"><button class="btn btn-danger btn-round waves-effect waves-light"><i class="fa fa-trash"></i></button></a>
															
														</td>
														</tr>
														<?php
													}
													?>
												</tbody>
											</table>
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

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Country</h4>
        <button type="button" class="close" data-dismiss="modal" id="modalClose">&times;</button>
      </div>
      <div class="modal-body" id="mb">
      	<form method="post" action="<?=site_url("brAdmin/CountryC/addCountry")?>" enctype="multipart/form-data" id="countryForm">
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Country Name</label>
				<div class="col-sm-8">
					<input id="txtcountryName" type="text" class="form-control" placeholder="Name of Country" name="txtcountryName">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Country Code</label>
					<div class="col-sm-8">
						<select id="lstcountryCode" class="form-control fill" name="lstcountryCode">
						<option value="0">Select One Value Only</option>
						<option value="91">+91</option>
						<option value="21">+21</option>
						<option value="31">+31</option>
						</select>
					</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-4 col-form-label"></label>
				<div class="col-sm-8">
					<input class="btn btn-inverse btn-round waves-effect waves-light col-md-12" type="submit" name="btnAdd" value="Add Country" id="btnsubmit">
				</div>
			</div>			     		
      	</form>
      </div>
    </div>

  </div>
</div>		
		<?php include_once('Bottom.php') ?>
	</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$(".bedit").click(function(){
			var countryID=$(this).data("id");
				  $.ajax({url: "<?=site_url('brAdmin/CountryC/getAJAXCountry/')?>"+countryID, success: function(result){
				    var res=JSON.parse(result);
				    $("#txtcountryName").val(res.countryName);
				    $("#lstcountryCode").val(res.countryCode);
				    $("#btnsubmit").attr("name","btnEdit");
				    $("#btnsubmit").val("Edit Country");
				    $("#countryForm").attr("action","<?=site_url("brAdmin/CountryC/editCountry/")?>"+res.countryID);
				  }});				
				//window.location.href="google.com";
		});

	});
		$("#modalClose").click(function(){
			$("#txtcountryName").val("");
			$("#lstcountryCode").val(0);
		    $("#btnsubmit").attr("name","btnAdd");
		    $("#btnsubmit").val("Add Country");
		    $("#countryForm").attr("action","<?=site_url("brAdmin/CountryC/addCountry/")?>");

		});
		
</script>
