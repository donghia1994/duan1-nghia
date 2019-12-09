
	<main>
     <?php 
        $spht=isset($_GET['masp']) ? sp_select_by_masp($_GET['masp']) : '';
        extract($spht);
        
    
    ?>

		<div class="container-fluid">
<div class="container">
  <div class="row">
       <div class="col-sm-12 mt-4">
             <div class="list-home">
              <div class="list-ml">
            <p><i class="fas fa-home" style="color:black;"></i> Home / <!-- tendongho -->
                <?=$spht['tensp']?>
              </p>
            </div>
          </div>
        </div>
    <!-- Hình -->
  

    <div class="col-sm-5 mt-4">
    <div class="detail-img">
      
        <div class="w3-content ">
          <div class="abc border ">
           
  <img id="zoom1" class="mySlides" src="view/public/img/product/pro1.jpg" >
  <img id="zoom2" class="mySlides" src="view/public/img/product/pro2.jpg"style="display:none">
  <img id="zoom3" class="mySlides" src="view/public/img/product/pro3.jpg"style="display:none">
  <img id="zoom4" class="mySlides " src="view/public/img/product/pro4.jpg"style="display:none">
</div>
</div>

</div>
  
   <div class="w3-row-padding mt-2" id="thumb-image">
    <div class="w3-col  s3">
      <img data-image="view/public/img/pro1.jpg"  src="view/public/img/product/pro1.jpg" style="cursor:pointer" onclick="currentDiv(1)"  class="mx-0 d-block  border">
    </div>
    <div class="w3-col  s3 ">
      <img data-image="img/pro2.jpg"  src="view/public/img/product/pro2.jpg" style="cursor:pointer" onclick="currentDiv(2)" class="mx-0 d-block border">
    </div>
    <div class="w3-col s3 " >
      <img data-image="img/pro3.jpg" src="view/public/img/product/pro3.jpg" style="cursor:pointer" onclick="currentDiv(3)" class=" mx-0 d-block  border">
    </div>
    <div class="w3-col s3 ">
      <img data-image="img/pro4.jpg" src="view/public/img/product/pro4.jpg" style="cursor:pointer" onclick="currentDiv(4)"class="  mx-0 d-block border">
    </div>
  </div>
 
</div>
    

    <!-- thong tin -->
    <div class="col-sm-5 mt-3 ">
    <section class="detail-infor">
<div class="detail-name">
      <p><?=$spht['tensp']?></p>

    </div>
    <?php if($spht['giamgia']>0){
    ?>
<div class="detail-bonus mt-2 text-right"><p><?=number_format($spht['giamgia'])?> &#37</p></div>
      <div class="detail-price">
          <div class="detail-price-discount">
            <p><?=number_format($spht['giasp']-$spht['giamgia']*$spht['giasp']/100)?> </p>
      </div>
        <div class="detail-price-begin">
      <p><?=number_format($spht['giasp'])?></p>
      </div>
</div>
      <?php }
        else{
        ?>
        <div class="detail-price-begin">
        <p><?=number_format($spht['giasp'])?></p>
        </div>
        <?php } ?>
 
 
<div class="detail-content mt-5">
     <p>Từ ấy trong tôi bừng nắng hạ.
Mặt trời chân lý chói qua tim.
Hồn tôi là một vườn hoa lá.
Rất đậm hương và rộn tiếng chim...

Tôi buộc lòng tôi với mọi người.
Để tình trang trải với trăm nơi.
Để hồn tôi với bao hồn khổ.
Gần gũi nhau thêm mạnh khối đời.

Tôi đã là con của vạn nhà.
Là em của vạn kiếp phôi pha.
Là anh của vạn đầu em nhỏ.
Không áo cơm, cù bất cù bơ..</p>
    </div>
  <div class="detail-cart mt-2">
    <input type="button" value="-" id="minus" name="" onclick="minus()"> 
     <input type="number" id="count" value="1"> 
    <input type="button" value="+" id="plus" name="" onclick="plus()">
    <button id="btn-add"type="button" class="add-cart"><i class="fas fa-cart-plus"></i> ADD</button>
   
  </div>
    </section>
</div>
<div class="col-sm-2 mt-3">
  <div class="detail-banner-img" style="width: 100%;height: 100%;"><img src="view/public/img/product/images.jpg"></div>
 
</div>
  <!-- Chỗ này cover hình -->
<!-- *********** -->

