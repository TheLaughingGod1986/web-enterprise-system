<?php
if ($this->session->logged_in) {

 echo "Hello welcome back " ;
    echo $this->session->name;
    echo " chose a option from the menu to get started.";
}

else {
    echo "<h2>Choose a login</h2>
<hr>";

    echo "<h3>Admin Login</h3>";
    echo form_open('Login_cntrl/login');

    echo form_label('E-mail:');
    echo form_error('email');
    echo form_input(array('id' => 'email', 'name' => 'email', 'placeholder' => 'example@gre.ac.uk'));

    echo form_label('Password:');
    echo form_error('password');
    echo form_input(array('id' => 'password', 'name' => 'password', 'placeholder' => 'password'));

    echo form_submit(array('id' => 'submit', 'value' => 'Login'));
    echo form_close();

    echo "<h3>Staff Login</h3>";
    echo form_open('Login_cntrl/login');

    echo form_label('E-mail:');
    echo form_error('email');
    echo form_input(array('id' => 'email', 'name' => 'email', 'placeholder' => 'example@gre.ac.uk'));

    echo form_label('Password:');
    echo form_error('password');
    echo form_input(array('id' => 'password', 'name' => 'password', 'placeholder' => 'password'));

    echo form_submit(array('id' => 'submit', 'value' => 'Login'));
    echo form_close();

    echo "<h3>External Examiner Login</h3>";
    echo form_open('Login_cntrl/login');

    echo form_label('E-mail:');
    echo form_error('email');
    echo form_input(array('id' => 'email', 'name' => 'email', 'placeholder' => 'example@gre.ac.uk'));

    echo form_label('Password:');
    echo form_error('password');
    echo form_input(array('id' => 'password', 'name' => 'password', 'placeholder' => 'password'));

    echo form_submit(array('id' => 'submit', 'value' => 'Login'));
    echo form_close();
}



