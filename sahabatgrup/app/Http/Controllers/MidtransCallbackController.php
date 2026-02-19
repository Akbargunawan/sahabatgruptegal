<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalPayment;

class MidtransCallbackController extends Controller
{
    public function handle(Request $request)
    {
        $payment = MedicalPayment::where('order_id', $request->order_id)->first();

        if (!$payment) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // STATUS BERHASIL
        if (in_array($request->transaction_status, ['settlement', 'capture'])) {
            $payment->update([
                'status' => 'lunas',
                'payment_type' => $request->payment_type,
            ]);
        }

        // STATUS GAGAL / EXPIRE
        if (in_array($request->transaction_status, ['expire', 'cancel', 'deny'])) {
            $payment->update([
                'status' => 'gagal',
            ]);
        }

        return response()->json(['status' => 'ok']);
    }
}

