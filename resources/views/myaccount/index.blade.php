@extends('layouts.app')

@section('page')

<!-- Three -->
<section id="three" class="wrapper">
    <div class="inner">
        @include('includes/errors')
        @include('includes/success')

        <header>
            <h1 class="align-center" style="font-size: 45px;">My Account</h1>
            <p>Welcome to your account page. Here you can view, update your details and view a history of your previous quotes and bookings.</p>
        </header>
        
        <div class="form-group row">
            @include('myaccount/menu')

            <div class="col-md-9 col-xs-12">
                <table>
                    <tbody>
                        <tr>
                            <td>Name:</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>Email Address:</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>Phone:</td>
                            <td>@if ($user->phone)
                                {{ $user->phone }}
                            @else
                                -
                            @endif</td>
                        </tr>
                        <tr>
                            <td>Created On:</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</section>

@endsection