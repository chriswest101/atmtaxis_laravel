@extends('layouts.app')

@section('page')

<!-- Three -->
<section id="three" class="wrapper">
    <div class="inner">

        @include('includes/errors')

        <header class="align-center">
            <h1 style="font-size: 45px;">Free Taxi Quote</h1>
            <p>Follow the simple steps below to get a Taxi quote</p>
        </header>
        <footer>
            <div class="align-center">
                <h2 class="icon fa-check"> Thank you for your quote request <span class="font-weight-bold">{{ $name }}</span>!</h2>
                <p>We will get back to you on the email you provided soon.</p>

                @guest 
				<div style="padding-bottom: 2em;">
                    <p>Finish off creating an account with us today to collect miles with us, get discounts and much more!</p>
					<a class="button special" href="{{ route('myAccount.completeSignup', ['email' => $email, 'id' => $id]) }}">Create Account</a>
				</div>
                @endguest

                <a class="button special icon fa-arrow-right" href="{{ route('index') }}">Return to our homepage</a>
            </div>
        </footer>
    </div>
</section>

@endsection
