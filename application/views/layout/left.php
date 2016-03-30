<ul class="nav navbar-inverse-light side-bar li-change">
    <li class="blue">
        <?php
        $this->load->helper('html'); // Load HTML Helper for img()
        $img = base_url('img/Black&WhiteGreenwich.svg'); // generates text: siteroot/img/servare.png
        $path = 'main'; // link to home controller index
        ?>
        <div class="logo-img">
            <?php
            echo anchor($path, img($img));
            ?>
        </div>
    </li>

    <li class="grey"></li>
    <?php if ($this->session->is_logged_admin) { ?>
        <li role="presentation" class="active"><?php echo anchor('main/index', 'Home'); ?></li>
        <li role="presentation"><?php echo anchor('main/externals', 'Externals'); ?></li>
        <li role="presentation"><?php echo anchor('main/reports', 'Reports'); ?></li>
        <li role="presentation"><a href="#">Responses</a></li>
        <li role="presentation"><a href="#">Recommendations</a></li>
        <li role="presentation"><a href="#">PSRB</a></li>
        <li role="presentation"><a href="#">Analise Of Data</a></li>
        <li role="presentation"><a href="#">Missing Reports</a></li>
        <li class="grey"></li>
        <li role="presentation"><?php echo anchor('main/update', 'Update Personal Details'); ?></li>
        <li role="presentation"><a href="#">Change Login Details</a></li>
        <li class="grey"></li>
        <li role="presentation"><?php echo anchor('login_cntrl/logout', 'Log out'); ?></li>
    <?php } ?>

    <?php if ($this->session->is_logged_external) { ?>
        <li role="presentation" class="active"><?php echo anchor('main/index', 'Home'); ?></li>
        <!--        <li role="presentation"><a href="#">Externals</a></li>-->
        <li role="presentation"><a href="#">Reports</a></li>
        <li role="presentation"><a href="#">Write/ View Responses</a></li>
        <li class="grey"></li>
        <li role="presentation"><a href="#">Your Resposes</a></li>
        <!--        <li role="presentation"><a href="#">PSRB</a></li>-->
        <!--        <li role="presentation"><a href="#">Analise Of Data</a></li>-->
        <!--        <li role="presentation"><a href="#">Missing Reports</a></li>-->
        <!--        <li class="grey"></li>-->
        <li role="presentation"><?php echo anchor('main/update', 'Update Personal Details'); ?></li>
        <li role="presentation"><a href="#">Change Login Details</a></li>
        <li class="grey"></li>
        <li role="presentation"><?php echo anchor('login_cntrl/logout', 'Log out'); ?></li>
    <?php } ?>

    <?php if ($this->session->is_logged_staff) { ?>
        <li role="presentation" class="active"><?php echo anchor('main/index', 'Home'); ?></li>
        <!--        <li role="presentation"><a href="#">Externals</a></li>-->
        <!--                <li role="presentation"><a href="#">Reports</a></li>-->
        <!--                <li role="presentation"><a href="#">Write/ View Responses</a></li>-->
        <!--                <li class="grey"></li>-->
        <!--                <li role="presentation"><a href="#">Your Resposes</a></li>-->
        <!--        <li role="presentation"><a href="#">PSRB</a></li>-->
        <!--        <li role="presentation"><a href="#">Analise Of Data</a></li>-->
        <!--        <li role="presentation"><a href="#">Missing Reports</a></li>-->
        <!--        <li class="grey"></li>-->
        <li role="presentation"><?php echo anchor('main/update', 'Update Personal Details'); ?></li>
        <li role="presentation"><a href="#">Change Login Details</a></li>
        <li class="grey"></li>
        <li role="presentation"><?php echo anchor('login_cntrl/logout', 'Log out'); ?></li>
    <?php } ?>
</ul>