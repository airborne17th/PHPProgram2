<?php
require('../model/database_oo.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/incident_db.php');
require('../model/incident.php');
require('../model/technician.php');
require('../model/technician_db.php');
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'select_incident';
    }
}


switch ($action) {
    case 'display_customer_get':
        include('customer_get.php');
        break;
    case 'get_customer':
        $email = filter_input(INPUT_POST, 'email');
        $customer = get_customer_by_email($email);
        $products = get_products_by_customer($email);
        include('incident_create.php');
        break;
    case 'select_incident':
        // Get incident data
        $incidents = IncidentDB::getIncidents();
        // Display the incident list
        include('incident_select.php');
        break;
    case 'select_tech_for_incident':
        // Store incident ID for later
        $_SESSION["incident"] = filter_input(INPUT_POST, 'incident_id', FILTER_VALIDATE_INT);
        // Get tech data
        $technicians = TechnicianDB::getTechnicians();
        // Display the list of techs
        include('select_tech_for_incident.php');
        break;
    case 'incident_assign':
        // Store tech ID for later
        $_SESSION["tech"] = filter_input(INPUT_POST, 'technician_id', FILTER_VALIDATE_INT);
        
        $tech = $_SESSION["tech"];
        $incident = $_SESSION["incident"];

        // Get the data to display on the assign page.
        $techfirst_name = TechnicianDB::getTechniciansFirstName($tech);
        $techlast_name = TechnicianDB::getTechniciansLastName($tech);
        $custfirst_name = IncidentDB::getCustomerFirstName($incident);
        $custlast_name = IncidentDB::getCustomerLastName($incident);
        $product_name = IncidentDB::getProductCode($incident);

        include('incident_assign.php');
        break;
    case 'final_incident':
        $isValid = true;
        $tech = $_SESSION["tech"];
        $incident = $_SESSION["incident"];
        function checkTech($tech) {
            if($tech === NULL) {
              throw new Exception("Technician value must be a number");
              return false;
            }
          }
        
        try {
            checkTech($tech);
          }

        //catch exception
        catch(Exception $error) {
          }
        
          function checkIncident($incident) {
            if($incident === NULL) {
              throw new Exception("Incident must be a number");
              return false;
            }
          }

          try {
            checkTech($tech);
          }

        //catch exception
        catch(Exception $error) {
          }

        if($isValid == true) {
            IncidentDB::assignTechnican($tech, $incident);
            include('incident_success.php');
        } else {
            include('error.php');        
        }
    break;
}
?>

checkIncident($incident);