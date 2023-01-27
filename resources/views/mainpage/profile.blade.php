@extends('mainpage.layouts.main')
@section('container')
<div class="container my-4">
    @if (session('berhasil'))
    <div class="alert alert-success mb-3 col-lg-12" role="alert">
        {{ session('berhasil') }}
    </div>
    @endif
</div>
 <div class="container rounded bg-white mt-5 mb-5">
     <form action="/profile-user" method="post" class="col-md-12" enctype="multipart/form-data">
    <div class="row">

        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px"
                  src="{{  asset('storage/'.auth()->user()->fotoprofil) }}">

                <div class="input-group mt-3">
                    <input type="file" name="fotoprofil" class="form-control" id="inputGroupFile02"></form>
                </div>
                {{-- <span class="font-weight-bold">edogaru</span><span class="text-black-50">edogaru@gmail.com.my</span>
                <span></span> --}}
            </div>
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">profile settings</h4>
                </div>
                <div class="row mt-3">
                        @csrf
                        <div class="mb-5">
                            <label class="labels">name</label>
                            <input type="text" class="form-control" name="name" required placeholder="edit nama"
                              value="{{ auth()->user()->name }}">
                        </div>
                        <div class="mb-5">
                            <label class="labels">no.telp</label>
                            <input type="text" class="form-control" name="notelp" required placeholder="edit notelp"
                              value="{{ auth()->user()->notelp }}">
                        </div>
                        <div class="mb-5">
                            <label class="labels">email</label>
                            <input type="text" class="form-control" name="email" required placeholder="edit email"
                              value="{{ auth()->user()->email }}">
                              @error('email')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">save
                            profile</button></div>
                </div>
            </div>
        </div>
    </div>
</form>
 </div>
@endsection