<!DOCTYPE html>
<html lang="en">

<head>
    @include('assets.layouts.head-tag')
    @yield('head-tag')
</head>

<body>

    @include('assets.layouts.header')

    <main id="main-body-one-col" class="main-body">

        @yield('content')

    </main>

    @include('assets.layouts.script')
    @yield('script')
</body>

</html>