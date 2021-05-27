<div class="container">
    <div class="row">
        <div class="mb-5 mt-5 border p-3">
            <form action="{{ route('shop') }}" method="GET">
                <div class="header_left floatleft">
                    <input type="text" name="name" placeholder="search" value="{{ request()->get('name') }}">
                    <button type="submit" class="btn btn-info ">Search</button>
                </div>
            </form>
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