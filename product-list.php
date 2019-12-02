<?php
/** Automatisch laden van header */
include_once 'assets/autoloader.php';

/** Templates met gebruik van includes **/
include_once 'templates/navigation.php';
include_once 'classes/Products.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<div class="products-container">

    <?php
    //Kijkt op welke huidige pagina we zitten
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    echo '<div class="sum-count">';
    echo '<li><a href="product-list.php?CatID=' . $_GET["CatID"] . '&page=1&counter=25">25</a></li>';
    echo '<li><a href="product-list.php?CatID=' . $_GET["CatID"] . '&page=1&counter=50">50</a></li>';
    echo '<li><a href="product-list.php?CatID=' . $_GET["CatID"] . '&page=1&counter=100">100</a></li>';
    echo '</div>';

    /////////////////////////Item Amount Selection Per Page///////////////////
    $host = 'localhost';
    $dbName = 'wideworldimporters';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($host, $user, $password, $dbName);

    //Deze query haalt de items uit een specifieke categorie op
    $sql = "SELECT COUNT(*) FROM stockitems WHERE StockItemID IN
            (SELECT StockItemID FROM stockitemstockgroups WHERE StockGroupID = " . $_GET['CatID'] . ")";
    $result = mysqli_query($connection, $sql);

    //Deze loop haalt de individuele items uit de categorie en telt ze op (hieruit weten we vanuit hoeveel items we moeten rekenen etc)
    foreach ($result as $item) {
        $total_items = $item["COUNT(*)"];
        //$item_array[] = $item;
    }

    //Eerste variabele vertelt hoeveel max per pagina weergeven, en 2e variabele rekent uit hoeveel pagina's we daarvoor nodig hebben en rondt het naar boven af
    if (!isset($_GET["counter"])) {
        $results_per_page = 25;
    } else {
        $results_per_page = $_GET["counter"];
    }
    $number_of_pages = ceil($total_items / $results_per_page);

    //Bepaalt het eerste resultaat (als getal) wat wordt weergegeven per page
    $this_page_first_result = ($page - 1) * $results_per_page;
    $maxLimit = $this_page_first_result + $results_per_page;

    //Nu moeten we nog via een SQL statement de juiste hoeveelheid items per pagina opvragen
    //Hier gaat volgens mij nu nog iets fout.
    //Op de een of andere manier wordt er nog niet per page gelimiteerd naar 25 per
    $sql2 = "SELECT SI.StockItemID FROM stockitems SI JOIN stockitemstockgroups SG
              ON SI.StockItemID = SG.StockItemID WHERE SG.StockGroupID = " . $_GET['CatID'] . " LIMIT " . $this_page_first_result . "," . $maxLimit;
    $result2 = mysqli_query($connection, $sql2);


    //Print de items uit op de page
    foreach ($result2 as $item) {
        $ID = $item["StockItemID"];
        getProductsFromID($ID);
    }

    /////////////End/////////////////////////////////////?>
</div>


<li class="pagination-li">
    <?php
    //Weergeeft het aantal links afhankelijk van het aantal pages die we nodig hebben (totaal / 25)
    for ($page = 1; $page <= $number_of_pages; $page++) {
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
        if ($page == $_GET['page']) {
            echo '<a value="' . $page . '" href="product-list.php?CatID=' . $_GET["CatID"] . '&page=' . $page . '" class="pagination selected-page">' . $page . '</a>';
        } else {
            echo '<a value="' . $page . '" href="product-list.php?CatID=' . $_GET["CatID"] . '&page=' . $page . '" class="pagination">' . $page . '</a>';
        }
    }

    ?>
</li>
<?php
include_once 'templates/footer.php';
?>
</body>
</html>
