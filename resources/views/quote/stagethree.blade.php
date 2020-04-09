
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
        <header class="align-left">
            <h3>3. Enter your details below. It's important we get your email address as this is how you will receive your quote.</h3>
        </header>
        <footer>
            <div class="align-right">
                <form method="post" action="{{ route('quotePost') }}">
                    @csrf
                    <div class="row uniform">
                        <div class="12u$">
                            <div class="form-group">
                                <label class="text-left">Pickup Date:</label>
                                <div class='input-group date' id='datepicker'>
                                    <input type="text" name="date" value="" id="date_input"  readonly="true"  required placeholder="Pick up date..." />
                                    <span class="input-group-addon" style="background-color: #fff;border: 1px solid #fff;">
                                        <span class="icon fa-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="12u$">
                            <div class="form-group">
                                <label class="text-left">Pickup Time:</label>
                                <div class='input-group date' id='timepicker'>
                                    <input type="text" name="time" value="" id="time_input"  readonly="true"  required placeholder="Pick up time..." />
                                    <span class="input-group-addon" style="background-color: #fff;border: 1px solid #fff;">
                                        <span class="icon fa-clock-o"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="12u$">
                            <label class="text-left">Your Name:</label>
                            <input type="text" name="name" value="" id="name" required placeholder="Your name..." />
                        </div>

                        <div class="12u$">
                            <label class="text-left">Email Address:</label>
                            <input type="email" name="email" value="" id="email" required placeholder="Email Address..." />
                        </div>

                        <div class="12u$">
                            <label class="text-left">No. of People to pick up:</label>
                            <input type="tel" name="no_of_people" max="20" value="" id="no_of_people" required placeholder="No. of People to pickup..." />
                        </div>

                        <div class="12u$">
                            <input type="hidden" name="nextstage" value="stagefour" required />
                            <button type="submit" class="button special icon fa-arrow-right">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </footer>
    </div>
</section>

@endsection
