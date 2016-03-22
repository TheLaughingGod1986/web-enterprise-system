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

<?php
if ($this->session->logged_in) {
    echo '<div class="col-sm-2 no-padding-right hide-mobile">';
    if ($left) echo $left;
    echo '</div>';
}
?>

<?php
if ($this->session->logged_in) {
    echo '<div class="col-sm-10 no-padding-right hide-mobile">';
    if ($header) echo $header;
    echo '</div>';
} else {
    echo '<div class="col-sm-12 no-padding-right hide-mobile">';
    if ($header) echo $header;
    echo '</div>';
}
?>

<?php
if ($this->session->logged_in) {
    echo '<div class="col-sm-10 no-padding-right hide-mobile">';
    if ($top_bar) echo $top_bar;
    echo '</div>';
} else {
    echo '<div class="col-sm-12 no-padding-right hide-mobile">';
    if ($top_bar) echo $top_bar;
    echo '</div>';
}
?>

<?php
if ($this->session->logged_in) {
    echo '<div class="col-sm-10 no-padding-right hide-mobile">';
    if ($middle) echo $middle;
    echo '</div>';
} else {
    echo '<div class="col-sm-12 no-padding-right hide-mobile">';
    if ($middle) echo $middle;
    echo '</div>';
}
?>

</body>
</html>