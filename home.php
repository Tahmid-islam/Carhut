<!-- This is a homepage -->
<?php

if (isset($_COOKIE['User'])) {
    header("location:profile.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
        </div>
        </nav>




        <!-- This part is use for car collecetion slideshow -->

        <div class="container">
            <h3>Our latest collections: </h3>

            <div id="mainblock">
                <div class="slideshow-container">

                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="Images/car1.jpg" style="width:100%">
                        <div class="text">Toyota</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="Images/car2.jpg" style="width:100%">
                        <div class="text">Nissan</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="Images/car3.jpg" style="width:100%">
                        <div class="text">Toyota</div>
                    </div>

                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>

                </div>
                <br>

                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>

                <script>
                var slideIndex = 0;
                showSlides();

                function showSlides() {
                    var i;
                    var slides = document.getElementsByClassName("mySlides");
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    slideIndex++;
                    if (slideIndex > slides.length) {
                        slideIndex = 1
                    }
                    slides[slideIndex - 1].style.display = "block";
                    setTimeout(showSlides, 5000); // Change image every 2 seconds
                }
                </script>
            </div>

        </div>

        <!-- This part is use for Login portion of Homepage -->

        <div class="container">
            <div id="sidebar">
                <form action="logindb.php" method="Post">
                    <ul class="form-style-1">

                        <label>You have to login first for order</label>
                        <label>User Name <span class="required">*</span></label>
                        <input type="text" name="uname" class="field-long" placeholder="email" required />
                        <label>Password <span class=" required">*</span></label>
                        <input type="password" name="psw" class="field-long" placeholder="Password" required />
                        <?php
                        if (@$_GET['Invalid'] == true) {
                            echo $_GET['Invalid'];
                        }
                        ?>
                        <label>Remember me <input type="checkbox" id="rememberme" name="rememberme"
                                value="rememberme" /></label>
                        <input class="button" type="submit" name="login" value="Log In" />
                    </ul>
                </form>

                <ul class="form-style-1">
                    <label>If you don't have a account,please register below.</label>
                    <a href="registration.php">
                        <li>
                            <input type="submit" value="Registration" />
                        </li>
                    </a>
                </ul>
            </div>
        </div>

        <!-- This part is footer part -->

        <div class="footer">
            <h3>&copy; 2021 Car Hut. All Rights Reserved. </h3>
        </div>
    </header>

    </div>
</body>


</html>