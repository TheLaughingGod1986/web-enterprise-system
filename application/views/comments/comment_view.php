    <!--    /////////////////////START SHOW COMMENTS//////////////////-->
    <h1>comments</h1>
    <table border="1" style="width:50%">
        <tr>
            <th><?php echo $row->Username; ?></th>
            <th><?php echo $row->Comment_Date; ?></th>
        </tr>
        <?php if (isset($reports)) :
        foreach ($reports as $row) : ?>

        <tr>
        <tr>
            <td colspan="2"><?php echo $row->Comments; ?></td>
        </tr>
    </table>
    <hr>
    <?php endforeach; ?>

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

