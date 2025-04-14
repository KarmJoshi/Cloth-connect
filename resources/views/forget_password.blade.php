<!DOCTYPE HTML>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cloth Connect</title>

        <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i,500,600i,700"
            rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

        <link rel="stylesheet" href="/assets/css/animate.css">

        <link rel="stylesheet" href="/assets/css/icomoon.css">

        <link rel="stylesheet" href="/assets/css/bootstrap.css">

        <link rel="stylesheet" href="/assets/css/flexslider.css">

        <link rel="stylesheet" href="/assets/css/style.css">

        <link rel="stylesheet" href="/assets/css/register.css">

        <!-- <link rel="stylesheet" href="/assets/css/loginForm.css"> -->

        <script src="/assets/js/modernizr-2.6.2.min.js"></script>
        
    </head>

    <body>

        <div class="fh5co-loader"></div>

        <div id="page">
            <nav class="fh5co-nav" role="navigation">
                <div class="container">
                    
                    <div class="container2">
                        <form method="post" action="forgetPassword">
                            @csrf
                            <h1> Forget Password </h1>
                            <div class="input-container2">
                                <input type="email" name="TxtEmail" required>
                                <label>Email</label>
                            </div>
                            <button type="submit" name="BtnSubmit" class="submit-btn">Submit</button>
                        </form>
                    </div>
            </nav>

            <header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner"
                style="background-image: url(/assets/images/Donation04.jpg);" data-stellar-background-ratio="0.5">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="display-t js-fullheight">
                                <div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

    <!-- JS Files -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/jquery.easing.1.3.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.waypoints.min.js"></script>
    <script src="/assets/js/jquery.stellar.min.js"></script>
    <script src="/assets/js/jquery.flexslider-min.js"></script>
    <script src="/assets/js/zoomerang.js"></script>
    <script src="/assets/js/main.js"></script>

    <script>
        Zoomerang.config({
            maxHeight: 600,
            maxWidth: 900,
            bgColor: '#000',
            bgOpacity: .85
        }).listen('[data-trigger="zoomerang"]');
    </script>

    @if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif

    </body>
</html>

