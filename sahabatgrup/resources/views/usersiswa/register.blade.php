<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register | Sahabat Grup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
</head>
<body class="bg-white">

<div class="min-h-screen flex flex-col">

    <!-- HEADER LOGO -->
    <div class="px-20 pt-10">
        <img src="{{ asset('images/logoasli.png') }}" class="w-24" alt="Logo">
    </div>

    <!-- CONTENT -->
    <div class="flex-1 flex items-center justify-center px-20">

        <form
            action="{{ route('register.siswa.submit') }}"
            method="POST"
            enctype="multipart/form-data"
            class="w-full max-w-5xl"
        >
            @csrf

            <h1 class="text-3xl font-semibold mb-12 text-center">
                Sign up
            </h1>

            <div class="grid grid-cols-2 gap-x-16 gap-y-6">

                <!-- NAME -->
                <fieldset class="border border-gray-400 rounded-lg px-4 py-2">
                    <legend class="px-2 text-sm text-gray-600">Name *</legend>
                    <input type="text" name="name" required
                           placeholder="John Doe"
                           class="w-full border-none p-0 text-gray-800 focus:outline-none">
                </fieldset>

                <!-- KTP -->
                <div>
                    <label class="block text-sm font-semibold mb-1">KTP (ID Card) *</label>
                    <label class="h-14 bg-gray-300 rounded-lg flex items-center justify-center
                                  text-sm text-white cursor-pointer px-4">
                        <span class="truncate">Click or drag a file to this area to upload</span>
                        <input type="file" name="ktp" class="hidden" required
                               onchange="this.previousElementSibling.innerText = this.files[0].name">
                    </label>
                </div>

                <!-- EMAIL -->
                <fieldset class="border border-gray-400 rounded-lg px-4 py-2">
                    <legend class="px-2 text-sm text-gray-600">Email Address *</legend>
                    <input type="email" name="email" required
                           placeholder="john.doe@gmail.com"
                           class="w-full border-none p-0 text-gray-800 focus:outline-none">
                </fieldset>

                <!-- KARTU KELUARGA -->
                <div>
                    <label class="block text-sm font-semibold mb-1">Kartu Keluarga *</label>
                    <label class="h-14 bg-gray-300 rounded-lg flex items-center justify-center
                                  text-sm text-white cursor-pointer px-4">
                        <span class="truncate">Click or drag a file to this area to upload</span>
                        <input type="file" name="kartu_keluarga" class="hidden" required
                               onchange="this.previousElementSibling.innerText = this.files[0].name">
                    </label>
                </div>

                <!-- PASSWORD -->
                <fieldset class="border border-gray-400 rounded-lg px-4 py-2">
                    <legend class="px-2 text-sm text-gray-600">Password *</legend>
                    <input type="password" name="password" required
                           placeholder="••••••••"
                           class="w-full border-none p-0 text-gray-800 focus:outline-none">
                </fieldset>

                <!-- AKTA LAHIR -->
                <div>
                    <label class="block text-sm font-semibold mb-1">Akta Lahir *</label>
                    <label class="h-14 bg-gray-300 rounded-lg flex items-center justify-center
                                  text-sm text-white cursor-pointer px-4">
                        <span class="truncate">Click or drag a file to this area to upload</span>
                        <input type="file" name="akta_lahir" class="hidden" required
                               onchange="this.previousElementSibling.innerText = this.files[0].name">
                    </label>
                </div>

                <!-- PHONE -->
                <fieldset class="border border-gray-400 rounded-lg px-4 py-2">
                    <legend class="px-2 text-sm text-gray-600">Phone Number *</legend>
                    <input type="text" name="phone" required
                           placeholder="+62"
                           class="w-full border-none p-0 text-gray-800 focus:outline-none">
                </fieldset>

                <!-- KATEGORI KELAS -->
                <fieldset class="border border-gray-400 rounded-lg px-4 py-2">
                    <legend class="px-2 text-sm text-gray-600">Kategori Kelas *</legend>
                    <select name="kategori_kelas" required
                            class="w-full border-none p-0 bg-transparent text-gray-800 focus:outline-none">
                        <option value="" disabled selected>Pilih Kategori</option>
                        <option value="jepang">Jepang</option>
                        <option value="korea">Korea</option>
                    </select>
                </fieldset>

                <!-- IJAZAH -->
                <div>
                    <label class="block text-sm font-semibold mb-1">Ijazah Terakhir *</label>
                    <label class="h-14 bg-gray-300 rounded-lg flex items-center justify-center
                                  text-sm text-white cursor-pointer px-4">
                        <span class="truncate">Click or drag a file to this area to upload</span>
                        <input type="file" name="ijazah_terakhir" class="hidden" required
                               onchange="this.previousElementSibling.innerText = this.files[0].name">
                    </label>
                </div>

                <!-- BST -->
                <div>
                    <label class="block text-sm font-semibold mb-1">BST *</label>
                    <label class="h-14 bg-gray-300 rounded-lg flex items-center justify-center
                                  text-sm text-white cursor-pointer px-4">
                        <span class="truncate">Click or drag a file to this area to upload</span>
                        <input type="file" name="bst" class="hidden" required
                               onchange="this.previousElementSibling.innerText = this.files[0].name">
                    </label>
                </div>

                <!-- BUKU PELAUT -->
                <div>
                    <label class="block text-sm font-semibold mb-1">Buku Pelaut *</label>
                    <label class="h-14 bg-gray-300 rounded-lg flex items-center justify-center
                                  text-sm text-white cursor-pointer px-4">
                        <span class="truncate">Click or drag a file to this area to upload</span>
                        <input type="file" name="buku_pelaut" class="hidden" required
                               onchange="this.previousElementSibling.innerText = this.files[0].name">
                    </label>
                </div>

                <!-- PASPOR -->
                <div>
                    <label class="block text-sm font-semibold mb-1">Paspor *</label>
                    <label class="h-14 bg-gray-300 rounded-lg flex items-center justify-center
                                  text-sm text-white cursor-pointer px-4">
                        <span class="truncate">Click or drag a file to this area to upload</span>
                        <input type="file" name="paspor" class="hidden" required
                               onchange="this.previousElementSibling.innerText = this.files[0].name">
                    </label>
                </div>

                <!-- SERTIFIKAT -->
                <div>
                    <label class="block text-sm font-semibold mb-1">Sertifikat Lainnya</label>
                    <label class="h-14 bg-gray-300 rounded-lg flex items-center justify-center
                                  text-sm text-white cursor-pointer px-4">
                        <span class="truncate">Click or drag a file to this area to upload</span>
                        <input type="file" name="sertifikat_lainnya" class="hidden"
                               onchange="this.previousElementSibling.innerText = this.files[0].name">
                    </label>
                </div>

            </div>

            <!-- BUTTON -->
            <div class="mt-12 flex justify-center">
                <button type="submit"
                        class="w-80 bg-blue-900 text-white py-3 rounded-lg font-semibold
                               hover:bg-blue-800 transition">
                    Create account
                </button>
            </div>

            <!-- LOGIN -->
            <p class="text-center text-sm text-gray-600 mt-6">
                Already have an account?
                <a href="{{ route('login.siswa') }}" class="text-red-400 hover:underline">
                    Login
                </a>
            </p>

        </form>

    </div>

</div>

</body>
</html>
