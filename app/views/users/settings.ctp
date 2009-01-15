<script type="text/javascript" charset="utf-8">
	function validate()
	 {

	 	if (document.getElementById('UserPassword').text!=document.getElementById('UserPasswordAgain').text) 
		{
	 		alert("Осторожно, пороли не совпадают!");
	 		return false;
		}else{
			return true;
		}
	 }
</script>
<div class="users form">
<?php echo $form->create('User',array('action'=>'settings',"OnSubmit"=>"return validate()","method"=>"post","enctype"=>"multipart/form-data"));?>
	<fieldset>
 		<legend><?php __('Ваши настройки:');?></legend>
		<?php
			echo $form->input('display_name',array('label'=>'Ваше имя'));
			echo $form->input('file',array('label'=>'Аватар','type'=>'file'));
			
			echo $form->input('password',array('label'=>'Пароль','type'=>'password',"value"=>""));
			echo $form->input('password_again',array('label'=>'','type'=>'password',"value"=>""));
		?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>



