<?php
session_start();

if(isset($_SESSION["session_email"]) && isset($_SESSION["session_password"])) {
    unset($_SESSION["session_email"]);
    unset($_SESSION["session_password"]);
    session_destroy();
    echo "You have been logged out.";
} else {
    echo "Please login.";
}
?>
