{{-- @dd($checkouts) --}}
@extends('mainpage.layouts.main')
@section ('container')
  <!-- [ stiped-table ] start -->
<div class="container">
  <div class="col-lg-12 grid-margin">
    @if (session('berhasil'))
    @endif
    <div class="card">
        <div class="card-header">
            
        </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th>#</th>
                            <th>nama penyewa</th>
                            <th>gedung</th>
                            <th>tanggal sewa</th>
                            <th>total harga</th>
                            <th>status</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($checkouts as $checkout)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $checkout->user->name}}</td>
                            <td>{{ $checkout->detailruangan->nama }}</td>
                            <td>{{ $checkout->tanggal_booking }}</td>
                            <td>Rp. {{ number_format ( $checkout->total_harga) }}</td>
                             {{-- @if ($checkout->payment_status == '1')  --}}
                            <td>
                             <h5><span class="badge bg-warning text">{{ $checkout->status_pembayaran }}</span></h5> 
                            </td>
                            {{-- @else  --}}
                           
                            <td>
                                <a href="/checkout/{{ $checkout->id }}/detail/" class="btn btn-primary btn-sm">Detail</a>
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