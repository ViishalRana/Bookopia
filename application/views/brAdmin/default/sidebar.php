<nav class="pcoded-navbar">
<div class="nav-list">
<div class="pcoded-inner-navbar main-menu">
<div class="pcoded-navigation-label"></div>
	<ul class="pcoded-item pcoded-left-item">
		<li class="pcoded-hasmenu active pcoded-trigger">
			<a href="javascript:void(0)" class="waves-effect waves-dark">
			<span class="pcoded-micon"><i class="feather icon-home"></i></span>
			<span class="pcoded-mtext">Admin Dashboard</span>
			</a>
				<ul class="pcoded-submenu">
					<li class=" pcoded-hasmenu">
					<a href="javascript:void(0)" class="waves-effect waves-dark">
					<span class="pcoded-mtext">Books</span>
					</a>
						<ul class="pcoded-submenu">
							<li class="">
								<a href="<?=site_url("brAdmin/BookC/addBook")?>" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Add</span>
								</a>
							</li>
							<!-- <li class="">
								<?php $tparam=null;?>
								<a href="<?=site_url("brAdmin/BookC/editBook/0")?>" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Edit</span>
								</a>
							</li> -->
							<li class="">
								<a href="<?=site_url("brAdmin/BookC/")?>" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Display</span>
								</a>
							</li>
						</ul>
					</li>

					<li class=" pcoded-hasmenu">
					<a href="javascript:void(0)" class="waves-effect waves-dark">
					<span class="pcoded-mtext">Author</span>
					</a>
						<ul class="pcoded-submenu">
							<li class="">
								<a href="<?=site_url("brAdmin/AuthorC/addAuthor")?>" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Add</span>
								</a>
							</li>
							<li class="">
								<a href="<?=site_url("brAdmin/AuthorC/")?>" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Display</span>
								</a>
							</li>
						</ul>
					</li>


					<li class=" pcoded-hasmenu">
					<a href="javascript:void(0)" class="waves-effect waves-dark">
					<span class="pcoded-mtext">Users</span>
					</a>
					<ul class="pcoded-submenu">
							<li class="">
								<a href="<?=site_url("brAdmin/UserC/addUser")?>" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Add</span>
								</a>
							</li>
							<li class="">
								<a href="<?=site_url("brAdmin/UserC/")?>" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Display</span>
								</a>
							</li>
						</ul>
					</li>
					
					<li class="pcoded-hasmenu">
					<a href="javascript:void(0)" class="waves-effect waves-dark">
						<span class="pcoded-micon">
							<i class="feather icon-server"></i>
						</span>
					<span class="pcoded-mtext">City | State | Country</span>
					</a>
						<ul class="pcoded-submenu">
							<li class="">
								<a href="<?=site_url("brAdmin/CityC/")?>" class="waves-effect waves-dark">
								<span class="pcoded-mtext">City</span>
								</a>
							</li>
							<li class="">
								<a href="<?=site_url("brAdmin/StateC/")?>" class="waves-effect waves-dark">
								<span class="pcoded-mtext">State</span>
								</a>
							</li>
							<li class="">
								<a href="<?=site_url("brAdmin/CountryC/")?>" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Country</span>
								</a>
							</li>
						</ul>
					</li>

					<li class=" pcoded-hasmenu">
					<a href="javascript:void(0)" class="waves-effect waves-dark">
					<span class="pcoded-mtext">Genre</span>
					</a>
					<ul class="pcoded-submenu">
							
							<li class="">
								<a href="<?=site_url("brAdmin/GenreC/")?>" class="waves-effect waves-dark">
								<span class="pcoded-mtext">Display</span>
								</a>
							</li>
						</ul>
					</li>

					</li>	

				</ul>
		</li>

	</ul>
</div>
</div>
</nav>