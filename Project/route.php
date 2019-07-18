<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <title>Hello, world!</title>


    <style type="text/css">
        
        body
        {

            background-image: url(https://www.railwaypro.com/wp/wp-content/uploads/2016/11/Beijing-night_ed8a91_663f0b5c1be8445a96e59dab991d3500.jpg);
            background-repeat: no-repeat;
            background-size: 100% 175%;
        }


        #map 
        {
            height: 500px;
            width: 100%;

        }

        
        #origin-input,
        #destination-input 
        {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            text-overflow: ellipsis;
            width: 200px;

        }

        .row 
        {
            padding-left: 25%;
            margin-top: 20%;
        }

        .col-sm {

            margin-top: 5%;

        }

        .alert-info {

            background-color: black;
            color: yellow;

        }
        
        form
        {
            margin-left: 10%;
        }

        label {

            color: white;



        }

        #sub
        {
            color:white;
            margin-top: 25%;
            position: relative;
            left:-50%;
        }
        
        #back {

            background-color: #222222;
        
        }



        .navbar {

            background: linear-gradient(to top, #0f487d 0%, #20151f 100%);


            padding-left: 46%;



        }

        h2 {
            color: white;
        }

    </style>



</head>

<body>

    <nav class="navbar ">


        <a href="home.php" id="hh">
            <h2>BMTC</h2>
        </a>

    </nav>

    <form class="form-inline" onsubmit="return false">
        <div class="row">

            <div class="col-sm">
                <label for="origin-input">Source</label>
                <input id="origin-input" class="form-control mr-sm-2" name="source" type="text" placeholder="Enter an origin location">
            </div>

            <div class="col-sm">

            </div>
            <div class="col-sm">

            </div>


            <div class="col-sm">
                <label for="destination-input">Destination</label>
                <input id="destination-input" class="form-control mr-sm-2" name="destination" type="text" placeholder="Enter a destination location">
            </div>
            
            <div class="col-sm" id="sub">
                
                <a class="btn btn-outline-success my-2 my-sm-0 openmodal" href="#contact" onclick="calcRoute()" data-toggle="modal" data-id="Peggy Guggenheim Collection - Venice">Contact</a>

            </div>
        </div>

    </form>


    <div class="modal fade" id="contact" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="back">
                <div class="modal-header">
                    <h4>Contact</h4>
                </div>
                <div class="modal-body">
                    <div class="p-2 flex-shrink-1 bd-highlight">

                        <div id="map"></div>
                        <div id="output"></div>

                    </div>


                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal" href="pr111100.html">Close</a>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwJ2Vepe9L2Miuh7QH87SR_RItIXHlX6Q&libraries=places"></script>

    <script type="text/javascript">
        var myLatLng = {
            lat: 51.5,
            lng: -0.1
        };
        
        var mapOptions = {
            center: myLatLng,
            zoom: 7

        };

        var bb11 = "";
        //create map
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);

        //create a DirectionsService object to use the route method and get a result for our request
        var directionsService = new google.maps.DirectionsService();

        //create a DirectionsRenderer object which we will use to display the route
        var directionsDisplay = new google.maps.DirectionsRenderer();

        //bind the DirectionsRenderer to the map
        directionsDisplay.setMap(map);

        $('#contact').on('shown.bs.modal', function() {
            google.maps.event.trigger(map, "resize");
        });
        
        
        //define calcRoute function
        function calcRoute() 
        {
            //create request
            var request = {
                origin: document.getElementById("origin-input").value,
                destination: document.getElementById("destination-input").value,
                travelMode: 'TRANSIT'

            }


            //pass the request to the route method
            directionsService.route(request, function(result, status) {
                if (status == google.maps.DirectionsStatus.OK) {

                    //Get distance and time

                    $("#output").html("<div class='alert-info'>From: " + document.getElementById("origin-input").value + ".<br />To: " + document.getElementById("destination-input").value + "<br>Via:" + result.routes[0].legs[0].steps[1].transit.arrival_stop.name + ".<br /> Distance: " + result.routes[0].legs[0].distance.text + ".<br />Duration: " + result.routes[0].legs[0].duration.text + "</br> Bus: " + result.routes[0].legs[0].steps[1].transit.line.short_name + ".</div>");
                    
                    
                    
                    console.log(result.routes[0]);
                   
                    console.log(result.routes[0].legs[0].steps[1].transit.arrival_stop.name);
                    console.log(result.routes[0].legs[0].steps[1].transit.line.short_name);
                    //display route
                    directionsDisplay.setDirections(result);

                    var x = document.querySelectorAll("#map > div > div > div:nth-child(1) > div:nth-child(3) > div > div:nth-child(4) > div:nth-child(4) > div > span");

                } 
                
                else {
                    //delete route from map
                    directionsDisplay.setDirections({
                        routes: []
                    });
                    //center map in London
                    map.setCenter(myLatLng);

                    //show error message
                    $("#output").html("<div class='alert-danger'>Could not retrieve Bus distance.</div>");
                }
            });



        }

        //create autocomplete objects for all inputs
        var options = {
            types: ['(cities)']
        }

        var input1 = document.getElementById("origin-input");
        var autocomplete1 = new google.maps.places.Autocomplete(input1, options);

        var input2 = document.getElementById("destination-input");
        var autocomplete2 = new google.maps.places.Autocomplete(input2, options);

    </script>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
