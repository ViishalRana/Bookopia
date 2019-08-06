<?php
$title="Manage Profile";
$desc="This is the description of Profile";
$link="<a href='".site_url('brAdmin/ProfileC/')."'>$title</a>";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?=$title?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<base href="<?=base_url()?>">
		<link rel="stylesheet" type="text/css" href="resources/bower_components/sweetalert/css/sweetalert.css">
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
													<h4 class="sub-title">Change Profile And Password</h4>
												</div>
												<div class="card-block tab-icon">

													<div class="row">
														<div class="col-lg-12 col-xl-12">
															<ul class="nav nav-tabs md-tabs " role="tablist">
																<li class="nav-item">
																	<a class="nav-link active" data-toggle="tab" href="#profile7" role="tab"><i class="fa fa-user"></i>Change Profile Image</a>
																	<div class="slide"></div>
																</li>
																<li class="nav-item">
																	<a class="nav-link" data-toggle="tab" href="#password7" role="tab"><i class="fa fa-key"></i>Change Password</a>
																	<div class="slide"></div>
																</li>
															</ul>

															<div class="tab-content card-block">
																
																<base href="<?=base_url()?>">
																<div class="tab-pane active" id="profile7" role="tabpanel">
																	<form method="post" enctype="multipart/form-data" action="<?= site_url("brAdmin/ProfileC/changePic")?>">	

																		<div class="form-group row">
																			<div class="col-sm-10">
																				<?php
																				if($this->session->profilePic!=null)								
																				{
																					$image="upload/".$this->session->profilePic;
																				}
																				?>
																				<img src="<?=$image?>" class="img-circle" height="200" width="200">
																			</div>
																		</div>

																		<div class="form-group row">
																			<div class="col-sm-10">
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

																<div class="tab-pane" id="password7" role="tabpanel">
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
																					<button type="button" id="btnchange" class="btn btn-success alert-success-msg m-b-10" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'alert-success']);">CHANGE</button>
																				</div>
																			</div>
																		</div>

																	</form>
																</div>



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
							<!-- CB Ends -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include_once('Bottom.php') ?>
<script type="text/javascript" src="resources/bower_components/sweetalert/js/sweetalert.min.js"></script>

	</body>
</html>
<script>

	$("#oldpass").keyup(function(){
		var y=$("#oldpass").val();
		/*$.ajax({
			url : "<?= site_url("brAdmin/ProfileC/changePass/
		")?>"+y,
			success: function(result){
			$("#res").html(result);
			}
		});*/
		$.ajax({
                url:"<?=site_url("brAdmin/ProfileC/changePass/")?>"+y,
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
        //swal("Password Changed","","success");
        var y=$("#newpass").val();
		$.ajax({
                url:"<?=site_url("brAdmin/ProfileC/updPass/")?>"+y,
               // type:'post',
                success: function(data){
                	if(data=="success")
                	{
                		//swal("Password Changed","","success");
                		//swal('_trackEvent', 'example', 'try', 'alert-success');
      //           		<li>
      //           		<button type="button" class="btn btn-success alert-success-msg m-b-10" onclick="_gaq.push(['_trackEvent', example', 'try', 'alert-success']);">Success</button>
						// </li>
							

                		// ("success");
                		swal("Password Changed","","success");
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

  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');

</script>

