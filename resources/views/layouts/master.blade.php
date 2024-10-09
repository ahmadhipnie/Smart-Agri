<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Smart-Agri')</title>
    @include('layouts.app.css')   
    @yield('style')

</head>
<body>
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
