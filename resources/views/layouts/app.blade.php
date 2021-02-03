<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jay</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
<div id="app">
    @include('layouts._header')

        @yield('content')

    @include('layouts._footer')
</div>
</body>

<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ mix('js/mouse-events.js') }}"></script>
</html>
