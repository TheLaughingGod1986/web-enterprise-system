<?php
	if (isset($profile) && $personal == false){
		//Show profile based on segment 3
        echo $profile[0]->Email;
	}
	else if ($personal == true){
		//Show personal profile
	    echo $this->session->Email;
	} else {
	    echo 'No Records';
	}
	//If not logged in and on this page without segment 3, then incorrect url
	//If logged in and on this page with segement 3, then show profile, same if wasn't logged in
?>