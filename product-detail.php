<?php

/** Automatisch laden van header */
include_once 'assets/autoloader.php';

/** Templates met gebruik van includes **/
include_once 'templates/navigation.php';

?>

<body>
<?php


$sql= "SELECT StockItemName, RecommendedRetailPrice, LeadTimeDays, TypicalWeightPerUnit From stockitems WHERE StockItemID=". $_GET['itemID'];
$result = mysqli_query($conn, $sql);

foreach ($result as $value) {
    $itemName = $value['StockItemName'];
    $itemPrice = $value['RecommendedRetailPrice'];
    $itemDelivery = $value['LeadTimeDays'];
    $itemWeight = $value['TypicalWeightPerUnit'];

}

?>
<div class="product-container">
    <div class="first-row">
        <div class="productname">
            <H1><?php print $itemName ?></H1>
        </div>
        <div class="price">
            <H1> € <?php print $itemPrice ?></H1>
        </div>
    </div>
    <div class="mid-row">
        <div class="picture">
             <H1></H1>
        <img src="https://cdn.babymarkt.com/babymarkt/img/107440/900/steiff-teddybeer-finn-40-cm-beige-a021097.jpg">
        </div>
        <div class="description">
            <H1>omschrijving</H1> <br>
            <H2>gewicht</H2> <br>
            <H3><?php print $itemWeight ?> KG</H3> <br>
            <H4>Verzendtijd</H4> <br>
            <H5><?php print $itemDelivery ?> dagen </H5>
            <div class="buybutton">
                <input type="submit" value="IN WINKELWAGEN" class="buy">
            </div>
        </div>
    </div>
</div>
</body>

<?php
include_once 'templates/footer.php';
?>
