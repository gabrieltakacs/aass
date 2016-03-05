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
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>JSON/AJAJ sample app</h1>
        </div>
    </div>

    @yield('content')
</div>

</body>
</html>