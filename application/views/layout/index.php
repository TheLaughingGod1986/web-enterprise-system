<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>PHP i love you</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/build/style.min.css" type="text/css" media="screen"
          charset="uft-8">
</head>

<body>
<div class="container-fluid">
    <div class="row-fluid">
        <?php if ($header) echo $header; ?>

        <div class="span2">
            <?php if ($left) echo $left; ?>
        </div>

        <div class="span10">
            <?php if ($middle) echo $middle; ?>
        </div>

        <?php if ($footer) echo $footer; ?>
    </div>
</div>
</body>
</html>