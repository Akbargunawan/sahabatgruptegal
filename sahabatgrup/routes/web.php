<?php
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\CalonSiswaController;
use App\Http\Controllers\UserSiswaAuthController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Admin\Medical\DaftarPembayaranController;
use App\Http\Controllers\Admin\Medical\MedicalNominalController;
use App\Http\Controllers\MidtransCallbackController;
use App\Http\Controllers\User\MedicalPaymentController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| AUTH SISWA
|--------------------------------------------------------------------------
*/
Route::get('/login-siswa', [UserSiswaAuthController::class, 'loginForm'])
    ->name('login.siswa'); // pakai nama route ini


Route::post('/login-siswa', [UserSiswaAuthController::class, 'login'])
    ->name('login.siswa.submit');

Route::get('/register-siswa', function () {
    return view('usersiswa.register');
})->name('register.siswa');

Route::post('/register-siswa', [UserSiswaAuthController::class, 'register'])
    ->name('register.siswa.submit');

    // --------------------------------------------------------------------

Route::get('/forgot-password', function () {
    return view('usersiswa.forgotpassword');
})->name('forgot.password');

/*
|--------------------------------------------------------------------------
| FORGOT PASSWORD
|--------------------------------------------------------------------------
*/
Route::get('/forgot-password', function () {
    return view('usersiswa.forgotpassword');
})->name('forgot.password');

Route::post('/forgot-password', function () {
    return redirect()->route('verify.email');
})->name('forgot.password.submit');


/*
|--------------------------------------------------------------------------
| VERIFY EMAIL / OTP
|--------------------------------------------------------------------------
*/
Route::get('/verify-email', function () {
    return view('usersiswa.verify-email');
})->name('verify.email');

Route::post('/verify-email', function () {
    return redirect()->route('reset.password');
})->name('verify.email.submit');


/*
|--------------------------------------------------------------------------
| RESET PASSWORD
|--------------------------------------------------------------------------
*/
Route::get('/reset-password', function () {
    return view('usersiswa.reset-password');
})->name('reset.password');

Route::post('/reset-password', function () {
    // dummy sukses
    return redirect('/login')
        ->with('success', 'Password berhasil direset (dummy)');
})->name('reset.password.submit');

// Dashboard siswa
Route::middleware('siswa.auth')->group(function () {
    Route::get('/user/dashboard', [DashboardController::class, 'index'])
        ->name('user.dashboard');
});

// MEDICAL
// MEDICAL PAYMENT
Route::middleware('siswa.auth')->group(function () {
    Route::get('/siswa/medical/pembayaran', [MedicalPaymentController::class, 'index'])
        ->name('user.medical.pembayaran');

    Route::post('/siswa/medical/pembayaran/pay', [MedicalPaymentController::class, 'pay'])
        ->name('user.medical.pembayaran.pay');
});


Route::post('/midtrans/callback', [MidtransCallbackController::class, 'handle']);

// JADWAL MEDICAL
Route::get('/siswa/medical/jadwal', function () {
    return view('usersiswa.medical.jadwal');
})->name('user.medical.jadwal');

// HASIL MEDICAL
Route::get('/siswa/medical/hasil', function () {
    return view('usersiswa.medical.hasil');
})->name('user.medical.hasil');



// Jadwal Kelas
Route::get('/siswa/jadwal-kelas', function () {
    return view('usersiswa.jadwal-kelas');
})->name('user.jadwal-kelas');


// Pengaturan
Route::get('/siswa/pengaturan', function () {
    return view('usersiswa.pengaturan');
})->name('user.pengaturan');


// ADMIN ROUTES/////////////////////////////////////////////////////////////////
// KELAS 
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('kelas', KelasController::class)
        ->only(['index', 'create', 'store']);
});

Route::prefix('admin')->group(function () {

    // Atur Jadwal Kelas
    Route::get('/kelas/atur-jadwal', function () {
        return view('admin.kelas.atur-jadwal');
    })->name('admin.kelas.atur-jadwal');

});


// CALON SISWA
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/calon-siswa', [CalonSiswaController::class, 'index'])
        ->name('calon-siswa.index');

    Route::get('/calon-siswa/{id}', [CalonSiswaController::class, 'show'])
        ->name('calon-siswa.show');

    Route::post('/calon-siswa/{id}/terima', [CalonSiswaController::class, 'terima'])
        ->name('calon-siswa.terima');

    Route::post('/calon-siswa/{id}/tolak', [CalonSiswaController::class, 'tolak'])
        ->name('calon-siswa.tolak');

    // ✅ TAMBAHKAN INI
    Route::delete('/calon-siswa/{id}', [CalonSiswaController::class, 'destroy'])
        ->name('calon-siswa.destroy');
});


/*
|--------------------------------------------------------------------------
| ADMIN - MEDICAL
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('medical')->name('medical.')->group(function () {

        // 📄 Daftar Pembayaran Medical
        Route::get('/daftar-pembayaran', 
            [DaftarPembayaranController::class, 'index']
        )->name('daftar-pembayaran');

        // MARK AS PAID / LUNASKAN
        Route::post('/daftar-pembayaran/lunaskan/{id}', 
            [DaftarPembayaranController::class, 'lunaskanPayment']
        )->name('daftar-pembayaran.lunaskan');

        // 💰 Atur Nominal Medical
        Route::get('/atur-nominal', 
            [MedicalNominalController::class, 'index']
        )->name('atur-nominal');

        Route::post('/atur-nominal', 
            [MedicalNominalController::class, 'store']
        )->name('atur-nominal.store');

    });
});


