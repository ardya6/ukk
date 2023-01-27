@extends('dashbord.layouts.main')
@section ('container')
@if(session('berhasil'))
    <div class="alert alert-success mb-3 col-lg-10">{{ session('berhasil') }}</div>
    @endif

    <!-- [ stiped-table ] start -->
    {{-- <a href="javascript:history.back()" class="btn btn-danger mb-4"><i class="fa fa-chevron-left" aria-hidden="true"><i>kembali</a> --}}
   <div class="card shadow mb-4">
    {{-- <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">detail pemesanan</h5>
    </div> --}}
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">
                        <h3 class="text-center">kontak penyewa</h3>
                    </div>
                    <div class="card-body">
                        <h5>Nama penyewa :<p>{{ $checkout->user->name }}</p></h5>
                        <h5>No telpon :<p>{{ $checkout->user->notelp }}</p></h5>
                        <h5>email : <p>{{ $checkout->user->email }}</p></h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-details">
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                      
                                       <th class="nama-gedung">gedung</th>
                                       <th class="harga">harga</th>
                                       <th class="nama-acara">nama acara</th>
                                       <th class="durasi-sewa">durasi sewa</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td>{{ $checkout->detailruangan->nama }}</td>
                                        <td>{{ $checkout->total_harga }}</td>
                                        <td>{{ $checkout->nama_acara }}</td>
                                        <td>{{ $checkout->durasi_sewa }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>


@endsection