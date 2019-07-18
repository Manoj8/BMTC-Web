<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <style type="text/css">
        body {

            background-color: #222222;

            background-image: url(https://images.thrillophilia.com/image/upload/s--rPY2mXIF--/c_fill,f_auto,fl_strip_profile,h_775,q_auto,w_1600/v1/images/photos/000/013/483/original/1520660871_Vidhana-Soudha1.jpg.jpg?1520660871);
            background-size: 100% 130%;
        }


        .row {

            padding-left: 10%;
            padding-right: 10%;
            padding-top: 5%;
            padding-bottom: 10%;

            margin-top: 8%;

            width: 600px;
            height: 400px;

            border-style: outset;
        }

        .input-field col s12 {

            border: 1px solid;
            border-style: outset;

        }


        #cc {

            padding-left: 40%;

        }


        nav {

            background: linear-gradient(to top, #2a3062 0%, #20151f 100%);

        }
        

    </style>


</head>

<body>


    <nav>
        <div class="nav-wrapper">

            <a href="home.php" class="brand-logo center">BMTC</a>

        </div>
    </nav>
    <div class="row">
        <div class="input-field col s12">
            <i class="material-icons prefix inc">account_circle</i>
            <input id="icon_prefix" type="text">
            <label for="icon_prefix">First Name</label>
        </div>
        <div class="input-field col s12" >
            <i class="material-icons prefix inc">lock_open</i>
            <input id="icon_password" type="password">
            <label for="icon_password">Password</label>
        </div>
        <div class="col s12" id="cc">
            <a class="waves-effect waves-light btn" onclick="check()">LogIn</a>

        </div>
    </div>
    
    
    <script type="text/javascript">
        function check() {
            if (document.getElementById("icon_prefix").value == "root" && document.getElementById("icon_password").value == "root") {
                document.location.href = "employee.php";
            } else {
                alert(" Invalid ");
            }

        }

    </script>

</body>

</html>
