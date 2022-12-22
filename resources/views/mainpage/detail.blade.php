@extends('mainpage.layouts.main')
@section('container')
        <!-- About Start -->
        <div class="container-xxl py-5">
             <div class="container">
                {{-- @if (session('success'))
                <div class="alert alert-success mb-3 col-lg-10" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger mb-3 col-lg-10" role="alert">
                    {{ session('error') }}
                </div>
                @endif  --}}
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $detail_ruangan->foto) }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <form action="{{ $detail_ruangan->id }}" method="POST" class="product_details_text">
                        @csrf
                        <h4>{{ $detail_ruangan->nama }}</h4>
                        <h6>{{ $detail_ruangan->alamat }}</h6>
                        <h5> Rp.{{ number_format($detail_ruangan->harga) }}</h5>
                        
                        <p>{{ $detail_ruangan->deskripsi }}</p>
                        <ul>
                            <li>fasilitas: <span>{{ $detail_ruangan->fasilitas }}</span></li>
                            <li>kapasitas: <span>{{ $detail_ruangan->kapasitas }}</span></li>
                            <li>luas: <span><p>{{ $detail_ruangan->luas }}</p></span></li>
                            <li>kategori: <span> <p>{{ $detail_ruangan->kategori->nama }}</p></span></li>
                        </ul>
                        @error('error')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <a class="btn btn-primary py-3 px-5 mt-3" href="/checkout/{{ $detail_ruangan->id }}">sewa</a>
                    </form>
                    </div>
                </div> 
            </div>
        </div>
        <!-- About End -->
@endsection
