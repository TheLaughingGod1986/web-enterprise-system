<?php

echo form_open('Login_cntrl/login');

    echo form_label('E-mail:', 'email');
    echo form_input('email', set_value('email'), 'id = "email"');
    echo form_error('email');

    echo form_label('Password:', 'password');
    echo form_password('password', '', 'id = "password"');
    echo form_error('password');

    echo form_submit('submit', 'Login');

echo form_close();

echo $this->session->username;

