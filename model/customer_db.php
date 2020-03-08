<?php
class CustomerDB {
public static function get_customers() {
    $db = Database::getDB();
    $query = 'SELECT * FROM customers
              ORDER BY lastName';
    $statement = $db->prepare($query);
    $statement->execute();
    $customers = $statement->fetchAll();
    $statement->closeCursor();
    return $customers;
}

public static function get_customers_by_last_name($last_name) {
    $db = Database::getDB();
    $query = 'SELECT * FROM customers
              WHERE lastName = :last_name
              ORDER BY lastName';
    $statement = $db->prepare($query);
    $statement->bindValue(':last_name', $last_name);
    $statement->execute();
    $customers = $statement->fetchAll();
    $statement->closeCursor();
    return $customers;
}

public static function get_customer($customer_id) {
    $db = Database::getDB();
    $query = 'SELECT * FROM customers
              WHERE customerID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

public static function get_customer_by_email($email) {
    $db = Database::getDB();
    $query = 'SELECT * FROM customers
              WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

public static function delete_customer($customer_id) {
    $db = Database::getDB();
    $query = 'DELETE FROM customers
              WHERE customerID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $statement->closeCursor();
}

public static function add_customer($first_name, $last_name, 
        $address, $city, $state, $postal_code, $country_code,
        $phone, $email, $password) {
    $db = Database::getDB();
    $query = 'INSERT INTO customers
                 (firstName, lastName,
                  address, city, state, postalCode, countryCode,
                  phone, email, password)
              VALUES
                 (:first_name, :last_name,
                  :address, :city, :state, :postal_code, :country_code,
                  :phone, :email, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':postal_code', $postal_code);
    $statement->bindValue(':country_code', $country_code);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}

public static function update_customer($customer_id, $first_name, $last_name,
        $address, $city, $state, $postal_code, $country_code,
        $phone, $email, $password) {
    $db = Database::getDB();
    $query = 'UPDATE customers
              SET firstName = :first_name,
                  lastName = :last_name,
                  address = :address,
                  city = :city,
                  state = :state,
                  postalCode = :postal_code,
                  countryCode = :country_code,
                  phone = :phone,
                  email = :email,
                  password = :password
              WHERE customerID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':postal_code', $postal_code);
    $statement->bindValue(':country_code', $country_code);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $statement->closeCursor();
}
}
?>
