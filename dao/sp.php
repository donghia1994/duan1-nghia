<?php
require_once 'pdo.php';

function sp_insert( $tensp, $giamoi, $giamgia, $mota,$khuyenmai, $trangthai, $hot, $mathh, $macl, $maloai){
    $sql = "INSERT INTO sanpham(tensp, giamoi, giamgia, mota,khuyenmai, trangthai, hot, mathh, macl, maloai) 
            VALUES (?,?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql,$tensp, $giamoi, $giamgia, $mota,$khuyenmai, $trangthai, $hot, $mathh, $macl, $maloai);
}
function sp_update( $tensp, $giamoi, $giamgia, $mota,$khuyenmai, $trangthai, $hot, $mathh, $macl, $maloai,$masp){
    $sql = "UPDATE sanpham 
            SET tensp=?,
                giamoi=?,
                giamgia=?,
                mota=?,
                khuyenmai=?,
                trangthai=?,
                hot=?,
                mathh=?,
                macl=?,
                maloai=?
            WHERE masp=?";
    pdo_execute($sql, $tensp, $giamoi, $giamgia, $mota,$khuyenmai, $trangthai, $hot, $mathh, $macl, $maloai,$masp);
}
function sp_delete($masp){
    $sql = "DELETE FROM sanpham WHERE  masp=?";
    if(is_array($masp)){
        foreach ($masp as $masp) {
            pdo_execute($sql, $masp);
        }
    }
    else{
        pdo_execute($sql, $masp);
    }
}

function sp_select_all(){
    $sql = "SELECT * from sanpham order by masp desc";
    return pdo_query($sql);
}


function sp_select_by_masp($masp){
    $sql = "SELECT * from sanpham WHERE masp=?";
    return pdo_query_one($sql, $masp);
}
function sp_select_by_masp_latest(){
    $sql = "SELECT * from sanpham order by masp desc limit 0,1";
    return pdo_query_one($sql);
}
/**
 * Truy vấn theo giới tính */
function sp_select_by_nam(){
    $sql = "SELECT * from sanpham WHERE gioitinh=1";
    return pdo_query($sql);
}
function sp_select_by_nu(){
    $sql = "SELECT * from sanpham WHERE gioitinh=0";
    return pdo_query($sql);
}
function sp_select_by_capdoi(){
    $sql = "SELECT * from sanpham WHERE gioitinh=2";
    return pdo_query($sql);
}
function sp_select_by_hot(){
    $sql = "SELECT * from sanpham WHERE hot=1";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo 8 sp gần nhất */
function sp_select_by_id_top8($maloai){
    $sql = "SELECT * from sanpham INNER JOIN hinh ON (sp.masp=hinh.idhinh)  WHERE sp.maloai=$maloai ORDER BY sp.masp DESC LIMIT 0,8 ";
    return pdo_query($sql, $maloai);
}

function sp_exist($ma_hh){
    $sql = "SELECT count(*) from sanpham WHERE ma_hh=?";
    return pdo_query_value($sql, $ma_hh) > 0;
}

function sp_tang_so_luot_xem($ma_hh){
    $sql = "UPDATE sp SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
    pdo_execute($sql, $ma_hh);
}

function sp_select_top10(){
    $sql = "SELECT * from sanpham WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
    return pdo_query($sql);
}

function sp_select_dac_biet(){
    $sql = "SELECT * from sanpham WHERE dac_biet=1";
    return pdo_query($sql);
}
/** Truy vấn theo 1 thương hiệu */
function sp_select_by_mathh($mathh){
    $sql = "SELECT * from sanpham WHERE mathh=?";
    return pdo_query($sql,$mathh);
}


/** Truy vấn theo 1 loại */
function sp_select_by_maloai($maloai){
    $sql = "SELECT * from sanpham WHERE maloai=?";
    return pdo_query($sql,$maloai);
}
/** Truy vấn tìm kiếm */
function sp_select_keyword($keyword){
    $sql = "SELECT * from sanpham 
            JOIN loai ON loai.maloai=sanpham.maloai
            JOIN matkinh ON matkinh.mamk=sanpham.mamk
            JOIN chatlieu ON chatlieu.macl=sanpham.macl
            JOIN thuonghieu ON thuonghieu.mathh=sanpham.mathh
            WHERE chatlieu.tencl LIKE ? 
                OR loai.tenloai LIKE ? 
                OR thuonghieu.tenthh LIKE ?
                OR matkinh.tenmk LIKE ?
                OR sanpham.tensp LIKE ? ";
    return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%');
}

function sp_select_page(){
    if(!isset($_SESSION['page_no'])){
        $_SESSION['page_no'] = 0;
    }
    if(!isset($_SESSION['page_count'])){
        $row_count = pdo_query_value("SELECT count(*) from sanpham");
        $_SESSION['page_count'] = ceil($row_count/10.0);
    }
    if(exist_param("page_no")){
        $_SESSION['page_no'] = $_REQUEST['page_no'];
    }
    if($_SESSION['page_no'] < 0){
        $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
    }
    if($_SESSION['page_no'] >= $_SESSION['page_count']){
        $_SESSION['page_no'] = 0;
    }
    $sql = "SELECT * from sanpham ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
    return pdo_query($sql);
}