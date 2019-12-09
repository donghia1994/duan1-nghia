<main class="mb-5">
  <?php 
    $thhht=isset($_GET['mathh'])? thh_select_by_mathh($_GET['mathh']): '';
    extract($thhht);
    

  ?>



  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="list-home mt-3">
          <div class="list-ml">
            <p><i class="fas fa-home" style="color:black;"></i> Home / Thương Hiệu /
              <?=$thhht['tenthh'];?></p>
          </div>
        </div>
      </div><!-- END col-md-12 -->
      <div class="col-md-12">
        <div class="list-home mt-3 d-xl-none d-lg-none is-active" id="list-hidden">
          <div class="list-ml">
            <p id="doseach"><i class="fas fa-search"></i> Search</p>
          </div>
        </div>
      </div><!-- END col-md-12 -->
      <div class="col-md-4 col-sm-12 col-12 mt-3">
        <!-- Tìm kiếm -->
        <!--  -->
        <div class="list-filter d-none d-sm-block">
          <div class="list-cc">
            <div class="list-filter-title mt-4">
              <p>Bộ Lọc Giá : </p>
            </div>
            <form>
              <div class="list-range">
                <select>
                  <option value="volvo">0</option>
                  <option value="saab">1,000,000 VNĐ</option>
                  <option value="opel">3,000,000 VNĐ</option>
                  <option value="audi">5,000,000 VNĐ</option>
                  <option value="audi">7,000,000 VNĐ</option>
                  <option value="audi">9,000,000 VNĐ</option>
                </select>
                <select class="mt-3">
                  <option value="audi">500,000 VNĐ</option>
                  <option value="audi">2,000,000 VNĐ</option>
                  <option value="audi">4,000,000 VNĐ</option>
                  <option value="opel">6,000,000 VNĐ</option>
                  <option value="saab">8,000,000 VNĐ</option>
                  <option value="volvo">10,000,000 VNĐ</option>
                </select>
              </div>

            </form>

            <div class="list-filter-title mt-3">
                <p> Thương hiệu: </p>
              </div>
              <form>
                <div class="list-range">
                  <select>
                  <?php 
                    $thh=thh_select_all();
                    foreach($thh as $thh){
                      extract($thh);
                    ?>

                
                  <option value="<?=$thh['tenthh']?>"><?=$thh['tenthh']?></option>
                
                  <?php } ?>
                </select>

            </div>
            <!-- day -->

            <div class="list-filter-title mt-4">
              <p> Chất liệu </p>
            </div>
            <form>
              <div class="list-range">
                <?php 
                    $cl=cl_select_all();
                    foreach($cl as $cl){
                      extract($cl);
                    ?>
                <input type="checkbox" name=""> <?=$cl['tencl']?><br>
                <?php } ?>
              </div>
            </form>

            <!-- mat kinh -->

            <div class="list-filter-title mt-3">
              <p> Mặt kính : </p>
            </div>
            <form>
              <div class="list-range">
                <?php 
                    $mk=mk_select_all();
                    foreach($mk as $mk){
                      extract($mk);
                    ?>
                <input type="checkbox" name=""> <?=$mk['tenmk']?><br>
                <?php } ?>
              </div>

      




                <div class="list-filter-click mt-3 mb-3">
                  <button class="list-button">Lọc</button>
                </div>
              </form>

          </div>
          <!-- sản phẩm yeu thích -->
          <div class="list-rating-all mt-4 pb-4">
            <div class="list-filter-title mt-4 ">
              <p>Sản phẩm được yêu thích : </p>
            </div>
            <div class="list-rating mt-4">
              <div class="list-text-rating">
                <p>Casio ECB-800DB-1ADR</p>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="list-price-rating"><label>500,000 &#8363</label></span>
              </div>
              <div class="list-img-rating">
                <img src="view/public/img/pro-rate/pro-rate1.jpg">
              </div>
            </div>
       


          </div>

          <!-- ******** -->

          <!-- danh muc -->


        </div>
      </div><!-- END col-md-4 -->
      <!-- *** -->
      <!-- Phần sản phẩm -->
      <div class="col-md-8 col-sm-12 col-12 mt-3">
        <div class="list-banner" id="listtextinbanner">
         
            <div class="list-text-company-banner">
              <span class="text-uppercase">
              <?=$thhht['tenthh'];?></span>
            </div>

          <!-- END list-company-img-banner -->

          <div class="list-sapxep-title mt-3">
            <div class="list-sapxep-text">
              <p>Hiển Thị</p>
            </div><!-- END list-sapxep-text -->
            <div class="list-sapxep-view">
              <a class="active" data-toggle="tab" href="#home"><i class="fas fa-th"></i></a>
              /
              <a data-toggle="tab" href="#menu1"><i class="fas fa-grip-lines"></i></a>
            </div><!-- END list-sapxep-view -->
          </div><!-- END list-sapxep-title -->
          <div class="list-all-pro mt-3">
            <div class="tab-content">
              <!-- home -->
              <div id="home" class="tab-pane fade  in active">
                <!-- Đứng -->
                <div class="row">
                  <?php 
                      $dssp=sp_select_by_mathh($_GET['mathh']);
                      foreach($dssp as $dssp){
                      extract($dssp);
                      $tensp=$dssp['tensp'];
                      $giasp=$dssp['giasp'];
                      $giagiam=($giasp-($dssp['giamgia']*$giasp/100)); 
                      
                      $hht=hinh_select_by_masp_chinh($masp);                                
                      if(empty($hht)){
                        $hinh=$g_path.'rong.jpg';                  
                      }
                      else{
                        extract($hht);
                        $hinh=$g_path_hinhsp.$hht['tenhinh'];
                      }

                    $addcart='index.php?act=addcart&masp='.$masp.'';
                    $love='index.php?act=love&masp='.$masp.'';
                    $chitietsp='index.php?act=chitietsp&masp='.$masp.'';
                   
                  ?>
                  <div class="col-md-4 col-sm-6 col-lg-4 col-6 mt-3">
                    <div class="list-all-pro">
                      <div class="list-pro">
                        <div class="list-pro-img">
                          <img class="rounded mx-auto d-block" src="<?=$hinh?>">
                          <?php if($dssp['giamgia']>0){
                              ?>
                          <div class="list-pro-discount text-center">
                            <span>-<?=number_format($dssp['giamgia'])?>&#37</span>
                          </div>
                          <?php } ?>
                          <div class="list-icon text-center">
                            <a href="<?=$addcart?>"><i class="fas fa-shopping-basket"></i></a>
                            <a href="<?=$love?>"><i class="far fa-heart"></i></a>
                            <a href="<?=$chitietsp?>"><i class="far fa-eye"></i></a>
                          </div>
                        </div>
                        <div class="list-pro-name text-center mt-2">
                          <p><?=$tensp?></p>
                        </div>
                        <div class="list-pro-price">
                          <?php if($dssp['giamgia']>0){
                              ?>
                          <div class="list-pro-price-begin">
                            <p><?=number_format($giasp)?> &#8363</p>
                          </div>
                          <div class="list-pro-price-discount">
                            <p><?=number_format($giagiam)?> &#8363</p>
                          </div>
                          <?php }
                              else{
                              ?>
                          <div class=" text-center">
                            <p><?=number_format($giasp)?> &#8363</p>
                          </div>
                          <?php } ?>

                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <!-- ****************** -->
                </div>
              </div><!-- END Đứng -->
              <!-- **** --> 

              <div id="menu1" class="tab-pane fade">
                <div class="row">
                  <!-- Ngang -->
                  <?php 
                      $dssp=sp_select_by_mathh($_GET['mathh']);
                      foreach($dssp as $dssp){
                      extract($dssp);
                      $tensp=$dssp['tensp'];
                      $giasp=$dssp['giasp'];
                      $giagiam=$giasp-($dssp['giamgia']*$giasp/100);

                      $hht=hinh_select_by_masp_chinh($masp);                                
                        if(empty($hht)){
                          $hinh=$g_path.'rong.jpg';                  
                        }
                        else{
                          extract($hht);
                          $hinh=$g_path_hinhsp.$hht['tenhinh'];
                        }

                      $addcart='index.php?act=addcart&masp='.$masp.'';
                      $love='index.php?act=love&masp='.$masp.'';
                      $chitietsp='index.php?act=chitietsp&masp='.$masp.'';                      
                      ?>
                  <div class="col-md-6 col-sm-6 col-12 mt-1">
                    <div class="list-all-pro">
                      <div class="list-pro-line">
                        <div class="list-pro-line-img">
                          <img class="p-2" src="<?=$hinh?>">
                          <?php if($dssp['giamgia']>0){
                              ?>
                          <div class="list-pro-line-discount text-center">
                            <span>-<?=number_format($dssp['giamgia'])?>&#37</span>
                          </div>
                          <?php } ?>
                          <!-- <div class="list-icon text-center">
                            <a href="<?=$addcart?>"> <i class="fas fa-shopping-basket"></i></i>
                            <a href="<?=$love?>"> <i class="far fa-heart"></i></a>
                            <a href="<?=$chitietsp?>"> <i class="far fa-eye"></i></a>
                          </div> -->
                        </div>
                        <div class="list-pro-line-text">
                          <p><?=$tensp?></p>
                        </div>
                        <div class="list-pro-line-price">
                          <?php if($dssp['giamgia']>0){
                              ?>
                          <div class="list-pro-price-begin">
                            <p><?=number_format($giasp)?> &#8363</p>
                          </div>
                          <div class="list-pro-price-discount">
                            <p><?=number_format($giagiam)?> &#8363</p>
                          </div>
                          <?php }
                              else{
                              ?>
                          <div class=" text-center">
                            <p><?=number_format($giasp)?> &#8363</p>
                          </div>
                          <?php } ?>
                        </div>
                        <div class="list-icon-line">
                          <a href="#"><i class="fas fa-shopping-basket"></i></i>
                            <a href="#"><i class="far fa-heart"></i></a>
                            <a href="#"><i class="far fa-eye"></i></a>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <!-- ********** -->

                </div>
              </div><!-- END Ngang -->
              <!-- **** -->
            </div> <!-- END tab content -->
          </div> <!-- END list all pro -->

        </div><!-- END listbanner -->
      </div><!-- END col-md-8 -->
    </div><!-- END row -->
  </div><!-- END container -->
  </div>
  </div>
</main>
<script type="text/javascript">
  var nut = document.querySelector('#doseach');
  var filter = document.querySelector('.list-filter');
  nut.addEventListener('click', function () {
    filter.classList.toggle('d-none');
  }, false)
</script>
<script src="view/public/js/js.js"></script>
<script type="text/javascript" src="view/public/js/jquery-3.3.1.slim.js"></script>
<script type="text/javascript" src="view/public/js/popper.min.js"></script>
<script type="text/javascript" src="view/public/js/jquery.min.js"></script>
<script type="text/javascript" src="view/public/js/bootstrap.min.js"></script>