@extends('layouts.app')

@section('page')

@include('book/mapstyle')

<!-- Three -->
<section id="three" class="wrapper">
    <div class="inner">
        @include('includes/errors')

        <header class="align-center">
            <h1 style="font-size: 45px;">Taxi Booking Request</h1>
            <p>Follow the simple steps below to request a taxi booking with us</p>
            <p style="color: #ffa700;font-weight: bold;">Your taxi is NOT guaranteed until you receive a confirmation email from us</p>
        </header>
        <header class="align-center">
            <p style="color: #ffa700;font-weight: bold;">ATTENTION: If you require a same day taxi booking please call us on 07934334255</p>
        </header>
        <header class="align-left">
            <h3>1. Select where you would like to be picked up from then click next below</h3>
            <p>Use the search box below to type in your pickup location:</p>
        </header>
        <input id="pac-input" type="text" placeholder="Start typing your pick up location here...">
        <div id="map"></div>
        <footer>
            <p>When you have selected your pickup location click next below.</p>
            <div class="align-right">
                <form method="post" action="{{ route('booking.validateFrom') }}" >
                    @csrf
                    <input type="hidden" name="nextstage" value="stagetwo" required />
                    <input type="hidden" name="from_destination" value="" id="dest" required />
                    <input type="hidden" name="from_latlong" value="" id="latlong" required />
                    <button type="submit" class="button special icon fa-arrow-right">Next</button>
                </form>
            </div>
        </footer>
    </div>
</section>

@endsection

