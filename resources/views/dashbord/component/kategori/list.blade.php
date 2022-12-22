@extends('dashbord.layouts.main')
@section ('container')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title">Data {{ $kategori->nama }}</h4>
            <div class="table-reponsive">
                <table class="table table-bordered text-darkt">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>foto</th>
                            <th>harga</th>
                            <th>kapasitas</th>
                            <th>fasilitas</th>
                            <th>luas</th>
                            <th>jenisruangan</th>
                            <th>deskripsi</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Detail_ruangan as $i=>$detail_ruangan)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td><img src="{{ asset("storage/$detail_ruangan->foto") }}" class="img-fluid" alt=""></td>
                            <td>{{ $detail_ruangan->harga }}</td>
                            <td>{{ $detail_ruangan->kapasitas }}</td>
                            <td>{{ $detail_ruangan->fasilitas }}</td>
                            <td>{{ $detail_ruangan->luas }}</td>
                            <td>{{$detail_ruangan->kategori->nama }}</td>
                            <td>{{$detail_ruangan->deskripsi }}</td>
                            <td>
                             <div class="row d-flex justify-content-around">
                                <form action="/data-kategori/{{ $kategori->id }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                                </form>
                                <a href="/data-detail_ruangan/{{ $detail_ruangan->id }}/edit" class="btn btn-success btn-sm">edit</a>

                             </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                <table>
            </div>
        </div>
    </div>
</div>
@endsection