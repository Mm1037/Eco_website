<?php
session_start();

// Connection of Database
require("assets/config/db-config.php");

?>
<?php include "assets/inc/header.php" ?>

<!--====== PRELOADER START ======-->
<?php include 'assets/inc/preloader.php'; ?>
<!--====== PRELOADER END ======-->

<main id="main">


    <!-- Unauthorized -->
    <section class="unauthorized">
        <div class="col-12 col-md-6 m-auto">
            <div class="text-center">
                <img class="img-fluid rounded-4" src="assets/img/unauthorized.jpg" alt="image nout found">
                <legend>401</legend>
                <h3 class="fs-1 fw-bold">Unauthorized</h3>
            </div>
            <div class="alert alert-warning alert-dismissible fade show" dissmis="" role="alert">
                <h4 class="alert-heading">Oops!</h4>
                <p>You Must Sign In To See Comptetition</p>
                <hr>
                <a href="auth.php" class="btn btn-outline-primary">Take Access</a>
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </section>

</main>

<!--====== FOOTER START ======-->
<?php include 'assets/inc/footer.php'; ?>
<!--====== FOOTER END ======-->
</body>

</html>