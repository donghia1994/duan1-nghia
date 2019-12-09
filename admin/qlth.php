<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Hàng hóa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thương hiệu</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon">
                    <span class="feather-icon"><i data-feather="external-link"></i></span></span>
                Danh sách thương hiệu</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">

            <?php if(isset($_GET['edit'])){
                        $lht=thh_select_by_id($_GET['mathh']);
                        extract($lht);
                                                                                  
                    ?>
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Bảng chỉnh sửa</h5>
                    <p class="mb-40">
                        Chỉnh sửa thương hiệu - <span class="badge badge-info">mã
                            <?=$_GET['mathh']?></span></p>
                    <?php if(isset($_POST['btn-edit'])){
                        $mathh=$_POST['mathh'];    
                        $tenthh=$_POST['tenthh'];
                        $mota=$_POST['mota'];
                        $dacbiet=$_POST['dacbiet'];							                 
                        thh_update($tenthh,$mota,$dacbiet,$mathh);
                        echo '<div class="alert alert-success" role="alert">
                        Sửa thành công thương hiệu - <span class="badge badge-info"> mã '.$_GET['mathh'].'</span>.
                        <a class="genric-btn primary circle arrow" href="admin.php?act=qlth">Về trang loại</a>
                        </div>
                        ';} 
                        ?>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="edit_datable_1" class="table  table-bordered table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th>Mã thương hiệu</th>
                                                <th>Tên thương hiệu</th>
                                                <th>Mô tả</th>
                                                <th>Đặc biệt</th>
                                                <th>...</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                                                    <td>
                                                        <input type="number" class="form-control" name="mathh" value="<?=$lht['mathh']?>"
                                                            readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="tenthh" value="<?=$lht['tenthh']?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="mota" value="<?=$lht['mota']?>">
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="dacbiet" class="form-check-input" value="1" <?php if($lht['dacbiet']==1) echo "checked";?> >
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary mb-2" name="btn-edit">Chỉnh sửa</button>
                                                    </td>
                                                </form>
                                            </tr>
                                        </tbody>
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
                                <p>Vui lòng xác nhận xóa thương hiệu - <span class="badge badge-info">mã
                                        <?=$_GET['mathh']?></span> </p>
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-primary" href="<?='admin.php?act=qlth&mathh='.$_GET['mathh'].'&yes=1'?>">Chấp
                                    nhận</a>
                                <a class="btn btn-secondary" href="<?='admin.php?act=qlth'?>">Từ bỏ</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <?php } 
                        elseif(isset($_GET['yes'])){
                            thh_delete($_GET['mathh']);
                        ?>


        <div class="col-lg-12">
            <div class="alert alert-success" role="alert">
                Xóa thành công thương hiệu - <span class="badge badge-info">mã
                    <?=$_GET['mathh']?></span>
                <a class="btn btn-primary" href="admin.php?act=qlth">Về trang loại</a>
            </div>
        </div>

        <?php } 
                        elseif(isset($_GET['add'])){

                        ?>
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Bảng thêm kiểu hàng</h5>
                <?php if(isset($_POST['btn-add'])){
                                                $tenthh=$_POST['tenthh'];
                                                $mota=$_POST['mota'];							                 
                                                thh_insert($tenthh,$mota);
                                                echo '<div class="alert alert-success" role="alert">
                                                Thêm thành công thương hiệu mới.
                                                <a class="genric-btn primary circle arrow" href="admin.php?act=qlth">Về trang loại</a>
                                                </div>
                                                ';} 
                                                ?>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="edit_datable_1" class="table  table-bordered table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Tên thương hiệu</th>
                                            <th>Mô tả</th>
                                            <th>Đặc biệt</th>
                                            <th>...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                                                <td>
                                                    <input type="text" class="form-control" name="tenthh" placeholder="Nhập tên loại">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="mota" placeholder="Nhập tên loại">
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                    <input type="checkbox" name="dacbiet" class="form-check-input" value="1" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary mb-2" name="btn-add">Thêm
                                                        vào</button>
                                                </td>
                                            </form>
                                        </tr>
                                    </tbody>
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
                <h5 class="hk-sec-title">thương hiệu</h5>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Mã loại</th>
                                            <th>Tên loại</th>
                                            <th>Mô tả</th>
                                            <th>Đặc biệt</th>
                                            <th>Sửa/Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $dsl=thh_select_all();
                                                    foreach($dsl as $dsl){
                                                        extract($dsl);
                                                        $mathh=$dsl['mathh'];
                                                        $tenthh=$dsl['tenthh'];
                                                        $mota=$dsl['mota']; 
                                                        $dacbiet=$dsl['dacbiet'];
                                                        $edit='admin.php?act=qlth&edit=1&mathh='.$mathh.'';
                                                        $del='admin.php?act=qlth&del=1&mathh='.$mathh.'';
                                                ?>

                                        <tr>
                                            <td>
                                                <?=$mathh?>
                                            </td>
                                            <td>
                                                <?=$tenthh?>
                                            </td>
                                            <td>
                                                <?=$mota?>
                                            </td>
                                            <td>
                                                <?php if($dacbiet==1){
                                                    echo "Có";
                                                }
                                                else{ echo "Không";} ?>
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
                                        <td align="center" colspan="4"><a href="admin.php?act=qlth&add=1" class="btn btn-info">
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