<?php
if ($this->session->logged_in) {

 echo "Hello welcome back " ;
    echo '<strong>'.htmlspecialchars ($this->session->name). ',</strong> You Are Logged in as a <strong>Admin</strong>.';
    echo " chose a option from the menu to get started.";
}

else {
    echo "<h2>Choose a login</h2>
<hr>";

    echo "<h3>Admin Login</h3>";
    echo "user: admin";
    echo "pass: password";

    echo form_open('Login_cntrl/login_admin');

    echo form_label('E-mail:');
    echo form_error('email');
    echo form_input(array('id' => 'email', 'name' => 'email', 'placeholder' => 'example@gre.ac.uk'));

    echo form_label('Password:');
    echo form_error('password');
    echo form_input(array('id' => 'password', 'name' => 'password', 'placeholder' => 'password'));

    echo form_submit(array('id' => 'submit', 'value' => 'Login'));
    echo form_close();

    echo "<h3>Staff Login</h3>";
    echo "email: mail@mail.com";
    echo "pass: aaa";

    echo form_open('Login_cntrl/login_staff');

    echo form_label('E-mail:');
    echo form_error('email');
    echo form_input(array('id' => 'email', 'name' => 'email', 'placeholder' => 'example@gre.ac.uk'));

    echo form_label('Password:');
    echo form_error('password');
    echo form_input(array('id' => 'password', 'name' => 'password', 'placeholder' => 'password'));

    echo form_submit(array('id' => 'submit', 'value' => 'Login'));
    echo form_close();

    echo "<h3>External Examiner Login</h3>";
    echo "email: mango@hotmail";
    echo "pass: pokemon";

    echo form_open('Login_cntrl/login_external');

    echo form_label('E-mail:');
    echo form_error('email');
    echo form_input(array('id' => 'email', 'name' => 'email', 'placeholder' => 'example@gre.ac.uk'));

    echo form_label('Password:');
    echo form_error('password');
    echo form_input(array('id' => 'password', 'name' => 'password', 'placeholder' => 'password'));

    echo form_submit(array('id' => 'submit', 'value' => 'Login'));
    echo form_close();
}



