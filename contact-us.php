<?php  
session_start();  
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate data on the server (process data after the submit button is clicked)
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    // Basic validation if fields are empty
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }

    if (empty($feedback)) {
        $errors[] = "Feedback is required.";
    }

    if (empty($errors)) {
        // Process the data (e.g., store it in a database)
        echo "<p style='color: green;'>Form submitted successfully!</p>";
        // Clear form data
        $_POST = array();
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

    <!--====== Content START ======-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="contact-box" data-aos="slide-right">
                        <!-- Form with simple validation -->
                        <form id="contactForm" method="post" action="">
                            <div class="form-group">
                                <label class="my-3 fw-bold" for="name">Name:</label>
                                <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Enter your name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" oninput="validateField('name', 'nameError')">
                                <small id="nameError" style="color: red; display: none;">Name is required</small>
                            </div>
                            <div class="form-group">
                                <label class="my-3 fw-bold" for="email">Email:</label>
                                <input type="email" class="form-control mb-3" id="email" name="email" placeholder="Enter your email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" oninput="validateField('email', 'emailError')">
                                <small id="emailError" style="color: red; display: none;">Valid email is required</small>
                            </div>
                            <div class="form-group">
                                <label class="my-3 fw-bold" for="feedback">Feedback:</label>
                                <textarea class="form-control mb-3" id="feedback" name="feedback" rows="4" placeholder="Enter your feedback" oninput="validateField('feedback', 'feedbackError')"><?php echo isset($_POST['feedback']) ? $_POST['feedback'] : ''; ?></textarea>
                                <small id="feedbackError" style="color: red; display: none;">Feedback is required</small>

                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-12" data-aos="zoom-in">
                    <img src="assets/img/logo-remove-bg-sm.png" alt="ECO Logo" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!--====== Content END ======-->

</main>

<!--====== FOOTER START ======-->
<?php include 'assets/inc/footer.php'; ?>
<!--====== FOOTER END ======-->
