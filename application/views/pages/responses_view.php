<h2>Responses I Have Made</h2>
<table class="table table-hover">
        <thead>
        <tr style="background: #F7F2D9; text-align: center;">
            <th><h3>UserName</h3></th>
            <th><h3>Date Made</h3></th>
            <th><h3>See Report</h3></th>
        </tr>
        </thead>
        <tbody>

        <?php if (isset($reports)) :
    foreach ($reports as $row) : ?>

        </tbody>
    <tr style="background-color: rgba(152, 18, 18, 0.39); text-align: center;">
            <td><b><?php echo $row->Staff_Username; ?></b></td>
            <td><b><?php echo $row->Comment_Date; ?></b></td>
        <td><button type="button" class="btn btn-success"><?= anchor('main/comments/' . $row->ReportID, 'Read Full Report'); ?></button></td>
        </tr>
    <tr>
        <th colspan="3">My Response</th>
    </tr>
        <tr>
            <td colspan="3"><p><?php echo $row->Comments; ?></p></td>
        </tr>

    <?php endforeach; ?>
    </table>

<?php else : ?>
    <p>No Comments</p>
<?php endif; ?>

<p><?= anchor('main', 'Back home'); ?></p>