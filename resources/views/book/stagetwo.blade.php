
@extends('layouts.app')

@section('page')

@include('book/mapstyle')

<!-- Three -->
<section id="three" class="wrapper">
    <div class="inner">

        @include('includes/errors')

        <header class="align-center">
            <h1 style="font-size: 45px;">Taxi Booking Request</h1>
            <p>Follow the simple steps below to book a Taxi with us</p>
        </header>
        <header class="align-left">
            <h3>2. Select where you would like your drop off location to be then click next below</h3>
            <p>Use the search box below to type in your drop off location:</p>
        </header>
        <input id="pac-input" type="text" placeholder="Start typing your drop off location here">
        <div id="map"></div>
        <footer>
            <p>When you have selected your drop off location click next below.</p>
            <div class="align-right">
                <form method="post" action="{{ route('bookingsPost') }}">
                    @csrf
                    <input type="hidden" name="nextstage" value="stagethree" required />
                    <input type="hidden" name="to_destination" value="" id="dest" required />
                    <input type="hidden" name="to_latlong" value="" id="latlong" required />
                    <button type="submit" class="button special icon fa-arrow-right">Next</button>
                </form>
            </div>
        </footer>
    </div>
</section>


@endsection
