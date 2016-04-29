<h2>Responses I Have Made</h2>
<table border="1" style="width:50%">
        <thead>
        <tr>
            <th><h3>UserName</h3></th>
            <th><h3>Date Made</h3></th>
            <th><h3>See Report</h3></th>
        </tr>
        <tr>
            <th colspan="3">My Response</th>
        </tr>
        </thead>
        <tbody>

        <?php if (isset($reports)) :
    foreach ($reports as $row) : ?>
        </tbody>
        <tr>
        <tr>
            <td><b><?php echo $row->Staff_Username; ?></b></td>
            <td><b><?php echo $row->Comment_Date; ?></b></td>
        <td><b>LINK TO REPORT(FIX)</b></td>
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