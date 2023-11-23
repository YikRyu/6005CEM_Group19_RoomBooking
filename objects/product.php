<?php

class Product {

    // database connection and table name
    private $conn;
    private $table_name = "rooms";
    // object properties
    public $id;
    public $roomnum;
    public $price;
    public $category_id;
    public $category_name;

    // constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // read products
    function read() {

        // select all query
        $query = "SELECT
                c.roomname as category_name, r.id, r.roomnum, r.price, r.category_id
            FROM
                " . $this->table_name . " r
                LEFT JOIN
                    categories c
                        ON r.category_id = c.id
            ORDER BY
                r.roomnum DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // create product
    function create() {

        // query to insert record
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                roomnum=:roomnum, price=:price, category_id=:category_id";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->roomnum = htmlspecialchars(strip_tags($this->roomnum));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));

        // bind values
        $stmt->bindParam(":roomnum", $this->roomnum);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":category_id", $this->category_id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // used when filling up the update product form
    function readOne() {

        // query to read single record
        $query = "SELECT
                c.roomname as category_name, r.id, r.roomnum, r.price, r.category_id
            FROM
                " . $this->table_name . " r
                LEFT JOIN
                    categories c
                        ON r.category_id = c.id
            WHERE
                r.id = ?
            LIMIT
                0,1";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->roomnum = $row['roomnum'];
        $this->price = $row['price'];
        $this->category_id = $row['category_id'];
        $this->category_name = $row['category_name'];
    }

    // update the product
    function update() {

        // update query
        $query = "UPDATE
                " . $this->table_name . "
            SET
                roomnum = :roomnum,
                price = :price,
                category_id = :category_id
            WHERE
                id = :id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->roomnum = htmlspecialchars(strip_tags($this->roomnum));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind new values
        $stmt->bindParam(':roomnum', $this->roomnum);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':id', $this->id);

        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // delete the product
    function delete() {

        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // search products
    function search($keywords) {

        // select all query
        $query = "SELECT
                c.roomname as category_name, r.id, r.roomnum, r.price, r.category_id
            FROM
                " . $this->table_name . " r
                LEFT JOIN
                    categories c
                        ON r.category_id = c.id
            WHERE
                r.roomnum LIKE ? OR c.roomname LIKE ?
            ORDER BY
                r.roomnum DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $keywords = htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";

        // bind
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // read products with pagination
    public function readPaging($from_record_num, $records_per_page) {

        // select query
        $query = "SELECT
                c.roomname as category_name, r.id, r.roomnum, r.price, r.category_id
            FROM
                " . $this->table_name . " r
                LEFT JOIN
                    categories c
                        ON r.category_id = c.id
            ORDER BY r.roomnum DESC
            LIMIT ?, ?";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        // execute query
        $stmt->execute();

        // return values from database
        return $stmt;
    }

    // used for paging products
    public function count() {
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total_rows'];
    }

}

?>