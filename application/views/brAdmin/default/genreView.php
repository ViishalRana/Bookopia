<?php
	$title="Genres";
	$desc="";
	$link="<a href='".site_url('brAdmin/GenreC/')."'>$title</a>";
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

											<div class="card-header">
												<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Genre</button>
											</div>
											<div class="block">
												<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<th>GenreID</th>
													<th>GenreName</th>
													<th>Edit</th>
													<th>Delete</th>
												</thead>
												<tbody>
													<?php
													foreach ($genres as $key)
													{
														?>
														<tr>
														<td><?= $key->genreID?></td>
														<td><?= $key->genreName?></td>
														<!-- <td><?= anchor("brAdmin/GenreC/"."$key->genreID","<i class='fa fa-edit'></i>")?></td> -->
														<td>
														<button class="bedit btn btn-primary btn-round waves-effect waves-light" data-toggle="modal" id="bedit" data-target="#myModal" data-id="<?= $key->genreID?>"><i class="fa fa-edit"></i></button></td>

														<td><a href="<?=site_url("brAdmin/GenreC/deleteGenre/$key->genreID")?>"><button class="btn btn-danger btn-round waves-effect waves-light"><i class="fa fa-trash"></i></button></a></td>														 
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

<!--Trigger the modal with a button -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Genre</h4>
        <button type="button" class="close" data-dismiss="modal" id="modalClose">&times;</button>
      </div>
      <div class="modal-body" id="mb">
      	<form method="post" action="<?=site_url("brAdmin/GenreC/addGenre")?>" enctype="multipart/form-data" id="genreForm">
			<div class="form-group row">
				<label class="col-sm-4 col-form-label">Genre Name</label>
				<div class="col-sm-8">
					<input id="txtgenreName" type="text" class="form-control" placeholder="Name of Genre" name="txtgenreName">
				</div>
			</div>
	
			<div class="form-group row">
				<label class="col-sm-4 col-form-label"></label>
				<div class="col-sm-8">
					<input class="btn btn-inverse btn-round waves-effect waves-light col-md-12" type="submit" name="btnAdd" value="Add Genre" id="btnsubmit">
				</div>
			</div>			     		
      	</form>
      </div>
    </div>
  </div>
</div>
Example Explain

		<?php include_once('Bottom.php') ?>
	</body>
</html>

<script type="text/javascript">
	
	$(".bedit").click(function(){
		var genreID=$(this).data("id");

				  $.ajax({url: "<?=site_url('brAdmin/GenreC/getGenreData/')?>"+genreID, 
				  	success: function(result){

				    var res=JSON.parse(result);
				    $("#txtgenreName").val(res.genreName);
				    $("#btnsubmit").attr("name","btnEdit");
				    $("#btnsubmit").val("Edit Genre");
				    $("#genreForm").attr("action","<?=site_url("brAdmin/GenreC/editGenre/")?>"+res.genreID);
		 }});
	});

	$("#modalClose").click(function(){
			$("#txtgenreName").val("");
		    $("#btnsubmit").attr("name","btnAdd");
		    $("#btnsubmit").val("Add Country");
		    $("#genreForm").attr("action","<?=site_url("brAdmin/GenreC/addGenre/")?>");

		});
</script>
