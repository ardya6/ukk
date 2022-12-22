<!-- Navbar Start -->
<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon p-2 me-2">
                <img class="img-fluid" src="assetss/img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
            </div>
            <h1 class="m-0 text-primary">Makaan</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="/" class="nav-item nav-link active">Home</a>
                <a href="/about" class="nav-item nav-link">About</a>
                <a href="/list" class="nav-item nav-link">List</a>
                
                <a href="/contact" class="nav-item nav-link">Contact</a>
            </div>
            @guest
            <li></li><a href="/login" class="btn btn-primary px-3 d-none d-lg-flex">sign in</a> <span class="arrow_carrot-down"></span></li>
            @endguest
            @auth
            <li>
                <form action="/logout" method="POST">
                 @csrf
                 <button type="submit" class="dropdown-item" data-toggle="modal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw  text-gray-400"></i>
                    logout
                 </button>
                </form>
            </li>
            
            @endauth
            
        </div>
    </nav>
</div>
<!-- Navbar End -->