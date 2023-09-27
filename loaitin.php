<?php
    include_once("function.php");
    $idlt=$_GET["idlt"];
    $TenTL=$_GET["TenTL"];
    //Lấy trang mún xem
    $p= isset($_GET["p"])==true ? (int)$_GET["p"] : 1;
    //Số tin 1 trang
    $sotin1Trang= 4;
    //Vị trí bắt đầu
    $from= ($p-1) * $sotin1Trang;
    $kqTin= Get_Tin_Theo_Trang($idlt,$from,$sotin1Trang);
    $i=Get_TinTuc($idlt);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Phan Hồ Yến Nhi</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
        
    <!-- Navigation -->
    <?php
        include_once("nav.php");
    ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <?php
            include_once("menu.php");
            ?>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7">
                    <ol style="	padding:0; margin-bottom: 0px;background-color: transparent;" class="breadcrumb">
                        <li><a style="color:white;font-size:15px;" href="#"><?php echo $TenTL?></a></li>
                        <?php $tenlt= mysqli_fetch_assoc($i);?>
                        <li><a style="color:white;font-size:15px;" href="#"><?php echo $tenlt["Ten"];?></a></li>  
                    </ol>
                    </div>
                    <div class="contentAjax">
                        <!-- Đầu vòng lặp -->
                        <?php
                            while($rowTin = mysqli_fetch_assoc($kqTin)){ 
                                
                        ?>
                        <div class="row-item row">
                            <div class="col-md-4">
                                <a href="chitiet.php?id=<?php echo $rowTin["id"]?>&idlt=<?php echo $idlt?>">
                                    <br>
                                    <img style="height:150px; width:100%;" class="img" src="hinhanh/tintuc/<?php echo $rowTin["Hinh"];?>" alt="">
                                </a>
                            </div>
                            <div class="col-md-8">
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
                                        </li>
                                        <li>
                                            <a href="xu_li_loai_tin.php?idlt=<?php echo $idlt;?>&p=<?php echo $tongSoTrang;?>">&raquo;</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div> 
        </div>

    </div>
    <!-- end Page Content -->

    <!-- Footer -->
    <hr>
    <footer>
        <div class="row">
            <div class="col-md-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>
    <script>
        

        $(document).ready(function(){
            $(document).on("click",".pagination a",function(e){ // Đăng kí sự kiện click cho trình duyệt bằng tk cha là document
                e.preventDefault();
                if($(this).hasClass('disabled'))
                {
                    return;
                }
                var url= $(this).attr("href");
                //alert(url);
                 $.get(url,function(data){
                    $('.contentAjax').html(data);
                });
            });
        });
    </script>
</body>

</html>
