<!DOCTYPE HTML>
<html lang="en">

<head>

    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i,500,600i,700"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i,500,600i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/animate.css">
    
    <link rel="stylesheet" href="/assets/css/icomoon.css">
    
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/css/flexslider.css">

    <link rel="stylesheet" href="/assets/css/style.css">

    <script src="/assets/js/modernizr-2.6.2.min.js"></script>

    <link rel="stylesheet" href="/assets/css/admin_style.css">

    <link rel="stylesheet" href="/assets/css/formStyle.css">

    <link rel="stylesheet" href="/assets/css/loadingAnimation.css">
</head>

<body>
<div id="loader">
        <div class="spinner"></div>
    </div>
        <div class="form-container">
            <h2> Edit Donor </h2>

            <form action = "/edit-donor/{{ $client->CID }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" name="FirstName"  placeholder="" value = "{{ $client->firstname }}"required>
                    <label for="address">FirstName</label>
                </div>

                <div class="form-group">
                    <input type="text" name="LastName" placeholder=" " value="{{ $client->lastname }}"  required>
                    <label for="area">LastName</label>
                </div>

                <div class="form-group">
                    <input type="email" name="Email" placeholder=" "  value ="{{ $client->email }}" required>
                    <label for="city">Email</label>
                </div>

                <div class="form-group">
                    <input type="mobilenumber" name="MobileNumber" placeholder=" "  value ="{{ $client->mobilenumber }}" required>
                    <label for="mobilenumber">Mobile Number</label>
                </div>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
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
</body>

</html>