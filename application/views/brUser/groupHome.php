<html>
<head>
	<title>Bookopia</title>
	<base href="<?=base_url();?>">
	<link rel="icon" href="resources/assets/icon/title_icon.png" type="image/x-icon">	
	<?php include_once("topscript.php")?>
	<style type="text/css">
	
	</style>

</head>
<body class="tg-home tg-homeone">
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
				Home Slider Start
		*************************************-->
		<!--************************************
				Home Slider End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		
		<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="resources2/images/parallax/bgparallax-07.jpg">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-innerbannercontent">
									<h1>Groups</h1>
									<ol class="tg-breadcrumb">
										<li><a href="<?=site_url("brUser/HomeC/")?>">Home</a></li>
										<li class="tg-active">Groups</li>
									</ol>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>

<main id="tg-main" class="tg-main tg-haslayout" style="background-color: white;">				
				<div class="container" style="margin-top: 20px;">
					<div class="row">
						<div class="col-sm-10">
							<form class="tg-formtheme tg-formsearch">
								<fieldset>
									<input type="text" name="forumsearch" class="typeahead form-control" placeholder="Enter Unique Group Tag to search..." id="txtsearch">
									<button type="submit"><i class="icon-magnifier"></i></button>
								</fieldset>
							</form>
						</div>
						<div class="col-sm-2">
							<button class="btn " type="button" data-toggle="modal" data-target="#groupModal"><i class="fa fa-plus"></i></button><h5>Cretae New Group</h5>
							
						</div>						
					</div>
				</div>

				<div class="forum-details row">
							<div class="forums-group row" id="groupContainer">
                            <?php
                            	foreach($groupdata as $key)
                            	{		
                            		?>
			                        	<div class="group-box">
			                            	<a href="javascript:void(0)" class="join-link" data-group-id="<?=$key->groupID?>">Join Now</a>
			                            	<div class="img" style="margin-left: 20px;"><a href="javascript:void(0)"><img src="<?=base_url('upload/').$key->image?>" alt="" style="height: 100px;"></a></div>
			                                <div class="item-title" style="font-size: 16px;margin-left: 20px;"><a href="<?=site_url('brUser/GroupC/groupDetails/').$key->groupID?>" target="_blank"><?=$key->groupName?></a></div>
			                                <div class="group-status" style="margin-left: 20px;">
			                                    <span><?=$key->membercount?> Members	</span><span>Group Tag: <?=strtoupper($key->groupTag)?></span>
			                                </div>
			                                <p style="font-size: 18px;text-decoration-style:solid;margin-left: 20px;">Admin : <?php
			                                	if($key->userType=="User")
			                                	{
			                                		echo $key->adminData->userFirstName." ".$key->adminData->userLastName;
			                                	}
			                                	else
			                                	{
			                                		echo $key->adminData->authorFirstName." ".$key->adminData->authorLastName;
			                                	}
			                                	?></p>
			                                <p style="font-size: 20px;margin-left: 20px;"><?='"	'?><?=$key->groupBio?><?='	"'?></p>
			                                
			                            </div>                            		
                            		<?php
                            	}
                            ?>
	
                        </div>
				</div>
