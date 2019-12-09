<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Hàng hóa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kiểu loại</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon">
                    <span class="feather-icon"><i data-feather="external-link"></i></span></span>
                Danh sách kiểu loại</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">

            <?php if(isset($_GET['edit'])){
                        $lht=loai_select_by_id($_GET['maloai']);
                        extract($lht);
                                                                                  
                    ?>
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Bảng chỉnh sửa</h5>
                    <p class="mb-40">
                        Chỉnh sửa kiểu loại - <span class="badge badge-info">mã
                            <?=$_GET['maloai']?></span></p>
                    <?php if(isset($_POST['btn-edit'])){
                        $maloai=$_POST['maloai'];    
                        $tenloai=$_POST['tenloai'];
                        $mota=$_POST['mota'];							                 
                        loai_update($tenloai,$mota,$maloai);
                        echo '<div class="alert alert-success" role="alert">
                        Sửa thành công kiểu loại - <span class="badge badge-info"> mã '.$_GET['maloai'].'</span>.
                        <a class="genric-btn primary circle arrow" href="admin.php?act=qll">Về trang loại</a>
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
                                                <th>Mã kiểu loại</th>
                                                <th>Tên kiểu loại</th>
                                                <th>Mô tả</th>
                                                <th>...</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                                                    <td>
                                                        <input type="number" class="form-control" name="maloai" value="<?=$lht['maloai']?>"
                                                            readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="tenloai" value="<?=$lht['tenloai']?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="mota" value="<?=$lht['mota']?>">
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
                                <p>Vui lòng xác nhận xóa kiểu loại - <span class="badge badge-info">mã
                                        <?=$_GET['maloai']?></span> </p>
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-primary" href="<?='admin.php?act=qll&maloai='.$_GET['maloai'].'&yes=1'?>">Chấp
                                    nhận</a>
                                <a class="btn btn-secondary" href="<?='admin.php?act=qll'?>">Từ bỏ</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <?php } 
                        elseif(isset($_GET['yes'])){
                            loai_delete($_GET['maloai']);
                        ?>


        <div class="col-lg-12">
            <div class="alert alert-success" role="alert">
                Xóa thành công kiểu loại - <span class="badge badge-info">mã
                    <?=$_GET['maloai']?></span>
                <a class="btn btn-primary" href="admin.php?act=qll">Về trang loại</a>
            </div>
        </div>

        <?php } 
                        elseif(isset($_GET['add'])){

                        ?>
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Bảng thêm kiểu hàng</h5>
                <?php if(isset($_POST['btn-add'])){
                                                $tenloai=$_POST['tenloai'];
                                                $mota=$_POST['mota'];							                 
                                                loai_insert($tenloai,$mota);
                                                echo '<div class="alert alert-success" role="alert">
                                                Thêm thành công kiểu loại mới.
                                                <a class="genric-btn primary circle arrow" href="admin.php?act=qll">Về trang loại</a>
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
                                            <th>Tên kiểu loại</th>
                                            <th>Mô tả</th>
                                            <th>...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                                                <td>
                                                    <input type="text" class="form-control" name="tenloai" placeholder="Nhập tên loại">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="mota" placeholder="Nhập tên loại">
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
                <h5 class="hk-sec-title">Kiểu loại</h5>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table table-hover w-100 display pb-30">
                                    <thead>
                                        <tr>
                                            <th>Mã loại</th>
                                            <th>Tên loại</th>
                                            <th>Mô tả</th>
                                            <th>Sửa/Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $dsl=loai_select_all();
                                                    foreach($dsl as $dsl){
                                                        extract($dsl);
                                                        $maloai=$dsl['maloai'];
                                                        $tenloai=$dsl['tenloai'];
                                                        $mota=$dsl['mota']; 
                                                        $edit='admin.php?act=qll&edit=1&maloai='.$maloai.'';
                                                        $del='admin.php?act=qll&del=1&maloai='.$maloai.'';
                                                ?>

                                        <tr>
                                            <td>
                                                <?=$maloai?>
                                            </td>
                                            <td>
                                                <?=$tenloai?>
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
                                        <td align="center" colspan="4"><a href="admin.php?act=qll&add=1" class="btn btn-info">
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