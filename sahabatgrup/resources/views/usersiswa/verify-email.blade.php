<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify Email</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex">

    <!-- LEFT SIDE -->
    <div class="hidden md:flex w-1/2 bg-white items-center justify-center">
        <div class="text-center">
            <img
                src="{{ asset('images/otp.svg') }}"
                alt="Verify Email"
                class="mx-auto max-w-lg w-full"
            >
            <h2 class="mt-6 text-2xl font-semibold text-gray-800">
                Verify Your Email Address
            </h2>
        </div>
    </div>

    <!-- RIGHT SIDE -->
    <div class="w-full md:w-1/2 bg-blue-900 flex items-center justify-center px-6">
        <div class="w-full max-w-sm text-center text-white">

            <p class="text-sm mb-2">
                Masukkan kode yang <br>
                kami kirimkan ke
            </p>

            <p class="text-sm mb-8 font-semibold">
                123user***@gmail.com
            </p>

            <!-- OTP FORM -->
            <form action="{{ route('verify.email.submit') }}" method="POST">
                @csrf

                <div class="flex justify-center gap-4 mb-6">
                    @for ($i = 1; $i <= 4; $i++)
                        <input
                            type="text"
                            name="otp[]"
                            maxlength="1"
                            class="w-14 h-14 text-center text-xl font-bold
                                bg-white text-gray-800
                                border border-gray-300 rounded-lg
                                focus:outline-none focus:ring-2 focus:ring-blue-400"
                        >
                    @endfor
                </div>


                <p class="text-sm mb-8">
                    Didn't receive the OTP ?
                    <a href="#" class="text-red-400 hover:underline">
                        Resend
                    </a>
                </p>

                <button
                    type="submit"
                    class="w-full bg-indigo-500 hover:bg-indigo-400
                           text-white font-semibold py-3 rounded-full transition"
                >
                    Submit
                </button>
            </form>

        </div>
    </div>

</body>
</html>
