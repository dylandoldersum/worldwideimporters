<?php
/** Automatisch laden van header */
include_once 'assets/autoloader.php';

/** Templates met gebruik van includes **/
include_once 'templates/navigation.php';

foreach ($products->getProductImage() as $value){
    $photo = $value['Photo'];
}
foreach ($products->getProductInfo() as $value) {
    $itemName = $value['StockItemName'];
    $itemPrice = $value['RecommendedRetailPrice'];
    $itemDelivery = $value['LeadTimeDays'];
    $itemWeight = $value['TypicalWeightPerUnit'];
    $itemDescription1 = $value['Tags'];
    $itemDescription2 = $value['SearchDetails'];
    $stock = $value['LastStocktakeQuantity'];
}
$itemDescription = "$itemDescription2"."<br><br>".str_replace(str_split('"[]'),'', $itemDescription1);
?>

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
        <img <?php print $photo?> >
        </div>
        <div class="description">
            <p><?php print $itemDescription?> </p><br>
            <H4>Gewicht:</H4>
            <p><?php print $itemWeight ?> KG</p><br>
            <H4>Verzendtijd:</H4>
            <p><?php print $itemDelivery ?> dagen </p><br>
            <H4>Voorraad:</H4>
            <p><?php print $stock ?> stuks</p><br>
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
