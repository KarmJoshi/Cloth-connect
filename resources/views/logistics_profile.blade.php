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

    <link rel="stylesheet" href="/assets/css/formStyle.css">

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
                    <li><a href="logistics-homepage" >Home</a></li>
                    <li><a href="delivery-history">Delivery History</a></li>
                    <li><a href="#" class="active">Profile</a></li>
                    <li><a href="logout">Logout</a></li>
                </ul>
            </nav>
        </header>

        <div class="overlay"></div>

        <div class="form-container">
            <h2>Profile</h2>

            <form action = "logistics-profile" method="POST" >
                @csrf
                <div class="form-group">
                    <input type="text" name="CompanyName"  placeholder=""  value ="{{ $logistics->companyname }}" required>
                    <label for="CompanyName">Company Name</label>
                </div>

                <div class="form-group">
                    <input type="text" name="Address" placeholder=" "  value = "{{ $logistics->address }}" required>
                    <label for="Address">Address</label>
                </div>

                <div class="form-group">
                    <input type="email" name="Email" placeholder=" " value = "{{ $logistics->email }}" required>
                    <label for="city">Email</label>
                </div>

                <div class="form-group">
                    <input type="mobilenumber" name="MobileNumber" placeholder=" " value = "{{ $logistics->mobilenumber }}" required>
                    <label for="city">Mobile Number</label>
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
    @if(session('error'))
            <script>
                alert("{{ session('error') }}");
            </script>
        @endif
</body>

</html>