</div>
</div>
</div>
<div class="container">
<div class="row mt-5">
  <div class="col-sm-3 mt-3">
      <ul class="nav nav-tabs">
    <li class="active text-left"><a class=" pl-0"data-toggle="tab" href="#home">Chi Tiết</a></li>
   <!--  <li><a data-toggle="tab" href="#menu1">Bình luận</a></li> -->
    <li class="text-left"><a class=" pl-0"data-toggle="tab" href="#menu2">Reviews</a></li>
    
  </ul>
  </div>
  <div class="col-sm-9 mt-3">
    <div class="tab-content border">
    <div id="home" class="tab-pane fade in active">
      <div class="row">
        <div class="col-sm-6">
          <div class="detail-table p-3 m-3">
      <div class="table-responsive table-striped">
    <table class="table  table-bordered">
  <tbody>
    <tr>
      <th scope="row">Thương Hiệu</th>
      <td>Casino</td>
    </tr>
    <tr>
      <th scope="row">Xuất xứ</th>
      <td>Nhật</td> 
    </tr>
    <tr>
      <th scope="row">Kính</th>
      <td>40mm</td>
    </tr>
      <tr>
      <th scope="row">Máy</th>
      <td>Cơ</td>
      
    </tr>
      <tr>
      <th scope="row">Thời gian bảo hành</th>
      <td>5 năm</td>
      
    </tr>
      <tr>
      <th scope="row">Đường kính mặt số</th>
      <td>Larry</td>
      
    </tr>
      <tr>
      <th scope="row">Dây đeo</th>
      <td>Da</td>
      
    </tr>
      <tr>
      <th scope="row">Chống nước</th>
      <td>3 ATM</td>
      
    </tr>
    <tr>
      <th scope="row">Chức năng</th>
      <td>
        Lịch Ngày – Lịch Thứ
      </td>
      
    </tr>
  </tbody>
</table>  
</div>
</div>
        </div>     
        <div class="col-sm-6">
          <div class="detail-img-table">
           <img src="view/public/img/product/pro1.jpg" >
          <button type="button" class="btn btn-dark">1.000.000 VNĐ</button><br>
          <button type="button"class="btn btn-dark mt-2 mb-2">Đặt Ngay</button>
        </div>
      </div> 
      </div>

    </div>
         


        

   
    <div id="menu2" class="tab-pane">
      <div class="row"> 
        <div class="col-sm-12">
          <div class="detail-comment p-3 m-3">
                <div class="row">
                  <div class="col-sm-1">
                    <div class="comment-img" >
                    <img src="view/public/img/558390-11FO8A1505384509.png" alt="..." class="rounded-circle">
                  </div>
                </div>
                  <div class="col-sm-11 pl-3">
                    <div class="comment-text">
                      <div class="comment-text-up  p-2">
                        <p>amdin-admin@gmail.com</p>
                      </div>
                       <div class="comment-text-below">
                         <p class="p-2 mt-5">Sản phẩm như lol dẹp mẹ đi</p>
                       </div>
                    </div>
                    <div class="comment-text border-0">           
                      <div class="input-group mb-3 mt-5">
                      <textarea  style="height: 150px;background-color: #dee2e6;" type="text" class="form-control border-0" placeholder="Nội dung" aria-label="Username" aria-describedby="basic-addon1"></textarea>
                      </div>
                     <div class="input-group mb-3">
                      <input type="text" class="form-control border-0" placeholder="Tên của bạn" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                       <div class="input-group mb-3">
                      <input type="text" class="form-control border-0" placeholder="Email của bạn" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                      <button type="button" class="btn btn-dark" style="">Gửi bình luận</button> 
                  </div>
                </div>
          </div>
        </div>  
       </div>
    </div> 

  </div>
  <!-- <div class="col-sm-4">
    <p class="text-center">Chính sách bảo hành</p>
    <ul>
      <li>Bảo hành lỗi người dùng</li>
      <li>Miễn phí giao hàng</li>
         <li>Miễn phí thay pin</li>
            <li>1 đổi 1 trong 30 ngày</li>
    </ul>
  </div> -->
</div>


<!-- thông tin chi tiet cua san pham -->
  
  <!-- ******** -->
</div>

<!-- slide detail -->
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-12">
    <div class="detail-slide-title">
      
<div class="detail-center">
<span>Sản phẩm bán chạy</span></div>

    </div>
  </div>
   <div class="owl-carousel owl-theme ">
<!-- xuất cho nay ne thang lol -->
    <div class="item">
        <div class="owl-img">
        <img src="view/public/img/product/pro3.jpg">
        <div class="list-pro-discount">
              <span>-30%</span>
            </div>
                 <div class="list-icon text-center">
               <a href="#"><i class="fas fa-shopping-basket"></i></a>
                <a href="#"><i class="far fa-heart"></i></a>
               <a href="#"><i class="far fa-eye"></i></a>           
              </div>
    </div>
    <div class="owl-name  mt-3">
     <p>  Casio W-218H-4BVDF</p>
    </div>
    <div class="owl-price">
       <div class="owl-price-discount">
        <p>1.000.000 &#8363</p>
      </div>
      <div class="owl-price-begin">
        <p>1.200.000 &#8363</p>
      </div>
     
    </div>
    
    </div>
