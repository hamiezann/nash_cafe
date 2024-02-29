@extends('layouts.template')


@section('hero')
<!-- hero area -->
<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<!-- <div class="col-lg-9 offset-lg-2 text-center"> -->
				<div class="col-lg-9 offset-lg-2 text-center">
                <!-- <div class="content-column col-lg-6"> -->
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Savor & Experience</p>
							<h1>Unwind your Desire</h1>
							<div class="hero-btns">
								<a href="{{ route('productlist')}}" class="boxed-btn">Gourmet Collection</a>
								<a href="{{ route('contact')}}" class="bordered-btn">Get Assistance?</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    @endsection
    @section('content')
	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Free Shipping</h3>
							<p>When order at the cafe lah...</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>12/6 Support</h3>
							<p>Get support from counter</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Refund ?</h3>
							<p>As if you will be served...</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->

	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> Products</h3>
						<p>Indulge in a symphony of flavors at our café, where each dish is crafted with passion and precision. Discover a culinary journey that tantalizes your taste buds and leaves you craving for more. From aromatic coffees to delectable desserts, our menu is a celebration of delightful experiences.</p>
					</div>
				</div>
			</div>


			<div class="row">
			@foreach ($products->take(3) as $product)
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
						<a href="{{ route('productdetails', $product->id) }}">
						<img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->product_name }}">
						</a>
						</div>
						<h3>{{ $product->product_name }}</h3>
						<p class="product-price"><span>Per Set</span> RM{{ number_format($product->product_price, 2) }} </p>
						<!-- <a href="" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a> -->
						<form action="{{ route('cart.add') }}" method="POST">
    						@csrf
						    <input type="hidden" name="productId" value="{{ $product->id }}">
    						<input type="hidden" name="quantity" value="1">
							<div class="update-bar-tablecell">
                    		<button type="submit" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                			</div>
							
						</form>
					</div>
				</div>
			@endforeach
				
				<!-- <div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="{{ asset('interface/assets/img/products/product-img-2.jpg') }}" alt=""></a>
						</div>
						<h3>Berry</h3>
						<p class="product-price"><span>Per Kg</span> 70$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="{{ asset('interface/assets/img/products/product-img-3.jpg') }}" alt=""></a>
						</div>
						<h3>Lemon</h3>
						<p class="product-price"><span>Per Kg</span> 35$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div> -->
				
			</div>
		</div>
	</div>
	<!-- end product section -->

	<!-- cart banner section -->
	<!-- <section class="cart-banner pt-100 pb-100">
    	<div class="container">
        	<div class="row clearfix">
            
            	<div class="image-column col-lg-6">
                	<div class="image">
                    	<div class="price-box">
                        	<div class="inner-price">
                                <span class="price">
                                    <strong>30%</strong> <br> off per kg
                                </span>
                            </div>
                        </div>
                    	<img src="{{ asset('interface/assets/img/burger.jpg') }}" alt="">
                    </div>
                </div>
              
                <div class="content-column col-lg-6">
					<h3><span class="orange-text">Deal</span> of the month</h3>
                    <h4>FarTart Burger</h4>
                    <div class="text">Our delicious burgers are more than just a meal; they are a culinary masterpiece. Picture succulent, perfectly seasoned patties made from the finest cuts of meat, grilled to perfection and nestled between soft, freshly baked buns. Every burger is a work of art, assembled with precision and care to ensure a harmonious blend of textures and flavors.</div>
                  
                    <div class="time-counter"><div class="time-countdown clearfix" data-countdown="2024/2/01"><div class="counter-column"><div class="inner"><span class="count">00</span>Days</div></div> <div class="counter-column"><div class="inner"><span class="count">00</span>Hours</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Mins</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Secs</div></div></div></div>
                	<a href="cart.html" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
        </div>
    </section> -->
	<!-- In your product listing view -->
	@foreach ($products_promoted as $product)
    <section class="cart-banner pt-100 pb-100">
        <div class="container">
            <div class="row clearfix">
                <!-- Image Column -->
                <div class="image-column col-lg-6">
                    <div class="image">
                        <div class="price-box">
                            <div class="inner-price">
                                <span class="price">
                                    <strong>{{ $product->discount }}%</strong> <br> off per set
                                </span>
                            </div>
                        </div>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    </div>
                </div>
                <!-- Content Column -->
                <div class="content-column col-lg-6">
                    <h3><span class="orange-text">{{ $product->promoted ? 'Best Deal' : '' }}</span> of the month</h3>
                    <h4>{{ $product->product_name }}</h4>
                    <div class="text">{{ $product->description }}</div>
                    <!-- Countdown Timer -->
                    <div class="time-counter">
                        <div class="time-countdown clearfix" data-countdown="2024/2/01">
                            <div class="counter-column">
                                <div class="inner"><span class="count">00</span>Days</div>
                            </div>
                            <!-- ... (other countdown columns) ... -->
                        </div>
                    </div>
                    <!-- <a href="{{ route('cart.add', ['id' => $product->id]) }}" class="cart-btn mt-3">
                        <i class="fas fa-shopping-cart"></i> Add to Cart
                    </a> -->
					<form action="{{ route('cart.add') }}" method="POST">
    						@csrf
						    <input type="hidden" name="productId" value="{{ $product->id }}">
    						<input type="hidden" name="quantity" value="1">
							<div class="update-bar-tablecell">
                    		<button type="submit" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                			</div>
					</form>
                </div>
            </div>
        </div>
    </section>
