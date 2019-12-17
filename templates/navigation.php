<?php
/**
 *
 * Created by PhpStorm.
 * User: Dylan Doldersum
 * Date: 2019-11-07
 * Time: 19:27
 */
?>
<div class="main-nav">
    <div class="nav-container">
        <nav class="nav-bar">
            <div class="logo-nav">
                <a href="../worldwideimporters"><img class="logo" src="assets/images/logo.png"/></a>
            </div>
            <div class="search-nav">
                <form method="GET" action="search.php">
                    <input name="search" placeholder="Waar ben je naar opzoek?" type="text"/>
                    <select name="type" class="select-search">
                        <?php
                        if ($_GET['type'] === "pname") {
                            ?>
                            <option selected value="pname">Productnaam</option>
                            <option value="aname">Artikelnummer</option>
                            <?php
                        } else if ($_GET['type'] == "aname") {
                            ?>
                            <option value="pname">Productnaam</option>
                            <option selected value="aname">Artikelnummer</option>
                            <?php
                        } else {
                            ?>
                            <option selected value="pname">Productnaam</option>
                            <option value="aname">Artikelnummer</option>
                            <?php
                        }
                        ?>
                    </select>
                    <div class="submit-container">
                        <input type="submit" value="" class="search">
                    </div>
                </form>
            </div>
            <div class="profile-nav">
                <?php
                if (isset($_SESSION['loggedin'])) {
                    ?>
                    <span class="welkom">Welkom <br> <b><?php echo $_SESSION['logindata']['first_name'] ?></b></span>
                    <a class="tooltip" href="logout.php"><img class="profile" src="assets/images/logout-ico.png"/>
                        <span class="tooltiptext tooltip-bottom">Logout</span>
                    </a>

                    <?php
                } else {
                    ?>
                    <span class="welkom">Welkom <br> Gebruiker </span>
                    <a class="tooltip" href="login.php"><img class="profile" src="assets/images/login-ico.png"/>
                        <span class="tooltiptext tooltip-bottom">Login</span>
                    </a>
                    <?php
                }
                ?>
                <div class="cart-container">
                    <a href="winkelwagen.php"><img class="cart" src="assets/images/cart-ico.png"/></a>
                    <span class="cart-count"><?php print Countcart() ?></span>
                </div>
            </div>
        </nav>
    </div>


    <?php
    include_once 'templates/category.php';
    ?>
</div>