<?php
require_once 'pdo.php';

function kh_insert($email, $mk, $tenkh){
    $sql = "INSERT INTO kh(email, mk, tenkh) VALUES ( ?, ?, ?)";
    pdo_execute($sql, $email, $mk, $tenkh);
}

function kh_nhap_insert($tenkh, $mk, $sdt, $diachi, $nghe, $email){
    $sql="INSERT INTO `khachhang`(`tenkh`,`matkhau`, `sdt`, `diachi`, `nghe`, `email`) 
    VALUES (?,?,?,?,?,?)";
    pdo_execute($sql, $tenkh, $mk, $sdt, $diachi, $nghe, $email);
}  

function kh_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro){
    $sql = "UPDATE kh SET mat_khau=?,ho_ten=?,email=?,hinh=?,kich_hoat=?,vai_tro=? WHERE ma_kh=?";
    pdo_execute($sql, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat==1, $vai_tro==1, $ma_kh);
}

function kh_delete($ma_kh){
    $sql = "DELETE from khachhang  WHERE ma_kh=?";
    if(is_array($ma_kh)){
        foreach ($ma_kh as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $ma_kh);
    }
}

function kh_select_all(){
    $sql = "SELECT * from khachhang";
    return pdo_query($sql);
}

function kh_select_by_id($ma_kh){
    $sql = "SELECT * from khachhang WHERE ma_kh=?";
    return pdo_query_one($sql, $ma_kh);
}
function kh_login($tenkh,$mk){
    $sql = "SELECT * from khachhang WHERE tenkh=? and matkhau=?";
    return pdo_query_one($sql, $tenkh, $mk);
}

function kh_exist($ma_kh){
    $sql = "SELECT count(*) from khachhang WHERE $ma_kh=?";
    return pdo_query_value($sql, $ma_kh) > 0;
}

function kh_select_by_role($vai_tro){
    $sql = "SELECT * from khachhang WHERE vai_tro=?";
    return pdo_query($sql, $vai_tro);
}

function kh_change_password($ma_kh, $mat_khau_moi){
    $sql = "UPDATE kh SET mat_khau=? WHERE ma_kh=?";
    pdo_execute($sql, $mat_khau_moi, $ma_kh);
}