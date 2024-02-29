<!-- resources/views/nearest_store.blade.php -->

@extends('layouts.template')

@section('content')

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9pavAmtl8yu2OOmvr6vRThzrEBZlrOJ8&callback=initMap&libraries=places,directions" async></script>

<script>
    let map, activeInfoWindow, markers = [];

    /* ----------------------------- Initialize Map ----------------------------- */
    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: 2.222423312034846,
                lng: 102.45207910630606,
            },
            zoom: 15,
        });

        map.addListener("click", function (event) {
            mapClicked(event);
        });

        initMarkers();
                            
        // Add directions renderer
        directionsRenderer = new google.maps.DirectionsRenderer();
        directionsRenderer.setMap(map);

        // Call the function to calculate and display directions
        // calculateAndDisplayDirections();
    }

    /* --------------------------- Initialize Markers --------------------------- */
    function initMarkers() {
        const initialMarkers = <?php echo json_encode($initialMarkers); ?>;

        for (let index = 0; index < initialMarkers.length; index++) {
            const markerData = initialMarkers[index];
            const marker = new google.maps.Marker({
                position: markerData.position,
                label: markerData.label,
                draggable: markerData.draggable,
                map
            });
            markers.push(marker);

            const infowindow = new google.maps.InfoWindow({
                content: `<b>${markerData.position.lat}, ${markerData.position.lng}</b>`,
            });
            marker.addListener("click", (event) => {
                if (activeInfoWindow) {
                    activeInfoWindow.close();
                }
                infowindow.open({
                    anchor: marker,
                    shouldFocus: false,
                    map
                });
                activeInfoWindow = infowindow;
                markerClicked(marker, index);
            });

            marker.addListener("dragend", (event) => {
                markerDragEnd(event, index);
            });
        }
    }

    /* ------------------------- Handle Map Click Event ------------------------- */
    function mapClicked(event) {
        console.log(map);
        console.log(event.latLng.lat(), event.latLng.lng());
    }

    /* ------------------------ Handle Marker Click Event ----------------------- */
    function markerClicked(marker, index) {
        console.log(map);
        console.log(marker.position.lat());
        console.log(marker.position.lng());
    }

    /* ----------------------- Handle Marker DragEnd Event ---------------------- */
    function markerDragEnd(event, index) {
        console.log(map);
        console.log(event.latLng.lat());
        console.log(event.latLng.lng());
    }

    function getCurrentLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function (position) {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;

                    // Use the coordinates as needed (e.g., send them to the server, display on the map)
                    console.log('Latitude:', latitude);
                    console.log('Longitude:', longitude);

                    // Update the map marker for the current location
                    const meMarker = markers.find(marker => marker.label.text === 'YOU');
                    meMarker.setPosition(new google.maps.LatLng(latitude, longitude));

                    // Recalculate and display distances
                    // calculateAndDisplayDirections();
                },
                function (error) {
                    // Handle errors
                    switch (error.code) {
                        case error.PERMISSION_DENIED:
                            console.error('User denied the request for Geolocation.');
                            break;
                        case error.POSITION_UNAVAILABLE:
                            console.error('Location information is unavailable.');
                            break;
                        case error.TIMEOUT:
                            console.error('The request to get user location timed out.');
                            break;
                        case error.UNKNOWN_ERROR:
                            console.error('An unknown error occurred.');
                            break;
                    }
                },
            {
                maximumAge: 0, // Set maximumAge to 0 to disable caching
            }
            
            );
        } else {
            console.error('Geolocation is not supported by this browser.');
        }
    }

    function calculateAndDisplayDirectionsToStore(storeLat, storeLng) {
        const meLat = markers[2].position.lat();
        const meLng = markers[2].position.lng();

        const storeLatLng = new google.maps.LatLng(storeLat, storeLng);

        const directionsService = new google.maps.DirectionsService();

        const requestMeToStore = {
            origin: new google.maps.LatLng(meLat, meLng),
            destination: storeLatLng,
            travelMode: google.maps.TravelMode.DRIVING,
        };

        directionsService.route(requestMeToStore, function (result, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsRenderer.setDirections(result);
                // Calculate and display road distance dynamically
                const roadDistanceMeToStore = result.routes[0].legs[0].distance.text;
                alert('Road distance my current location to Store: ' + roadDistanceMeToStore);
            }
        });
    }
</script>

<style>
        .btn-primary {
        background-color: #0A35E2; /* Blue background color for primary button */
        color: #fff; /* White text color for primary button */
        border-radius: 5px; /* Rounded borders for buttons */
        padding: 8px 16px; /* Adjust padding as needed */
        border: none; /* Remove button border */
        cursor: pointer;
    }

    .btn-kuning {
        background-color: #F11489  ; /* Blue background color for primary button */
        color: #fff; /* White text color for primary button */
        border-radius: 5px; /* Rounded borders for buttons */
        padding: 8px 16px; /* Adjust padding as needed */
        border: none; /* Remove button border */
        cursor: pointer;
    }
</style>

<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Nearby NASH</p>
                    <h1>Cafe</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="container mt-5">
            <h4>Find list of our branch here!</h4>
            <p id="roadDistanceMeSa"></p>
            <p id="roadDistanceMeSb"></p>
            <button onclick="getCurrentLocation()" class="btn btn-primary">Get My Location!</button>

            <!-- Add buttons for SA and SB -->
            <button onclick="calculateAndDisplayDirectionsToStore(1.61040079, 103.31336881) " class="btn btn-kuning">Show Route to Store A</button>
            <button onclick="calculateAndDisplayDirectionsToStore(2.19108546, 102.24765769)" class="btn btn-kuning">Show Route to Store B</button>

            <div class="col-md-8 mt-3 mb-3">
    <h6>*Please select the store for your order in cart section.</h6>
        </div>

            <div id="map" style="height: 400px; width:100%;"></div>


            <!-- <div  class="">

            </div> -->

        </div>


    </div>
</div>

@endsection
