<?php include_once("function.php");?>
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

    <!-- Navigation -->
    <?php
     include_once("nav.php");
    ?>
       
    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
        <div class="row carousel-holder">
        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<!-- Đầu vòng lặp -->
					<?php 
						$sl= Get_Slide();
						while($row = mysqli_fetch_assoc($sl)){
							$active= "";
							if($row["id"] == 1){
								$active= "active";
							}
					?>  
					<div class="item <?php echo $active;?>">
						<img class="slide-image" src="hinhanh/slide/<?php echo $row["Hinh"];?>" alt="">
					</div>
					<!--Cuối vòng lặp -->
					<?php
						}
					?>
					<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
                </div>
            </div>
        </div>
        <!-- end slide -->
	</div>

        <!-- end slide -->

        <div class="space20"></div>


        <div class="row main-left">
                        <?php include_once("menu.php");?>
            <div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Giới thiệu</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
					   <p>
                       Báo điện tử là các trang website tin tức online được vận hành và sản xuất nội dung thường xuyên bởi các tổ chức, tòa soạn điện tử, các tổ chức này sẽ hoạt động dưới sự quản lý và kiểm duyệt theo luật Báo Chí được áp dụng tại nước Việt Nam. Các nội dung, thông tin được đăng tải trên website là các thông tin được tìm hiểu, tổng hợp và xuất bản bởi các biên tập viên online quản lý nội dung trang web, thường thì các bài viết sẽ được xây dựng bởi chính những tác giả, biên tập, quản lý website để cung cấp cho người dùng những tin tức mới nhất. Đối tượng mà các báo điện tử nhắm đến là những độc giả có nhu cầu đọc các tin tức về vấn đề xã hội, văn hóa, đời sống, tin tức Thế Giới, những tin tức gần gũi với người dân như: ‘Hố tử thần’ ở Lai Châu khiến 3 hộ dân sơ tán khẩn trong đêm– Zing.vn , Ngành công nghệ phân cực vì lệnh cấm WeChat– Vnexpress.net, Giá điện: Hãy chọn một lần cho đúng! – Dantri.com.vn…
					   </p>

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
