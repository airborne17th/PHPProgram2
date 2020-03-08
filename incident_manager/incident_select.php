<?php include '../view/header.php'; ?>
<main>
    <h1>Incident Select Page</h1>
    <table style="width:100%">
  <tr>
    <th>Customer ID</th>
    <th>Product Code</th>
    <th>Date Opened</th>
    <th>Title</th>
    <th>Description</th>
  </tr>
  <?php foreach ($incidents as $incident) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($incident->getCustID()); ?></td>
                    <td><?php echo htmlspecialchars($incident->getProductCode()); ?></td>
                    <td><?php echo htmlspecialchars($incident->getDateOpened()); ?></td>
                    <td><?php echo htmlspecialchars($incident->getTitle()); ?></td>
                    <td><?php echo htmlspecialchars($incident->getDescription()); ?></td>
                    <td>
                    <form action="." method="post">
                    <input type="hidden" name="action"
                       value="select_tech_for_incident">
                    <input type="hidden" name="incident_id"
                       value="<?php echo htmlspecialchars($incident->getIncidentID()); ?>">
                    <input type="submit" name="submit" value="Select"> 
                    </form>
                    </td>
                </tr>
    <?php endforeach; ?>
  <tr>
</table>
</main>
<?php include '../view/footer.php'; ?>