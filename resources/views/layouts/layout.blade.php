<!DOCTYPE html>
<html lang="ja">
<head>
    @include('layouts.head')
</head>
<body>
    <header>@include('layouts.header')</header>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>