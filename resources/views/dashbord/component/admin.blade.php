@extends('dashbord.layouts.main')
@section ('container')

<div class="pcoded-main-container-fluid">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard Analytics</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">

            <!-- table card-1 start -->
            <div class="col-md-12 col-xl-4">
                <!-- widget primary card start -->
                <div class="card flat-card widget-primary-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="feather icon-home"></i>     
                        </div>
                        <div class="col-sm-9">
                            <h4>{{ $ruangan }}</h4>
                            <h6>Ruangan</h6>
                        </div>
                    </div>
                </div>
                <!-- widget primary card end -->
            </div>
            <!-- table card-1 end -->
            <!-- table card-2 start -->
            <div class="col-md-12 col-xl-4">
                <!-- widget-success-card start -->
                <div class="card flat-card widget-purple-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="feather icon-align-justify"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4>{{ $kategori }}</h4>
                            <h6>Kategori</h6>
                        </div>
                    </div>
                </div>
                <!-- widget-success-card end -->
            </div>
            <div class="col-md-12 col-xl-4">
                <!-- widget primary card start -->
                <div class="card flat-card widget-primary-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="feather icon-box"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4>{{ $fasilitas }}</h4>
                            <h6>Fasilitas</h6>
                        </div>
                    </div>
                </div>
                <!-- widget primary card end -->
            </div>
            <div class="col-md-12 col-xl-4">
                <!-- widget-success-card start -->
                <div class="card flat-card widget-purple-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="feather icon-file-text"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4>{{ $pesanan }}</h4>
                            <h6>Pesanan</h6>
                        </div>
                    </div>
                </div>

            </div>  
            <div class="col-md-12 col-xl-4">
                <!-- widget primary card start -->
                <div class="card flat-card widget-primary-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="feather icon-user"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4>{{ $users->count() }}</h4>
                            <h6>user</h6>
                        </div>
                    </div>
                </div>
                <!-- widget primary card end -->
            </div>  
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-15">
                <div class="card shadow mb-4">
                    <div class="card-header py-2">
                        <h4 class="m-0 font-weight-bold text-primary"> User </h4>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr role="row">
                                        <th>foto profil</th>
                                        <th>User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $i => $user)
                                        <tr>
                                            <td>
                                                <img src="storage/{{ $user->fotoprofil }}" width="60" class="rounded-full">
                                            </td>
                                            <td>
                                                <strong style="font-size: 1.25rem">{{ $user->name }}</strong>
                                                <div>{{ $user->email }}</div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-15">
                <div class="card shadow mb-4">
                    <div class="card-header py-2">
                        <h4 class="m-0 font-weight-bold text-primary"> Pesanan </h4>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr role="row">
                                        <th>Nama Penyewa</th>
                                        <th>Gedung</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesanans as $i => $item)
                                        <tr>
                                            <td>
                                                {{ $item->user->name }}
                                            </td>
                                            <td>
                                                {{ $item->detailruangan->nama }}
                                            </td>
                                            <td>
                                                <a href="/pesanan/detail/{{ $item->id }}" class="btn btn-primary btn-sm">Detail</a>
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

        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection