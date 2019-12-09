<?php
require_once 'pdo.php';

function hinh_insert($chinh, $tenhinh, $masp){
    $sql = "INSERT INTO hinh(chinh,tenhinh,masp) 
            VALUES (?,?,?)";
    pdo_execute($sql,$chinh,$tenhinh,$masp);
}
// function reArrayFiles($file)
// {
//     $file_ary = array();
//     $file_count = count($file['name']);
//     $file_key = array_keys($file);
    
//     for($i=0;$i<$file_count;$i++)
//     {
//         foreach($file_key as $val)
//         {
//             $file_ary[$i][$val] = $file[$val][$i];
//         }
//     }
//     return $file_ary;
// }
function hinh_update($chinh,$tenhinh,$mahinh){
    $sql = "UPDATE hinh
            SET chinh=?,
                tenhinh=?
            WHERE mahinh=?";
    pdo_execute($sql, $chinh, $tenhinh,$mahinh);
}
function hinh_delete($mahinh){
    $sql = "DELETE FROM hinh WHERE  mahinh=?";
    if(is_array($mahinh)){
        foreach ($mahinh as $mahinh) {
            pdo_execute($sql, $mahinh);
        }
    }
    else{
        pdo_execute($sql, $mahinh);
    }
}

function hinh_select_all(){
    $sql = "SELECT * FROM hinh";
    return pdo_query($sql);
}

/** Truy vấn theo 1 sp */
function hinh_select_by_masp_phu($masp){
    $sql = "SELECT * FROM hinh WHERE masp=? and chinh!=1";
    return pdo_query($sql,$masp);
}
function hinh_select_by_masp_chinh($masp){
    $sql = "SELECT * FROM hinh WHERE masp=? and chinh=1";
    return pdo_query_one($sql,$masp);
}

function hinh_select_by_mahinh($mahinh){
    $sql = "SELECT * FROM hinh WHERE mahinh=?";
    return pdo_query_one($sql, $mahinh);
}
// function sp_select_by_id_latest(){
//     $sql = "SELECT * FROM sanpham order by masp desc limit 0,1";
//     return pdo_query_one($sql);
// }

// /**
//  * Truy vấn một loại theo 8 sp gần nhất */
// function sp_select_by_id_top8($maloai){
//     $sql = "SELECT * FROM sanpham INNER JOIN hinh ON (sp.masp=hinh.idhinh)  WHERE sp.idloai=$maloai ORDER BY sp.masp DESC LIMIT 0,8 ";
//     return pdo_query($sql, $maloai);
// }

function hinh_exist($masp){
    $sql = "SELECT count(*) FROM sanpham WHERE masp=?";
    return pdo_query_value($sql, $masp) > 0;
}

// function sp_tang_so_luot_xem($masp){
//     $sql = "UPDATE sp SET so_luot_xem = so_luot_xem + 1 WHERE masp=?";
//     pdo_execute($sql, $masp);
// }

// function sp_select_top10(){
//     $sql = "SELECT * FROM sanpham WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
//     return pdo_query($sql);
// }

// function sp_select_dac_biet(){
//     $sql = "SELECT * FROM sanpham WHERE dac_biet=1";
//     return pdo_query($sql);
// }



// function sp_select_keyword($keyword){
//     $sql = "SELECT * FROM sanpham hh "
//             . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
//             . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
//     return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
// }

// function sp_select_page(){
//     if(!isset($_SESSION['page_no'])){
//         $_SESSION['page_no'] = 0;
//     }
//     if(!isset($_SESSION['page_count'])){
//         $row_count = pdo_query_value("SELECT count(*) FROM sanpham");
//         $_SESSION['page_count'] = ceil($row_count/10.0);
//     }
//     if(exist_param("page_no")){
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if($_SESSION['page_no'] < 0){
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if($_SESSION['page_no'] >= $_SESSION['page_count']){
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM sanpham ORDER BY masp LIMIT ".$_SESSION['page_no'].", 10";
//     return pdo_query($sql);
// }