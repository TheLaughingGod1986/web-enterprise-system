    <!--    /////////////////////START SHOW COMMENTS//////////////////-->
    <h1>Full Report Place Here</h1>
    <h2>comments</h2>
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

