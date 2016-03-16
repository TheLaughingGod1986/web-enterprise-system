<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>temping</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/build/style.min.css" type="text/css" media="screen"
          charset="uft-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/build/bootstrap.min.css" type="text/css" media="screen"
          charset="uft-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/build/font-awesome.min.css" type="text/css" media="screen"
          charset="uft-8">
</head>

<body>


<?php if ($header) echo $header; ?>

<?php
if ($this->session->userdata('id')) {
    echo '<div class="col-sm-3 col-md-2 sidebar">';
    if ($left) echo $left;
    echo '</div>';
}
?>

<div class="col-sm-9 push-top push-left">
    <?php if ($middle) echo $middle; ?>
</div>

<!--<div class="col-sm-12">-->
<!--    --><?php //if ($footer) echo $footer; ?>
<!--</div>-->

</body>

</html>