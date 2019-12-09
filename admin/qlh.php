<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Hàng hóa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Hình sản phẩm</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon">
                    <span class="feather-icon"><i data-feather="external-link"></i></span></span>
                <a href="admin.php?act=qlh" >Danh sách hình sản phẩm </a></h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">

            <?php if(isset($_GET['edit'])){
                      
                                                                                  
                    ?>
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Bảng chỉnh sửa</h5>
                    <p class="mb-40">
                        Chỉnh sửa hình - <span class="badge badge-info">mã
                            <?=$_GET['mahinh']?></span></p>
                    <?php if(isset($_POST['btn-edit'])){
                       
                        
                       $tenhinh=$_FILES['tenhinh']['name'];
                       move_uploaded_file($_FILES["tenhinh"]["tmp_name"],$g_path_hinhsp.$tenhinh);
       
                       hinh_update('' ,$tenhinh, $_GET['mahinh']);
                       echo '<div class="alert alert-success" role="alert">
                       Sửa thành công hình <span class="badge badge-info">mã
                       '.$_GET['mahinh'].'</span> .
                       <a class="genric-btn success circle arrow" href="admin.php?act=qlh">Về trang hình</a>
                       </div>
                       ';} 
                        ?>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="edit_datable_1" class="table  table-bordered table-striped mb-0">
                                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
                                    <thead>
                                        <tr>
                                            <th>Mã sản phẩm<br>Tên sản phẩm</th>
                                            <th>Hình hiện tại</th>
                                            <th>Chọn hình</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $spht=sp_select_by_masp($_GET['masp']);
                                                extract($spht);
                                            ?>
                                        <td><?=$spht['masp']?><br><?=$spht['tensp']?></td>
                                        <?php $hinhht=hinh_select_by_mahinh($_GET['mahinh']);
                                                extract($hinhht);
                                            ?>
                                        <td>
                                            <img src="<?=$g_path_hinhsp.$hinhht['tenhinh']?>" class="img-fluid" width="150" alt="">
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Tải ảnh lên</label>
                                                <input type="file" class="form-control-file" name="tenhinh"><br>
                                            </div>    
                                        </td>
                                       
                                    </tbody>
                                    <tfoot>
                                        <td align="center" colspan="12">
                                        <input class="btn btn-gradient-info" name="btn-edit" type="submit" value="Sửa lại">
                                        </td>
                                    </tfoot>
                                           
                                    
                                    
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
                                <p>Vui lòng xác nhận xóa hình - <span class="badge badge-info">mã
                                        <?=$_GET['mahinh']?></span> </p>
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-gradient-success" href="<?='admin.php?act=qlh&mahinh='.$_GET['mahinh'].'&yes=1'?>">Chấp
                                    nhận</a>
                                <a class="btn btn-gradient-secondary" href="<?='admin.php?act=qlh'?>">Từ bỏ</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <?php } 
                        elseif(isset($_GET['yes'])){
                            $hinh=hinh_select_by_mahinh($_GET['mahinh']);
                            unlink($g_path_hinhsp.$hinh['tenhinh']);
                            hinh_delete($_GET['mahinh']);

                        ?>


        <div class="col-lg-12">
            <div class="alert alert-success" role="alert">
                Xóa thành công sản phẩm - <span class="badge badge-info">mã
                    <?=$_GET['mahinh']?></span>
                <a class="btn btn-gradient-success" href="admin.php?act=qlh">Về trang hình</a>
            </div>
        </div>

        <?php } 
        elseif(isset($_GET['add'])){
        ?>
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Bảng thêm hình</h5>
                <?php if(isset($_POST['btn-add'])){                                  
                $chinh=$_POST['chinh'];
                $tenhinh=$_FILES['tenhinh']['name'];
                move_uploaded_file($_FILES["tenhinh"]["tmp_name"],$g_path_hinhsp.$tenhinh);

                hinh_insert($chinh, $tenhinh, $_GET['masp']);
                echo '<div class="alert alert-success" role="alert">
                Thêm thành công hình mới.
                <a class="genric-btn success circle arrow" href="admin.php?act=qlh">Về trang hình</a>
                </div>
                ';} 
                ?>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="edit_datable_1" class="table  table-bordered table-striped mb-0">
                                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
                                        
                                    <thead>
                                        <tr>
                                            <th>Mã sản phẩm<br>Tên sản phẩm</th>
                                            <th>Chọn hình</th>
                                            <th>Loại hình</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $spht=sp_select_by_masp($_GET['masp']);
                                                extract($spht);
                                            ?>
                                        <td><?=$spht['masp']?><br><?=$spht['tensp']?></td>
                                        <td>
                                            <div class="form-group">
                                                <label for="exampleFormControlFile1">Tải ảnh lên</label>
                                                <input type="file" class="form-control-file" name="tenhinh"><br>
                                            </div>    
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio"  name="chinh" class="form-check-input" value="1">
                                                <label class="form-check-label" for="customRadio1" > Hình chính </label>
                                                </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio"  name="chinh" class="form-check-input" value="0" checked> 
                                                <label class="form-check-label" for="customRadio3"> Hình phụ </label>
                                            </div>
                                        </td>   
                                    </tbody>
                                    <tfoot>
                                        <td align="center" colspan="12">
                                        <input class="btn btn-gradient-info" name="btn-add" type="submit" value="Thêm mới">
                                        </td>
                                    </tfoot>
                                           
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
                                                <th>Mã sản phẩm<br>Tên sản phẩm</th>
                                                <th>Hình chính</th>
                                                <th>Hình phụ</th>
                                              
                                                <th>Thêm</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $dsl=sp_select_all();
                                                    foreach($dsl as $dsl){
                                                        extract($dsl);
                                                        $masp=$dsl['masp'];
                                                        $tensp=$dsl['tensp'];                                                        
                                                        $add='admin.php?act=qlh&add=1&masp='.$masp.'';
                                                ?>

                                        <tr>
                                            <td>
                                                <?=$masp?> - <br>
                                                <?=$tensp?>
                                            </td>
                                            <!-- masp và tensp -->
                                           
                                            <td>
                                                <?php 
                                                    $hinh9=hinh_select_by_masp_chinh($masp);
                                                    if(empty($hinh9)){
                                                        $hinh9='';
                                                    }
                                                    else{
                                                       
                                                        extract($hinh9);
                                                        $edit='admin.php?act=qlh&edit=1&masp='.$hinh9['masp'].'&mahinh='.$hinh9['mahinh'].'';
                                                        $del='admin.php?act=qlh&del=1&mahinh='.$hinh9['mahinh'].'';                                                                                                      
                                                    }
                                                ?>  
                                                <img src="<?=$g_path_hinhsp.$hinh9['tenhinh']?>" class="img-fluid" width="150" alt="">
                                                    <?php if($hinh9!==''){ ?>
                                                        <div class="text-center">
                                                            <a href="<?=$edit?>" class="mr-25" data-toggle="tooltip"
                                                                data-original-title="Edit"> <i class="icon-pencil"></i> </a>
                                                            <a href="<?=$del?>" data-toggle="tooltip" data-original-title="Close">
                                                                <i class="icon-trash txt-danger"></i></a>
                                                        </div>
                                                    <?php } ?>

                                            </td>
                                            <!-- hinh9 -->          
                                            <td>
                                            <div class="row">
                                            <?php $hinh=hinh_select_by_masp_phu($masp);
                                                    foreach($hinh as $hinh){
                                                    extract($hinh);
                                                    $edit='admin.php?act=qlh&edit=1&masp='.$hinh['masp'].'&mahinh='.$hinh['mahinh'].'';
                                                    $del='admin.php?act=qlh&del=1&mahinh='.$hinh['mahinh'].'';                                                                                                
                                            ?>
                                                
                                                <div class="col-md-3">
                                                <img src="<?=$g_path_hinhsp.$hinh['tenhinh']?>" class="img-fluid mr-2 d-block mx-auto" width="150" alt="">
                                                        <br>
                                                    <div class="text-center">
                                                <a href="<?=$edit?>" class="mr-25" data-toggle="tooltip"
                                                    data-original-title="Edit"> <i class="icon-pencil"></i> </a>
                                                <a href="<?=$del?>" data-toggle="tooltip" data-original-title="Close">
                                                    <i class="icon-trash txt-danger"></i></a>
                                                    </div>
                                                </div>
                                            
                                            <!-- hinhphu -->          
                                            <?php } ?>
                                            </div>
                                            </td>
                                            <td>
                                            
                                                <a href="<?=$add?>" class="mr-25" data-toggle="tooltip"
                                                    data-original-title="Thêm"> <i class="icon-plus"></i> </a>
                                            </td>
                                        </tr>
                                           
                                        <?php } ?>
                                        
                                    </tbody>
                                    <!-- <tfoot>
                                        <td align="center" colspan="12"><a href="admin.php?act=qlsp&add=1" class="btn btn-gradient-info">
                                                Thêm mới</a></td>
                                    </tfoot> -->
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