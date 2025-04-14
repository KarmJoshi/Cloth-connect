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

    <link rel="stylesheet" href="/assets/css/loadingAnimation.css">

    <script src="/assets/js/modernizr-2.6.2.min.js"></script>
</head>

<body> 
    
<div id="loader">
    <div class="spinner"></div>
</div>

<!-- Main Page Content -->
<div id="page" style="display: none;">
    <header class="header">
        <div class="logo">Cloth Connect</div>
        <nav>
            <ul>
                <li><a href="" class="active">Home</a></li>
                <li><a href="user-donation">Donate</a></li>
                <li><a href="user-profile">Profile</a></li>
                <li><a href="logout">Logout</a></li>
            </ul>
        </nav>
    </header>

    <h1>Donation History</h1>

    <div class="table-container">
        <table>
            <tr>
                <th>Address</th>
                <th>Area</th>
                <th>City</th>
                <th>Size</th>
                <th>Type</th>
                <th>Number</th>
                <th>Image</th>
            </tr>
            @foreach ($donation as $don)
            <tr>
                <td>{{ $don->address }}</td>
                <td>{{ $don->area }}</td>
                <td>{{ $don->city }}</td>
                <td>{{ $don->size }}</td>
                <td>{{ $don->type }}</td>
                <td>{{ $don->number }}</td>
                <td>
                    <a href="{{ asset('storage/' . ltrim($don->image01, '/')) }}" target="_blank">
                        View Image
                    </a>
                </td>
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
    </body>
</html>
