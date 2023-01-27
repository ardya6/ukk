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
                <h5 class="card-title">tambah data</h5>
                <form action="/data-detail_ruangan" method="post" enctype="multipart/form-data">
                    @csrf
                <hr>
                <div class="row">
                     <div class="col-md-6">
                            <div class="mb-3">
                                <label for="foto" class="form-label">foto</label>
                                <input type="file" class="form-control" name="foto" id="foto">
                            </div>
                            <div class="form-group">
                                <label>harga</label>
                                <input type="text" class="form-control" placeholder="harga" name="harga" >
                            </div>
                            <div class="form-group">
                                <label>nama</label>
                                <input type="text" class="form-control" placeholder="nama" name="nama" >
                            </div>
                            <div class="form-group">
                                <label>alamat</label>
                                <input type="text" class="form-control" placeholder="alamat" name="alamat" >
                            </div>
                            <div class="form-group">
                                <label>kapasitas</label>
                                <input type="text" class="form-control" placeholder="kapasitas" name="kapasitas" >
                            </div>
                            <div class="form-group">
                                <label>fasilitas</label>
                                <input type="text" class="form-control" placeholder="fasilitas" name="fasilitas">
                            </div>
                            <div class="form-group">
                                <label>luas</label>
                                <input type="text" class="form-control" placeholder="luas" name="luas" >
                            </div>
                            <div class="form-group">
                                <label for="kategori">jenis ruangan</label>
                                <select class="form-control" id="kategori_id" name="kategori_id">
                                    @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">deskripsi</label>
                               <input type="text" class="form-control" name="deskripsi" id="deskripsi"> 
                            </div>
                            <button type="submit" class="btn  btn-primary">Submit</button>
                    </div>
                </div>
                </form>
            </div> 
        </div> 
    </div>
 </div> 
</div> 
@endsection