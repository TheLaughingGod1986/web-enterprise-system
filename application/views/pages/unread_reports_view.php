<h2>New Reports</h2>
<p>These are reports ive not yet read</p>
<table border="1" style="width:50%">
    <thead>
    <tr>
        <th><h3>Report Title</h3></th>
        <th><h3>Report Date</h3></th>
        <th><h3>See Full Report</h3></th>
        <!--        <th><h3>Read Report</h3></th>-->
    </tr>
    </thead>
    <tbody>

    <?php if (isset($reports)) :
    foreach ($reports as $row) : ?>
    </tbody>

    <tr>
        <td><b><?php echo $row->Report_Name; ?></b></td>
        <td><b><?php echo $row->ReportDate; ?></b></td>
        <td><button type="button" class="btn btn-success"><?= anchor('main/comments/' . $row->ReportID, 'Read Full Report'); ?></button></td>
        <!--        <td><button type="button" class="btn btn-danger">--><?//= anchor('main/comments/' . $row->ReportID, 'Read Full Report'); ?><!--</button></td>-->
    </tr>

    <?php endforeach; ?>
</table>
<?php else : ?>
    <h2>No Reports</h2>
<?php endif; ?>