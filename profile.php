<?php
session_start();

require("assets/config/db-config.php");

if ($conn !== false && isset($_SESSION["s_org"])) {
  $organization = $_SESSION["s_org"];
  $sql = "SELECT * FROM organizations WHERE ID = '$organization'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) !== 0) {
    foreach ($result as $row) {
      $id = $row["ID"];
      $name = $row["NAME"];
      $email = $row["EMAIL"];
      $phone = $row["PHONE"];
      $address = $row["ADDRESS"];
      $image_path = $row["IMAGE_PATH"];
    }
  }
}

// Insert Form to database 
if (isset($_POST["submit"])) {

  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $address = $_POST["address"];
  $image = $_FILES["image"]["tmp_name"]; // Get file name of file uploaded
  $tmp_name = $image; // Get file name of file uploaded
  $path = $name . '-' . $phone . '-';
  $path .= basename($_FILES["image"]["name"]);

  if (move_uploaded_file($tmp_name, "assets/img/organizations/profile-images/$path")) {

    $sql = "INSERT INTO organizations (NAME, EMAIL, PHONE, ADDRESS, IMAGE_PATH) VALUES ('$name', '$email', '$phone', '$address', '$path')";
    $result = mysqli_query($conn, $sql);

    $sql = "SELECT ID FROM organizations WHERE NAME = '$name'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $user_id = $_SESSION['s_user_id'];
    $org_id = $row["ID"];

    $sql = "UPDATE users SET ORG_ID = $org_id WHERE ID = $user_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $_SESSION["s_org"]  = $org_id;
      $_POST["submit"] = null;
    }
  }
}

