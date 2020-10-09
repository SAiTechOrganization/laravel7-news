<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel News - @yield('title')</title>

    @section('default_css')
        <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
    @show
</head>
<body>
    @include('common.navbar')

    @yield('content')

    @section('default_javascript')
        <script src="{{ asset('js/posts.js') }}"></script>
    @show
</body>
</html>
