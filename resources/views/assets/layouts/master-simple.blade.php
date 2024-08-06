<!DOCTYPE html>
<html lang="fa">
<head>
    @include('assets.layouts.head-tag')
    @yield('head-tag')
</head>
<body>

    <main id="main-body-one-col" class="main-body">

    @yield('content')

    </main>
    @include('assets.layouts.script')
    @yield('script')
</body>
</html>
