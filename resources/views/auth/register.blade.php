@extends('layouts.app')

@section('page')
<section id="three" class="wrapper">
    <div class="inner">
        <div class="row justify-content-center">
            <div class="col-xl-12" style="width: 100%;">
                <div class="card align-center">
                    <header class="align-center">
                        <h1 style="font-size: 45px;">{{ __('Register') }}</h1>
                        <p>Create an account with us today to collect miles with us, get discounts and much more!</p>
                    </header>

                    @if(session()->has('success'))
                        
                        @include('includes/success')

                        <div style="padding-bottom: 2em;">
                            <a class="button special" href="{{ route('login') }}">Login</a>
                        </div>

                    @else
                    
                        @include('includes/errors')

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
                                    <div class="col-md-12" style="width: 100%;padding: 1em;">
                                        <div class="col-xs-4">
                                            <label for="name" class="col-md-6 col-form-label text-md-right align-right" style="padding: 0;">{{ __('Name') }}</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
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
                                            <label for="email" class="col-md-6 col-form-label text-md-right align-right" style="padding: 0;">{{ __('E-Mail Address') }}</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                            <label for="password" class="col-md-6 col-form-label text-md-right align-right" style="padding: 0;">{{ __('Password') }}</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                                        <div class="col-xs-4">
                                            <label for="password-confirm" class="col-md-6 col-form-label text-md-right align-right" style="padding: 0;">{{ __('Confirm Password') }}</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0 align-right">
                                    <br />
                                    <div class="col-md-12 offset-md-12 align-right" style="width: 100%;">
                                        <button type="submit" class="button special icon fa-arrow-right">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
