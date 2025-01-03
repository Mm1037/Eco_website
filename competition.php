<?php
session_start();

require("assets/config/db-config.php");

if (!isset($_SESSION["s_user_id"])) {
    header("Location:unauthorized-http-401.php");
} else {
    $user_id = $_SESSION["s_user_id"];
    $sql = "SELECT * FROM competition WHERE USER_ID = $user_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST["join"])) {
    $date = date('Y-m-d');
    $sql = "INSERT INTO terms_and_conditions (USER_ID, APPROVED_DATE) VALUES($user_id, '$date')";
    $result = mysqli_query($conn, $sql);
    header("refresh:0");
}

?>

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
        <div class="container" data-aos="zoom-in">
            <div class="row text-center">
                <div class="col-4 rank">
                    <img src="assets/img/logo-remove-bg-sm.png" class="rounded-circle border img-fluid" style="width: 5rem; height: 5rem;" />
                    <h2>ECO</h2>
                    <div class="rank-three shadow border fs-3 fw-bold p-2">3</div>
                </div>
                <div class="col-4 rank">
                    <img src="assets/img/sta-academy.png" class="rounded-circle border img-fluid" style="width: 5rem; height: 5rem;" />
                    <h2>STA</h2>
                    <div class="rank-one shadow border fs-3 fw-bold p-4">1</div>
                </div>
                <div class="col-4 rank">
                    <img src="assets/img/we-academy.png" class="rounded-circle border img-fluid" style="width: 5rem; height: 5rem;" />
                    <h2>Academy</h2>
                    <div class="rank-two shadow border fs-3 fw-bold p-3">2</div>
                </div>
            </div>
        </div>
    </section>

    <!-------------------------------The Upper Section Ends Here------------------------------->



    <!-------------------------------The Lower Section Starts Here------------------------------->

    <section class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12" data-aos="fade-down">

                    <!-------------------------------The Search Bar------------------------------>
                    <div class="input-group mb-3">
                        <input type="text" id="Search" onkeyup="Search()" class="form-control" placeholder="Search">
                    </div>

                    <!--------------------------------The Table----------------------------------->
                    <table id="Table" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Player</th>
                                <th scope="col">Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" style="color: rgb(225, 197, 39);">1</th>
                                <td>
                                    <img src="assets/img/sta-academy.png" alt="STA Logo">
                                    <p>STA</p>
                                </td>
                                <td>240</td>
                            </tr>
                            <tr>
                                <th scope="row" style="color: rgb(138, 130, 130);">2</th>
                                <td>
                                    <img src="assets/img/we-academy.png" alt="Academy Logo">
                                    <p>Academy</p>
                                </td>
                                <td>200</td>
                            </tr>
                            <tr>
                                <th scope="row" style="color: #cd7f32;">3</th>
                                <td>
                                    <img src="assets/img/logo-remove-bg-sm.png" alt="Academy Logo">
                                    <p>Team</p>
                                </td>
                                <td>150</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                if (!isset($row["ID"])) {
                ?>

                    <!---------------------------The Join Competition Box--------------------------------->
                    <div class="col-md-6 col-12" data-aos="fade-down">
                        <div class="text-box rounded-4 shadow p-3 mt-5">
                            <h5>Join our competition to calculate and reduce your emissions.<br><br>
                                Track your progress, earn points for eco-friendly actions, and climb the
                                leaderboard.<br><br>
                                Compete with others to enhance your environmental impact and rank up for a greener
                                planet.</h5><br>
                            <button type="button" class="btn btn-success shadow" data-toggle="modal" data-target="#ModalCenter" data-aos="zoom">
                                Join Now!
                            </button>
                        </div>
                    </div>
                <?php
                } else {
                ?>


                    <!---------------------------The Calculation Box--------------------------------->
                    <div id="card-calcu" class="col-md-6 col-12" data-aos="fade-down">
                        <div class="text-box rounded-4 shadow p-3 mt-4" style="background-color: #f0f0f0; text-align: center;">

                            <div class="card-body text-center">
                                <div class="mt-3 mb-4">
                                    <img src="assets/img/sta-academy.png" class="rounded-circle border img-fluid" style="width: 5rem; height: 5rem;" />
                                </div>
                                <h4 class="mb-2">STA</h4>
                                <button type="button" class="btn btn-success shadow" data-toggle="modal" data-target="#ModalCenter">
                                    Re-Calculate Your Emissions
                                </button>
                            </div>

                            <div class="d-flex justify-content-center text-center mt-3 mb-3" style="text-align: center;">
                                <div>
                                    <p class="mb-2 h5">Placement</p>
                                    <p class="text-muted mb-0">1st</p>
                                </div>
                                <div class="px-3">
                                    <p class="mb-2 h5">Emissions</p>
                                    <p class="text-muted mb-0">98.7</p>
                                </div>
                                <div>
                                    <p class="mb-2 h5">Score</p>
                                    <p class="text-muted mb-0">240</p>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </section>

    <!-------------------------------The Lower Section Ends Here------------------------------->



    <!---------------------------------------Modal--------------------------------------------->

    <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" data-toggle="modal" aria-labelledby="ModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="ri ri-book-read-line"></i> Terms and Conditions</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="bg-white rounded">
                        <form action="" method="POST">
                            <legand><i class="ri ri-calendar-todo-line"></i> Effective Date: <?= date('Y-m-d H:i:s'); ?> <input type="hidden" value="<?= date('Y-m-d H:i:s'); ?>"></legand>
                            <p>
                                Welcome to Eco Website (the "Website"), which provides tools and resources for educational institutions to assess and manage their carbon footprints and environmental impacts. By accessing or using this Website, you agree to comply with these Terms and Conditions (the “Terms”).
                            </p>
                            <ol>
                                <li>
                                    <h2>Acceptance of Terms</h2>
                                    <p>By using our Website, you confirm that you have read, understood, and agree to be bound by these Terms and our Privacy Policy. We reserve the right to update these Terms at any time, and it is your responsibility to review them periodically.</p>
                                </li>
                                <li>
                                    <h2>Website Services</h2>
                                    <p>Our Website offers resources, tools, and calculation systems to help educational institutions measure their carbon footprint, covering areas such as energy consumption, transportation, waste management, and water usage. These tools are for informational purposes only and should not be considered as absolute measures or certified environmental assessments.</p>
                                </li>
                                <li>
                                    <h2>User Obligations and Responsibilities</h2>
                                    <ul>
                                        <li>
                                            <h4 class="d-inline">Data Accuracy:</h4>
                                            <p>You agree to input accurate, up-to-date information for calculations. The accuracy of carbon footprint assessments depends on the correctness of data provided.</p>
                                        </li>
                                        <li>
                                            <h4 class="d-inline">Compliance with Local Regulations:</h4>
                                            <p>It is your responsibility to ensure that your use of our tools and the application of any results comply with all local, state, and federal laws and regulations regarding environmental impact and sustainability.</p>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <h2>Intellectual Property Rights</h2>
                                    <p>All content on this Website, including the tools, resources, design, text, graphics, and software, is the property of Eco Website or its licensors. You are granted a limited, non-exclusive, non-transferable license to use the content solely for the purpose of assessing your institution’s carbon footprint.</p>
                                    <ul>
                                        <li>
                                            <h4 class="d-inline">Restrictions:</h4>
                                            <ul>
                                                <li>
                                                    <p>You may not reproduce, distribute, modify, or create derivative works from any part of the Website without prior written consent from Eco Website.</p>
                                                </li>
                                                <li>
                                                    <p>Unauthorized use of any content or tools provided on the Website for commercial purposes is strictly prohibited.</p>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <h2>Limitations of Liability</h2>
                                    <ul>
                                        <h4>Eco Website and its affiliates are not liable for any damages arising from:</h4>
                                        <li>
                                            <p>Inaccuracies in the carbon footprint calculations due to user-provided data.</p>
                                        </li>
                                        <li>
                                            <p>Decisions or actions taken by users based on information obtained from the Website.</p>
                                        </li>
                                        <li>
                                            <p>Any interruptions, errors, or delays in the Website’s services.</p>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <h2>Disclaimers</h2>
                                    <p>Our carbon footprint assessment tools are intended to provide a baseline estimate of emissions for educational institutions and should be used as a guide. Results are approximations and should not be used as the sole basis for environmental or financial decisions.</p>
                                </li>
                                <li>
                                    <h2>Privacy and Data Usage</h2>
                                    <p>All data entered by users for carbon footprint calculations will be stored in compliance with our Privacy Policy, and it will be used solely for providing and improving the Website’s services. We take user privacy seriously and employ necessary security measures to protect any personal information collected.</p>
                                </li>
                                <li>
                                    <h2>Modifications and Termination</h2>
                                    <p>We may modify or discontinue the Website’s services or any part thereof, at any time without notice. We reserve the right to restrict access to any part of the Website at our discretion.</p>
                                </li>
                                <li>
                                    <h2>Contact Us</h2>
                                    <p>If you have questions about these Terms, please contact us at <a href="contact-us.php" class="link">Link</a>.</p>
                                </li>
                            </ol>
                            <hr class="bg-primary">
                            <div class="mb-3 mt-4">
                                <label for="approve" class="form-label">
                                    <input type="checkbox" class="form-check-input" id="approve">
                                    I agree to the Terms and Conditions
                                </label>
                            </div>
                            <button type="submit" class="btn btn-success shadow mt-3" name="join" id="joinButton" disabled>Join</button>
                            <button type="reset" class="btn btn-secondary shadow mt-3" name="cancel" id="cancel" data-dismiss="modal" aria-label="Close">Cancel</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--====== CONTENT END ======-->
</main>


<!--====== FOOTER START ======-->
<?php include 'assets/inc/footer.php'; ?>
<!--====== FOOTER END ======-->

</body>

</html>