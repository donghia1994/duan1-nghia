<?php

ob_start();
// Kiểm tra giỏ hàng có tồn tại chưa
if(!isset($_SESSION['giohang'])){
    require './view/home.php';
}
    $masp=isset($_GET['masp'])? $_GET['masp'] : '';
    if($masp){
        if(array_key_exists($masp,$_SESSION['giohang'])){
            unset($_SESSION['giohang'][$masp]);
                if(empty($_SESSION['giohang'])){
                    unset($_SESSION['giohang']);
                }
            }
        } 
    require './view/cart.php';
 


?>