<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/admin_css/login.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="{{ asset('sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/Logo.png') }}" type="image/x-icon">
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <!-------Image  Ludiflex - youtube channel-------->
                    <img src="" alt="">
                    <div class="text">
                        <p>Hello Mr. Favio <br> <i>Good day</i></p>
                    </div>
                </div>
                <div class="col-md-6 right">
                     <div class="input-box">
                     <div id="login-box">
                     <center> <img src="{{ asset('images/faviodp.jpg') }}" alt="Profile"></center>
                     </div>
                        <header>Login as Admin</header>
                        <form id='login-form' method="POST" action="{{ route('login') }}">
        @csrf
                        <div class="input-field">
                            <input type="text" class="input" id="email" name="email" required autocomplete="off">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" id="password" name="password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="input-field">
                            <input type="submit" class="submit" value="Sign In">
                            
                        </div>
                       
                     </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/admin_js/login.js') }}"></script>
</body>
</html>



