<?php
	if ($profile != null && $others == true && ($this->session->is_logged_external || $this->session->is_logged_staff || $this->session->is_logged_admin)){
		//Show profile based on segment 3
        echo '<div style="border-bottom:1px solid #BFBFBF;padding:15px;padding-bottom:20px;position:relative;">';
		echo '<img src="http://cumbrianrun.co.uk/wp-content/uploads/2014/02/default-placeholder.png" width="100"/>';
		echo '<div style="display:inline-block;padding-left:10px;position:absolute;top:15px;">';
		echo '<div>' . $profile[0]->First_Name . ', ' . $profile[0]->Last_Name . '</div>';
		echo '<div>' . $profile[0]->Email . '</div>';
		echo '</div>';	
		echo '</div>';

		echo '<div style="text-align:center;">';
		echo '<div style="width:50%;padding: 10px 0 10px 0;display:inline-block;cursor:pointer;' . $active['main']['style'] . 'float:left;" onclick="window.location.href=\'' . base_url() . 'index.php/Profile_cntrl/profile/' . $url['type'] . '/' . $url['id'] . '/main\';">Main</div>';
		echo '<div style="width:50%;padding: 10px 0 10px 0;display:inline-block;cursor:pointer;' . $active['send']['style'] . '" onclick="window.location.href=\'' . base_url() . 'index.php/Profile_cntrl/profile/' . $url['type'] . '/' . $url['id'] . '/send\';">Send Message</div>';
		echo '</div>';

		if ( $active['main']['style'] != null){
			echo '<div style="padding:10px 10px 15px 10px;">';
			echo 'Welcome to my profile';
			echo '</div>';
		}
		else if ($active['send']['style'] != null){
			echo '<div style="padding:10px 10px 15px 10px;">';

			echo form_open('Profile_cntrl/send/' . $url['type'] . '/' . $url['id']);

            echo form_label('Title: '); echo form_error('Title');
            echo form_input(array('id' => 'Title', 'name' => 'Title', 'value' => ''));
            echo '<br/>';

            echo form_label('Message: '); echo form_error('Message');
            echo form_input(array('id' => 'Message', 'name' => 'Message', 'value' => ''));
            echo '<br/>';
            
            echo form_submit(array('id' => 'submit', 'value' => 'Send'));
            echo form_close();

			echo '</div>';
		}
	}
	else if ($profile == null && $others == false && ($this->session->is_logged_external || $this->session->is_logged_staff)){
		//Show personal profile
	    echo '<div style="border-bottom:1px solid #BFBFBF;padding:15px;padding-bottom:20px;position:relative;">';
		echo '<img src="http://cumbrianrun.co.uk/wp-content/uploads/2014/02/default-placeholder.png" width="100"/>';
		echo '<div style="display:inline-block;padding-left:10px;position:absolute;top:15px;">';
		echo '<div>' . $this->session->First_Name . ', ' . $this->session->Last_Name . '</div>';
		echo '<div>' . $this->session->Email . '</div>';
		echo '</div>';	
		echo '</div>';

		echo '<div style="text-align:center;">';
		echo '<div style="width:50%;padding: 10px 0 10px 0;display:inline-block;cursor:pointer;' . $active['messages']['style'] . 'float:left;" onclick="window.location.href=\'' . base_url() . 'index.php/Profile_cntrl/profile/messages\';">My Messages</div>';
		echo '<div style="width:50%;padding: 10px 0 10px 0;display:inline-block;cursor:pointer;' . $active['update']['style'] . '" onclick="window.location.href=\'' . base_url() . 'index.php/Profile_cntrl/profile/update\';">Update Details</div>';
		echo '</div>';

		if ( $active['messages']['style'] != null){
			foreach($active['messages']['data'] as $message){
				echo '<div style="padding:10px 10px 15px 10px;border:1px solid #BFBFBF;border-top:0;">';
				echo '<div><b>Title:&nbsp;</b>' . $message->Title . '</div>';
				echo '<div style="padding-top:5px;"><b>Message:&nbsp;</b></div>';
				echo '<p style="margin:0;">' . $message->Message . '</p>';
				echo '</div>';
			}

			if ($active['messages']['data'] == null){
				echo '<div style="padding:10px 10px 15px 10px;">';
				echo 'No messages';
				echo '</div>';
			}
		} 
		else if ($active['update']['style'] != null){
			echo '<div style="padding:10px 10px 15px 10px;">';

			echo form_open('Profile_cntrl/update');

          	echo form_label('First Name: '); echo form_error('First_Name');
            echo form_input(array('id' => 'First_Name', 'name' => 'First_Name', 'value' => $this->session->First_Name));
            echo '<br/>';

            echo form_label('Last Name: '); echo form_error('Last_Name');
            echo form_input(array('id' => 'Last_Name', 'name' => 'Last_Name', 'value' => $this->session->Last_Name));
            echo '<br/>';

            echo form_label('Email: '); echo form_error('Email');
            echo form_input(array('id' => 'Email', 'name' => 'Email', 'value' => $this->session->Email));
            echo '<br/>';

            echo form_label('Password: '); ?><?php echo form_error('Password');
            echo form_input(array('id' => 'Password', 'name' => 'Password', 'value' => $this->session->Password));
            echo '<br/>';

            echo form_submit(array('id' => 'submit', 'value' => 'Update'));
            echo form_close();

			echo '</div>';
		}
	} else {
	    echo 'No Records';
	}
	//If not logged in and on this page without segment 3, then incorrect url
	//If logged in and on this page with segement 3, then show profile, same if wasn't logged in
?>