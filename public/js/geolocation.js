function geolocal() {
    // Check if geolocation is supported by the browser
    if ("geolocation" in navigator) {
        // Prompt user for permission to access their location
        navigator.geolocation.getCurrentPosition(
            // Success callback function
            (position) => {
                // Get the user's latitude and longitude coordinates
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;

                // Do something with the location data, e.g. display on a map
                // console.log(`Latitude: ${lat}, longitude: ${lng}`);
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;

            },
            // Error callback function
            (error) => {
                // Handle errors, e.g. user denied location sharing permissions
                console.error("Error getting user location:", error);
            }
        );
    } else {
        // Geolocation is not supported by the browser
        alert("Geolocation is not supported by this browser.");
    }

}