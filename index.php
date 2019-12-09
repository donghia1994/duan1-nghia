<?php
session_start();

require './dao/pdo.php';

require './dao/loai.php';
require './dao/cl.php';
require './dao/th.php';
require './dao/kh.php';



require './dao/mk.php';
require './dao/sp.php';
require './dao/hinh.php';

require './dao/hd.php';


require './global.php';

require './view/head.php';
require './view/header.php';

if(isset($_GET['act'])){
$act = $_GET['act'];
}
else{
$act = "";
}

switch ($act) {


    case 'chitietsp':
    require './view/chitietsp.php';
    break;

    case 'listsp':
    require './view/listsp.php';
    break;

    case 'listcompany':
    require './view/listcompany.php';
    break;

    case 'map':
    require './view/map.php';
    break;

    case 'about':
    require './view/about.php';
    break;

    case 'regis':
    require './view/registration.php';
    break;

    case 'login':
    require './view/login.php';
    break;

    case 'user':
    require './view/user.php';
    break;
    
    case 'checkout':
    require './view/checkout.php';
    break;

    case 'inlog':
    require './controller/inlog.php';
    break;

    case 'logout':
    require './controller/logout.php';
    break;

    case 'search':
    require './controller/search.php';
    break;


        // Shopping cart

        case 'cart':
        require './view/cart.php';
        break;

        case 'addcart':
        if(isset($_SESSION['s_makh'])){
        require './controller/addcart.php';
        break;
        }
        else{
            echo '<div class="alert alert-danger text-center mt-3"> Chào bạn, hãy đăng nhập để tiếp tục mua hàng</div>';
        require './view/login.php';
        break;
        }

        case 'love':
        if(isset($_SESSION['s_makh'])){
        require './controller/love.php';
        break;
        }
        else{
            echo '<div class="alert alert-danger text-center mt-3"> Chào bạn, hãy đăng nhập để tiếp tục thêm sản phẩm</div>';
        require './view/login.php';
        break;
        }

        case 'delcart':
        require './controller/delcart.php';
        break;

        case 'editcart':
        require './controller/editcart.php';
        break;


    default:
    require './view/home.php';
    break;
    }



require './view/footer.php';

?>