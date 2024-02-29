<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/"> -->

	<!-- title -->
	<title>NASH Cafe'</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('interface/assets/img/favicon.png') }}">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="{{ asset('interface/assets/css/all.min.css') }}">
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{ asset('interface/assets/bootstrap/css/bootstrap.min.css') }}">
	<!-- owl carousel -->
	<link rel="stylesheet" href="{{ asset('interface/assets/css/owl.carousel.css') }}">
	<!-- magnific popup -->
	<link rel="stylesheet" href="{{ asset('interface/assets/css/magnific-popup.css') }}">
	<!-- animate css -->
	<link rel="stylesheet" href="{{ asset('interface/assets/css/animate.css') }}">
	<!-- mean menu css -->
	<link rel="stylesheet" href="{{ asset('interface/assets/css/meanmenu.min.css') }}">
	<!-- main style -->
	<link rel="stylesheet" href="{{ asset('interface/assets/css/main.css') }}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{ asset('interface/assets/css/responsive.css') }}">

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="{{ route('home')}}">
							<img src="{{ asset('interface/assets/img/latest.png') }}" alt="Nash Cafe" style="width:100px; height: 100px;">
                               <!-- <h4> NASH Cafe</h4> -->
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li ><a href="{{ route('home')}}">Home</a>
		
								</li>
								<li><a href="{{ route('about')}}">About</a></li>

								<li><a href="{{ route('productlist')}}">Menu</a>
								</li>
								<li><a href="{{ route('order')}}">Order</a>
									<!-- <ul class="sub-menu">
										 <li><a href="{{ route('productlist')}}">Place a new order</a></li>
										<li><a href="single-news.html">Order status</a></li>
									</ul> -->
								</li>
								<li><a href="{{ route('contact')}}">Contact</a></li>
								<li><a href="{{ route('store.index')}}">Store</a></li>
								<!-- <li><a href="{{ route('review')}}">Review Us</a>
									<ul class="sub-menu">
										<li><a href="shop.html">Rate Us</a></li>
										<li><a href="checkout.html">Make a Complaint</a></li>
										 <li><a href="single-product.html">Future Updates</a></li>
										<li><a href="cart.html">Cart</a></li>
									</ul>
								</li> -->

	
		

								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="{{ route('cart')}}"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-sign-out-alt"></i></a>
                                        
									</div>
                                    
								</li>

													</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-sign-out-alt"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
	
	<!-- search area -->
	<div class="search-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="close-btn"><i class="fas fa-window-close"></i></span>
                <!-- Replace the search area with logout button -->
				<div class="search-bar">
				<div class="search-bar-tablecell">
              
				<h3>Are you sure you want to logout?</h3>
                    @auth <!-- Check if user is authenticated -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn">Logout <i class="fas fa-sign-out-alt"></i></button>
                    </form>
                    @else <!-- If user is not authenticated, show login link -->
                    <a href="{{ route('login.user') }}" class="login-link">Login</a>
                    @endauth
                </div>
				</div>
            </div>
        </div>
    </div>
</div>

	
	<!-- end search area -->

    <!-- Display the breadcrumbs/hero for each page -->
    @yield('hero')	
	<!-- end of breadcrumbs/hero for each page -->

    
    <!-- <main class="py-4"> -->
        <main>
            @yield('content')
        </main>
    <!-- main-content -->
	
	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>We are a secret cult that seeks to dominate world with caffein. Behold thou shall rises from their seats to embrace the magnificient drink. Caffein is King.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<li>Kampung Seri Mendapat, Daerah Jasin Melaka Malaysia.</li>
							<li>support@nash.com</li>
							<li>+00 111 222 3333</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="{{ route('home')}}">Home</a></li>
							<li><a href="{{ route('about')}}">About</a></li>
							<li><a href="{{ route('productlist')}}">Menu</a></li>
							<li><a href="news.html">Order</a></li>
							<li><a href="{{ route('contact')}}">Contact</a></li>
							<li><a href="{{ route('store.index')}}">Store</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">Join Us?</h2>
						<p>Subscribe to our Linkedln to submit your resume.</p>
						<form action="index.html">
							<input type="email" placeholder="Email">
							<button type="submit"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2024 - <a href="https://imransdesign.com/">NASH CAFE Ltd</a>,  All Rights Reserved.<br>
						Distributed By - <a href="https://themewagon.com/">NASH.Media.Co</a>
					</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="{{ asset('interface/assets/js/jquery-1.11.3.min.js') }}"></script>
	<!-- bootstrap -->
	<script src="{{ asset('interface/assets/bootstrap/js/bootstrap.min.js') }}"></script>
	<!-- count down -->
	<script src="{{ asset('interface/assets/js/jquery.countdown.js') }}"></script>
	<!-- isotope -->
	<script src="{{ asset('interface/assets/js/jquery.isotope-3.0.6.min.js') }}"></script>
	<!-- waypoints -->
	<script src="{{ asset('interface/assets/js/waypoints.js') }}"></script>
	<!-- owl carousel -->
	<script src="{{ asset('interface/assets/js/owl.carousel.min.js') }}"></script>
	<!-- magnific popup -->
	<script src="{{ asset('interface/assets/js/jquery.magnific-popup.min.js') }}"></script>
	<!-- mean menu -->
	<script src="{{ asset('interface/assets/js/jquery.meanmenu.min.js') }}"></script>
	<!-- sticker js -->
	<script src="{{ asset('interface/assets/js/sticker.js') }}"></script>
	<!-- main js -->
	<script src="{{ asset('interface/assets/js/main.js') }}"></script>

</body>
</html>