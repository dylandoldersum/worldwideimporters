<?php


function getCategoriesForNavigation()
{
    $host = 'localhost';
    $dbName = 'wideworldimporters';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($host, $user, $password, $dbName);

    $sql = "SELECT StockGroupName, StockGroupID FROM stockgroups";
    $result = mysqli_query($connection, $sql);
    foreach ($result as $value) {
        $catID = $value['StockGroupID'];
        print("<li><a href='product-list.php?CatID=$catID'> " . $value['StockGroupName'] . "</a></li>");
    }
}

function getProductImage($photo)
{
    $host = 'localhost';
    $dbName = 'wideworldimporters';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($host, $user, $password, $dbName);

    $sql = "SELECT StockGroupID FROM stockitemstockgroups WHERE StockItemID=$_GET[itemID]";
    $result = mysqli_query($connection, $sql);
    foreach ($result as $value) {
        $StockGroupID = $value['StockGroupID'];
    }
    if ($photo === "" || empty($photo)) {
        $source = "assets/images/Cat-$StockGroupID.png";
    } else {
        $source = "data:image/jpeg;base64," . base64_encode($photo);
    }
    return $source;

}


function getFavouriteItems()
{
    $host = 'localhost';
    $dbName = 'wideworldimporters';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($host, $user, $password, $dbName);

    $sql = "SELECT StockItemName, RecommendedRetailPrice, StockItemID
                FROM stockitems
                WHERE StockItemID = 2 OR StockItemID = 23 OR StockItemID = 1 OR StockItemID = 17 OR StockItemID = 10 OR  StockItemID = 69";
    $result = mysqli_query($connection, $sql);

    foreach ($result as $value) {
        $itemName = $value['StockItemName'];
        $price = $value['RecommendedRetailPrice'];
        $itemID = $value['StockItemID'];
        print("<a href='product-detail.php?itemID=$itemID'><div class='favorites'>" . $itemName . "<br>€" . $price . "<br><img src='assets/images/USBrocket.jpg' height='300px' width='300'>" . "</a></div>");
    }
}


Function GetCategoryPhoto($photo)
{
    $StockGroupID = $_GET['CatID'];
    if ($photo === "" || empty($photo)) {
        $source = "assets/images/Cat-$StockGroupID.png";
    } else {
        $source = "data:image/jpeg;base64," . base64_encode($photo);
    }
    return $source;
}


Function getSearchPhoto($photo, $catID)
{
    $value = "";
    $StockGroupID = $catID;
    if ($photo === "" || empty($photo)) {
        $source = "assets/images/Cat-$StockGroupID.png";
    } else {
        $source = "data:image/jpeg;base64," . base64_encode($photo);
    }
    return $source;
}


