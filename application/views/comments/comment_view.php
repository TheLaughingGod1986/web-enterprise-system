<div class="col-sm-4">
    <!--    /////////////////////START SHOW COMMENTS//////////////////-->
    <h1>comments</h1>
    <?php if (isset($reports)) :
        foreach ($reports as $row) : ?>

            <table>
                <tfoot>
                <tr>
                    <td><h4>Comment</h4></td>
                    <td><h4>Date</h4></td>
                    <td><?php echo $row->Comments; ?></td>
                    <td><?php echo $row->Comment_Date; ?></td>
                </tr>
                </tfoot>
            </table>

            <hr>
        <?php endforeach; ?>

    <?php else : ?>
        <p>No Reports</p>
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

