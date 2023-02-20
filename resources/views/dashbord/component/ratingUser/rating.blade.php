{{-- @dd($detailruangan) --}}
@extends('dashbord.layouts.main')
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
                            <th>gedung</th>
                            <th>user</th>
                            <th>Rating</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($detailruangan as $dr)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $dr->detailruangan->nama }}</td>
                            {{-- @dd($dr) --}}
                            <td>{{ $dr->user->name }}</td>
                            <td><i class="fa fa-star-half-o text-warning" aria-hidden="true"></i>
                                {{ $dr->rating }} / 5</td>
                            {{-- <td>Rp. {{ number_format ( $checkout->detailruangan->harga) }}</td> --}}
                             {{-- @if ($checkout->payment_status == '1')  --}}
                            {{-- <td>
                             <h5><span class="badge bg-success text-light">{{ $checkout->status_pembayaran }}</span></h5> 
                            </td> --}}
                            {{-- @else --}}
                           
                            {{-- <td>
                                <a href="/pesanan/dashbord/{{ $checkout->id }}" class="btn btn-primary btn-sm">Detail</a>
                            </td> --}}
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