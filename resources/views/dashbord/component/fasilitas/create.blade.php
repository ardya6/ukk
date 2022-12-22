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
                <div class="row">
                     <div class="col-md-6">
                        <form method="POST" action="/data-fasilitas">
                            @csrf
                            <div class="form-group">
                                <label>nama_fasilitas</label>
                                <input type="text" name="nama_fasilitas" class="form-control" placeholder="Text">
                            </div>
                            <div class="form-group">
                                <label>harga</label>
                                <input type="number" name="harga" class="form-control" placeholder="Text">
                            </div>
                            <button type="submit" class="btn  btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div> 
        </div> 
    </div>
 </div> 
</div> 
@endsection