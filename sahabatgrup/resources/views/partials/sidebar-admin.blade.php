<aside class="w-64 bg-[#1C212F] text-white min-h-screen flex flex-col">

    {{-- Logo --}}
    <div class="flex flex-col items-center py-6 border-b border-white/10">
        <img src="/images/icons-admin/logo admin.svg" class="w-12 mb-2">
        <span class="text-sm text-gray-300">Admin Panel</span>
    </div>

    {{-- Menu --}}
    <nav class="flex-1 px-4 py-6 space-y-2 text-sm">

        {{-- Dashboard --}}
        <a href="/admin/dashboard"
           class="flex items-center gap-3 px-3 py-2 rounded transition
           {{ request()->is('admin/dashboard') ? 'bg-white/10 shadow-lg ring-1 ring-white/20' : 'hover:bg-white/10' }}">
            <img src="/images/icons-admin/dashboard.svg" class="w-5 h-5">
            Dashboard
        </a>

        {{-- Artikel --}}
        <a href="/admin/artikel"
           class="flex items-center gap-3 px-3 py-2 rounded transition
           {{ request()->is('admin/artikel') ? 'bg-white/10 shadow-lg ring-1 ring-white/20' : 'hover:bg-white/10' }}">
            <img src="/images/icons-admin/artikel.svg" class="w-5 h-5">
            Artikel
        </a>

        {{-- Calon Siswa --}}
        <a href="/admin/calon-siswa"
           class="flex items-center gap-3 px-3 py-2 rounded transition
           {{ request()->is('admin/calon-siswa') ? 'bg-white/10 shadow-lg ring-1 ring-white/20' : 'hover:bg-white/10' }}">
            <img src="/images/icons-admin/calonsiswa.svg" class="w-5 h-5">
            Calon Siswa
        </a>

        {{-- Kelas --}}
        <a href="/admin/kelas"
           class="flex items-center gap-3 px-3 py-2 rounded transition
           {{ request()->is('admin/kelas') ? 'bg-white/10 shadow-lg ring-1 ring-white/20' : 'hover:bg-white/10' }}">
            <img src="/images/icons-admin/kelas.svg" class="w-5 h-5">
            Kelas
        </a>

        {{-- MEDICAL DROPDOWN --}}
        <div 
            x-data="{ open: {{ request()->is('admin/medical*') ? 'true' : 'false' }} }"
            class="space-y-1"
        >
            <!-- TOGGLE -->
            <button
                @click="open = !open"
                class="w-full flex items-center justify-between px-3 py-2 rounded transition
                {{ request()->is('admin/medical*') ? 'bg-white/10 shadow-lg ring-1 ring-white/20' : 'hover:bg-white/10' }}"
            >
                <div class="flex items-center gap-3">
                    <img src="/images/icons-admin/medical.svg" class="w-5 h-5">
                    <span>Medical</span>
                </div>

                <svg
                    :class="{ 'rotate-90': open }"
                    class="w-4 h-4 transition-transform"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <!-- DROPDOWN MENU -->
            <div
                x-show="open"
                x-transition
                class="ml-6 flex flex-col space-y-1 text-sm"
            >
                <a href="/admin/medical/daftar-pembayaran"
                class="px-3 py-2 rounded transition
                {{ request()->is('admin/medical/daftar-pembayaran') ? 'bg-white/10' : 'hover:bg-white/10' }}">
                    Daftar Pembayaran
                </a>

                <a href="/admin/medical/atur-nominal"
                class="px-3 py-2 rounded transition
                {{ request()->is('admin/medical/atur-nominal') ? 'bg-white/10' : 'hover:bg-white/10' }}">
                    Atur Nominal
                </a>

                <a href="/admin/medical/upload-jadwal"
                class="px-3 py-2 rounded transition
                {{ request()->is('admin/medical/upload-jadwal') ? 'bg-white/10' : 'hover:bg-white/10' }}">
                    Upload Jadwal Medical
                </a>

                <a href="/admin/medical/upload-hasil"
                class="px-3 py-2 rounded transition
                {{ request()->is('admin/medical/upload-hasil') ? 'bg-white/10' : 'hover:bg-white/10' }}">
                    Upload Hasil Medical
                </a>
            </div>
        </div>


        {{-- Tes Agency --}}
        <a href="/admin/tes"
           class="flex items-center gap-3 px-3 py-2 rounded transition
           {{ request()->is('admin/tes') ? 'bg-white/10 shadow-lg ring-1 ring-white/20' : 'hover:bg-white/10' }}">
            <img src="/images/icons-admin/agency.svg" class="w-5 h-5">
            Tes Agency
        </a>

        {{-- Pemberangkatan --}}
        <a href="/admin/pemberangkatan"
           class="flex items-center gap-3 px-3 py-2 rounded transition
           {{ request()->is('admin/pemberangkatan') ? 'bg-white/10 shadow-lg ring-1 ring-white/20' : 'hover:bg-white/10' }}">
            <img src="/images/icons-admin/pemberangkatan.svg" class="w-5 h-5">
            Pemberangkatan
        </a>

    </nav>

    {{-- Logout --}}
    <div class="p-4 border-t border-white/10">
        <button
            class="w-full flex items-center justify-center gap-2 py-2 bg-white/10 rounded hover:bg-white/20 transition">
            Log Out
        </button>
    </div>

</aside>
