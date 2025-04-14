<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cloth Connect</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF Token for AJAX -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i,500,600i,700"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="/assets/css/animate.css">
    <link rel="stylesheet" href="/assets/css/icomoon.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/flexslider.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/register.css">
    <link rel="stylesheet" href="/assets/css/loadingAnimation.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script src="/assets/js/modernizr-2.6.2.min.js"></script>

    <!-- Popup Styles -->
    <style>
        .popup-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.75);
            backdrop-filter: blur(10px);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10000;
            animation: fadeIn 0.3s ease-in-out;
        }

        .popup-box {
            background: rgba(25, 0, 0, 0.65);
            border: 1px solid rgba(255, 0, 0, 0.3);
            border-radius: 20px;
            padding: 40px 30px;
            width: 90%;
            max-width: 420px;
            color: #fff;
            text-align: center;
            box-shadow: 0 0 25px rgba(255, 0, 0, 0.4);
            backdrop-filter: blur(20px);
            animation: scaleIn 0.4s ease;
        }

        .popup-box .icon {
            margin-bottom: 20px;
            animation: pulseGlow 2s infinite;
        }

        .popup-box svg {
            width: 70px;
            height: 70px;
            fill: #ff4c4c;
        }

        .popup-box h2 {
            font-size: 26px;
            color: #ff4d4d;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .popup-box p {
            font-size: 16px;
            color: #ddd;
            margin-bottom: 30px;
        }

        .popup-box button {
            padding: 12px 30px;
            background: linear-gradient(to right, #ff1f1f, #ff4d4d);
            border: none;
            color: #fff;
            font-size: 15px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .popup-box button:hover {
            transform: scale(1.05);
            background: linear-gradient(to right, #e60000, #ff3333);
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes scaleIn {
            0% {
                transform: scale(0.95);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes pulseGlow {
            0%, 100% {
                transform: scale(1);
                filter: drop-shadow(0 0 8px rgba(255, 0, 0, 0.6));
            }
            50% {
                transform: scale(1.1);
                filter: drop-shadow(0 0 20px rgba(255, 0, 0, 0.8));
            }
        }
    </style>
</head>

<body>
    <div id="loader">
        <div class="spinner"></div>
    </div>

    <div class="wrapper">
        <div class="container-alert">
            <div id="page">
                <nav class="fh5co-nav" role="navigation">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 text-center logo-wrap">
                                <div id="fh5co-logo"><a href="index.html">Cloth Connect<span>.</span></a></div>
                            </div>
                            <div class="col-xs-12 text-center menu-1 menu-wrap">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li class="has-dropdown active"><a href="#">Login</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="container2">
                        <form id="loginForm" method="POST" action="{{ route('login') }}">
                                @csrf
                                <h1>Login</h1>
                                <div class="input-container2">
                                    <input type="email" name="email" required>
                                    <label>Email</label>
                                </div>
                                <div class="input-container2">
                                    <input type="password" name="password" required>
                                    <label>Password</label>
                                </div>
                                <a href="forgetPassword" class="forgot-password-link">Forgot Password?</a><br><br>
                                <button type="submit" class="submit-btn">Submit</button>
                            </form>

                            <!-- AJAX Error Popup -->
                            <div id="errorPopup" class="popup-overlay" style="display: none;">
                                <div class="popup-box">
                                    <div class="icon">
                                        <svg viewBox="0 0 24 24">
                                            <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm1 17h-2v2h2v-2zm0-10h-2v8h2V7z"/>
                                        </svg>
                                    </div>
                                    <p id="errorMessage"></p>
                                    <button onclick="closePopup()">Try Again</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

                <header id="fh5co-header" class="fh5co-cover js-fullheight"
                    style="background-image: url(/assets/images/Donation04.jpg);" data-stellar-background-ratio="0.5">
                    <div class="overlay"></div>
                </header>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/assets/js/loadingAnimation.js"></script>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/jquery.easing.1.3.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.waypoints.min.js"></script>
    <script src="/assets/js/jquery.stellar.min.js"></script>
    <script src="/assets/js/jquery.flexslider-min.js"></script>
    <script src="/assets/js/zoomerang.js"></script>
    <script src="/assets/js/main.js"></script>

    <script>
        Zoomerang.config({
            maxHeight: 600,
            maxWidth: 900,
            bgColor: '#000',
            bgOpacity: .85
        }).listen('[data-trigger="zoomerang"]');
    </script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        $('#loginForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route("login") }}',
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    console.log(response); // Debug: check what's returned

                    if (response.success) {
                        window.location.href = response.redirect;
                    } else {
                        $('#errorMessage').text(response.errorMessage);
                        $('#errorPopup').fadeIn();
                        setTimeout(() => $('#errorPopup').fadeOut(), 5000);
                    }
                },
                error: function (xhr) {
                    $('#errorMessage').text('Something went wrong. Please try again.');
                    $('#errorPopup').fadeIn();
                    setTimeout(() => $('#errorPopup').fadeOut(), 5000);
                }
            });
        });
    });

    function closePopup() {
        $('#errorPopup').fadeOut();
    }
</script>

@if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif

</body>
</html>
