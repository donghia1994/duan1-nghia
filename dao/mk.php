<?php
require_once 'pdo.php';

/**
 * Thêm loại mới
 * @param String $ten_matkinh là tên loại
 * @throws PDOException lỗi thêm mới
 */
function mk_insert($tenmk,$mota){
    $sql = "INSERT INTO matkinh(mamk,tenmk,mota)
            VALUES(Null,?,?)";
    pdo_execute($sql,$tenmk,$mota);
}
/**
 * Cập nhật tên loại
 * @param int $mamk là mã loại cần cập nhật
 * @param String $ten_matkinh là tên loại mới
 * @throws PDOException lỗi cập nhật
 */
function mk_update($tenmk,$mota,$mamk){
    $sql = "UPDATE  matkinh 
            SET     tenmk=?, 
                    mota=?                   
                    WHERE mamk=?";        
    pdo_execute($sql, $tenmk,$mota,$mamk);
}
/**
 * Xóa một hoặc nhiều loại
 * @param mix $mamk là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */
function mk_delete($mamk){
    $sql = "DELETE FROM matkinh WHERE mamk=?";
    if(is_array($mamk)){
        foreach ($mamk as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $mamk);

    }
}
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function mk_select_all(){
    $sql = "SELECT * FROM matkinh";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo hàng bán và giới nữ */
function mk_select_by_kd_nu(){
    $sql = "SELECT * FROM matkinh WHERE (kd=1) AND (gioi=0) ORDER BY tenmk";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo hàng bán và giới nam */
function mk_select_by_kd_nam(){
    $sql = "SELECT * FROM matkinh WHERE (kd=1) AND (gioi=1) ORDER BY tenmk";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo stt */
function mk_select_by_stt(){
    $sql = "SELECT * FROM matkinh WHERE kd=1 ORDER BY stt";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo mã
 * @param int $mamk là mã loại cần truy vấn
 * @return array mảng chứa thông tin của một loại
 * @throws PDOException lỗi truy vấn
 */
function mk_select_by_mamk($mamk){
    $sql = "SELECT * FROM matkinh WHERE mamk=?";
    return pdo_query_one($sql, $mamk);
}
/**
 * Kiểm tra sự tồn tại của một loại
 * @param int $mamk là mã loại cần kiểm tra
 * @return boolean có tồn tại hay không
 * @throws PDOException lỗi truy vấn
 */
function mk_exist($mamk){
    $sql = "SELECT count(*) FROM matkinh WHERE mamk=?";
    return pdo_query_value($sql, $mamk) > 0;
}