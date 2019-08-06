<?php
$title="Cities";
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
													<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add City</button>
												</div>
												<div class="block">
													<div class="table-responsive">
														<table class="table table-hover">
															<thead>
																<th>City ID</th>
																<th>City Name</th>
																<th>State ID</th>
																<th>State Name</th>
																<th>Country ID</th>
																<th>Country Name</th>
																<th></th>

															</thead>
															<tbody>
																<?php
																foreach($cityData as $key)
																{
																	?>
																	<tr>
																		<td><?= $key->cityID?></td>
																		<td><?= $key->cityName?></td>
																		<td><?= $key->stateID?></td>
																		<td><a href="<?=site_url("brAdmin/StateC/")?>"><?= $key->stateName?></a></td>
																		<td><?=$key->countryID?></td>
																		<td><a href="<?=site_url("brAdmin/CountryC/")?>"><?= $key->countryName?></a></td>
																		<td>
																			<button class="bedit btn btn-primary btn-round waves-effect waves-light" data-toggle="modal" data-target="#myModal" data-city-id="<?=$key->cityID?>" data-city-name="<?=$key->cityName?>" data-city-state-id="<?=$key->stateID?>" data-state-country-id="<?=$key->countryID?>"><i class="fa fa-edit"></i></button>
																			<a href="<?=site_url("brAdmin/CityC/deleteCity/$key->cityID")?>"><button class="btn btn-danger btn-round waves-effect waves-light"><i class="fa fa-trash"></i></button></a>															
																		</td>																		</tr>
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
							<h4 class="modal-title">Add City</h4>
							<button id="modalClose" type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<?php
							$action="";
							if(isset($cityData) && isset($countryData) && isset($stateID) && !empty($stateID))
							{
									//echo 1;
								$action=site_url("brAdmin/CityC/addCity/$stateID");
							}
							else
							{
								$action=site_url("brAdmin/CityC/addCity");
							}
							?>
							<form method="post" action="<?=$action?>" enctype="multipart/form-data" id="cityForm">
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">City Name</label>
									<div class="col-sm-8">
										<input name="txtcityName" id="txtcityName" type="text" class="form-control" placeholder="City Name">
									</div>
								</div>	
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Country</label>
									<div class="col-sm-8">	
										<select name="lstCountry" id="lstCountry" class="form-control">
											<option value="0">Choos an option</option>
											<?php
												foreach ($countryData as $key) {
													# code...
													?>
													<option value="<?=$key->countryID?>"><?=$key->countryName?></option>
													<?php
												}
											?>
										</select>
									</div>
								</div>	
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">State</label>
									<div class="col-sm-8" id="txthint">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-4 col-form-label"></label>
									<div class="col-sm-8">
										<input class="btn btn-inverse btn-round waves-effect waves-light col-md-12" type="submit" name="btnAdd" id="btnSubmit" value="Add City">
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
			<?php
				if(isset($countryID) && !empty($countryID) &&isset($stateID) &&!empty($stateID))
				{
					?>
				    $.ajax({url: "<?=site_url("brAdmin/StateC/getAJAXState/$countryID")?>", success: function(result){
				      $("#txthint").html(result);
				      $("#lstCountry").val(<?=$countryID?>);
				      $("#lstState").val(<?=$stateID?>);
				    }});					
					<?php
				}
			?>

			$(document).ready(function(){
				$("#lstCountry").change(function(){
					var countryID=$("#lstCountry").val();
				    $.ajax({url: "<?=site_url("brAdmin/StateC/getAJAXState/")?>"+countryID, success: function(result){
				      $("#txthint").html(result);
				    }});
				});
			});
			$(".bedit").click(function(){
				var cityID=$(this).data("city-id");
				var cityName=$(this).data("city-name");
				var cityStateID=$(this).data("city-state-id");
				var stateCountryID=$(this).data("state-country-id");
				$("#txtcityName").val(cityName);
				$("#lstCountry").val(stateCountryID);
			    $.ajax({url: "<?=site_url("brAdmin/StateC/getAJAXState/")?>"+stateCountryID, success: function(result){
			      $("#txthint").html(result);
			      $("#lstState").val(cityStateID);
			    }});
			    $("#btnSubmit").attr("name","btnEdit");
			    $("#btnSubmit").val("Edit City");
			    $("#cityForm").attr("action","<?=site_url("brAdmin/CityC/editCity/")?>"+cityID);
			});
			$("#modalClose").click(function(){
				$("#txtcityName").val("");
				$("#lstCountry").val(0);
				$("#txthint").html("");
				$("#btnSubmit").attr("name","btnAdd");
				$("#btnSubmit").val("Add City");
				<?php
					if(isset($cityData) && isset($countryData) && isset($stateID) && !empty($stateID))
					{
							//echo 1;
						$action=site_url("brAdmin/CityC/addCity/$stateID");
					}
					else
					{
						$action=site_url("brAdmin/CityC/addCity");
					}
					
				?>				
				$("#cityForm").attr("action","<?=$action?>");
			});

		</script>			
