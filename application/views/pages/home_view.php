<?php
$this->load->library('table');
if ($this->session->is_logged_admin) {
    echo "Hello welcome back ";
    echo '<strong>' . htmlspecialchars($this->session->Username) . ',</strong> You Are Logged in as a <strong>Admin</strong>.';
    echo " chose a option from the menu to get started.";
    ?>

    <div class="col-sm-4">

        <legend>Add New Report</legend>
        <?php
        echo form_open('main/create_report');
        $report_name = array(
            'name' => 'report_name',
            'id' => 'report_name',
            'placeholder' => 'Report Name',
        );

        echo form_input($report_name);

        $options = array(
            '1' => 'Choose',
            '2' => 'One',
            '3' => 'Or',
            '4' => 'More',
        );

        $fields = array(
        array('Semester 1', form_checkbox('sm1', 'accept', TRUE)),
        array('Semester 2', form_checkbox('sm2', 'accept', TRUE)),
        array('Progression and board', form_checkbox('pro', 'accept', TRUE)),
        array('Partners', form_multiselect('choices', $options, '1')),
        array('Approval/Review', form_checkbox('', 'accept', TRUE)),
        array('Teaching Practice', form_checkbox('', 'accept', FALSE)),
        array('Clinical Assessment', form_checkbox('', 'accept', FALSE)),
        array('Viva Voce Examination', form_checkbox('', 'accept', FALSE)),
        array('Other', form_input('other', 'other'))
        );
        echo $this->table->generate($fields);

        $fields2 = array(
            array('Question n1', form_checkbox('SA', 'q1', FALSE), form_checkbox('A', 'q1', FALSE), form_checkbox('D', 'q1', FALSE), form_checkbox('SD', 'q1', FALSE), form_checkbox('NA', 'q1', FALSE)),
            array('Question n2', form_checkbox('SA', 'q2', FALSE), form_checkbox('A', 'q2', FALSE), form_checkbox('D', 'q2', FALSE), form_checkbox('SD', 'q2', FALSE), form_checkbox('NA', 'q2', FALSE)),
            array('Question n3', form_checkbox('SA', 'q3', FALSE), form_checkbox('A', 'q3', FALSE), form_checkbox('D', 'q3', FALSE), form_checkbox('SD', 'q3', FALSE), form_checkbox('NA', 'q3', FALSE)),
            array('Question n4', form_checkbox('SA', 'q4', FALSE), form_checkbox('A', 'q4', FALSE), form_checkbox('D', 'q4', FALSE), form_checkbox('SD', 'q4', FALSE), form_checkbox('NA', 'q4', FALSE))
        );
        echo $this->table->generate($fields2);

        echo form_submit('submit', 'Add Report')
        ?>
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
    <div class="col-sm-4">
    <?php if(isset($reports)) : foreach($reports as $row) : ?>
        <h2><?php echo $row->Report_Name; ?></h2>
<p><?=anchor('main/comments/' .$row->ReportID, 'Comments' );?></p>
        <hr>
        <?php endforeach; ?>
        
        <?php else : ?>
        <h2>No Reports</h2>
        <?php endif; ?>
    </div>
    <?php
    
}

else if ($this->session->is_logged_external) {
    echo "Hello welcome back ";
    echo '<strong>' . htmlspecialchars($this->session->Email) . ',</strong> You Are Logged in as a <strong>External</strong>.';
    echo " chose a option from the menu to get started.";
}

else if ($this->session->is_logged_staff) {
    echo "Hello welcome back ";
    echo '<strong>' . htmlspecialchars($this->session->First_Name) . ',</strong> You Are Logged in as a <strong>Staff</strong>.';
    echo " chose a option from the menu to get started.";
}

else {
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