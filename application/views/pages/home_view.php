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
        $style = array(
            'class' => 'section'
        );

        echo form_fieldset('Section 1', $style);
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
            array('Semester 1', form_checkbox('1_1', 'accept', FALSE)),
            array('Semester 2', form_checkbox('1_2', 'accept', FALSE)),
            array('Progression and board', form_checkbox('1_3', 'accept', FALSE)),
            array('Partners', form_multiselect('1_4', $options, '1')),
            array('Approval/Review', form_checkbox('1_5', 'accept', FALSE)),
            array('Teaching Practice', form_checkbox('1_6', 'accept', FALSE)),
            array('Clinical Assessment', form_checkbox('1_7', 'accept', FALSE)),
            array('Viva Voce Examination', form_checkbox('1_8', 'accept', FALSE)),
            array('Other', form_input('1_9', 'other'))
        );
        echo $this->table->generate($fields);
        //comments
        echo form_textarea('1_10', 'comments');

        echo form_fieldset_close();

        echo form_fieldset('Section 2', $style);
        //section 2 process of assessment
        $fields2 = array(
            array('Question n1', form_radio('2_1', 'SA', FALSE), form_radio('2_1', 'A', FALSE), form_radio('2_1', 'D', FALSE), form_radio('2_1', 'SD', FALSE), form_radio('2_1', 'NA', FALSE)),
            array('Question n2', form_radio('2_2', 'SA', FALSE), form_radio('2_2', 'A', FALSE), form_radio('2_2', 'D', FALSE), form_radio('2_2', 'SD', FALSE), form_radio('2_2', 'NA', FALSE)),
            array('Question n3', form_radio('2_3', 'SA', FALSE), form_radio('2_3', 'A', FALSE), form_radio('2_3', 'D', FALSE), form_radio('2_3', 'SD', FALSE), form_radio('2_3', 'NA', FALSE)),
            array('Question n4', form_radio('2_4', 'SA', FALSE), form_radio('2_4', 'A', FALSE), form_radio('2_4', 'D', FALSE), form_radio('2_4', 'SD', FALSE), form_radio('2_4', 'NA', FALSE)),
            array('Question n5', form_radio('2_5', 'SA', FALSE), form_radio('2_5', 'A', FALSE), form_radio('2_5', 'D', FALSE), form_radio('2_5', 'SD', FALSE), form_radio('2_5', 'NA', FALSE)),
            array('Question n6', form_radio('2_6', 'SA', FALSE), form_radio('2_6', 'A', FALSE), form_radio('2_6', 'D', FALSE), form_radio('2_6', 'SD', FALSE), form_radio('2_6', 'NA', FALSE)),
            array('Question n7', form_radio('2_7', 'SA', FALSE), form_radio('2_7', 'A', FALSE), form_radio('2_7', 'D', FALSE), form_radio('2_7', 'SD', FALSE), form_radio('2_7', 'NA', FALSE))
        );
        echo $this->table->generate($fields2);
        //additional text area
        echo form_textarea('2_8', 'additional');
        echo form_fieldset_close();

        echo form_fieldset('Section 3', $style);
        //section 3 appropriateness of standards
        $sec3 = array(
            array('Section 3', form_radio('3_1', 'Yes', FALSE), form_radio('3_1', 'No', FALSE))
        );
        echo $this->table->generate($sec3);
        //additional commentary
        echo form_textarea('3_2', 'addComment3');
        echo form_fieldset_close();

        echo form_fieldset('Section 4', $style);
        //section 4 appropriateness of standards
        $sec3 = array(
            array('Section 4', form_radio('4_1', 'Yes', FALSE), form_radio('4_1', 'No', FALSE))
        );
        echo $this->table->generate($sec3);
        //programme examiner
        echo form_textarea('4_2', 'addComment4');
        //course examiner
        echo form_textarea('4_3', 'course Examiner');
        echo form_fieldset_close();

        echo form_fieldset('Section 5', $style);
        //section 5 professional statuary and regulatory bodies
        echo form_textarea('5_1', 'section5');
        echo form_fieldset_close();

        echo form_fieldset('Section 6', $style);
        //Section 6 Action, points and recommendations
        echo form_textarea('6_1', 'section6');
        echo form_textarea('6_2', 'Good Practice');
        echo form_textarea('6_3', 'Recommendation');
        echo form_submit('submit', 'Add Report');
        echo form_fieldset_close();

        $nn = array(
            'id' => 'next',
            'onClick' => 'reportSections(this)'
        );
        $pp = array(
            'id' => 'prev',
            'onClick' => 'reportSections(this)'
        );

        echo form_button('prev', 'Prev', $pp);
        echo form_button('next', 'Next', $nn);
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
    <div class="col-sm-6">
        <h2>Latest Reports</h2>
        <table border="1" style="width:50%">
            <thead>
            <tr>
                <th><h3>Report Title</h3></th>
                <th><h3>Report Date</h3></th>
                <th><h3>See Full Report</h3></th>
            </tr>
            </thead>
            <tbody>

        <?php if (isset($reports)) :
        foreach ($reports as $row) : ?>
</tbody>

        <tr>
            <td><b><?php echo $row->Report_Name; ?></b></td>
            <td><b>Date here</b></td>
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
    <table border="1" style="width:50%">
        <thead>
        <tr>
            <th><h3>Report Title</h3></th>
            <th><h3>Report Date</h3></th>
            <th><h3>See Full Report</h3></th>
        </tr>
        </thead>
        <tbody>

        <?php if (isset($reports)) :
        foreach ($reports as $row) : ?>
        </tbody>

        <tr>
            <td><b><?php echo $row->Report_Name; ?></b></td>
            <td><b>Date here</b></td>
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
    <h2>Latest Reports</h2>
    <table border="1" style="width:90%">
        <thead>
        <tr>
            <th><h3>Report Title</h3></th>
            <th><h3>Report Date</h3></th>
            <th><h3>See Full Report</h3></th>
        </tr>
        </thead>
        <tbody>

        <?php if (isset($reports)) :
        foreach ($reports as $row) : ?>
        </tbody>

        <tr>
            <td><b><?php echo $row->Report_Name; ?></b></td>
            <td><b><?php echo $row->ReportDate; ?></</td>
            <td><b><?= anchor('main/comments/' . $row->ReportID, 'Full Report'); ?></b></td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php else : ?>
        <h2>No Reports</h2>
    <?php endif; ?>
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