<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-white flex items-center justify-center">

    <div class="w-full max-w-xl px-6 text-center">

        <!-- ICON -->
        <div class="flex justify-center mb-6">
            <img
                src="{{ asset('images/resetpassword.svg') }}"
                alt="Reset Password"
                class="w-48 h-48"

            >
        </div>

        <!-- TITLE -->
        <h1 class="text-3xl font-bold text-gray-800 mb-2">
            Reset Password
        </h1>
        <p class="text-gray-500 mb-10">
            Please set your new password
        </p>

        <!-- FORM -->
        <form action="{{ route('reset.password.submit') }}" method="POST" class="space-y-6">
            @csrf

            <!-- NEW PASSWORD -->
            <div class="text-left">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    New password
                </label>
                <input
                    type="password"
                    name="password"
                    placeholder="********"
                    class="w-full rounded-full border border-gray-300
                           px-6 py-4 text-gray-800
                           focus:outline-none focus:ring-2 focus:ring-blue-600"
                    required
                >
            </div>

            <!-- CONFIRM PASSWORD -->
            <div class="text-left">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Re-enter password
                </label>
                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="********"
                    class="w-full rounded-full border border-gray-300
                           px-6 py-4 text-gray-800
                           focus:outline-none focus:ring-2 focus:ring-blue-600"
                    required
                >
            </div>

            <!-- BUTTON -->
            <button
                type="submit"
                class="w-full mt-8 bg-blue-900 hover:bg-blue-800
                       text-white font-semibold py-4 rounded-full transition"
            >
                Reset Password
            </button>
        </form>

    </div>

</body>
</html>
