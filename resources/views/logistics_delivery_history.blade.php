
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

    <link rel="stylesheet" href="/assets/css/admin_style.css">
</head>
<body>

<div id="page">
    <header class="header">
        <div class="logo">Cloth Connect </div>
        <nav>
            <ul>
                <li><a href="logistics-homepage">Home</a></li>
                <li><a href="delivery-history" class="active">Delivery History</a></li>
                <li><a href="logistics-profile">Profile</a></li>
                <li><a href="logout">Logout</a></li>
            </ul>
        </nav>
    </header>
    <h1> Delivery History </h1>
    <div class="table-container">
        <table>
            <tr>
                <th>Donor Name</th>
                <th> NGO Name </th>
                <th> Pick Up Address </th>
                <th> Drop Address </th>
                <th> Donor ContactNumber </th>
                <th> Pickup_date </th>
                <th> Time </th>
            </tr>
            @foreach ($data as $datas)
            <tr>
                <td> {{ $datas->firstname }} {{ $datas->lastname }} </td>
                <td> {{ $datas->NGOname }} </td>
                <td> {{ $datas->pickup_address }} </td>
                <td> {{ $datas->drop_address }} </td>
                <td> {{ $datas->client_mobilenumber }} </td>
                <td> {{ $datas->pickup_date }} </td>
                <td> {{ $datas->time }} </td>
            </tr>
            @endforeach
        </table>
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
    @if(session('error'))
            <script>
                alert("{{ session('error') }}");
            </script>
        @endif
</body>
</html>
