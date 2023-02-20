@extends('mainpage.layouts.main')

@section('style')
    <style>
        @import url(https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
        @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

        fieldset,
        label {
            margin: 0;
            padding: 0;
        }

        /** Style Star Rating Widget ***/

        .rating {
            border: none;
            margin-right: 49px;
        }

        .myratings {
            font-size: 85px;
            color: green;
        }

        .rating>[id^="star"] {
            display: none;
        }

        .rating>label:before {
            margin: 5px;
            font-size: 2.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        .rating>.half:before {
            content: "\f089";
            position: absolute;
        }

        .rating>label {
            color: #ddd;
            float: right;
        }

        /** CSS Magic to Highlight Stars on Hover **/

        .rating>[id^="star"]:checked~label,
        /* show gold star when clicked */
        .rating:not(:checked)>label:hover,
        /* hover current star */
        .rating:not(:checked)>label:hover~label {
            color: #ffd700;
        }

        /* hover previous stars in list */

        .rating>[id^="star"]:checked+label:hover,
        /* hover current star when changing rating */
        .rating>[id^="star"]:checked~label:hover,
        .rating>label:hover~[id^="star"]:checked~label,
        /* lighten current selection */
        .rating>[id^="star"]:checked~label:hover~label {
            color: #ffed85;
        }

        .reset-option {
            display: none;
        }

        .reset-button {
            margin: 6px 12px;
            background-color: rgb(255, 255, 255);
            text-transform: uppercase;
        }

        .mt-100 {
            margin-top: 100px;
        }
    </style>
@endsection

@section('container')
        <!-- About Start -->
    <div class="card">
        <div class="container-xxl py-5">
             <div class="container">
                {{-- @if (session('success'))
                <div class="alert alert-success mb-3 col-lg-10" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger mb-3 col-lg-10" role="alert">
                    {{ session('error') }}
                </div>
                @endif  --}}
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 col-md-5 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $detail_ruangan->foto) }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <form action="{{ $detail_ruangan->id }}" method="POST" class="product_details_text">
                        @csrf
                        
                        <h4>{{ $detail_ruangan->nama }}</h4>        
                        <h6>{{ $detail_ruangan->alamat }}</h6>
                        <h5> Rp.{{ number_format($detail_ruangan->harga) }}</h5>
                        
                        <p>{{ $detail_ruangan->deskripsi }}</p>
                        <ul>
                            <li>fasilitas: <span>{{ $detail_ruangan->fasilitas }}</span></li>
                            <li>kapasitas: <span>{{ $detail_ruangan->kapasitas }}</span></li>
                            <li>luas: <span><p>{{ $detail_ruangan->luas }}</p></span></li>
                            <li>kategori: <span> <p>{{ $detail_ruangan->kategori->nama }}</p></span></li>
                        </ul>
                        @error('error')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <a class="btn btn-primary py-3 px-5 mb-5 mt-3" href="/checkout/{{ $detail_ruangan->id }}">sewa</a>
                        
                    </form>
                    </div>
                    <div class="container-xl px-4 mt-4">
                        <div class="row">
                            <div class="col-xl-10 mx-auto">
                                <div class="card mb-4">
                                    <div class="card-header text-dark">Rating Ruangan</div>
                                    <div class="card-body">
    
                                        <form method="POST" action="/rating-star" class="text-center">
                                            @csrf
                                            {{-- <span
                                                class="myratings">{{ $ratingUser !== null ? $ratingUser->rating : '0' }}</span> --}}
    
                                            <input type="hidden" name="detailruangan_id" value="{{ $detail_ruangan->id }}">
    
    
                                            @if (isset($ratingUser))
                                                <fieldset class="rating">
                                                    <input disabled type="radio" id="star5" name="rating"
                                                        value="5"
                                                        {{ $ratingUser->rating == 5 ? 'checked' : null }} /><label
                                                        class="full" for="star5" title="Awesome - 5 stars"></label>
                                                    <input disabled type="radio" id="star4half" name="rating"
                                                        value="4.5"
                                                        {{ $ratingUser->rating == 4.5 ? 'checked' : null }} /><label
                                                        class="half" for="star4half"
                                                        title="Pretty good - 4.5 stars"></label>
                                                    <input disabled type="radio" id="star4" name="rating"
                                                        value="4"
                                                        {{ $ratingUser->rating == 4 ? 'checked' : null }} /><label
                                                        class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                    <input disabled type="radio" id="star3half" name="rating"
                                                        value="3.5"
                                                        {{ $ratingUser->rating == 3.5 ? 'checked' : null }} /><label
                                                        class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                                    <input disabled type="radio" id="star3" name="rating"
                                                        value="3"
                                                        {{ $ratingUser->rating == 3 ? 'checked' : null }} /><label
                                                        class="full" for="star3" title="Meh - 3 stars"></label>
                                                    <input disabled type="radio" id="star2half" name="rating"
                                                        value="2.5"
                                                        {{ $ratingUser->rating == 2.5 ? 'checked' : null }} /><label
                                                        class="half" for="star2half"
                                                        title="Kinda bad - 2.5 stars"></label>
                                                    <input disabled type="radio" id="star2" name="rating"
                                                        value="2"
                                                        {{ $ratingUser->rating == 2 ? 'checked' : null }} /><label
                                                        class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                    <input disabled type="radio" id="star1half" name="rating"
                                                        value="1.5"
                                                        {{ $ratingUser->rating == 1.5 ? 'checked' : null }} /><label
                                                        class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                                    <input disabled type="radio" id="star1" name="rating"
                                                        value="1"
                                                        {{ $ratingUser->rating == 1 ? 'checked' : null }} /><label
                                                        class="full" for="star1"
                                                        title="Sucks big time - 1 star"></label>
                                                    <input disabled type="radio" id="starhalf" name="rating"
                                                        value="0.5"
                                                        {{ $ratingUser->rating == 0.5 ? 'checked' : null }} /><label
                                                        class="half" for="starhalf"
                                                        title="Sucks big time - 0.5 stars"></label>
                                                    <input disabled type="radio" class="reset-option" name="rating"
                                                        value="reset" />
                                                </fieldset>
                                            @else
                                                <fieldset class="rating">
                                                    <input type="radio" id="star5" name="rating"
                                                        value="5" /><label class="full" for="star5"
                                                        title="Awesome - 5 stars"></label>
                                                    <input type="radio" id="star4half" name="rating"
                                                        value="4.5" /><label class="half" for="star4half"
                                                        title="Pretty good - 4.5 stars"></label>
                                                    <input type="radio" id="star4" name="rating"
                                                        value="4" /><label class="full" for="star4"
                                                        title="Pretty good - 4 stars"></label>
                                                    <input type="radio" id="star3half" name="rating"
                                                        value="3.5" /><label class="half" for="star3half"
                                                        title="Meh - 3.5 stars"></label>
                                                    <input type="radio" id="star3" name="rating"
                                                        value="3" /><label class="full" for="star3"
                                                        title="Meh - 3 stars"></label>
                                                    <input type="radio" id="star2half" name="rating"
                                                        value="2.5" /><label class="half" for="star2half"
                                                        title="Kinda bad - 2.5 stars"></label>
                                                    <input type="radio" id="star2" name="rating"
                                                        value="2" /><label class="full" for="star2"
                                                        title="Kinda bad - 2 stars"></label>
                                                    <input type="radio" id="star1half" name="rating"
                                                        value="1.5" /><label class="half" for="star1half"
                                                        title="Meh - 1.5 stars"></label>
                                                    <input type="radio" id="star1" name="rating"
                                                        value="1" /><label class="full" for="star1"
                                                        title="Sucks big time - 1 star"></label>
                                                    <input type="radio" id="starhalf" name="rating"
                                                        value="0.5" /><label class="half" for="starhalf"
                                                        title="Sucks big time - 0.5 stars"></label>
                                                    <input type="radio" class="reset-option" name="rating"
                                                        value="reset" />
                                                </fieldset>
                                                <button class="btn btn-primary mt-4" type="submit">Simpan</button>
                                            @endif
    
                                            <!-- Submit button-->
    
                                        </form>
    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>    
        <!-- About End -->
@endsection

@section('script')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("input[type='radio']").click(function() {
                var sim = $("input[type='radio']:checked").val();
                //alert(sim);
                if (sim < 3) {
                    $('.myratings').css('color', 'red');
                    $(".myratings").text(sim);
                } else {
                    $('.myratings').css('color', 'green');
                    $(".myratings").text(sim);
                }
            });
        });
    </script>
@endsection