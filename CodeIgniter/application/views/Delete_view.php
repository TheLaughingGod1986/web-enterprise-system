<?php
/**
 * Created by PhpStorm.
 * User: ruifurtado
 * Date: 21/02/2016
 * Time: 14:39
 */
?>
<div>
    <h1>Delete Users</h1>
    <div id="menu">
        <ol>
            <?php foreach($all_users as $users): ?>
            <li><a href="<?php echo base_url().'index.php/Delete_controller/index/'.$users->userID;?>"><?php echo $users->userName; ?></a></li>
            <?php endforeach; ?>
        </ol>
    </div>
    <div id="details">
        <h3>User Details</h3>
        <?php foreach($single_user as $user): ?>
            <h3>User Details</h3>
            <?php echo $user->userName; ?>
            <a href="<?php echo base_url().'index.php/Delete_controller/delete_user/'.$user->userID;?>"><button>Delete</button></a>
        <?php endforeach; ?>
    </div>
</div>
