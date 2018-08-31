
$(function() {
               $.get("response.php", function (data) {

                   //var locations = JSON.parse(data);
                   "use strict";
                   //$(".listsearch-header").html(data);

                    var locations = [{"category":"Garden","place_name":"Carlton Gardens","address":"1-111 Carlton St, Carlton VIC 3053","coordinates":"{lat: -37.8061, lng: 144.9713}"},{"category":"Sports Center","place_name":"State Netball Hockey Centre","address":"10 Brens Dr., Parkville VIC 3052","coordinates":"{lat: -37.7858, lng: 144.9476}"},{"category":"Park","place_name":"University Square","address":"190-192 Pelham St, Carlton VIC 3053","coordinates":"{lat: -37.8004, lng: 144.9604}"},{"category":"Sports Center","place_name":"Royal Park Golf Course","address":"11 Old Poplar Rd, Parkville VIC 3052","coordinates":"{lat: -37.7819, lng: 144.9563}"},{"category":"Sports Center","place_name":"Powlett Reserve","address":"Albert St & Simpson Street, East Melbourne VIC 3002","coordinates":"{lat: -37.8117, lng: 144.9873}"},{"category":"Sports Center","place_name":"Carlton Football Club","address":"Ikon Park, Royal Parade, Carlton North VIC 3054","coordinates":"{lat: -37.7841, lng: 144.962}"},{"category":"Sports Center","place_name":"Visy Park","address":"400 Royal Parade, Princes Hill VIC 3054","coordinates":"{lat: -37.7834, lng: 144.962}"},{"category":"Sports Center","place_name":"Flemington Racecourse","address":"448 Epsom Rd, Flemington VIC 3031","coordinates":"{lat: -37.7908, lng: 144.9121}"},{"category":"Garden","place_name":"Treasury Gardens","address":"13 Spring St, Melbourne VIC 3000","coordinates":"{lat: -37.8144, lng: 144.976}"},{"category":"Park","place_name":"Batman Park","address":"2A Spencer Street, Melbourne VIC 3000","coordinates":"{lat: -37.8218, lng: 144.9567}"},{"category":"Garden","place_name":"Queen Victoria Gardens","address":"St Kilda Rd, Melbourne VIC 3004","coordinates":"{lat: -37.8216, lng: 144.971}"},{"category":"Indoor Facility","place_name":"Federation Square","address":"Swanston St & Flinders St, Melbourne VIC 3000","coordinates":"{lat: -37.8179, lng: 144.969}"},{"category":"Park","place_name":"Docklands Park","address":"1-91 Harbour Esplanade, Docklands VIC 3008","coordinates":"{lat: -37.821, lng: 144.9468}"},{"category":"Park","place_name":"Point Park","address":"1 Point Park Crescent, \u00a0Docklands VIC 3008","coordinates":"{lat: -37.8234, lng: 144.9421}"},{"category":"Park","place_name":"Newmarket Reserve","address":"Cnr Smithfield & Epsom Rds, Melbourne VIC 3031","coordinates":"{lat: -37.7878, lng: 144.923}"},{"category":"Park","place_name":"Wonderland Park","address":"101 Waterfront Way, Docklands VIC 3008","coordinates":"{lat: -37.8117, lng: 144.9368}"},{"category":"Sports Center","place_name":"Rod Laver Arena","address":"Olympic Blvd, Melbourne VIC 3001","coordinates":"{lat: -37.822, lng: 144.9785}"},{"category":"Sports Center","place_name":"Margaret Court Arena","address":"Olympic Blvd, Melbourne VIC 3001","coordinates":"{lat: -37.8213, lng: 144.9776}"},{"category":"Sports Center","place_name":"Hisense Arena","address":"2 Olympic Blvd, Melbourne VIC 3004","coordinates":"{lat: -37.8231, lng: 144.9818}"},{"category":"Park","place_name":"Birrarung Marr","address":"Melbourne VIC 3004","coordinates":"{lat: -37.8181, lng: 144.9731}"},{"category":"Indoor Facility","place_name":"Artplay","address":"Russell Street Extension, Melbourne VIC 3000","coordinates":"{lat: -37.8184, lng: 144.9715}"},{"category":"Park","place_name":"Riverslide Skate Park","address":"Boathouse Dr, Melbourne VIC 3004","coordinates":"{lat: -37.8208, lng: 144.973}"},{"category":"Garden","place_name":"Alexandra Gardens","address":"St Kilda Road, Melbourne VIC 3004","coordinates":"{lat: -37.8206, lng: 144.9718}"},{"category":"Sports Center","place_name":"North Melbourne Recreation Centre","address":"204-206 Arden St, North Melbourne VIC 3051","coordinates":"{lat: -37.7988, lng: 144.9415}"},{"category":"Park","place_name":"J.J Holland Park","address":"Childers St, Kensington VIC 3031","coordinates":"{lat: -37.7982, lng: 144.9238}"},{"category":"Park","place_name":"Royal Park","address":"Flemington Road, Parkville, VIC 3052","coordinates":"{lat: -37.7906, lng: 144.9538}"},{"category":"Park","place_name":"Princes Park","address":"400 Royal Parade, Princes Hill VIC 3054","coordinates":"{lat: -37.787, lng: 144.9611}"},{"category":"Reserve","place_name":"Shrine of Rembrance Reserve","address":"Birdwood Ave, Melbourne VIC 3001","coordinates":"{lat: -37.8321, lng: 144.9736}"},{"category":"Garden","place_name":"Royal Botanic Gardens","address":"Birdwood Ave, South Yarra VIC 3141","coordinates":"{lat: -37.8307, lng: 144.9809}"},{"category":"Park","place_name":"Yarra Park","address":"Marathon Way, East Melbourne VIC 3002","coordinates":"{lat: -37.8205, lng: 144.9867}"},{"category":"Indoor Facility","place_name":"Icehouse","address":"105 Pearl River Rd, Docklands VIC 3008","coordinates":"{lat: -37.8122, lng: 144.9357}"},{"category":"Park","place_name":"Riverside Park","address":"The Blvd, Essendon West VIC 3040","coordinates":"{lat: -37.7948, lng: 144.9156}"},{"category":"Park","place_name":"Darling Square","address":"1 Darling St, East Melbourne VIC 3002","coordinates":"{lat: -37.813, lng: 144.9891}"},{"category":"Garden","place_name":"Flagstaff Gardens","address":"309-311 William St, West Melbourne VIC 3003","coordinates":"{lat: -37.8111, lng: 144.9547}"},{"category":"Outdoor Venue","place_name":"Melbourne Showgrounds","address":"Epsom Rd, Ascot Vale VIC 3032","coordinates":"{lat: -37.7823, lng: 144.9108}"},{"category":"Park","place_name":"Fawkner Park","address":"24-88 Commercial Rd, South Yarra VIC 3141","coordinates":"{lat: -37.8414, lng: 144.9816}"},{"category":"Garden","place_name":"Fitzroy Gardens","address":"Wellington Parade, East Melbourne VIC 3002","coordinates":"{lat: -37.813, lng: 144.9805}"},{"category":"Park","place_name":"Enterprize Park","address":"469-503 Flinders Street, Melbourne VIC 3000","coordinates":"{lat: -37.8202, lng: 144.9593}"},{"category":"Park","place_name":"Argyle Square","address":"Carlton VIC 3053","coordinates":"{lat: -37.8031, lng: 144.9658}"},{"category":"Park","place_name":"Macarthur Square","address":"Carlton VIC 3053","coordinates":"{lat: -37.7983, lng: 144.9715}"},{"category":"Park","place_name":"Murchinson Square","address":"Murchison St, Carlton VIC 3053,","coordinates":"{lat: -37.8003, lng: 144.9731}"},{"category":"Reserve","place_name":"Parliament Reserve","address":"489-531 Albert Street, East Melbourne, VIC","coordinates":"{lat: -37.8099, lng: 144.9735}"},{"category":"Indoor Facility","place_name":"Carlton Baths","address":"216\/248 Rathdowne St, Carlton VIC 3053","coordinates":"{lat: -37.7934, lng: 144.9717}"},{"category":"Sports Center","place_name":"City Baths","address":"420 Swanston St, Melbourne VIC 3000","coordinates":"{lat: -37.8072, lng: 144.9632}"},{"category":"Park","place_name":"Westgate Park","address":"Port Melbourne VIC 3207","coordinates":"{lat: -37.8315, lng: 144.9088}"},{"category":"Sports Center","place_name":"Westpac Centre","address":"Olympic Blvd, Melbourne VIC 3000","coordinates":"{lat: -37.8242, lng: 144.9797}"},{"category":"Park","place_name":"Lincoln Square","address":"Bouverie Street, Carlton, Melbourne, VIC 3053","coordinates":"{lat: -37.8028, lng: 144.9628}"}]

                   var markerIcon = {
                       anchor: new google.maps.Point(22, 16),
                       url: 'images/marker.png',
                   };

                   function mainMap() {
                       function locationData( locationURL, locationCategory, locationTitle, locationAddress, locationPhone) {
                           return ('<div class="map-popup-wrap"><div class="map-popup"><div class="infoBox-close"><i class="fa fa-times"></i></div><div class="map-popup-category">' + locationCategory + '</div><a href="' + locationURL + '" class="listing-img-content fl-wrap"></a> <div class="listing-content fl-wrap"><div class="listing-title fl-wrap"><h4><a href=' + locationURL + '>' + locationTitle + '</a></h4><span class="map-popup-location-info"><i class="fa fa-map-marker"></i>' + locationAddress + '</span><span class="map-popup-location-phone"><i class="fa fa-phone"></i>' + locationPhone + '</span></div></div></div></div>')
                       }


                       var map = new google.maps.Map(document.getElementById('map-main'), {
                           zoom: 12,
                           scrollwheel: false,
                           center: eval("("+locations[1]["coordinates"]+")"),
                           mapTypeId: google.maps.MapTypeId.ROADMAP,
                           zoomControl: false,
                           mapTypeControl: false,
                           scaleControl: false,
                           panControl: false,
                           fullscreenControl: true,
                           navigationControl: false,
                           streetViewControl: false,
                           animation: google.maps.Animation.BOUNCE,
                           gestureHandling: 'cooperative',
                           styles: [{
                               "featureType": "administrative",
                               "elementType": "labels.text.fill",
                               "stylers": [{
                                   "color": "#444444"
                               }]
                           }]
                       });


                       var boxText = document.createElement("div");
                       boxText.className = 'map-box'
                       var currentInfobox;
                       var boxOptions = {
                           content: boxText,
                           disableAutoPan: true,
                           alignBottom: true,
                           maxWidth: 0,
                           pixelOffset: new google.maps.Size(-145, -45),
                           zIndex: null,
                           boxStyle: {
                               width: "260px"
                           },
                           closeBoxMargin: "0",
                           closeBoxURL: "",
                           infoBoxClearance: new google.maps.Size(1, 1),
                           isHidden: false,
                           pane: "floatPane",
                           enableEventPropagation: false,
                       };
                       var markerCluster, marker, i;
                       var allMarkers = [];
                       var clusterStyles = [{
                           textColor: 'white',
                           url: '',
                           height: 50,
                           width: 50
                       }];


                       for (i = 0; i < locations.length; i++) {
                           marker = new google.maps.Marker({
                               position: eval("("+locations[i]["coordinates"]+")"),
                               //icon: locations[i][4],
                               id: i
                           });

                           allMarkers.push(marker);
                           var ib = new InfoBox();
                           google.maps.event.addListener(ib, "domready", function () {
                               cardRaining()
                           });
                           google.maps.event.addListener(marker, 'click', (function (marker, i) {
                               return function () {
                                   ib.setOptions(boxOptions);
                                   // the code below is for show the popup on map
                                   boxText.innerHTML = locationData("",locations[i]["categoty"],locations[i]["place_name"],locations[i]["address"],"");
                                   ib.close();
                                   ib.open(map, marker);
                                   currentInfobox = marker.id;
                                   var latLng = eval("("+locations[i]["coordinates"]+")");
                                   map.panTo(latLng);
                                   map.panBy(0, -180);
                                   google.maps.event.addListener(ib, 'domready', function () {
                                       $('.infoBox-close').click(function (e) {
                                           e.preventDefault();
                                           ib.close();
                                       });
                                   });
                               }
                           })(marker, i));
                       }
                       var options = {
                           imagePath: 'images/',
                           styles: clusterStyles,
                           minClusterSize: 2
                       };
                       markerCluster = new MarkerClusterer(map, allMarkers, options);
                       google.maps.event.addDomListener(window, "resize", function () {
                           var center = map.getCenter();
                           google.maps.event.trigger(map, "resize");
                           map.setCenter(center);
                       });

                       $('.nextmap-nav').click(function (e) {
                           e.preventDefault();
                           map.setZoom(15);
                           var index = currentInfobox;
                           if (index + 1 < allMarkers.length) {
                               google.maps.event.trigger(allMarkers[index + 1], 'click');
                           } else {
                               google.maps.event.trigger(allMarkers[0], 'click');
                           }
                       });
                       $('.prevmap-nav').click(function (e) {
                           e.preventDefault();
                           map.setZoom(15);
                           if (typeof (currentInfobox) == "undefined") {
                               google.maps.event.trigger(allMarkers[allMarkers.length - 1], 'click');
                           } else {
                               var index = currentInfobox;
                               if (index - 1 < 0) {
                                   google.maps.event.trigger(allMarkers[allMarkers.length - 1], 'click');
                               } else {
                                   google.maps.event.trigger(allMarkers[index - 1], 'click');
                               }
                           }
                       });
                       $('.map-item').click(function (e) {
                           e.preventDefault();
                           map.setZoom(15);
                           var index = currentInfobox;
                           var marker_index = parseInt($(this).attr('href').split('#')[1], 10);
                           google.maps.event.trigger(allMarkers[marker_index], "click");
                           if ($(this).hasClass("scroll-top-map")) {
                               $('html, body').animate({
                                   scrollTop: $(".map-container").offset().top + "-80px"
                               }, 500)
                           }
                           else if ($(window).width() < 1064) {
                               $('html, body').animate({
                                   scrollTop: $(".map-container").offset().top + "-80px"
                               }, 500)
                           }
                       });
                       var zoomControlDiv = document.createElement('div');
                       var zoomControl = new ZoomControl(zoomControlDiv, map);

                       function ZoomControl(controlDiv, map) {
                           zoomControlDiv.index = 1;
                           map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);
                           controlDiv.style.padding = '5px';
                           var controlWrapper = document.createElement('div');
                           controlDiv.appendChild(controlWrapper);
                           var zoomInButton = document.createElement('div');
                           zoomInButton.className = "mapzoom-in";
                           controlWrapper.appendChild(zoomInButton);
                           var zoomOutButton = document.createElement('div');
                           zoomOutButton.className = "mapzoom-out";
                           controlWrapper.appendChild(zoomOutButton);
                           google.maps.event.addDomListener(zoomInButton, 'click', function () {
                               map.setZoom(map.getZoom() + 1);
                           });
                           google.maps.event.addDomListener(zoomOutButton, 'click', function () {
                               map.setZoom(map.getZoom() - 1);
                           });
                       }


                   }

                   var map = document.getElementById('map-main');
                   if (typeof (map) != 'undefined' && map != null) {
                       google.maps.event.addDomListener(window, 'load', mainMap);
                   }
                   var markerIcon2 = {
                       url: 'images/marker.png',
                   }

                   function singleMap() {
                       var myLatLng = {
                           lng: $('#singleMap').data('longitude'),
                           lat: $('#singleMap').data('latitude'),
                       };
                       var single_map = new google.maps.Map(document.getElementById('singleMap'), {
                           zoom: 14,
                           center: myLatLng,
                           scrollwheel: false,
                           zoomControl: false,
                           mapTypeControl: false,
                           scaleControl: false,
                           panControl: false,
                           navigationControl: false,
                           streetViewControl: false,
                           styles: [{
                               "featureType": "landscape",
                               "elementType": "all",
                               "stylers": [{
                                   "color": "#f2f2f2"
                               }]
                           }]
                       });
                       var marker = new google.maps.Marker({
                           position: myLatLng,
                           map: single_map,
                           icon: markerIcon2,
                           title: 'Our Location'
                       });
                       var zoomControlDiv = document.createElement('div');
                       var zoomControl = new ZoomControl(zoomControlDiv, single_map);

                       function ZoomControl(controlDiv, single_map) {
                           zoomControlDiv.index = 1;
                           single_map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);
                           controlDiv.style.padding = '5px';
                           var controlWrapper = document.createElement('div');
                           controlDiv.appendChild(controlWrapper);
                           var zoomInButton = document.createElement('div');
                           zoomInButton.className = "mapzoom-in";
                           controlWrapper.appendChild(zoomInButton);
                           var zoomOutButton = document.createElement('div');
                           zoomOutButton.className = "mapzoom-out";
                           controlWrapper.appendChild(zoomOutButton);
                           google.maps.event.addDomListener(zoomInButton, 'click', function () {
                               single_map.setZoom(single_map.getZoom() + 1);
                           });
                           google.maps.event.addDomListener(zoomOutButton, 'click', function () {
                               single_map.setZoom(single_map.getZoom() - 1);
                           });
                       }
                   }

                   var single_map = document.getElementById('singleMap');
                   if (typeof (single_map) != 'undefined' && single_map != null) {
                       google.maps.event.addDomListener(window, 'load', singleMap);
                   }
               });
});//(this.jQuery);
