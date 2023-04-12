<?php

define("DB_HOST", "localhost");
define("DB_NAME", "group49"); // Replace with your username
define("DB_USER", "root"); // Replace with your username
define("DB_PASS", ""); // Replace with your DB password

try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
}
catch (mysqli_sql_exception $ex) {
    // Something went wrong...
    echo "<p>Error: Unable to connect to database.</p>";
    echo "<p>Debugging errno: " . $ex->getCode() . "</p>";
    echo "<p>Debugging error: " . $ex->getMessage() . "</p>";
    exit;
}
