<?php
/**
 *
 * Created by PhpStorm.
 * User: Dylan Doldersum
 * Date: 2019-11-15
 * Time: 17:39
 */


class Search extends Database
{
    public function getResults() {
            $this->connect();
            $sql = "SELECT * FROM stockitems WHERE StockItemName LIKE '%" . $_GET['search'] . "%'";
            $result = mysqli_query($this->connection, $sql);
            $response = [];

            foreach ($result as $item) {
                $response[] = $item;
            }
            return $response;
    }


}