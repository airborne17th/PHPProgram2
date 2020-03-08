<?php

class ProductDB {

    public static function get_products() {
        $db = Database::getDB();
        $query = 'SELECT * FROM products
              ORDER BY name';
        $statement = $db->prepare($query);
        $statement->execute();
        $products = $statement->fetchAll();
        $statement->closeCursor();
        return $products;
    }

    public static function get_products_by_customer($email) {
        $db = Database::getDB();
        $query = 'SELECT products.productCode, products.name 
              FROM products
                INNER JOIN registrations ON products.productCode = registrations.productCode
                INNER JOIN customers ON registrations.customerID = customers.customerID
              WHERE customers.email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $products = $statement->fetchAll();
        $statement->closeCursor();
        return $products;
    }

    public static function get_product($product_code) {
        $db = Database::getDB();
        $query = 'SELECT * FROM products
              WHERE productCode = :product_code';
        $statement = $db->prepare($query);
        $statement->bindValue(':product_code', $product_code);
        $statement->execute();
        $product = $statement->fetch();
        $statement->closeCursor();
        return $product;
    }

    public static function delete_product($product_code) {
        $db = Database::getDB();
        $query = 'DELETE FROM products
              WHERE productCode = :product_code';
        $statement = $db->prepare($query);
        $statement->bindValue(':product_code', $product_code);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function add_product($code, $name, $version, $release_date) {
        $db = Database::getDB();
        $query = 'INSERT INTO products
                 (productCode, name, version, releaseDate)
              VALUES
                 (:code, :name, :version, :release_date)';
        $statement = $db->prepare($query);
        $statement->bindValue(':code', $code);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':version', $version);
        $statement->bindValue(':release_date', $release_date);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function update_product($code, $name, $version, $release_date) {
        $db = Database::getDB();
        $query = 'UPDATE products
              SET name = :name,
                  version = :version,
                  releaseDate = :release_date
              WHERE productCode = :product_code';
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':version', $version);
        $statement->bindValue(':release_date', $release_date);
        $statement->bindValue(':product_code', $code);
        $statement->execute();
        $statement->closeCursor();
    }

}

?>