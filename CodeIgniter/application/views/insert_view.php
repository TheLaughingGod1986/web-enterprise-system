<?php
/**
 * Created by PhpStorm.
 * User: ruifurtado
 * Date: 16/02/2016
 * Time: 22:01
 */


echo form_open('Insert_controller'); ?>
<h1>Insert Data Into Database Using CodeIgniter</h1><hr/>
<?php if (isset($message)) { ?>
  <h3>Data inserted successfully</h3><br>
<?php } ?>
<?php echo form_label('Examiner Name :'); ?> <?php echo form_error('userName'); ?><br />
<?php echo form_input(array('id' => 'userName', 'name' => 'userName')); ?><br />

<?php echo form_label('Password :'); ?> <?php echo form_error('pass'); ?><br />
<?php echo form_input(array('id' => 'pass', 'name' => 'pass', 'placeholder' => '******')); ?><br />


<?php echo form_submit(array('id' => 'submit', 'value' => 'Submit')); ?>
<?php echo form_close(); ?>
