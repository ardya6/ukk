@extends('dashbord.layouts.main')
@section ('container')
  <!-- [ stiped-table ] start -->
<div class="container">
  <div class="col-lg-12 grid-margin">
    @if (session('berhasil'))
    @endif
    <div class="card">
        <div class="card-header">
            <a href="/data-fasilitas/create" class="btn btn-outline-primary mb-3">tambah data</a>
            {{-- <h5>Basic Table</h5>
            <span class="d-block m-t-5">use class <code>table</code> inside table element</span> --}}
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>nama</th>
                            <th>harga</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fasilitas as $i=>$fasilitas)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $fasilitas->nama_fasilitas}}</td>
                            <td>{{ $fasilitas->harga}}</td>
                            <td>
                                <div>
                                    <form action="/data-fasilitas/{{ $fasilitas->id }}" method="POST">
                                    @method('delete')
                                    @csrf
                                     <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                                    </form>
                                    <a href="/data-fasilitas/{{ $fasilitas->id }}/edit" class="btn btn-sm btn-primary">edit</a>
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