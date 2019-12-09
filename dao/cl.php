<?php
require_once 'pdo.php';

/**
 * Thêm loại mới
 * @param String $ten_chatlieu là tên loại
 * @throws PDOException lỗi thêm mới
 */
function cl_insert($tencl,$mota){
    $sql = "INSERT INTO chatlieu(macl,tencl,mota)
            VALUES(Null,?,?)";
    pdo_execute($sql,$tencl,$mota);
}
/**
 * Cập nhật tên loại
 * @param int $macl là mã loại cần cập nhật
 * @param String $ten_chatlieu là tên loại mới
 * @throws PDOException lỗi cập nhật
 */
function cl_update($tencl,$mota,$macl){
    $sql = "UPDATE  chatlieu 
            SET     tencl=?,
                    mota=?     
                    WHERE macl=?";        
    pdo_execute($sql, $tencl,$mota,$macl);
}
/**
 * Xóa một hoặc nhiều loại
 * @param mix $macl là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */
function cl_delete($macl){
    $sql = "DELETE FROM chatlieu WHERE macl=?";
    if(is_array($macl)){
        foreach ($macl as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $macl);

    }
}
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function cl_select_all(){
    $sql = "SELECT * FROM chatlieu";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo hàng bán và giới nữ */
function cl_select_by_kd_nu(){
    $sql = "SELECT * FROM chatlieu WHERE (kd=1) AND (gioi=0) ORDER BY tencl";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo hàng bán và giới nam */
function cl_select_by_kd_nam(){
    $sql = "SELECT * FROM chatlieu WHERE (kd=1) AND (gioi=1) ORDER BY tencl";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo stt */
function cl_select_by_stt(){
    $sql = "SELECT * FROM chatlieu WHERE kd=1 ORDER BY stt";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo mã
 * @param int $macl là mã loại cần truy vấn
 * @return array mảng chứa thông tin của một loại
 * @throws PDOException lỗi truy vấn
 */
function cl_select_by_macl($macl){
    $sql = "SELECT * FROM chatlieu WHERE macl=?";
    return pdo_query_one($sql, $macl);
}
/**
 * Kiểm tra sự tồn tại của một loại
 * @param int $macl là mã loại cần kiểm tra
 * @return boolean có tồn tại hay không
 * @throws PDOException lỗi truy vấn
 */
function cl_exist($macl){
    $sql = "SELECT count(*) FROM chatlieu WHERE macl=?";
    return pdo_query_value($sql, $macl) > 0;
}