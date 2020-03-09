<?php include '../view/header.php'; 
?>
<main>

<h1>Assign a Technician</h1>
<p>Customer: <?php foreach($custfirst_name as $cfname) { echo $cfname; break; }?> <?php foreach($custlast_name as $clname) { echo $clname; break; }?></p>
<p>Product: <?php foreach($product_name as $pname) { echo $pname; break; } ?></p>
<p>Technician: <?php foreach($techfirst_name as $tfname) { echo $tfname; break; } ?> <?php foreach($techlast_name as $tlname) { echo $tlname; break; } ?></p>
<form action="?action=assignTechnican" method="post">
<input type="hidden" name="action"
                       value="final_incident">
<input type="submit" value="Assign!"> 
</form>
<p><a href="#">Select Another Incident</a></p>
</main>
<?php include '../view/footer.php'; ?>