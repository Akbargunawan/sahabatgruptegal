<!-- sidebar.blade.php -->
<aside class="w-72 min-h-screen bg-white border-r border-[#D1D1D1] flex flex-col justify-between">

    <!-- TOP -->
    <div>
        <!-- LOGO -->
        <div class="flex flex-col items-center py-6">
            <img src="{{ asset('images/logoasli.png') }}" class="w-24 mb-2" alt="Logo">
        </div>

        <!-- GARIS -->
        <hr class="mx-6 mb-4 border-t border-[#D1D1D1]">

        <!-- MENU -->
        <nav class="px-14 space-y-2 text-sm">

            <!-- DASHBOARD -->
            <a href="{{ route('user.dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-none
               {{ request()->routeIs('user.dashboard') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                
               <img src="{{ asset('images/menu-dahsboard.svg') }}"
                    class="w-5 h-5"
                    alt="Dashboard">
                Dashboard
            </a>

           <!-- MEDICAL DROPDOWN -->
            <div 
                x-data="{ open: {{ request()->routeIs('user.medical.*') ? 'true' : 'false' }} }"
                class="relative"
            >
                <button 
                    @click="open = !open"
                    class="flex items-center justify-between w-full gap-3 px-4 py-3 rounded-none
                    {{ request()->routeIs('user.medical.*') 
                        ? 'bg-blue-100 text-blue-700 font-semibold' 
                        : 'text-gray-700 hover:bg-gray-100' }}"
                >
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/menu-medical.svg') }}"
                            class="w-5 h-5"
                            alt="Medical">
                        Medical
                    </div>

                    <svg 
                        :class="{'rotate-90': open}" 
                        class="w-4 h-4 transition-transform"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <!-- DROPDOWN -->
                <div 
                    x-show="open" 
                    x-transition
                    class="mt-1 ml-8 flex flex-col space-y-1"
                >
                    <a href="{{ route('user.medical.pembayaran') }}"
                    class="px-4 py-2 rounded
                    {{ request()->routeIs('user.medical.pembayaran') 
                        ? 'bg-blue-50 text-blue-700 font-semibold' 
                        : 'text-gray-700 hover:bg-gray-100' }}">
                        Pembayaran
                    </a>

                    <a href="{{ route('user.medical.jadwal') }}"
                    class="px-4 py-2 rounded
                    {{ request()->routeIs('user.medical.jadwal') 
                        ? 'bg-blue-50 text-blue-700 font-semibold' 
                        : 'text-gray-700 hover:bg-gray-100' }}">
                        Jadwal
                    </a>

                    <a href="{{ route('user.medical.hasil') }}"
                    class="px-4 py-2 rounded
                    {{ request()->routeIs('user.medical.hasil') 
                        ? 'bg-blue-50 text-blue-700 font-semibold' 
                        : 'text-gray-700 hover:bg-gray-100' }}">
                        Hasil
                    </a>
                </div>
            </div>

            <!-- JADWAL KELAS -->
            <a href="{{ route('user.jadwal-kelas') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-none hover:bg-gray-100
               {{ request()->routeIs('user.jadwal-kelas') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                <img src="{{ asset('images/menu-jadwal-kelas.svg') }}"
                    class="w-5 h-5"
                    alt="Jadwal kelas">
                Jadwal kelas
            </a>

            <!-- TES AGENCY -->
            <a href=""
               class="flex items-center gap-3 px-4 py-3 rounded-none hover:bg-gray-100">
                <img src="{{ asset('images/menu-agency.svg') }}"
                    class="w-5 h-5"
                    alt="Tes agency">
                Tes agency
            </a>

            <!-- PEMBERANGKATAN -->
            <a href=""
               class="flex items-center gap-3 px-4 py-3 rounded-none hover:bg-gray-100">
                <img src="{{ asset('images/menu-pemberangkatan.svg') }}"
                    class="w-5 h-5"
                    alt="Pemberangkatan">
                Pemberangkatan
            </a>

            <!-- PENGATURAN -->
            <a href="{{ route('user.pengaturan') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-none hover:bg-gray-100
               {{ request()->routeIs('user.pengaturan') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                <img src="{{ asset('images/menu-pengaturan.svg') }}"
                    class="w-5 h-5"
                    alt="Pengaturan">
                Pengaturan
            </a>

        </nav>
    </div>

    <!-- LOGOUT -->
    <div class="p-6">
        <form method="POST" action="">
            @csrf
            <button
                 class="w-36 mx-auto flex items-center justify-center gap-2
                        bg-[#043873] hover:bg-blue-800
                        text-white py-3 rounded-2xl text-sm transition">

                <img src="{{ asset('images/log-out.svg') }}"
                    class="w-4 h-4"
                    alt="Logout">

                Log Out
            </button>
        </form>
    </div>

</aside>

<!-- Tambahkan Alpine.js di layout utama sebelum </body> -->

