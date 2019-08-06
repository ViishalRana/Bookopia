<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang=""> <!--<![endif]-->

<!-- Mirrored from exprostudio.com/html/book_library/products.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 May 2019 09:45:21 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bookopia</title>
	<base href="<?=base_url();?>">
	<link rel="icon" href="resources/assets/icon/title_icon.png" type="image/x-icon">	
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?=base_url();?>">
	<?php include_once("topscript.php")?>
</head>
<style type="text/css">
	.checked
	{
		color: orange;
	}
	.pagination{
		margin: 0px;
		text-align: center;
		width: 100%;
		margin-top: 20px;
		display: inline-block;
		padding-left: 0;
		border-radius: 4px;
	}
	.pagination ul{
		padding: 0px;
		margin: 0px;
		display: inline-block;
	}

	.pagination ul li{
		list-style: none;
		padding: 5px;
		display: inline-block;
		vertical-align: text-top;
	}

	.pagination ul li a{
		width: 50px;
		line-height: 40px;
		color: #333;
		text-align: center;
		font-size: 14px;
		text-decoration: none;
		border: solid 1px #e0e0e0; 
		display: inline-block;
		text-transform: uppercase;
	}
</style>
<body>
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
				Inner Banner Start
				*************************************-->
				<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="resources2/images/parallax/bgparallax-07.jpg">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-innerbannercontent">
									<h1>Search Books</h1>
									<ol class="tg-breadcrumb">
										<li><a href="javascript:void(0);">home</a></li>
										<li class="tg-active">Search Books</li>
									</ol>
								</div>
							</div>
						</div>
					</div>
				</div>
		<!--************************************
				Inner Banner End
				*************************************-->
		<!--************************************
				Main Start
				*************************************-->
				<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					News Grid Start
					*************************************-->
					<div class="tg-sectionspace tg-haslayout">
						<div class="container">
							<div class="row">
								<div id="tg-twocolumns" class="tg-twocolumns">
									<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
										<div id="tg-content" class="tg-content">
											<div class="tg-products">
												<div class="tg-sectionhead">
													<h2><span></span>Search Results</h2>
												</div>


												<div class="tg-productgrid">
													

													<div class="row col-md-12">  
														<div id="allBooks">
														</div>


														

													</div>
													<center>
														<div class="pagination">
															<ul class="tsc_pagination">
																<li id="pagination"></li>
															</ul>
														</div>
													</center>

												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
										<aside id="tg-sidebar" class="tg-sidebar">
											<div class="tg-widget tg-widgetsearch">
												<form class="tg-formtheme tg-formsearch">
													<div class="form-group">
														<button type="submit"><i class="icon-magnifier"></i></button>
														<input type="search" name="txtSearch" class="form-group" placeholder="Search by title, author, key..." id="txtSearch">
													</div>
												</form>
											</div>
											<div class="tg-widget tg-catagories">
												<div class="tg-widgettitle">
													<h3>Genres</h3>
												</div>
												<div class="tg-widgetcontent">
													<ul>
														<div id="gen">
															<?php
															foreach ($genres as $key) 
															{
																?>
																<li>
																	<a href="javascript:void(0);">
																		<input type="checkbox" name="checkboxGenre" value="<?=$key->genreID?>" class="checkGenre">
																		<span><?= $key->genreName?></span>
																		<em>
																			<?php
																			foreach ($key->count as $key1) 
																			{
																				echo $key1->cnt;
																			}
																			?>
																		</em>
																	</a>
																</li>
																<?php
															}
															?>
														</div>
														<li><a href="javascript:void(0);" id="view"><span>View All</span></a></li>
														<a href="javascript:void(0);" id="less" style="visibility: hidden;display: none;"><span>View Less</span></a> 
													</ul>
												</div>
											</div>

											<div class="tg-widget tg-widgettrending">
												<div class="tg-widgettitle">
													<h3>Ratings</h3>
												</div>
												<div class="tg-widgetcontent">
													<ul>

														<li>
															<article class="tg-post">
																<div class="row">
																	<span style="color: #ffb64d;">
																		<?php
																		echo "<div class='col-sm-12'>";
																		for ($i = 10; $i >= 1; $i--)
																		{
																			?>
																			<div class='row'>
																				
																				<div class="col-md-10" style="padding-left: 30px" >
																					<?php
																					for ($j = 1; $j <= $i; $j++)
																					{
																						?>
																						<!-- <span class="fa fa-star f-12" style="color: #ffb64d;"></span> -->
																						<i class="fa fa-star" style="font-size: 14px;padding: 0px"></i>
																						<?php
																					}
																					?>
																				</div>
																				<div class="col-md-2" style="padding-left: 30px">
																					<input type="checkbox" name="checkRate" class="checkRate" value="<?=$i?>">
																				</div>
																				
																			</div>
																			<?php
																		}
																		?> 
																	</div>

																</span>
															</div>
														</article>
													</li>


												</ul>
											</div>
										</div>


									</aside>
								</div>
							</div>
						</div>
					</div>
				</div>
			<!--************************************
					News Grid End
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
	<!--************************************
			Wrapper End
			*************************************-->
			<script src="resources2/js/vendor/jquery-library.js"></script>
			<script src="resources2/js/vendor/bootstrap.min.js"></script>
			<script src="resources2/https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
			<script src="resources2/js/owl.carousel.min.js"></script>
			<script src="resources2/js/jquery.vide.min.js"></script>
			<script src="resources2/js/countdown.js"></script>
			<script src="resources2/js/jquery-ui.js"></script>
			<script src="resources2/js/parallax.js"></script>
			<script src="resources2/js/countTo.js"></script>
			<script src="resources2/js/appear.js"></script>
			<script src="resources2/js/gmap3.js"></script>
			<script src="resources2/js/main.js"></script>
		</body>

		<!-- Mirrored from exprostudio.com/html/book_library/products.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 May 2019 09:45:48 GMT -->
		</html>

		<script type="text/javascript">

	$("#view").click(function(){
		var htmlText="";
			// alert(2);
			$.ajax({
				url:"<?=site_url("brUser/SearchC/showMore")?>",
				success:function(result){
					var gens=JSON.parse(result);
				// alert(gens);
				var key=gens.genres1;
				$("#gen").empty();
				for(var data in key)
				{
					 // alert(data);
					 htmlText+='<li>';
					 htmlText+='<a href="javascript:void(0);">';
					 htmlText+='<input type="checkbox" name="checkboxGenre" value="'+key[data].genreID+'" class="checkGenre">';
					 htmlText+='<span>'+key[data].genreName+'</span>';
					 htmlText+='<em>';
					 for(var data1 in key[data].count)
					 {
						// alert();
						htmlText+=key[data].count[data1].cnt;		
					}
					htmlText+='</em>';
					htmlText+='</a>';
					htmlText+='</li>';
				}
				$('#gen').append(htmlText);
				$("#less").css({"visibility":"visible","display":"block"});
				$("#view").css({"visibility":"hidden","display":"none"});
			}
		});
		});

	$("#less").click(function(){
		// alert(1);
		var htmlText="";
		$.ajax({
			url:"<?=site_url("brUser/SearchC/showLessGenre")?>",
			success:function(result){
				var gens=JSON.parse(result);
				// alert(gens);
				var key=gens.genres;
				$("#gen").empty();
				// alert(key);
				for(var data in key)
				{
					 // alert(data);
					 htmlText+='<li>';
					 htmlText+='<a href="javascript:void(0);">';
					 htmlText+='<input type="checkbox" name="checkboxGenre" value="'+key[data].genreID+'" class="checkGenre">';
					 htmlText+='<span>'+key[data].genreName+'</span>';
					 htmlText+='<em>';
					 for(var data1 in key[data].count)
					 {
						// alert();
						htmlText+=key[data].count[data1].cnt;		
					}
					htmlText+='</em>';
					htmlText+='</a>';
					htmlText+='</li>';
				}
				$("#less").css({"visibility":"hidden","display":"none"});
				$("#view").css({"visibility":"visible","display":"block"});
				$('#gen').append(htmlText);
			}

		});
	});
	
