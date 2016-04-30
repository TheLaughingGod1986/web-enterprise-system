<?php
$this->load->helper('string');
$attributes1 = array('class' => 'adminField');
$attributes2 = array('class' => 'loginField');
$attributes3 = array('class' => 'staffItem');
$attributes4 = array('class' => 'eeItem');
echo form_open('UManage_cntrl/insert_user');

    echo form_fieldset('User Role');

        //Role dropdown list
        $opRole = array(
            'Choose' => 'Choose One',
            'Admin' => 'Admin',
            'EE' => 'EE',
            'Staff' => 'Staff'
        );
        $js = 'id="rForm" onChange="reloadForm();"';
        echo form_label('Role', 'role');
        echo form_dropdown('role', $opRole, 'Choose', $js);
        echo form_error('role');
        echo '<br/>';

        //Faculty dropdown list
        $facul = array('Choose' => 'Choose Faculty');

        if(!isset($opFaculty)) {
            $opFaculty = 'empty';
        }else {
            foreach ($opFaculty as $facs):
                $facul[$facs->FacultyID] = $facs->Faculty_Name;
            endforeach;
        }

        $js2 = 'id="facul" onChange="updateList();"';
        echo form_label('Faculty', 'faculty', 'class="eeItem"');
        echo form_dropdown('faculty', $facul, 'class="eeItem"', $js2);
        echo form_error('faculty');

        //Department dropdown list
        $dep = array();
        $dd = array('id'=>'depDL');
        echo form_label('Department', 'Depart', 'class="staffItem"');
        echo form_dropdown('Depart', $dep, 'class="staffItem"', $dd);
        echo form_error('Depart');
        echo '<br/>';

    echo form_fieldset_close();

    echo form_fieldset('Admin Login', $attributes1);
        echo form_label('Username', 'username');
        echo form_input('username',set_value('username'),'id="username"');
        echo form_error('username');
        echo '<br/>';

        echo form_label('Password', 'apassword');
        echo form_password('apassword', '', 'id="apassword"');
        echo form_error('apassword');
        echo '<br/>';
    echo form_fieldset_close();
echo '<form>';
    echo form_fieldset('Personal Information', $attributes2);

        $options = array(
            'title' => 'Choose one',
            'Mrs' => 'Mrs',
            'Ms' => 'Ms',
            'Madam' => 'Madam',
            'Mr' => 'Mr',
            'Dr' => 'Dr',
            'Sir' => 'Sir'
        );
echo '<div class="form-group">';
        echo form_label('Title', 'Title');
        echo form_dropdown('Title', $options, 'Title');
        echo form_error('Title');
echo '</div>';
        echo '<br/>';
echo '<div class="form-group">';
        echo form_label('First Name', 'First_Name');
        echo form_input('First_Name',set_value('First_Name'),'id="First_Name"');
        echo form_error('First_Name');
echo '</div>';

        echo '<br/>';
echo '<div class="form-group">';
        echo form_label('Last Name', 'Last_Name');
        echo form_input('Last_Name',set_value('Last_Name'),'id="Last_Name"');
        echo form_error('Last_Name');
echo '</div>';
        echo '<br/>';
echo '<div class="form-group">';
        echo form_label('Address', 'Address');
        echo form_input('Address',set_value('Address'),'id="address"');
        echo form_error('Address');
echo '</div>';
        echo '<br/>';
echo '<div class="form-group">';
        echo form_label('Post-Code', 'Postal');
        echo form_input('Postal',set_value('Postal'),'id="postal"');
        echo form_error('Postal');
echo '</div>';
        echo '<br/>';
echo '<div class="form-group">';
        echo form_label('Telephone', 'Phone');
        echo form_input('Phone',set_value('Phone'),'id="phone"');
        echo form_error('Phone');
echo '</div>';
        echo '<br/>';
echo '<div class="form-group">';
            echo form_label('HEI', 'Hei', $attributes4);
            echo form_input('Hei', set_value('Hei'), $attributes4);
            echo form_error('Hei');
            echo '<br/>';
echo '</div>';
    echo form_fieldset_close();
echo '</form>';
    echo form_fieldset('Login Details', $attributes2);

        echo form_label('Email', 'Email');
        echo form_input('Email',set_value('Email'),'id="email"');
        echo form_error('Email');
        echo '<br/>';

        $newPass = random_string('alnum', 8);
        echo form_label('Password', 'Password');
        echo form_password('Password', $newPass,'id="password"');
        echo form_error('Password');

        $level = array(
            'none'=>'Choose one',
            '1'=>'Level 1',
            '2'=>'Level 2',
            '3'=>'Level 3'
        );
        echo form_label('Level', 'Level');
        echo form_dropdown('Level', $level, 'none', $attributes3);
        echo form_error('Level');
    echo form_fieldset_close();

    echo form_submit('submit', 'Create');
echo form_close();
?>
<script type="text/javascript">
    function updateList(){
        clearDL();

        var xhttp;
        xhttp = new XMLHttpRequest();

        var x = document.getElementById("depDL");
        x.style.display = "block";

        xhttp.onreadystatechange = function (){
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                var doc = JSON.parse(xhttp.responseText);
                var opt = document.createElement("OPTION");
                for (var w=0; w<doc.length; w++){
                    opt.text = doc[w].Department_Name;
                    opt.value = doc[w].DepartmentID;
                    x.options.add(opt);
                }

            }
        }

        var e = document.getElementById("facul");
        var selected = e.options[e.selectedIndex].value;

        xhttp.open('GET','<?php echo base_url(); ?>index.php/UManage_cntrl/ajaxTry/'+selected,true);
        xhttp.send();
    }

    function clearDL(){
        var select = document.getElementById("depDL");
        var length = select.options.length;
        for (i = 0; i < length; i++) {
            select.options[i] = null;
        }
    }
</script>