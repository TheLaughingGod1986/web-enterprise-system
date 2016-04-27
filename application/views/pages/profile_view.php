<?php
	if (isset($single_user)){
		//Show profile based on segment 3
	    echo '<li>';
        echo $single_user->First_Name;
        echo '</li>';
	} 
	else if ($this->session->is_logged_external) {
		//Show external profile
	} else {
	    echo 'No Records';
	}
	//If not logged in and on this page without segment 3, then incorrect url
	//If logged in and on this page with segement 3, then show profile, same if wasn't logged in
?>