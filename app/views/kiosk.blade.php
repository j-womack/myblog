<!DOCTYPE html>
<html>
    <head>
        <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic' rel='stylesheet' type='text/css'>
        <title>Simple Map</title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="utf-8">
        <style>
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
                background-color: black;
                font-family: 'Playfair Display', serif;
            }
            #map {
                height: 55%;
                width: 45%;
                float: left;
            }
            #id {
                width: 33%;
            }
            #calendar {
                float: right;
            }
            #clock {
                
            }
            #weatherBox {
                height: 280px;
                margin: 10px;
                padding: 0px;
                color: white;
            }
            .boxes {
                width: 235px;
                height: 280px;
                /*padding: 0px;
                margin: 0px;*/
                float: left;
                border: 1px solid #FFF;
                text-align: center;
            }
            .date {
                font-size: 1.5em;
            }
            ul {
                list-style-type: none;
            }
        </style>
    </head>
    <body>
        <div id="map" class="col-lg-6"></div>
        <div id="calendar" class="col-lg-6">
            <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showPrint=0&amp;showCalendars=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=noisefights%40gmail.com&amp;color=%232952A3&amp;ctz=America%2FChicago" style="border-width:0" width="680" height="600" frameborder="0" scrolling="no"></iframe>
        </div>
        <div id="clock"></div>
        <div id="weatherBox"></div>

        <script src="/js/jquery-2.1.4.min.js"></script>
        <script src="/js/jquery-ui.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/clean-blog.js"></script>
        <script src="/js/jquery.MyDigitClock.js"></script>
        <script>
            var map;
            var styleArray = 
            [{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}];
            var id = 4671654;

            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 30.300, lng: -97.750},
                    zoom: 12,
                    styles: styleArray
                });
                var trafficLayer = new google.maps.TrafficLayer();
                trafficLayer.setMap(map);
            }

            function currentWeather(id) {
                // var place = location;
                
                // console.log(latitude);
                var ajaxRequest = $.get("http://api.openweathermap.org/data/2.5/forecast/daily", {
                    APPID: "1908faf007c44440777aa4146e959e53",
                    // q: place,
                    id: id,
                    cnt: 5,
                    units: "imperial"
                });

                ajaxRequest.always(function(){
                    console.log('Sent');
                });

                ajaxRequest.fail(function(data, error) {
                    console.log(error);
                    console.log(ajaxRequest.status);
                });

                ajaxRequest.done(function(data) {
                    console.log('Success');
                    console.log(data);

                    // Keeps the append method in check
                    $('#weatherBox').html("");

                    // Assigns the appropriate day label
                    for(var i=0; i<data.list.length; i++){
                        
                        var t = data.list[i].dt;
                        var date = new Date(t*1000);
                        var formattedDate = date.toDateString();

                        // Assignment of variables based on weather data
                        var htmlString;

                        var tempMaxMin = "<li><h3>" + 
                            Math.round(data.list[i].temp.max) + "°/" +
                            Math.round(data.list[i].temp.min) + 
                            "°</li></h3>";

                        var icon = "<li><img src=\"http://openweathermap.org/img/w/"  + 
                            data.list[i].weather[0].icon + 
                            ".png\"></li>";

                        var clouds = "<li>Forecast: " + data.list[i].weather[0].description + "</li>";

                        var humidity = "<li>Humidity: " + data.list[i].humidity + "%</li>";

                        var wind = "<li>Wind speed: " + data.list[i].speed + " mph</li>";

                        // Assembling data into html boxes
                        htmlString = '<div class="boxes col-lg-4 row">' +
                        '<p class="date">' + formattedDate + '</p>' +
                        '<div id="textBox"><ul>' + 
                        tempMaxMin + icon + 
                        clouds + humidity + wind + 
                        '</ul></div></div>';
                        console.log(htmlString);
                        // Adding formatted data to html
                        $('#weatherBox').append(htmlString);
                    };
                });
            };

            currentWeather(id);
            
            $(function(){
                $("#clock").MyDigitClock({
                    fontSize:100, 
                    fontColor:"grey",
                    background:"#000",
                    fontWeight:"bold",
                    timeFormat: '{HH}:{MM}:{SS}'}
                );
            });
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsmyDlwyNZQBV-DRI-edHgv1cTvviywlg&callback=initMap"
        async defer></script>
    </body>
</html>
