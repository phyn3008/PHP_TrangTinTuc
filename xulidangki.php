<?php
    include_once("function.php");
    $txtTenUser=$_POST['txtTenUser'];
    $txtEmail=$_POST['txtEmail'];
    $txtpassword=$_POST['txtpassword'];
    $txtpasswordAgain=$_POST['txtpasswordAgain'];
    
    if($txtpasswordAgain == $txtpassword){
        $conn=Connect();
        $sql= "INSERT INTO users(name,email,password) VALUE('$txtTenUser','$txtEmail','$txtpassword')";
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