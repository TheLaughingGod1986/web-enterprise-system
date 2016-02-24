<div>
    <h1>Manage Users</h1><hr/>

    <div id="userslist">

        <ol>
            <?php
            if(isset($all_users)){
                foreach ($all_users as $users): ?>
                    <li>
                        <?php echo $users->Email; ?>
                        <a href="<?php echo base_url() . 'index.php/UManage_cntrl/index/' . $users->StaffID; ?>">Edit</a>
                    </li>
                <?php endforeach; }
            else{
                echo 'No Records';
            }
            ?>
        </ol>
    </div>

    <div id="delete">
        <?php
        if(isset($single_user)){
            foreach ($single_user as $user): ?>
                <h3>Sure you want to delete this user?</h3>
                <?php echo $user->Email; ?>
                <a href="<?php echo base_url() . 'index.php/UManage_cntrl/delete_user/' . $user->StaffID; ?>">
                    <button>Delete</button>
                </a>
            <?php endforeach; }
        else{
            echo 'No Records';
        }
        ?>
    </div>

    <div id="update">
        <?php
        if(isset($single_user)){
            foreach ($single_user as $item):
                echo form_open('UManage_cntrl/update_user'); ?>

                <?php echo form_label('Examiner ID:'); ?><?php echo form_error('StaffID'); ?><br/>
                <?php echo form_input(array('id' => 'StaffID', 'name' => 'StaffID', 'value' => $item->StaffID)); ?>
                <br/>

                <?php echo form_label('Title:'); ?><?php echo form_error('Title'); ?><br/>
                <?php echo form_input(array('id' => 'Title', 'name' => 'Title', 'value' => $item->Title)); ?>
                <br/>

                <?php echo form_label('First Name:'); ?><?php echo form_error('First_Name'); ?><br/>
                <?php echo form_input(array('id' => 'First_Name', 'name' => 'First_Name', 'value' => $item->First_Name)); ?>
                <br/>

                <?php echo form_label('Last Name:'); ?><?php echo form_error('Last_Name'); ?><br/>
                <?php echo form_input(array('id' => 'Last_Name', 'name' => 'Last_Name', 'value' => $item->Last_Name)); ?>
                <br/>

                <?php echo form_label('Email :'); ?><?php echo form_error('Email'); ?><br/>
                <?php echo form_input(array('id' => 'Email', 'name' => 'Email', 'value' => $item->Email)); ?>
                <br/>

                <?php echo form_label('Password :'); ?><?php echo form_error('Password'); ?><br/>
                <?php echo form_input(array('id' => 'Password', 'name' => 'Password', 'value' => $item->Password)); ?>
                <br/>

                <?php echo form_label('Address :'); ?><?php echo form_error('Address'); ?><br/>
                <?php echo form_input(array('id' => 'Address', 'name' => 'Address', 'value' => $item->Address)); ?>
                <br/>

                <?php echo form_label('Post code :'); ?><?php echo form_error('Post_Code'); ?><br/>
                <?php echo form_input(array('id' => 'Post_Code', 'name' => 'Post_Code', 'value' => $item->Post_Code)); ?>
                <br/>

                <?php echo form_label('Phone :'); ?><?php echo form_error('Telephone'); ?><br/>
                <?php echo form_input(array('id' => 'Telephone', 'name' => 'Telephone', 'value' => $item->Telephone)); ?>

                <?php echo form_submit(array('id' => 'submit', 'value' => 'Update')); ?>
                <?php echo form_close();
            endforeach; }
        else{
            echo 'No Records';
        }
        ?>
    </div>

    <div id="insert">
        <?php echo form_open('UManage_cntrl/insert_user'); ?>
        <h3>Create new user</h3><hr/>
        <?php if (isset($message)) { ?>

            <h3>Data inserted successfully</h3>
            <br/>

            <?php
        }

        echo form_label('Title:'); ?><?php echo form_error('Title'); ?><br/>
        <?php echo form_input(array('id' => 'Title', 'name' => 'Title', 'placeholder' => 'Mr./Ms.')); ?>
        <br/>

        <?php echo form_label('First Name:'); ?><?php echo form_error('First_Name'); ?><br/>
        <?php echo form_input(array('id' => 'First_Name', 'name' => 'First_Name', 'placeholder' => 'Name')); ?>
        <br/>

        <?php echo form_label('Last Name:'); ?><?php echo form_error('Last_Name'); ?><br/>
        <?php echo form_input(array('id' => 'Last_Name', 'name' => 'Last_Name', 'placeholder' => 'Surname')); ?>
        <br/>

        <?php echo form_label('Email :'); ?><?php echo form_error('Email'); ?><br/>
        <?php echo form_input(array('id' => 'Email', 'name' => 'Email', 'placeholder' => 'example@mail.com')); ?>
        <br/>

        <?php echo form_label('Password :'); ?><?php echo form_error('Password'); ?><br/>
        <?php echo form_input(array('id' => 'Password', 'name' => 'Password', 'placeholder' => 'p@s$word')); ?>
        <br/>

        <?php echo form_label('Address :'); ?><?php echo form_error('Address'); ?><br/>
        <?php echo form_input(array('id' => 'Address', 'name' => 'Address', 'placeholder' => 'Sesame Street')); ?>
        <br/>

        <?php echo form_label('Post code :'); ?><?php echo form_error('Post_Code'); ?><br/>
        <?php echo form_input(array('id' => 'Post_Code', 'name' => 'Post_Code', 'placeholder' => 'NW8 6IX')); ?>
        <br/>

        <?php echo form_label('Phone :'); ?><?php echo form_error('Telephone'); ?><br/>
        <?php echo form_input(array('id' => 'Telephone', 'name' => 'Telephone', 'placeholder' => '070XXXXXXX')); ?>

        <br />

        <?php
        echo form_submit(array('id' => 'submit', 'value' => 'Create'));
        echo form_close();
        ?>
    </div>
</div>