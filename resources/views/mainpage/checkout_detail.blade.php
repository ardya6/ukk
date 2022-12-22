@extends('mainpage.layouts.main')

@section('container')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $checkout->detailruangan->foto) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="product_details_text">
                        @csrf
                        <h4>{{ $checkout->detailruangan->nama }}</h4>
                        <h6>{{ $checkout->detailruangan->alamat }}</h6>
                        <h5> Rp.{{ number_format($checkout->detailruangan->harga) }}</h5>
                        
                        <p>{{ $checkout->detailruangan->deskripsi }}</p>
                        <ul>
                            <li>fasilitas: <span>{{ $checkout->detailruangan->fasilitas }}</span></li>
                            <li>kapasitas: <span>{{ $checkout->detailruangan->kapasitas }}</span></li>
                            <li>luas: <span><p>{{ $checkout->detailruangan->luas }}</p></span></li>
                            <li>kategori: <span> <p>{{ $checkout->detailruangan->kategori->nama }}</p></span></li>
                        </ul>
                    </div>
                </div>
                <div class="row mt-5">
                    <h2 class="text-center">detail checkout</h2>
                    <div class="mx-auto col-lg-6">
                        <p>nama acara        : {{ $checkout->nama_acara }}</p>
                        <p>tanggal booking   : {{ $checkout->tanggal_booking }}</p>
                        <p>durasi sewa       : {{ $checkout->durasi_sewa }}</p>
                        <p>fasilitas tambahan: {{ $checkout->fasilitas_id }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection