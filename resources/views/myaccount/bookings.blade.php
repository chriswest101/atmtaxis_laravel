@extends('layouts.app')

@section('page')

<!-- Three -->
<section id="three" class="wrapper">
    <div class="inner">
        @include('includes/errors')
        @include('includes/success')

        <header>
            <h1 class="align-center" style="font-size: 45px;">Your Bookings</h1>
            <p>Below are a list of all your previous bookings with us</p>
        </header>
        
        <div class="form-group row">
            @include('myaccount/menu')

            <div class="col-md-9 col-xs-12">
                <div class="card-body">
                    @if (empty($bookings))
                        <p>You don't have any bookings. Click <a href="{{ route('booking') }}">here</a> to make one.</p>
                    @else
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pickup</th>
                                    <th scope="col">Dropoff</th>
                                    <th scope="col">Pickup Date</th>
                                    <th scope="col">Pickup Time</th>
                                    <th scope="col">No. Of People</th>
                                    <th scope="col">Booked On</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <th scope="row">{{ $booking['id'] }}</th>
                                        <td>{{ $booking['from_destination'] }}</td>
                                        <td>{{ $booking['to_destination'] }}</td>
                                        <td>{{ $booking['date'] }}</td>
                                        <td>{{ $booking['time'] }}</td>
                                        <td>{{ $booking['no_of_people'] }}</td>
                                        <td>{{ date("D M jS Y", strtotime($booking['created_at'])) }}</td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table> 
                    @endif
                </div>
            </div>
        </div>
        
    </div>
</section>

@endsection