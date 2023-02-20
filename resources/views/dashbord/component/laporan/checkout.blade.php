
<h5>laporan pemesanan</h5>
<h3>periode bulan {{ $data['bulan'] }}{{ $data['tahun'] }}</h3>
<table border="2" cellspacing="0" cellpadding="4">
    <thead>
        <tr>
            <th>User</th>
            <th>no.telp</th>
            <th>email</th>
            <th>gedung</th>
            <th>tanggal sewa</th>
            <th>durasi sewa</th>
            <th>tambahan</th>
            <th>total harga</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($checkouts as $checkout)
            <tr>
                <td>{{ $checkout->user->name }}</td>
                <td>{{ $checkout->user->notelp }}</td>
                <td>{{ $checkout->user->email }}</td>
                <td>{{ $checkout->detailruangan->nama }}</td>
                <td>{{ $checkout->tanggal_booking }}</td>
                <td>{{ $checkout->durasi_sewa }}</td>
                <td>
                    <ul>
                        @foreach ($checkout->fasilitases as $fasilitas)
                            <li>{{ $fasilitas->nama_fasilitas }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>Rp. {{ number_format ( $checkout->detailruangan->total_harga) }}</td>
                <td>
                    <h5><span class="badge bg-warning text-light">{{ $checkout->status_pembayaran }}</span></h5> 
                </td>
            </tr>
        @endforeach
    </tbody>
</table>