@extends('dashbord.layouts.main')
@section ('container')
  <!-- [ stiped-table ] start -->
<div class="container">
  <div class="col-lg-12 grid-margin">
    @if (session('berhasil'))
    @endif
    <div class="card">
        <div class="card-header">
            <a href="/data-detail_ruangan/create" class="btn btn-outline-primary mb-3">tambah data</a>
            {{-- <h5>Basic Table</h5>
            <span class="d-block m-t-5">use class <code>table</code> inside table element</span> --}}
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>

                            <th>No</th>
                            <th>foto</th>
                            <th>harga</th>
                            <th>nama</th>
                            <th>alamat</th>
                            <th>kapasitas</th>
                            <th>fasilitas</th>
                            <th>luas</th>
                            <th>kategori ruangan</th>
                            {{-- <th>deskripsi</th> --}}
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail_ruangans as $i=>$dp)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td><img src="{{ asset("storage/$dp->foto") }}" class="img-fluid" alt=""></td>
                            <td>{{ $dp->harga }}</td>
                            <td>{{ $dp->nama }}</td>
                            <td>{{ $dp->alamat }}</td>
                            <td>{{ $dp->kapasitas }}</td>
                            <td>{{ $dp->fasilitas }}</td>
                            <td>{{ $dp->luas }}</td>
                            <td>{{ $dp->kategori->nama }}</td>
                            {{-- <td>{{ $dp->deskripsi }}</td> --}}
                            <td>
                                <div class="d-flex justify-content-center">
                                    <form action="/data-detail_ruangan4er/{{ $dp->id }}" method="POST">
                                    @method('delete')
                                    @csrf
                                     <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                                    </form>
                                    <a href="/data-detail_ruangan/{{ $dp->id }}/edit" class="btn btn-sm btn-primary">edit</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>
<!-- [ stiped-table ] end -->
@endsection