<!DOCTYPE html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>PHP i love you</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/build/style.min.css" type="text/css" media="screen" charset="uft-8">
</head>
<body>

<div id="wrap">
<?php $this->view('includes/header'); ?>

<?php $this->view('includes/sidebar'); ?>

<?php $this->view($main_content); ?>

<?php $this->view('includes/footer'); ?>

</div>
</body>
</html>
