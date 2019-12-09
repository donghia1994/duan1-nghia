<?php
require_once 'pdo.php';

/**
 * Thêm loại mới
 * @param String $ten_loai là tên loại
 * @throws PDOException lỗi thêm mới
 */
function loai_insert($tenloai,$mota){
    $sql = "INSERT INTO loai(maloai,tenloai,mota)
            VALUES(Null,?,?)";
    pdo_execute($sql,$tenloai,$mota);
}
/**
 * Cập nhật tên loại
 * @param int $maloai là mã loại cần cập nhật
 * @param String $ten_loai là tên loại mới
 * @throws PDOException lỗi cập nhật
 */
function loai_update($tenloai,$mota,$maloai){
    $sql = "UPDATE  loai 
            SET     tenloai=?,
                    mota=?     
                    WHERE maloai=?";        
    pdo_execute($sql, $tenloai,$mota,$maloai);
}
/**
 * Xóa một hoặc nhiều loại
 * @param mix $maloai là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */
function loai_delete($maloai){
    $sql = "DELETE FROM loai WHERE maloai=?";
    if(is_array($maloai)){
        foreach ($maloai as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $maloai);

    }
}
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function loai_select_all(){
    $sql = "SELECT * FROM loai";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo hàng bán và giới nữ */
function loai_select_by_kd_nu(){
    $sql = "SELECT * FROM loai WHERE (kd=1) AND (gioi=0) ORDER BY tenloai";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo hàng bán và giới nam */
function loai_select_by_kd_nam(){
    $sql = "SELECT * FROM loai WHERE (kd=1) AND (gioi=1) ORDER BY tenloai";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo stt */
function loai_select_by_stt(){
    $sql = "SELECT * FROM loai WHERE kd=1 ORDER BY stt";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo mã
 * @param int $maloai là mã loại cần truy vấn
 * @return array mảng chứa thông tin của một loại
 * @throws PDOException lỗi truy vấn
 */
function loai_select_by_maloai($maloai){
    $sql = "SELECT * FROM loai WHERE maloai=?";
    return pdo_query_one($sql, $maloai);
}
/**
 * Kiểm tra sự tồn tại của một loại
 * @param int $maloai là mã loại cần kiểm tra
 * @return boolean có tồn tại hay không
 * @throws PDOException lỗi truy vấn
 */
function loai_exist($maloai){
    $sql = "SELECT count(*) FROM loai WHERE maloai=?";
    return pdo_query_value($sql, $maloai) > 0;
}