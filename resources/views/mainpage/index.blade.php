@extends('mainpage.layouts.main')
@section('container')
<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">temukan<span class="text-primary"> Ruangan</span> sesuai kebutuhan anda dengan mudah bersama <span class="text-primary">CIPTA</span></h1>
            <p class="animated fadeIn mb-4 pb-2"></p>
            {{-- <a href="/register" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Get Started</a> --}}
        </div>
        <div class="col-md-6 animated fadeIn">
            <div class="owl-carousel header-carousel">
                <div class="owl-carousel-item">
                    <img class="img-fluid" src= {{ asset("assetss/img/imgukk/mnn.png") }} alt="">
                </div>
                <div class="owl-carousel-item">
                    <img class="img-fluid" src={{ asset("assetss/img/imgukk/rr1.jpg") }} alt="">
                </div>
                <div class="owl-carousel-item">
                    <img class="img-fluid" src={{ asset("assetss/img/imgukk/nm.png") }} alt="">
                </div>
                <div class="owl-carousel-item">
                    <img class="img-fluid" src={{ asset("assetss/img/imgukk/nnn.png") }} alt="">
                </div>
                <div class="owl-carousel-item">
                    <img class="img-fluid" src={{ asset("assetss/img/imgukk/tmm.png") }} alt="">
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    {{-- <span>testimonial</span> --}}
                    <h3 class="mb-3">pilihan tipe ruangan yang tersedia</h3>
                    <p class="mb-3">pencarian sewa ruang untuk berbagai kebutuhan anda</p>
                </div>
                <div class="row g-5">
                    <div class="col-lg-5 col-sm-6 wow d-flex w-100 fadeInUp justify-content-evenly" data-wow-delay="0.1s">
                        @foreach ($kategoris as $kategori)
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ url("/list/$kategori->id")  }}">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="assetss/img/icon-apartment.png" alt="Icon">
                                </div>
                                <h6>{{ $kategori->nama }}</h6>
                                <span> </span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Category End -->


        <!-- About Start -->
       
        <!-- About End -->


        <!-- Property List Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    {{-- <span>testimonial</span> --}}
                    <h3 class="mb-3">rekomendasi Ruangan</h3>
                    <p class="mb-3">Cari,Booking dan mulai hari produktif anda dalam hitungan menit</p>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active" >
                        <div class="row g-4">
                            @foreach ($detail_ruangans as $dtlr)     
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="property-item rounded overflow-hidden" style="height: 460px; object-fit: cover">
                                        <div class="position-relative overflow-hidden">
                                            <a href=""><img class="img-fluid item-align-center" style="height: 200px; widht:200px object-fit: cover" src="{{ asset('storage/'.$dtlr->foto) }}" alt=""></a>
                                            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                                {{-- @if (isset($check))
                                                <a href="#" class="btn mt-4" style="color: #dda5a5; border: 1px solid #dda5a5" data-toggle"modal" data-target="#ratingModal">
                                                    Beri rating
                                                </a>
                                                    @include('mainpage.partials.modals.rating')
                                                @endif --}}
                                            </div>
                                            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">{{ $dtlr->kategori->nama }}</div>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3">RP. {{number_format ($dtlr->harga) }}/hari</h5>
                                            
                                            {{-- <a href="#" class="btn mt-4" style="color: #dda5a5; border: 1px solid #dda5a5" data-bs-toggle"modal" data-bs-target="#ratingModal">
                                                Beri rating
                                            </a>
                                                @include('mainpage.partials.modals.rating') --}}
                                            
                                            <a class="d-block h5 mb-2" href="/detail/{{ $dtlr->id }}">{{ $dtlr->nama }}</a>
                                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $dtlr->alamat }}</p>
                                        </div>
                                        <div class="d-flex border-top p-3">
                                            <small>{{ $dtlr->fasilitas }}</small>
                                        </div>
                                    </div>
                                    
                                </div>
                            @endforeach
                                {{ $detail_ruangans->links() }}
                           {{-- <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                                <a class="btn btn-primary py-3 px-5" href="/list">Browse More Property</a>
                            </div> --}}
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <!-- Property List End -->

        <!-- Testimonial Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    {{-- <span>testimonial</span> --}}
                    <h1 class="mb-3">Apa kata mereka mengenai CIPTA!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    @foreach($Komentar as $komen)
                        <div class="testimonial-item bg-light rounded p-3">
                            <div class="testimonial_author">
                                <div class="testimonial_author_pic">
                                    <div class="bg-white border rounded p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="img-fluid flex-shrink-0 rounded" src="{{ $komen->user->fotoprofil ? asset('storage/'.$komen->user->fotoprofil) : "assetss/img/testimonial-1.jpg" }}" style="width: 45px; height: 45px;">
                                            <div class="ps-3 testimonial_author_text">
                                            <h5>{{ $komen->user->name }}</h5>
                                            {{ $komen->komentar }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="testimonial-item bg-light rounded p-3">
                            <div class="bg-white border rounded p-4">
                                <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                                <div class="d-flex align-items-center">
                                    <img class="img-fluid flex-shrink-0 rounded" src="assetss/img/testimonial-2.jpg" style="width: 45px; height: 45px;">
                                    <div class="ps-3">
                                        <h6 class="fw-bold mb-1">Client Name</h6>
                                        <small>Profession</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item bg-light rounded p-3">
                            <div class="bg-white border rounded p-4">
                                <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                                <div class="d-flex align-items-center">
                                    <img class="img-fluid flex-shrink-0 rounded" src="assetss/img/testimonial-3.jpg" style="width: 45px; height: 45px;">
                                    <div class="ps-3">
                                        <h6 class="fw-bold mb-1">Client Name</h6>
                                        <small>Profession</small>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    @endforeach
                </div>
                <div class="text-center">
                    <button type="button" class="btn mt-5 fs-4 align-items-center" style="color: #813c3c" data-bs-toggle="modal" data-bs-target="#komentarModal">
                    <i class="fa fa-comment" aria-hidden="true"></i> tambah komentar </button>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
        
        @include('mainpage.partials.modals.komentar')
      @endsection