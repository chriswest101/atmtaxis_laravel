@extends('layouts.app')

@section('page')

<!-- Three -->
<section id="three" class="wrapper">
    <div class="inner">
        @include('includes/errors')
        @include('includes/success')

        <header>
            <h1 class="align-center" style="font-size: 45px;">Complete your account</h1>
            <p>You're almost there! Fill out the form below to get your account setup.</p>
        </header>
        
        <div class="form-group row">
            <div class="col-md-12 col-xs-12">
                <div class="card-body">
                    <form method="POST" action="{{ route('myAccount.validateCompleteSignup', ['email' => $hashedEmail, 'id' => $hashedId]) }}">
                        @csrf
                        <input type="hidden" name="hashedemail" value="{{ $hashedEmail }}" required />
                        <input type="hidden" name="hashedid" value="{{ $hashedId }}" required />
                        <input type="hidden" name="unhashedemail" value="{{ $account->email }}" required />
                        <input type="hidden" name="unhashedid" value="{{ $account->id }}" required />

                        <div class="form-group row">
                            <div class="col-md-12" style="width: 100%;padding: 1em;">
                                <div class="col-xs-4">
                                    <label for="name" class="col-md-6 col-form-label text-md-right align-right" style="padding: 0;">{{ __('Name') }}</label>
                                </div>
                                <div class="col-xs-8">
                                    <input id="name" type="text" class="form-control" style="background-color: #a7a6a6;" name="name" value="{{ $account->name }}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12" style="width: 100%;padding: 1em;">
                                <div class="col-xs-4">
                                    <label for="email" class="col-md-6 col-form-label text-md-right align-right" style="padding: 0;">{{ __('E-Mail Address') }}</label>
                                </div>
                                <div class="col-xs-8">
                                    <input id="email" type="email" class="form-control" style="background-color: #a7a6a6;" name="email" value="{{ $account->email }}" disabled>
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