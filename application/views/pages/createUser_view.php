<?php
$attributes1 = array('class' => 'adminField');
$attributes2 = array('class' => 'staffField');
echo form_open('UManage_cntrl/insert_user');

    echo form_fieldset('User Role');

        if(!isset($opFaculty))
            $opFaculty = 'empty';

        if(!isset($opDepartment))
            $opDepartment = 'Choose Faculty 1st';

        $js = 'id="rForm" onChange="reloadForm();"';

        $opRole = array(
            'Choose One' => 'Choose One',
            'Admin' => 'Admin',
            'EE' => 'EE',
            'Staff' => 'Staff'
        );
        echo form_label('Role', 'role');
        echo form_dropdown('role', $opRole, 'role', $js);
        echo form_error('role');

            $facul = array('Choose' => 'Choose Faculty');
            $dep = array('Choose' => 'Faculty first');

            foreach($opFaculty as $facs):
                $facul[$facs->FacultyID] = $facs->Faculty_Name;
            endforeach;

            //foreach($opDepartment as $d):
                //$dep[$d->DepartmentID] = $d->Department_Name;
            //endforeach;

            $js2 = 'id="facul" onChange="updateList();"';
            echo form_label('Faculty', 'faculty', 'class="staffItem"');
            echo form_dropdown('faculty', $facul, 'class="staffItem"', $js2);
            echo form_error('faculty');


            $dd = array('id'=>'depDL');
            echo form_label('Department', 'depart', 'class="staffItem"');
            echo form_dropdown('depart', $dep, 'class="staffItem"', $dd);
            echo form_error('depart');

    echo form_fieldset_close();

    echo form_fieldset('Admin Login', $attributes1);
        echo form_label('Username', 'username');
        echo form_input('username','','id="username"');
        echo form_error('username');

        echo form_label('Password', 'apassword');
        echo form_password('password', '', 'id="apassword"');
        echo form_error('apassword');
    echo form_fieldset_close();

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
        echo form_label('Title', 'title');
        echo form_dropdown('Title', $options, 'title');
        echo form_error('title');

        echo form_label('First Name', 'First_Name');
        echo form_input('First_Name',set_value('First_Name'),'id="First_Name"');
        echo form_error('First_Name');

        echo form_label('Last Name', 'Last_Name');
        echo form_input('Last_Name',set_value('Last_Name'),'id="Last_Name"');
        echo form_error('Last_Name');

        echo form_label('Address', 'address');
        echo form_input('Address',set_value('address'),'id="address"');
        echo form_error('address');

        echo form_label('Post-Code', 'postal');
        echo form_input('postal',set_value('postal'),'id="postal"');
        echo form_error('postal');

        echo form_label('Telephone', 'phone');
        echo form_input('phone',set_value('phone'),'id="phone"');
        echo form_error('phone');

            echo form_label('HEI', 'hei', 'class="staffItem"');
            echo form_input('hei', set_value('hei'), 'class="staffItem"');
            echo form_error('hei');

    echo form_fieldset_close();

    echo form_fieldset('Login Details', $attributes2);

        echo form_label('Email', 'email');
        echo form_input('email',set_value('email'),'id="email"');
        echo form_error('email');

        $newPass = random_string('alnum', 8);
        echo form_label('Password', 'password');
        echo form_password('password', $newPass,'id="password"');
        echo form_error('password');
    echo form_fieldset_close();

    echo form_submit('submit', 'Create');
echo form_close();
?>
<script type="text/javascript">
    function updateList(){
        var xhttp;
        xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function (){
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                var doc = JSON.parse(xhttp.responseText);
                console.log(doc);
                console.log(doc.Department_Name);
                var x = document.getElementById("depDL");
                for (var w=0; w>doc.length; w++){
                    x.options.add(new Option(doc[w].DepartmentID, doc[w].Department_Name));
                }
            }
        }
        var e = document.getElementById("facul");
        var selected = e.options[e.selectedIndex].value;

        xhttp.open('GET','<?php echo base_url(); ?>index.php/UManage_cntrl/ajaxTry/'+selected,true);
        xhttp.send();
    }
</script>