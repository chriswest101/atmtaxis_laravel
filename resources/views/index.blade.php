@extends('layouts.app')

@section('page')
    @include('index/banner')

    @if (strtotime('now') < strtotime('29-12-2019'))
    <section id="three" class="wrapper align-center" style="padding: 1em 0;">
        <div class="inner">
            <div class="flex">
                <article>
                    <a href="quote.php"><img src="images/christmasbanner.jpg" alt="Book Now for Christmas at ATM Taxis" style="max-width: 100%;"></a><br/>
                    <a href="quote.php" class="button special">Now taking Christmas bookings!</a>
                </article>
            </div>
        </div>
    </section>
    @endif

    @include('index/who_are_we')

    @include('index/cust_quotes')

    @include('index/quote')

    @include('index/dbs_checked')

    @include('index/blog')
@endsection

