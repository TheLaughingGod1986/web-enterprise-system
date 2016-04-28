    <!--    /////////////////////START SHOW COMMENTS//////////////////-->
    <h1>comments</h1>
    <table border="1" style="width:50%">
        <thead>
        <tr>
            <th>nme</th>
            <th>date</th>
        </tr>
        </thead>
        <tbody>

        <?php if (isset($reports)) :
        foreach ($reports as $row) : ?>
        </tbody>
        <tr>
        <tr>
            <td><?php echo $row->Username; ?></td>
            <td><?php echo $row->Comment_Date; ?></td>
            </tr>
        <tr>
            <td colspan="2"><?php echo $row->Comments; ?></td>
        </tr>


    <?php endforeach; ?>
    </table>

    <?php else : ?>
        <p>No Comments</p>
    <?php endif; ?>

    <p><?= anchor('main', 'Back home'); ?></p>
    <!--    /////////////////////END SHOW COMMENTS//////////////////-->

    <!--    /////////////////////START ADD COMMENT FORM//////////////////-->
    <div class="col-sm-4">
    <?= form_open('main/comment_add'); ?>

    <?= form_hidden('ReportID', $this->uri->segment(3)); ?>

    <p><textarea name="Comments" rows="10"></textarea></p>
    <p><input type="submit" value="add comment"/></p>

    <?php
    if ($this->session->flashdata('messagetwo')) {
        ?>
        <div class="message flash">
            <?php echo $this->session->flashdata('messagetwo'); ?>
        </div>
        <?php
    }
    ?>
    </form>
    <!--    /////////////////////END ADD COMMENT FORM//////////////////-->
</div>

