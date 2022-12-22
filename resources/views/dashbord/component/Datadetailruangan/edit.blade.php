@extends('dashbord.layouts.main')
@section ('container')
<div class="container mt-5"></div>
 <!-- [ Main Content ] start -->
 <div class="row">
    <!-- [ form-element ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                
            </div>
            <div class="card-body">
                <h5 class="card-title">edit</h5>
                <hr>
                <div class="row">
                     <div class="col-md-6">
                        <form action="/data-detail_ruangan/{{ $detail_ruangan->id }}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="foto" class="form-label">foto</label>
                                @if ($detail_ruangan->foto)
                                    <img src="{{ asset('storage/' . $detail_ruangan->foto) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                                @else
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                @endif
                                <input type="file" class="form-control" name="foto" id="foto">
                            </div>
                            <div class="form-group">
                                <label>harga</label>
                                <input type="text" class="form-control" name="harga" value="{{ $detail_ruangan->harga }}">
                            </div>
                            <div class="form-group">
                                <label>nama</label>
                                <input type="text" class="form-control" name="nama" value="{{ $detail_ruangan->nama }}">
                            </div>
                            <div class="form-group">
                                <label>alamat</label>
                                <input type="text" class="form-control" name="alamat" value="{{ $detail_ruangan->alamat}}">
                            </div>
                            <div class="form-group">
                                <label>kapasitas</label>
                                <input type="text" class="form-control" name="kapasitas" value="{{ $detail_ruangan->kapasitas }}">
                            </div>
                            <div class="form-group">
                                <label>fasilitas</label>
                                <input type="text" class="form-control" name="fasilitas" value="{{ $detail_ruangan->fasilitas }}">
                            </div>
                            <div class="form-group">
                                <label>luas</label>
                                <input type="text" class="form-control" name="luas" value="{{ $detail_ruangan->luas }}">
                            </div>
                            <div class="form-group">
                                <label for="kategori">jenis ruangan</label>
                                <select class="form-select form-select-lg mb-3" name="kategori_id" aria-label=".form-select-lg example">
                                    <option selected>Jenis Ruangan</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}" selected="{{ $kategori->id == $detail_ruangan->kategori_id ? 'selected' : 'false' }}">{{ $kategori->nama }}</option>
                                    @endforeach
                                  </select> 
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">deskripsi</label>
                                <input class="form-control" id="deskripsi" rows="3" name="deskripsi" value="{{ $detail_ruangan->deskripsi }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div> 
        </div> 
    </div>
 </div> 
</div> 
@endsection