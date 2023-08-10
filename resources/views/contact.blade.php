<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/contact.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/Logo.png') }}" type="image/x-icon">
    <title>Contact</title>
</head>

<body>
    <!-- ======== Header ======== -->
    <div style="box-shadow: 0 2px 4px 0 rgba(0,0,0,.5);" class="header">
        <div class="logo">
            <img src="{{'images/Logo.png'}}" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="portfolio">Portfolio</a></li>
                <li><a href="advocacy">Advocacy</a></li>
                <li><a href="about">About</a></li>
                <li><a class="test" href="contact">Contact</a></li>&nbsp;
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


    <!-- /* ------------- for the firts section ------------------ */ -->

    <br><br><br><br><br><br><br>
    <div class="main">
        <div class="container">
            <h1>
                Let's tell the story <br> about your business.
            </h1><br>
            <p>My goal?</p><br>
            <p class="smd">To tell your business's story in the best and most <br> marketable way
                possible while achieving your <br> marketing, branding, and advertising objectives. <br>
                <a href="">
                    <img src="{{'images/arrow-down.png'}}" alt="Arrow">
                </a>
            </p>
        </div>

    </div><br><br>
    <!-- /* ------------- end for the firts section ------------------ */ -->



    <!-- /* ------------- for the second section ------------------ */ -->



    <!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->

    <form action="{{ route('contact.book') }}" method="POST">
        @csrf

        <h2>Select Service</h2>
        <div class="selectOption">

            <p>Set up consulting Today!</p><br>
            <center>
                <div class="custom-select">
                    <select name="service_id" id="service_id">
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->type }}</option>
                        @endforeach
                    </select>
                </div>

                <center>
        </div>
    </form>




        <!-- /* ------------- end for the second section ------------------ */ -->


        <br><br><br><br><br><br>

        <!-- ============== for the calendar ============  -->
        <h2>Select Time</h2>
        <div class="container1">

            <div class="calendar">
                <div class="month">
                    <i class="fas fa-angle-left prev"></i>
                    <div class="date">
                        <h1></h1>
                        <p></p>
                    </div>
                    <i class="fas fa-angle-right next"></i>
                </div>
                <div class="weekdays">
                    <div>SUN</div>
                    <div>MON</div>
                    <div>TUE</div>
                    <div>WED</div>
                    <div>THU</div>
                    <div>FRI</div>
                    <div>SAT</div>
                </div>
                <div class="days"></div>
            </div>


            <div class="schedule">
                <div class="time">

                </div>
                <div class="test"></div>
                <div class="shadow">
                </div>

                <div class="standardTime">
                    <small>
                        US Eastern standard time
                    </small>
                </div>

            </div>
        </div>




        <br>
        -------------------- for the details ------------------------------

        <!-- <h2>Add you details</h2>
        <div class="contact" id="contact">
            <div class="contactBox">
                <div class="left">

                    <div class="Fcontact" action="submit">
                        <br><br>
                        <div class="genInfo">
                            <input type="text" placeholder="Name" class="name">
                            <input type="email" placeholder="Email" class="email">
                        </div>
                        <div class="subject">
                            <input type="text" placeholder="Subject">
                            <input type="text" placeholder="Subject">
                        </div><br>
                        <div class="remind">
                            <h5>
                                <img src="{{'images/qmark.png'}}" alt="QuestionMark">
                                <small>
                                    Please share some details about your project.
                                </small>
                            </h5>

                            
                        </div>
                        <div class="message">
                            <textarea name="message" rows="5" placeholder="Notes (optional)" required></textarea>
                        </div>

                    </div>
                </div>

            </div>
            <div class="test"></div>
            <div class="shadow">

            </div>

            <div class="standardTime">
                <small>
                    US Eastern standard time
                </small>
            </div>

        </div> -->




    <br>
    <!-- -------------------- for the details ------------------------------ -->

    <h2>Add you details</h2>
    <div class="contact" id="contact">
        <div class="contactBox">
            <div class="left">

                <form action="submit">
                    <br><br>
                    <div class="genInfo">
                        <input type="text" placeholder="Name" class="name" id="submit-name" required>
                        <input type="email" placeholder="Email" class="email" id="submit-email" required>
                    </div>
                    <div class="subject">
                        <input type="text" placeholder="Address" id="submit-address" required>
                        <input type="text" placeholder="Phone Number" id="submit-phone-no" required>
                    </div><br>
                    <div class="remind">
                        <h5>
                            <img src="{{ asset('images/qmark.png') }}" alt="QuestionMark">
                            <small>
                                Please share some details about your project.
                            </small>
                        </h5>

                        <!-- <input type="text"  placeholder="Please share some details about your project."> -->
                    </div>
                    <div class="message">
                        <textarea name="message" rows="5" placeholder="Notes (optional)" id="submit-note"></textarea>
                    </div>

                </form>
            </div>

        </div>
    </div>

    <div class="booking">
        <div>
            <small>
                By clicking below you agree to these <span>Privacy Policies</span>
            </small>
            <div>
                <button class="btnBook" onclick="bookNow()"> Book Now </button>
            </div>
        </div>
        <hr class="hr"><br>



    <!-- ======== Footer ======== -->
    <div class="f-footer" id="f-footer">
        <ul>
            <li><a href="./index">Portfolio</a></li>
            <li><a href="./advocacy">Advocacy</a></li>
            <li><a href="./about">About Me</a></li>
            <li><a href="./contact">Contact</a></li>
        </ul>
        <hr>

        </div>
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

    </div>


    <div class="topBtn">
        <a href="#"><i class="fa-solid fa-angle-up"></i></a><br><br>
    </div>

    <form action="/get-schedule" method="POST" id="get-service">
        @csrf
        <input type="hidden" name="schedule_id" value="#">
    </form>

    <form action="{{ route('contact.book') }}" method="POST" id="final-request">
        @csrf
        <input type="hidden" name="service_id" id="service">
        <input type="hidden" name="schedule_id" id="schedule">
        <input type="hidden" name="timeslot_id" id="timeslot">
        <input type="hidden" name="name" id="name">
        <input type="hidden" name="email" id="email">
        <input type="hidden" name="address" id="address">
        <input type="hidden" name="phone_no" id="phone_no">
        <input type="hidden" name="notes" id="notes">
    </form>

    <script src="{{ asset('js/scroll.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="{{ asset('js/contact.js') }}"></script>

</body>


</html>
