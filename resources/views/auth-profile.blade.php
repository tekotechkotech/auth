@extends('layouts.auth')

@section('content')
    <div class="col-md-10 col-lg-8 col-xxl-6">

        <div class="card mb-0">
            <div class="card-body">
                @include('layouts.logos')
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <button onclick="goBack()" class="btn btn-dark">Kembali</button>
                Hello, {{ Auth::user()->name }}

            </div>
        </div>
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>


        <div class="card my-3">
            <div class="card-header">
                <b class="">Informasi Profil</b><br>
                <small>Perbarui informasi Nama dan email mu</small>
            </div>
            <div class="card-body pt-2">
                <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                            class="form-control @error('name')
                            is-invalid
                        @enderror">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                            class="form-control @error('email')
                            is-invalid
                        @enderror">
                        @error('email')
                            <small class="text-danger">
                                {{ $message }}</small>
                        @enderror
                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                            <div class="d-flex justify-content-between">
                                <span class=" mt-2 ">
                                    Emailmu Belum Diverifikasi.
                                    <a href="#"
                                        onclick="document.getElementById('send-verification').submit(); return false;">
                                        Klik untuk Verifikasi email.
                                    </a>
                                </span>

                                @if (session('status') === 'verification-link-sent')
                                    <span class="mt-2 text-success">
                                        Link Verifikasi sudah terkirim ke email anda.
                                    </span>
                                @endif
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-dark">Ubah</button>
                    <span id="saved-message" class="px-1 btn btn-white text-success" style="display: none;cursor: auto;">
                        Berhasil Dirubah</span>

                </form>
            </div>
        </div>
        <div class="card my-3">
            <div class="card-header">
                <b class="">Ganti Password</b><br>
                <small>Perbarui Password akun mu</small>
            </div>
            <div class="card-body pt-2">
                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')
                    <div class="mb-2">
                        <label for="passLama" class="form-label">Password Lama</label>
                        <input type="password" name="current_password"
                            class="form-control @if ($errors->updatePassword->has('current_password')) is-invalid @endif">
                        @if ($errors->updatePassword->has('current_password'))
                            <small class="invalid-feedback">
                                {{ $errors->updatePassword->first('current_password') }}
                            </small>
                        @endif
                    </div>
                    <div class="mb-2">
                        <label for="passBaru" class="form-label">Password Baru</label>
                        <input type="password" name="password"
                            class="form-control @if ($errors->updatePassword->has('password')) is-invalid @endif">
                        @if ($errors->updatePassword->has('password'))
                            <small class="invalid-feedback">
                                {{ $errors->updatePassword->first('password') }}
                            </small>
                        @endif
                    </div>
                    <div class="mb-2">
                        <label for="passKonfirmasi" class="form-label">Ulangi Password Baru</label>
                        <input type="password" name="password_confirmation"
                            class="form-control @if ($errors->updatePassword->has('password_confirmation')) is-invalid @endif">
                        @if ($errors->updatePassword->has('password_confirmation'))
                            <small class="invalid-feedback">
                                {{ $errors->updatePassword->first('password_confirmation') }}
                            </small>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-dark">Ubah</button>
                    <span id="saved-password" class="px-1 btn btn-white text-success" style="display: none;cursor: auto;">
                        Berhasil Dirubah</span>
                </form>
            </div>
        </div>



        <div class="card mb-0">
            <div class="card-footer d-flex justify-content-between align-items-center">

                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus">Hapus
                    Akun</a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-dark btn-block  d-block"><i class="ti ti-power pe-2"></i>
                        Logout</button>
                </form>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalHapusLabel">Yakin Hapus Akunmu?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                        <div class="modal-body">
                            <p>
                                Once your account is deleted, all of its resources and data will be permanently deleted.
                                Please enter your password to confirm you would like to permanently delete your account.
                            </p>

                            @csrf
                            @method('delete')
                            <div class="mt-4">
                                <label for="password" class="form-label sr-only">Password</label>
                                <input id="password" name="password" type="password" class="form-control mt-1 w-75"
                                    placeholder="Password" />

                                @if ($errors->userDeletion->get('password'))
                                    <div class="text-danger mt-2">
                                        @foreach ($errors->userDeletion->get('password') as $error)
                                            <small>{{ $error }}</small>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Hapus Akun</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