<!-- *********** -->
    <div class="item">
        <div class="owl-img">
        <img src="view/public/img/product/pro3.jpg">
         <div class="list-pro-discount">
              <span>-30%</span>
            </div>
                 <div class="list-icon text-center">
               <a href="#">  <i class="fas fa-shopping-basket"></i></i>
                <a href="#">     <i class="far fa-heart"></i></a>
               <a href="#">  <i class="far fa-eye"></i></a>           
              </div>
    </div>
    <div class="owl-name  mt-3">
     <p>  Casio W-218H-4BVDF</p>
    </div>
    <div class="owl-price">
      <div class="owl-price-discount">
        <p>1.000.000 VNĐ</p>
      </div>
      <div class="owl-price-begin">
        <p>1.200.000 VNĐ</p>
      </div>
      
    </div>
    
    </div>
    
     
   <div class="item">
        <div class="owl-img">
        <img src="view/public/img/product/pro3.jpg">
         <div class="list-pro-discount">
              <span>-30%</span>
            </div>
                 <div class="list-icon text-center">
               <a href="#">  <i class="fas fa-shopping-basket"></i></i>
                <a href="#">     <i class="far fa-heart"></i></a>
               <a href="#">  <i class="far fa-eye"></i></a>           
              </div>
    </div>
    <div class="owl-name  mt-3">
     <p>  Casio W-218H-4BVDF</p>
    </div>
    <div class="owl-price">
       <div class="owl-price-discount">
        <p>1.000.000 &#8363</p>
      </div>
      <div class="owl-price-begin">
        <p>1.200.000 &#8363</p>
      </div>
     
    </div>
    
    </div>
   
     
     <div class="item">
        <div class="owl-img">
        <img src="view/public/img/product/pro3.jpg">
         <div class="list-pro-discount">
              <span>-30%</span>
            </div>
                 <div class="list-icon text-center">
               <a href="#">  <i class="fas fa-shopping-basket"></i></i>
                <a href="#">     <i class="far fa-heart"></i></a>
               <a href="#">  <i class="far fa-eye"></i></a>           
              </div>
    </div>
    <div class="owl-name mt-3">
     <p>  Casio W-218H-4BVDF</p>
    </div>
    <div class="owl-price">
       <div class="owl-price-discount">
        <p>1.000.000 &#8363</p>
      </div>
      <div class="owl-price-begin">
        <p>1.200.000 &#8363</p>
      </div>
     
    </div>
    
    </div>
   
   
     <div class="item">
        <div class="owl-img">
        <img src="view/public/img/product/pro3.jpg">
         <div class="list-pro-discount">
              <span>-30%</span>
            </div>
                 <div class="list-icon text-center">
               <a href="#">  <i class="fas fa-shopping-basket"></i></i>
                <a href="#">     <i class="far fa-heart"></i></a>
               <a href="#">  <i class="far fa-eye"></i></a>           
              </div>
    </div>
    <div class="owl-name  mt-3">
     <p>  Casio W-218H-4BVDF</p>
    </div>
    <div class="owl-price">
       <div class="owl-price-discount">
        <p>1.000.000 &#8363</p>
      </div>
      <div class="owl-price-begin">
        <p>1.200.000 &#8363</p>
      </div>
     
    </div>
    
    </div>



     <div class="item">
        <div class="owl-img">
        <img src="view/public/img/product/pro3.jpg">
         <div class="list-pro-discount">
              <span>-30%</span>
            </div>
                 <div class="list-icon text-center">
               <a href="#">  <i class="fas fa-shopping-basket"></i></i>
                <a href="#">  <i class="far fa-heart"></i></a>
               <a href="#">  <i class="far fa-eye"></i></a>           
              </div>
    </div>
    <div class="owl-name mt-3">
     <p>  Casio W-218H-4BVDF</p>
    </div>
    <div class="owl-price">
       <div class="owl-price-discount">
        <p>1.000.000 &#8363</p>
      </div>
      <div class="owl-price-begin">
        <p>1.200.000 &#8363</p>
      </div>
     
    </div>
    
    </div>
</div>
  </div>
</div>

<script src="view/public/js/js.js"></script>
<script type="text/javascript" src="view/public/js/jquery-3.3.1.slim.js"></script>
<script type="text/javascript" src="view/public/js/popper.min.js"></script>
<script src="view/public/js/bootstrap.min.js"></script>
<script src="view/public/js/jquery.min.js"></script>
<script src="view/public/js/owl.carousel.js"></script>

 <script>
   $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:2,
            nav:true
        },

        600:{
            items:4,
            nav:true
        },
        1000:{
            items:5,
            nav:true,
            loop:true
        }
    }
});
   owl.on('mousewheel', '.owl-stage', function (e) {
    if (e.deltaY>0) {
        owl.trigger('next.owl');
    } else {
        owl.trigger('prev.owl');
    }
    e.preventDefault();
});
    </script>
    <script type="text/javascript">
 var count=1;
  var countEL=document.getElementById('count');
  function plus(){
    count++;
    countEL.value=count;
  }
  function minus(){
    if(count >1){
      count--;
      countEL.value=count;
  }
}
</script>
</div>
</main>
