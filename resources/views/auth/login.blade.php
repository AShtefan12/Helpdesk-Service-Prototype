@extends('layouts.auth')

@section('content')
    <form class="form-signin" method="POST" action="{{ route('login') }}">
        @csrf

        <img class="mb-4" src="/images/logo-small.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

        @if ($errors->isNotEmpty())
        <span class="invalid-feedback d-block mb-2" role="alert">
            <strong>{{ $errors->first() }}</strong>
        </span>
        @endif

        <div class="form-group">
            <div class="floating-label">
                <label for="inputEmail">Email Address</label>
                <input type="email" id="inputEmail" class="form-control{{ $errors->has('email') ? ' is-invalid mb-0' : '' }}" name="email" required="">
            </div>
        </div>

        <div class="form-group">
            <div class="floating-label">
                <label for="inputPassword">Password</label>
                <input type="password" id="inputPassword" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required="">
            </div>
        </div>

        <div class="my-2 d-flex justify-content-between align-items-center">
            <div class="form-check mb-0">
                <label class="form-check-label text-muted">
                    <input type="checkbox" name="remember" class="form-check-input">
                    Keep me signed in
                    <i class="input-helper"></i>
                </label>
            </div>
            <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot your password?</a>
        </div>

        <button class="btn btn-lg btn-info btn-block" type="submit">Sign in</button>
    </form>
@endsection
