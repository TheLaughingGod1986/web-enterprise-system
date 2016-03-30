<nav class="navbar navbar-inverse top-menu no-margin-bottom">
        <span class="top-center-text">
           <?php
           if ($this->session->is_logged_admin) {
               echo "<h1>Admin Portal - Faculty</h1>";
           }

           else if ($this->session->is_logged_external) {
               echo "<h1>External Portal - Faculty </h1>";
           }

           else if (!isset($this->session->is_logged_staff) && $this->session->RoleID =='1') {
               echo "<h1>Program leader Portal - Faculty</h1>";
           }

           else if (!isset($this->session->is_logged_staff) && $this->session->RoleID =='2') {
               echo "<h1>Pro vice chancellery Portal - Faculty</h1>";
           }

           else if (!isset($this->session->is_logged_staff, $this->session->RoleID ) && $this->session->RoleID =='3') {
               echo "<h1>Director of learning and qualit Portal - Faculty</h1>";
           }

           else {
               echo "<h1>Please Login</h1>";
           } ?>
            </span>
    </div>
</nav>

