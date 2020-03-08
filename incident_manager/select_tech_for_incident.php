<?php include '../view/header.php'; ?>
<main>

    <h1>Assign a Technician</h1>

    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($technicians as $technician) : ?>
        <tr>
            <td><?php echo htmlspecialchars($technician->getFullName()); ?></td>
            <td><form action="." method="post">
                <input type="hidden" name="action"
                    value="incident_assign">
                <input type="hidden" name="technician_id"
                       value="<?php echo htmlspecialchars($technician->getID()); ?>">
                <input type="submit" value="Select">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="?action=incident_create">Make an Incident</a></p>
</main>
<?php include '../view/footer.php'; ?>