function getProductsFromCategory()
{
    $host = 'localhost';
    $dbName = 'wideworldimporters';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($host, $user, $password, $dbName);
    $sql = "SELECT StockItemName, RecommendedRetailPrice, StockItemID, Photo FROM stockitems WHERE StockItemID IN
                (SELECT StockItemID FROM stockitemstockgroups WHERE StockGroupID = " . $_GET['CatID'] . ")";
    $result = mysqli_query($connection, $sql);
    $count = 0;

    foreach ($result as $value) {
        $itemName = $value['StockItemName'];
        $price = $value['RecommendedRetailPrice'];
        $itemID = $value['StockItemID'];
        $photo = $value['Photo'];
        $count++;
        print("<li class='product-list'><a class='product-anchor' href='product-detail.php?itemID=$itemID'>
                    <h3 class='product_text'>$itemName</h3>
                    <img class='product_photo' src='" . GetCategoryPhoto($photo) . "' alt='#' width='80%', height='200px'>
                    <p class='product_text'>PRICE: €$price</p>
                    </a></li>");

    }
}

function getProductsFromID($id)
{
    $host = 'localhost';
    $dbName = 'wideworldimporters';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($host, $user, $password, $dbName);
    $sql = "SELECT StockItemName, RecommendedRetailPrice, StockItemID, Photo FROM stockitems WHERE StockItemID =" . $id;
    $result = mysqli_query($connection, $sql);
    $count = 0;

    foreach ($result as $value) {
        $count++;
        $response[] = $value;
    }
    return $response;
}

function getProductInfo()
{
    $host = 'localhost';
    $dbName = 'wideworldimporters';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($host, $user, $password, $dbName);
    $sql = "SELECT I.StockItemName, I.RecommendedRetailPrice, I.LeadTimeDays, I.TypicalWeightPerUnit, I.Tags, I.SearchDetails, H.LastStocktakeQuantity
        From stockitems AS I
        JOIN stockitemholdings AS H ON I.StockitemID = H.StockitemID
        WHERE I.StockItemID=" . $_GET['itemID'];
    $result = mysqli_query($connection, $sql);
    return $result;
}

function getCategoryProducts()
{
    $host = 'localhost';
    $dbName = 'wideworldimporters';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($host, $user, $password, $dbName);
    $sql = "SELECT StockItemName, RecommendedRetailPrice, StockItemID, Photo FROM stockitems WHERE StockItemID IN
                (SELECT StockItemID FROM stockitemstockgroups WHERE StockGroupID = " . $_GET['CatID'] . ")";
    $result = mysqli_query($connection, $sql);
}

function checkSearchType()
{
    if ($_GET['type'] == "pname") {
        $str = $_GET['search'];
        $sql = "SELECT *
                FROM stockitems AS I
                WHERE I.StockItemName LIKE '%" . trim($str) . "%'";
    } else {
        $sql = "SELECT *
                FROM stockitems AS I

                WHERE I.StockItemId = " . $_GET['search'];
    }
    return $sql;
}

function getResults()
{
    $host = 'localhost';
    $dbName = 'wideworldimporters';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($host, $user, $password, $dbName);
    $result = mysqli_query($connection, checkSearchType());
    if ($result == null || empty($result))
        return false;

    $response = [];

    foreach ($result as $item) {
        $response[] = $item;
    }
    return $response;
}

function getTemperature($id)
{
    $host = 'localhost';
    $dbName = 'wideworldimporters';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($host, $user, $password, $dbName);
    $Chilled = 0;
    $sql = "SELECT IsChillerStock FROM stockitems WHERE StockItemID =" . $id;
    $result = mysqli_query($connection, $sql);
    foreach ($result as $value) {
        $Chilled = $value["IsChillerStock"];
    }
    return $Chilled;
}


function loadProductsWinkel()
{
    $host = 'localhost';
    $dbName = 'wideworldimporters';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($host, $user, $password, $dbName);

    foreach ($_SESSION['itemID'] as $item) {
        $sql = "SELECT StockItemName, StockItemID, Photo, RecommendedRetailPrice FROM stockitems WHERE StockItemID =" . $item['code'];
        $result = mysqli_query($connection, $sql);
        $response[] = $result;
    }
    return $response;
}


function Countcart()
{
    $host = 'localhost';
    $dbName = 'wideworldimporters';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($host, $user, $password, $dbName);

    $CartTotal = 0;
    if (isset($_SESSION['itemID'])) {
        foreach ($_SESSION['itemID'] as $loop) {
            $sql = "SELECT StockItemID FROM stockitems WHERE StockItemID = " . $loop['code'];
            $result = mysqli_query($connection, $sql);
            foreach ($result as $value) {
                $CartTotal++;
            }
        }
    }
    return $CartTotal;
}

function changeAmount()
{
    foreach ($_SESSION['itemID'] as $key => $product) {
        if ($product['code'] === $_GET['itemId']) {
            if ($_GET['amountchange'] == 'plus') {
                $_SESSION['itemID'][$key]['quantity'] = $_SESSION['itemID'][$key]['quantity'] + 1;
            } else if ($_GET['amountchange'] == 'min') {
                if ($_SESSION['itemID'][$key]['quantity'] <= 1) {
                    unset($_SESSION['itemID'][$key]);
                } else {
                    $_SESSION['itemID'][$key]['quantity'] = $_SESSION['itemID'][$key]['quantity'] - 1;
                }
            }
        }
        header('location: winkelwagen.php');
    }
}

function removeItemFromCart()
{
    foreach ($_SESSION['itemID'] as $key => $product) {
        if ($product['code'] === $_GET['itemId']) {
            unset($_SESSION['itemID'][$key]);
        }
        header('location: winkelwagen.php');
    }
}


function subTotaal()
{
    $host = 'localhost';
    $dbName = 'wideworldimporters';
    $user = 'root';
    $password = '';
    $connection = mysqli_connect($host, $user, $password, $dbName);
    $totalPrice = 0.00;

    if (isset($_SESSION['itemID'])) {
        foreach ($_SESSION['itemID'] as $item) {
            $sql_price_of_product = "SELECT RecommendedRetailPrice FROM stockitems WHERE StockItemID = " . $item['code'];
            $result = mysqli_query($connection, $sql_price_of_product);
            foreach ($result as $value) {
                $totalPrice = $totalPrice + $value['RecommendedRetailPrice'];
            }
        }
    }
    if ($totalPrice > 0) {
        return ($totalPrice);
    }
}

function CalculateBTW($price)
{
    $btw = ($price / 121) * 21;
    return round($btw, 2);
}


function loadReviewsWebsite () {
  $host = 'localhost';
  $dbName = 'wideworldimporters';
  $user = 'root';
  $password = '';
  $connection = mysqli_connect($host, $user, $password, $dbName);
  $sql_get_reviews = "SELECT reviewerID, name, rating, message, date FROM sitereviews";
  $result = mysqli_query($connection, $sql_get_reviews);
  return $result;
}

 function reviewCounterWebsite () {
   $host = 'localhost';
   $dbName = 'wideworldimporters';
   $user = 'root';
   $password = '';
   $connection = mysqli_connect($host, $user, $password, $dbName);
   $sql_review_counter = "SELECT COUNT(reviewerID) FROM sitereviews";
   $result = mysqli_query($connection, $sql_review_counter);

   foreach ($result as $counter) {
     $total = $counter['COUNT(reviewerID)'];
     print($total);
   }
 }

 function zeergoedCounter () {
   $host = 'localhost';
   $dbName = 'wideworldimporters';
   $user = 'root';
   $password = '';
   $connection = mysqli_connect($host, $user, $password, $dbName);
   $sql_review_counter = "SELECT COUNT(reviewerID) FROM sitereviews WHERE rating = 'Zeer goed'";
   $result = mysqli_query($connection, $sql_review_counter);

   foreach ($result as $counter) {
     $total = $counter['COUNT(reviewerID)'];
     print($total);
  }
 }

 function goedCounter () {
   $host = 'localhost';
   $dbName = 'wideworldimporters';
   $user = 'root';
   $password = '';
   $connection = mysqli_connect($host, $user, $password, $dbName);
   $sql_review_counter = "SELECT COUNT(reviewerID) FROM sitereviews WHERE rating = 'Goed'";
   $result = mysqli_query($connection, $sql_review_counter);

   foreach ($result as $counter) {
     $total = $counter['COUNT(reviewerID)'];
     print($total);
  }
 }

 function matigCounter () {
   $host = 'localhost';
   $dbName = 'wideworldimporters';
   $user = 'root';
   $password = '';
   $connection = mysqli_connect($host, $user, $password, $dbName);
   $sql_review_counter = "SELECT COUNT(reviewerID) FROM sitereviews WHERE rating = 'Matig'";
   $result = mysqli_query($connection, $sql_review_counter);

   foreach ($result as $counter) {
     $total = $counter['COUNT(reviewerID)'];
     print($total);
  }
 }

 function slechtCounter () {
   $host = 'localhost';
   $dbName = 'wideworldimporters';
   $user = 'root';
   $password = '';
   $connection = mysqli_connect($host, $user, $password, $dbName);
   $sql_review_counter = "SELECT COUNT(reviewerID) FROM sitereviews WHERE rating = 'Slecht'";
   $result = mysqli_query($connection, $sql_review_counter);

   foreach ($result as $counter) {
     $total = $counter['COUNT(reviewerID)'];
     print($total);
  }
 }

 function zeerslechtCounter () {
   $host = 'localhost';
   $dbName = 'wideworldimporters';
   $user = 'root';
   $password = '';
   $connection = mysqli_connect($host, $user, $password, $dbName);
   $sql_review_counter = "SELECT COUNT(reviewerID) FROM sitereviews WHERE rating = 'Zeer slecht'";
   $result = mysqli_query($connection, $sql_review_counter);

   foreach ($result as $counter) {
     $total = $counter['COUNT(reviewerID)'];
     print($total);
  }
 }
