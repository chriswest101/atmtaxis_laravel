
    <header id="header">
        <div class="inner">
            <a href="{{ route('index') }}" class="logo"><strong>ATM Taxis</strong></a>
            <nav id="nav">
                <a href="{{ route('index') }}">Home</a>
                <a href="{{ route('booking') }}">Book</a>
                <a href="{{ route('quote') }}" class="getQuote">Free Quote</a>
                <a href="{{ route('fareCalculator.index') }}">Fare Calculator</a>
                <a href="{{ route('services') }}">Services</a>
                <a href="{{ route('about') }}">About</a>
                <a href="blog.php">Blog</a>
                <a href="contactus.php"> Contact Us</a> <!-- class="icon fa-envelope-o" -->
                <a href="https://www.facebook.com/atmtaxis/" target="_blank" class="icon fa-facebook"> Facebook</a>
                <a href="https://twitter.com/atm_taxis" target="_blank" class="icon fa-twitter"> Twitter</a>
                @guest
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <a href="{{ route('myAccount.index') }}" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        My Account
                    </a>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </nav>
            <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
        </div>
    </header>
