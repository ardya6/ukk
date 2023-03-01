<!-- Navbar Start -->
<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        <a href="/" class="navbar-brand d-flex align-items-center text-center">
            <div class=" p-2 me-2">
                {{-- <img class="img-fluid" src="assetss/img/logo.png" alt="Icon" style="width: 90px; height: 90px;"> --}}
                <h1 class="m-0 text-primary">CIPTA</h1>
            </div>
            {{-- <h1 class="m-0 text-primary"></h1> --}}
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="/" class="nav-item nav-link">beranda</a>
                <a href="/about" class="nav-item nav-link">tentang kami</a>
                <a href="/list-ruangan" class="nav-item nav-link">Ruangan</a>
                {{-- <a href="/contact" class="nav-item nav-link">hubungi kami</a> --}}
            </div>
            @guest
           <a href="/login" class="btn btn-primary px-3 d-none d-lg-flex">masuk</a> <span class="arrow_carrot-down"></span></li>
            @endguest
            @auth
            <div>
                <form action="/logout" method="POST">
                 @csrf
                 <button type="submit" class="dropdown-item" data-toggle="modal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw  text-gray-400"></i>
                    keluar
                 </button>
                </form>
            </div>
            <div>
                <a href="/profile-user" class="btn text-dark">profil</a>
            </div>
            <div>
                <a href="/pesanan-user" class="btn text-dark">pesanan saya</a>
            </div>
            
            @endauth
            
        </div>
    </nav>
</div>
<!-- Navbar End -->