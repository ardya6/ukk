@extends('mainpage.layouts.main')

@section('container')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
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
                    <ul>
                        <li>fasilitas: <span>{{ $detail_ruangan->fasilitas }}</span></li>
                        <li>kapasitas: <span>{{ $detail_ruangan->kapasitas }}</span></li>
                        <li>luas: <span><p>{{ $detail_ruangan->luas }}</p></span></li>
                        <li>kategori: <span> <p>{{ $detail_ruangan->kategori->nama }}</p></span></li>
                    </ul>
                </div>
            </div>
            <div class="row mt-5">
                <h2 class="text-center">Isi Form</h2>
                <div class="mx-auto col-lg-6">
                    <form action="{{ url('/checkout/' . $detail_ruangan->id) }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" 
                                class="form-control form-control-user @error('nama_acara') is-invalid @enderror"
                                id="Nama Acara" aria-describedby="emailHelp"
                                placeholder="Nama acara" name="nama_acara" required
                                value="{{ old('nama_acara') }}">
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
                                value="{{ old('tanggal_booking') }}">
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
                                value="{{ old('durasi_sewa') }}">
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
                            <button type="submit" class="btn btn-lg btn-primary text-white">Sewa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
   </div>
</div>
@endsection
