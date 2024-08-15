@extends('layouts.auth')

@section('content')

<div class="col-md-8 col-lg-6 col-xxl-3">
<div class="card mb-0">
    <div class="card-body">
      @include('layouts.logos')
      <p>
        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
      </p>
      @if (session('status'))
          <p class="alert alert-success">
              {{ session('status') }}
          </p>
      @endif
      <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        
        @error('email')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
        
        <button type="submit" class="btn btn-primary w-100 py-8 fs-4  rounded-2">Kirim Email Reset Password</button>
      </form>
    </div>
  </div>
  </div>
  
@endsection