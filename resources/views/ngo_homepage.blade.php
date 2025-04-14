
<!DOCTYPE HTML>
<html lang="en">
<head>
   
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i,500,600i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/animate.css">
    
    <link rel="stylesheet" href="/assets/css/icomoon.css">
    
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/css/flexslider.css">

    <link rel="stylesheet" href="assets/css/HomePageClientCard.css">

    <link rel="stylesheet" href="/assets/css/style.css">

    <script src="/assets/js/modernizr-2.6.2.min.js"></script>

    <link rel="stylesheet" href="/assets/css/formStyle.css">

    <link rel="stylesheet" href="/assets/css/loadingAnimation.css">

</head>
<body>

<div id="loader">
    <div class="spinner"></div>
</div>

<div id="page">
    <header class="header">
        <div class="logo">Cloth Connect </div>
        <nav>
            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="ngo-cart">Cart</a></li>
                <li><a href="ngo-orders">orders</a></li>
                <li><a href="ngo-profile">Profile</a></li>
                <li><a href="logout">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="main-content">
        <div class="container">
            <div class="card-container">
                @foreach ($donation as $don)
                <div class='card'>
                    <img src="{{ asset('storage/' . ltrim($don->image01, '/')) }}" alt='User Photo' class='card__background'>
                    <div class='card__content flow'>
                        <div class='card__content--container flow'>
                            <h2 class='card__title'>{{ $don->firstname }} {{ $don->lastname }}</h2>
                            <p class='card__description'> Type: {{ $don->Type }} <br> Size : {{ $don -> size }} <br> Number of cloth: {{ $don -> number }}</p>
                        </div>
                        <form action='ngo-homepage/{{ $don->UDID }}' method='POST' style='display:inline;'>
                            @csrf
                            <button class='btn btn-primary btn-outline' type='submit'>Add to Cart</button>
                        </form>
                    </div>
                </div>
                @endforeach
        
            </div>
        </div>
    </div>
</div>


    <script src="/assets/js/loadingAnimation.js"></script>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/jquery.easing.1.3.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.waypoints.min.js"></script>
    <script src="/assets/js/jquery.stellar.min.js"></script>
    <script src="/assets/js/jquery.flexslider-min.js"></script>
    <script src="/assets/js/zoomerang.js"></script>
    <script src="/assets/js/main.js"></script>
    @if(session('error'))
            <script>
                alert("{{ session('error') }}");
            </script>
        @endif
</body>
</html>
