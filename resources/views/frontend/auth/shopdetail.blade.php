@extends('frontend.layouts.master')
@section('title','Product Details')

@push('css')
@endpush
@section('content')
	
	<div class="breadcumb_area">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="bread_box">
						<ul class="breadcumb">
							<li><a href="index.html">home <span>|</span></a></li>
							<li><a href="cart.html">shop <span>|</span></a></li>
							<li><a href="category-1.html">mens <span>|</span></a></li>
							<li class="active"><a href=""></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<section class="gray_tshirt_area">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="gray_tshirt">
					<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="single_product_image_tab">
							<div role="tabpanel">

							  <!-- Nav tabs -->
							  <ul class="nav nav-tabs product_detail_zoom_tab" role="tablist">
								<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">
									<div class="small_img">
										<img src="images/small_img1.jpg" alt="" />
									</div>
								</a></li>
								<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
									<div class="small_img">
										<img src="{{$product->thumbnail}}" alt="" />
									</div>
								</a></li>
								<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">
									<div class="small_img">
										<img src="images/p_thumb2.png" alt="" />
									</div>
								</a></li>
							  </ul>

							  <!-- Tab panes -->
							  <div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="home">
									<div class="single_p_image">
										<a href="images/single-large.jpg" data-lightbox="image-1" data-title="My caption"><img src="images/product-plus.png" alt="" /></a>
										<img id="zoom_02" src="images/Product-Details-04.jpg" data-zoom-image="images/single-large.jpg" alt=""/>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="profile">
									<div class="single_p_image">
										<a href="images/single-large1.png" data-lightbox="image-1" data-title="My caption"><img src="images/product-plus.png" alt="" /></a>
										<img id="zoom_03" src="images/product_detail_05.png" data-zoom-image="images/single-large1.png" alt=""/>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="messages">
									<div class="single_p_image">
										<a href="images/single-large2.png" data-lightbox="image-1" data-title="My caption"><img src="images/product-plus.png" alt="" /></a>
										<img id="zoom_04" src="images/product_detail_06.png" data-zoom-image="images/single-large2.png" alt=""/>
									</div>
								</div>
							  </div>

							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
					
						<div class="product_detail_heading">
							<div class="detail_heading_left">
								<h3>{{$product->name}}</h3>
								<div ><p> {{number_format($product->latestPrice()->price)}} VNĐ</p></div>
								{{-- <div class="new_price_gray"><del> $100.30 </del></div> --}}
							</div>
							<div class="detail_heading_right">
								<ul id="detail_star">
									<li><a class="fa fa-star-o red" href=""></a></li>
									<li><a class="fa fa-star-o red" href=""></a></li>
									<li><a class="fa fa-star-o red" href=""></a></li>
									<li><a class="fa fa-star-o" href=""></a></li>
									<li><a class="fa fa-star-o" href=""></a></li>
								</ul>
								<p>(5 Review)</p>
							</div>
						</div>
						
						<div class="panel-group product_accordion" id="home-accordion-single" role="tablist" aria-multiselectable="true">
						 <div class="panel panel-default product_default">
							<div class="panel-heading product_accordion_heading" role="tab" id="headingOneP">
							  <h4 class="panel-title product_accordion_head">
								 <a data-toggle="collapse" data-parent="#home-accordion-single" href="#collapseOneP" aria-expanded="true" aria-controls="collapseOneP">
								   Description
								   <span class="floatright"><i class="fa fa-minus"></i></span>
								 </a>
							  </h4>
							</div>
							<div id="collapseOneP" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOneP">
							  <div class="panel-body product_ac_body">
							 <p>{{$product->description}}</p>
							
							  </div>
							</div>
						 </div>
						 <div class="panel panel-default product_default">
							<div class="panel-heading product_accordion_heading" role="tab" id="headingTwoP">
							  <h4 class="panel-title product_accordion_head">
							 <a class="collapsed" data-toggle="collapse" data-parent="#home-accordion-single" href="#collapseTwoP" aria-expanded="false" aria-controls="collapseTwoP">
							   size & fit
							   <span class="floatright"><i class="fa fa-plus"></i></span>
							 </a>
							  </h4>
							</div>
							<div id="collapseTwoP" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwoP">
							  <div class="panel-body fit">
							 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
							  </div>
							</div>
						 </div>
						 <div class="panel panel-default product_default">
							<div class="panel-heading product_accordion_heading" role="tab" id="headingThreeP">
							  <h4 class="panel-title product_accordion_head">
							 <a class="collapsed" data-toggle="collapse" data-parent="#home-accordion-single" href="#collapseThreeP" aria-expanded="false" aria-controls="collapseThreeP">
							   delivery & returns
							   <span class="floatright"><i class="fa fa-plus"></i></span>
							 </a>
							  </h4>
							</div>
							<div id="collapseThreeP" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThreeP">
							  <div class="panel-body product_accordion_head">
								<div class="single_color sp_single_col">
											<ul id="cat_color">
												<li><a class="col-7" href=""></a></li>
												<li><a class="col-8" href=""></a></li>
												<li><a class="col-9" href=""></a></li>
												<li><a class="col-10" href=""></a></li>
											</ul>
										  </div>
										
									</div>
								</div>
								<div class="single_color">
								<div class="color_heading"><h5>Select size</h5></div>
								<div class="color_detail">
								
								</div>
								</div>
								<div class="single_color">
								<div class="color_heading"><h5>Quantity</h5></div>
								<div class="color_detail">
{{-- 									
									{{-- <form action="{{ route('addCart',$product->id) }}" method="post"> --}}
									{{-- <div class="color_size_detail">
										<select name="product_size" id="product-size">
											@foreach ($sizes as $size)
													<option value="{{ $size->id }}">{{ $size->size }}</option>
											@endforeach
										</select>		
									</div>
									<div>
										<div class="color_heading"><h5>Colors</h5></div>
										<div class="color_detail">
											<div class="panel-body colors_cat">
												<select name="product_color" id="product-color">
												@foreach($colors as $color)
												<option value="{{$color->id}}">{{$color->color}}</option> --}}
												 {{-- @endforeach
												</select>
											</div>
										</div>
									</div> --}}
									{{-- <div class="size_down">
										<input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity[113]" max="119" min="0" step="1">
									</div> --}}
									
										{{-- <button type="submit" class="btn btn-secondary" title="Add to cart">
											<i class="fa fa-shopping-cart">ADD CARD</i>
									</div>
									</form>  --}}
									{{-- <div class="size_heart">
										<a href=""><img src="images/Product-Details-heart.png" alt="" /></a>
									</div>
									<div class="size_heart">
										<a href=""><img src="images/Product-Details-arrow.png" alt="" /></a>
									</div> --}}
									<form action="{{ route('addCart',$product->id,$size->id,$color->id) }}" method="post">
										@csrf
										<div class="color_size_detail">
											<select name="product_size" id="product-size">
												@foreach ($sizes as $size)
														<option value="{{ $size->id }}">{{ $size->size }}</option>
												@endforeach
											</select>		
										</div>
										<div>
											<div class="color_heading"><h5>Colors</h5></div>
											<div class="color_detail">
												<div class="panel-body colors_cat">
													<select name="product_color" id="product-color">
													@foreach($colors as $color)
													<option value="{{$color->id}}">{{$color->color}}</option> --}}
													 @endforeach
													</select>
												</div>
											</div>
										</div>
										<input type="hidden" name="quantity" value="1">
										<br>
										<input type="hidden" name="pro_id">
										<button type="submit" class="btn btn-secondary" title="Add to cart">
										  <i class="fa fa-shopping-cart">ADD TO CARD</i>
									  </button>
								</div>
								</div>
								
							  </div>
							</div>
						 </div>
					   </div>
						
					</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="product_page_tab_area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="product_page_tab">
						<div role="tabpanel">
						  <ul class="nav nav-tabs tab-product" role="tablist">
							<li role="presentation" class="active"><a href="#home2" aria-controls="home2" role="tab" data-toggle="tab">Description</a></li>
							<li role="presentation"><a href="#profile2" aria-controls="profile2" role="tab" data-toggle="tab">ADDITIONAL INFORMATION</a></li>
							<li role="presentation"><a href="#messages2" aria-controls="messages2" role="tab" data-toggle="tab">Review (2)</a></li>
						  </ul>

						  <div class="tab-content tab-p-details">
							<div role="tabpanel" class="tab-pane active" id="home2"><h2>Description</h2>
								<div class="multi_line"></div>
								<p>Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enimsal ipsam salamthi voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptateras sequi nesciunt resmla Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquae eius modi tempora inciduntia ut labore et dolore magnam aliquam quaerat voluptatem. 
								</p>
							</div>
							<div role="tabpanel" class="tab-pane" id="profile2"><h2>Additional Information</h2>
								<div class="multi_line"></div>
								<p>Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enimsal ipsam salamthi voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptateras sequi nesciunt resmla Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquae eius modi tempora inciduntia ut labore et dolore magnam aliquam quaerat voluptatem. 
								</p>
							</div>
							<div role="tabpanel" class="tab-pane" id="messages2">
								<div class="review_comments">
									<div class="review_heading">
										<div class="review_heading_left">
											<h2><span>2 Review for </span> "Gray Structured T-Shirt"</h2>
											<div class="multi_line"></div>
										</div>
										<div class="review_heading_right">
											<ul id="review_heading_star">
												<li><a href="" class="fa fa-star"></a></li>
												<li><a href="" class="fa fa-star"></a></li>
												<li><a href="" class="fa fa-star"></a></li>
												<li><a href="" class="fa fa-star"></a></li>
												<li><a href="" class="fa fa-star"></a></li>
											</ul>
										</div>
									</div>
									<div class="single_review_comment">
										<div class="single_review_img">
											<img src="images/single_rv1.png" alt="" />
										</div>
										<div class="single_review_text">
											<h4>A Stunning Beauty!</h4>
											<ul id="single_review_star">
												<li><a href="" class="fa fa-star"></a></li>
												<li><a href="" class="fa fa-star"></a></li>
												<li><a href="" class="fa fa-star"></a></li>
												<li><a href="" class="fa fa-star"></a></li>
												<li><a href="" class="fa fa-star"></a></li>
											</ul>
											<p>Semper orci etiam ac ultricies ante. Donec lobortis variusjusto et. Curabitur egestas aliquet massa non elementum. Quisque at risus nisl. Aliquam erat volutpat. Suspendisse potenti. Nullam porta faucibus elit.</p>
											<div class="review_italic">
												<p><span>Nicole Bailey,</span> 12.05.2013</p>
											</div>
										</div>
									</div>
									<div class="single_review_comment last">
										<div class="single_review_img">
											<img src="images/single_rv2.png" alt="" />
										</div>
										<div class="single_review_text last">
											<h4>A Stunning Beauty!</h4>
											<ul id="single_review_star">
												<li><a href="" class="fa fa-star"></a></li>
												<li><a href="" class="fa fa-star"></a></li>
												<li><a href="" class="fa fa-star"></a></li>
												<li><a href="" class="fa fa-star"></a></li>
												<li><a href="" class="fa fa-star"></a></li>
											</ul>
											<p>Semper orci etiam ac ultricies ante. Donec lobortis variusjusto et. Curabitur egestas aliquet massa non elementum. Quisque at risus nisl. Aliquam erat volutpat. Suspendisse potenti. Nullam porta faucibus elit.</p>
											<div class="review_italic">
												<p><span>Nicole Bailey,</span> 12.05.2013</p>
											</div>
										</div>
									</div>
								</div>
								<div class="Review_input">
									<div class="review_input_heading">
										<h3>Write your review</h3>
										<div class="multi_line"></div>
									</div>
									<div class="review_comment_input">
										<input type="text" placeholder="Enter Your Nickname"/><br>
										<input type="text" placeholder="Summary of your Review"/><br>
										<textarea name="" id="" cols="30" rows="10" placeholder="Write your review"></textarea><br>
										<input type="submit" value="Submit Review"/>
									</div>
								</div>
							</div>
						  </div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="main_category_area product_page_caro">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="main_category_right product-box">
					<h3 class="product">related products</h3>
					<div class="multi_line"></div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div id="owl-example-single" class="owl-carousel">
								  <div class="item">
									<div class="item-img">
										<img src="images/t_item16.jpg" alt="" />
										<div class="tr-add-cart">
											<ul>
												<li><a class="fa fa-shopping-cart tr_cart" href="#"></a></li>
												<li><a class="tr_text" href="#">ADD TO CART</a></li>
												<li><a class="fa fa-heart tr_heart" href="#"></a></li>
												<li><a class="fa fa-search tr_search" href="product-detail.html"></a></li>
											</ul>
										</div>
									</div>
									<div class="item-new">
										<p>New</p>
									</div>
									<div class="item-sub">
										<a href="product-detail.html"><h5>AROS SLIM HEAVY CHINO</h5></a>
										<p>$ 181.00 <span><del>$ 212.00</del></span></p>
									</div>
								  </div>
								  <div class="item">
									<div class="item-img">
										<img src="images/t_item13.jpg" alt="" />
										<div class="tr-add-cart">
											<ul>
												<li><a class="fa fa-shopping-cart tr_cart" href="#"></a></li>
												<li><a class="tr_text" href="#">ADD TO CART</a></li>
												<li><a class="fa fa-heart tr_heart" href="#"></a></li>
												<li><a class="fa fa-search tr_search" href="product-detail.html"></a></li>
											</ul>
										</div>
									</div>
									<div class="item-new">
										<p>New</p>
										<span>-10%</span>
									</div>
									<div class="item-sub">
										<a href="product-detail.html"><h5>men’s fashion blue jean coat</h5></a>
										<p>$ 130.00 <span><del>$ 150</del></span></p>
									</div>
								  </div>
								  <div class="item">
									<div class="item-img">
										<img src="images/t_item11.jpg" alt="" />
										<div class="tr-add-cart">
											<ul>
												<li><a class="fa fa-shopping-cart tr_cart" href="#"></a></li>
												<li><a class="tr_text" href="#">ADD TO CART</a></li>
												<li><a class="fa fa-heart tr_heart" href="#"></a></li>
												<li><a class="fa fa-search tr_search" href="product-detail.html"></a></li>
											</ul>
										</div>
									</div>
									<div class="item-new">
										<p>New</p>
									</div>
									<div class="item-sub">
										<a href="product-detail.html"><h5>houndsmooth wool t-shirt</h5></a>
										<p>$ 168<span><del>$ 212</del></span></p>
									</div>
								  </div>
								  <div class="item">
									<div class="item-img">
										<img src="images/t_item12.jpg" alt="" />
										<div class="tr-add-cart">
											<ul>
												<li><a class="fa fa-shopping-cart tr_cart" href="#"></a></li>
												<li><a class="tr_text" href="#">ADD TO CART</a></li>
												<li><a class="fa fa-heart tr_heart" href="#"></a></li>
												<li><a class="fa fa-search tr_search" href="product-detail.html"></a></li>
											</ul>
										</div>
									</div>
									<div class="item-new">
										<p>New</p>
										<span>-10%</span>
									</div>
									<div class="item-sub">
										<a href="product-detail.html"><h5>structured collarless coat</h5></a>
										<p>$ 133.20<span><del>$ 140.00</del></span></p>
									</div>
								  </div>
								  <div class="item">
									<div class="item-img">
										<img src="images/t_item1.jpg" alt="" />
										<div class="tr-add-cart">
											<ul>
												<li><a class="fa fa-shopping-cart tr_cart" href="#"></a></li>
												<li><a class="tr_text" href="#">ADD TO CART</a></li>
												<li><a class="fa fa-heart tr_heart" href="#"></a></li>
												<li><a class="fa fa-search tr_search" href="product-detail.html"></a></li>
											</ul>
										</div>
									</div>
									<div class="item-new">
										<p>New</p>
										<span>-10%</span>
									</div>
									<div class="item-sub">
										<a href="product-detail.html"><h5>houndsmooth wool t-shirt</h5></a>
										<p>$90.00 <span><del>$100</del></span></p>
									</div>
								  </div>
								  <div class="item">
									<div class="item-img">
										<img src="images/t_item2.jpg" alt="" />
										<div class="tr-add-cart">
											<ul>
												<li><a class="fa fa-shopping-cart tr_cart" href="#"></a></li>
												<li><a class="tr_text" href="#">ADD TO CART</a></li>
												<li><a class="fa fa-heart tr_heart" href="#"></a></li>
												<li><a class="fa fa-search tr_search" href="product-detail.html"></a></li>
											</ul>
										</div>
									</div>
									<div class="item-new">
										<p>New</p>
										<span>-10%</span>
									</div>
									<div class="item-sub">
										<a href="product-detail.html"><h5>AROS SLIM HEAVY CHINO</h5></a>
										<p>$90.00 <span><del>$100</del></span></p>
									</div>
								  </div>
								  <div class="item">
									<div class="item-img">
										<img src="images/t_item3.jpg" alt="" />
										<div class="tr-add-cart">
											<ul>
												<li><a class="fa fa-shopping-cart tr_cart" href="#"></a></li>
												<li><a class="tr_text" href="#">ADD TO CART</a></li>
												<li><a class="fa fa-heart tr_heart" href="#"></a></li>
												<li><a class="fa fa-search tr_search" href="product-detail.html"></a></li>
											</ul>
										</div>
									</div>
									<div class="item-new">
										<p>New</p>
									</div>
									<div class="item-sub">
										<a href="product-detail.html"><h5>AROS SLIM HEAVY CHINO</h5></a>
										<p>$90.00</p>
									</div>
								  </div>
								  <div class="item">
									<div class="item-img">
										<img src="images/t_item2.jpg" alt="" />
										<div class="tr-add-cart">
											<ul>
												<li><a class="fa fa-shopping-cart tr_cart" href="#"></a></li>
												<li><a class="tr_text" href="#">ADD TO CART</a></li>
												<li><a class="fa fa-heart tr_heart" href="#"></a></li>
												<li><a class="fa fa-search tr_search" href="product-detail.html"></a></li>
											</ul>
										</div>
									</div>
									<div class="item-new">
										<p>New</p>
									</div>
									<div class="item-sub">
										<a href="product-detail.html"><h5>houndsmooth wool t-shirt</h5></a>
										<p>$90.00</p>
									</div>
								  </div>
								  <div class="item">
									<div class="item-img">
										<img src="images/t_item3.jpg" alt="" />
										<div class="tr-add-cart">
											<ul>
												<li><a class="fa fa-shopping-cart tr_cart" href="#"></a></li>
												<li><a class="tr_text" href="#">ADD TO CART</a></li>
												<li><a class="fa fa-heart tr_heart" href="#"></a></li>
												<li><a class="fa fa-search tr_search" href="product-detail.html"></a></li>
											</ul>
										</div>
									</div>
									<div class="item-new">
										<p>New</p>
										<span>-10%</span>
									</div>
									<div class="item-sub">
										<a href="product-detail.html"><h5>AROS SLIM HEAVY CHINO</h5></a>
										<p>$110.00 <span><del>$120</del></span></p>
									</div>
								  </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
