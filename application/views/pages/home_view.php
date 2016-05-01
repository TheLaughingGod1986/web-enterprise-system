<?php
$this->load->helper('form');
$this->load->library('table');
if ($this->session->is_logged_admin) {
    echo "Hello welcome back ";
    echo '<strong>' . htmlspecialchars($this->session->Username) . ',</strong> You Are Logged in as a <strong>Admin</strong>.';
    echo " chose a option from the menu to get started.";
    ?>

    <div class="col-sm-4">



        <?php echo validation_errors('<p class="error"/>'); ?>
        <?php
        if ($this->session->flashdata('message')) {
            ?>
            <div class="message flash">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
            <?php
        }
        ?>

    </div>
    <div class="col-sm-6">
        <h2>Latest Reports</h2>
        <table border="1" style="width:50%">
            <thead>
            <tr>
                <th><h4>Title</h4></th>
                <th><h4>Date</h4></th>
                <th><h4>See Report</h4></th>
            </tr>
            </thead>
            <tbody>

        <?php if (isset($reports)) :
        foreach ($reports as $row) : ?>
</tbody>

        <tr>
            <td><b><?php echo $row->Report_Name; ?></b></td>
            <td><b><?php echo $row->ReportDate ?></b></td>
            <td><b><?= anchor('main/comments/' . $row->ReportID, 'Full Report'); ?></b></td>
        </tr>

        <?php endforeach; ?>
        </table>
        <?php else : ?>
            <h2>No Reports</h2>
        <?php endif; ?>
    </div>

    <?php

} else if ($this->session->is_logged_external) {
    echo "Hello welcome back ";
    echo '<strong>' . htmlspecialchars($this->session->Email) . ',</strong> You Are Logged in as a <strong>External</strong>.';
    echo " chose a option from the menu to get started.";
    ?>
<div class="col-sm-6">
    <h2>Latest Reports</h2>
    <table border="0" style="padding:10px;">
        <thead>
        <tr>
            <th><h3>Title</h3></th>
            <th><h3>Date</h3></th>
            <th><h3>See Report</h3></th>
        </tr>
        </thead>
        <tbody>

        <?php if (isset($reports)) :
        foreach ($reports as $row) : ?>
        </tbody>

        <tr>
            <td><b><?php echo $row->Report_Name; ?></b></td>
            <td><b><?php echo $row->ReportDate; ?></b></td>
            <td><b><?= anchor('main/comments/' . $row->ReportID, 'Full Report'); ?></b></td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php else : ?>
        <h2>No Reports</h2>
    <?php endif; ?>
</div>
<?php
} else if ($this->session->is_logged_staff) {
    echo "Hello welcome back ";
    echo '<strong>' . htmlspecialchars($this->session->First_Name) . ',</strong> You Are Logged in as a <strong>Staff</strong>.';
    echo " chose a option from the menu to get started.";
    ?>
    <div class="col-sm-7">
        <h1>title</h1>
        <p>This system is for staff to ......................</p>
    </div>
<div class="col-sm-5">
    <h2>Latest</h2>
   <p>news....</p>
</div>




<?php
} else {
    echo "<h2>Choose A Login Level</h2>
<hr>";

    echo "<h3>Admin Login</h3>";
    echo "user: admin <br>";
    echo "pass: password";

    echo form_open('Login_cntrl/admin_login');
    echo form_input('Username', 'Username');
    echo form_password('Password', 'Password');
    echo form_submit('submit', 'Login');
    echo form_close();

    echo "<h3>Staff Login LVL 1</h3>";
    echo "email: mail@mail.com<br>";
    echo "pass: aaa";

    echo "<h3>Staff Login LVL 2</h3>";
    echo "email: kotd@mail.com<br>";
    echo "pass: asdajshdajhsd";

    echo "<h3>Staff Login LVL 3</h3>";
    echo "email: del@gmail.comm<br>";
    echo "pass: fruititititi";

    echo form_open('Login_cntrl/staff_login');
    echo form_input('Email', 'Email');
    echo form_password('Password', 'Password');
    echo form_submit('submit', 'Login');
    echo form_close();

    echo "<h3>External Examiner Login</h3>";
    echo "email: mango@hotmail<br>";
    echo "pass: pokemon";

    echo form_open('Login_cntrl/external_login');
    echo form_input('Email', 'Email');
    echo form_password('Password', 'Password');
    echo form_submit('submit', 'Login');
    echo form_close();
}