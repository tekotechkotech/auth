@extends('layouts.auth')

@section('content')
<div class="col-md-8 col-lg-6 col-xxl-3">
  <div class="card mb-0">
    <div class="card-body">
      @include('layouts.logos')
      <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" name="email" value="{{ old('email', $email) }}" class="form-control"
            id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-4">
          <label for="pass" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="pass">
        </div>
        <div class="mb-4">
          <label for="passconfirm" class="form-label">Konfirmasi Password</label>
          <input type="password" name="password_confirmation" class="form-control" id="passconfirm">
        </div>


        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <button type="submit" class="btn btn-primary w-100 py-8 fs-4  rounded-2">Reset Password</button>

      </form>
    </div>
  </div>
</div>

@endsection