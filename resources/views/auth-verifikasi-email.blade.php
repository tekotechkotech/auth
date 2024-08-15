@extends('layouts.auth')

@section('content')
    <div class="col-md-8 col-lg-6 col-xxl-3">
        <div class="card mb-0">
            <div class="card-body">
                @include('layouts.logos')
                <p>
                    Thanks for signing up! Before getting started, could you verify your email address by clicking on the
                    link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                </p>
                
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4  rounded-2">Kirim Ulang Verifikasi
                        Email</button>
                    </form>
                    
                    <hr>
                <form method="POST" action="{{ route('logout') }}" class="text-end">
                    @csrf
                    <button type="submit" class="btn btn-outline-dark py-8s p-1  px-4  rounded-2"> Logout</button>
                </form>
            </div>
        </div>
    </div>
@endsection
