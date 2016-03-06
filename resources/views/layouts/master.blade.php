<html>
<head>
    <!-- Meta properties -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="charset" content="utf-8" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('styles/stylesheet.css') }}" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,600" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css" />

    <!-- Scripts -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.1.min.js"></script>

    <title>Sample App</title>
</head>
<body>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">AJAX / AJAJ / JSON example</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('homepage') }}">Home</a></li>
                <li><a href="{{ route('ajax') }}">AJAX</a></li>
                <li><a href="{{ route('ajaj') }}">AJAJ</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>