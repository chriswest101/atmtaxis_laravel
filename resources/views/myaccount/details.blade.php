@extends('layouts.app')

@section('page')

<!-- Three -->
<section id="three" class="wrapper">
    <div class="inner">
        @include('includes/errors')
        @include('includes/success')

        <header>
            <h1 class="align-center" style="font-size: 45px;">Update My Details</h1>
            <p>Use the form below to update your details.</p>
        </header>
        
        <div class="form-group row">
            @include('myaccount/menu')

            <div class="col-md-9 col-xs-12">
                <div class="card-body">
                    <form method="POST" action="{{ route('myAccount.updateDetails') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12" style="width: 100%;padding: 1em;">
                                <div class="col-xs-4">
                                    <label for="name" class="col-md-6 col-form-label text-md-right align-right" style="padding: 0;">{{ __('Name') }}</label>
                                </div>
                                <div class="col-xs-8">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

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
                                    <label for="phone" class="col-md-6 col-form-label text-md-right align-right" style="padding: 0;">Phone Number</label>
                                </div>
                                <div class="col-xs-8">
                                    <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12" style="width: 100%;padding: 1em;">
                                <p class="align-right">Enter your current password to save changes</p>
                                <div class="col-xs-4">
                                    <label for="password" class="col-md-6 col-form-label text-md-right align-right" style="padding: 0;">Current Password</label>
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

                        <div class="form-group row mb-0 align-right">
                            <br />
                            <div class="col-md-12 offset-md-12 align-right" style="width: 100%;">
                                <button type="submit" class="button special icon fa-arrow-right">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</section>

@endsection