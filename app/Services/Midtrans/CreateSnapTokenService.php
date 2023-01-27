<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $checkout;

    public function __construct($checkout)
    {
        parent::__construct();

        $this->checkout = $checkout;
    }

    public function getSnapToken()
    {
        $item_detail = [
            [
                'id' => $this->checkout->id,
                'price' => $this->checkout->detailruangan->harga,
                'quantity' => $this->checkout->durasi_sewa,
                'name' => $this->checkout->detailruangan->nama,
            ]
        ];

        foreach ($this->checkout->fasilitases as $fas) {
            $item_detail[] = [
                'id' => $fas->id,
                'price' => $fas->harga,
                'quantity' => $this->checkout->durasi_sewa,
                'name' => $fas->nama_fasilitas,
            ];
        }
        $params = [
            'transaction_details' => [
                'order_id' => $this->checkout->order,
                'gross_amount' => $this->checkout->total_harga,
            ],
            'item_details' => $item_detail,
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}