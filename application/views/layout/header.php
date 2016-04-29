<nav class="navbar navbar-inverse top-menu no-margin-bottom">
    <div>
        <span class="top-center-text">
           <?php
           if ($this->session->is_logged_admin) {
               echo "<h1>Admin Portal - Faculty</h1>";
           }

           else if ($this->session->is_logged_external) {
               echo "<h1>External Examiner Portal - Faculty </h1>";
           }

           else if (!isset($this->session->is_logged_staff) && $this->session->RoleID =='1') {
               echo "<h1>Programme Leader Portal - Faculty</h1>";
           }

           else if (!isset($this->session->is_logged_staff) && $this->session->RoleID =='2') {
               echo "<h1>Pro-Vice Chancellor Portal - Faculty</h1>";
           }

           else if (!isset($this->session->is_logged_staff, $this->session->RoleID ) && $this->session->RoleID =='3') {
               echo "<h1>Director of Learning and Teaching Portal - Faculty</h1>";
           }

           else {
               echo "<h1>Please Login</h1>";
           } ?>
            </span>
    </div>
</nav>

