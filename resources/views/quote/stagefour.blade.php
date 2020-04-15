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
            <h3>4. Check your locations, contact details and time then click submit confirmation</h3>
        </header>
        <footer>
            <div class="align-right">
                <form  action="{{ route('quote.validateConfirm') }}" method="post">
                    @csrf
                    <div class="row uniform">
                        <input type="hidden" name="nextstage" value="stagefive" required />

                        <div class="12u$">
                            <table>
                                <tbody>
                                <tr>
                                    <td>From:</td>
                                    <td>{{ $quote['from_destination'][0] }}</td>
                                </tr>
                                <tr>
                                    <td>To:</td>
                                    <td>{{ $quote['to_destination'][0] }}</td>
                                </tr>
                                <tr>
                                    <td>Pickup Date:</td>
                                    <td>{{ $quote['date'][0] }}</td>
                                </tr>
                                <tr>
                                    <td>Pickup Time:</td>
                                    <td>{{ $quote['time'][0] }}</td>
                                </tr>
                                <tr>
                                    <td>Name:</td>
                                    <td>{{ $quote['name'][0] }}</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td>{{ $quote['email'][0] }}</td>
                                </tr>
                                <tr>
                                    <td>No. of people:</td>
                                    <td>{{ $quote['no_of_people'][0] }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="12u$">
                            <p>Click Submit Quote to send a request to our Driver. They will then contact you back on the email you provided above with your quote. You can then change this into a booking with us if you are happy.</p>
                            <input type="checkbox" id="gdprConsent" name="gdprConsent" required ><label for="gdprConsent">By clicking this checkbox I consent to ATM Taxis using the above information to contact me. ATM Taxis will only ever use your personal information to contact you about your quote and/or booking with us. We will NEVER pass this information onto third parties.</label>
                            <button type="submit" class="button special icon fa-arrow-right">Submit Confirmation</button>
                        </div>
                    </div>
                </form>
            </div>
        </footer>
    </div>
</section>

@endsection