</script>

<script type="text/javascript">
	function createGenreList()
	{
		var genreList = "0";
		//genreList = [];
		$.each($("input[name='checkboxGenre']:checked"), function(){
			genreList+=",";            
			genreList+=$(this).val();
		});
		return genreList;

	}
	function createRateList()
	{
		var rateList = "0";
		//rateList = [];
		$.each($("input[name='checkRate']:checked"), function(){            
			rateList+=",";
			rateList+=$(this).val();
				//	alert($(this).val());
			});
		return rateList;
	}

	$(document).on("click",".checkGenre",function(){
		genreList=createGenreList();
		rateList=createRateList();
		//alert(genreList);
				// genreList.join(", ");
		loadPagination(0,rateList,genreList);
	});

	$(document).on("click",".checkRate",function(){	
		genreList=createGenreList();
		rateList=createRateList();
		//alert(rateList);
		//rateList.join(", ");
		loadPagination(0,rateList,genreList);
	});		

	loadPagination(0,"0","0");

	$('#pagination').on('click','a',function(e){
		genreList=createGenreList();
		rateList=createRateList();

		e.preventDefault(); 
		var pageno = $(this).attr('data-ci-pagination-page');
		loadPagination(pageno,rateList,genreList);
	});


	function loadPagination(pagno,rateList,genreList){
				rateList=encodeURIComponent(rateList);
				genreList=encodeURIComponent(genreList);
				 /*alert("funrl"+rateList);
				 alert("fungl"+genreList);*/
				var bs = "<?=base_url("upload/")?>";
				var htmlText = "";
				$.ajax({
					url: '<?= site_url('brUser/SearchC/paginate/')?>'+pagno+'/'+rateList+'/'+genreList,
					success: function(result){
						 /*alert(result);*/
						var res = JSON.parse(result);
						//console.log(res);
						$('#pagination').html(res.pagination);
						var key = res.bookData;
						$('#allBooks').html("");
						for (var data in key)
						{
							htmlText+='<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">';
							htmlText+='<div class="tg-postbook" style="height: 300px;min-height: 0px;">';
							htmlText+='<figure class="tg-featureimg">';
							htmlText+='<div class="tg-bookimg">';
							htmlText+='<div class="tg-frontcover">';
							htmlText+='<img src="'+bs+key[data].bookCoverImage+'" alt="image description" style="height: 200px;">';
							htmlText+='</div>';
							htmlText+='<div class="tg-backcover">';
							htmlText+='<img src="resources2/images/books/img-01.jpg" alt="image description">';
							htmlText+='</div>';
							htmlText+='</div>';
							htmlText+='</figure>';
							htmlText+='<div class="tg-postbookcontent">';
							htmlText+='<div class="tg-booktitle">';
							htmlText+="<a href='"+"<?=site_url('brUser/HomeC/viewMore/')?>"+key[data].bookID+"'><h3>"+key[data].bookTitle+'</h3></a>';
														
							htmlText+='</div>';
							htmlText+='</div>';
							htmlText+='</div>';
							htmlText+='</div>';
						}
						$('#allBooks').html(htmlText);
					}
				});
			}
		</script>
		
		<script type="text/javascript">
			
			$("#txtSearch").keyup(function(){
				var search=$("#txtSearch").val();
				var bs = "<?=base_url("upload/")?>";
				var htmlText = '';

				$.ajax({
					type:"POST",
					data:{search :search},
					url:"<?=site_url("brUser/SearchC/searchBook")?>",
					success:function(result)
					{
						var res=JSON.parse(result);
						var key=res.searchData;
						var key2=res.searchData2;
						// alert(res);
						$('#allBooks').html("");

						for (var data in key)
						{
							htmlText+='<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">';
							htmlText+='<div class="tg-postbook" style="height: 300px;min-height: 0px;">';
							htmlText+='<figure class="tg-featureimg">';
							htmlText+='<div class="tg-bookimg">';
							htmlText+='<div class="tg-frontcover">';
							htmlText+='<img src="'+bs+key[data].bookCoverImage+'" alt="image description" style="height: 200px;">';
							htmlText+='</div>';
							htmlText+='<div class="tg-backcover">';
							htmlText+='<img src="resources2/images/books/img-01.jpg" alt="image description">';
							htmlText+='</div>';
							htmlText+='</div>';
							htmlText+='</figure>';
							htmlText+='<div class="tg-postbookcontent">';
							htmlText+='<div class="tg-booktitle">';
							htmlText+='<h3>'+key[data].bookTitle+'</h3>';
							htmlText+='</div>';
							htmlText+='</div>';
							htmlText+='</div>';
							htmlText+='</div>';
						}

						for (var data in key2)
						{
							htmlText+='<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">';
							htmlText+='<div class="tg-postbook" style="height: 300px;min-height: 0px;">';
							htmlText+='<figure class="tg-featureimg">';
							htmlText+='<div class="tg-bookimg">';
							htmlText+='<div class="tg-frontcover">';
							htmlText+='<img src="'+bs+key2[data].bookCoverImage+'" alt="image description" style="height: 200px;">';
							htmlText+='</div>';
							htmlText+='<div class="tg-backcover">';
							htmlText+='<img src="resources2/images/books/img-01.jpg" alt="image description">';
							htmlText+='</div>';
							htmlText+='</div>';
							htmlText+='</figure>';
							htmlText+='<div class="tg-postbookcontent">';
							htmlText+='<div class="tg-booktitle">';
							htmlText+='<h3>'+key2[data].bookTitle+'</h3>';
							htmlText+='</div>';
							htmlText+='</div>';
							htmlText+='</div>';
							htmlText+='</div>';
						}
						$('#allBooks').append(htmlText);

					}
				});
			});
		</script>


		