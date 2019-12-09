<main class="mb-5">
  <?php 
    if(empty($sptimdc)){
      $mes="Không có sản phẩm phù hợp";
    }
    else{
      $mes='';
    }
   
  ?>
  <div class="list-banner" id="listtextinbanner">

    <!-- <div class="list-img-banner">
      <img src="view/public/img/list-banner/list-img2.jpg">
      <div class="list-text-in-banner">
      </div>
      <div class="list-img-hover1" id="listimghover1">
        <img src="view/public/img/list-banner/list-hover-img3.png">
      </div>
      <div class="list-img-hover2" id="listimghover2">
        <img src="view/public/img/list-banner/list-hover-img2.png">
      </div>
      <div class="list-img-hover3" id="listimghover3">
        <img src="view/public/img/list-banner/list-hover-img1.png">
      </div>
    </div> -->



    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="list-home mt-3">
            <div class="list-ml">
              <p><i class="fas fa-home" style="color:black;"></i> Home / Đồng Hồ              
              </p>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-12">
          <div class="list-home mt-3 d-xl-none d-lg-none is-active" id="list-hidden">
            <div class="list-ml">
              <p id="doseach"><i class="fas fa-search"></i> Search</p>
            </div>
          </div>
        </div> -->

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
        </div>

        <!-- *** -->



        <!-- Phần sản phẩm -->
        <div class="col-md-8 col-sm-12 col-12 mt-3">
          <div class="list-sapxep-title">
            <div class="list-sapxep-text">
              <p>Hiển Thị</p>
            </div>
            <div class="list-sapxep-view">

              <a class="active" data-toggle="tab" href="#home"><i class="fas fa-th"></i></a>
              /
              <a data-toggle="tab" href="#menu1"><i class="fas fa-grip-lines"></i></a>

            </div>
          </div>
          <div class="list-all-pro mt-3">
            <div class="tab-content">
              <!-- home -->
              <!-- $giagiam= $dssp['giamgia']>0 ? $dssp['giamgia'] : "" ;  -->
              <div id="home" class="tab-pane fade  in active">
                <div class="row">
                  <!-- sản phẩm o day ne thang lol -->
                  <?php 
                      if(empty($sptimdc)){
                        echo '<div class="alert alert-warning d-block mx-auto">'.$mes.'</div>';
                      }
                      else{
                      foreach($sptimdc as $dssp){
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
                        <div class="list-all-pro" >
                          <div class="list-pro" style="min-height:270px;height:auto;">
                            <div class="list-pro-img">
                              <img src="<?=$hinh?>" >
                              <?php if($dssp['giamgia']>0){
                              ?>                      
                                <div class="list-pro-discount text-center">
                                  <span><?=number_format($dssp['giamgia'])?>&#37</span>
                                </div>
                              <?php } ?> 
                              <div class="list-icon text-center">
                                <a href="<?=$addcart?>"><i class="fas fa-shopping-basket"></i></i>
                                <a href="<?=$love?>"><i class="far fa-heart"></i></a>
                                <a href="<?=$chitietsp?>#"><i class="far fa-eye"></i></a>
                              </div>
                            </div>
                            <div class="list-pro-name p-1 " style="font-size:1em;min-height:20px;height:auto;" >
                              <b><p><?=$tensp?></p></b>
                            </div>
                            <div class="list-pro-price" >
                              <?php if($dssp['giamgia']>0){
                              ?> 
                              <div class="list-pro-price-begin" style="font-size:.8em;">
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
              </div>
              <!-- **** -->

              <!-- hinh ngang -->
              <div id="menu1" class="tab-pane fade">
                <div class="row">
                  <!-- san pham o day nua ne thang lol -->
                  <?php 

                     
                      foreach($sptimdc as $dssp){
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
                  <?php } } ?>
                  <!-- ********** -->

                </div>
              </div>
              <!-- *** -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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