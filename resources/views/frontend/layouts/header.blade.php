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
                    @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->utype == 'ADM')

                                <li class="menu-item menu-item-has-children parent">
                                    <a title="My account" ">My account ({{ Auth::user()->name }}) <i class=" fa
                                        fa-angle-down" aria-hidden="true"></i></a>
                                </li>
                                <li class="menu-item menu-item-has-children parent">
                                    <a title="My account" ">My account ({{ Auth::user()->name }}) <i class=" fa
                                        fa-angle-down" aria-hidden="true"></i></a>
                                </li>
                            @else
                                <p><a title="My account" class class="text-sm text-gray-700 underline"
                                        href="{{ route('info_user') }}">
                                        {{ Auth::user()->name }}</a></p>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    
                                    <p> <a title="Logout" class="ml-4 text-sm text-gray-700 underline" type="button"
                                            onclick="event.preventDefault();
                                        this.closest('form').submit();">{{ __('Đăng xuất') }}</a>
                                    </p>
                        
                                </form>


                    </div>
                    @endif
                @else
                    <p><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Đăng Nhập</a></p>
                    <p> <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Đăng Kí</a></p>

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
