<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Budget Tracker</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    @include('components.header')

    <div class="container mx-auto p-6">
        @yield('content')
    </div>

    @include('components.footer')

</body>
</html>