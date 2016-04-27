<?php
	if (isset($profile_other)){
		//Show profile based on segment 3
	    echo '<li>';
        echo $profile_other->First_Name;
        echo '</li>';
	} 
	else if ($profile_my) {
		//Show external profile
	    echo $this->session->Email;
	} else {
	    echo 'No Records';
	}
	//If not logged in and on this page without segment 3, then incorrect url
	//If logged in and on this page with segement 3, then show profile, same if wasn't logged in
?>