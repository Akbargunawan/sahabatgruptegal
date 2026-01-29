<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
@include('partials.chatbot-modal')
@include('partials.chatbot-button')

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<body class="min-h-screen bg-white">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    @include('partials.sidebar')

    {{-- CONTENT AREA --}}
    <div class="flex-1 flex flex-col">

        {{-- TOP NAVBAR --}}
        @include('partials.navbar')

        {{-- PAGE CONTENT --}}
        <main class="flex-1 p-8">
            @yield('content')
        </main>

    </div>
</div>

</body>
</html>
