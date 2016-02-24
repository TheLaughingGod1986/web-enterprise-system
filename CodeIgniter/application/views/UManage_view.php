<div>
    <h1>Manage Users</h1><hr/>

    <div id="userslist">

        <ol>
            <?php foreach ($all_users as $users): ?>
                <li>
                    <?php echo $users->userName; ?>
                    <a href="<?php echo base_url() . 'index.php/UManage_cntrl/index/' . $users->userID; ?>">Edit</a>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>

    <div id="delete">
        <?php foreach ($single_user as $user): ?>
            <h3>Sure you want to delete this user?</h3>
            <?php echo $user->userName; ?>
            <a href="<?php echo base_url() . 'index.php/UManage_cntrl/delete_user/' . $user->userID; ?>">
                <button>Delete</button>
            </a>
        <?php endforeach; ?>
    </div>

    <div id="update">
        <?php foreach ($single_user as $item):
            echo form_open('UManage_cntrl/update_user'); ?>

            <?php echo form_label('Examiner ID:'); ?><?php echo form_error('userID'); ?><br/>
            <?php echo form_input(array('id' => 'userID', 'name' => 'userID', 'value' => $item->userID)); ?><br/>

            <?php echo form_label('Examiner Name :'); ?><?php echo form_error('userName'); ?><br/>
            <?php echo form_input(array('id' => 'userName', 'name' => 'userName', 'value' => $item->userName)); ?>
            <br/>

            <?php echo form_label('Password :'); ?><?php echo form_error('pass'); ?><br/>
            <?php echo form_input(array('id' => 'pass', 'name' => 'pass', 'value' => $item->pass)); ?>

            <?php echo form_submit(array('id' => 'submit', 'value' => 'Update')); ?>
            <?php echo form_close();
        endforeach; ?>
    </div>

    <div id="insert">
        <?php echo form_open('UManage_cntrl/insert_user'); ?>
        <h3>Create new user</h3><hr/>
        <?php if (isset($message)) { ?>

            <h3>Data inserted successfully</h3>
            <br/>

            <?php
        }
        echo form_label('Examiner Name :');
        echo form_error('userName');
        ?>
        <br />
        <?php echo form_input(array('id' => 'userName', 'name' => 'userName', 'placeholder' => 'Username')); ?>

        <br />

        <?php
        echo form_label('Password :');
        echo form_error('pass');
        ?>
        <br />
        <?php
        echo form_input(array('id' => 'pass', 'name' => 'pass', 'placeholder' => 'Password'));
        ?>

        <br />

        <?php
        echo form_submit(array('id' => 'submit', 'value' => 'Create'));
        echo form_close();
        ?>
    </div>
</div>