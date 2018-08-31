
$(function() {
               $.get("response_activity.php", function (data) {
                   //var locations = JSON.parse(data);
                   "use strict";

                    var locations = [{"audience":"Parent","activity_title":"Supporting children through transitions","address":"Malvern Town Hall Banquet Room Melbourne VIC","coordinates":"{lat: -37.815145, lng: 144.9667776}"},{"audience":"Parent","activity_title":"Working with Challenging Behaviour in Children","address":"132 Springfield Rd Blackburn VIC","coordinates":"{lat: -37.811025, lng: 145.156065}"},{"audience":"Parent","activity_title":"Successfully Managing Children with ADHD","address":"St Bernard's College Essendon Melbourne VIC","coordinates":"{lat: -37.74979, lng: 144.88295}"},{"audience":"Children","activity_title":"Solidarity with Children in Detention Story Time","address":"Fitzroy Library Fitzroy VIC","coordinates":"{lat: -37.80188, lng: 144.9796}"},{"audience":"Children","activity_title":"School Holiday Spellcraft Class for Children","address":"17\/331-339 Bourke St Melbourne VIC","coordinates":"{lat: -37.814598, lng: 144.96408}"},{"audience":"Parent","activity_title":"Sensory Processing Disorder in Children with ASD","address":"Irabina Autism Services Bundoora VIC","coordinates":"{lat: -37.7075, lng: 145.06139}"},{"audience":"Parent","activity_title":"Emotional Intelligence Skills in Children","address":"Strathcona Baptist Girls Grammar Canterbury VIC","coordinates":"{lat: -37.830093, lng: 145.07996}"},{"audience":"Children","activity_title":"Special Children's Halloween Tour","address":"Melbourne General Cemetery Parkville Vic","coordinates":"{lat: -37.790802, lng: 144.96626}"},{"audience":"Parent","activity_title":"Strategies for Helping Children with Social Difficulties in the Playground","address":"Okey Dokey Childhood Psychology Bayswater VIC","coordinates":"{lat: -37.843, lng: 145.268}"},{"audience":"Parent","activity_title":"Managing Anxiety in Preschool and Primary Aged Children","address":"Okey Dokey Childhood Psychology Bayswater VIC","coordinates":"{lat: -37.843, lng: 145.268}"},{"audience":"Parent","activity_title":"Working with young people with borderline personality disorder","address":"Royal Children's Hospital Mental Health Travancore Conference Room 50 Flemington Street Travancore VIC","coordinates":"{lat: -37.7813, lng: 144.9354}"},{"audience":"Parent","activity_title":"Managing Challenging Behaviour at Home","address":"The Salvation Army Mooroolbark Corps 305 Manchester Road Mooroolbark 3138","coordinates":"{lat: -37.761741, lng: 145.315062}"},{"audience":"Children","activity_title":"Animal Land Children's Farm","address":"190 Duncans Ln Diggers Rest VIC ","coordinates":"{lat: -37.630555, lng: 144.746009}"},{"audience":"Children","activity_title":"Collingwood Children's Farm","address":"18 St Heliers St Abbotsford VIC","coordinates":"{lat: -37.802135, lng: 145.004319}"},{"audience":"Children","activity_title":"Enchanted Adventure Garden","address":"55 Purves Rd Arthurs Seat VIC ","coordinates":"{lat: -38.359141, lng: 144.953154}"},{"audience":"Children","activity_title":"Clip 'N' Climb","address":"144 Murphy St Richmond VIC","coordinates":"{lat: -37.818436, lng: 145.010673}"},{"audience":"Children","activity_title":"Wonderland Junior","address":"Waterfront City 101 Waterfront way Docklands VIC","coordinates":"{lat: -37.811852, lng: 144.937525}"}]

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
                           center: eval("("+locations[0]["coordinates"]+")"),
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
                                   boxText.innerHTML = locationData("",locations[i]["audience"],locations[i]["activity_title"],locations[i]["address"],"");
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
