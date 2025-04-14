<!DOCTYPE HTML>
<html lang="en">
<head>
   
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i,500,600i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

    <!-- Animate.css -->
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i,500,600i,700"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="/assets/css/animate.css">
    
    <link rel="stylesheet" href="/assets/css/icomoon.css">
    
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/css/flexslider.css">

    <link rel="stylesheet" href="/assets/css/style.css">

    <link rel="stylesheet" href="/assets/css/admin_style.css"> 

    <link rel="stylesheet" href="/assets/css/ngoCart.css">

    <script src="/assets/js/modernizr-2.6.2.min.js"></script>

    
</head>
<body>

    <div id="page">
        <header class="header">
            <div class="logo">Cloth Connect </div>
            <nav>
                <ul>
                    <li><a href="ngo-homepage">Home</a></li>
                    <li><a href=""class="active"> Cart </a></li>
                    <li><a href="ngo-orders"> Orders</a></li>
                    <li><a href="ngo-profile">Profile</a></li>
                    <li><a href="logout">Logout</a></li>
                </ul>
            </nav>
        </header>
        <div class="cart-container">
            <h2>Your Cart</h2>
            <div class="cart-list">
                @foreach ($cartdata as $cart)
                    <div class="cart-item">
                        <div class="cart-details">
                        <p><strong>Address:</strong> {{ $cart->address }}</p>
                        <p><strong>Area:</strong> {{ $cart->area }}</p>
                        <p><strong>City:</strong> {{ $cart->city }}</p>
                        <p><strong>Size:</strong> {{ $cart->size }}</p>
                        <p><strong>Type:</strong> {{ $cart->Type }}</p>
                        <p><strong>Number:</strong> {{ $cart->number }}</p>
                        </div>
                        <div class="cart-buttons">
                        <a class="btn request-btn" href="request/{{ $cart->UDID }}"><span>Request</span></a>
                        <a class="btn remove-btn" href="remove/{{ $cart -> UDID }}"><span>Remove</span></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/jquery.easing.1.3.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/jquery.waypoints.min.js"></script>
        <script src="/assets/js/jquery.stellar.min.js"></script>
        <script src="/assets/js/jquery.flexslider-min.js"></script>
        <script src="/assets/js/zoomerang.js"></script>
        <script src="/assets/js/main.js"></script>

        @if(session('success'))
            <script>
                alert("{{ session('success') }}");
            </script>
        @endif

</body>
</html>
