// Google Maps - integration with API v.3
// original code converted from API v.2
// http://econym.org.uk/gmap/geoxml.htm

// code will wait for all the images to load before executing (JQuery)
$(window).load(function() {
  initialize();
});

// 
function initialize() {
  var options = {
    center: new google.maps.LatLng(41.925753, -91.425515),
    zoom: 8,
    mapTypeId: google.maps.MapTypeId.HYBRID,
    mapTypeControlOptions: {
      style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
    },
    streetViewControl: false,
    disableDoubleClickZoom: true
  };
  
  // grab and generate the overlay
  // REMOVE MY URL FOR PRODUCTION SERVER!!!
  var kml = new google.maps.KmlLayer("http://seanpmckenna.com/temp/mtVernonDistricts.kml", {suppressInfoWindows: true});
  var map = new google.maps.Map(document.getElementById("map"), options);
  kml.setMap(map);
google.maps.event.addListener(kml, 'click', function(kmlEvent) {
window.location.href = "http://www.google.com/";
//this.setOptions({fillColor: "#00FF00"});
//console.debug(kmlEvent);
//  var text = kmlEvent.featureData.description;
//  showInDiv(text);
});
google.maps.event.addListener(kml, 'mouseover', function() {
//window.location.href = "http://www.google.com/";
this.setOptions({fillColor: "#00FF00"});
console.debug(kmlEvent);
//  var text = kmlEvent.featureData.description;
//  showInDiv(text);
});
}
