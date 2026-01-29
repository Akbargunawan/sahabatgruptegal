<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<script src="//unpkg.com/alpinejs" defer></script>

<body class="flex min-h-screen bg-gray-100">

    @include('partials.sidebar-admin')

    <main class="flex-1 p-8">
        @yield('content')
    </main>

</body>
</html>
