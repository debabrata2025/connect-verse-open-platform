const infor_div = document.querySelectorAll('.infor_div');

if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(function (position) {
      const latitude = position.coords.latitude;
      const longitude = position.coords.longitude;

      const apiKey = '93d37b7284f05536c81fb21790ef2052';
      // Latitude and Longitude of the location you want to get weather data for
      const lat = latitude;  
      const lon = longitude; 
  
      // Reverse geocoding to get the city name
      const geocodingUrl = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}`;
  
      fetch(geocodingUrl)
        .then(response => response.json())
        .then(geocodingData => {
          const city_name = geocodingData.name;
          infor_div[0].value = city_name;
        })
        .catch(error => {
          console.error(`Error with reverse geocoding: ${error}`);
        });
      
      
    }, function (error) {
      console.error("Error getting geolocation:", error);
      weatherInfo.innerHTML = "Couldn't retrieve your location. Please try again.";
    });
  } else {
    weatherInfo.innerHTML = "Geolocation is not supported by your browser.";
  }


   // Fetch device information
   var userAgent = navigator.userAgent;
   var platform = navigator.platform;
   var language = navigator.language;

   var deviceData = document.getElementById("deviceData");
   var deviceType = getDeviceType(userAgent, platform);

   infor_div[1].value = deviceType;

function getDeviceType(userAgent, platform) {
   if (/Android/i.test(userAgent)) {
       return "Android";
   } else if (/iPhone|iPad|iPod/i.test(userAgent)) {
       return "iOS";
   } else if (/Mac/i.test(platform)) {
       return "Mac";
   } else if (/Win/i.test(platform)) {
       return "Windows";
   } else {
       return "Unknown";
   }
}

// Create a new Date object
var now = new Date();
// Get the localized time string
var timeString = now.toLocaleString();
infor_div[2].value = timeString;





