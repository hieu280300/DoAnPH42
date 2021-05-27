<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title',"Home page")</title>

    @include('frontend.layouts.css')
</head>

<body>
    {{-- header --}}
    
    @include('frontend.layouts.header')

  

    {{--navigation--}}
    {{-- @include('frontend.layouts.navigation_custom') --}}
    {{-- menu --}}
    
    @include('frontend.layouts.menu')

    {{-- content --}}
    <div class="container">
        @yield('content')
    </div>


    {{-- footer --}}
    @include('frontend.layouts.footer')

    {{-- js --}}
    @include('frontend.layouts.js')
</body>

</html>
