<?php

    echo form_open('Login_cntrl');

    echo form_label('E-mail:'); echo form_error('email');
    echo form_input(array('id' => 'email', 'name' => 'email', 'placeholder' => 'example@gre.ac.uk'));

    echo form_label('Password:'); echo form_error('password');
    echo form_input(array('id' => 'password', 'name' => 'password', 'placeholder' => 'password'));

    echo form_submit(array('id' => 'submit', 'value' => 'Login'));
    echo form_close();

?>

<form class="form-signin">
<h2 class="form-signin-heading">Please sign in</h2>
<label for="inputEmail" class="sr-only">Email address</label>
<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
<label for="inputPassword" class="sr-only">Password</label>
<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
<div class="checkbox">
    <label>
        <input type="checkbox" value="remember-me"> Remember me
    </label>
</div>
<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>
