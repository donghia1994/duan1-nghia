<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Hàng hóa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon">
                    <span class="feather-icon"><i data-feather="external-link"></i></span></span>
                <a href="admin.php?act=qlsp"> Danh sách sản phẩm </a></h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">

            <?php if(isset($_GET['edit'])){
                        $spht=sp_select_by_masp($_GET['masp']);
                        extract($spht);
                                                                                  
                    ?>
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Bảng chỉnh sửa</h5>
                    <p class="mb-40">
                        Chỉnh sửa sản phẩm - <span class="badge badge-info">mã
                            <?=$_GET['masp']?></span></p>
                    <?php if(isset($_POST['btn-edit'])){
                        $tensp=$_POST['tensp'];
                        $masp=$_POST['masp'];
                                                
                        $giasp=$_POST['giasp'];
                        $giamgia=$_POST['giamgia'];
                        
                        $mota=$_POST['mota'];
                        $trangthai=$_POST['trangthai'];
                        $hot=$_POST['hot'];

                        if($_POST['giamgia']>0){
                            $khuyenmai=1;
                        }
                        else{$khuyenmai=0;}

                        $maloai=$_POST['chonl'];
                        $macl=$_POST['choncl'];
                        $mathh=$_POST['chonthh'];							                 
                        sp_update( $tensp, $giasp, $giamgia, $mota,$khuyenmai, $trangthai, $hot, $mathh, $macl, $maloai,$masp);
                        echo '<div class="alert alert-success" role="alert">
                        Sửa thành công sản phẩm - <span class="badge badge-info"> mã '.$_GET['masp'].'</span>.
                        <a class="genric-btn success circle arrow" href="admin.php?act=qlsp">Về trang loại</a>
                        </div>
                        ';} 
                        ?>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="edit_datable_1" class="table  table-bordered table-striped mb-0">
                                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
                                        <tr>
                                                <th>Tên sản phẩm</th>
                                                <td>
                                                    <input type="text" class="form-control" name="tensp" value="<?=$spht['tensp']?>">
                                                </td>
                                                <th>Kiểu loại</th>
                                                <td>
                                                <input type="hidden" class="form-control" name="masp" value="<?=$_GET['masp']?>">

                                                <div class="form-group">
                                                        <select class="form-control custom-select"  name="chonl">
                                                            <?php 
                                                                $dsl=loai_select_all();
                                                                foreach($dsl as $dsl){
                                                                extract($dsl); ?>
                                                            <option><?=$dsl['maloai'].' - '.$dsl['tenloai']?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>                                                
                                                </td>
                                         </tr>       
                                               
                                                
                                             <tr>
                                                <th>Giá sản phẩm</th>
                                                <td>
                                                    <input type="number" class="form-control" name="giasp" value="<?=$spht['giasp']?>">
                                                </td>
                                                <th>Chất liệu</th>
                                                <td>
                                                    <div class="form-group">
                                                        <select class="form-control custom-select"  name="choncl">
                                                            <?php 
                                                                $dscl=cl_select_all();
                                                                foreach($dscl as $dscl){
                                                                extract($dscl); ?>
                                                            <option><?=$dscl['macl'].' - '.$dscl['tencl']?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </td>    
                                        </tr>
                                        <tr>
                                                <th>Giảm giá ( % )</th>
                                                <td>
                                                    <input type="number" class="form-control" name="giamgia" value="<?=$spht['giamgia']?>">
                                                </td>
                                                <th>Thương hiệu</th>
                                                <td>
                                                    <div class="form-group">
                                                    <select class="form-control custom-select"  name="chonthh">
                                                            <?php 
                                                                $dsthh=thh_select_all();
                                                                foreach($dsthh as $dsthh){
                                                                extract($dsthh); ?>
                                                            <option><?=$dsthh['mathh'].' - '.$dsthh['tenthh']?></option>
                                                            <?php } ?>
                                                    </div>                                                
                                                </td>    
                                        </tr>
                                        <tr>
                                                <th>Hot</th>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                            <input type="radio"  name="hot" class="form-check-input" value="1" <?php if($spht['hot']==1) echo "checked";?>>
                                                            <label class="form-check-label" for="customRadio1" > Đang </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                            <input type="radio"  name="hot" class="form-check-input" value="0" <?php if($spht['hot']==0) echo "checked";?>> 
                                                            <label class="form-check-label" for="customRadio3"> Chưa </label>
                                                    </div>
                                                </td>
                                                <th>Trạng thái</th>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                            <input type="radio"  name="trangthai" class="form-check-input" value="1" <?php if($spht['trangthai']==1) echo "checked";?>>
                                                            <label class="form-check-label" for="customRadio1" > Còn hàng </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                            <input type="radio"  name="trangthai" class="form-check-input" value="0" <?php if($spht['trangthai']==0) echo "checked";?>> 
                                                            <label class="form-check-label" for="customRadio3"> Hết hàng </label>
                                                    </div>
                                                </td>   
                                        </tr>
                                        <tr>
                                            <th>Mô tả</th>
                                            <td colspan="4" align="center">
                                                    <textarea name="mota" class="form-control"><?=$spht['mota']?></textarea>
                                                </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" align="center">
                                                    <button type="submit" class="btn btn-gradient-success mb-2" name="btn-edit">Sửa lại</button>
                                                </td>
                                                </tr>
                                                </form>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php }
                        elseif(isset($_GET['del'])){
                            ?>
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Bảng xác nhận</h5>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Vui lòng xác nhận xóa sản phẩm - <span class="badge badge-info">mã
                                        <?=$_GET['masp']?></span> </p>
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-gradient-success" href="<?='admin.php?act=qlsp&masp='.$_GET['masp'].'&yes=1'?>">Chấp
                                    nhận</a>
                                <a class="btn btn-gradient-secondary" href="<?='admin.php?act=qlsp'?>">Từ bỏ</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <?php } 
                        elseif(isset($_GET['yes'])){
                            sp_delete($_GET['masp']);
                        ?>


        <div class="col-lg-12">
            <div class="alert alert-success" role="alert">
                Xóa thành công sản phẩm - <span class="badge badge-info">mã
                    <?=$_GET['masp']?></span>
                <a class="btn btn-gradient-success" href="admin.php?act=qlsp">Về trang loại</a>
            </div>
        </div>

        <?php } 
                        elseif(isset($_GET['add'])){
                        ?>
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Bảng thêm kiểu hàng</h5>
                <?php if(isset($_POST['btn-add'])){
                                                $tensp=$_POST['tensp'];
                                                
                                                $giasp=$_POST['giasp'];
                                                $giamgia=$_POST['giamgia'];
                                                
                                                $mota=$_POST['mota'];
                                                $trangthai=$_POST['trangthai'];
                                                $hot=$_POST['hot'];

                                                if($_POST['giamgia']>0){
                                                    $khuyenmai=1;
                                                }
                                                else{$khuyenmai=0;}

                                                $maloai=$_POST['chonl'];
                                                $macl=$_POST['choncl'];
                                                $mathh=$_POST['chonthh'];							                 
                                                sp_insert( $tensp, $giasp, $giamgia, $mota,$khuyenmai, $trangthai, $hot, $mathh, $macl, $maloai);
                                                echo '<div class="alert alert-success" role="alert">
                                                Thêm thành công sản phẩm mới.
                                                <a class="genric-btn success circle arrow" href="admin.php?act=qlsp">Về trang loại</a>
                                                </div>
                                                ';} 
                                                ?>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="edit_datable_1" class="table  table-bordered table-striped mb-0">
                                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
                                        <tr>
                                                <th>Tên sản phẩm</th>
                                                <td>
                                                    <input type="text" class="form-control" name="tensp" placeholder="Nhập tên loại">
                                                </td>
                                                <th>Kiểu loại</th>
                                                <td>
                                                <div class="form-group">
                                                        <select class="form-control custom-select"  name="chonl">
                                                            <?php 
                                                                $dsl=loai_select_all();
                                                                foreach($dsl as $dsl){
                                                                extract($dsl); ?>
                                                            <option><?=$dsl['maloai'].' - '.$dsl['tenloai']?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>                                                
                                                </td>
                                         </tr>       
                                               
                                                
                                             <tr>
                                                <th>Giá sản phẩm</th>
                                                <td>
                                                    <input type="number" class="form-control" name="giasp" placeholder="Nhập giá sản phẩm">
                                                </td>
                                                <th>Chất liệu</th>
                                                <td>
                                                    <div class="form-group">
                                                        <select class="form-control custom-select"  name="choncl">
                                                            <?php 
                                                                $dscl=cl_select_all();
                                                                foreach($dscl as $dscl){
                                                                extract($dscl); ?>
                                                            <option><?=$dscl['macl'].' - '.$dscl['tencl']?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </td>    
                                        </tr>
                                        <tr>
                                                <th>Giảm giá ( % )</th>
                                                <td>
                                                    <input type="number" class="form-control" name="giamgia" placeholder="Nhập % giảm giá">
                                                </td>
                                                <th>Thương hiệu</th>
                                                <td>
                                                    <div class="form-group">
                                                    <select class="form-control custom-select"  name="chonthh">
                                                            <?php 
                                                                $dsthh=thh_select_all();
                                                                foreach($dsthh as $dsthh){
                                                                extract($dsthh); ?>
                                                            <option><?=$dsthh['mathh'].' - '.$dsthh['tenthh']?></option>
                                                            <?php } ?>
                                                    </div>                                                
                                                </td>    
                                        </tr>
                                        <tr>
                                                <th>Hot</th>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                            <input type="radio"  name="hot" class="form-check-input" value="1" checked >
                                                            <label class="form-check-label" for="customRadio1" > Đang </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                            <input type="radio"  name="hot" class="form-check-input" value="0"> 
                                                            <label class="form-check-label" for="customRadio3"> Chưa </label>
                                                    </div>
                                                </td>
                                                <th>Trạng thái</th>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                            <input type="radio"  name="trangthai" class="form-check-input" value="1" checked >
                                                            <label class="form-check-label" for="customRadio1" > Còn hàng </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                            <input type="radio"  name="trangthai" class="form-check-input" value="0"> 
                                                            <label class="form-check-label" for="customRadio3"> Hết hàng </label>
                                                    </div>
                                                </td>   
                                        </tr>
                                        <tr>
                                            <th>Mô tả</th>
                                            <td colspan="4" align="center">
                                                    <textarea name="mota" class="form-control" placeholder="Nhập mô tả sản phẩm"></textarea>
                                                </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" align="center">
                                                    <button type="submit" class="btn btn-gradient-success mb-2" name="btn-add">Thêm
                                                        vào</button>
                                                </td>
                                                </tr>
                                                </form>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <?php
                        }
                        else{
                            ?>
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered mb-0  ">
                                    <thead>
                                        <tr>
                                                <th>Mã sản phẩm</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Giá mới<br>Giảm giá ( % )</th>
                                                <th>Hot</th>
                                                <th>Ngày đăng</th>
                                                <th>Mô tả</th>
                                                <th>Sửa/Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $dsl=sp_select_all();
                                                    foreach($dsl as $dsl){
                                                        extract($dsl);
                                                        $masp=$dsl['masp'];
                                                        $tensp=$dsl['tensp'];
                                                        $mota=$dsl['mota'];
                                                        $giamgia=$dsl['giamgia'];
                                                        $giasp=$dsl['giasp'];
                                                        $km=$dsl['khuyenmai'];
                                                        $hot=$dsl['hot'];
                                                        $ngaydang=$dsl['ngaydang'];
                                                        $luotxem=$dsl['luotxem']; 
                                                        
                                                        $edit='admin.php?act=qlsp&edit=1&masp='.$masp.'';
                                                        $del='admin.php?act=qlsp&del=1&masp='.$masp.'';
                                                ?>

                                        <tr>
                                            <td>
                                                <?=$masp?>
                                            </td>
                                            <td>
                                                <?=$tensp?>
                                            </td>
                                            <td>
                                                <?=$giasp?><br>
                                                <?=$giamgia?>
                                            </td>
                                            <td>
                                                <?=$hot?>
                                            </td>
                                            <td>
                                                <?=$ngaydang?>
                                            </td>
                                            <td>
                                                <?=$mota?>
                                            </td>
                                            <td>
                                                <a href="<?=$edit?>" class="mr-25" data-toggle="tooltip"
                                                    data-original-title="Edit"> <i class="icon-pencil"></i> </a>
                                                <a href="<?=$del?>" data-toggle="tooltip" data-original-title="Close">
                                                    <i class="icon-trash txt-danger"></i></a>
                                            </td>
                                        </tr>

                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <td align="center" colspan="12"><a href="admin.php?act=qlsp&add=1" class="btn btn-gradient-info">
                                                Thêm mới</a></td>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php
                        }                                      
                        ?>

    </div>
    <!-- /Row -->
</div>
<!-- /Container -->
<!-- /Main Content -->