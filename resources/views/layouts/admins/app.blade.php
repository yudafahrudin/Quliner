<!DOCTYPE html>

@include('layouts.admins.header')
@include('layouts.admins.nav')
@include('layouts.admins.sidebar')
@include('layouts.admins.footer')


<html lang="{{ app()->getLocale() }}">
    @yield('header')
    <body style="background-image: url({{asset('img/Pizza-Background-Wallpaper-15277.jpg')}})">
        <!--<div id="app">-->
            @unless (!Auth::guard('admin')->user())
            @yield('navigation')
            @yield('sidebar')
            @endunless
            @yield('content')
          
        <!--</div>-->
    </body>
    @yield('footer')
</html>