<div id="groupModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Group</h4>
      </div>
      <div class="modal-body">
      	<form method="post" action="<?=site_url('brUser/GroupC/createGroup')?>">
      		<table align="center" cellspacing="5">
      			<tr>
      				<td>Group Name:</td>
      				<td><input type="text" name="txtgroupname"></td>
      			</tr>
      			<tr>
      				<td>Group Bio:</td>
      				<td>
      					<textarea name="txtgroupbio" rows="6" cols="30" style="resize: auto;"></textarea>
      				</td>
      			</tr>
      			<tr>
      				<td></td>
      				<td>
      					<button class="btn btn-success" type="submit" id="#createGroupButton">Create Group</button>
      				</td>
      			</tr>
      		</table>	
      	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
			<!--************************************
					All Status Start
			*************************************-->
			<!--************************************
					All Status End
			*************************************-->
			<!--************************************
					Best Selling Start
			*************************************-->
			<!--************************************
					Best Selling End
			*************************************-->
			<!--************************************
					Featured Item Start
			*************************************-->
			<!--************************************
					Featured Item End
			*************************************-->
			<!--************************************
					New Release Start
			*************************************-->
			<!--************************************
					New Release End
			*************************************-->
			<!--************************************
					Collection Count Start
			*************************************-->
			<!--************************************
					Collection Count End
			*************************************-->
			<!--************************************
					Picked By Author Start
			*************************************-->
			<!--************************************
					Picked By Author End
			*************************************-->
			<!--************************************
					Testimonials Start
			*************************************-->
			<!--************************************
					Testimonials End
			*************************************-->
			<!--************************************
					Authors Start
			*************************************-->
			<!--************************************
					Authors End
			*************************************-->
			<!--************************************
					Call to Action Start
			*************************************-->
			<!--************************************
					Call to Action End
			*************************************-->
			<!--************************************
					Latest News Start
			*************************************-->
			<!--************************************
					Latest News End
			*************************************-->
		</main>
		<!--************************************
				Main End
		*************************************-->
		<!--************************************
				Footer Start
		*************************************-->
		
		<?php include_once("bottom.php")?>
		<!--************************************
				Footer End
		*************************************-->
	</div>
	<div id="ch"></div>
	<!--************************************
			Wrapper End
	*************************************-->
	<script src="resources2/js/vendor/jquery-library.js"></script>
	<script src="resources2/js/vendor/bootstrap.min.js"></script>
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
	<script src="resources2/js/owl.carousel.min.js"></script>
	<script src="resources2/js/jquery.vide.min.js"></script>
	<script src="resources2/js/countdown.js"></script>
	<script src="resources2/js/jquery-ui.js"></script>
	<script src="resources2/js/parallax.js"></script>
	<script src="resources2/js/countTo.js"></script>
	<script src="resources2/js/appear.js"></script>
	<script src="resources2/js/gmap3.js"></script>
	<script src="resources2/js/main.js"></script>
	<script src="resources2/js/dropzone.js"></script>
	<script type="text/javascript">

	</script>
	<script type="text/javascript">
		$(".linkReadList").click(function(){
			//	alert($(this).html());
			$(this).html("<span>Added to ReadList</span>");
			  $.ajax({url: '<?=site_url("brUser/HomeC/addToReadList/")?>'+$(this).data("id"), success: function(result){
			  }});			
		});
	</script>
	<script type="text/javascript">
		$("#txtsearch").keyup(function(){
			$("#groupContainer").html("");
			var searchString=$(this).val();
			$.ajax({url:"<?=site_url('brUser/GroupC/searchGroups/')?>"+searchString,success:function(result){
				var groupdata=JSON.parse(result);
				$.each(groupdata,function(idx,obj){
					var res='<div class="group-box">';
					res+='<a href="javascript:void(0)" class="join-link" data-group-id="'+obj.groupID+'">Join Now</a>';
					res+='<div class="img" style="margin-left: 20px;"><a href="javascript:void(0)"><img src="'+"<?=base_url('upload/')?>"+obj.image+'" alt="" style="height: 100px;"></a></div>';
					res+='<div class="item-title" style="font-size: 16px;margin-left: 20px;"><a href="'+"<?=site_url('brUser/GroupC/groupDetails/')?>"+obj.groupID+'">'+obj.groupName+'</a></div>';
					res+='<div class="group-status" style="margin-left: 20px;">';
					res+='<span>'+obj.membercount+' Members		</span><span>Group Tag: '+obj.groupTag.toUpperCase()+'</span></div>';
					res+='<p style="font-size: 18px;text-decoration-style:solid;margin-left: 20px;">Admin : ';
					if(obj.userType=="User")
					{
						res+=''+obj.adminData.userFirstName+' '+obj.adminData.userLastName;
					}
					else
					{
						res+=''+obj.adminData.authorFirstName+' '+obj.adminData.authorLastName;
					}
					res+='<p>';
					res+='<p style="font-size: 20px;margin-left: 20px;">'+'" '+obj.groupBio+' "'+'</p></div>';
					$("#groupContainer").append(res);
				});
			}});
		});
	</script>	
	<script type="text/javascript">

		$(document).on("click",".join-link",function(){
			var groupID=$(this).data("group-id");
			//alert(groupID);
			var o=$(this);
			if(o.html()!="Joined")
			{
				$.ajax({url:"<?=site_url('brUser/GroupC/addMember/')?>"+groupID,success:function(result){if(result=="0")
					{
						o.html("Joined");
					}
					else
					{
						alert("You are already a member of this group.");
						o.html("Joined");
					}
			}});					
			}

		});

	</script>

</body>

<!-- Mirrored from exprostudio.com/html/book_library/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Apr 2019 12:11:23 GMT -->
</html>
