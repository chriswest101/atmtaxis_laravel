<!DOCTYPE HTML>
<!--
	Projection by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="msvalidate.01" content="ED11A9E523280210CB1425D0E23EC794" />
    <title>Book Online Taxis in Okehampton, Exeter and Devon</title>
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <meta http-equiv="content-language" content="en-GB">
    <meta name="description" content="Okehampton Taxis, Exeter Taxis, Devon Taxis. Providing Airport Transfers, Contract Hire. {$company} provides an affordable and reliable service. Book Online." />
    <meta name="keywords" content="okehampton taxis, Taxi Okehampton, okehampton taxi, taxis in okehampton, exeter taxis, exeter taxi, airport transfer taxi, contract hire, taxis in exeter, devon taxi, taxis in devon, local taxi in exeter, local taxi in okehampton, contract hire devon, okehampton contract hire, okehampton, taxi to okehampton, taxi to exeter, taxi to exeter airport, taxi to exeter train station" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/jquery-eu-cookie-law-popup.css') }}"/>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/trumbowyg.min.css') }}" />
    <!-- TrustBox script -->
    <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
    <!-- End Trustbox script -->

</head>
<body class="{{ $page }} eupopup eupopup-fixedtop">

<!-- Global site tag (gtag.js) - Google Analytics
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-113695539-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-113695539-1');
</script>
-->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-113695539-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    function initialiseGoogleAnalytics() {
      gtag('js', new Date());
      gtag('config', 'UA-113695539-1');
    }

    // Subscribe for the cookie consent events
    $(document).bind("user_cookie_already_accepted", function(event, object) {
      initialiseGoogleAnalytics();
    });

    $(document).bind("user_cookie_consent_changed", function(event, object) {
      const userConsentGiven = $(object).attr('consent');
      if (userConsentGiven) {
        // User clicked on enabling cookies. Now it’s safe to call the
        // init functions.
        initialiseGoogleAnalytics();
      }
    });
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12&appId=202802757141441&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>



@include('includes/header')

@yield('page')

@include('includes/footer')

<!-- Scripts -->
    <script src="{{ asset('js/skel.min.js') }}"></script>
    <script src="{{ asset('js/util.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/jquery-eu-cookie-law-popup.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @if (isset($farecalculator))
    <script src="{{ asset('js/farecalculator.js') }}"></script>
    @else
      <script src="{{ asset('js/bookstep1.js') }}"></script>
    @endif
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtWjsRz-T8qgXc1b2IOztQsTfAmxtoR38&libraries=places&callback=initAutocomplete" async defer></script>

    <!-- <script src="{{ asset('js/farecalculator.js') }}"></script>

    <script src="{{ asset('js/trumbowyg.min.js') }}" ></script>
    <script src="{{ asset('js/admin.js') }}" ></script>-->


</body>
</html>
