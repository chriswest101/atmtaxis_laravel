@extends('layouts.app')

@section('page')

<!-- Three -->
<section id="three" class="wrapper">
    <div class="inner">
        @include('includes/errors')

        <header class="align-center">
            <h1 style="font-size: 45px;">Taxi Booking Request</h1>
            <p>Follow the simple steps below to book a Taxi with us</p>
        </header>
        <header class="align-left">
            <h3>4. Check your locations, contact details and time then click submit confirmation</h3>
        </header>
        <footer>
            <div class="align-right">
                <form  action="{{ route('booking.validateConfirm') }}" method="post">
                    @csrf
                    <div class="row uniform">
                        <input type="hidden" name="nextstage" value="stagefive" required />

                        <div class="12u$">
                            <table>
                                <tbody>
                                <tr>
                                    <td>From:</td>
                                    <td>{{ $booking['from_destination'][0] }}</td>
                                </tr>
                                <tr>
                                    <td>To:</td>
                                    <td>{{ $booking['to_destination'][0] }}</td>
                                </tr>
                                <tr>
                                    <td>Pickup Date:</td>
                                    <td>{{ $booking['date'][0] }}</td>
                                </tr>
                                <tr>
                                    <td>Pickup Time:</td>
                                    <td>{{ $booking['time'][0] }}</td>
                                </tr>
                                <tr>
                                    <td>Name:</td>
                                    <td>{{ $booking['name'][0] }}</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td>{{ $booking['email'][0] }}</td>
                                </tr>
                                <tr>
                                    <td>Contact Number:</td>
                                    <td>{{ $booking['phone'][0] }}</td>
                                </tr>
                                <tr>
                                    <td>No. of people:</td>
                                    <td>{{ $booking['no_of_people'][0] }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="12u$">
                            <p style="color: #ffa700;font-weight: bold;">ATTENTION: Your taxi is NOT guaranteed until you receive a confirmation email from us</p>
                            <p>Click submit confirmation to send a confirmation request to our Driver. They will then contact you back on the number you provided above to confirm your booking.</p>
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
