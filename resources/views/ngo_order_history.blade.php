
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

    <link rel="stylesheet" href="/assets/css/admin_style.css">

    <link rel="stylesheet" href="/assets/css/loadingAnimation.css">

    <script src="/assets/js/modernizr-2.6.2.min.js"></script>

    
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
                <li><a href="ngo-homepage" >Home</a></li>
                <li><a href="ngo-cart">Cart</a></li>
                <li><a href="ngo-orders" class="active">orders</a></li>
                <li><a href="ngo-profile">Profile</a></li>
                <li><a href="logout">Logout</a></li>
            </ul>
        </nav>
    </header>
    
    <h1> order history </h1>
    <div class="table-container"> 
        <table>
            <tr>
                <th>Donar Name</th>
                <th> NGO Name</th>
                <th>Drop Address</th>
                <th>Type</th>
                <th>Size</th>
                <th>Number of cloth</th>
            </tr>
            @foreach ($orders as $order )
                <tr>
                    <td> {{ $order -> firstname }} {{ $order -> lastname }}</td>
                    <td> {{ $order -> NGOname }}</td>
                    <td> {{ $order -> drop_address }}</td>
                    <td> {{ $order -> type }}</td>
                    <td> {{ $order -> size  }}</td>
                    <td> {{ $order -> number }}</td>
                </tr>
            @endforeach
        </table>
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
