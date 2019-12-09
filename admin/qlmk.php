<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Hàng hóa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mặt kính</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon">
                    <span class="feather-icon"><i data-feather="external-link"></i></span></span>
                Danh sách mặt kính</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">

            <?php if(isset($_GET['edit'])){
                        $lht=mk_select_by_mamk($_GET['mamk']);
                        extract($lht);
                                                                                  
                    ?>
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Bảng chỉnh sửa</h5>
                    <p class="mb-40">
                        Chỉnh sửa mặt kính - <span class="badge badge-info">mã
                            <?=$_GET['mamk']?></span></p>
                    <?php if(isset($_POST['btn-edit'])){
                        $mamk=$_POST['mamk'];    
                        $tenmk=$_POST['tenmk'];
                        $mota=$_POST['mota'];							                 
                        mk_update($tenmk,$mota,$mamk);
                        echo '<div class="alert alert-success" role="alert">
                        Sửa thành công mặt kính - <span class="badge badge-info"> mã '.$_GET['mamk'].'</span>.
                        <a class="genric-btn primary circle arrow" href="admin.php?act=qlmk">Về trang mặt kính</a>
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
                                                <th>Mã mặt kính</th>
                                                <th>Tên mặt kính</th>
                                                <th>Mô tả</th>
                                                <th>...</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                                                    <td>
                                                        <input type="number" class="form-control" name="mamk" value="<?=$lht['mamk']?>"
                                                            readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="tenmk" value="<?=$lht['tenmk']?>">
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
                                <p>Vui lòng xác nhận xóa mặt kính - <span class="badge badge-info">mã
                                        <?=$_GET['mamk']?></span> </p>
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-primary" href="<?='admin.php?act=qlmk&mamk='.$_GET['mamk'].'&yes=1'?>">Chấp
                                    nhận</a>
                                <a class="btn btn-secondary" href="<?='admin.php?act=qlmk'?>">Từ bỏ</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <?php } 
                        elseif(isset($_GET['yes'])){
                            mk_delete($_GET['mamk']);
                        ?>


        <div class="col-lg-12">
            <div class="alert alert-success" role="alert">
                Xóa thành công mặt kính - <span class="badge badge-info">mã
                    <?=$_GET['mamk']?></span>
                <a class="btn btn-primary" href="admin.php?act=qlmk">Về trang mặt kính</a>
            </div>
        </div>

        <?php } 
                        elseif(isset($_GET['add'])){

                        ?>
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Bảng thêm kiểu hàng</h5>
                <?php if(isset($_POST['btn-add'])){
                        $tenmk=$_POST['tenmk'];
                        $mota=$_POST['mota'];							                 
                        mk_insert($tenmk,$mota);
                        echo '<div class="alert alert-success" role="alert">
                        Thêm thành công mặt kính mới.
                        <a class="genric-btn primary circle arrow" href="admin.php?act=qlmk">Về trang mặt kính</a>
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
                                            <th>Tên mặt kính</th>
                                            <th>Mô tả</th>
                                            <th>...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                                                <td>
                                                    <input type="text" class="form-control" name="tenmk" placeholder="Nhập tên mặt kính">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="mota" placeholder="Nhập tên mặt kính">
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
                <h5 class="hk-sec-title">Mặt kính</h5>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Mã mặt kính</th>
                                            <th>Tên mặt kính</th>
                                            <th>Mô tả</th>
                                            <th>Sửa/Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $dsl=mk_select_all();
                                                    foreach($dsl as $dsl){
                                                        extract($dsl);
                                                        $mamk=$dsl['mamk'];
                                                        $tenmk=$dsl['tenmk'];
                                                        $mota=$dsl['mota']; 
                                                        $edit='admin.php?act=qlmk&edit=1&mamk='.$mamk.'';
                                                        $del='admin.php?act=qlmk&del=1&mamk='.$mamk.'';
                                                ?>

                                        <tr>
                                            <td>
                                                <?=$mamk?>
                                            </td>
                                            <td>
                                                <?=$tenmk?>
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
                                        <td align="center" colspan="4"><a href="admin.php?act=qlmk&add=1" class="btn btn-info">
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