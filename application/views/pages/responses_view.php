<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 29/04/2016
 * Time: 00:33
 */
?>
<table border="1" style="width:50%">
        <thead>
        <tr>
            <th><h3>UserName</h3></th>
            <th><h3>Date Made</h3></th>
        </tr>
        </thead>
        <tbody>

        <?php if (isset($reports)) :
    foreach ($reports as $row) : ?>
        </tbody>
        <tr>
        <tr>
            <td><b>
                    <?php
                    echo $row->Username;
                    echo $row->Staff_Username;
                    ?>
                </b></td>
            <td><b><?php echo $row->Comment_Date; ?></b></td>
        </tr>
        <tr>
            <td colspan="2"><p><?php echo $row->Comments; ?></p></td>
        </tr>

    <?php endforeach; ?>
    </table>

<?php else : ?>
    <p>No Comments</p>
<?php endif; ?>

<p><?= anchor('main', 'Back home'); ?></p>