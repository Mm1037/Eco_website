<?php session_start();  ?>
<!--====== HEADER START ======-->
<?php include 'assets/inc/header.php'; ?>
<!--====== HEADER END ======-->

<!--====== NAVBAR START ======-->
<?php include 'assets/inc/navbar.php'; ?>
<!--====== NAVBAR END ======-->


<!--====== PRELOADER START ======-->
<?php include 'assets/inc/preloader.php'; ?>
<!--====== PRELOADER END ======-->

<!--====== CHATBOT START ======-->
<?php include 'assets/inc/chatbot.php'; ?>
<!--====== CHATBOT END ======-->


<!--====== CONTENT START ======-->

<main id="main">

    <!-------------------------------The Upper Section Starts Here------------------------------->

    <section class="top">
        <div class="container">
            <div class="row" data-aos="fade">

                <!-------------------------------The Top Text----------------------------------->
                <div class="col-md-6 col-12">
                    <h1>CO2 Emissions</h1>
                    <p class="lead mb-4">Be aware of the amount of "CO2" emissions that you produce and help us save
                        the planet by reducing this emissions and achieve the "Net Zero".<br><br></p>
                    <p>Learn more about "Net Zero" from here:</p>
                    <a href="https://www.un.org/en/climatechange/net-zero-coalition"
                        class="btn btn-primary shadow">Net Zero Coalition</a>
                </div>

                <!---------------------------The NetZero Image--------------------------------->
                <div class="start-image col-md-6 col-12 mt-3">
                    <img src="assets/img/netzero.png" class="img-fluid shadow rounded-4" alt="Climate Change" />
                    <button class="btn btn-primary">Start Journey <i class="ri ri-link"></i></button>
                </div>
                <div class="col-12 py-4">
                    <div class="container text-center">
                        <h2 class="text-primary scroll-heading">SCROLL <i class="ri ri-arrow-down-fill"></i></h2>
                        <hr class="col-12 shadow" />
                        <hr class="col-6 m-auto shadow" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-------------------------------The Upper Section Ends Here------------------------------->
    <!-------------------------------The Video Section Starts Here------------------------------->
    <section>
        <div class="container">
            <video class="rounded-4 shadow" width="100%" height="100%" controls autoplay data-aos="zoom-in">
                <source src="https://www.un.org/sites/un2.un.org/files/2021/04/climate_hero_2021.mp4" type="video/mp4">
                </source>
            </video>
        </div>
    </section>
    <!-------------------------------The Subscription Section Ends Here------------------------------->
    <section>
        <div class="container">
            <div class="row">
                <div class="conatiner text-center mb-3" data-aos="fade">
                    <h2 class="text-uppercase">Let's Subscribe with us to follow all new events</h2>
                </div>
            </div>
            <div class="row">
                <div class="bg-light col-12 col-md-6 rounded-4 shadow" data-aos="fade-up" data-aos-delay="200">
                    <form class="container" action="" method="POST">
                        <div class="form-group">
                            <label class="my-3" for="name">Name:</label>
                            <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Enter your name" />
                            <small>Name is required <i class="ri ri-asterisk text-danger"></i></small>
                        </div>
                        <div class="form-group">
                            <label class="my-3" for="email">Email Address:</label>
                            <input type="text" class="form-control mb-3" id="email" name="email" placeholder="Enter your email" />
                            <small>Email is required <i class="ri ri-asterisk text-danger"></i></small>
                        </div>
                        <div class="form-group">
                            <label class="my-3" for="phone">Phone Number:</label>
                            <input type="text" class="form-control mb-3" id="phone" name="phone" placeholder="Enter your phone number" />
                            <small>Phone Number is required <i class="ri ri-asterisk text-danger"></i></small>
                        </div>
                        <div class="form-group">
                            <label class="my-3" for="lvlofinterest">Level of Interest</label>
                            <select name="lvlofinterest" id="" class="form-select form-control">
                                <option value="Not Interested">Not Interested</option>
                                <option value="Normal">Normal</option>
                                <option value="Interested">Interested</option>
                                <option value="Very Interested">Very Interested</option>
                            </select>
                            <small>Level of Interset is required <i class="ri ri-asterisk text-danger"></i></small>
                        </div>
                        <div class="form-group">
                        <div class="form-check my-3">
                            <input class="form-check-input" type="checkbox" value="" id="TC">
                            <label class="form-check-label" for="TC">
                                Terms and Conatitons for approvals in company.
                            </label>
                            <small>Terms is required <i class="ri ri-asterisk text-danger"></i></small>
                        </div>
                        </div>
                        <div class="col-12 col-md-6 mx-auto my-3">
                            <button type="submit" class="btn btn-secondary mb-3">Remeber Me Later <i class="ri ri-thumb-up-line"></i></button>
                            <button type="submit" class="btn btn-success mb-3">Join <i class="ri ri-external-link-fill"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-6 m-auto" data-aos="fade-up" data-aos-delay="400">
                    <div class="parallax">
                        <iframe class="rounded-4 shadow" width="100%" height="625" src="https://www.youtube.com/embed/O0DriafHhH4" title="The Path to Zero Emissions: What is Net Zero?" frameborder="0"  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-------------------------------The Subscription Section Starts Here------------------------------->
    <!--====== CONTENT END ======-->
</main>


<!--====== FOOTER START ======-->
<?php include 'assets/inc/footer.php'; ?>
<!--====== FOOTER END ======-->

<script src="assets/js/vendor/parallax.min.js"></script>

</body>

</html>