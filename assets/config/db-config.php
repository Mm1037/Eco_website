<?php
// Database configuration
define('DB_SERVER', 'localhost'); // Database server, usually 'localhost'
define('DB_USERNAME', 'root'); // Database username
define('DB_PASSWORD', ''); // Database password
define('DB_NAME', 'edix_eco'); // Database name

// Try connecting to the database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the database connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
