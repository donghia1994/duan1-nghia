	<!-- CONTENT -->
	<main>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
	<?php if(isset($_SESSION['s_makh'])){
		echo "<script>window.open('index.php');</script>";
	}
	
	 ?>

		<section>
			<div class="container-fluid mt-3 mb-3 alert-dark">
				<div class="row" >
					<div class="col-md-6">
						<img src="./view/public/img/banner-home/banner3.jpg" alt="Ảnh bìa" class="img-fluid rounded m-2">
					</div>
					<div class="col-md-5 ml-2 pt-5">			
						<form  action="index.php?act=inlog"  method="POST" style="width:400px;" class="mx-auto d-block">
							<h2 class="text-center"> Đăng nhập</h2>
							<p class="text-center m-0">Bạn chưa có tài khoản? <a href="index.php?act=regis">Đăng Ký</a> </p>

							<div class="form-group row ">
								<label for="inputEmail3" class="col-form-label">Tên đăng nhập</label><br>
								<input type="text" class="form-control" id="inputEmail3" placeholder="Tên đăng nhập" name="tenkh" required="">
							</div>
							<div class="form-group row">
								<label for="inputPassword3" class="col-form-label">Mật khẩu</label><br>
								<input type="password" class="form-control" id="inputPassword3" placeholder="Mật khẩu" name="mk" required="">
							</div>
							<div class="form-group row">
								<div class="col-sm-1">
									<input type="checkbox" class="form-check-input" id="exampleCheck1" >
								</div>
								<div class="col-sm-3">
									<label class="form-check-label" for="exampleCheck1">Ghi nhớ </label>
								</div>
								<div class="col-sm-8">
									<label class="form-check-label" for="exampleCheck1"><a href="#" style="font-size:0.8em">Quên mật khẩu?</a></label>
								</div>	
							</div>						
							<div class="form-group row">
								<div class="col-sm-12 pt-2" align="middle">
								<button type="submit" class="btn btn-primary" name="btn-login"> Đăng nhập</button>
								</div>
							</div>				
						</form>	
					</div>
				</div>
			</div>
		</section>



	</main>