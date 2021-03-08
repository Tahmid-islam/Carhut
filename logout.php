<!-- This is the logout page -->

<?php
session_start();
if (isset($_GET['logout'])) {

    setcookie("User", "", time() - 3600);
    session_destroy();
    header("location:home.php");
}