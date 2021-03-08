<!-- This is login database information -->
<?php
session_start();
require_once('config.php');
if (isset($_POST['login'])) {
    $query = "select * from user where Email='" . $_POST['uname'] . "' and Password='" . $_POST['psw'] . "'";
    $result = mysqli_query($con, $query);

    if (mysqli_fetch_assoc($result)) {
        $_SESSION['User'] = $_POST['uname'];

        $name = $_POST['uname'];
        setcookie('User', $name);
        header("location:profile.php");
    } else {
        header("location:home.php?Invalid= Please Enter Correct User Name and Password ");
    }
} else {
    echo 'Not Working Now Guys';
}
mysqli_close($con);