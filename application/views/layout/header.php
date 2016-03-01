    <nav class="navbar navbar-inverse no-margin-bottom top-menu">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-9" aria-expanded="false"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" <?php echo anchor('main/index', 'Scrumptious Seven'); ?></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
            <ul class="nav navbar-nav">
                <li class="active"><a <?php echo anchor('main/index', 'Home'); ?></a></li>
                <li><a <?php echo anchor('main/about', 'About'); ?></a></li>
                <li><a <?php echo anchor('main/add', 'Add New User'); ?></a></li>
            </ul>
        </div>
    </nav>

