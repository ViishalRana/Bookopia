<?php
$title="Display Users";
$desc="discription of User";
$link="<a href='".site_url('brAdmin/UserC/')."'>Users</a>";
$date=date("Y-m-d");
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com//polygon/admindek/default/dt-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Jan 2019 05:55:23 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<title>Display User</title>


<!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<base href="<?=base_url()?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
<meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
<meta name="author" content="colorlib" />

<link rel="icon" href="https://colorlib.com//polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="resources/bower_components/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="resources/assets/pages/waves/css/waves.min.css" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="resources/assets/icon/feather/css/feather.css">

<link rel="stylesheet" type="text/css" href="resources/assets/icon/themify-icons/themify-icons.css">

<link rel="stylesheet" type="text/css" href="resources/assets/icon/icofont/css/icofont.css">

<link rel="stylesheet" type="text/css" href="resources/assets/icon/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="resources/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="resources/assets/pages/data-table/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="resources/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">

<link rel="stylesheet" type="text/css" href="resources/assets/css/style.css">
<link rel="stylesheet" type="text/css" href="resources/assets/css/pages.css">
<style type="text/css">
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

</head>
<body>

	<div class="loader-bg">
		<div class="loader-bar"></div>
	</div>

	<div id="pcoded" class="pcoded">
		<div class="pcoded-overlay-box"></div>
		<div class="pcoded-container navbar-wrapper">

			<?php include_once("nav.php") ?>


			
			<div class="pcoded-main-container">
				<div class="pcoded-wrapper">

					<?php include_once("sidebar.php") ?>

					<div class="pcoded-content">

						<div class="page-header card">
							<div class="row align-items-end">
								<div class="col-lg-8">
									<div class="page-header-title">
										<i class="feather icon-inbox bg-c-blue"></i>
										<div class="d-inline">
											<h5></h5>
											<span></span>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="page-header-breadcrumb">
										<ul class=" breadcrumb breadcrumb-title">
											<li class="breadcrumb-item">
												<a href="<?=site_url("brAdmin/UserC/")?>"><i class="feather icon-home"></i></a>
											</li>
											<li class="breadcrumb-item"><a href="#!">User Display</a>
											</li>
											<!-- <li class="breadcrumb-item">
												<a href="#!">Basic Initialization</a>
											</li> -->
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="pcoded-inner-content">

							<div class="main-body">
								<div class="page-wrapper">

									<div class="page-body">
										
										<div class="row">
											<div class="col-sm-12">

												<div class="card">
													<div class="card-header">
														<h5>User Details</h5>
														<!--<span>Lets say you want to sort the fourth column (3) descending and the first column (0) ascending: your order: would look like this: order: [[ 3, 'desc' ], [ 0, 'asc' ]]</span> -->
													</div>
													<div class="card-block">
														<div class="dt-responsive table-responsive">
															<table id="order-table" class="table table-striped table-bordered nowrap">
																<thead>
																	<tr>
																		<th>UserId</th>
																		<th>UserFirstName</th>
																		<th>UserLastName</th>
																		<th>UserEmail</th>
																		<th>UserPassword</th>
																		<th>UserGender</th>
																		<th>UserBdate</th>
																		<th>UserBio</th>
																		<th>UserPhoto</th>
																		<th>LastActive</th>
																		<th>Status</th>
																		<th>UserCityID</th>
																		<th>Edit</th>
																	</tr>
																</thead>
																<tbody>
																	<?php
																	foreach ($users as $key)
																	{
																		?>
																		<tr>
																			<td><?= $key->userID?></td>
																			<td><?= $key->userFirstName?></td>
																			<td><?= $key->userLastName?></td>
																			<td><?= $key->userEmail?></td>
																			<td><?= $key->userPassword ?></td>
																			<td><?= $key->userGender?></td>
																			<td><?= $key->userBdate?></td>
																			<td><?= $key->userBio?></td>
																			<td><img src="<?= base_url();?>upload/<?= $key->userPhoto?>" height="100" width="100"></td>
																			<td><?=$key->lastactive?></td>
																			<td><label class="switch">
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
																				<input class="btnChangeStat" type="checkbox" data-blog-id="<?=$key->userID?>" value="<?=$key->status?>" <?=$stat?>>
																				<span class="slider"></span>
																			</label></td>
																			<td><?= $key->userCityID?></td>
																			<!-- <td><?= anchor("brAdmin/UserC/updUser/"."$key->userID","Edit")?></td> -->
																			<td><a href="<?=site_url("brAdmin/UserC/updUser/$key->userID")?>"><button class="bedit btn btn-primary btn-round waves-effect waves-light"><i class="fa fa-edit"></i></button></i></a></td>
																		</tr>
																		<?php
																	}
																	?>
																</tbody>
															</table>
														</div>
													</div>
												</div>

											</div>
										</div>
										<!-- content end -->
										
									</div>

								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="resources/bower_components/jquery/js/jquery.min.js"></script>
	<script type="text/javascript" src="resources/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="resources/bower_components/popper.js/js/popper.min.js"></script>
	<script type="text/javascript" src="resources/bower_components/bootstrap/js/bootstrap.min.js"></script>

	<script src="resources/assets/pages/waves/js/waves.min.js"></script>

	<script type="text/javascript" src="resources/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

	<script type="text/javascript" src="resources/bower_components/modernizr/js/modernizr.js"></script>
	<script type="text/javascript" src="resources/bower_components/modernizr/js/css-scrollbars.js"></script>

	<script src="resources/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="resources/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="resources/assets/pages/data-table/js/jszip.min.js"></script>
	<script src="resources/assets/pages/data-table/js/pdfmake.min.js"></script>
	<script src="resources/assets/pages/data-table/js/vfs_fonts.js"></script>
	<script src="resources/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="resources/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="resources/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="resources/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="resources/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

	<script src="resources/assets/pages/data-table/js/data-table-custom.js"></script>
	<script src="resources/assets/js/pcoded.min.js"></script>
	<script src="resources/assets/js/vertical/vertical-layout.min.js"></script>
	<script src="resources/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script type="text/javascript" src="resources/assets/js/script.js"></script>

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
$(".btnChangeStat").change(function(){
	var blogID=$(this).data("blog-id");
	var oldval=$(this).val();
	var el=$(this);
	//alert(oldval);
	//var status=$(this).data("review-status");
	//var stat=$(this).val();
	 // alert($(this).val())
	// alert(1);
	  $.ajax({url: "<?=site_url('brAdmin/AuthorC/changeUserStat/')?>"+blogID+"/"+oldval, success: function(result){
	  	alert(result);
	  	if(oldval==0)
	  	{
	  		el.val("1");
	  	}
	  	else
	  	{
	  		el.val("0");
	  	}
	  }});

});		
	</script>
</body>

<!-- Mirrored from colorlib.com//polygon/admindek/default/dt-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Jan 2019 05:55:29 GMT -->
</html>
