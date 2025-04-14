<!DOCTYPE HTML>
<html lang="en">
<head>
   
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i,500,600i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/animate.css">
    
    <link rel="stylesheet" href="/assets/css/icomoon.css">
    
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/css/flexslider.css">

    <link rel="stylesheet" href="/assets/css/style.css">

    <link rel="stylesheet" href="/assets/css/register.css">

    <script src="/assets/js/modernizr-2.6.2.min.js"></script>

</head>
<body>

<div id="page">
<div class="form-container">
    <h2> Admin Register </h2>
    <form action = "admin-register" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text"  name="FirstName" placeholder=" " required>
            <label for="FirstName">First Name</label>
        </div>

        <div class="form-group">
            <input type="text"  name="LastName" placeholder=" " required>
            <label for="LastName">LastName</label>
        </div>

        <div class="form-group">
            <input type="email"  name="Email" placeholder=" " required>
            <label for="email">Email</label>
        </div>

        <div class="form-group">
            <input type="password"  name="Password" placeholder=" " required>
            <label for="password">Password</label>
        </div>
    
        <button type="submit" class="submit-btn">Submit</button>
    </form>
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
</body>
</html>
