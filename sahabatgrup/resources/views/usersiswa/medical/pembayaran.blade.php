@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 space-y-6">

    {{-- HEADER --}}
    <div class="bg-gradient-to-r from-blue-800 to-blue-600 text-white rounded-xl p-6 shadow">
        <h1 class="text-xl font-semibold">Pembayaran Medical</h1>
        <p class="text-sm text-blue-100 mt-1">
            Selesaikan pembayaran melalui payment gateway
        </p>
    </div>

    {{-- INFORMASI PEMBAYARAN --}}
    <div class="bg-white rounded-xl shadow-sm border p-5">
        <h2 class="text-blue-700 font-semibold mb-4">Informasi Pembayaran</h2>

        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Total Biaya Medical</p>
                <p class="text-2xl font-bold text-gray-800">
                    {{-- Jika $payment null, pakai nominal dari controller --}}
                    Rp {{ number_format($payment->amount ?? $nominal, 0, ',', '.') }}
                </p>
            </div>

            <span class="px-3 py-1 text-xs rounded 
                @if(isset($payment) && $payment->status == 'lunas') bg-green-100 text-green-700
                @elseif(isset($payment) && $payment->status == 'pending') bg-yellow-100 text-yellow-700
                @elseif(isset($payment) && $payment->status == 'gagal') bg-red-100 text-red-700
                @else bg-gray-100 text-gray-500
                @endif">
                @if(isset($payment) && $payment->status == 'lunas') Lunas
                @elseif(isset($payment) && $payment->status == 'pending') Menunggu Pembayaran
                @elseif(isset($payment) && $payment->status == 'gagal') Gagal
                @else Belum Ada Pembayaran
                @endif
            </span>
        </div>

        <p class="text-sm text-gray-500 mt-4">
            Pembayaran dilakukan melalui payment gateway resmi (sandbox).
        </p>
    </div>

    {{-- ACTION --}}
    <div class="bg-white rounded-xl shadow-sm border p-5">
        <button
            id="pay-button"
            class="w-full bg-blue-700 hover:bg-blue-800 text-white py-3 rounded-lg font-semibold transition">
            Bayar Sekarang
        </button>

        <p class="text-xs text-gray-500 text-center mt-3">
            Anda akan diarahkan ke halaman pembayaran resmi.
        </p>
    </div>

    {{-- NOTE --}}
    <div class="bg-blue-50 border border-blue-200 rounded p-4 text-sm text-blue-700">
        ℹ️ Setelah pembayaran berhasil, status akan diperbarui otomatis dan admin
        akan menjadwalkan medical.
    </div>

</div>

{{-- MIDTRANS SNAP --}}
<script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const payButton = document.getElementById('pay-button');

    payButton.addEventListener('click', function () {
        fetch("{{ route('user.medical.pembayaran.pay') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ 
                // Jika $payment belum ada, kirim null atau 0
                payment_id: {{ $payment->id ?? 'null' }}
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log("Response dari server:", data); 
            if (data.snap_token) {
                snap.pay(data.snap_token);
            } else if(data.error) {
                alert("Gagal generate Snap token: " + data.message);
            } else {
                alert("Terjadi kesalahan. Cek console.");
            }
        })
        .catch(err => console.error(err));
    });
});
</script>
@endsection
