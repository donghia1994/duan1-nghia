<?php 

if(isset($_POST['btn-login'])){
    $tenkh=$_POST['tenkh'];
    $mk=$_POST['mk'];
    $khht=kh_login($tenkh,$mk);	
    if(empty($khht)){
        echo '<div class="alert alert-warning text-center mt-2" role="alert"> Tài khoản không tồn tại </div>';
        require_once './view/login.php';
    }
    else{
        extract($khht);
        $_SESSION['s_makh']=$khht['makh'];
        $_SESSION['s_tenkh']=$khht['tenkh'];

        echo '<div class="alert alert-success text-center mt-2 mb-2" role="alert"> Đăng nhập thành công </div>
        ';    
        require_once './view/user.php';


    }		
}	
else{
    require_once './view/home.php';
}
?>