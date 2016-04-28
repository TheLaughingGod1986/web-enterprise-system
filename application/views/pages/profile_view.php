<?php
	if (isset($profile) && $profile != null && $others == true){
		//Show profile based on segment 3
        echo $profile[0]->Email;

	}
	else if ($profile == null && $others == false){
		//Show personal profile
	    echo '<div style="border-bottom:1px solid #BFBFBF;padding:15px;padding-bottom:20px;position:relative;">';
		echo '<img src="http://cumbrianrun.co.uk/wp-content/uploads/2014/02/default-placeholder.png" width="100"/>';
		echo '<div style="display:inline-block;padding-left:10px;position:absolute;top:15px;">';
		echo '<div>' . $this->session->First_Name . ', ' . $this->session->Last_Name . '</div>';
		echo '<div>' . $this->session->Email . '</div>';
		echo '</div>';	
		echo '</div>';

		echo '<div style="text-align:center;">';
		echo '<div style="width:50%;padding: 10px 0 10px 0;display:inline-block;cursor:pointer;' . $active['messages'] . 'float:left;" onclick="window.location.href=\'' . base_url() . 'index.php/Profile_cntrl/profile/messages\';">My Messages</div>';
		echo '<div style="width:50%;padding: 10px 0 10px 0;display:inline-block;cursor:pointer;' . $active['comments'] . '" onclick="window.location.href=\'' . base_url() . 'index.php/Profile_cntrl/profile/comments\';">Comments</div>';
		echo '</div>';

		if ( $active['messages'] != null){
			echo "mesages";
		} else {
			echo "comments";
		}
		// echo '<div>';
		// echo 
		// echo '</div>';
	} else {
	    echo 'No Records';
	}
	//If not logged in and on this page without segment 3, then incorrect url
	//If logged in and on this page with segement 3, then show profile, same if wasn't logged in
?>