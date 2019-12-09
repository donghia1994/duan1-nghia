<body onload="tabcontent()">
	<header>
		<div class="nav-container">
			<nav class="sina-nav mobile-sidebar navbar-fixed" data-top="0">
				<div class="container">

					<div class="search-box">
						<form role="#" method="post" action="index.php?act=search">
							<span class="search-addon close-search"><i class="fa fa-times"></i></span>
							<div class="search-input">
								<input type="text" class="form-control" placeholder="Search here" required value="" name="noidung">
							</div>
							<input type="submit" class="search-addon search-icon fa fa-search" name='btn-tim' value="Tìm">
						</form>
					</div><!-- .search-box -->

					<div class="extension-nav">
							<ul>
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i></a>
									<ul class="dropdown-menu">
										<?php if(empty($_SESSION['s_makh'])){ ?>
										<div class="dropdown-divider"></div>
										<li><a href="index.php?act=login">Đăng Nhập</a></li>
										<div class="dropdown-divider"></div>
										<li><a href="index.php?act=regis">Đăng Ký</a></li>
										<div class="dropdown-divider"></div>
										
										<?php } else { ?>
										<div class="dropdown-divider"></div>
										<li><a >Chào <?=$_SESSION['s_tenkh']?></a></li>
										<div class="dropdown-divider"></div>
										<li><a href="index.php?act=user">Cài Đặt Tài Khoản</a></li>
										<div class="dropdown-divider"></div>
										<li><a href="index.php?act=logout"> Đăng xuất </a></li>
										<div class="dropdown-divider"></div>
										<?php } ?>
									</ul>
								</li>
								<!-- .cart -->
								<li class="dropdown">
									<a href="index.php?act=cart" class="dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-shopping-bag"></i>
										<span class="shop-badge">2</span>
									</a>
									<ul class="dropdown-menu shop-menu">
										<li>
											<a href="#" class="shop-item-photo">
												<img src="#" alt="" />
											</a>
											<a href="#" class="shop-item-link">Delica omtantur</a>
											<p class="shop-item-price">2 - $19</p>
										</li>
										<li>
											<a href="#" class="shop-item-photo">
												<img src="#" alt="">
											</a>
											<a href="#" class="shop-item-link">Delica omtantur</a>
											<p class="shop-item-price">2 - $19</p>
										</li>
										<li class="shop-total-price">
											<a href="index.php?act=cart" class="shop-btn">Thanh Toán</a>
											<span>Total: $0.00</span>
										</li>
									</ul>
								</li>
								<!-- .cart -->
								<li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
							</ul>
						</div><!-- .extension-nav -->

						<div class="sina-nav-header social-on">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
								<i class="fa fa-bars"></i>
							</button>
							<a class="sina-brand" href="index.php">
								<img src="view/public/img/logo-secondary.png">
							</a>
						</div><!-- .sina-nav-header -->

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class=" navbar-collapse" id="navbar-menu">
							<ul class="sina-menu d-flex justify-content-center" data-in="fadeInUp" data-out="fadeInOut">
								<li><a href="index.php">TRANG CHỦ</a></li>
								<!-- /.Index -->
								<li><a href="index.php?act=about">GIỚI THIỆU</a></li>
								<!-- /.About -->
								<li class="dropdown">
									<a style="cursor:pointer;">SẢN PHẨM</a>
									<ul class="dropdown-menu">
										<li><a href="index.php?act=listsp&nam=1">Nam</a></li>
										<li><a href="index.php?act=listsp&nu=1">Nữ</a></li>
										<li><a href="index.php?act=listsp">Cặp Đôi</a></li>
									</ul>
								</li>
								<!-- /.San pham -->
								<li class="dropdown menu-item-has-mega-menu">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">THƯƠNG HIỆU</a>
									<div class="mega-menu dropdown-menu">
										<ul class="mega-menu-row" role="menu">
											<li class="mega-menu-col col-md-4">
												<h4 class="mega-menu-col-title">BÁN CHẠY</h4>
												<ul class="sub-menu">
													<li><a href="index.php?act=listsp">Burberry</a></li>
													<li><a href="index.php?act=listsp">Gucci</a></li>
													<li><a href="index.php?act=listsp">Chanel</a></li>
													<li><a href="index.php?act=listsp">Victoria</a></li>
												</ul>
											</li>
											<li class="mega-menu-col col-md-4">
												<h4 class="mega-menu-col-title">MỚI NHẤT</h4>
												<ul class="sub-menu">
												<?php $thhmoi=thh_select_by_4latest();
														foreach($thhmoi as $thhmoi){
															extract($thhmoi);
															$mathh=$thhmoi['mathh'];
															$tenth=$thhmoi['tenthh'];
															$link='index.php?act=listcompany&mathh='.$mathh.'';

														?>
														<li><a href="<?=$link?>"><?=$tenthh?></a></li>
												<?php } ?>
												</ul>
											</li>
											<li class="mega-menu-col col-md-4">
												<h4 class="mega-menu-col-title">NỔI BẬT</h4>
												<ul class="sub-menu">
												<?php $thhdb=thh_select_by_4dacbiet();
														foreach($thhdb as $thhdb){
															extract($thhdb);
															$mathh=$thhdb['mathh'];
															$tenth=$thhdb['tenthh'];
															$link='index.php?act=listcompany&mathh='.$mathh.'';
														?>
														<li><a href="<?=$link?>"><?=$tenthh?></a></li>
												<?php } ?>
												</ul>
											</li>
										</ul><!-- end row -->
									</div>
								</li>
								<!-- /.Thuong hieu -->
								<li><a href="index.php?act=map">LIÊN HỆ</a></li>
								<!-- /.Lien he -->
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- .container -->
				</nav>
			</div>
		</header>