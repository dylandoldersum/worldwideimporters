<?php
/**
 *
 * Created by PhpStorm.
 * User: Dylan Doldersum
 * Date: 2019-11-15
 * Time: 18:07
 */

class Products extends Database
{
    public function getCategoriesForNavigation() {
        $this->connect();
        $sql = "SELECT StockGroupName, StockGroupID FROM stockgroups";
        $result = mysqli_query($this->connection, $sql);
        foreach ($result as $value) {
            $catID = $value['StockGroupID'];
            print("<li><a href='product-list.php?CatID=$catID'> ". $value['StockGroupName'] . "</a></li>");
        }
    }

    public function getFavouriteItems() {
        $this->connect();
        $sql = "SELECT StockItemName, RecommendedRetailPrice
                FROM stockitems
                WHERE StockItemID = 2 OR StockItemID = 23";
        $result = mysqli_query($this->connection, $sql);

        foreach ($result as $value) {
            $itemName = $value['StockItemName'];
            print("<a href=''><div class='favorites'>" . $itemName . "</a></div>");
        }
    }

    public function getProductsFromCategory() {
        $this->connect();
        $sql = "SELECT StockItemName, RecommendedRetailPrice, StockItemID, Photo FROM stockitems WHERE StockItemID IN
                (SELECT StockItemID FROM stockitemstockgroups WHERE StockGroupID = " . $_GET['CatID'] . ")";
        $result = mysqli_query($this->connection, $sql);
        $count = 0;
        foreach ($result as $value) {
            $itemName = $value['StockItemName'];
            $price = $value['RecommendedRetailPrice'];
            $itemID = $value['StockItemID'];
            $photo = $value['Photo'];
            $count++;

            if($photo === "") {
                $source = "assets/images/logo.png";
            } else {
                $source = "data:image/jpeg;base64,".base64_encode($photo);
            }

            print("<a href='product-detail.php?itemID=$itemID'><div class='showProduct'>
                    <h3 class='product_text'>$itemName</h3>
                    <img class='product_photo' src='". $source . "' alt='#' width='80%', height='200px'>
                    <p class='product_text'>PRICE: €$price</p>
                    </div></a>");

            if($count === 25){
                break;
            }
        }
    }

    public function getProductInfo() {
        $this->connect();
        $sql=  "SELECT I.StockItemName, I.RecommendedRetailPrice, I.LeadTimeDays, I.TypicalWeightPerUnit, I.Tags, I.SearchDetails, H.LastStocktakeQuantity
        From stockitems AS I
        JOIN stockitemholdings AS H ON I.StockitemID = H.StockitemID
        WHERE I.StockItemID=". $_GET['itemID'];
        $result = mysqli_query($this->connection, $sql);
        return $result;
    }

}
