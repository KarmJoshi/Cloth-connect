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

        <link rel="stylesheet" href="/assets/css/formStyle.css">

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
                    <li><a href="user-homepage" >Home</a></li>
                    <li><a href="" class="active"> Donate</a></li>
                    <li><a href="user-profile">Profile</a></li>
                    <li><a href="logout">Logout</a></li>
                </ul>
            </nav>
        </header>   
            <div class="overlay"></div>
            <div class="main-content">
            <div class="form-container">
                <h2>Create Your Order</h2>
            
                <form action = "user-donation" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text"  name="address" placeholder=" " required>
                        <label for="address">Address/Flat no / name</label>
                    </div>

                    <div class="form-group">
                        <input type="text"  name="area" placeholder=" " required>
                        <label for="area">Area</label>
                    </div>

                    <div class="form-group">
                        <input type="text"  name="city" placeholder=" " required>
                        <label for="city">City</label>
                    </div>

                    <div class="form-group">
                        <input type="text"  name="mobilenumber" placeholder=" " required>
                        <label for="mobilenumber">MobileNumber</label>
                    </div>

                    <div class="form-group">
                        <!-- <label for="size"></label> -->
                        <select id="size" name="size">
                            <option value="small">Small</option>
                            <option value="medium">Medium</option>
                            <option value="large">Large</option>
                            <option value="xl">XL</option>
                            <option value="xxl">XXL</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <!-- <label for="type">Type</label> -->
                        <select id="type" name="type">
                            <option value="tshirt">T-Shirt</option>
                            <option value="shirt">Shirt</option>
                            <option value="jeans">Jeans</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="number"  name="number" placeholder=" " required>
                        <label for="number">number of cloth </label>
                    </div>

                    <div class="form-group file-upload">
                        <!-- <label for="photo">Upload Photo</label> -->
                        <input type="file" id="photo" name="image01" accept="image/*">
                    </div>

                    <button type="submit" class="submit-btn">Submit</button>
                </form>
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
</body>
</html>
