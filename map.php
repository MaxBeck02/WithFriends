
<html>
<body>

<p>Click the button to get your coordinates.</p>
<p id="demo"></p>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
var x = document.getElementById("demo");
$(document).ready(function(e) {
    var refresher = setInterval("update_content();",5000); // 30 seconds
})

function update_content(){

    $.ajax({
      type: "GET",
      url: "./map.php", // post it back to itself - use relative path or consistent www. or non-www. to avoid cross domain security issues
      cache: false, // be sure not to cache results
    })
      .done(function() {
        console.log("Hello world!");

    });   

}


function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
    // $.post("DbConfig.php", { lat : position.coords.latitude, long : position.coords.longitude  },function(response){
    //          console.log(response);
    //      });

    $.post("storeLocation.php",
  {
    long: position.coords.longitude,
    lat: position.coords.latitude
  })
    
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}

window.onload = getLocation;
</script>

</body>
</html>