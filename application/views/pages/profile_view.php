<?php
	//if ($this->session->is_logged_external || $this->session->is_logged_staff) {}
    if(isset($single_user)){
            echo '<li>';
            echo $single_user->Last_Name.', '.$single_user->First_Name;
            echo '</li>';
    else{
        echo 'No Records';
    }
?>