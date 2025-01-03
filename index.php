<?php
session_start();

require("assets/config/db-config.php");


if(
!isset($_SESSION['s_user_id']) ||
!isset($_SESSION['s_fname']) ||
!isset($_SESSION['s_lname']) ||
!isset($_SESSION['s_username']) ||
!isset($_SESSION['s_token']) ||
!isset($_SESSION['s_name']) ||
!isset($_SESSION['s_status'])
){

  $_SESSION['s_user_id'] = null;
  $_SESSION['s_fname'] = null;
  $_SESSION['s_lname'] = null;
  $_SESSION['s_username'] = null;
  $_SESSION['s_token'] = null;
  $_SESSION['s_name'] = null;
  $_SESSION['s_status'] = null;

}


$message = '';
if (isset($_SESSION['s_username']) && $_SESSION['s_token']) {
  $username = $_SESSION['s_username'];
  $token = $_SESSION['s_token'];
  $sql = "UPDATE users SET TOKEN='" . $token . "' WHERE USERNAME='" . $username . "'";
  if ($conn->query($sql) === TRUE) {
    $_SESSION["notify"] = empty($_SESSION["s_token"]) ? 'welcome' :  '';
  } else {
    $message =  'Error: ' . $sql . '<br>' . $conn->error;
  }
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



<main id="main">

  <!--====== CONTENT START ======-->
  <!--====== HERO START ======-->
  <section class="hero">
  <?php
  if (isset($_SESSION["notify"])) {
  if ($_SESSION["notify"] === 'welcome') {
      ?>
      <div class="alert alert-success alert-dismissible offcanvas fade show alert-cornar-left d-<?php echo $flag; ?>" role="alert" data-aos="slide-right">
        <span class="my-auto fw-bold">Welcome!</span> We are so happy for this vist. 
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php
      }}
      ?>
  

    <div class="container">
      <div class="row">
        <div class="col-md-6 col-12">
          <div class="container bg-light p-4 border rounded-4 shadow">
            <h2>Sign up Now!</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe esse incidunt ducimus obcaecati autem a quis facilis voluptatibus, non quisquam eligendi maxime quaerat explicabo, soluta facere placeat quibusdam perspiciatis quasi.</p>
            <a href="auth.php"><button class="btn btn-primary">Sign up</button></a>
          </div>
        </div>
        <div class="col-md-6 col-12">
          <img class="w-50 float-end img-shadow" src="assets/img/save-earth-640x533.png" alt="image not found" />
        </div>
      </div>
    </div>
  </section>
  <!--====== HERO END ======-->

  <!--====== SLIDER START ======-->
  <section class="container slider">
    <swiper-container class="mySwiper" scrollbar-hide="true" autoplay loop="true">
      <swiper-slide><img class="rounded-4" src="assets/img/cop28-dubai-wgs.webp" alt="image not found" /></swiper-slide>
      <swiper-slide><img class="rounded-4" src="assets/img/COP28-min.webp" alt="image not found" /></swiper-slide>
      <swiper-slide><img class="rounded-4" src="assets/img/earth-hands.jpeg" alt="image not found" /></swiper-slide>
    </swiper-container>
  </section>

  <!--====== SLIDER END ======-->
  <!--====== home section2 start ======-->
  <section class="tips">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-12 p-4">
          <img src="assets/img/3d-business-man-talking-online.png" alt="Person at Computer" class="img-fluid">
        </div>
        <div class="col-md-6 col-12 p-4">
          <h1>Play and Learn</h1>
          <ul class="list-unstyled">
            <li>
              <span class="check-icon">&#10003;</span>
              <h4>Promote environmental sustainability through innovative solutions</h4>
            </li>
            <li>
              <span class="check-icon">&#10003;</span>
              <h4>Educate the community on eco-friendly practices</h4>
            </li>
            <li>
              <span class="check-icon">&#10003;</span>
              <h4>Develop technologies to reduce carbon footprint</h4>
            </li>
            <li>
              <span class="check-icon">&#10003;</span>
              <h4>with organizations to advance sustainability goals</h4>
            </li>
          </ul>
        </div>
      </div>
    </div>

  </section>
  <!--====== home section2 end======-->
  <!--====== CONTENT END ======-->
</main>


<!--====== FOOTER START ======-->
<?php include 'assets/inc/footer.php'; ?>
<!--====== FOOTER END ======-->


</body>

</html>