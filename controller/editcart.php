<?php

if(!isset($_SESSION['giohang'])){
    require './view/home.php';
}
    // $masp=isset($_GET['masp'])? $_GET['masp'] : '';
if(isset($_POST['btn-edit'])){
    // echo '<pre>';
    // foreach($_SESSION['giohang'] as $key => $val){
    //     $key=$_SESSION['giohang'][$masp];
    // }
    $masp=$_POST['masp'];
        foreach($_POST['soluong'] as $key => $val){       
            $_SESSION['giohang'][$masp[$key]]['soluong']= $val;
            }
require_once './view/cart.php';
}
elseif(isset($_POST['btn-checkout'])){

$ghichu=$_POST['ghichu'];
$tonggia=(int)$_POST['tonggia'];
$makh=$_SESSION['s_makh'];

hd_insert( $ghichu, $tonggia, $makh);
$hdmoi=hd_select_by_mahd_latest();
$mahd=$hdmoi['mahd'];
foreach($_SESSION['giohang'] as $key => $val){
    $masp=$key;
    $soluong=$val;
}
print_r($_SESSION['giohang']); echo '<br>';
print_r($ghichu); echo '<br>';
print_r($tonggia); echo '<br>';
print_r($makh); echo '<br>';
print_r($mahd); echo '<br>';
print_r($masp); echo '<br>';
print_r($soluong); echo '<br>';

}
  
 


?>