@extends('mainpage.layouts.main')

@section('container')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="card">
                        {{-- <div class="col-lg-3wow fadeIn" data-wow-delay="0.1s">
                            <div class="about-img position-relative overflow-hidden p-5 pe-0">
                                <img class="img-fluid w-100" src="{{ asset('storage/' . $checkout->detailruangan->foto) }}" alt="">
                            </div>
                        </div> --}}
                        <div class="wow fadeIn" data-wow-delay="0.5s">
                            
                                <div class="product_details_text">
                                    @csrf
                                    <h4>{{ $checkout->detailruangan->nama }}</h4>
                                    <h6>{{ $checkout->detailruangan->alamat }}</h6>
                                    <h5> Rp.{{ number_format($checkout->detailruangan->harga) }} x {{ $checkout->durasi_sewa }} hari</h5>
                                    
                                    <p>{{ $checkout->detailruangan->deskripsi }}</p>
                                    <ul>
                                        <li>fasilitas: <span>{{ $checkout->detailruangan->fasilitas }}</span></li>
                                        <li>kapasitas: <span>{{ $checkout->detailruangan->kapasitas }}</span></li>
                                        <li>luas: <span><p>{{ $checkout->detailruangan->luas }}</p></span></li>
                                        <li>kategori: <span> <p>{{ $checkout->detailruangan->kategori->nama }}</p></span></li>
                                    </ul>
                                    
                                </div>
                            
                        </div>
                    </div>
                </div>    
                <div class="col-lg-8 mt-5 align-item-center ">
                    <h2 class="text-center">detail checkout</h2>
                    <div class="mx-auto col-lg-6">
                        <p><b>nama acara        </b>: {{ $checkout->nama_acara }}</p>
                        <p><b>tanggal booking   </b>: {{ $checkout->tanggal_booking }} sampai {{ $checkout->selesai_booking }}</p>
                        <p><b>durasi sewa       </b>: {{ $checkout->durasi_sewa }}</p>
                        <p><b>fasilitas tambahan</b>: </p>
                        <ul>
                            @foreach ($checkout->fasilitases as $fas)
                                <li>{{ $fas->nama_fasilitas }} (Rp. {{ number_format($fas->harga, 0, ',', '') }} x {{ $checkout->durasi_sewa }} hari)</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="align-item-center text-center">
                    <h3 >Total Harga: Rp. {{ number_format($checkout->total_harga, 0, ',', '.') }}</h3>
                        @if ($checkout->status_pembayaran == 'Belum Dibayar')
                            <button class="btn btn-primary" id="pay-button">Bayar Sekarang</button>
                        @elseif ($checkout->status_pembayaran == 'Pembayaran Berhasil')
                            <h6>Pembayaran Berhasil</h6>
                        @elseif ($checkout->status_pembayaran == 'Pembayaran Gagal')
                            <h6>Pembayaran Gagal</h6>
                        @endif
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
</script>
<script>
    const payButton = document.querySelector('#pay-button');
    payButton.addEventListener('click', function(e) {
        e.preventDefault();

        snap.pay('{{ $checkout->snap_token }}', {
            // Optional
            onSuccess: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
                window.location.reload();
            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
                window.location.reload();
            }
        });
    });
</script>
@endsection