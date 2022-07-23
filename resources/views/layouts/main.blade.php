<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Style -->
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
</head>
<body>
    <!--  Navbar -->
    @include('includes.navbar')

    <div class="col-12">
        <div class="row">
            <!-- Sidebar -->
            @include('includes.sidebar')
            <div class="col-9 offset-3" style="margin-top: 70px;">
                <!-- Page Content -->
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Script -->
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
</body>
</html>