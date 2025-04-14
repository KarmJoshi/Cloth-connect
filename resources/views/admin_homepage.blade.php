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

    <script src="/assets/js/modernizr-2.6.2.min.js"> </script>

    
</head>
<body>

<div id="page">
    <header class="header">
        <div class="logo">Cloth Connect </div>
        <nav>
            <ul>
                <li><a href="" class="active">Home</a></li>
                <li><a href="admin-donar-list">Donar List</a></li>
                <li><a href="admin-NGO-list">NGO List</a></li>
                <li><a href="admin-logistics-list">Logistics List</a></li>
                <li><a href="logout">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="table-container">
    <table> 
        <tr> 
            <th> NGO Name </th>
            <th> Adress </th>
            <th> Email </th>
            <th> Mobile Number</th>
            <th> Status </th>
            <th> Approval </th>
        </tr>
        @foreach ($ngos as $ngo)
        <tr> 
            <td> {{ $ngo -> NGOname }} </td>
            <td> {{ $ngo -> address }} </td>
            <td> {{ $ngo -> email }} </td>
            <td> {{ $ngo -> mobilenumber }} </td>
            <td> {{ $ngo -> status }} </td>
            <td> <a class="btn btn-primary btn-outline" href="approved/{{ $ngo -> NID }}"> Approved </a> </td> 
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
</body>
</html>
