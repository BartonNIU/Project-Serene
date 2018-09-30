
//(function($) {


            //$(".listsearch-header").html(data);


            // var markerIcon = {
            //     anchor: new google.maps.Point(22, 16),
            //     url: 'images/marker.png',
            // };




function mainMap(locations) {
    function locationData(locationURL, locationCategory, locationTitle, locationAddress, locationTime) {
        //return ('<div class="map-popup-wrap"><div class="map-popup"><div class="infoBox-close"><i class="fa fa-times"></i></div><div class="map-popup-category">' + locationCategory + '</div><a href="' + locationURL + '" class="listing-img-content fl-wrap"></a> <div class="listing-content fl-wrap"><div class="listing-title fl-wrap"><h4><a href=' + locationURL + '>' + locationTitle + '</a></h4><span class="map-popup-location-info"><i class="fa fa-map-marker"></i>' + locationAddress + '</span></div></div></div></div>')
        return ('<div class="map-popup-wrap"><div class="map-popup"><div class="listing-content fl-wrap"><div class="infoBox-close"><i class="fa fa-times"></i></div>' +
            '<div class="listing-title fl-wrap"><h4><a href=' + locationURL + '>' + locationTitle + '</a></h4>' +
            '<span class="map-popup-location-info"><i class="material-icons">place</i>' + locationAddress + '</span>'+
            '<span class="map-popup-location-info"><i class="material-icons">event_available</i>' + locationTime + '</span></div>' +
            '<span class="map-popup-direction">' +
            '<a class="google customer directions"  target="_blank"  href ="https://www.google.com/maps/dir/?api=1&destination='+ locationAddress+'">' +
            '<i class="material-icons">directions</i><em>Directions</em></a>' +
            '<a class="facebook customer share" href="https://www.facebook.com/sharer.php?u=serene.tk/' + locationURL + '" title="Facebook share" target="_blank">' +
            '<i class="material-icons">share</i><em>Share</em></a></span></div></div></div></div>')
    }




    var map = new google.maps.Map(document.getElementById('map-main'), {
            zoom: 12,
            scrollwheel: false,
            center: eval("("+locations[0]["coordinates"]+")"), // eval("("+center_location+")"),//{lat: -37.8136, lng: 144.9621},
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
            position: eval("(" + locations[i]["coordinates"] + ")"),
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
                boxText.innerHTML = locationData("detail_act.php?event="+ encodeURI(locations[i]["activity_title"]), locations[i]["audience"], locations[i]["activity_title"], locations[i]["address"], locations[i]["date"]+ ",   "+ locations[i]["time"]);
                ib.close();
                ib.open(map, marker);
                currentInfobox = marker.id;
                console.log("currentinfobox value is :"+currentInfobox);
                var latLng = eval("(" + locations[i]["coordinates"] + ")");
                map.panTo(latLng);
                map.panBy(0, -180);
                //The code below for scrolling the matched list to the appropriate place.
                if(currentInfobox){
                    document.getElementById('map-item'+ currentInfobox).scrollIntoView({behavior: "instant", block: "center", inline: "nearest"});
                    //$('#map-item' + currentInfobox)[0].style.backgroundColor = '#49CEFF';
                    $('#map-item' + currentInfobox)[0].style.color= '#5ad3ff';
                    setTimeout(function() {
                        //$('#map-item' + currentInfobox)[0].style.backgroundColor = '#FFF';
                        setTimeout(function() {
                            $('#map-item' + currentInfobox)[0].style.color= '#999';

                        },500)
                        $('#map-item' + currentInfobox)[0].style.color= '#e474c9';
                    },500);
                }
                google.maps.event.addListener(ib, 'domready', function () {
                    $('.infoBox-close').click(function (e) {
                        e.preventDefault();
                        ib.close();
                    });

                    //The function below for share icon on map marker popups
                    $.fn.customerPopup = function (e, intWidth, intHeight, blnResize) {

                        // Prevent default anchor event
                        e.preventDefault();

                        // Set values for window
                        intWidth = intWidth || '500';
                        intHeight = intHeight || '400';
                        strResize = (blnResize ? 'yes' : 'no');

                        // Set title and open popup with focus on it
                        var strTitle = ((typeof this.attr('title') !== 'undefined') ? this.attr('title') : 'Social Share'),
                            strParam = 'width=' + intWidth + ',height=' + intHeight + ',resizable=' + strResize,
                            objWindow = window.open(this.attr('href'), strTitle, strParam).focus();
                    };

                    /* ================================================== */

                    $('.customer.share').on("click", function(e) {
                        $(this).customerPopup(e);
                    });

                    // $('.customer.directions').on("click", function(e) {
                    //     $(this).customerPopup(e);
                    // });

                    /* =================share icon popup end==================== */
                });

            }
        })(marker, i));
    }   //Marker ends here


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
        //var index = currentInfobox;
        var marker_index = parseInt($(this).attr('href').split('#')[1], 10);
        console.log(marker_index);
        google.maps.event.trigger(allMarkers[marker_index], "click");
        // if ($(this).hasClass("scroll-top-map")) {
        //     $('html, body').animate({
        //         scrollTop: $(".map-container").offset().top + "-80px"
        //     }, 500)
        // }
        // else if ($(window).width() < 1064) {
        //     $('html, body').animate({
        //         scrollTop: $(".map-container").offset().top + "-80px"
        //     }, 500)
        // }
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

} //This is the end of main map


function normalMap(){
    $.get("response_activity.php",function(data){
        var locations = JSON.parse(data);
        mainMap(locations);
//
//         // $('.map-item').click(function (e) {
//         //     //e.preventDefault();
//         //     map.setZoom(15);
//         //     //var index = currentInfobox;
//         //     var marker_index = parseInt($(this).attr('href').split('#')[1], 10);
//         //     console.log(marker_index);
//         //     google.maps.event.trigger(allMarkers[marker_index], "click");});
   });
}

$(function(){
        normalMap();

});



//Ajax for activity page userinput search
    function ajaxSearch_activity() {
        $.post("response_activity.php", $("#pageinput").serialize(), function (data) {
            var locations = JSON.parse(data);

            //$(".listsearch-header").html(data);
            mainMap(locations);
            //This is the end of mainMap
        });
    }




//})(this.jQuery);
