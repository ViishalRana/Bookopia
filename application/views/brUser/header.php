
<header id="tg-header" class="tg-header tg-haslayout" style="background-color: #f2f7fb;">

			<div class="tg-middlecontainer">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<strong class="tg-logo"><a href="<?=site_url("brUser/HomeC")?>"><img src="resources/assets/images/bookopia3.jpg" alt="company name here" style="height: 100px;width: 218px;"></a></strong>

							<div class="tg-wishlistandcart">
								
								<div class="dropdown tg-themedropdown tg-minicartdropdown" style="margin-left: 10px;margin-right: 10px;">
									<a href="javascript:void(0);" id="rlicon" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="tg-themebadge" id="rlcnt">0</span>
										<i class="icon-heart"></i>
										<span>ReadList</span>
									</a>
									<div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-minicart">
										<div class="tg-minicartbody" id="mncb">
											
										</div>

									</div>
								</div>
								<div class="dropdown tg-themedropdown tg-minicartdropdown" style="margin-right: 10px;">
									<a href="javascript:void(0);" id="tg-notification" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="sendalert()">
										<span class="tg-themebadge" id="notcnt" onload="getNew()">0</span>
										<i class="fa fa-bell-o"></i>
										<span>Notification</span>
									</a>
									<div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-notification">
										<div class="tg-minicartbody">
											<div class="tg-minicarproduct" id="loadNotification">
												
												<!-- <div class="tg-minicarproductdata">
													<h5><a href="javascript:void(0);">Our State Fair Is A Great Function</a></h5>
													<h6>
												</div> -->

											</div>
										</div>
										
									</div>
								</div>								

								<div class="dropdown tg-themedropdown tg-wishlistdropdown">
									<a href="javascript:void(0);" id="tg-wishlisst" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<div>
										<table cellpadding="10" cellspacing="5">
										<tr><td>
										<?php
											if($this->session->userPhoto!="")
											{
												$imag=base_url("upload/").$this->session->userPhoto;
											}
										?>
										<img src="<?=$imag?>" class="img-responsive img-circle" alt="User-Profile-Image" style="width:30px;height:30px;">
										</td><td>
											<p class="pt-4">Hi,<?=$this->session->userFirstName?></p>
										</td></tr>
										</table>
										</div>
									</a>

									<div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-minicart">
										
										<div class="tg-minicartbody">
											<div class="tg-minicarproduct">
												<div class="tg-minicarproductdata">
														<a class="tg-btnemptycart" href="<?=site_url("brUser/ManageProfileC/")?>">
														<i class="fa fa-user-circle" aria-hidden="true" style="font-size: 24px;"></i>
														<span>Manage Profile</span>
														</a>
												</div>
											</div>
										</div>
										<div class="tg-minicartbody">
											<div class="tg-minicarproduct">
												<div class="tg-minicarproductdata">
														<a class="tg-btnemptycart" href="<?=site_url("brUser/GroupC/myGroups")?>">
															<i class="fa fa-group" aria-hidden="true" style="font-size: 24px;"></i>
														<span>My Groups</span>
														</a>
												</div>
											</div>
										</div>
										<div class="tg-minicartbody">
											<div class="tg-minicarproduct">
												<div class="tg-minicarproductdata">
														<a class="tg-btnemptycart" href="<?=site_url("brUser/LogoutC")?>">
														<i class="fa fa-sign-out" style="font-size: 24px;"></i>

														<span>Logout</span>
														</a>
												</div>
											</div>
										</div>

									</div>
								</div>

							</div>

							<div class="tg-searchbox">
								<form method="post" class="tg-formtheme tg-formsearch" action="<?=site_url("brUser/SearchC/searchAdvanceBook")?>">
									<fieldset>
										<input type="text" name="searchAdvance" class="typeahead form-control" placeholder="Search by title, author, keyword, ISBN...">
										<button type="submit"><i class="icon-magnifier"></i></button>
									</fieldset>
									<!-- <a href="javascript:void(0);"></a> -->
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tg-navigationarea">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<nav id="tg-nav" class="tg-nav">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
									<ul>


										<li class="menu-item-has-children menu-item-has-mega-menu">
											<a href="javascript:void(0);" >All Genre</a>
											<div class="mega-menu">
												<ul class="tg-themetabnav" role="tablist">

													<!-- 
														<li role="presentation" class="active">
														<a href="#artandphotography" aria-controls="artandphotography" role="tab" data-toggle="tab"><?=$key->genreName?></a>
														</li>
														 -->
													<?php
														foreach ($genres as $key) 
														{
													?>
													<li role="presentation">
														<a href="#genres<?= $key->genreID ?>" aria-controls="genres<?= $key->genreID ?>" role="tab" data-toggle="tab"><?= $key->genreName ?></a>
													</li>
													<?php
														}
													?>
												</ul>
												<div class="tab-content tg-themetabcontent">
													<?php
														foreach ($genres as $key) 
														{
													?>
													<div role="tabpanel" class="tab-pane " id="genres<?= $key->genreID ?>">
														<ul>
															<li>
																<div class="tg-linkstitle">
																	<h2><?=$key->genreName?></h2>
																</div>
																<ul>
																			<?php
																			if($key->gID!=null)
																			{
																		foreach($key->gID as $qey)
																		{
																	?>
																	<li><a href="<?=site_url("brUser/HomeC/viewMore/$qey->bookID")?>"><?= $qey->bookTitle ?></a></li>
																	<?php
																		}																				
																			}
																	?>
																</ul>
																<a class="tg-btnviewall" href="<?=Site_url("brUser/HomeC/getGenreBook/"."$key->genreID")?>">View All</a>
															</li>
														</ul>
														<ul>
															<li>
																<figure><img src="resources2/images/img-01.png" alt="image description"></figure>
																<div class="tg-textbox">
																	
																	<a class="tg-btn" href="<?=Site_url("brUser/HomeC/getGenreBook/"."$key->genreID")?>">view all</a>
																</div>
															</li>
														</ul>
													</div>
													<?php
														}
													?>

												</div>
											</div>
										</li>


																				<li class="">
											<a href="<?=site_url("brUser/HomeC/")?>">Home</a>
										</li>
										<li class="">
											<a href="<?=site_url("brUser/AuthorC/getAuthor")?>">Authors</a>
										</li>
										
										<li><a href="<?=site_url("brUser/SearchC/")?>">Search Book</a></li>
										<li class="">
											<a href="<?=site_url("brUser/ForumC/")?>">Forums</a>
										</li>
										<li><a href="<?=site_url("brUser/GroupC/")?>">Groups</a></li>
									</ul>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
		  	  <script src="resources2/js/vendor/jquery-library.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({url:"<?=site_url('brUser/HomeC/getReadListCount')?>",success:function(result){
			$("#rlcnt").html(""+result);
		}});		
	});
	$("#rlicon").click(function(){
		$("#mncb").html("");						
		$.ajax({url:"<?=site_url('brUser/HomeC/getReadListData')?>",success:function(result){
			var bookdata=JSON.parse(result);
			$.each(bookdata,function(idx,obj){
				var	res='<div class="tg-minicarproduct" id="rdlb'+obj.bookID+'">';
				res+='<figure>';
				res+='<img height="100" width="75" src="'+"<?=base_url('upload/')?>"+obj.bookData.bookCoverImage+'" alt="image description">';					
				res+='</figure>';
				res+='<div class="tg-minicarproductdata">';
				res+='<h5><a href="'+"<?=site_url('brUser/HomeC/viewMore/')?>"+obj.bookID+'">'+obj.bookData.bookTitle+'</a><a href="javascript:void(0)" class="rmvBook" data-readlist-id="'+obj.readListID+'" data-book-id="'+obj.bookID+'"><i style="color:red;font-size:14px;" class="fa fa-minus-square-o"></i></a></h5>';
				res+='</div>';
				res+='</div>';
				$("#mncb").append(res);				
			});
		}});
	});
