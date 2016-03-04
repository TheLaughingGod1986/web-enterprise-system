<div>
    <h1>Update User data</h1><hr/>

    <div id="menu">

        <ol>
            <?php foreach($all_users as $users): ?>
                <li><a href="<?php echo base_url().'index.php/Update_cntrl/index/'.$users->userID;?>"><?php echo $users->userName; ?></a></li>
            <?php endforeach; ?>
        </ol>
    </div>
    <div id="details">
        <?php foreach ($single_user as $item):

            echo form_open('Update_cnrtl/update_user');?>

            <?php echo form_label('Examiner ID:'); ?> <?php echo form_error('userID'); ?><br />
            <?php echo form_input(array('id' => 'userID', 'name' => 'userID', 'value'=>$item->userID)); ?><br />

            <?php echo form_label('Examiner Name :'); ?> <?php echo form_error('userName'); ?><br />
            <?php echo form_input(array('id' => 'userName', 'name' => 'userName', 'value'=>$item->userName)); ?><br />

            <?php echo form_label('Password :'); ?> <?php echo form_error('pass'); ?><br />
            <?php echo form_input(array('id' => 'pass', 'name' => 'pass', 'value'=> $item->pass ));?>

            <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit')); ?>
            <?php echo form_close(); ?>

        <?php endforeach; ?>
    </div>
</div>
