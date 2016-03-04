
<div>
    <h1>Update User data</h1><hr/>

    <div id="menu">

        <ol>
            <?php foreach($all_users as $users): ?>
                <li><a href="<?php echo base_url().'index.php/Update_cntrl/index/'.$users->userID;?>"><?php echo $users->Email; ?></a></li>
            <?php endforeach; ?>
        </ol>
    </div>
    <div id="details">
        <?php foreach ($single_user as $item):

            echo form_open('Update_cnrtl/update_user');?>

            <?php echo form_label('Examiner ID:'); ?> <?php echo form_error('StaffID'); ?><br />
            <?php echo form_input(array('id' => 'StaffID', 'name' => 'StaffID', 'value'=>$item->StaffID)); ?><br />

            <?php echo form_label('Examiner Name :'); ?> <?php echo form_error('Email'); ?><br />
            <?php echo form_input(array('id' => 'Email', 'name' => 'Email', 'value'=>$item->Email)); ?><br />

            <?php echo form_label('Password :'); ?> <?php echo form_error('Password'); ?><br />
            <?php echo form_input(array('id' => 'Password', 'name' => 'Password', 'value'=> $item->Password ));?>

            <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit')); ?>
            <?php echo form_close(); ?>

        <?php endforeach; ?>
    </div>
</div>
