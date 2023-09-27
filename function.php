<?php
    //Xây dựng các hàm thao tác trên cơ sở dữ liệu

    //1. Hàm kết nối CSDL
    function Connect(){
        $ketnoi= mysqli_connect("localhost","root","","tintuc_c21ath2");
        return $ketnoi;
    }
    //2. Hàm ngắt kết nối CSDL
    function DisConnect($conn){
        mysqli_close($conn);
    }

    //3. Hàm truy vấn các slide trong CSDL
    function Get_Slide(){
        $conn=Connect();
        $sql="SELECT * FROM slide";
        $kq= mysqli_query($conn,$sql);
        return $kq;
    } 

    //4. Hàm truy vấn danh sách các thể loại trong CSDL
    function Get_All_TheLoai(){
        $conn=Connect();
        $sql="SELECT * FROM theloai";
        $kq= mysqli_query($conn,$sql);
        return $kq;
    } 

    //5. Hàm truy vấn các loại tin theo thể loại truyền vào CSDL
    function Cac_loaiTin_Theo_TheLoai($idTL){
        $conn=Connect();
        $sql="SELECT * FROM loaitin where idTheLoai=$idTL";
        $kq= mysqli_query($conn,$sql);
        return $kq;
    } 

    //6. Hàm truy vấn tin nổi bật theo thể loại truyền vào trong CSDL
    function Get_Tinnoibat_Theo_TheLoai($idTL){
        $conn=Connect();
        $sql= "SELECT Tintuc.*
        FROM loaitin INNER JOIN tintuc on loaitin.id=tintuc.idLoaiTin
        WHERE loaitin.idTheLoai=$idTL AND NoiBat = 1
        LIMIT 0,1";
        $kq = mysqli_query($conn,$sql);
        return $kq;
    }

    //7. Hàm truy vấn các tin theo idLoaiTin truyền vào CSDL
    function Get_All_Tin_Theo_LoaiTin($idlt){
        $conn=Connect();
        $sql= "SELECT * FROM tintuc WHERE idLoaiTin=$idlt";
        $kq= mysqli_query($conn,$sql);
        return $kq;
    }

    //8. Hàm truy vấn các tin theo trsng
    function Get_Tin_Theo_Trang($idlt,$from,$sotin1trang){
        $conn= Connect();
        $sql="SELECT * FROM tintuc WHERE idLoaiTin=$idlt LIMIT $from,$sotin1trang";
        $kq= mysqli_query($conn,$sql);
        DisConnect($conn);
        return $kq;
    }    
    
    //9. Hàm truy vấn loại tin theo idLT
    function Get_TinTuc($id){
        $conn= Connect();
        $sql="SELECT * FROM loaitin WHERE id=$id";
        $kq= mysqli_query($conn,$sql);
        return $kq;
    }

    //10. Lấy tin tức theo $idTinTuc trong bảng tin tức
    function Get_CTTin_Tu_Tin($id){
        $conn= Connect();
        $sql="SELECT * FROM tintuc WHERE id=$id";
        $kq= mysqli_query($conn,$sql);
        return $kq;
    }

    // Lấy nội dung từ bảng comment
    function Get_Comment($idtt,$idus){
        $conn= Connect();
        $sql="SELECT *
        FROM comment INNER JOIN users ON comment.idUser=users.id
        WHERE comment.idTinTuc=$idtt and users.id=$idus
        LIMIT 0,2";
        $kq= mysqli_query($conn,$sql);
        return $kq;
    }

    // 11. Lấy tên user từ bảng user kn với user theo idTinTuc
    function Get_USER($idtt){
        $conn= Connect();
        $sql="SELECT *
        FROM comment INNER JOIN users ON comment.idUser=users.id
        WHERE comment.idTinTuc=$idtt
        ORDER BY RAND()
        LIMIT 0,2";
        $kq= mysqli_query($conn,$sql);
        return $kq;
    }


//7. Hàm truy vấn các tin theo idLoaiTin truyền vào CSDL giới hạn limit
function Get_limit_Tin_Theo_LoaiTin($idlt){
    $conn=Connect();
    $sql= "SELECT * FROM tintuc WHERE idLoaiTin=$idlt ORDER BY RAND() LIMIT 0,4";
    $kq= mysqli_query($conn,$sql);
    return $kq;
}
//. Lấy thể loại theo idLoaiTin
function Get_TheLoai_Theo_idLoaiTin($idlt){
    $conn=Connect();
    $sql= "SELECT *
    FROM loaitin 
    WHERE loaitin.id=$idlt";
    $kq = mysqli_query($conn,$sql);
    return $kq;
}

// 6. Hàm truy vấn tin nổi bật theo thể loại có limit truyền vào trong CSDL
function Get_Tinnoibat_Theo_TheLoai_4($idTL){
    $conn=Connect();
    $sql= "SELECT tintuc.*
    FROM loaitin INNER JOIN tintuc on loaitin.id=tintuc.idLoaiTin
    WHERE loaitin.idTheLoai=$idTL AND NoiBat = 1
    ORDER BY RAND()
    LIMIT 0,4";
    $kq = mysqli_query($conn,$sql);
    return $kq;
}

    
