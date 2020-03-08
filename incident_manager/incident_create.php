<?php include '../view/header.php'; 
?>
<main>

<h1>Assign a Technician</h1>
<p>Customer: <?php echo $email; ?></p>
<p>Product: <?php echo $customer; ?></p>
<p>Technician: <?php echo $products; ?></p>
<form action="." method="post">
<input type="submit" value="Select"> 
</form>
<p><a href="#">Select Another Incident</a></p>
</main>
<?php include '../view/footer.php'; ?>