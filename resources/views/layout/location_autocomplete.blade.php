
<script>

    var placeSearch, autocomplete;
    var componentForm = {
        city: 'long_name',
        country: 'long_name',
    };

    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function getLatLngFromAddress(address) {

        var geocoder = new google.maps.Geocoder();

        geocoder.geocode({'address': address}, function (results, status) {

            if (status == google.maps.GeocoderStatus.OK) {
                document.getElementById('latitude').value = results[0].geometry.location.lat();
                document.getElementById('longitude').value = results[0].geometry.location.lng();

            } else {
                console.log("Geocode was not successful for the following reason: " + status);
            }
        });
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        getLatLngFromAddress(place.formatted_address)
    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
    //Rendering Map
    function initMap() {
        var myLocation = {lat: {{ $latitude }}, lng: {{ $longitude }} };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: myLocation
        });
        var marker = new google.maps.Marker({
            position: myLocation,
            map: map
        });
    }

    //Rendering Maps
    function initMaps() {
        <?php if(isset($ConfirmedReports)){ ?>
        var locations = <?php print_r(json_encode($ConfirmedReports)) ?>;
        for (var i = 0, length = locations.length; i < length; i++) {
            var data = locations[0];
            console.log("value.latitude => ********** " + data.latitude);

            var myLocation = {lat: parseFloat(data.latitude), lng: parseFloat(data.longitude) };
            console.log(myLocation);
            var map = new google.maps.Map(document.getElementById('mapDash'), {
                zoom: 13,
                center: myLocation
            });
            var marker = new google.maps.Marker({
                position: myLocation,
                map: map
            });
         }
        <?php } ?>
    }
    function initialize() {
        initAutocomplete();
        // initMap();
        initMaps();
    }

</script>
<script>

</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&signed_in=true&libraries=places&callback=initialize" async defer></script>


