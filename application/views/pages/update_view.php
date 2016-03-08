<div>
    <h1>Manage Users</h1><hr/>

    <div id="userslist" class="col-sm-5">

        <ol>
            <?php
            if(isset($all_users)){
                foreach ($all_users as $users): ?>
                    <li>
                        <?php echo $users->Last_Name.", ".$users->First_Name; ?>
                        <a href="<?php echo base_url() . 'index.php/UManage_cntrl/index/' . $users->StaffID; ?>">Edit</a>
                    </li>
                <?php endforeach; }
            else{
                echo 'No Records';
            }
            ?>
        </ol>
    </div>



    <div id="update">
        <?php
        if(isset($single_user)){
            foreach ($single_user as $item):
                echo form_open('UManage_cntrl/update_user'); ?>

                <?php echo form_label('Examiner ID:'); echo form_error('StaffID'); ?><br/>
                <?php echo form_input(array('id' => 'StaffID', 'name' => 'StaffID', 'value' => $item->StaffID)); ?>
                <br/>

                <?php echo form_label('Title:'); echo form_error('Title'); ?><br/>
                <?php echo form_input(array('id' => 'Title', 'name' => 'Title', 'value' => $item->Title)); ?>
                <br/>

                <?php echo form_label('First Name:'); echo form_error('First_Name'); ?><br/>
                <?php echo form_input(array('id' => 'First_Name', 'name' => 'First_Name', 'value' => $item->First_Name)); ?>
                <br/>

                <?php echo form_label('Last Name:'); echo form_error('Last_Name'); ?><br/>
                <?php echo form_input(array('id' => 'Last_Name', 'name' => 'Last_Name', 'value' => $item->Last_Name)); ?>
                <br/>

                <?php echo form_label('Email :'); echo form_error('Email'); ?><br/>
                <?php echo form_input(array('id' => 'Email', 'name' => 'Email', 'value' => $item->Email)); ?>
                <br/>

                <?php echo form_label('Password :'); ?><?php echo form_error('Password'); ?><br/>
                <?php echo form_input(array('id' => 'Password', 'name' => 'Password', 'value' => $item->Password)); ?>
                <br/>

                <?php echo form_label('Address :'); echo form_error('Address'); ?><br/>
                <?php echo form_input(array('id' => 'Address', 'name' => 'Address', 'value' => $item->Address)); ?>
                <br/>

                <?php echo form_label('Post code :'); echo form_error('Postcode'); ?><br/>
                <?php echo form_input(array('id' => 'Postcode', 'name' => 'Postcode', 'value' => $item->Postcode)); ?>
                <br/>

                <?php echo form_label('Phone :'); echo form_error('Telephone'); ?><br/>
                <?php echo form_input(array('id' => 'Telephone', 'name' => 'Telephone', 'value' => $item->Telephone)); ?>

                <?php echo form_submit(array('id' => 'submit', 'value' => 'Update')); ?>
                <?php echo form_close();
            endforeach; }
        else{
            echo 'No data found';
        }
        ?>
    </div>

</div>