</script>
<script type="text/javascript">
	$(document).on("click",".rmvBook",function(){
		var bookID=$(this).data("book-id");
		var readListID=$(this).data("readlist-id");
		$.ajax({url:"<?=site_url('brUser/HomeC/removeBookFromReadList/')?>"+readListID,success:function(result){
			//alert(result);
		}});
		var rlcnt=$("#rlcnt").html();
		rlcnt=parseInt(rlcnt)-1;
		$("#rlcnt").html(""+rlcnt);		
		$("#rdlb"+bookID).remove();
	});
</script>

		<script type="text/javascript">

			setTimeout(function(){
				$("#notcnt").html("0");
				$.ajax({url:"<?=site_url('brUser/HomeC/getNewNoti')?>",success:function(result){
					var c=$("#notcnt").html();
						c=parseInt(c)+parseInt(result);
						//alert();
						$("#notcnt").html(""+c);
				}});
			},100);
			function sendalert()
			{
				$("#notcnt").html("0");
				var d=new Date($.now());
				var today = new Date();
				var dd = today.getDate();

				var mm = today.getMonth()+1; 
				var yyyy = today.getFullYear();
				if(dd<10) 
				{
				dd='0'+dd;
				} 

				if(mm<10) 
				{
				mm='0'+mm;
				} 
				today = yyyy+'-'+mm+'-'+dd;
				var dt = new Date();
				hr=dt.getHours();
				m=dt.getMinutes();
				s=dt.getSeconds();
				if(hr<10)
				{
					hr='0'+hr;
				}
				if(m<10)
				{
					m='0'+m;
				}
				if(s<10)
				{
					s='0'+s;
				}
				var time = hr + ":" + m + ":" + s;
				var olt=today+' '+time;
				var olt=encodeURIComponent(olt);
					$.ajax({url: "<?=site_url('brUser/HomeC/setLastActiveSession/')?>"+olt, success: function(result){
						//alert(result);	
					}});
				$.ajax({url: "<?=site_url("brUser/AuthorC/getNotification/")?>", success: function(result){
					
					$("#loadNotification").html("");
					var notdata=JSON.parse(result);
					$.each(notdata,function(idx,obj){
						var res='<div class="" style="word-break:break-word;">';
						res +='<h5>'+obj.message+'</h5>';
						res+='</div>';
						$("#loadNotification").append(res);
					});
				}});
			}

				var today = new Date();
				var dd = today.getDate();

				var mm = today.getMonth()+1; 
				var yyyy = today.getFullYear();
				if(dd<10) 
				{
				dd='0'+dd;
				} 

				if(mm<10) 
				{
				mm='0'+mm;
				} 
				today = yyyy+'-'+mm+'-'+dd;
				var dt = new Date();
				hr=dt.getHours();
				m=dt.getMinutes();
				s=dt.getSeconds();
				if(hr<10)
				{
					hr='0'+hr;
				}
				if(m<10)
				{
					m='0'+m;
				}
				if(s<10)
				{
					s='0'+s;
				}
				var time = hr + ":" + m + ":" + s;
				var olt=today+' '+time;
				var olt=encodeURIComponent(olt);
				setInterval(function(){
				$.ajax({url: "<?=site_url("brUser/AuthorC/getNewNotification/")?>"+olt, success: function(result){
						var c=$("#notcnt").html();
						c=parseInt(c)+parseInt(result);
						//alert();
						$("#notcnt").html(""+c);
						//alert(c);
				dt = new Date();
				hr=dt.getHours();
				m=dt.getMinutes();
				s=dt.getSeconds();
				if(hr<10)
				{
					hr='0'+hr;
				}
				if(m<10)
				{
					m='0'+m;
				}
				if(s<10)
				{
					s='0'+s;
				}
			 	time = hr + ":" + m + ":" + s;
				olt=today+' '+time;
				olt=encodeURIComponent(olt);						
				}});
			},20000);

		</script>
		<script type="text/javascript">
			setInterval(function(){
				$.ajax({url:"<?=site_url('brUser/HomeC/getUserStatus')?>",success:function(result){
					//alert(result);
					window.location.replace("<?=site_url('brUser/LogoutC')?>");
				}});
			},20000);
		</script>



