<?php
echo $form->create('User', array('action' => 'login'));
echo $form->input('email_address',array('between'=>'<br>','class'=>'text'));
echo $form->input('password',array('between'=>'<br>','class'=>'text'));
echo $form->end('Sign In');
?>