@extends('dashbord.layouts.main')
@section ('container')
  <!-- [ stiped-table ] start -->
<div class="container">
  <div class="col-lg-12 grid-margin">
    @if (session('berhasil'))
    @endif
    <div class="card">
        <div class="card-header">
            <a href="/data-kategori/create" class="btn btn-outline-primary mb-3">tambah data</a>
            
            <span class="d-block m-t-5">use class <code>table</code> inside table element</span>
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>nama</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategoris as $i=>$kategori)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $kategori->nama}}</td>
                            <td>
                                <div>
                                    <form action="/data-kategori/{{ $kategori->id }}" method="POST">
                                    @method('delete')
                                    @csrf
                                     <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                                    </form>
                                    <a href="/data-kategori/{{ $kategori->id }}/edit" class="btn btn-sm btn-primary">edit</a>
                                    <a href="/data-kategori/list/{{ $kategori->id }}" class="btn btn-warning btn-sm">List</a>
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