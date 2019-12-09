<?php 
    if(isset($_SESSION['s_makh'])){
        unset($_SESSION['s_makh']);
        unset($_SESSION['s_tenkh']);
        echo '<script> location.reload(); </script>';
        require_once './view/home.php';
    }
    else{
        require_once './view/home.php';
    }
?>