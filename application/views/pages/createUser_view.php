<?php
echo form_open('UManage_cntrl/insert_user');

    echo form_fieldset('User Role');

        if(!isset($opFaculty))
            $opFaculty = 'empty';

        if(!isset($opDepartment))
            $opDepartment = 'empty';

        echo form_label('Faculty', 'faculty');
        echo form_dropdown('faculty', $opFaculty, 'faculty');
        echo form_error('faculty');

        echo form_label('Department', 'depart');
        echo form_dropdown('depart', $opDepartment, 'depart');
        echo form_error('depart');

        $opRole = array(
            'Admin' => 'Admin',
            'EE' => 'EE',
            'Staff' => 'Staff'
        );
        echo form_label('Role', 'role');
        echo form_dropdown('role', $opRole, 'role');
        echo form_error('role');

    echo form_fieldset_close();
    if($role == 'Admin'){
        echo form_label('Username', 'username');
        echo form_input('username','','id="username"');
        echo form_error('username');

        echo form_label('Password', 'apassword');
        echo form_password('password', '', 'id="apassword"');
        echo form_error('apassword');
    }else{
        echo form_fieldset('Personal Information');

            $options = array(
                'title' => 'Choose one',
                'Mrs' => 'Mrs',
                'Ms' => 'Ms',
                'Madam' => 'Madam',
                'Mr' => 'Mr',
                'Dr' => 'Dr',
                'Sir' => 'Sir'
            );
            echo form_label('Title', 'title');
            echo form_dropdown('Title', $options, 'title');
            echo form_error('title');

            echo form_label('First Name', 'First_Name');
            echo form_input('First_Name',set_value('First_Name'),'id="First_Name"');
            echo form_error('First_Name');

            echo form_label('Last Name', 'Last_Name');
            echo form_input('Last_Name',set_value('Last_Name'),'id="Last_Name"');
            echo form_error('Last_Name');

            echo form_label('Address', 'address');
            echo form_input('Address',set_value('address'),'id="address"');
            echo form_error('address');

            echo form_label('Post-Code', 'postal');
            echo form_input('postal',set_value('postal'),'id="postal"');
            echo form_error('postal');

            echo form_label('Telephone', 'phone');
            echo form_input('phone',set_value('phone'),'id="phone"');
            echo form_error('phone');

            echo form_label('HEI', 'hei');
            echo form_input('hei',set_value('hei'),'id="hei"');
            echo form_error('hei');

            echo form_fieldset_close();

            echo form_fieldset('Login Details');

            echo form_label('Email', 'email');
            echo form_input('email',set_value('email'),'id="email"');
            echo form_error('email');

            $newPass = random_string('alnum', 8);
            echo form_label('Password', 'password');
            echo form_password('password',set_value($newPass),'id="password"');
            echo form_error('password');
        echo form_fieldset_close();
    }


echo form_close();