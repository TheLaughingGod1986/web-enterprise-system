<nav class="navbar nav-second   no-margin-bottom">
    <?php
    if ($this->session->is_logged_admin) {
        echo "<h4 class='float-left push-left-small'>Welcome back, ";
        echo $this->session->Username;
        echo "!</h4>";
        echo "<h4 class='float-right push-right-small'>Select date drop down</h4>";
    }

   else if ($this->session->is_logged_external) {
        echo "<h4 class='float-left push-left-small'>Welcome back, ";
        echo $this->session->Email;
        echo "!</h4>";
       echo "<h4 class='float-right push-right-small'>Select date drop down</h4>";
    }

   else if ($this->session->is_logged_staff) {
       echo "<h4 class='float-left push-left-small'>Welcome back, ";
       echo $this->session->Email;
       echo "!</h4>";
       echo "<h4 class='float-right push-right-small'>Select date drop down</h4>";
   }

   else {
       echo "<h4 class='float-left push-left-small'>Welcome, Please Login.";
    }
    ?>

    </div>
</nav>

