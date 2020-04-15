@extends('layouts.app')

@section('page')

<!-- Three -->
<section id="three" class="wrapper">
    <div class="inner">
        @include('includes/errors')
        @include('includes/success')

        <header>
            <h1 class="align-center" style="font-size: 45px;">Your Quotes</h1>
            <p>Below are a list of all your previous quotes with us</p>
        </header>
        
        <div class="form-group row">
            @include('myaccount/menu')

            <div class="col-md-9 col-xs-12">
                <div class="card-body">
                    @if (empty($quotes))
                        <p>You don't have any quotes. Click <a href="{{ route('quote') }}">here</a> to make one.</p>                        
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
                                @foreach ($quotes as $quote)
                                    <tr>
                                        <th scope="row">{{ $quote['id'] }}</th>
                                        <td>{{ $quote['from_destination'] }}</td>
                                        <td>{{ $quote['to_destination'] }}</td>
                                        <td>{{ $quote['date'] }}</td>
                                        <td>{{ $quote['time'] }}</td>
                                        <td>{{ $quote['no_of_people'] }}</td>
                                        <td>{{ date("D M jS Y", strtotime($quote['created_at'])) }}</td>
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