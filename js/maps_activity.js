
(function($) {
               $.get("response_activity.php", function (data) {
                   var locations = JSON.parse(data);
                   "use strict";

                   //$(".listsearch-header").html(data);


                   // var markerIcon = {
                   //     anchor: new google.maps.Point(22, 16),
                   //     url: 'images/marker.png',
                   // };

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
                       boxText.className = 'map-box';
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
                                   // the code below is for showing the popup on map
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


                   } //This is the end of mainMap


                   $(function () {
                       mainMap();
                   });

                   // var map = document.getElementById('map-main');
                   // if (typeof (map) != 'undefined' && map != null) {
                   //     google.maps.event.addDomListener(window, 'load', mainMap);
                   // }
                   // var markerIcon2 = {
                   //     url: 'images/marker.png',
                   // }
                   //
                   // function singleMap() {
                   //     var myLatLng = {
                   //         lng: $('#singleMap').data('longitude'),
                   //         lat: $('#singleMap').data('latitude'),
                   //     };
                   //     var single_map = new google.maps.Map(document.getElementById('singleMap'), {
                   //         zoom: 14,
                   //         center: myLatLng,
                   //         scrollwheel: false,
                   //         zoomControl: false,
                   //         mapTypeControl: false,
                   //         scaleControl: false,
                   //         panControl: false,
                   //         navigationControl: false,
                   //         streetViewControl: false,
                   //         styles: [{
                   //             "featureType": "landscape",
                   //             "elementType": "all",
                   //             "stylers": [{
                   //                 "color": "#f2f2f2"
                   //             }]
                   //         }]
                   //     });
                   //     var marker = new google.maps.Marker({
                   //         position: myLatLng,
                   //         map: single_map,
                   //         icon: markerIcon2,
                   //         title: 'Our Location'
                   //     });
                   //     var zoomControlDiv = document.createElement('div');
                   //     var zoomControl = new ZoomControl(zoomControlDiv, single_map);
                   //
                   //     function ZoomControl(controlDiv, single_map) {
                   //         zoomControlDiv.index = 1;
                   //         single_map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);
                   //         controlDiv.style.padding = '5px';
                   //         var controlWrapper = document.createElement('div');
                   //         controlDiv.appendChild(controlWrapper);
                   //         var zoomInButton = document.createElement('div');
                   //         zoomInButton.className = "mapzoom-in";
                   //         controlWrapper.appendChild(zoomInButton);
                   //         var zoomOutButton = document.createElement('div');
                   //         zoomOutButton.className = "mapzoom-out";
                   //         controlWrapper.appendChild(zoomOutButton);
                   //         google.maps.event.addDomListener(zoomInButton, 'click', function () {
                   //             single_map.setZoom(single_map.getZoom() + 1);
                   //         });
                   //         google.maps.event.addDomListener(zoomOutButton, 'click', function () {
                   //             single_map.setZoom(single_map.getZoom() - 1);
                   //         });
                   //     }
                   // }
                   //
                   // var single_map = document.getElementById('singleMap');
                   // if (typeof (single_map) != 'undefined' && single_map != null) {
                   //     google.maps.event.addDomListener(window, 'load', singleMap);
                   // }
               });
})(this.jQuery);
