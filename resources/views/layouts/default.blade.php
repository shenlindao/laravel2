<!DOCTYPE html>
<html lang="en">

<head>
    @include ('includes.head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header>
        <div class="wrap">
            @include ('includes.header')
        </div>
    </header>
    <div class="container wrap">
        <div id="main">
            @yield('content')
        </div>
    </div>
    <footer>
        @include ('includes.footer')
    </footer>
</body>

</html>
