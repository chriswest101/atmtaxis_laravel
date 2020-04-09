
    <style>

        input[type="checkbox"] + label:before, input[type="radio"] + label:before {
            border: solid 2px #9de2bc;
        }
        input[type="checkbox"]:checked + label:before, input[type="radio"]:checked + label:before {
            border-color: #9de2bc;
        }
        .bootstrap-datetimepicker-widget table td.day {
            color:#000000!important;
        }
        .bootstrap-datetimepicker-widget table td.disabled, .bootstrap-datetimepicker-widget table td.disabled:hover {
            background: none;
            color: #cecece!important;
            cursor: not-allowed;
        }
        .bootstrap-datetimepicker-widget .timepicker-hour, .bootstrap-datetimepicker-widget .timepicker-minute, .bootstrap-datetimepicker-widget .timepicker-second {
            color: #000!important;
        }
        .minute .hour {
            color: #000!important;
        }
        .bootstrap-datetimepicker-widget table td {
            color: #000!important;
        }

    </style>
    <!-- Footer -->
    <footer id="footer">
        <div class="inner">

            <h3>Get in touch</h3>
            <p>If you are wanting a quote tick the box below and fill in the boxes and we will get back to you with a quote. It's that simple!</p>

            <form id="contactForm" autocomplete="off">

                <div class="field half first">
                    <label for="name">Name</label>
                    <input name="name" id="name" type="text" placeholder="Name">
                </div>
                <div class="field half">
                    <label for="email">Email</label>
                    <input name="email" id="email" type="email" placeholder="Email">
                </div>
                <div class="field text-left">
                    <input type="checkbox" id="quoteMe" name="quoteme">
                    <label for="quoteMe">I want a quote! (Tick this for a taxi quote. If you want a custom quote don't tick this just send us a message with the pickup/dropoff details)</label>
                </div>
                <div class="field" id="messageContactForm">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" rows="6" placeholder="Message"></textarea>
                    <input name="phone" id="phone" type="text" style="position:relative;left: -6000px;" />
                </div>
                <div class="field" id="quoteContactForm" style="display:none;">
                    <label for="pickup">Pick up location (Example: Okehampton Highstreet):</label>
                    <input name="pickup" id="pickup" type="text" placeholder="Pickup location...">
                    <label for="dropoff">Drop off Location (Example: Exeter Train Station):</label>
                    <input name="dropoff" id="dropoff" type="text" placeholder="Drop off location...">
                    <label for="nopass">No. of passengers:</label>
                    <input name="nopass" id="nopass" type="tel" placeholder="No. of passengers...">
                    <div class="12u$">
                        <div class="form-group">
                            <label class="text-left">Pickup Date:</label>
                            <div class='input-group date' id='datepicker'>
                                <input type="text" name="pickdate" value="" id="pickdate"  readonly="true"  required placeholder="Pick up date..." />
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
                                <input type="text" name="picktime" value="" id="picktime"  readonly="true"  required placeholder="Pick up time..." />
                                <span class="input-group-addon" style="background-color: #fff;border: 1px solid #fff;">
                                            <span class="icon fa-clock-o"></span>
                                        </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="padding-bottom: 30px;"><input type="checkbox" id="gdpr" name="gdpr" required ><label for="gdpr">By clicking this text box I consent to ATM Taxis using the above information to contact me. ATM Taxis will only ever use your personal information to contact you about your quote and/or booking with us. We will NEVER pass this information onto third parties.</label></div>

                <div id="sentMessage" class="box" style="display:none;">
                    <h3>Email Sent!</h3>
                    <p>Thank you for your email. We will do our best to get back to you soon.</p>
                </div>
                <div id="errorMessage" class="box" style="background: #ffb6b6;display:none;">
                    <h3>Sorry Message not sent</h3>
                    <p style="font-size: 19px;">Sorry you have some errors in your form. Please make sure all fields are filled in and correct.</p>
                </div>


                <ul class="actions">
                    <li><input type="button" value="Send Message" class="button alt" id="send" onclick="sendEmail()"></li>
                </ul>
            </form>

            <div class="copyright">
                <span itemscope itemtype="https://schema.org/Organization">
                    <link itemprop="url" href="https://www.atmtaxi.co.uk">
                    <link itemprop="logo" href="https://www.atmtaxi.co.uk/images/pic03.jpg">
                    <div itemscope="" itemtype="http://schema.org/LocalBusiness">
                        <span itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                            <img src="https://www.atmtaxi.co.uk/images/pic03.jpg" width="20" height="20" />
                            <meta itemprop="url" content="https://www.atmtaxi.co.uk/images/pic03.jpg">
                            <meta itemprop="width" content="150">
                            <meta itemprop="height" content="150">
                        </span>
                        &copy; {date("Y")} <span itemprop="name">{$company}</span>
                        <span itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                            | Rated <span itemprop="ratingValue">5.0</span>
                            / 5.0 based on <span itemprop="reviewCount">11</span> reviews.
                            | <a class="ratings" href="http://bit.ly/2D8FLfv">Review Us</a>
                        </span>
                        <div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
                            ADDRESS:
                            <span itemprop="streetAddress">24 Exeter Road</span>,
                            <span itemprop="addressLocality">Okehampton</span>,
                            <span itemprop="addressRegion">Devon</span>,
                            <span itemprop="postalCode">EX20 1NH</span>,
                            <span itemprop="addressCountry">GB</span> |
                            TEL: <span itemprop="telephone">07934334255</span> |
                            EMAIL: <a href="mailto:hello@atmtaxi.co.uk" itemprop="email">hello@atmtaxi.co.uk</a>.
                        </div>

                        <span itemprop="geo" itemscope="" itemtype="http://schema.org/GeoCoordinates">
                                        <meta itemprop="latitude" content="50.7417">
                                        <meta itemprop="longitude" content="-3.9925">
                                    </span>
                    </div>
                </span>
                Design: <a href="https://templated.co">TEMPLATED</a> &amp; <a href="http://christophermwest.co.uk">Christopher West</a> | Images: <a href="https://unsplash.com">Unsplash</a> | <a href="https://www.atmtaxi.co.uk/terms.php">Cookie Policy &amp; Terms and Conditions</a> | Check Out <a href="https://www.lordofthelawns.co.uk">Lord Of The Lawns</a>
            </div>

        </div>
    </footer>
