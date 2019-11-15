<?php

/** Automatisch laden van header */
include_once 'assets/autoloader.php';

/** Templates met gebruik van includes **/
include_once 'templates/navigation.php';

?>

<body>
<?php


$sql=  "SELECT I.StockItemName, I.RecommendedRetailPrice, I.LeadTimeDays, I.TypicalWeightPerUnit, I.Tags, I.SearchDetails, H.LastStocktakeQuantity 
        From stockitems AS I 
        JOIN stockitemholdings AS H ON I.StockitemID = H.StockitemID
        WHERE I.StockItemID=". $_GET['itemID'];
$result = mysqli_query($conn, $sql);

foreach ($result as $value) {
    $itemName = $value['StockItemName'];
    $itemPrice = $value['RecommendedRetailPrice'];
    $itemDelivery = $value['LeadTimeDays'];
    $itemWeight = $value['TypicalWeightPerUnit'];
    $itemDescription1 = $value['Tags'];
    $itemDescription2 = $value['SearchDetails'];
}
$itemDescription = "$itemDescription2"."<br><br>".str_replace(str_split('"[]'),'', $itemDescription1);

?>
<div class="product-container">
    <div class="first-row">
        <div class="productname">
            <H1><?php print $itemName ?></H1>
        </div>

    </div>
    <div class="mid-row">
        <div class="picture">
             <H1></H1>
        <img src="https://cdn.babymarkt.com/babymarkt/img/107440/900/steiff-teddybeer-finn-40-cm-beige-a021097.jpg">
        </div>
        <div class="description">
            <H2>omschrijving</H2> <br>
            <H4><?php print $itemDescription?> </H4> <br>
            <H4>gewicht</H4> <br>
            <H4><?php print $itemWeight ?> KG</H4> <br>
            <H4>Verzendtijd</H4> <br>
            <H4><?php print $itemDelivery ?> dagen </H4>
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
