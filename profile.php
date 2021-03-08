<!-- This is the profile page -->

<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "carhut");


// This part is use for cart

if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'               =>     $_GET["id"],
                'item_name'               =>     $_POST["hidden_name"],
                'item_price'          =>     $_POST["hidden_price"],
                'item_colour'               =>     $_POST["hidden_colour"],
                'item_brand'               =>     $_POST["hidden_brand"],
                'item_sellerinfo'               =>     $_POST["hidden_sellerinfo"],
                'item_quantity'          =>     $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="profile.php"</script>';
        }
    } else {
        $item_array = array(
            'item_id'               =>     $_GET["id"],
            'item_name'               =>     $_POST["hidden_name"],
            'item_price'          =>     $_POST["hidden_price"],
            'item_colour'               =>     $_POST["hidden_colour"],
            'item_brand'               =>     $_POST["hidden_brand"],
            'item_sellerinfo'               =>     $_POST["hidden_sellerinfo"],
            'item_quantity'          =>     $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="profile.php"</script>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<title>Profile</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="pstyle.css">
<style type="text/css">

</style>

<body>

    <header id="main-header">
        <div class="container">
            <h1 class="glow">Car Hut(পানির দামে গাড়ি কিনুন)</h1>
            <nav id="navbar">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="sellerinfo.php">Seller Information</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li> <?php if (isset($_COOKIE['User'])) echo '<a href="Logout.php?logout"> ' ?>Logout</a> </li>
                    <h3 align="center"><?php
                                        if (isset($_COOKIE['User'])) {
                                            echo ' Well Come ' . $_COOKIE['User'] . '<br/>';
                                        } else {
                                            header("location:home.php");
                                        }
                                        ?></h3>
                </ul>
            </nav>
        </div>
    </header>


    <div class="container">
        <div class="wrapper">

            <!-- This part is use for cart -->

            <h3>Shopping Cart: </h3>

            <table id="customers">
                <tr>
                    <th width="15%">Item Name</th>
                    <th width="15%">Brand</th>
                    <th width="5%">Quantity</th>
                    <th width="5%">Colour</th>
                    <th width="15%">Price</th>
                    <th width="20%">Seller Information</th>
                    <th width="15%">Total</th>
                    <th width="10%">Action</th>
                </tr>
                <?php
                if (!empty($_SESSION["shopping_cart"])) {
                    $total = 0;
                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                ?>
                <tr>
                    <td><?php echo $values["item_name"]; ?></td>
                    <td><?php echo $values["item_brand"]; ?></td>
                    <td><?php echo $values["item_quantity"]; ?></td>
                    <td><?php echo $values["item_colour"]; ?></td>
                    <td>Tk <?php echo $values["item_price"]; ?></td>
                    <td><?php echo $values["item_sellerinfo"]; ?></td>
                    <td>TK <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                    <td><a href="profile.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span
                                class="text-danger">Remove</span></a></td>
                </tr>
                <tr>
                    <?php
                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
                    }
                        ?>
                </tr>

                <tr>
                    <td colspan="6" align="right">Total</td>
                    <td align="left">Tk <?php echo number_format($total, 2); ?></td>
                    <td></td>
                </tr>

                <tr>

                    <td colspan="7" align="right">

                        <form action="confirm.php" method="post">
                            <input type="submit" value="Proceed to payment" />
                            <input type="hidden" name="amount" value="<?php echo number_format($total, 2); ?>">
                        </form>

                    </td>

                    <td></td>
                </tr>
                <?php
                }
                    ?>
            </table>
            <br><br>

            <!-- This part use for serach bar -->

            <div class="heading">
                <div>

                    <table>

                        <th><input type="text" Item Name="search" id="search_data" autocomplete="off"
                                placeholder=" Search for products" style="width:400px;height:40px;"></th>


                </div>

                </table>
            </div>
        </div>
    </div>

    <!-- This part is use for product description -->



    <div class="content">

        <h3>All Cars: </h3>
        <?php
        $query = "SELECT * FROM tbl_product ORDER BY id ASC";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
        ?>

        <form method="post" action="profile.php?action=add&id=<?php echo $row["id"]; ?>">


            <table border="5" class="carlist" id="car_details_<?php echo $row["id"]; ?>">
                <tr>
                    <td rowspan="9"> <img class="mySlides product_drag" src="<?php echo $row["image"]; ?>"
                            style="width:400px;height:200px;" data-id="<?php echo $row['id']; ?>"
                            data-name="<?php echo $row['name']; ?>" data-price="<?php echo $row['price']; ?>"></td>
                    <th colspan="2">Basic Product Information</th>
                </tr>
                <tr>
                    <td bgcolor="#f2ffcc">Item Name</td>
                    <td><?php echo $row["name"]; ?></td>
                </tr>
                <tr>
                    <td bgcolor="#f2ffcc">Brand</td>
                    <td><?php echo $row["brand"]; ?></td>
                </tr>
                <tr>
                    <td bgcolor="#f2ffcc">Condition:</td>
                    <td><?php echo $row["Condition"]; ?></td>
                </tr>
                <tr>
                    <td bgcolor="#f2ffcc">Colour</td>
                    <td><?php echo $row["colour"]; ?></td>
                </tr>
                <tr>
                    <td bgcolor="#f2ffcc">Seller Information</td>
                    <td><?php echo $row["sellerinfo"]; ?></td>
                </tr>
                <tr>
                    <td bgcolor="#f2ffcc">Price:</td>
                    <td>Tk <?php echo $row["price"]; ?></td>
                </tr>

                <tr>
                    <td bgcolor="#f2ffcc">quantity:</td>
                    <td> <input type="text" name="quantity" value="1" />
                    </td>
                </tr>


                <!-- This part is use for sent the selected product information to the cart -->
                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                <input type="hidden" name="hidden_brand" value="<?php echo $row["brand"]; ?>" />
                <input type="hidden" name="hidden_colour" value="<?php echo $row["colour"]; ?>" />
                <input type="hidden" name="hidden_sellerinfo" value="<?php echo $row["sellerinfo"]; ?>" />

                <tr>
                    <td bgcolor=""></td>
                    <td>
                        <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success"
                            value="Add to Cart" />
                    </td>
                </tr>

            </table>

        </form>

        <?php
            }
        }
        ?>



    </div>


    </div>

</body>

</html>


<!-- This part is use for search in javascript  -->

<script>
$(document).ready(function() {

    $('#search_data').autocomplete({
        source: "Search_DB.php",
        minLength: 1,
        select: function(event, ui) {
            $('#search_data').val(ui.item.value);
            var result_id = ui.item.id;

            document.querySelectorAll('.carlist').forEach(function(el) {
                el.style.display = 'none';
            });
            document.getElementById("car_details_" + result_id).style.display = "block";
        }
    }).data('ui-autocomplete')._renderItem = function(ul, item) {
        return $("<li class='ui-autocomplete-row'></li>")
            .data("item.autocomplete", item)
            .append(item.label)
            .appendTo(ul);
    };

});
</script>