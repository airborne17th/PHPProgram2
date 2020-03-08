<?php
class IncidentDB {

    public static function getIncidents() {
        $db = Database::getDB();

        $query = 'SELECT * FROM incidents JOIN customers ON incidents.customerID=customers.customerID and incidents.techID is NULL';
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
        
        $incidents = array();
        foreach($rows as $row) {
            $i = new Incident(
                    $row['customerID'], $row['productCode'],
                    $row['dateOpened'], $row['title'], $row['description']);
            $i->setIncidentID($row['incidentID']);
            $incidents[] = $i;
        }
        return $incidents;
    }

    public static function add_incident($i) {
        $db = Database::getDB();
        $date_opened = date('Y-m-d');  // get current date in yyyy-mm-dd format
        $query = 'INSERT INTO incidents
            (customerID, productCode, dateOpened, title, description)
        VALUES (
               :customer_id, :product_code, :date_opened,
               :title, :description)';
        $statement = $db->prepare($query);
        $statement->bindValue(':customer_id', $i->$customer_id);
        $statement->bindValue(':product_code', $i->$product_code);
        $statement->bindValue(':date_opened', $i->$date_opened);
        $statement->bindValue(':title', $i->$title);
        $statement->bindValue(':description', $i->$description);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function assignTechnican($tech, $incident) {
        $db = Database::getDB();
        $query = 'UPDATE incidents SET techID = :technician_id
                 WHERE incidentID = :incident_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':technician_id', $tech);
        $statement->bindValue(':incident_id', $incident);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function getCustomerName($incident) {
        $db = Database::getDB();

        $query = 'SELECT firstName, lastName FROM incidents JOIN customers
                  WHERE incidentID = :incident_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':incident_id', $incident);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function getProductCode($incident) {
        $db = Database::getDB();

        $query = 'SELECT productCode FROM incidents
                  WHERE incidentID = :incident_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':incident_id', $incident);
        $statement->execute();
        $product_name = $statement->fetchAll();
        $statement->closeCursor();

        return $product_name;
    }
}

?>