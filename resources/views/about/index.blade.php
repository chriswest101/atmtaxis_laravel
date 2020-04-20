@extends('layouts.app')

@section('page')

<!-- Three -->
<section id="three" class="wrapper">
    <div class="inner">
        @include('includes/errors')

        <header>
            <h1 class="align-center"  style="font-size: 45px;">About Us</h1>
            <p>
                {{ env('APP_NAME') }} was founded by Graham as a means to provide people with affordable, reliable and a fast Taxi service to any destination for his customers.
                Since it's growth Graham and {{ env('APP_NAME') }} has provided a safe Taxi service to over 500 customers and counting!<br/><br/>
                ATM Taxis are now operating out of two vehicles and serving the Okehampton, Exeter, Plymouth, well the whole of the Devon and Cornwall area. We perform airport runs to Exeter Airport, Plymouth Airport, Bristol, London Heathrow, London Gatwick and many many more!
                We pride ourselves in the taxi service we offer and that is why we keep our promise of starting you on your journey in the right way.
                Be one of our customers and book now!
            </p>
        </header>
        <div class="align-center">
            @include('includes/book_buttons')
        </div>
    </div>
</section>
