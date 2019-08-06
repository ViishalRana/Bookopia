<?php
$title="Edit Books";
$desc="Edit a Book";
$link="<a href='".site_url('brAdmin/BookC/')."'>Books</a>";
$date=date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=$title?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<?php include_once('topscript.php'); ?>
	<?php
	if(isset($error) && !empty($error))
	{
		?>
		<script type="text/javascript">
			alert("FIle can not be uploaded");
		</script>
		<?php
	}
	?>
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
												<h4 class="sub-title">Books Detail</h4>
												<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Genre</button>
												<div id="myModal" class="modal fade" role="dialog">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title">Add Genre</h4>
																<button type="button" class="close" data-dismiss="modal" id="modalClose">&times;</button>
															</div>
															<div class="modal-body" id="mb">
																<form method="post" action="<?=site_url("brAdmin/BookC/addBookGenre/$books->bookID")?>" enctype="multipart/form-data" id="genreForm">
																	<div class="form-group row">
																		<label class="col-sm-12 col-form-label">Genre List</label>
																		<?php
																			foreach ($genres as $key) {
																				?>
																					
																				<label class="col-sm-6 col-form-label" style="margin-bottom: 5px;"><?=$key->genreName?></label><input type="checkbox" style="margin-bottom: 5px;" name="chkGenre[]" value="<?=$key->genreID?>" class="form-control col-sm-6">
																				
																				<?php
																			}
																		?>
																	</div>

																	<div class="form-group row">
																		<label class="col-sm-4 col-form-label"></label>
																		<div class="col-sm-8">
																			<input class="btn btn-inverse btn-round waves-effect waves-light col-md-12" type="submit" name="btnAdd" value="Add Genres" id="btnsubmit">
																		</div>
																	</div>			     		
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="card-block">

												<form enctype="multipart/form-data" action=
												"<?php
												if(isset($books))
												echo site_url("brAdmin/BookC/editBook/$books->bookID");
												else
												echo site_url("brAdmin/BookC/")
												?>" method="post">

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Book Title</label>
													<div class="col-sm-10">
														<input type="text" name="txtbookTitle" class="form-control" placeholder="Enter Book Name" value="<?php if(isset($books->bookTitle))
														echo $books->bookTitle;
														?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Book Pages</label>
													<div class="col-sm-10">
														<input type="text" name="txtbookPages" class="form-control" placeholder="Enter total Book Pages" value="<?php if(isset($books->bookPages))
														echo $books->bookPages;
														?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Book Edition</label>
													<div class="col-sm-10">
														<input type="text" name="txtbookEdition" class="form-control" placeholder="Enter Book Edition" value="<?php if(isset($books->bookEdition))
														echo $books->bookEdition;
														?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Book Synopsis</label>
													<div class="col-sm-10">
														<textarea rows="5" cols="5" name="txtbookSynopsis" class="form-control" placeholder="Enter Book Synopsis"><?php if(isset($books->bookSynopsis))
														echo $books->bookSynopsis;
														?></textarea>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Book ISBN</label>
													<div class="col-sm-10">
														<input type="text" name="txtbookISBN" class="form-control" placeholder="Enter Book ISBN" value="<?php if(isset($books->bookISBN))
														echo $books->bookISBN;
														?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Book Published Date</label>
													<div class="col-sm-10">
														<?php
														if(isset($books))
														{
															$nd = $books->bookPublisherDate;

															$createDate = new DateTime($nd);

															$strip = $createDate->format('Y-m-d');
																	//echo $strip;
														}
														?>
														<input type="date" name="dtbookDate" class="form-control" placeholder="Enter Book Published Date" value="<?php
														if(isset($books))
														echo $strip;
														else
														echo $date;
														?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Book Publisher</label>
													<div class="col-sm-10">
														<select name="lstbookPublisher" class="form-control">
															<option value="0">Select One Value Only</option>
															<?php
															foreach ($pubs as $pub) {
																# code...
																?>
																<option value="<?=$pub->publisherID?>" 
																	<?php  
																	if(isset($books->bookPublisherID))
																	{
																		if($books->bookPublisherID==$pub->publisherID)
																			echo "selected";
																	}
																	?>
																	><?=$pub->publisherName?></option>
																	<?php
																}
																?>
															</select>
														</div>
													</div>

													<div class="form-group row">
														<label class="col-sm-2 col-form-label">Book Cover Photo</label>
														<div class="col-sm-10 row">
															<div class="col-sm-9">
																<input type="file" name="imgbookCoverPhoto" class="form-control" >	
															</div>
															<div class="col-sm-3">
																<?php
																if(isset($books))
																{
																	?>
																	<img src="<?= base_url();?>upload/<?= $books->bookCoverImage?>" caption="Book Cover Image" alt="Book Cover Image" width="100" height="100">
																	<?php
																}
																?>
															</div>
														</div>
													</div>

													<div class="form-group row"><label class="col-sm-2 col-form-label"></label>
														<div class="col-sm-10">
															<!-- <button class="btn btn-inverse btn-round waves-effect waves-light">Inverse Button</button> -->
															<input type="submit" class="btn btn-inverse btn-round waves-effect waves-light" name="btnEdit" value="Edit">
														</div>
													</div>


												</form>													
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
</body>
</html>
