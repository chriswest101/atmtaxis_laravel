@extends('layouts.app')

@section('page')
<section id="three" class="wrapper">
    <div class="inner">
        <div class="row justify-content-center">
            <div class="col-xl-12" style="width: 100%;">
                <div class="card align-center">
                    <header class="align-center">
                        <h1 style="font-size: 45px;">{{ __('Reset Password') }}</h1>
                        <p>Fill out the form below and we will email you a link to reset your password.</p>
                    </header>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

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

                            <div class="form-group row mb-0 align-right">
                                <br />
                                <div class="col-md-12 offset-md-12 align-right" style="width: 100%;">
                                    <button type="submit" class="button special icon fa-arrow-right">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
