<?php
$this->load->helper('form');
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

        //Section 1 examiner attendance
        $fields = array(
            array('Label', 'Input'),
            array('Semester 1', form_checkbox('sm1', 'accept', FALSE)),
            array('Semester 2', form_checkbox('sm2', 'accept', FALSE)),
            array('Progression and board', form_checkbox('pro', 'accept', FALSE)),
            array('Partners', form_multiselect('choices', $options, '1')),
            array('Approval/Review', form_checkbox('', 'accept', FALSE)),
            array('Teaching Practice', form_checkbox('', 'accept', FALSE)),
            array('Clinical Assessment', form_checkbox('', 'accept', FALSE)),
            array('Viva Voce Examination', form_checkbox('', 'accept', FALSE)),
            array('Other', form_input('other', 'other'))
        );
        echo $this->table->generate($fields);

        //comments
        echo form_textarea('comments','comments');

        //section 2 process of assessment
        $fields2 = array(
            array('Question n1', form_radio('SA', 'q1', FALSE), form_radio('A', 'q1', FALSE), form_radio('D', 'q1', FALSE), form_radio('SD', 'q1', FALSE), form_radio('NA', 'q1', FALSE)),
            array('Question n2', form_radio('SA', 'q2', FALSE), form_radio('A', 'q2', FALSE), form_radio('D', 'q2', FALSE), form_radio('SD', 'q2', FALSE), form_radio('NA', 'q2', FALSE)),
            array('Question n3', form_radio('SA', 'q3', FALSE), form_radio('A', 'q3', FALSE), form_radio('D', 'q3', FALSE), form_radio('SD', 'q3', FALSE), form_radio('NA', 'q3', FALSE)),
            array('Question n4', form_radio('SA', 'q4', FALSE), form_radio('A', 'q4', FALSE), form_radio('D', 'q4', FALSE), form_radio('SD', 'q4', FALSE), form_radio('NA', 'q4', FALSE))
        );
        echo $this->table->generate($fields2);

        //additional text area
        echo form_textarea('additional','additional');

        //section 3 appropriateness of standards
        $sec3 = array(
          array('Section 3', form_radio('Yes', 's1', FALSE), form_radio('No', 's1', FALSE))
        );
        echo $this->table->generate($sec3);

        //additional commentary
        echo form_textarea('addComment3','addComment3');

        //section 4 appropriateness of standards
        $sec3 = array(
            array('Section 4', form_radio('Yes', 's2', FALSE), form_radio('No', 's2', FALSE))
        );
        echo $this->table->generate($sec3);

        //programme examiner
        echo form_textarea('addComment4','addComment4');

        //course examiner
        echo form_textarea('course examiner', 'courseExam');

        //section 5 professional statuary and regulatory bodies
        echo form_textarea('section5', 'section5');

        //Section 6 Action, points and recommendations
        echo form_textarea('section6', 'section6');
        echo form_textarea('Good Practice', 'GoodPractice');
        echo form_textarea('Recommendations for action','recommendation');

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