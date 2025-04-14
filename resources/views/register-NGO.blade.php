<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cloth Connect</title>

    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i,500,600i,700"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="/assets/css/animate.css">
    <link rel="stylesheet" href="/assets/css/icomoon.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/flexslider.css">
    <link rel="stylesheet" href="/assets/css/formStyle.css">
    <link rel="stylesheet" href="/assets/css/style.css"> 
    <link rel="stylesheet" href="/assets/css/register.css">
    <script src="/assets/js/modernizr-2.6.2.min.js"></script>
    
</head>

<body>


<div class="fh5co-loader"></div>
<!-- Navigation -->
<nav class="fh5co-nav" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center logo-wrap">
                <div id="fh5co-logo"><a href="index.html">Cloth Connect<span>.</span></a></div>
            </div>
            <div class="col-xs-12 text-center menu-1 menu-wrap">
                <ul>
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="login">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
     
        <div class="hero-section">
        <div class="form-overlay">
            <div class="container2">
                <form action="register-NGO" method="post">
                    @csrf
                    <h1>Registration</h1>

                    <div class="input-container2">
                        <input type="text" name="TxtNGOname" required />
                        <label>NGO Name</label>
                    </div>

                    <div class="input-container2">
                        <input type="text" name="TxtAddress" required />
                        <label>Address</label>
                    </div>

                    <div class="input-container2">
                        <input type="text" name="TxtMobileNumber" required />
                        <label>Mobile Number</label>
                    </div>

                    <div class="input-container2">
                        <input type="email" name="TxtEmail" required />
                        <label>Email</label>
                    </div>

                    <div class="input-container2">
                        <input type="password" name="TxtPassword" required />
                        <label>Password</label>
                    </div>

                    <button type="submit" class="submit-btn">Submit</button>
                </form>
            </div>
        </div>
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
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/jquery.easing.1.3.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.waypoints.min.js"></script>
    <script src="/assets/js/jquery.stellar.min.js"></script>
    <script src="/assets/js/jquery.flexslider-min.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            Zoomerang
                .config({
                    maxHeight: 600,
                    maxWidth: 900,
                    bgColor: '#000',
                    bgOpacity: .85
                })
                .listen('[data-trigger="zoomerang"]')
        </script>
  
    

       
</body>

</html>