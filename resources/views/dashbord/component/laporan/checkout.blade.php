
<h1 class="align-items-center text-center">laporan pemesanan</h1>
<h3 class="align-items-center text-center">periode bulan {{ $data['bulan'] }}{{ $data['tahun'] }}</h3>
<table border="2" cellspacing="0" cellpadding="7">
    <thead>
        <tr>
            <th>User</th>
            <th>no.telp</th>
            <th>email</th>
            <th>gedung</th>
            <th>tanggal booking</th>
            <th>tambahan</th>
            <th>total harga</th>
            {{-- <th>status</th> --}}
        </tr>
    </thead>
    <tbody> 
        @php
            $total = 0;
        @endphp
        @foreach ($checkouts as $checkout)
            <tr>
                <td>{{ $checkout->user->name }}</td>
                <td>{{ $checkout->user->notelp }}</td>
                <td>{{ $checkout->user->email }}</td>
                <td>{{ $checkout->detailruangan->nama }}</td>
                <td>{{ $checkout->tanggal_booking }} sampai {{ $checkout->selesai_booking }}</td>
                <td>
                    <ul>
                        @foreach ($checkout->fasilitases as $fasilitas)
                            <li>{{ $fasilitas->nama_fasilitas }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>Rp. {{ number_format ( $checkout->total_harga ) }}</td>
                {{-- <td>
                    <h5><span class="badge bg-warning text-light">{{ $checkout->status_pembayaran }}</span></h5> 
                </td> --}}
            </tr>
            @php
                $total += $checkout->total_harga
            @endphp
        @endforeach
        <tr>
            <td colspan="6">total pendapatan</td>
            <td colspan="2">Rp. {{ number_format($total) }}</td>
        </tr>
    </tbody>
</table>