<header class="fixed-top px-4" data-aos="slide-down" data-aos-delay="500">
  <nav class="container navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand w-25" href="index.php">
      <img src="assets/img/logo-remove-bg-sm-croped.png" width="100" class="d-inline-block align-top" alt="logo not found">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarToggler">
      <ul class="navbar-nav mr-auto w-100 justify-content-around">
        <li class="nav-item rounded-4 shadow">
          <a class="nav-link" href="game.php"><i class="ri-gamepad-line rounded-circle"></i> Game</a>
        </li>
        <li class="nav-item rounded-4 shadow">
          <a class="nav-link" href="net-zero.php"><i class="ri-leaf-line rounded-circle"></i> NetZero</a>
        </li>
        <li class="nav-item rounded-4 shadow">
          <a class="nav-link" href="competition.php"><i class="ri-trophy-line rounded-circle"></i> Comptation</a>
        </li>
        <li class="nav-item rounded-4 shadow">
          <a class="nav-link" href="about-us.php"><i class="ri-group-2-line rounded-circle"></i> About us</a>
        </li>
        <li class="nav-item rounded-4 shadow">
          <a class="nav-link" href="contact-us.php"><i class="ri-phone-line rounded-circle"></i> Contact us</a>
        </li>
        <li class="nav-item rounded-4 shadow dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <a class="nav-link d-inline px-0" href="#"><i class="ri ri-user-line rounded-circle"></i> <?php echo isset($_SESSION['s_fname']) ? $_SESSION['s_fname'] : "" ;  ?></a>
          <div class="dropdown-menu text-center bg-transparent" aria-labelledby="navbarDropdown">
            <ul class="list-unstyled">
            <?php if(isset($_SESSION['s_fname'])) {
              ?>
            <li class="nav-item rounded-4 shadow" onclick="window.location.href = 'profile.php'">
            <a class="nav-link" href="profile.php">
              <i class="ri-user-line rounded-circle"></i> Profile
            </a>
          </li>
          <hr/>
              <?php
            } 
              ?>

              <li class="nav-item rounded-4 shadow" onclick="window.location.href = '<?= isset($_SESSION['s_fname']) ? 'assets/php/logout.php' : 'auth.php' ; ?>'">
                <a class="nav-link" href="auth.php"> <?php echo isset($_SESSION['s_fname']) ? '<i class="ri ri-logout-circle-line rounded-circle"></i> Logout' : '<i class="ri ri-login-circle-line rounded-circle"></i> Login' ; ?>
                </a>
              </li>
            </ul>

          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>