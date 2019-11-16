<?php
/**
 *
 * Created by PhpStorm.
 * User: Dylan Doldersum
 * Date: 2019-11-15
 * Time: 17:37
 */

/** Automatisch laden van header */
include_once 'assets/autoloader.php';

/** Templates met gebruik van includes **/
include_once 'templates/navigation.php';

require_once 'classes/Search.php';
$search = new Search();
?>

<body>
    <div class="products-container">
        <?php
        if (isset($_GET['search']) && !empty($_GET['search'] )) {
            if($search->getResults() == null || empty($search->getResults())) {
                print("There no items avaialable for keyword <b>". $_GET['search']. "</b>");
            } else {
                foreach ($search->getResults() as $value) {
                    $itemName = $value['StockItemName'];
                    $price = $value['RecommendedRetailPrice'];
                    $itemID = $value['StockItemID'];
                    $photo = $value['Photo'];

                    if ($photo === "" || empty($photo)) {
                        $source = "assets/images/logo.png";
                    } else {
                        $source = "data:image/jpeg;base64," . base64_encode($photo);
                    }
                    print("<li class='product-list'><a class='product-anchor' href='product-detail.php?itemID=$itemID'>
                    <h3 class='product_text'>$itemName</h3>
                    <img class='product_photo' src='" . $source . "' alt='#' width='80%', height='200px'>
                    <p class='product_text'>PRICE: €$price</p>
                    </a></li>");
                }
            }
        }
        ?>
    </div>
    <? include_once 'templates/footer.php'; ?>
</body>


