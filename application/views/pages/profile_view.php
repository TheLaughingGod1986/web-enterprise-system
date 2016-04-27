<?php
	//if ($this->session->is_logged_external || $this->session->is_logged_staff) {}
    if(isset($single_user)){
            echo '<li>';
            echo $users->Last_Name.', '.$users->First_Name;
            echo '<a href="' . base_url() . 'index.php/UManage_cntrl/index/' . $users->StaffID . '">Edit</a>';
            echo '</li>';
    else{
        echo 'No Records';
    }
?>