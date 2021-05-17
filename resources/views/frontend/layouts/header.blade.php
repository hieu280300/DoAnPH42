<div class="header_top">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="header_top_left">
                    <img src="/images/frontend/car.png" alt="Header Car Icon" />
                    <p>get free! shipping on order over <span>$100</span></p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="header_top_right floatright">
                    @if(Route::has('login'))
                    @auth 
                        @if(Auth::user()->utype =='ADM')
                            <li class="menu-item menu-item-has-children parent" >
                                <a title="My account" href="#">My account ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="submenu curency" >
                                    <li class="menu-item" >
                                        <a title="Dashboard" href="#">Dashboard</a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="menu-item menu-item-has-children parent" >
                                
                                <ul class="submenu curency" >
                                    <li class="menu-item">
                                        <p><a title="My account" href="#">My account ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
                                    </li>
                                    {{-- <li class="menu-item" >
                                        <p><a title="Dashboard" href="#">Dashboard</a></p>
                                    </li> --}}
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <li class="menu-item" >
                                          <p>  <a title="Logout" type="button" onclick="event.preventDefault();
                                            this.closest('form').submit();">{{ __('Log out') }}</a></p>
                                        </li>
                                    </form>
                                </ul>
                            </li> 
                        @endif
                        @else
                        <p><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a></p>
                        <p> <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a></p>
                         
                    @endif
                @endif      
                  
            
                   
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="header_left floatleft">
                    <a class="fa fa-search" href=""></a>
                    <input type="text" placeholder="search"/>
                </div>
            </div>
            <div class="col-md-6 col-sm-5 col-xs-12">
                <div class="header_center">
                    <a href="index.html"><img src="/images/frontend/logo.png" alt="Site Logo" /></a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="header_right floatright">
                    <ul class="checkout">
                        <li><a href="checkout.html"><i class="fa fa-heart-o"></i>wishlist</a></li>
                        <li class="mobi_right_li"><a href="checkout.html"><i class="fa fa-shopping-cart"></i>checklist</a></li>
                    </ul>
                    <div class="w_likes">
                        <span>3</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- MOBILE ONLY CONTENT -->
    </div>
</section>
