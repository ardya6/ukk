<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Services\Midtrans\CallbackService;

class PaymentCallbackController extends Controller
{
    public function receive()
    {
        $callback = new CallbackService;

        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();
            $checkout = $callback->getCheckout();

            if ($callback->isSuccess()) {
                Checkout::where('id', $checkout->id)->update([
                    'status_pembayaran' => 'Pembayaran Berhasil',
                ]);
            }

            if ($callback->isExpire()) {
                Checkout::where('id', $checkout->id)->update([
                    'status_pembayaran' => 'Pembayaran Gagal',
                ]);
            }

            if ($callback->isCancelled()) {
                Checkout::where('id', $checkout->id)->update([
                    'status_pembayaran' => 'Pembayaran Gagal',
                ]);
            }

            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notification successfully processed',
                ]);
        } else {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key not verified',
                ], 403);
        }
    }
}