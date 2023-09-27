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
        <a href="chitiet.php?id=<?php echo $rowTin["id"]?>&idlt=<?php echo $idlt?>">
            <br>
            <img style="height:150px; width:100%;" class="img" src="hinhanh/tintuc/<?php echo $rowTin["Hinh"];?>" alt="">
        </a>
    </div>

    <div class="col-md-9">
        <h3 style="font-weight:bold; color: #337AB7"><?php echo $rowTin["TieuDe"];?></h3>
        <p><?php echo $rowTin["TomTat"];?></p>
        <a class="btn btn-primary" href="chitiet.php?id=<?php echo $rowTin["id"]?>&idlt=<?php echo $idlt?>">XEM THÊM<span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
    <div class="break"></div>
</div>
<!-- Cuối vòng lặp -->
<?php
    }
?>
<!-- Pagination -->
<div class="row text-center">
    <div class="col-lg-12">
        <ul class="pagination">
        <?php
                $disabled = $p == 1 ? "class='disabled'" : "";
        ?>
            <li>
                <a href="xu_li_loai_tin.php?idlt=<?php echo $idlt;?>&p=<?php echo 1;?>">&laquo;</a>
            </li>
            <li <?php echo $disabled;?>>
                <a id="prev" <?php echo $disabled;?> href="xu_li_loai_tin.php?idlt=<?php echo $idlt;?>&p=<?php echo $p -1;?>">&lsaquo;</a>
            </li>
            <!-- Đầu lặp -->
            <?php
            $tongSoTin=mysqli_num_rows(Get_All_Tin_Theo_LoaiTin($idlt));
            $tongSoTrang= ceil($tongSoTin/$sotin1Trang);
            $offset=3;
            $tutrang=max($p - $offset,1);
            $dentrang=min($p + $offset,$tongSoTrang);
                for($i = $tutrang; $i<=$dentrang; $i++){
                    if($i==$p){
                        $active= "class='active'";
                    }else
                    $active="";
            ?>
            <li <?php echo $active;?>>
                <a href="xu_li_loai_tin.php?idlt=<?php echo $idlt;?>&p=<?php echo $i;?>"><?php echo $i;?></a>
            </li>
            <!-- Cuối lặp -->
            <?php
                }
            ?>
                <?php
                $disabled = $p == $tongSoTrang ? "class='disabled'" : "";
        ?>
            <li <?php echo $disabled;?>>
                <a id='next' <?php echo $disabled;?> href="xu_li_loai_tin.php?idlt=<?php echo $idlt;?>&p=<?php echo $p +1;?>">&rsaquo;</a>
            </li <?php echo $disabled;?>>
            <li>
                <a href="xu_li_loai_tin.php?idlt=<?php echo $idlt;?>&p=<?php echo $tongSoTrang;?>">&raquo;</a>
            </li>
            
        </ul>
    </div>
</div>




