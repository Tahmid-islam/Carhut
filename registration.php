<!-- This is the registration page -->

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header id="main-header">
        <div class="container">
            <h1 class="glow">Car Hut(পানির দামে গাড়ি কিনুন)</h1>

            <nav id="navbar">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="sellerinfo.php">Seller Information</a></li>
                </ul>
            </nav>


            <!-- This is registration form part -->

            <div class="container">
                <form class="myform" name="regform" action=" R_database.php" method="post"
                    onsubmit="return formValidation();">
                    <ul class="form-style-1">
                        <lebel>Name: </lebel>
                        <input type="text" class="field-long" name="Name" /><br><br>
                        <lebel>User Name: </lebel>
                        <input type="text" class="field-long" name="UserName" />
                        <br><br>
                        <lebel>Password: </lebel>
                        <input type="password" class="field-long" name="password" />
                        <br>
                        <!-- this is use for session which detect the password match or not -->
                        <?php
                        if (isset($_SESSION["error1"])) {
                            echo $_SESSION["error1"];
                        }
                        ?> <br>

                        <lebel>Re-type Password: </lebel>
                        <input type="password" class="field-long" name="repassword" />
                        <br />
                        <li>
                            <lebel>Gender: </lebel>
                            <label for="male"><input type="radio" id="male" name="gender" value="Male">Male</label>
                            <label for="female"><input type="radio" id="female" name="gender"
                                    value="Female">Female</label>
                            <label for="other"><input type="radio" id="other" name="gender" value="Other">Other</label>
                        </li>
                        <lebel>Contact no: </lebel>
                        <input type="tel" class="field-long" name="ContactNo">
                        <br>
                        <lebel>Email:</lebel>
                        <input type="email" class="field-long" name="email"><br><br>
                        <input class="button" type="submit" value="submit" name="regsubmit" />
                    </ul>
                </form>
            </div>
        </div>


        <!-- This is a javascript part for client side form validation -->

        <script type="text/javascript">
        function formValidation() {

            var Name = document.regform.Name;
            var UserName = document.regform.UserName;
            var password = document.regform.password;
            var gender = document.regform.gender;
            var ContactNo = document.regform.ContactNo.value;
            var ContactNo2 = document.regform.ContactNo;


            if (Name.value.length <= 0) {
                alert("Name cannot be empty");
                Name.focus();
                return false;
            }

            if (/\s/.test(UserName.value) || UserName.value.length <= 0) {
                alert("Username cannot be empty and cannot contain whitespace");
                UserName.focus();
                return false;
            }

            if (password.value.length < 8 || password.value.length > 32) {
                alert("Password length is between 8-32 character");
                password.focus();
                return false;
            }

            if (gender.value.length <= 0) {
                alert("Gender is not selected");
                return false;
            }

            if (ContactNo2.value.length <= 0) {
                alert("Contact no. cannot be empty");
                ContactNo2.focus();
                return false;
            }

            if (isNaN(ContactNo)) {
                alert("Contact number contains numbers only");
                return false;
            }

            return true;
        }
        </script>


        <div class="footer">
            <h3>&copy; 2021 Car Hut. All Rights Reserved.</h3>
        </div>
        </div>
    </header>
</body>

</html>

<?php
session_destroy();
?>