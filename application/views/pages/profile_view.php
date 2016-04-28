<?php
	if (isset($profile) && $profile != null && $others == true){
		//Show profile based on segment 3
        echo $profile[0]->Email;

	}
	else if ($profile == null && $others == false){
		//Show personal profile
	    echo $this->session->Email;
?>
	<div style="border:1px solid #BFBFBF;padding:15px;position:relative;">
		<img src="http://cumbrianrun.co.uk/wp-content/uploads/2014/02/default-placeholder.png" width="100"/>
		<div style="display:inline-block;padding-left:10px;position:absolute;top:15px;">
			<div><?php echo $this->session->First_Name . ', ' . $this->session->Last_Name; ?></div>
			<div><?php echo $this->session->Email; ?></div>	
		</div>	
	</div>
<?php
	} else {
	    echo 'No Records';
	}
	//If not logged in and on this page without segment 3, then incorrect url
	//If logged in and on this page with segement 3, then show profile, same if wasn't logged in
?>