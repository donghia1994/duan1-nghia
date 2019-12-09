<?php 
require './dao/pdo.php';
require './dao/loai.php';
require './dao/cl.php';
require './dao/th.php';

require './dao/mk.php';
require './global.php';
require './dao/sp.php';
require './dao/hinh.php';


require './admin/header.php';
if(isset($_GET['act'])){
    $act = $_GET['act'];
}
else{
    $act = "";
}
    switch ($act) {
        case 'qll':
        $_GET['act']="Quản lý loại";
        require './admin/qll.php';
            break;

        case 'qlth':
        $_GET['act']="Quản lý thương hiệu";
        require './admin/qlth.php';
            break;

        case 'qlcl':
        $_GET['act']="Quản lý chất liệu";
        require './admin/qlcl.php';
            break;       
        
        case 'qlsp':
        $_GET['act']="Quản lý sản phẩm";
        require './admin/qlsp.php';
            break;

        case 'qlkh':
        $_GET['act']="Quản lý khách hàng";
        require './admin/qlkh.php';
            break;
           
        case 'qlh':
        $_GET['act']="Quản lý hình sản phẩm";
        require './admin/qlh.php';
            break;

        case 'qlbl':
        $_GET['act']="Quản lý bình luận";
        require './admin/qlbl.php';
            break;
        
        case 'thongke':
        $_GET['act']="Thống kê";
        require './admin/thongke.php';
            break;
            
        case 'qlmk':
        $_GET['act']="Quản lý mặt kính";
        require './admin/qlmk.php';
            break;
        default:
        require './admin/home.php';
        break;
    }



require './admin/footer.php';
?>
