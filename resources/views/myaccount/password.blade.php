@extends('layouts.app')

@section('page')

<!-- Three -->
<section id="three" class="wrapper">
    <div class="inner">
        @include('includes/errors')
        @include('includes/success')

        <header>
            <h1 class="align-center" style="font-size: 45px;">Update Your Password</h1>
            <p>Use the form below to update your password.</p>
        </header>
        
        <div class="form-group row">
            @include('myaccount/menu')

            <div class="col-md-9 col-xs-12">
                <div class="card-body">
                    <form method="POST" action="{{ route('myAccount.updatePassword') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12" style="width: 100%;padding: 1em;">
                                <div class="col-xs-4">
                                    <label for="new_password" class="col-md-6 col-form-label text-md-right align-right" style="padding: 0;">{{ __('New Password') }}</label>
                                </div>
                                <div class="col-xs-8">
                                    <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new-password">

                                    @error('new_password')
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
                                    <label for="new_password-confirm" class="col-md-6 col-form-label text-md-right align-right" style="padding: 0;">{{ __('Confirm New Password') }}</label>
                                </div>
                                <div class="col-xs-8">
                                    <input id="new_password-confirm" type="password" class="form-control" name="new_password_confirmation" required autocomplete="new-password">
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