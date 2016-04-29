<h2>Reports Related To Me</h2>
<table border="1" style="width:50%">
    <thead>
    <tr>
        <th><h3>Report Title</h3></th>
        <th><h3>Report Date</h3></th>
        <th><h3>See Full Report</h3></th>
        <th><h3>Read Report</h3></th>
    </tr>
    </thead>
    <tbody>

    <?php if (isset($reports)) :
    foreach ($reports as $row) : ?>
    </tbody>

    <tr>
        <td><b><?php echo $row->Report_Name; ?></b></td>
        <td><b><?php echo $row->ReportDate; ?></b></td>
        <td><b><?= anchor('main/comments/' . $row->ReportID, 'Full Report'); ?></b></td>
        <td><input type="checkbox"name="businessType1" value="1"></td>
    </tr>

    <?php endforeach; ?>
</table>
<?php else : ?>
    <h2>No Reports</h2>
<?php endif; ?>