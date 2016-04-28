<div class="col-sm-4">
    <!--    /////////////////////START SHOW COMMENTS//////////////////-->
    <h1>comments</h1>
    <table style="width:100%">
        <tr>
            <th><h3>Comment</h3></th>
            <th><h3>Date</h3></th>
            <th><h3>User Name</h3></th>
        </tr>
        <?php if (isset($reports)) :
        foreach ($reports as $row) : ?>
        <tr>
            <td><?php echo $row->Comments; ?></td>
        </tr>
        <tr>
            <td><?php echo $row->Comment_Date; ?></td>
        </tr>
        <tr>
            <td><?php echo $row->Username; ?></td>
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

