<?php 
    if(isset($_POST['btn-tim'])){
        $keyword=$_POST['noidung'];
        $sptimdc=sp_select_keyword($keyword);    
        require_once './view/listtim.php';
    }
    else{
        require_once './view/listtim.php';
    }
?>