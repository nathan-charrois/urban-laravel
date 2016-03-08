<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="for architecture and urban enthusiasts.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Urbn - @yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700|Open+Sans:400,600|Montserrat:400' rel='stylesheet' type='text/css' />
    <link rel="icon" type="image/png" href="/img/favicon-32x32.png" sizes="32x32">
    <script type="text/javascript" src="/js/bundle.js"></script>
</head>
<body>
    @include('elements.flash')
    @include('elements.header')
    
    @yield('content')
    @yield('scripts')
</body>
</html>