<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com//polygon/admindek/default/dt-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Jan 2019 05:55:23 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<title>Admindek | Admin Template</title>


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
											<h5>Basic Table Sizes</h5>
											<span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="page-header-breadcrumb">
										<ul class=" breadcrumb breadcrumb-title">
											<li class="breadcrumb-item">
												<a href="index.html"><i class="feather icon-home"></i></a>
											</li>
											<li class="breadcrumb-item"><a href="#!">Bootstrap Table</a>
											</li>
											<li class="breadcrumb-item">
												<a href="#!">Basic Initialization</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="pcoded-inner-content">

							<div class="main-body">
								<div class="page-wrapper">

									<div class="page-body">
										<!-- content start-->
										<div class="row">
											<div class="col-sm-12">

												<div class="card">
													<div class="card-header">
														 <h5>Book Details</h5>
														<!--<span>Lets say you want to sort the fourth column (3) descending and the first column (0) ascending: your order: would look like this: order: [[ 3, 'desc' ], [ 0, 'asc' ]]</span> -->
													</div>
													<div class="card-block">
														<div class="dt-responsive table-responsive">
															<table id="order-table" class="table table-striped table-bordered nowrap">
																<thead>
																	<tr>
																		<th>AuthorId</th>
													<th>Author Alias</th>
													<th>AuthorFirstName</th>
													<th>AuthorLastName</th>
													<th>AuthorEmail</th>
													<th>AuthorPassword</th>
													<th>AuthorBdate</th>
													<th>AuthorGender</th>
													<th>AuthorBio</th>
													<th>AuthorPhoto</th>
													<th>AuthorCityID</th>
													<th>AccountCreatedDate</th>
													<th>AuthorStatus</th>
													<th>Edit</th>
													<th>Delete</th>
													<th>View More</th>
																</thead>
																<tbody>
																	<?php
													foreach ($authors as $key)
													{
														?>
														<tr>
														<td><?= $key->authorID?></td>
														<td><?=$key->authorAlias?></td>
														<td><?= $key->authorFirstName?></td>
														<td><?= $key->authorLastName?></td>		
														<td><?= $key->authorEmail ?></td>
														<td><?= $key->authorPassword?></td>
														<td><?= $key->authorBdate?></td>
														<td><?= $key->authorGender?></td>
														<td><?= $key->authorBio?></td>
														<td><img src="<?= base_url();?>upload/<?= $key->authorPhoto?>" height="100" width="100"></td>
														<td><?=$key->authorCityID?></td>
														<td><?=$key->accountCreatedDate?></td>
														<td><?=$key->status?></td>
														<td><a href="<?=site_url("brAdmin/AuthorC/editAuthor/$key->authorID")?>"><button class="bedit btn btn-primary btn-round waves-effect waves-light"><i class="fa fa-edit"></i></button></i></a></td>
														<td><a href="<?=site_url("brAdmin/AuthorC/deleteAuthor/$key->authorID")?>"><button class="btn btn-danger btn-round waves-effect waves-light"><i class="fa fa-trash"></i></button></a></td>
														<td><a href="<?=site_url("brAdmin/AuthorC/viewMore/$key->authorID")?>"><button class='btn waves-effect waves-light btn-inverse btn-outline-inverse'><i class="fa fa-plus"></i>  View More</button></a></td>

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
	</script>
</body>

<!-- Mirrored from colorlib.com//polygon/admindek/default/dt-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Jan 2019 05:55:29 GMT -->
</html>
