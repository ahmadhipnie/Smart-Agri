<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Smart-Agri')</title>
    @include('layouts.app.css')   
    @yield('style')
    <style>
        #preload {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw; 
            height: 100vh;
            background: rgba(255, 255, 255, 1); 
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 99999; 
        }

        #preload img {
            width: 550px;
            height: 320px;
        }

        body.loaded #preload {
            display: none;  
        }

    </style>

</head>
<body>
    <div id="preload">
        <img src="{{ asset('backend/gif/preloader.gif')}}" alt="Loading...">
    </div>
    <!-- Header -->


    <!-- Sidebar -->


    <!-- Main content -->

    <div id="main-wrapper">
    @include('layouts.header')
    @include('layouts.sidebar')
        @yield('content')
        @include('layouts.footer')
    </div>

    @include('layouts.app.script')   
</body>
</html>
