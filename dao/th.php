<?php
require_once 'pdo.php';

/**
 * Thêm loại mới
 * @param String $ten_thuonghieu là tên loại
 * @throws PDOException lỗi thêm mới
 */
function thh_insert($tenthh,$mota){
    $sql = "INSERT INTO thuonghieu(mathh,tenthh,mota)
            VALUES(Null,?,?)";
    pdo_execute($sql,$tenthh,$mota);
}
/**
 * Cập nhật tên loại
 * @param int $mathh là mã loại cần cập nhật
 * @param String $ten_thuonghieu là tên loại mới
 * @throws PDOException lỗi cập nhật
 */
function thh_update($tenthh,$mota,$dacbiet,$mathh){
    $sql = "UPDATE  thuonghieu 
            SET     tenthh=?,
                    mota=?,
                    dacbiet=?
                    WHERE mathh=?";        
    pdo_execute($sql, $tenthh,$mota,$dacbiet,$mathh);
}
/**
 * Xóa một hoặc nhiều loại
 * @param mix $mathh là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */
function thh_delete($mathh){
    $sql = "DELETE FROM thuonghieu WHERE mathh=?";
    if(is_array($mathh)){
        foreach ($mathh as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $mathh);

    }
}
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function thh_select_all(){
    $sql = "SELECT * FROM thuonghieu";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo dac biệt */
function thh_select_by_4dacbiet(){
    $sql = "SELECT * FROM thuonghieu WHERE dacbiet=1 ORDER BY tenthh DESC limit 0,4";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo hàng mới */
function thh_select_by_4latest(){
    $sql = "SELECT * FROM thuonghieu ORDER BY tenthh limit 0,4";
    return pdo_query($sql);
}

/**
 * Truy vấn một loại theo khuyến mãi */
function thh_select_by_4km(){
    $sql = "SELECT * FROM thuonghieu th join sanpham sp on th.mathh=sp.mathh where sp.khuyenmai=1 ORDER BY sp.mathh DESC limit 0,4";
    return pdo_query($sql);
}

/**
* Truy vấn một loại theo hàng bán chạy */
function thh_select_by_hot(){
    $sql = "SELECT * FROM thuonghieu ORDER BY mathh DESC limit 0,4";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo stt */
function thh_select_by_stt(){
    $sql = "SELECT * FROM thuonghieu WHERE kd=1 ORDER BY stt";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo mã
 * @param int $mathh là mã loại cần truy vấn
 * @return array mảng chứa thông tin của một loại
 * @throws PDOException lỗi truy vấn
 */
function thh_select_by_mathh($mathh){
    $sql = "SELECT * FROM thuonghieu WHERE mathh=?";
    return pdo_query_one($sql, $mathh);
}
/**
 * Kiểm tra sự tồn tại của một loại
 * @param int $mathh là mã loại cần kiểm tra
 * @return boolean có tồn tại hay không
 * @throws PDOException lỗi truy vấn
 */
function thh_exist($mathh){
    $sql = "SELECT count(*) FROM thuonghieu WHERE mathh=?";
    return pdo_query_value($sql, $mathh) > 0;
}