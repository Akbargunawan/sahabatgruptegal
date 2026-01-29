<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-white flex items-center justify-center">

    <div class="w-full max-w-6xl px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-10">

           <!-- LEFT IMAGE -->
            <div class="flex justify-center md:justify-start md:-ml-20">
                <img
                    src="{{ asset('images/forgot-password.svg') }}"
                    alt="Forgot Password"
                    class="max-w-md w-full"
                >
            </div>


            <!-- RIGHT FORM -->
            <div class="w-full max-w-md mx-auto">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">
                    Forgot <br> Your Password ?
                </h1>

                <p class="text-gray-500 mb-6 text-sm">
                    Enter your email address and we’ll send you a link to reset your password.
                </p>

                {{-- ALERT DUMMY --}}
                @if (session('success'))
                    <div class="mb-4 bg-green-100 text-green-700 px-4 py-3 rounded-lg text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('forgot.password.submit') }}" method="POST" class="space-y-5">
                    @csrf

                  <div class="mb-6">
                        <fieldset class="border border-gray-400 rounded-lg px-4 py-2">
                            <legend class="px-2 text-sm text-gray-600">
                                Email
                            </legend>
                            <input
                                type="email"
                                name="email"
                                placeholder="john.doe@gmail.com"
                                class="w-full border-none p-0 text-gray-800
                                    focus:outline-none focus:ring-0"
                                required
                            >
                        </fieldset>
                    </div>


                    <button
                        type="submit"
                        class="w-full bg-blue-900 hover:bg-blue-800 text-white
                               font-semibold py-3 rounded-full transition"
                    >
                        Submit
                    </button>
                </form>

            </div>
        </div>
    </div>

</body>
</html>
