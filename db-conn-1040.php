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
                <img class="img-fluid rounded-4 shadow" src="assets/img/error-establishing-database-conn.webp" alt="image nout found">
                <legend>1040</legend>
                <p class="fs-1 fw-bold">ERROR ESTABLISHING DATABASE CONNECTION</p>
                <p class="fs-2 fw-bold"><i class="ri ri-phone-line text-primary"></i>  Call Administrator!</p>
            </div>
        </div>
    </section>

</main>

<!--====== FOOTER START ======-->
<?php include 'assets/inc/footer.php'; ?>
<!--====== FOOTER END ======-->
</body>

</html>