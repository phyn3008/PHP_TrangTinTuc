<?php
    include_once("function.php");
    $idlt=$_GET["idlt"];


    //Lấy trang mún xem
    $p= isset($_GET["p"])==true ? (int)$_GET["p"] : 1;
    //Số tin 1 trang
    $sotin1Trang= 4;
    //Vị trí bắt đầu
    $from= ($p-1) * $sotin1Trang;
    $kqTin= Get_Tin_Theo_Trang($idlt,$from,$sotin1Trang);
    
?>




<!-- Đầu vòng lặp -->
<?php
    while($rowTin = mysqli_fetch_assoc($kqTin)){ 
?>
<div class="row-item row">
    <div class="col-md-3">
        <a href="detail.html">
            <br>
            <img width="200px" height="200px" class="img-responsive" src="hinhanh/tintuc/<?php echo $rowTin["Hinh"];?>" alt="">
        </a>
    </div>

    <div class="col-md-9">
        <h3><?php echo $rowTin["TieuDe"];?></h3>
        <p><?php echo $rowTin["TomTat"];?></p>
        <a class="btn btn-primary" href="detail.html">XEM THÊM<span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
    <div class="break"></div>
</div>
<!-- Cuối vòng lặp -->
<?php
    }
?>