@endforeach

    <!-- end cart banner section -->

	<!-- testimonail-section -->
	<div class="testimonail-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="{{ asset('interface/assets/img/avaters/avatar1.png') }}" alt="">
							</div>
							<div class="client-meta">
								<h3>Salmah Halim <span>Loyal Customer</span></h3>
								<p class="testimonial-body">
									" Semua menu mereka adalah sangat sedap! Saya memang dari kecil suka pergi kedai makan dan berpengalaman menguji kesedapan pelbagai masakan. Jika tidak di NASH CAFE pasti tidak di mana-mana. "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="{{ asset('interface/assets/img/avaters/avatar2.png') }}" alt="">
							</div>
							<div class="client-meta">
								<h3>Danial Ruzaini <span>Cafe Enthusiast</span></h3>
								<p class="testimonial-body">
									" Satu je nak cakap. "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="{{ asset('interface/assets/img/avaters/avatar3.png') }}" alt="">
							</div>
							<div class="client-meta">
								<h3>Jazmi Jazran <span>Starboy</span></h3>
								<p class="testimonial-body">
									" No comment. Tengah mewing. "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section -->
	
	<!-- advertisement section -->
	<div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt-bg">
						<a href="https://www.youtube.com/watch?v=CM4CkVFmTds" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">Since Year 2023</p>
						<h2>We are <span class="orange-text">NASHCAFE</span></h2>
						<p>
Nash Cafe, nestled in the heart of [Your Location], is a cozy haven where aromas of freshly brewed coffee and warm pastries beckon patrons to unwind and indulge. With its inviting ambiance and welcoming staff, Nash Cafe offers more than just a cup of coffee; it's a vibrant community hub where friends gather, ideas flourish, and conversations flow freely. Whether you're seeking a tranquil spot for solitary reflection or a lively atmosphere for catching up with loved ones, Nash Cafe promises an experience that delights the senses and nurtures the soul.</p>
						<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente facilis illo repellat veritatis minus, et labore minima mollitia qui ducimus.</p> -->
						<a href="about.html" class="boxed-btn mt-4">know more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->
	
	<!-- shop banner -->
	<section class="shop-banner">
    	<div class="container">
        	<h3>February REBAT is on! <br> with big <span class="orange-text">Discount...</span></h3>
            <div class="sale-percent"><span>Promo! <br> Upto</span>50% <span>off</span></div>
            <a href="{{ route('productlist')}}" class="cart-btn btn-lg">MAKAN Now</a>
        </div>
    </section>
	<!-- end shop banner -->

	<!-- latest news -->
	<div class="latest-news pt-150 pb-150">
		<div class="container">

			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> Story</h3>
						<p>Tells the tale of our journey in the bussiness</p>
					</div>
				</div>
			</div>

			<div class="row">
			<div class="col-lg-4 col-md-6">
    <div class="single-latest-news">
        <a href="single-news.html">
            <div class="latest-news-bg news-bg-1"></div>
        </a>
        <div class="news-text-box">
            <h3><a href="single-news.html">Fighting Against The Dragon.</a></h3>
            <p class="blog-meta">
                <span class="author"><i class="fas fa-user"></i> Admin</span>
                <span class="date"><i class="fas fa-calendar"></i> 27 January, 2024</span>
            </p>
            <p class="excerpt">Our heroic hero climbed the Bukit Kepok peak to find the secret recipe for fabulous coffee. In there, they fought with the Fire Dragon that terrorized the lives of citizens...</p>
            <a href="single-news.html" class="read-more-btn">Read More <i class="fas fa-angle-right"></i></a>
        </div>
    </div>
</div>

<!-- First News Item -->
<div class="col-lg-4 col-md-6">
    <div class="single-latest-news">
        <a href="single-news.html">
            <div class="latest-news-bg news-bg-2"></div>
        </a>
        <div class="news-text-box">
            <h3><a href="single-news.html">Fantasy Journey to the Enchanted Cafe</a></h3>
            <p class="blog-meta">
                <span class="author"><i class="fas fa-user"></i> Admin</span>
                <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
            </p>
            <p class="excerpt">Embark on a magical adventure through the enchanted woods to discover the mystical cafe hidden beneath the ancient trees. Encounter fantastical creatures and sip on the finest brews brewed by fairies.</p>
            <a href="single-news.html" class="read-more-btn">Read More <i class="fas fa-angle-right"></i></a>
        </div>
    </div>
</div>

<!-- Second News Item -->
<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
    <div class="single-latest-news">
        <a href="single-news.html">
            <div class="latest-news-bg news-bg-3"></div>
        </a>
        <div class="news-text-box">
            <h3><a href="single-news.html">Good thoughts bear good fresh juicy fruit.</a></h3>
            <p class="blog-meta">
                <span class="author"><i class="fas fa-user"></i> Admin</span>
                <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
            </p>
            <p class="excerpt">Stop having dirty mind. Research shows that a sip of coffe from NASH CAFE will rejuvenate your mind and be reborn like having a baby mind...</p>
            <a href="single-news.html" class="read-more-btn">Read More <i class="fas fa-angle-right"></i></a>
        </div>
    </div>
</div>

			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<a href="news.html" class="boxed-btn">More News</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="{{ asset('interface/assets/img/company-logos/1.png') }}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{ asset('interface/assets/img/company-logos/2.png') }}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{ asset('interface/assets/img/company-logos/3.png') }}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{ asset('interface/assets/img/company-logos/4.png') }}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{ asset('interface/assets/img/company-logos/5.png') }}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

@endsection
