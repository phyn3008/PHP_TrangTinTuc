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
            include_once("function.php");
            include_once("menu.php");
            ?>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <ol style="	padding:0; margin-bottom: 0px;background-color: transparent;" class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Library</a></li>
                    </ol>
                    </div>
                    <!-- Đầu vòng lặp -->
                    <div class="contentAjax"></div>
                </div>
                <button class="ThemMoi btn btn-primary">Thêm Mới</button>
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
            function Xu_Ly(){ // Đăng kí sự kiện click cho trình duyệt bằng tk cha là document
                p++;
                //Lấy thông tin của idlt
                var queryString = window.location.search;
                var parems= new URLSearchParams(queryString);
                var idlt= parems.get("idlt");
                // alert(idlt);
                var url="xu_li_loai_tin_Ajax_XemThem.php?idlt=" + idlt + "&p=" + p ;
                $.get(url,function(data){
                    $('.contentAjax').append(data);
                });
            }
            var p = 0;
            Xu_Ly();
            $(document).on("click","button.ThemMoi",Xu_Ly);
        });
    </script>
</body>

</html>
