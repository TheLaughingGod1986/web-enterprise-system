<nav class="navbar nav-second   no-margin-bottom">
    <?php
    if ($this->session->logged_in) {
        echo "<h4 class='float-left push-left-small'>Welcome back,";
        echo $this->session->name;
        echo "!</h4>";
    }
   else {
       echo "<h4 class='float-left push-left-small'>Welcome, Please Login.";
    }
    ?>
    <h4 class="float-right push-right-small">Select date drop down</h4>
    </div>
</nav>

