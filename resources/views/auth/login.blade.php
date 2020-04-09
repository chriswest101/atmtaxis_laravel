@extends('layouts.app')

@section('page')
<section id="three" class="wrapper">
    <div class="inner">
        <div class="row justify-content-center">
            <div class="col-xl-12" style="width: 100%;">
                <div class="card align-center">
                    <header class="align-center">
                        <h1 style="font-size: 45px;">{{ __('Login') }}</h1>
                        <p>Login to view your miles, get discounts and much more!</p>
                    </header>

                    @include('includes/errors')
                    @include('includes/success')

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-12" style="width: 100%;padding: 1em;">
                                    <div class="col-xs-4">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                    </div>
                                    <div class="col-xs-8">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12" style="width: 100%;padding: 1em;">
                                    <div class="col-xs-4">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                    </div>
                                    <div class="col-xs-8">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12" style="width: 100%;padding: 1em;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <br />
                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-12 align-right" style="width: 100%;">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    <button type="submit" class="button special icon fa-arrow-right">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
