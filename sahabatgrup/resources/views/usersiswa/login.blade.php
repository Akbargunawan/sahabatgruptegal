<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Sahabat Grup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
</head>
<body class="bg-white">

<div class="min-h-screen flex">
    <!-- LEFT -->
    <div class="w-1/2 flex items-center pl-40 pr-24">
        <div class="w-full max-w-md">

            <h1 class="text-4xl font-semibold mb-2">Login</h1>
            <p class="text-gray-500 mb-10">
                Login to access your account
            </p>

            {{-- ERROR --}}
            @if ($errors->any())
                <div class="mb-6 bg-red-100 text-red-700 px-4 py-3 rounded text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            {{-- FORM --}}
            <form action="{{ route('login.siswa.submit') }}" method="POST">
                @csrf

                <!-- Email -->
                <div class="mb-6">
                    <fieldset class="border border-gray-400 rounded-lg px-4 py-2">
                        <legend class="px-2 text-sm text-gray-600">Email</legend>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            class="w-full border-none p-0 text-gray-800 focus:outline-none focus:ring-0"
                        >
                    </fieldset>
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <fieldset class="border border-gray-400 rounded-lg px-4 py-2 relative">
                        <legend class="px-2 text-sm text-gray-600">Password</legend>

                        <input
                            type="password"
                            name="password"
                            required
                            class="w-full border-none p-0 pr-8 text-gray-800 focus:outline-none focus:ring-0"
                        >
                    </fieldset>
                </div>

                <!-- Options -->
                <div class="flex justify-between items-center mb-8 text-sm">
                    <span></span>
                    <a href="{{ route('forgot.password') }}" class="text-red-400 hover:underline">
                        Forgot Password
                    </a>
                </div>

                <!-- Button -->
                <button
                    type="submit"
                    class="w-full bg-blue-900 text-white py-3 rounded-lg font-medium
                           hover:bg-blue-800 transition">
                    Login
                </button>
            </form>

            <!-- Register -->
            <p class="text-center text-sm mt-6 text-gray-600">
                Don’t have an account?
                <a href="{{ route('register.siswa') }}"
                   class="text-red-400 hover:underline">
                    Sign up
                </a>
            </p>

        </div>
    </div>

    <!-- RIGHT -->
    <div class="w-1/2 flex items-center justify-center">
        <div class="text-center">
            <img src="{{ asset('images/logo-sahabatgrup.png') }}"
                 class="w-72 mx-auto mb-6" alt="Logo">

            <h2 class="text-3xl font-extrabold tracking-widest">
                SAHABAT GRUP
            </h2>
        </div>
    </div>
</div>

</body>
</html>
