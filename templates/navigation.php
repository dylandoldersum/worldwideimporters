<?php
/**
 *
 * Created by PhpStorm.
 * User: Dylan Doldersum
 * Date: 2019-11-07
 * Time: 19:27
 */

    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $sql = "SELECT * FROM stockitems WHERE StockItemName LIKE '%" . $_GET['search'] . "%'";
        $result = mysqli_query($conn, $sql);

        foreach ($result as $item) {
             $response[] = $item['StockItemName'];
        }
    }
?>

<div class="nav-container">
    <nav class="nav-bar">
        <div class="logo-nav">
            <a href="../worldwideimporters"><img class="logo" src="assets/images/logo.png"/></a>
        </div>
        <div class="search-nav">
            <form method="GET" action="">
            <input name="search" placeholder="Waar ben je naar opzoek?" type="text"/>
                <div class="submit-container">
                    <input type="submit" value="" class="search">
                </div>
            </form>
        </div>
        <div class="profile-nav">
            <span class="welkom">Welkom <br> <b>Dylan</b></span>
            <a href="#"><img class="profile" src="assets/images/profile-ico.png"/></a>
            <div class="cart-container">
                <a href="#"><img class="cart" src="assets/images/cart-ico.png"/></a>
                <span class="cart-count">1</span>
            </div>
        </div>
    </nav>
</div>

<div class="footer">
  <p class="copyright">&copy WideWorldImporters 2019</p>
  <a href="contact.php">Contact</a>
</div>

<?php
include_once 'templates/category.php';
 ?>

<?php
foreach ($response as $item) {
    echo $item ."<br>";
}
?>