<?php
    include_once("function.php");
    $txtTenUser=$_POST['txtTenUser'];
    $txtEmail=$_POST['txtEmail'];
    $txtpassword=$_POST['txtpassword'];
    $txtpasswordAgain=$_POST['txtpasswordAgain'];
    
    if($txtpasswordAgain == $txtpassword){
        $conn=Connect();
        $sql= "UPDATE users SET users.password='$txtpasswordAgain' WHERE email='$txtEmail' and name='$txtTenUser'";
        // echo "CẬP NHẬT THÀNH CÔNG";
        if(mysqli_query($conn,$sql)){
            header('location:index.php');
        }else{
            echo "THAY ĐỔI PASSWORD THẤT BẠI";
        }
    }
    else{
        echo "KHÔNG TRÙNG KHỚP DỮ LIỆU";
    }
    
?>