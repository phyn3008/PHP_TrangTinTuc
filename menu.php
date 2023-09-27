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
					<a href="loaitin.php?idlt=<?php echo $row2["id"];?>&TenTL=<?php echo $row["Ten"];?>"><?php echo $row2["Ten"];?></a>
				</li>
				<!-- Cuối vòng lặp level2-->
				<?php } ?>
			</ul> 	
			<!-- Cuối vòng lặp -->
				<?php
					} }
				?>
			</ul>
        </div>
