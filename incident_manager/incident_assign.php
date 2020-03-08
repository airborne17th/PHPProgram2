<?php include '../view/header.php'; 
?>
<main>

<h1>Assign a Technician</h1>
<p>Customer: <?php echo $cust_name; ?></p>
<p>Product: <?php echo $product_name; ?></p>
<p>Technician: <?php echo $tech_name; ?></p>
<form action="?action=assignTechnican" method="post">
<input type="hidden" name="action"
                       value="final_incident">
<input type="submit" value="Assign!"> 
</form>
<p><a href="#">Select Another Incident</a></p>
</main>
<?php include '../view/footer.php'; ?>