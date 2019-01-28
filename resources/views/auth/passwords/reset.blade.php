@extends('layouts.auth')

@section('content')

    <form class="form-signin" method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <img class="mb-4" src="/images/logo-small.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">{{ __('Reset Password') }}</h1>

        <div class="form-group">
            <div class="floating-label">
                <label for="email">Email address</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="floating-label">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="floating-label">
                <label for="password">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>


        <button class="btn btn-lg btn-info btn-block mt-2" type="submit">{{ __('Reset Password') }}</button>
    </form>

@endsection
