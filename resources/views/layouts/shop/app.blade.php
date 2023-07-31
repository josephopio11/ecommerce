@include('layouts.shop.header')
        <!-- end header section -->
        <!-- slider section -->
        @include('layouts.shop.slider')
        <!-- end slider section -->
    </div>

    {{-- @include('layouts.shop.otherstuff') --}}

    <!-- product section -->
    @yield('content')
    <!-- end product section -->

    @include('layouts.shop.others2')
    <!-- footer start -->
    @include('layouts.shop.footer')
