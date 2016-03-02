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

        <div class="col-sm-12">
            <?php if ($header) echo $header; ?>
        </div>

        <div class="col-sm-2 push-top">
            <?php if ($left) echo $left; ?>
            </div>

        <div class="col-sm-10 push-top">
            <?php if ($middle) echo $middle; ?>
        </div>

        <div class="col-sm-12">
        <?php if ($footer) echo $footer; ?>
            </div>


</body>

</html>