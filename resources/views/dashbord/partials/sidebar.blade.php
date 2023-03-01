<nav class="pcoded-navbar  ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >
            
            {{-- <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="/assets/images/user/avatar-2.jpg" alt="User-Profile-Image">
                    <div class="user-details">
                        <span>John Doe</span>
                        <div id="more-details">UX Designer<i class="fa fa-chevron-down m-l-5"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-unstyled">
                        <li class="list-group-item"><a href="user-profile.html"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
                        <li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
                        <li class="list-group-item"><a href="auth-normal-sign-in.html"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
                    </ul>
                </div>
            </div> --}}
            
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>admin</label>
                </li>
                <li class="nav-item">
                    <a href="/admin" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link   "><span class="pcoded-micon">
                    <i class="feather icon-layout"></i>
                    </span>
                    <span class="pcoded-mtext">data master</span></a>
                    <ul class="pcoded-submenu">
                        <li><a class="nav-link {{ Request::is('data-detail_ruangan') ? 'active' : ''}}" href="/data-detail_ruangan">data detail ruangan</a></li>
                        <li><a href="/data-kategori">kategori tipe</a></li>
                        <li><a href="/data-fasilitas">fasilitas</a></li>
                    </ul>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link   "><span class="pcoded-micon">
                    <i class="feather icon-box"></i>
                    </span>
                    <span class="pcoded-mtext">pesanan</span></a>
                    <ul class="pcoded-submenu">
                        <li><a class="nav-link {{ Request::is('/pesanan/belum_dibayar') ? 'active' : ''}}" href="/pesanan/belum_dibayar">belum dibayar</a></li>
                        <li><a class="nav-link {{ Request::is('/pesanan/pembayaran_berhasil') ? 'active' : ''}}" href="/pesanan/pembayaran_berhasil">pembayaran berhasil</a></li>
                        <li><a class="nav-link {{ Request::is('/pesanan/pembayaran_gagal') ? 'active' : ''}}" href="/pesanan/pembayaran_gagal">pembayaran gagal</a></li>

                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="/rating-detail" class="nav-link "><span class="pcoded-micon"><i class="feather icon-star"></i></span><span class="pcoded-mtext">rating user</span></a>
                </li>

                <li class="nav-item">
                    <a href="/komentar-admin" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">komentar</span></a>
                </li>

                <li class="nav-item">
                    <a href="/laporan" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">laporan</span></a>
                </li>
 
                <li class="nav-item pcoded-menu-caption">
                    <label>user</label>
                </li>
                
                <li class="nav-item"><a href="/" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">home</span></a></li>

            </ul>
            
          
            
        </div>
    </div>
</nav>