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

        <div class="space20"></div>

    <div class="row main-left">
        <div class="col-md-3 ">
			<ul class="list-group" id="menu">
				<li href="#" class="list-group-item menu1 active">
					THỂ LOẠI
				</li>
				<!-- Đầu vòng lặp -->
					<?php
					$kq= Get_All_TheLoai();
					while($row = mysqli_fetch_assoc($kq)){  
						$kq1= Cac_loaiTin_Theo_TheLoai($row["id"]);
						if(mysqli_num_rows($kq1) > 0){
					?>
				<li href="#" class="list-group-item menu1">
					<?php
					echo $row["Ten"];
					?>
				</li>
			
				<!-- Đầu vòng lặp level 2-->
			<ul>
				<?php
				while($row2= mysqli_fetch_assoc($kq1)){
				?>
				<li class="list-group-item">
					<a href="loaitin.html"><?php echo $row2["Ten"];?></a>
				</li>
				<!-- Cuối vòng lặp level2-->
				<?php } ?>
			</ul> 	
			<!-- Cuối vòng lặp -->
				<?php
					} }
				?>
			   
        </div>
		
        <!-- /.row -->
</div>
 <!-- end Page Content -->
