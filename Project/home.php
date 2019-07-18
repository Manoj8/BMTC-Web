<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style type="text/css">
        html,
        body {
            height: 100%;
            padding: 0;
            margin: 0;
            overflow-x: hidden;

        }

        body {
            position: relative;
            min-height: 300px;

            background-image: url(https://www.swissnexindia.org/wp-content/uploads/sites/5/2016/11/Bangalore.jpg);
            background-size: 100% 100%;
        }

        body * {
            font-family: Arial, Geneva, SunSans-Regular, sans-serif;
            font-size: 14px;
            color: #333;
            line-height: 22px;
        }


        html,
        body {
            height: 100%;
            padding: 0;
            margin: 0;
        }

        body {
            background-color: #69c;
            position: relative;
            min-height: 500px;
        }

        body * {
            font-family: Arial, Geneva, SunSans-Regular, sans-serif;
            font-size: 14px;
            color: #333;
            line-height: 22px;
        }

        #wrapper11 {
            width: 700px;
            height: 350px;
            margin: -200px 0 0 -350px;
            position: absolute;
            left: 50%;
            top: 50%;
            box-shadow: 0 5px 15px #013;
        }

        #carousel11 {
            width: 700px;
            height: 350px;
            overflow: hidden;
        }

        #carousel11 img {
            display: block;
            float: left;
        }

        #pager {
            text-align: right;
            padding: 20px 45px 0 0;
        }

        #pager a {
            background-color: #356;
            display: inline-block;
            width: 15px;
            height: 15px;
            margin-right: 6px;
            border-radius: 10px;
            box-shadow: 0 1px 1px #cef;
        }

        #pager a.selected {
            background-color: #134;
        }

        #pager a span {
            display: none;
        }

        #thumbs {
            display: none;
            border: 1px solid rgba(0, 0, 0, 0.8);
            background-color: rgba(0, 0, 0, 0.5);
            width: 150px;
            height: 75px;
            padding: 10px;
            position: absolute;
            top: 240px;
            right: 10px;
            z-index: 10;
        }

        #thumbs img {
            display: block;
            float: left;
        }

        #wrapper {

            width: 100%;

            height: 100px;
            margin-top: 10%;

        }

        #carousel {
            margin-top: -60px;
        }

        #carousel div {
            text-align: center;
            width: 125px;
            height: 140px;
            padding: 0 20px;
            float: left;
            position: relative;
        }

        #carousel div img {
            border: none;
            width: 100%;
            height: auto;
        }

        #carousel div span {
            display: none;
        }

        #carousel div:hover span,
        #carousel div.hover span {
            background-color: #333;
            color: #fff;
            display: inline-block;
            width: 100px;
            padding: 2px 0;
            margin: 0 0 0 -50px;
            position: absolute;
            bottom: 0;
            left: 50%;
            border-radius: 3px;
        }

        #pager {
            text-align: center;
            padding-top: 20px;
        }

        #pager a {
            background: #ccc;
            display: inline-block;
            border-radius: 5px;
            width: 10px;
            height: 10px;
            margin: 0 2px;
        }

        #pager a.selected {
            background: #999;
        }

        #pager a:hover {
            background: #666;
        }

        #pager a span {
            display: none;
        }

        footer
        {
            background: linear-gradient(to bottom, #000000 0%, #ffcc66 175%);
        }

        nav
        {
            background: linear-gradient(to top, #6d3e39 0%, #20151f 100%);
        }

    </style>


</head>

<body>
    <nav>
        <div class="nav-wrapper">

            <br>
            <a href="#" class="brand-logo center">BMTC</a>

        </div>
    </nav>
    <br><br>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

   
   
   
    <div id="wrapper">
        <div id="carousel">
            <div>
                <a href="route.php"><img src="http://icons.iconarchive.com/icons/graphicloads/100-flat/256/zoom-search-2-icon.png" alt="fruit1" width="400" height="400" /></a>
                <span>Search</span>
            </div>
            
            <div>
                <a href="login.php"><img src="https://www.logolynx.com/images/logolynx/15/1588b3eef9f1607d259c3f334b85ffd1.png" width="400" height="400" /></a>
                <span>Login</span>
            </div>
            
            <div>
                <a href="blog.php"><img src="https://www.freeiconspng.com/uploads/blogger-logo-icon-png-0.png" width="200" height="200" /></a>
                <span>Blog</span>
            </div>

        </div>
        <div id="pager"></div>
    </div>

    <br><br>




    <script src="http://code.jquery.com/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script src="jquery.carouFredSel-6.2.js" type="text/javascript"></script>


    <script type="text/javascript">
        $(function() {

            $('#carousel').carouFredSel({
                width: '100%',
                items: {
                    visible: 'odd+2'
                },
                scroll: {
                    pauseOnHover: true,
                    onBefore: function() {
                        $(this).children().removeClass('hover');
                    }
                },
                auto: {
                    items: 1,
                    easing: 'linear',
                    duration: 1250,
                    timeoutDuration: 0
                },
                pagination: {
                    items: 1,
                    duration: 0.5,
                    queue: 'last',
                    onAfter: function() {
                        var cur = $(this).triggerHandler('currentVisible'),
                            mid = Math.floor(cur.length / 2);

                        cur.eq(mid).addClass('hover');
                    }
                }
            });

        });



        $(function() {
            var thumbs = $('#thumbscarousel');

            $('#carousel11').carouFredSel({
                items: 1,
                scroll: {
                    fx: 'crossfade'
                },
                auto: {
                    timeoutDuration: 5000,
                    duration: 2000
                },
                pagination: {
                    container: '#pager',
                    duration: 300
                }
            });

            thumbs.carouFredSel({
                circular: false,
                auto: false,
                width: 150,
                height: 75,
                scroll: {
                    duration: 200
                },
                items: {
                    visible: 1,
                    width: 150,
                    height: 75
                }
            });

            $('#pager').hover(function() {
                var current = $('#carousel11').triggerHandler('currentPosition');
                thumbs.trigger('slideTo', [current, 0, true, {
                    fx: 'none'
                }]);
                $('#thumbs').stop().fadeTo(300, 1);
            }, function() {
                $('#thumbs').stop().fadeTo(300, 0);
            });

            $('#pager a').mouseenter(function() {
                var index = $('#pager a').index($(this));

                //	clear the queue
                thumbs.trigger('queue', [
                    []
                ]);

                //	scroll
                thumbs.trigger('slideTo', [index, {
                    queue: true
                }]);
            });
        });

    </script>

    <!--JavaScript at end of body for optimized loading-->
</body>

</html>
