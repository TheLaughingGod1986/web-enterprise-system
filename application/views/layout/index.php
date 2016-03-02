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
<div class="container-fluid">
    <div class="row-fluid">


            <?php if ($header) echo $header; ?>


        <div class="col-sm-2 push-margin-top">
            <?php if ($left) echo $left; ?>
        </div>

        <div class="col-sm-10">
            <?php if ($middle) echo $middle; ?>
        </div>

        <?php if ($footer) echo $footer; ?>

    </div>
</div>
</body>
</html>