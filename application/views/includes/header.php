<!DOCTYPE html>

    <html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>no name</title>
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen" charset="uft-8">
</head>

<body>
Header here
<h2>Logged In As, <?php echo $this->session->userdata('username'); ?>!</h2> </br>
<h4><?php echo anchor('login/index', 'Login Here'); ?></h4>
FIX SO IF NOT LOGGED IN DO NOT SHOW