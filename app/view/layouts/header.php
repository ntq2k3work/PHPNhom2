<!--Header-->

<section class="navbar navbar-dark navbar-expand-lg bg-dark fixed-top" style="height: var(--height);">
	<div class="container-fluid">
		<button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" style="color: #ffff">
			<i class="bi bi-list fs-1"></i>
		</button>

		<a class="navbar-brand ms-lg-5" href="/home">HOME</a>
		<button class="border-0 text-bg-dark fw-bolder fs-5 d-lg-none" type="submit"><i class="bi bi-bag-fill"></i></button>


		<div class="offcanvas offcanvas-start text-bg-dark w-75 flex-column-reverse" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
			<div class="offcanvas-body">
				<span class="algolia-autocomplete algolia-autocomplete-left">
					<div class="search position-relative ">
						<div style="margin: 10 0 0 360;" class="input-group">
							<div class="form-outline" data-mdb-input-init>
								<input type="search" id="form1" class="form-control " style="width: 400;" placeholder="Nhập từ khoá" />
							</div>
							<button type="button" class="btn btn-primary" data-mdb-ripple-init>
								<i class="fas fa-search"></i>
							</button>
						</div>
						<span class="ds-dropdown-menu ds-with-1 posotion-relative">
							<div class="contentSearch posotion-absolute" >

							</div>
						</span>
					</div>
				</span>
				<ul class="navbar-nav justify-content-end flex-grow-1 my-2" style="z-index: 1;">
					<li class="nav-item">
						<div class="input-group">
					</li>
					<li class="nav-item">
						<a class="nav-link me-3" href="/product/list">Danh mục</a>
					</li>
					<li class="nav-item">
						<a class="nav-link me-3" href="/product/list/Dong-Ho-Nam">Đồng hồ nam</a>
					</li>
					<li class="nav-item">
						<a class="nav-link me-3" href="/product/list/Dong-Ho-Nu">Đồng hồ nữ</a>
					</li>
					<li class="nav-item">
						<a class="nav-link me-3" href="/product/list/Dong-Ho-Doi">Đồng hồ đôi</a>
					</li>
					<li class="nav-item dropdown nav_menu_2">
						<a class="nav-link me-3 nav_menu_2" href="/product/list/Phu-kien">Phụ kiện</a>
						<ul class="dropdown-menu dropdown-menu-dark ">
							<li><a class="dropdown-item p-3 " style="min-width: 200px;" href="/product/list/Dong-Ho-Doi">Hộp đồng hồ</a></li>
							<li><a class="dropdown-item p-3 " style="min-width: 200px;" href="/product/list/Phu-kien/DayDa">Dây da ZRC</a></li>
							<li><a class="dropdown-item p-3 " style="min-width: 200px;" href="/product/list/Phu-kien/KhacLazer">Khắc lazer lên đồng hồ</a></li>
						</ul>
					</li>
					<?php if (!isset($_SESSION['userID'])) { ?>
						<li class="nav-item d-block">
							<a class="nav-link me-3" href="/Login">Đăng nhập</a>
						</li>
					<?php } ?>
					<form class="me-5" style="margin: auto 0px;position: relative;">
						<!-- <button class="border-0 text-bg-dark fw-bolder fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#search-form" aria-expanded="false"><i class="bi bi-search"></i></button> -->
						<?php if (isset($_SESSION['userID'])) { ?>
							<button id="userCustom" class="border-0 text-bg-dark fw-bolder fs-5 d-lg-inline d-none p-2" type="button"><i class="bi bi-person-square"></i></button>
							<?php require "app/view/login/editUser.php" ?>
						<?php } ?>
						<a href="/Cart/" class="border-0 text-bg-dark fw-bolder fs-5" title="Giỏ hàng">
							<i class="bi bi-bag-fill"></i>
						</a>
					</form>
					<!-- <div class="collapse position-absolute" id="search-form" style="top: 80%; ">
						<form class="d-flex bg-light border border-info rounded-pill" role="search">
							<input class="form-control bg-light	 border rounded-pill border-0" type="text" placeholder="Tìm kiếm">
							<button class="btn btn-outline-primary border rounded-pill border-0" type="submit"><i class="bi bi-search"></i></button>
						</form>				
					</div>				   -->
				</ul>
			</div>
			<!-- <div class="offcanvas-header">
				 <form class="d-flex mt-3 bg-light rounded" role="search">
					<input class="form-control bg-light	 border border-0" type="text" placeholder="Tìm kiếm">
					<button class="btn btn-outline-dark border border-0" type="submit"><i class="bi bi-search"></i></button>
				  </form>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			  </div> -->
		</div>
	</div>
	<style>
		.show {
			display: block !important;
		}

		.nav_menu_2:hover .dropdown-menu {
			display: block;
		}
		.contentSearch{
			position: absolute;
			width: 700px;
			right: -18%;
			top: 100%;
			padding: 10px 0;
			overflow: hidden;
			border-radius: 10px;
			display: none; 
			background-color: #fff;
			color: #000;
			box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
		}
		.contentSearching li a{
			border-bottom:1px solid #f0f0f0;
			color: #000;
			padding: 4px 2px;
		}
		.contentSearching li:hover a{
			background-color: #ccc;
		}
	</style>

</section>

<script>
	var allParentTags = document.querySelectorAll(":not(.contentSearch) > *");
	for(var i of allParentTags){
        i.onclick = function(){
            var x = document.querySelector(".contentSearch");
            x.classList.remove("show");
        }
    }
	$(document).ready(function() {
		var delayTimer;
		$("#form1").on('keyup', function() {
			clearTimeout(delayTimer);
			$(".contentSearch").addClass("show");

			delayTimer = setTimeout(function() {
				var key = $("#form1").val();
				
				$.ajax({
					type: "POST",
					url: "/public/assets/client/processAjax/search.php",
					data: {
						key: key
					},
					success: function(data) {
						$(".contentSearch").html(data);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$(".contentSearch").html("Không có sản phẩm nào");
					}
				});
			}, 300); // Đợi 300ms trước khi gửi yêu cầu
		});
	});
</script>