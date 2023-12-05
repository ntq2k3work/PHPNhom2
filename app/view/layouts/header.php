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
				<ul class="navbar-nav justify-content-end flex-grow-1 my-2">
				  <li class="nav-item">
					<a class="nav-link me-3" href="#">Giới thiệu</a>
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
				  <ul class="dropdown-menu dropdown-menu-dark " >
					<li><a class="dropdown-item p-3 " style="min-width: 200px;" href="/product/list/Phu-kien/HopDongHo">Hộp đồng hồ</a></li>
					<li><a class="dropdown-item p-3 " style="min-width: 200px;" href="/product/list/Phu-kien/DayDa">Dây da ZRC</a></li>
					<li><a class="dropdown-item p-3 " style="min-width: 200px;" href="/product/list/Phu-kien/KhacLazer">Khắc lazer lên đồng hồ</a></li>
				  </ul>
				</li>
				  <li class="nav-item">
					<a class="nav-link me-3" href="#">Tin tức</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link me-3" href="#">Liên hệ</a>
				  </li>
				  <li class="nav-item d-lg-none d-block">
					<a class="nav-link me-3" href="#">Đăng nhập</a>
				  </li> 				  
				  <form class="me-5" role="search" style="margin: auto 0px;">
					   <button class="border-0 text-bg-dark fw-bolder fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#search-form" aria-expanded="false"><i class="bi bi-search"></i></button>
					   <button class="border-0 text-bg-dark fw-bolder fs-5 d-lg-inline d-none" type="submit"><i class="bi bi-person-square"></i></button>
					   <button class="border-0 text-bg-dark fw-bolder fs-5" type="submit"><i class="bi bi-bag-fill"></i></button>
					   <input class="form-control me-2 d-none" type="search" placeholder="Search" aria-label="Search">
				  </form>
			   <div class="collapse position-absolute" id="search-form" style="top: 80%; ">
				  <form class="d-flex bg-light border border-info rounded-pill" role="search">
					<input class="form-control bg-light	 border rounded-pill border-0" type="text" placeholder="Tìm kiếm">
					<button class="btn btn-outline-primary border rounded-pill border-0" type="submit"><i class="bi bi-search"></i></button>
				  </form>				
			   </div>				  
				</ul>							
			  </div>			  
			  <div class="offcanvas-header">
				 <form class="d-flex mt-3 bg-light rounded" role="search">
					<input class="form-control bg-light	 border border-0" type="text" placeholder="Tìm kiếm">
					<button class="btn btn-outline-dark border border-0" type="submit"><i class="bi bi-search"></i></button>
				  </form>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			  </div>
			</div>
		  </div>
		  <style>
			.nav_menu_2:hover .dropdown-menu{
				display: block;
			}
		  </style>
		</section>