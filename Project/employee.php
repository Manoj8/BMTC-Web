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
        body {


            background-image: url(https://c1.staticflickr.com/4/3088/2326262672_304e18b04c_b.jpg);
            background-size: 100% 127%;
        }

        form 
        {
            padding-left: 10%;
            padding-right: 10%;
            margin-left: 10%;
            margin-right: 10%;
            margin-top:7%;
        }


        label {

            color: White;

        }

        .navbar 
        {
            background: linear-gradient(to bottom, #000000 0%, #ffcc66 175%);
            padding-left: 46%;
        }


        h2 
        {
            color: white;
        }

        button
        {
            margin-left:45%;
            margin-top: 2%;
        }
        
    </style>


</head>

<body>

    <nav class="navbar">


        <a href="home.php">
            <h2>BMTC</h2>
        </a>

    </nav>

    <br>

    <form method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="firstname">FirstName</label>
                <input type="text" class="form-control" id="firstname" name="firstname">
            </div>
            <div class="form-group col-md-6">
                <label for="lastname">LastName</label>
                <input type="text" class="form-control" id="lastname" name="lastname">
            </div>
            <div class="form-group col-md-6">
                <label for="firstname">Source</label>
                <input type="text" class="form-control" id="source">
            </div>
            <div class="form-group col-md-6">
                <label for="lastname">Destination</label>
                <input type="text" class="form-control" id="destination">
            </div>

            <div class="form-group col-md-6">

                <a class="btn btn-outline-success my-2 my-sm-0 openmodal" href="#contact" onclick="calcRoute()" data-toggle="modal" data-id="Peggy Guggenheim Collection - Venice">Get</a>

            </div>


            <div class="form-group col-md-6">
                <label for="inputCity">Bus No</label>
                <input type="text" class="form-control" id="busno" name="busnos">
            </div>
            <div class="form-group col-md-6">

                <label for="inputZip">Age</label>
                <input type="text" class="form-control" id="inputZip" name="age">

            </div>
            <div class="form-group col-md-6">

                <label for="inputZip">Occupation</label>
                <input type="text" class="form-control" id="inputZip" name="occupation">

            </div>

        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

    <div id="map"></div>

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
        //create a DirectionsService object to use the route method and get a result for our request


        var map = new google.maps.Map(document.getElementById('map'), mapOptions);

        //create a DirectionsService object to use the route method and get a result for our request
        var directionsService = new google.maps.DirectionsService();

        //create a DirectionsRenderer object which we will use to display the route
        var directionsDisplay = new google.maps.DirectionsRenderer();


        //define calcRoute function
        function calcRoute() {
            //create request
            var request = {
                origin: document.getElementById("source").value,
                destination: document.getElementById("destination").value,
                travelMode: 'TRANSIT'

            }


            //pass the request to the route method
            directionsService.route(request, function(result, status) {
                if (status == google.maps.DirectionsStatus.OK) {

                    //Get distance and time


                    var x = document.querySelectorAll("#map > div > div > div:nth-child(1) > div:nth-child(3) > div > div:nth-child(4) > div:nth-child(4) > div > span");

                    document.getElementById("busno").value = result.routes[0].legs[0].steps[1].transit.line.short_name;
                    console.log(result.routes[0].legs[0].steps[1].transit.line.short_name);

                }
                else
                {
                    //delete route from map
                    directionsDisplay.setDirections({
                        routes: []
                    });
                    //center map in London
                    map.setCenter(myLatLng);

                    //show error message

                }
            });
            
        }

        //create autocomplete objects for all inputs
        var options = {
            types: ['(cities)']
        }

        var input1 = document.getElementById("source");
        var autocomplete1 = new google.maps.places.Autocomplete(input1, options);

        var input2 = document.getElementById("destination");
        var autocomplete2 = new google.maps.places.Autocomplete(input2, options);

    </script>

    <?php 
    
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bmtc";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

         if ($conn->connect_error) 
            die("Connection failed: " . $conn->connect_error);

        if(isset($_POST['submit']))
        {
            $sql = "INSERT INTO employee (f_name, l_name, bus_no, age, designation)
            VALUES ('".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["busnos"]."','".$_POST["age"]."','".$_POST["occupation"]."')";
            $result = mysqli_query($conn,$sql);
        }
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>

</html>
