<?php
class Incident {
    private $incident_id, $customer_id, $product_code, $date_opened, $title, $description;

    public function __construct($customer_id, $product_code, $date_opened, $title, $description) {
        $this->customer_id = $customer_id;
        $this->product_code = $product_code;
        $this->date_opened = $date_opened;
        $this->title = $title;
        $this->description = $description;
    }

    public function getIncidentID() {
        return $this->incident_id;
    }
    public function setIncidentID($value) {
        $this->incident_id = $value;
    }
    
    public function getCustID() {
        return $this->customer_id;
    }
    public function setCustID($value) {
        $this->customer_id = $value;
    }

    public function getProductCode() {
        return $this->product_code;
    }
    public function setProductCode($value) {
        $this->product_code = $value;
    }

    public function getDateOpened() {
        return $this->date_opened;
    }
    public function setDateOpened($value) {
        $this->date_opened = $value;
    }

    public function getTitle() {
        return $this->title;
    }
    public function setTitle($value) {
        $this->title = $value;
    }

    public function getDescription() {
        return $this->description;
    }
    public function setDescription($value) {
        $this->description = $value;
    }
}
?>