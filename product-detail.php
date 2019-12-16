<?php
/** Automatisch laden van header */
include_once 'assets/autoloader.php';

/** Templates met gebruik van includes **/
include_once 'templates/navigation.php';

// session_unset();
// session_destroy();


foreach (getProductInfo() as $value) {
    $itemName = $value['StockItemName'];
    $itemPrice = $value['RecommendedRetailPrice'];
    $itemDelivery = $value['LeadTimeDays'];
    $itemWeight = $value['TypicalWeightPerUnit'];
    $itemDescription1 = $value['Tags'];
    $itemDescription2 = $value['SearchDetails'];
    $stock = $value['LastStocktakeQuantity'];
    $photo = "";


}
$itemDescription = "$itemDescription2" . "<br><br>" . str_replace(str_split('"[]'), '', $itemDescription1);



?>
<script>
    function NotVideo() {
        alert("No video... Try again later!");
    }
</script>
<body>
<div class="product-container">
    <div class="first-row">
        <div class="productname">
            <H1><?php print $itemName ?></H1>
        </div>
    </div>
    <div class="mid-row">
        <div class="picture">
            <H1></H1>
            <img src="<?php print getProductImage($photo) ?> ">
        </div>
        <div class="description">
            <p><?php print $itemDescription ?> </p><br>
            <H4>Gewicht:</H4>
            <p><?php print $itemWeight ?> KG</p><br>
            <H4>Verzendtijd:</H4>
            <p><?php print $itemDelivery ?> dagen </p><br>
            <H4>Voorraad:</H4>
            <p><?php print $stock ?> stuks</p><br>
            <?php
            $graden = 3.75;
            if (getTemperature($_GET["itemID"]) == 1) {
                print "<H4>Temperatuur:</H4>
            <p> $graden graden celsius</p><br>";
            }
            ?>
            <a href="#" onclick=NotVideo()>Click for a video!</a><br>
            <div class="buybutton">
                <form method="POST">
                    <input type="submit" name="submit" value="IN WINKELWAGEN" class="buy">
                </form>
                <?php

                if (isset($_POST["submit"])) {
                    $bool = false;
                    $temp = $_GET['itemID'];
                    /**
                     * $bool = checked of een product die je wilt toevoegen in de array zit (cart)
                     * $i = index waarmee door de array loopen (cart)
                     */
                    for ($i = 0; $i < sizeof($_SESSION['itemID']); $i++) {
                        /** Als temp (productid uit de URL) al in de array aanwezig is dan... */
                        if ($temp == $_SESSION['itemID'][$i]['code']) {
                            $_SESSION['itemID'][$i]['quantity'] += 1;
                            $bool = true;
                        }
                        /** Als temp(productid uit de URL) NIET aanwezig is en de FOR loop afgelopen is dan... */
                        if (!$temp == $_SESSION['itemID'][$i]['code'] && $i == sizeof($_SESSION['itemID'] - 1)) {
                            $bool = false;
                        }
                    }
                    /** Als product niet in de array (cart) aanwezig is dan... */
                    if ($bool == false) {
                        $itemArray = array(
                            "code" => $_GET['itemID'],
                            "quantity" => 1,
                            "pname" => $itemName,
                            "desc" => $itemDescription,
                            "weight" => $itemWeight,
                            "delivertime" => $itemDelivery,
                            "stock" => $stock,
                            "price" => $itemPrice);
                        $_SESSION["itemID"][] = $itemArray;
                    }
                    header('location:?itemID=' . $_GET["itemID"]);

                }
                ?>
            </div>
            <div class="price">
                <H1> € <?php print $itemPrice; ?></H1>
            </div>
        </div>

    </div>

      <a id='delenMeningA' href="writeReviewProduct.php?itemID=<?php echo $_GET['itemID'] ?>"><h2 id='delenMening'>Deel uw mening over dit product!</h2></a>

      <div class="current-container">
        <div class="current-ratings-and-reviews">
          <h3>Reviews: <?php reviewCounterProduct(); ?></h3> <br>
          <h4>Zeer goed: <?php zeergoedCounterP(); ?></h4>
          <h4>Goed: <?php goedCounterP(); ?></h4>
          <h4>Matig: <?php matigCounterP(); ?></h4>
          <h4>Slecht: <?php slechtCounterP(); ?></h4>
          <h4>Zeer slecht: <?php zeerslechtCounterP(); ?></h4>
        </div>
      </div>

      <div class="reviews-on-site-container">
        <div class="reviews-on-site-content">
            <?php foreach (loadReviewsproducts() as $value) {?>
                <div class="review">
                    <?php
                    $name = $value['name'];
                    $rating = $value['rating'];
                    $message = $value['message'];
                    $date = $value['datum'];
                    ?>
                    <li><p><?php  echo $name  ?> - <?php  echo $rating  ?></p></li>
                    <li><p class="review-omschrijving">&#8220;<?php  echo $message  ?>&#8221;</p></li>
                    <li><p class="date-review"><?php  echo $date ?></p></li>
                </div>
            <?php } ?>
        </div>
      </div>
    <div class="products-from-category-detailpage">
        <?php foreach (getCategoryProducts() as $value){ ?>
        <div class="relatedproducts">
            <?php
            $productname = $value['StockItemName'];
            $productphoto = $value['Photo'];
            $retailprice = $value['RecommendedRetailPrice'];
            $stockitemid = $value['StockItemID'];

            ?>
            <li><p><?php  echo $productname ?> € <?php echo $retailprice?> <?php echo $productphoto?> </p></li>
            <img class="product_photo" src=" <?php echo GetCategoryPhoto($photo) ?>" alt='#' width='80%' height='200px'>

        </div>
        <?php } ?>
    </div>


</div>
</body>
<?php
include_once 'templates/footer.php';
?>
