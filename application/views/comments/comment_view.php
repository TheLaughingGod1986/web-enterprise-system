<div class="col-sm-4">
    <h1>comments</h1>
    <?php
    echo $this->session->Username;
    echo $this->session->UerID;
    ?>

    <?php if (isset($reports)) : foreach ($reports as $row) : ?>
        <h2><?php echo $row->Comments; ?></h2>

        <hr>
    <?php endforeach; ?>

    <?php else : ?>
        <h2>No Reports</h2>
    <?php endif; ?>

    <p><?= anchor('main', 'Back home'); ?></p>

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
</div>

