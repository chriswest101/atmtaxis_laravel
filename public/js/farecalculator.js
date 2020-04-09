

$('document').ready(function(){
    $("#calculateForm").submit(function(e) {
    
        e.preventDefault(); // avoid to execute the actual submit of the form.
    
        var form = $(this);
        var url = form.attr('action');
        $('html,body').animate({scrollTop: $("#result").offset().top - 50},'slow');
        $("#loading").show();
        $("#result").hide();
        $.ajax({
               type: "POST",
               url: url,
               data: form.serialize(), // serializes the form's elements.
               success: function(data)
               {
                   console.log(data);
                   if (data == "-1")
                   {
                        $("#result").html("Please fill in your from and to locations");
                   }
                   $("#result").show();
                   $("#loading").hide();
                   $("#result").html(data);
                   document.getElementById("calculateForm").scrollIntoView();
               }
             });
    
    
    });
});
// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.

// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">


function initAutocomplete() {

    var element =  document.getElementById('mapFrom');
    if (typeof(element) == 'undefined' || element == null) {
        return;
    }
	var element1 =  document.getElementById('mapTo');
    if (typeof(element1) == 'undefined' || element1 == null) {
        return;
    }

    var mapFrom = new google.maps.Map(document.getElementById('mapFrom'), {
        center: {lat: 50.738308, lng: -4.004263000000037},
        zoom: 8,
        mapTypeId: 'roadmap',
        disableDefaultUI: true
    });
	var mapTo = new google.maps.Map(document.getElementById('mapTo'), {
        center: {lat: 50.738308, lng: -4.004263000000037},
        zoom: 8,
        mapTypeId: 'roadmap',
        disableDefaultUI: true
    });

    // Create the search box and link it to the UI element.
    var inputFrom = document.getElementById('inputFrom');
    var searchBoxFrom = new google.maps.places.SearchBox(inputFrom);
    mapFrom.controls[google.maps.ControlPosition.TOP_LEFT].push(inputFrom);
	var inputTo = document.getElementById('inputTo');
    var searchBoxTo = new google.maps.places.SearchBox(inputTo);
    mapFrom.controls[google.maps.ControlPosition.TOP_LEFT].push(inputTo);

    // Bias the SearchBox results towards current map's viewport.
    mapFrom.addListener('bounds_changed', function() {
        searchBoxFrom.setBounds(mapFrom.getBounds());
    });
	mapTo.addListener('bounds_changed', function() {
        searchBoxTo.setBounds(mapTo.getBounds());
    });

    var markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBoxFrom.addListener('places_changed', function() {
        var places = searchBoxFrom.getPlaces();

        if (places.length == 0) {
            return;
        }

        // Clear out the old markers.
        markers.forEach(function(marker) {
            marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
                map: mapFrom,
                icon: icon,
                title: place.name,
                position: place.geometry.location
            }));

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }

            if (place.formatted_address) {
                document.getElementById("fromlatlong").value = place.geometry.location;
                document.getElementById("from").value = place.formatted_address;
            }
        });
        mapFrom.fitBounds(bounds);
    });
	
	var markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBoxTo.addListener('places_changed', function() {
        var places = searchBoxTo.getPlaces();

        if (places.length == 0) {
            return;
        }

        // Clear out the old markers.
        markers.forEach(function(marker) {
            marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
                map: mapTo,
                icon: icon,
                title: place.name,
                position: place.geometry.location
            }));

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }

            if (place.formatted_address) {
                document.getElementById("tolatlong").value = place.geometry.location;
                document.getElementById("to").value = place.formatted_address;
            }
        });
        mapTo.fitBounds(bounds);
    });
}

