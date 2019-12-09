<?php
//Lấy mã sp cần thêm vào giỏ hàng
$masp=isset($_GET['masp'])? $_GET['masp'] : '';


// Kiểm tra giỏ hàng có tồn tại chưa
if(isset($_SESSION['giohang'])){
    // echo 'Exist';
    if (isset($_SESSION['giohang'][$masp])) {
        $_SESSION['giohang'][$masp]['soluong'] +=1;

    }
    else{
        $_SESSION['giohang'][$masp]['soluong'] =1;
    }
    require './view/cart.php';
}
else{
    // echo 'Not';
    $_SESSION['giohang'][$masp]['soluong']=1;
    require './view/cart.php';


}

?>