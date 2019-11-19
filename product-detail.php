<?php
/** Automatisch laden van header */
include_once 'assets/autoloader.php';

/** Templates met gebruik van includes **/
include_once 'templates/navigation.php';


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
$itemDescription = "$itemDescription2"."<br><br>".str_replace(str_split('"[]'),'', $itemDescription1);


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
        <img src="<?php  print getProductImage($photo) ?> ">
        </div>
        <div class="description">
            <p><?php print $itemDescription?> </p><br>
            <H4>Gewicht:</H4>
            <p><?php print $itemWeight ?> KG</p><br>
            <H4>Verzendtijd:</H4>
            <p><?php print $itemDelivery ?> dagen </p><br>
            <H4>Voorraad:</H4>
            <p><?php print $stock ?> stuks</p><br>
            <?php
            if (getTemperature($_GET["itemID"])== 1){
                print "<H4>Temperatuur:</H4>
            <p>  4 graden celsius</p><br>";
            }
            ?>
            <a href="#" onclick=NotVideo()>Click for a video!</a><br>
            <div class="buybutton">
                <input type="submit" value="IN WINKELWAGEN" class="buy">
            </div>
            <div class="price">
                <H1> € <?php print $itemPrice ?></H1>
            </div>
        </div>

    </div>
</div>
</body>

<?php
include_once 'templates/footer.php';
?>
