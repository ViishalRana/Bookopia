<nav class="navbar header-navbar pcoded-header">
<div class="navbar-wrapper">
<div class="navbar-logo">
<a href="<?=site_url("brAdmin/BookC/")?>">
Bookopia
</a>
<a class="mobile-menu" id="mobile-collapse" href="#!">
<i class="feather icon-menu icon-toggle-right"></i>
</a>
<a class="mobile-options waves-effect waves-light">
<i class="feather icon-more-horizontal"></i>
</a>
</div>
		<div class="navbar-container container-fluid">
			<ul class="nav-left">
			<li>
			<a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
			<i class="full-screen feather icon-maximize"></i>
			</a>
			</li>
			</ul>
<ul class="nav-right">

<base href="<?=base_url()?>">
<li class="user-profile header-notification">
<div class="dropdown-primary dropdown">
<div class="dropdown-toggle" data-toggle="dropdown">
	<?php
	if($this->session->profilePic!="")
	{
		$imag=base_url("upload/").$this->session->profilePic;
	}
	?>
<img src="<?=$imag?>" class="img-responsive img-circle" alt="User-Profile-Image" style="width:50px;height:50px;">
<span><?=$this->session->userName?></span>
<i class="feather icon-chevron-down"></i>
</div>
<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
<li>
<a href="<?=site_url("brAdmin/ProfileC/")?>">
<i class="feather icon-user"></i> Profile
</a>
</li>
<li>
<a href="<?=site_url("brAdmin/LogoutC/")?>">
<i class="feather icon-log-out"></i> Logout
</a>
</li>
</ul>
</div>
</li>
</ul>
</div>
</div>
</nav>
<script type="text/javascript">
	$("document").ready(
		);
</script>