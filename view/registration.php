	<!-- CONTENT -->
	<main>

	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

	<style>
	.divider-text {
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
	}
	.divider-text span {
		padding: 7px;
		font-size: 12px;
		position: relative;   
		z-index: 2;
	}
	.divider-text:after {
		content: "";
		position: absolute;
		width: 100%;
		border-bottom: 1px solid #ddd;
		top: 55%;
		left: 0;
		z-index: 1;
	}

	.btn-facebook {
		background-color: #405D9D;
		color: #fff;
	}
	.btn-twitter {
		background-color: #42AEEC;
		color: #fff;
	}
	</style>
		<?php 
		if(isset($_POST['btn-add'])){
			$tenkh=$_POST['tenkh'];
			$email=$_POST['email'];
			$diachi=$_POST['diachi'];
			$sdt=$_POST['chondausdt'].$_POST['sdt'];
			$nghe=$_POST['chonnghe'];
			$mk=$_POST['mk'];
			kh_nhap_insert($tenkh, $mk, $sdt, $diachi, $nghe, $email);
			echo 
			'<div class="alert alert-success text-center" role="alert">
			Chúc mừng!!! Bạn đã tạo thành công tài khoản !
			<a class="btn btn-outline-success" href="index.php?act=login">Đăng Nhập</a>
			</div>';
			
		}
	
		?>
				<div class="container">
					<div class="card bg-light">
						<article class="card-body mx-auto" style="max-width: 500px;">
							<h4 class="card-title mt-3 text-center">Tạo tài khoản</h4>
							<p class="text-center">Nhận ngay một tài khoản miễn phí với nhiều ưu đãi cùng chúng tôi</p>
							<p>
								<a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via
									Twitter</a>
								<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login
									via facebook</a>
							</p>
							<p class="divider-text">
								<span class="bg-light">OR</span>
							</p>
							<form action="<?php $_SERVER['PHP_SELF']?>" method="post" >
								<div class="form-group input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"> <i class="fa fa-user"></i> </span>
									</div>
									<input name="tenkh" class="form-control" placeholder="Gõ tên của bạn" type="text">
								</div> <!-- form-group// -->
								<div class="form-group input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
									</div>
									<input name="email" class="form-control" placeholder="Gõ email của bạn" type="email">
								</div> <!-- form-group// -->
								<div class="form-group input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"> <i class="fa fa-home"></i> </span>
									</div>
									<input name="diachi" class="form-control" placeholder="Địa chỉ của bạn" type="text">
								</div> <!-- form-group// -->
								<div class="form-group input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
									</div>
									<select class="custom-select" style="max-width: 120px;" name="chondausdt">
										<option >+84</option>
										<option >+2</option>
										<option >+198</option>
										<option >+99</option>
									</select>
									<input name="sdt" class="form-control" placeholder="xxx-xxx-xxx" type="text">
								</div> <!-- form-group// -->
								<div class="form-group input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"> <i class="fa fa-building"></i> </span>
									</div>
									<select class="form-control" name="chonnghe">
										<option> Ngành nghề của bạn</option>
										<option>Học sinh, Sinh viên</option>
										<option>Đi làm</option>
										<option>Nội trợ</option>
									</select>
								</div> <!-- form-group end.// -->
								<div class="form-group input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
									</div>
									<input name="mk" class="form-control" placeholder="Mật khẩu của bạn" type="password">
								</div> <!-- form-group// -->
								
								<div class="form-group input-group pb-3">
									<div class="input-group-prepend">
										<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
									</div>
									<input class="form-control" placeholder="Nhập lại mật khẩu nha" type="password">
								</div> <!-- form-group// -->
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block" name="btn-add"> Tạo tài khoản </button>
								</div> <!-- form-group// -->
								<p class="text-center">Bạn đã có tài khoản? <a href="index.php?act=login">Đăng Nhập</a> </p>
							</form>
						
						</article>
					</div> <!-- card.// -->

				</div>
				<!--container end.//-->





	</main>