@extends('frontend.layouts.master')
@section('title','Home')

@push('css')
@endpush

@section('content')
@include('frontend.layouts.search')
<section class="breadcumb_top_area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="bread_top_box">
                    <h2>Men</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="breadcumb_area" id="post">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="bread_box">
                    <ul class="breadcumb">
                        {{-- <li><a href="{{route('home')}}">home <span>|</span></a></li> --}}
                        <li><a href="{{route('shop')}}">Shop <span>|</span></a></li>
                        <li><a href="category-2.html">Category <span>|</span></a></li>
                        <li class="active"><a href="">Men</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="filter_area">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12">
                <div class="filter_box_left">
                    <p>FILTERING:</p>
                    <div class="filter_cont">
                        <ul>
                            <li><a href="category-1.html">on</a></li>
                            <li><img src="images/filter_ico.png" alt="" /></li>
                            <li><a href="category-2.html">off</a></li>
                        </ul>
                    </div>
                    <div class="s_results">
                        <p><span>|</span> showing 1-12 of 30 results</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-4 col-xs-12">
                <div class="filter_box_right">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">sort by newness <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Top Seller </a></li>
                        <li><a href="#">Most Popular</a></li>
                        <li><a href="#">Alphabetically</a></li>                        
                        <li><a href="#">Older First</a></li>                        
                      </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="main_category_area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="main_category_left">
                
                    <div class="panel-group" id="home-accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#home-accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              CATEGORIES
                              <span class="floatright"><i class="fa fa-minus"></i></span>
                            </a>
                          </h4>
                        </div>
                        <form action="{{ route('shop') }}" method="GET">
                          {{-- <div class="mb-3">
                   <label class="form-label">Category</label>
                   <select name="category_id" class="form-control">
                       <option value=""></option>
                       @if(!empty($categories))
                           @foreach ($categories as $categoryId => $categoryName)
                              
                           @endforeach
                       @endif
                   </select>
               </div> --}}
                       <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                         <div class="panel-body">
                          <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-control">
                                <option value=""></option>
                                @if(!empty($categories))
                                    @foreach ($categories as $categoryId => $categoryName)
                                        <option value="{{ $categoryId }}" {{ request()->get('category_id') == $categoryId ? 'selected' : ''  }}>{{ $categoryName }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                         </div>
                       </div>
                       </form>
                        {{-- <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                         
                           @foreach ($categories as $categoryId => $categoryName)
                          <div class="panel-body">
                      
                            <ul id="c_tab1">
                              <li><a href="">{{$categoryName}}</a></li>
                              
                            </ul>
                          
                          </div>
                          @endforeach  
                        </div> --}}
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                          <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#home-accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              PRICE FILTER
                              <span class="floatright"><i class="fa fa-plus"></i></span>
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                            <div id="slider-range"></div>
                                <div class="cat_filter_box">
                                    <p>
                                      <label for="amount">Filter</label>
                                      <input type="text" id="amount" readonly style="border:0; color:#000; font-weight:bold;">
                                    </p>
                                </div>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                          <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#home-accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              COLOURS
                              <span class="floatright"><i class="fa fa-plus"></i></span>
                            </a>
                          </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body colors_cat">
                            <ul id="cat_color">
                                <li><a class="col-1" href=""></a></li>
                                <li><a class="col-2" href=""></a></li>
                                <li><a class="col-3" href=""></a></li>
                                <li><a class="col-4" href=""></a></li>
                                <li><a class="col-5" href=""></a></li>
                                <li><a class="col-6" href=""></a></li>
                                <li><a class="col-7" href=""></a></li>
                                <li><a class="col-8" href=""></a></li>
                                <li><a class="col-9" href=""></a></li>
                                <li><a class="col-10" href=""></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                          <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#home-accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                              size
                              <span class="floatright"><i class="fa fa-plus"></i></span>
                            </a>
                          </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                          <div class="panel-body">
                            @foreach ($sizes as $size)
                                
                         
                            <ul id="cat_size">
                                <li><a href="">{{$size->size}}</a></li>
                                
                            </ul>
                            @endforeach
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFive">
                          <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#home-accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                              Brands
                              <span class="floatright"><i class="fa fa-plus"></i></span>
                            </a>
                          </h4>
                        </div>
                        
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                          <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#home-accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                              Look
                              <span class="floatright"><i class="fa fa-plus"></i></span>
                            </a>
                          </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                          <div class="panel-body">
                            
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSeven">
                          <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#home-accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                             Style
                              <span class="floatright"><i class="fa fa-plus"></i></span>
                            </a>
                          </h4>
                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                          <div class="panel-body">
                            
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingEight">
                          <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#home-accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                             Best Seller
                              <span class="floatright"><i class="fa fa-plus"></i></span>
                            </a>
                          </h4>
                        </div>
                        <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
                          <div class="panel-body">
                            
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12">
              {{-- <p class=" ">Tìm thấy {{count($products)}} sản phẩm</p> --}}
                <div class="main_category_right">
                    <div class="row">
                        @foreach ($products as $key => $product)
                      
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          
                            <div class="main_cat_item">
                                <div class="item">
                                    <div class="item-img">
                                        <img src="{{$product->thumbnail}}" alt="{{$product->thumbnail}}" />
                                      
                                        <div class="tr-add-cart">
                                            <ul>
                                                {{-- <li><a class="fa fa-shopping-cart tr_cart" href="#"></a></li> --}}
                                                <form action="{{ route('addCart',$product->id) }}" method="post">
                                                  @csrf
                                                  <input type="hidden" name="quantity" value="1">
                                                  <br>
                                                  <input type="hidden" name="pro_id">
                                                  <button type="submit" class="btn btn-secondary" title="Add to cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </button>
                                              </form>
                                             
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="item-new">
                                        <p>New</p>
                                        <span>-10%</span>
                                    </div>
                                    <div class="item-sub">
                                        <a href="{{route('shop_details',['id'=>$product->id])}}" class="product-name" ><h5>{{$product->name}}</h5></a>
                                        @if (!empty($product->latestPrice()->price))
                                        <span class="price">{{ number_format($product->latestPrice()->price) }} VNĐ</span>
                                         @endif
                                        {{-- <p><span><del>{{$product->latestPrice()->price}} VNĐ</del></span></p> --}}
                                  
                                    </div>
                              </div>
                            </div>
                     
                            </div>
                            @endforeach
                      
                        </div>
                </div>
    
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="pagi_line"></div>
                            <div class="pagi_ul">
                                <ul id="pagination">
                                    <li><a href="">Previous</a></li>
                                    {{$products->links()}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 @endsection