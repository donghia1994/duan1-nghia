	<!-- CONTENT -->
	<main>
	<style>
	

.quantity {
    float: left;
    margin-right: 15px;
    background-color: #eee;
    position: relative;
    width: 80px;
    overflow: hidden
}

.quantity input {
    margin: 0;
    text-align: center;
    width: 15px;
    height: 15px;
    padding: 0;
    float: right;
    color: #000;
    font-size: 20px;
    border: 0;
    outline: 0;
    background-color: #F6F6F6
}

.quantity input.qty {
    position: relative;
    border: 0;
    width: 100%;
    height: 40px;
    padding: 10px 25px 10px 10px;
    text-align: center;
    font-weight: 400;
    font-size: 15px;
    border-radius: 0;
    background-clip: padding-box
}

.quantity .minus, .quantity .plus {
    line-height: 0;
    background-clip: padding-box;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
    -webkit-background-size: 6px 30px;
    -moz-background-size: 6px 30px;
    color: #bbb;
    font-size: 20px;
    position: absolute;
    height: 50%;
    border: 0;
    right: 0;
    padding: 0;
    width: 25px;
    z-index: 3
}

.quantity .minus:hover, .quantity .plus:hover {
    background-color: #dad8da
}

.quantity .minus {
    bottom: 0
}
.shopping-cart {
    margin-top: 20px;
}
	
	</style>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<script src="https://use.fontawesome.com/c560c025cf.js"></script>

   



	<div class="container mb-4">
        <div class="card shopping-cart">
              <h2 class="p-3 text-center">Giỏ hàng của bạn</h2>
        
            <div class="card-header bg-dark text-light">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Giỏ hàng
                <a href="index.php" class="btn btn-outline-info btn-sm pull-right">Tiếp tục mua hàng</a>
                <div class="clearfix"></div>
            </div><!-- Chọn mua hàng -->
            <?php 
                if(isset($_SESSION['giohang'])&&isset($_SESSION['s_makh'])){
                // print_r ($_SESSION['giohang']);
                            ?>
            <div class="card-body">
                <form action="index.php?act=editcart" method="post">
                    <!-- PRODUCT -->
                    <div class="row">                  
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                        Hình ảnh sản phẩm
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-5">
                        Tên sản phẩm - Mô tả
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-5 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-4 text-md-right" style="padding-top: 5px">
                            Đơn giá
                            </div>
                            <div class="col-4 col-sm-4 col-md-2">
                            Số lượng
                            </div>
                            <div class="col-3 col-sm-3 col-md-4 text-md-right" style="padding-top: 5px">
                            Thành tiền
                            </div>
                            <div class="col-2 col-sm-2 col-md-2 text-right">
                            Xóa
                            </div>
                        </div>
                    </div><!-- thead -->                             
                        <?php
                        foreach($_SESSION['giohang'] as $key => $val){
                            //lấy thông tin sp xuất ra màn hình
                            $sp=sp_select_by_masp($key);
                                extract($sp);
                            // print_r($sp);
                                $hht=hinh_select_by_masp_chinh($masp);                                
                                if(empty($hht)){
                                    $hinh=$g_path.'rong.jpg';                  
                                }
                                else{
                                    extract($hht);
                                    $hinh=$g_path_hinhsp.$hht['tenhinh'];
                                }
                            $del='index.php?act=delcart&masp='.$key.'';
                        ?>     
                    <div class="row">                  
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                            <img class="img-responsive mx-auto d-block" src="<?=$hinh?>" alt="prewiew" width="120" height="80">
                            <strong ><?=$sp['masp']?></strong>
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-5 ">
                            <h4 class="product-name text-justify ">
                                <strong><?=$sp['tensp']?></strong>
                                <input type="hidden" name="masp['<?=$sp['masp']?>']" value="<?=$sp['masp']?>">
                            </h4>
                            <h4 class="text-justify">
                                <small><?=$sp['mota']?></small>
                            </h4>
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-5 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-4 text-md-right" style="padding-top: 5px">
                                <h6><strong><?=number_format($sp['giasp'])?><span class="text-muted"> x</span></strong></h6>
                            </div>
                            <div class="col-4 col-sm-4 col-md-2">
                                <div class="quantity">
                                    <input type="button" value="+" class="plus">
                                    <input type="number" step="1" max="99" min="1" name="soluong['<?=$sp['masp']?>']" value="<?=$val['soluong']?>" title="Qty" class="qty"
                                           size="4">
                                    <input type="button" value="-" class="minus">
                                </div>
                            </div>
                            <div class="col-3 col-sm-3 col-md-4 text-md-right" style="padding-top: 5px">
                                <h6><strong><?=number_format($sp['giasp']*$val['soluong'])?></strong></h6>
                            </div>
                            <div class="col-2 col-sm-2 col-md-2 text-right">
                                <a class="btn btn-outline-danger btn-xs" href="<?=$del?>" >
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div><!-- tbody -->
                    <hr>
                        <?php                              
                            }
                        ?>       
                    <!-- END PRODUCT -->                   
                    <div class="pull-right">
                        <input type="submit" name="btn-edit" class="btn btn-outline-secondary pull-right" value="Cập nhật giỏ hàng">
                        <!-- <a href="" class="btn btn-outline-secondary pull-right">
                            Cập nhật giỏ hàng
                        </a> -->
                    </div><!-- tfoot -->
            </div> <!--Hiện thị hàng mua -->
        </div>
        <div class="card-body">
            <h3 >Thông tin giao hàng<a style="color:red;" title="Yêu cầu bắt buộc">*</a>:</h3>
            <div class="row">
               
                <div class="col-8">
                    <input type="text" name="giaohang" id="" class="form-control" placeholder="Nhập địa chỉ nhận hàng">
                </div>
                <div class="col-4">
                    <input type="number" name="sdt" id="" class="form-control" placeholder="Nhập số điện thoại nhận hàng">
                </div>
                <div class="col-6 mt-3">
                    <textarea name="ghichu" class="form-control" id="" cols="3" rows="4" placeholder="Ghi chú với nhân viên giao hàng"></textarea>
                </div>
                <div class="col-6 mt-3">           
                    <div class="row">
                        <div class="col-lg-12 pb-2">
                            <select class="form-control" id="" name="thanhtoan" >
                                <option >Hình thức thanh toán</option>
                                <option value="">COD</option>
                                <option value="">Thẻ thanh toán</option>
                                <option value="">Tiền tích lũy</option>
                            </select>
                        </div>
                        <div class="col-lg-12 pb-2">
                            <label class="col-sm-3 col-md-6 col-lg-5 control-label" for="card-holder-name">Tên thẻ</label>
                            <div class="col-sm-9 col-md-6 col-lg-7">
                                <input type="text" class="form-control" stripe-data="name" id="name-on-card" placeholder="Tên tài khoản" name="tenthe" >
                            </div>
                        </div>  
                        <div class="col-lg-12 pb-2">
                            <label class="col-sm-3 col-md-6 col-lg-5 control-label" for="card-number">Mã thẻ</label>
                            <div class="col-sm-9 col-md-6 col-lg-7">
                                <input type="text" class="form-control" stripe-data="number" id="card-number" placeholder="Mã thẻ" name="mathe">
                            </div> 
                        </div>
                    </div>                            
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left">
                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="Mã khuyến mãi">
                    </div>
                    <div class="col-6">
                        <input type="submit" class="btn btn-default" value="Use cupone">
                    </div>
                </div>
            </div>
            <div class="pull-right" style="margin: 10px">
                <input type="submit" class="btn btn-success pull-right" name="btn-checkout" value="Thanh toán">    
                <div class="pull-right" style="margin: 5px">

                <?php
                        
                        $tong=0;
                        foreach($_SESSION['giohang'] as $key => $val){
                            //lấy thông tin sp xuất ra màn hình
                            $sp=sp_select_by_masp($key);
                                extract($sp);
                                $gia=$_SESSION['giohang'][$key]['soluong'] * $sp['giasp'];
                                $tong+=$gia;                              
                        } 
 
                          ?>
                    Tổng tiền: <b><?=number_format($tong)?></b>
                    <input type="hidden" name="tonggia" value="<?=$tong?>">
                
                </div>
            </div>
        </form>
        </div>
            <?php  
                }
                else{
            ?>
            <div class="card-body">
                <div class="col-12 col-sm-12 col-md-12 text-center">
                Bạn chưa chọn được mặt hàng nào
                <div>
            </div>
            <?php  
                }
            ?>
    </div>
<!-- </div> -->

	</main>