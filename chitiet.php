<?php
    include_once("function.php");
    
    $id=$_GET["id"];
    $idlt=$_GET["idlt"];
    $lay=Get_CTTin_Tu_Tin($id);
    $user=Get_USER($id);
    $kq= Get_limit_Tin_Theo_LoaiTin($idlt);
    $kq1=Get_TheLoai_Theo_idLoaiTin($idlt);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Khoa Pham</title>

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

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->
                <?php 
                while($r=mysqli_fetch_assoc($lay)){
            ?>
                <!-- Title -->
                <h1 style="font-weight:bold;color:red; margin-top:0px;"><?php echo $r["TieuDe"]?></h1>

                <!-- Author -->
                <p class="lead" style="font-size:16px;">
                    Tác Giả <a href="#">PHAN HỒ YẾN NHI</a>
                </p>

                <!-- Preview Image -->
                <div style="min-height:300px;">
                <img class="img" style="width:800px;height:500px;"src="hinhanh/tintuc/<?php echo $r["Hinh"];?>" alt="">
                </div>
                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>
                <hr>

                <!-- Post Content -->
                <p style="font-weight:bold; color: #337AB7" class="lead"><?php echo $r["TomTat"];?></p>
                <p><?php echo $r["NoiDung"];?></p>
                <?php }?>
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <?php
                    while($us=mysqli_fetch_assoc($user)){
                        $comment= Get_Comment($id,$us["id"]);
                        while($com=mysqli_fetch_assoc($comment)){
                    ?>
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body"><?php echo $us["name"]?>
                        <h4 class="media-heading">
                            <small><?php echo $com["created_at"]?></small>
                        </h4>
                        <?php echo $com["NoiDung"]?>
                    </div>
                    <br/>
                    <br/>
                    <?php }}?>
                </div>

            
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #337AB7; color:white;"><b>Tin liên quan</b></div>
                    <div class="panel-body">

                        <!-- item -->
                        <!-- Đầu vòng lặp -->
                        <?php 
                        while($row=mysqli_fetch_assoc($kq)){
                        ?>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5" style="padding:0px;">
                                <a href="chitiet.php?id=<?php echo $row["id"];?>&idlt=<?php echo $row["idLoaiTin"];?>">
                                    <img class="img" style="width:100%" src="hinhanh/tintuc/<?php echo $row["Hinh"];?>" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="chitiet.php?id=<?php echo $row["id"];?>&idlt=<?php echo $row["idLoaiTin"];?>"><b><?php echo $row["TieuDe"];?></b></a>
                            </div>
                            <!-- <p><?php echo $row["TomTat"];?></p> -->
                            <div class="break"></div>
                        </div>
                        <!-- Cuối vòng lặp -->
                        <?php }
                        ?>
                        <!-- end item -->
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #337AB7; color:white;"><b>Tin nổi bật</b></div>
                    <div class="panel-body">

                        <!-- item -->
                        <?php 
                        while($row=mysqli_fetch_assoc($kq1)){
                            $kq2= Get_Tinnoibat_Theo_TheLoai_4($row["idTheLoai"]);
                                while($nb=mysqli_fetch_assoc($kq2)){
                        ?>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5" style="padding:0px;">
                                <a href="chitiet.php?id=<?php echo $nb["id"];?>&idlt=<?php echo $nb["idLoaiTin"];?>">
                                <img class="img" style="width:100%"  src="hinhanh/tintuc/<?php echo $nb["Hinh"];?>" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="chitiet.php?id=<?php echo $nb["id"];?>&idlt=<?php echo $nb["idLoaiTin"];?>"><b><?php echo $nb["TieuDe"]?></b></a>
                            </div>
                            <!-- <p><?php echo $nb["TomTat"];?></p> -->
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        <?php }}?>
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
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

</body>

</html>
