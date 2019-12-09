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
            $graden = rand(38, 43) / 10;
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
    <div class='reviews'>
      <a href="writeReviewProduct.php"><h2 id='delenMening'>Deel met uw mening over dit product!</h2></a>
    </div>
</div>
</body>
<?php
include_once 'templates/footer.php';
?>
