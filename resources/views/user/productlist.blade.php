@extends('layouts.template')


@section('content')
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Menu</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<!-- <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".food">Strawberry</li>
                            <li data-filter=".berry">Berry</li>
                            <li data-filter=".lemon">Lemon</li>
                        </ul>
                    </div>
                </div>
            </div> -->

			<!-- filter product -->
<div class="row">
    <div class="col-md-12">
        <div class="product-filters">
            <ul>
                <li class="active" data-filter="*">All</li>
                <li data-filter=".Food">Food</li>
                <li data-filter=".Beverages">Beverages</li>
                <li data-filter=".Smoothies">Smoothies</li>
                <li data-filter=".Coffee">Coffee</li>
                <li data-filter=".Desserts">Desserts</li>
                <li data-filter=".Drinks">Drinks</li>
            </ul>
        </div>
    </div>
</div>

@if (session('success'))
    <!-- <div class="alert alert-success"> -->
    <div class="custom-success-message">
        {{ session('success') }}
    </div>
@endif

			<!-- display product -->
<div class="row product-lists" id="product-list">
    @foreach ($products as $product)
        <div class="col-lg-4 col-md-4s text-center {{ $product->category->category_name }}">
            <div class="single-product-item">

                <div class="product-image">
                    @if($product->discount > 0)
                        <div class="price-box">
                            <div class="inner-price">
                                <span class="price">
                                   Discount: <strong>{{ number_format($product->discount,2) }}%</strong>
                                </span>
                            </div>
                        </div>
                    @endif

                    <a href="{{ route('productdetails', $product->id) }}">
                        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->product_name }}">
                    </a>
                </div>
                <h3>{{ $product->product_name }}</h3>
                <p><strong>Categories: </strong>{{ $product->category->category_name }}</p>

                @if($product->category->category_name === 'Coffee')
                    <!-- Check if the category is "Coffee" and set the price to RM10 -->
                    <p class="product-price"><span>Per Set</span> RM10</p>
                @else
                    @if($product->discount > 0)
                        <!-- Product has a discount -->
                        <p class="product-price">
                            <span class="original-price">RM{{ number_format($product->product_price, 2) }}</span>
                            RM{{ number_format($product->getDiscountedPrice(), 2) }}
                        </p>
                    @else
                        <!-- Product has no discount -->
                        <p class="product-price"><span>Per Set</span> RM{{ number_format($product->product_price, 2) }}</p>
                    @endif
                @endif

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
</div>






			
			<!-- <div class="row product-lists">
				
				<div class="col-lg-4 col-md-6 text-center strawberry">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3>Strawberry</h3>
						<p class="product-price"><span>Per Kg</span> 85$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center berry">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-2.jpg" alt=""></a>
						</div>
						<h3>Berry</h3>
						<p class="product-price"><span>Per Kg</span> 70$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center lemon">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-3.jpg" alt=""></a>
						</div>
						<h3>Lemon</h3>
						<p class="product-price"><span>Per Kg</span> 35$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-4.jpg" alt=""></a>
						</div>
						<h3>Avocado</h3>
						<p class="product-price"><span>Per Kg</span> 50$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-5.jpg" alt=""></a>
						</div>
						<h3>Green Apple</h3>
						<p class="product-price"><span>Per Kg</span> 45$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center strawberry">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-6.jpg" alt=""></a>
						</div>
						<h3>Strawberry</h3>
						<p class="product-price"><span>Per Kg</span> 80$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
			</div> -->
			<!-- <div class="row product-lists">
			@foreach ($products as $product)
<div class="col-lg-4 col-md-6 text-center {{ $product->category_id }}">
    <div class="single-product-item">
        <div class="product-image">
            <a href="{{route('productdetails', $product->id)}}"><img src="{{ asset('interface/assets/db_img/'.$product->image) }}" alt="{{ $product->product_name }}"></a>
        </div>
        <h3>{{ $product->product_name }}</h3>
        <p class="product-price"><span>Per Set</span> RM{{ number_format($product->product_price,2)}} </p>
        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
    </div>
</div>
@endforeach
			</div> -->

		
			<!-- <div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<li><a href="#">Prev</a></li>
							<li><a class="active" href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div>  -->
<!-- {{ $products->links() }}
<div class="row">
    <div class="col-lg-12 text-center">
        <div class="pagination-wrap">
		<li>{{ $products->links() }}</li>
        </div>
    </div>
</div> -->
  <!-- Custom Pagination -->
  <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        {{-- Previous Page Link --}}
                        @if ($products->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">Prev</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev">Prev</a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @for ($page = 1; $page <= $products->lastPage(); $page++)
                            <li class="page-item {{ ($page == $products->currentPage()) ? 'active' : '' }}">
                                <a class="page-link" href="{{ $products->url($page) }}">{{ $page }}</a>
                            </li>
                        @endfor

                        {{-- Next Page Link --}}
                        @if ($products->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next">Next</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">Next</span>
                            </li>
                        @endif
                    </ul>
                </nav>
	<!-- end products -->

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