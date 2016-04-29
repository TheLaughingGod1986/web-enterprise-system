<h2>Reports Related To Me</h2>#
<p>change this query so it only hows reports if the user has matching departments</p>
<h1>THIS IS CURRENTLY NOT WORKIN, NEEDS TO BE FILTERD BUY DEPATMENT USER HAD</h1>
<table class="table table-hover">
    <thead>
    <tr style="background: #F7F2D9; text-align: center;">
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

    <tr style="background-color: rgba(152, 18, 18, 0.39); text-align: center;">
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