// Update Form to database 
if (isset($_POST["save"])) {

  $id = $_POST["id"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $address = $_POST["address"];

  // Old Image
  $old_path = $_POST["image"];

  if (is_uploaded_file($_FILES["new-image"]["tmp_name"])) {
    // New Image
    $new_image = $_FILES["new-image"]["tmp_name"]; // Get file name of file uploaded
    $tmp_name = $new_image; // Get file name of file uploaded
    $path = $name . '-' . $phone . '-';
    $path .= basename($_FILES["new-image"]["name"]);

    if (unlink("assets/img/organizations/profile-images/$old_path")) {
      move_uploaded_file($tmp_name, "assets/img/organizations/profile-images/$path");
    }
  } else {
    $path = $old_path;
  }
  $sql = "UPDATE organizations SET NAME = '$name', EMAIL = '$email', PHONE = '$phone', ADDRESS = '$address', IMAGE_PATH = '$path' WHERE ID = $id";
  $result = mysqli_query($conn, $sql);
  $_SESSION["s_org"]  = $id;
  // Redirect to prevent form resubmission
  header("Location: " . $_SERVER['PHP_SELF']);
  exit; // Always exit after redirect to stop further execution
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

  <!-- Profile section start -->
  <div class="container">
    <div class="main-body">

      <!-- Breadcrumb navigation -->
      <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">User Profile</li>
        </ol>
      </nav>
      <!-- End of Breadcrumb -->

      <!-- Modal -->
      <div class="modal shadow <?= isset($_SESSION["s_org"]) ? 'd-none' : 'd-block bg-dark' ?>" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body p-4">
              <div class="myform bg-white rounded text-center">
                <p class="display-5">You Must Complete Profile First !</p>
                <a href="assets/php/profile.php" role="button" class="btn btn-primary shadow" data-toggle="modal" data-target="#Modal">Complete Profile</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Profile Form Modal -->
      <!---------------------------------------Modal--------------------------------------------->

      <div class="col-12 col-md-6 modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
              </button>
              <div class="myform bg-white rounded">
                <h1 class="text-center">Organization Profile</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="mb-3 mt-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="Help1">
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                  </div>
                  <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                  </div>
                  <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address">
                  </div>
                  <div class="mb-3">
                    <input type="file" class="form-control" id="img" name="image">
                  </div>
                  <div class="col-6 btn-group">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-success shadow" name="submit">Complete</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row gutters-sm">
        <!-- Left column with profile image and contact information -->
        <div class="col-md-4 mb-3">
          <!-- Profile Card -->
          <div class="card">
            <div class="card-body shadow">
              <div class="d-flex flex-column align-items-center text-center">
                <!-- Profile image and details -->
                <img src="assets/img/organizations/profile-images/<?= isset($image_path) ? $image_path : 'eco-image.jpg' ?>" alt="User" class="rounded-circle p-1 bg-success" width="110">
                <div class="mt-3">
                  <h4><?= $name ?></h4>
                  <p class="text-secondary mb-1"><?= $name ?></p>
                  <p class="text-muted font-size-sm"><?= $address ?></p>
                  <button class="btn btn-primary">Follow</button>
                  <button class="btn btn-outline-primary">Message</button>
                </div>
              </div>
            </div>
          </div>
          <!-- End of Profile Card -->

          <!-- Social Links Card -->
          <div class="card mt-3 shadow">
            <ul class="list-group list-group-flush">
              <!-- Twitter link -->
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-twitter mr-2 icon-inline text-info">
                    <path
                      d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                    </path>
                  </svg>Twitter
                </h6>
                <span class="text-secondary">@<?= $name ?></span>
              </li>
              <!-- Facebook link -->
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-facebook mr-2 icon-inline text-primary">
                    <path d="M18 2h-3a4 4 0 0 0-4 4v3H8v4h3v8h4v-8h3l1-4h-4V6a1 1 0 0 1 1-1h3z"></path>
                  </svg>Facebook
                </h6>
                <span class="text-secondary">@<?= $name ?></span>
              </li>
            </ul>
          </div>
          <!-- End of Social Links Card -->
        </div>
        <!-- End of Left Column -->

        <!-- Right column with profile details and progress bars -->
        <div class="col-md-8">
          <!-- Profile Details Card -->
          <div id="profile-info" class="card mb-3">
            <div class="card-body shadow">
              <!-- Profile details rows -->
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Organization Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?= $name ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?= $email ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Phone</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?= $phone ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?= $address ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12">
                  <button id="btn-profile-edit" class="btn btn-primary">Edit</button>
                </div>
              </div>
              <!-- End of Profile Details Rows -->
            </div>
          </div>
          <!-- End of Profile Details Card -->

          <!-- Right Column: Profile Form -->
          <div id="profile-edit" class="col-12 mb-3" style="display: none;">
            <div class="card">
              <div class="card-body shadow">
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Organization Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" class="form-control" name="name" value="<?= $name ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" class="form-control" name="email" value="<?= $email ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" class="form-control" name="phone" value="<?= $phone ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" class="form-control" name="address" value="<?= $address ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Change Image</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="file" class="form-control" name="new-image">
                      <input type="hidden" class="form-control" name="image" value="<?= $image_path ?>">
                      <input type="hidden" class="form-control" name="id" value="<?= $id ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <button id="btn-cancle" type="button" class="btn btn-outline-danger">Cancle</button>
                    </div>
                    <div class="col-sm-6 text-secondary">
                      <button id="btn-profile-info" class="btn btn-primary float-end" name="save">Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- End of Right Column -->

          <!-- Card for skill progress bars and competency -->
          <div class="row gutters-sm">

            <!-- Net Zero Progress Card -->

            <div class="col-md-6 mb-3">
              <div class="card h-100">
                <div class="card-body shadow">
                  <h6 class="d-flex align-items-center mb-3">Net Zero Progress</h6>

                  <!-- Total Emissions Reduction -->

                  <small>Total Emissions Reduction</small>
                  <div class="progress mb-3">
                    <div class="progress-bar bg-primary" role="progressbar" ria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>

                  <!-- Renewable Energy Adoption -->

                  <small>Renewable Energy Adoption</small>
                  <div class="progress mb-3">
                    <div class="progress-bar bg-danger" role="progressbar" ria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>

                  <!-- Carbon Offsets Utilized -->

                  <small>Carbon Offsets Utilized</small>
                  <div class="progress mb-3">
                    <div class="progress-bar bg-success" role="progressbar" ria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>

                  <!-- Energy Efficiency Improvements -->

                  <small>Energy Efficiency Improvements</small>
                  <div class="progress mb-3">
                    <div class="progress-bar bg-warning" role="progressbar" ria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Net Zero Progress Card -->

            <!-- Competency Card -->
            <div class="col-md-6 mb-3">
              <div class="card h-100">
                <div class="card-body shadow">
                  <h6 class="d-flex align-items-center mb-3">Competency</h6>

                  <!-- STA Skill -->
                  <div class="d-flex align-items-center mb-3">
                    <img src="assets/img/sta-academy.png" alt="STA" class="me-2" width="40" height="30">
                    <div class="flex-grow-1">
                      <small>STA</small>
                      <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" ria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>

                  <!-- We Skill -->
                  <div class="d-flex align-items-center mb-3">
                    <img src="assets/img/we-academy.png" alt="We" class="me-2" width="30" height="30">
                    <div class="flex-grow-1">
                      <small>We</small>
                      <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" ria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>

                  <!-- Others Skill -->
                  <div class="d-flex align-items-center mb-3">
                    <img src="assets/img/logo-remove-bg-lg.png" alt="Others" class="me-2" width="30" height="30">
                    <div class="flex-grow-1">
                      <small>Others</small>
                      <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" ria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <!-- End of Competency Card -->
          </div>
          <!-- End of Skill and Competency Section -->
        </div>
        <!-- End of Right Column -->
      </div>
    </div>
    <!--====== CONTENT END ======-->
</main>

<!--====== FOOTER START ======-->
<?php include 'assets/inc/footer.php'; ?>
<!--====== FOOTER END ======-->


</body>

</html>