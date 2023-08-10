<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="{{ asset('css/about.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/Logo.png') }}" type="image/x-icon">

    <title>Advocacy</title>
</head>

<body>

    <!-- ======== Header ======== -->
    <div style="box-shadow: 0 2px 4px 0 rgba(0,0,0,.5);" class="header">
        <div class="logo">
            <img src="{{asset ('images/Logo.png')}}" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="portfolio">Portfolio</a></li>
                <li><a href="advocacy">Advocacy</a></li>
                <li><a class="test" href="about">About</a></li>
                <li><a href="contact">Contact</a></li>&nbsp;
                <div class="language-selector">
                    <button class="current-language">
                    <img src="{{ asset('images/us.png') }}" alt="USA Flag">
                        English
                    </button>
                    <ul class="language-list">
                        <li data-lang="en"><img src="{{ asset('images/us.png') }}" alt="USA Flag"> English</li>
                        <li data-lang="es"><img src="{{ asset('images/spain.png') }}"> Español</li>
                        <li data-lang="fr"><img src="{{ asset('images/brazil.png') }}">Português</li>
                    </ul>
                </div>
            </ul>
            <div class="bar">
                <i class="open fa-solid fa-bars"></i>
                <i class="close fa-solid fa-xmark"></i>
            </div>
        </nav>
    </div>

    <!-- ======== End for Header ======== -->



    <!-- =================== for the first section ========================= -->

    <div class="main">
        <button style="display: none;" class="btn"><a href="#contact">Go to Site</a></button>
        <div class="main">
            <div class="container">
                <h1>HI! I’M
                    <span>
                        Favio-Valentino Jasso
                    </span>
                </h1>
                <p>Marketing and Branding Expert</p>
            </div>

        </div>


        <!-- =================== end of the first section ========================= -->


        <!-- =================== for the second section ========================= -->

        <div class="section">

            <!-- ---- column 21------ -->

            <div class="column">
                <h2>Who Am I?</h2>
                <p>Favio Jasso is a Mexican-American marketer based in the New York
                    Metropolitan area.
                    Favio is accompanied by 4 years of experience working with high-profile
                    entertainment brands like Team Liquid and the San Antonio Spurs.
                </p><br>

                <button class="btn">
                    <a id="read">
                        Read More
                    </a>
                </button>

                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="exit">&times;</span><br><br>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati fugiat fugit
                            vero laudantium,
                            accusamus amet ipsa aut vitae nobis totam doloremque corrupti officiis quisquam!
                            Aliquam debitis molestias exercitationem cum in.</p>
                    </div>
                </div>

            </div>

            <!-- ---- column 2 ------ -->
            <div class="column" id="test">
                <img src="{{asset ('images/faviodp.jpg')}}" alt="Profile">
            </div>



            <!-- ---- column 3 ------ -->

            <div class="column">
                <div class="contact-icons">
                    <a href=""><i class="fa-brands fa-linkedin"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-solid fa-mobile-screen"></i></a>
                    <a href=""><i class="fa-solid fa-envelope"></i></a>
                </div>

            </div>
        </div>
    </div>
    <!-- =================== end of the second section ========================= -->







    <!-- ======== Footer ======== -->
    <div class="f-footer" id="f-footer">
        <ul>
            <li><a href="./index">Portfolio</a></li>
            <li><a href="./advocay">Advocacy</a></li>
            <li><a href="./about">About Me</a></li>
            <li><a href="./contact">Contact</a></li>
        </ul>
        <hr>


        <div class="footer">

            <div class="socialIcons">
                <h6 style="font-size: 10px;">FOLLOW ME</h6>
                <a><i class="fa-brands fa-instagram"></i></a>
                <a><i class="fa-brands fa-facebook"></i></a>
                <a><i class="fa-brands fa-github"></i></a>
                <a><i class="fa-brands fa-twitter"></i></a>
            </div>
            <div class="copy">
                © Copyright. All rights reserved.
            </div>

        </div>

        <div class="topBtn">
            <a href="#"><i class="fa-solid fa-angle-up"></i></a><br><br>
        </div>


        <script src="{{ asset('js/scroll.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
        <script src="{{ asset('js/about.js') }}"></script>
</body>

</html>