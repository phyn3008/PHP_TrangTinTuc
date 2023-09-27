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
		<?php
		include_once("menu.php");
		?>
		
		<div class="col-md-9">
	            <div class="panel panel-default">
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;"> Tin Tức</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
						<?php
							$kq= Get_All_TheLoai();
							while($row = mysqli_fetch_assoc($kq)){
								$kq1= Cac_loaiTin_Theo_TheLoai($row["id"]);
									if(mysqli_num_rows($kq1)>0){
						?>
					    <div class="row-item row">
		                	<h3>
		                		<a style="font-weight:bold; color: red"  href="#"><?php echo $row["Ten"];?></a> |
								<!-- Đầu vòng lặp trong -->
								<?php
								while($row2 = mysqli_fetch_assoc($kq1)){
								?>
		                		<small><a href="loaitin.php?idlt=<?php echo $row2["id"];?>&TenTL=<?php echo $row["Ten"];?>"><i><?php echo $row2["Ten"];?></i></a>/</small>
								<!-- Cuối vòng lặp trong -->
								<?php }?>
		                	</h3>
							<?php
									$kq2= Get_Tinnoibat_Theo_TheLoai($row["id"]);
									$tt= mysqli_fetch_assoc($kq2);
								?>
		                	<div class="col-md-12 border-right">
		                		<div class="col-md-4">
			                        <a href="chitiet.php?id=<?php echo $tt["id"]?>&idlt=<?php echo $tt["idLoaiTin"]?>">
			                            <img class="img" style="height:150px; width:100%;" src="hinhanh/tintuc/<?php echo $tt["Hinh"];?>" alt="">
			                        </a>
			                    </div>
			                    <div class="col-md-8">
			                        <h3 style="font-weight:bold; color: #337AB7"><?php echo $tt["TieuDe"];?></h3>
			                        <p><?php echo $tt["TomTat"];?></p>
			                        <a class="btn btn-primary" href="chitiet.php?id=<?php echo $tt["id"]?>&idlt=<?php echo $tt["idLoaiTin"]?>">XEM THÊM<span class="glyphicon glyphicon-chevron-right"></span></a>
								</div>

		                	</div>

							<div class="break"></div>
		                </div>
		                <!-- end item -->
						<?php
							}}
						?>
					</div>
	            </div>
        	</div>


	</div>
        <!-- /.row -->
</div>
 <!-- end Page Content -->
