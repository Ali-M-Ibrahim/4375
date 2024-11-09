<!DOCTYPE html>
<html>
<head>
    <title>NAME</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @yield('customcss')
    <style>
        p{
            color:blue !important;
        }
    </style>
</head>
<body>
<p>Hello I am master page</p>
@yield('content')

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
