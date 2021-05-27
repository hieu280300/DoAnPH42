@extends('frontend.layouts.master')
@section('title','Cart')

@push('css')
@endpush
@section('content')
	
			<!-- MOBILE ONLY CONTENT -->
			<div class="only-for-mobile">
				<ul class="ofm">
					<li class="m_nav"><i class="fa fa-bars"></i> Navigation</li>
				</ul>

				<!-- MOBILE MENU -->
				<div class="mobi-menu">
					<div id='cssmenu'>
						<ul>
							<li class='has-sub'>
								<a href='index.html'><span>Home</span></a>
								<ul class="sub-nav">
									<li><a href="index.html"><span>Home 1</span></a></li>
									<li><a href="index-2.html"><span>Home 2</span></a></li>
								</ul>
							</li>

							<li class='has-sub'>
								<a href='category-1.html'><span>category</span></a>
								<ul>
									<li class='has-sub'>
										<a href='#'><span>Shirts</span></a>
										<ul>
											<li><a href="#"><span>check shirts</span></a></li>
											<li><a href="#"><span>denim shirts</span></a></li>
											<li><a href="#"><span>long sleeve shirts</span></a></li>
											<li><a href="#"><span>denim shirts</span></a></li>
											<li class="last"><a href="./#"><span>long sleeve shirts</span></a></li>
										</ul>
									</li>
									<li class='has-sub'>
										<a href='#'><span>T Shirts</span></a>
										<ul>
											<li><a href="#"><span>plain T-shirt</span></a></li>
											<li><a href="#"><span>printed T-shirt</span></a></li>
											<li><a href="#"><span>sports T-shirt</span></a></li>
											<li><a href="#"><span>striped T-shirt</span></a></li>
											<li class='last'><a href="#"><span>V-Neck T-Shirt</span></a></li>
										</ul>
									</li>
									<li class='has-sub'>
										<a href='#'><span>trousers fit</span></a>
										<ul>
											<li><a href="#"><span>flexible waist</span></a></li>
											<li><a href="#"><span>regular fit</span></a></li>
											<li><a href="#"><span>slim fit</span></a></li>
											<li><a href="#"><span>tailored fit</span></a></li>
											<li class='last'><a href="#"><span>tight fit</span></a></li>
										</ul>
									</li>
									<li class="img-nav">
										<div class="container">
											<div class="clearfix"></div>
											<div class="space20"></div>
											<div class="clearfix"></div>
											<div class="row in1">
												<div class="col-md-6">
													<a href="#"><img src="images/menu_cat.png" class="img-responsive" alt=""/></a>
												</div>
												<div class="col-md-6">
												</div>
												<div class="clearfix"></div>
												<div class="space20"></div>
												<div class="clearfix"></div>
											</div>
											<div class="clearfix"></div>
											<div class="space20"></div>
											<div class="clearfix"></div>
										</div>
									</li>
								</ul>
							</li>
							<li>
								<a href='category-2.html'><span>shop</span></a>
							</li>
							<li class='has-sub'>
								<a href='category-1.html'><span>accessories</span></a>
								<ul class="sub-nav">
									<li><a href="#"><span>check shirts</span></a></li>
									<li><a href="#"><span>denim shirts</span></a></li>
									<li><a href="#"><span>long sleeve shirts</span></a></li>
									<li><a href="#"><span>plain shirts</span></a></li>
									<li><a href="#"><span>printed shirts</span></a></li>
									<li><a href="#"><span>short sleeve shirts</span></a></li>
									<li><a href="#"><span>shortsleeve denim shirts</span></a></li>
								</ul>
							</li>
							<li class='has-sub'>
								<a href='#'><span>pages</span></a>
								<ul id="sub-nav">
									<li><a href="category-1.html">Category page</a></li>
									<li><a href="category-2.html">Category page without filter</a></li>
									<li><a href="checkout.html">Checkout page</a></li>
									<li><a href="cart.html">Cart page</a></li>
									<li><a href="product-detail.html">Product detail page</a></li>
									<li><a href="blog.html">Blog</a></li>
									<li><a href="single-blog.html">Blog single</a></li>
									<li><a href="contact.html">Contact page</a></li>
									<li><a href="404.html">404 page</a></li>
								</ul>
							</li>
							<li>
								<a href='blog.html'><span>Blog</span></a>
							</li>
							<li>
								<a href='cart.html'><span>cart</span></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- MOBILE ONLY CONTENT -->
		</div>
	</section>
	<section class="breadcumb_top_area">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="bread_top_box">
						<h2>Shoping Cart</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="breadcumb_area">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="bread_box">
						<ul class="breadcumb">
							<li><a href="index.html">home <span>|</span></a></li>
							<li><a href="">Shop <span>|</span></a></li>
							<li class="active"><a href="">cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<section class="main_cart_area">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="main_cart_left">
						<div class="cart_heading">
							<div class="h_item1">
								<p>product</p>
							</div>
							<div class="h_item2">
								<p>Price</p>
							</div>
							<div class="h_item3">
								<p>Quantity</p>
							</div>
							<div class="h_item4">
                                <p>Size</p>
							</div>
							<div class="h_item5">
								<p>Color</p>
							</div>
							<div class="h_item6">
								<p>total</p>
							</div>
							<div class="h_item7">
								<p>Update</p>
							</div>
							<div class="h_item8">
								<p>Delete</p>
							</div>
						</div>
						@foreach (Cart::content() as $item)
						<div class="cart_item">	
							<div class="cart_item_img">
								<img src="{{$item->options->image }}" height="100" width="100"alt="" />
								<p>{{$item->name}}</p><br>{{$item->name}}</p>
							</div>
							<div class="cart_price">
								<p>{{number_format($item->price)}} VNĐ</p>
							</div>
							<div class="cart_quantity">
								<div class="cart-qty">
									<form action="{{ route('updateCart', $item->rowId) }}" method="post">
										@csrf
										<input name="update_qty" type="number" class="qty-input" value="{{ $item->qty }}" min="1">
										<button type="submit" class="btn">Update</button>
									</form>
								</div>
							</div>
							
							<div class="cart_size">
								<p>{{$item->color}}</p>
							</div>
							<div class="cart_color">
								<p>{{$item->color}}</p>
							</div>
							<div class="cart_total">
								<p>{{number_format($item->price*$item->qty)}} VNĐ</p>
								<span><i class="fa fa-close"></i></span>
							</div>
							<div class="cart_delete">
								<a href="{{ route('deleteCart', $item->rowId) }}" class="text-danger"><input type="submit" value="Delete"  class="btn btn-danger"></a>
							</div>
						</div>
						<div class="col-3">
							<div class="cart-total">
								<div class="prices">
									<div class="cart-title">Tổng tiền: 	<span class="prices__value prices__value--final">{{ Cart::subTotal() }} VNĐ
										<i style="margin:0 auto"></i>
									</span></div>
									<p class="prices__total text-center justify-content-center">
										<span class="">
											<i style="margin:0 auto"></i>
										</span>
									</p>
								</div>
							</div>
						</div>
					</div>
						@endforeach
                    </div>
					</div>
				
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection