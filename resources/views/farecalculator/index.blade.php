@extends('layouts.app')

@section('page')

@include('includes/mapstyle')

<!-- Three -->
<section id="three" class="wrapper">
    <div class="inner">
        @include('includes/errors')

        <header class="align-center">
            <h1 style="font-size: 45px;">Taxi Fare Calculator &amp; Estimator</h1>
            <p>You can use our fare calculator to get an estimation of peak and off peak time costs when you book a journey with us. For an actual price please use our <a href="{{ route('booking') }}">online booking tool</a>, and we will give you a price tailored to your needs.</p>
        </header>
        <div class="align-center" style="margin: 20px;">
            <h2>1. Where would you like to be picked up from?</h2>
            <input id="inputFrom" type="text" placeholder="Start typing your pick up location here...">
            <div id="mapFrom"></div>
        </div>
		<div class="align-center" style="margin: 20px;">
            <h2>2. Where would you like to be dropped off?</h2>
		    <input id="inputTo" type="text" placeholder="Start typing your drop off location here...">
            <div id="mapTo"></div>
        </div>
        <footer>
            <div class="align-center" style="margin: 20px;">
                <h2>3. Click calculate!</h2>
            </div>
            <div class="align-right">
                <form id="calculateForm" name="calculateForm" action="{{ route('fareCalculator.calculate') }}">
                    @csrf
                    <input type="hidden" value="yes" name="estimate" />
                    <input type="hidden" name="from" value="" id="from" required />
                    <input type="hidden" name="from_latlong" value="" id="fromlatlong" required />
					<input type="hidden" name="to" value="" id="to" required />
                    <input type="hidden" name="to_latlong" value="" id="tolatlong" required />
                    <button type="submit" class="button special icon fa-arrow-right" style="width: 100%;">Calculate</button>
                </form>
            </div>
            <div class="align-center" id="result"></div>
            <div class="align-center" id="loading" style="display:none;"><img src="images/loading.gif" /></div>
                
            </h1>
        </footer>
    </div>
</section>
