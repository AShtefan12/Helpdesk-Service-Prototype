@extends('layouts.auth')

@section('content')
    <form class="form-signin" method="POST" action="{{ route('password.email') }}">
        @csrf

        <img class="mb-4" src="/images/logo-small.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">{{ __('Reset Password') }}</h1>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="form-group">
            <div class="floating-label">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <button class="btn btn-lg btn-info btn-block mt-2" type="submit">{{ __('Send Password Reset Link') }}</button>
    </form>
@endsection
