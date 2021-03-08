<!-- This page part is use for registration page database connection -->

<?php
session_start();
?>

<?php
$Name = $_POST['Name'];
$User_Name = $_POST['UserName'];
$Password = $_POST['password'];
$Repassword = $_POST['repassword'];
if (isset($_POST['gender'])) {
    $Gender = $_POST['gender'];
}

$Contact_No = $_POST['ContactNo'];
$Email = $_POST['email'];


require_once('config.php');
if ($Password == $Repassword) {
    if (mysqli_query($con, "INSERT INTO user (Name, User_Name, Password, Gender, Contact_No, Email) VALUES ('$Name', '$User_Name', '$Password', '$Gender', '$Contact_No', '$Email')")) {
        header("Location:home.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
} else {
    $_SESSION["error1"] = "Password did not match";
    header("Location:registration.php");
}
mysqli_close($con);
?>