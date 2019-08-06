<?php
$likedp=array();
foreach($likedposts as $key)
{
	$likedp[]=$key->forumPostID;
}

?>
<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang=""> <!--<![endif]-->

<!-- Mirrored from exprostudio.com/html/book_library/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Apr 2019 12:10:28 GMT -->
<head>
	<title>Bookopia</title>
	<base href="<?=base_url();?>">
	<link rel="icon" href="resources/assets/icon/title_icon.png" type="image/x-icon">	
	<?php include_once("topscript.php")?>
	<style type="text/css">
		hr.style-one {
			border: 0;
			height: 1px;
			background: #333;
			background-image: -webkit-linear-gradient(left, #ccc, #333, #ccc);
			background-image: -moz-linear-gradient(left, #ccc, #333, #ccc);
			background-image: -ms-linear-gradient(left, #ccc, #333, #ccc);
			background-image: -o-linear-gradient(left, #ccc, #333, #ccc);
		}	
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
					<h1>Forums</h1>
					<ol class="tg-breadcrumb">
						<li><a href="<?=site_url("brUser/HomeC/")?>">Home</a></li>
						<li class="tg-active"><?=$forumdata->forumName?></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</div>
<br>

<main id="tg-main" class="tg-main tg-haslayout" style="background-color: white;">	

	<h2 align="center"><?=$forumdata->forumName?></h2><hr class="style-one">
	<?php
	foreach($postdata as $key)
	{
		if($key->userType=="Author")
		{
			$name=$key->userData->authorFirstName." ".$key->userData->authorLastName;
			$src=base_url("upload/").$key->userData->authorPhoto;	
			$href=site_url("brUser/AuthorC/authorInfo/$key->userID");
		}
		else
		{
			$name=$key->userData->userFirstName." ".$key->userData->userLastName;
			$src=base_url("upload/").$key->userData->userPhoto;	
			$href="javascript:void(0)";

		}
		?>
		<div class="tg-authorbox" style="">
			<figure class="tg-authorimg"style="width: 70px;height: 70px;background: #fff;border-radius: 50%;margin: 0 auto 30px;border: 1px solid #dbdbdb;">
				<img src="<?=$src?>" alt="image description" style="width: 70px;height: 70px;background: #fff;border-radius: 50%;margin: 0 auto 30px;border: 1px solid #dbdbdb;">
			</figure>													
			<div class="tg-authorinfo">
				<div class="tg-authorhead">
					<div class="tg-leftarea" style="padding: 20px;">
						<div class="tg-authorname">
							<h2><?=$name?></h2>
							<?php
							$nd = $key->postDate;

							$createDate = new DateTime($nd);

							$strip = $createDate->format('Y-m-d');
							?>																			
							<span><?=$strip?></span>
						</div>
					</div>
					<div class="tg-description card">
						<p class="card-block" style="padding: 10px;"><?=$key->userPost?></p>
					</div>
					<div class="tg-description" style="font-size: 12px;color: green;">
						<u><a href="javascript:void(0)" style="font-size: 14px;color: green;" class="like" data-forum-id="<?=$forumdata->forumID?>" data-post-id="<?=$key->forumPostID?>" id="like-<?=$key->forumPostID?>"><?php if(in_array($key->forumPostID,$likedp)){echo "Unlike";}else echo "Like";?> <?=$key->postLikes?></a></u>
						<u><a href="javascript:void(0)" style="margin-left: 10px;columns: green;" class="comment" data-post-id="<?=$key->forumPostID?>" data-toggle="modal" data-target="#commentModal">Comment <?=$key->postComments?></a></u>
					</div>														
				</div>
			</div>
		</div>


		<?php			
	}
	?>
	<form align="center">
		<textarea placeholder="Share something.." id="postdata" style="align-self: center;margin-top: 20px;height: 100px;resize: none;" class="col-sm-6 col-md-12"></textarea><br>
		<input type="button" name="btnpost" id="btnpost" value="Post" style="height: 50px;width: 150px;" class="btn waves-effect waves-light hor-grd btn-grd-success">
	</form>


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
<div class="modal fade" id="commentModal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Comments</h4>
			</div>
			<div class="modal-body">
				<div id="commentBody">

				</div>
				<div class="row">
					<form method="post" id="commentForm" action="">
						<input type="text" class="col-sm-8" name="txtComment" id="txtComment" style="margin-left: 35px;margin-top: 10px;" placeholder="Add a comment" required>
						<input type="button" name="btnAdd" id="btnAddComment" class="btn btn-success col-sm-2" style="margin-left: 45px;margin-top: 10px;" value="Post">
					</div></form>
				</div>

			</div>
		</div>
	</div>			
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
	$(".linkReadList").click(function(){
		$(this).html("<span>Added to ReadList</span>");
		$.ajax({url: '<?=site_url("brUser/HomeC/addToReadList/")?>'+$(this).data("id"), success: function(result){
		}});			
	});
	$("#btnpost").click(function(){
		var data=$("#postdata").val();
		if(data!="")
		{
			$.ajax({type:"POST",data:{postData : data,forumID : "<?=$forumdata->forumID?>"},url: '<?=site_url("brUser/ForumC/addForumPost/")?>', success: function(result){
				location.reload(true);
			}});
		}
		else
		{
			$("#postdata").focus();
		}
	});
	var str1="";
	$(".like").click(function(){
		var postID=$(this).data("post-id");
		var forumID=$(this).data("forum-id");
		var likeAnchor=$(this);
		$.ajax({
			url: '<?=site_url("brUser/ForumC/addForumPostLike/")?>'+postID+"/"+forumID, 
			success: function(result){
				str1=result;
				likeAnchor.html(str1);
			}			
		});
	});
	$(".comment").click(function(){
		var postID=$(this).data("post-id");
		$("#commentForm").attr("action","<?=site_url('brUser/ForumC/addForumPostComment/')?>"+postID);
		$("#commentBody").html("");
		var commentData="";
		$.ajax({
			url:"<?=site_url('brUser/ForumC/getForumPostComments/')?>"+postID,
			success: function(result){
				commentData=JSON.parse(result);
				$.each(commentData,function(idx,obj){
					var res="<div class='row' style='padding:10px;border-style:solid;border-width:1px;margin-bottom:5px;'>";
					if(obj.userType=="Author")
					{
						var src=obj.userData.authorPhoto;
						var name=obj.userData.authorFirstName+" "+obj.userData.authorLastName;
					}
					else
					{
						var src=obj.userData.userPhoto;
						var name=obj.userData.userFirstName+" "+obj.userData.userLastName;
					}
					res=res+"<p>"+"<img src='"+"<?=base_url('upload/')?>"+src+"' class='circle' style='height:40px;width:40px;border-radius:50%;'>";
					res=res+"<strong style='font-size:14px;margin-left:2px;font-weight:bold;'>"+name+"</strong> ";
					res=res+obj.comment+"</p>"
					res=res+"</div>";
					$("#commentBody").append(res);
				});
			}
		});
	});
	$("#btnAddComment").click(function(){
		var turl=$("#commentForm").attr("action");
		var data=$("#txtComment").val();
		if(data!="")
		{
		$.ajax({
			type:"POST",
			data:{commentData : data},url: turl, 
			success: function(result){
				$("#txtComment").val("");
				var src="<?=$this->session->userPhoto?>";
				var name="<?=$this->session->userFirstName?>"+" "+"<?=$this->session->userLastName?>";    		
				var res="<div class='row' style='padding:10px;border-style:solid;border-width:1px;margin-bottom:5px;'>";
				res=res+"<p>"+"<img src='"+"<?=base_url('upload/')?>"+src+"' class='circle' style='height:40px;width:40px;border-radius:50%;'>";
				res=res+"<strong style='font-size:14px;margin-left:2px;font-weight:bold;'>"+name+"</strong> ";
				res=res+data+"</p>"
				res=res+"</div>"; 
				$("#commentBody").append(res);
			}
		});
	}
	else
	{
		$("#txtComment").focus();
	}
	});
</script>

</body>

<!-- Mirrored from exprostudio.com/html/book_library/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Apr 2019 12:11:23 GMT -->
</html>
