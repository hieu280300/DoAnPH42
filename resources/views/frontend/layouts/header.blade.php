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
   

        <!-- MOBILE ONLY CONTENT -->
    </div>
</section>
