@extends('mainpage.layouts.main')

@section('container')
<div class="container-xxl py-5">
    <div class="container">
        <div class="card ">
            <div class="row g-5 align-items-center">
            
                <div class="col-lg-5 col-md-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $detail_ruangan->foto) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="product_details_text">
                        @csrf
                        <h4>{{ $detail_ruangan->nama }}</h4>
                        <h6>{{ $detail_ruangan->alamat }}</h6>
                        <h5> Rp.{{ number_format($detail_ruangan->harga) }}</h5>
                        
                        <p>{{ $detail_ruangan->deskripsi }}</p>
                        <div>
                            <p><b>fasilitas: </b><span>{{ $detail_ruangan->fasilitas }}</span>
                            <p><b>kapasitas: </b><span>{{ $detail_ruangan->kapasitas }}</span>
                            <p><b>luas: </b><span><p>{{ $detail_ruangan->luas }}</p></span>
                            <p><b>kategori: </b><span> <p>{{ $detail_ruangan->kategori->nama }}</p></span>
                        </div>
                    </div>
                </div>
            </div> 
        
            <div class="card">
                <div class="row mt-5 align-items-center text-center">

                    @error('unavailable')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                    <h2 class="text-center">Isi Form</h2>
                    <div class="mx-auto col-lg-6 col-md-6">
                        <form action="{{ url('/checkout/' . $detail_ruangan->id) }}" method="POST">
                            @csrf
                            {{-- <div class="form-group mb-3">
                                <input type="text" 
                                    class="form-control form-control-user @error('nama_penyewa') is-invalid @enderror"
                                    id="Nama penyewa" aria-describedby="emailHelp"
                                    placeholder="Nama penyewa" name="nama_penyewa" required
                                    value="{{ old('nama_penyewa') }}">
                                    @error('nama_penyewa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="form-group mb-3">
                                <input type="text" 
                                    class="form-control form-control-user @error('nama_acara') is-invalid @enderror"
                                    id="Nama Acara" aria-describedby="emailHelp"
                                    placeholder="Nama acara" name="nama_acara" required
                                    value="{{ old('nama_acara') }}" autocomplete="off">
                                    @error('nama_acara')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="date" 
                                    class="form-control form-control-user @error('tanggal_booking') is-invalid @enderror"
                                    id="tanggal_booking" aria-describedby="emailHelp"
                                    placeholder="Tanggal booking" name="tanggal_booking" required
                                    value="{{ old('tanggal_booking') }}"autocomplete="off">
                                    @error('tanggal_booking')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="number" min="1" max="{{ $detail_ruangan->durasi_sewa }}" 
                                    class="form-control form-control-user @error('durasi_sewa') is-invalid @enderror"
                                    id="Email" aria-describedby="emailHelp"
                                    placeholder="Durasi sewa" name="durasi_sewa" required
                                    value="{{ old('durasi_sewa') }}" autocomplete="off">
                                    @error('durasi_sewa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <h6>Pilih Fasilitas Tambahan</h6>
                                <ul>
                                    @foreach ($fasilitases as $fasilitas)
                                        <li class="mb-4">
                                            <label for="fasilitas-{{ $fasilitas->id }}" class="d-flex">
                                                <input type="checkbox" name="fasilitas_id[]" value="{{ $fasilitas->id }}" id="fasilitas-{{ $fasilitas->id }}">
                                                <div class="ms-2">
                                                    <span>{{ $fasilitas->nama_fasilitas }}</span>
                                                    <span>(Rp {{ number_format($fasilitas->harga, 0, ',', '.') }})</span>
                                                </div>
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary text-white">Sewa Sekarang</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>
@endsection
