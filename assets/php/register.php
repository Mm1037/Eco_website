<?php
session_start();

// Connection of Database
require("../config/db-config.php");
// Main File for Functions and Actions
require("verify.php");

// Form For Sign-up
if(isset($_POST['submit'])){
    $first_name = validate($_POST['fname']);
    $last_name = validate($_POST['lname']);
    $username = validate($_POST['email']);
    $password = validate($_POST['password']);
    $date = date('Y-m-d H:i:s');

    $db_users = getUsers($conn);
    $status = checkUsername($db_users, $username);
    if($status == "duplicated"){
        $_SESSION["s_status"] = $status;
        header("Location:../../auth.php");
    }else{
        $_SESSION["s_status"] = $status;

        $sql = "INSERT INTO users (FNAME, LNAME, USERNAME, PASSWORD, CREATED_DATE, ROLE, TOKEN) VALUES('" . $first_name . "','" . $last_name . "','" . $username . "','" . $password . "','" . $date . "',"."'public',''".");";
        if ($conn->query($sql) === TRUE) {            
            header("Location:../../auth.php");
          } else {
            header("Location:../../not-found-404.php?$conn->error");
          }
    }


}else{
    echo '<script>alert("You ara not authenticated for acces this page !")</script>';
    ?>

    <section>
        <div class="container text-center">
                <a href="../../index.php" class="btn btn-secondary">Go Home <i class="ri ri-home"></i></a>
        </div>
    </section>

<?php
}
?>




