<?php

/* SVN FILE: $Id: default.ctp 6474 2008-02-24 03:47:41Z nate $ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2008, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2008, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.cake.libs.view.templates.layouts
 * @since			CakePHP(tm) v 0.10.0.1076
 * @version			$Revision: 6474 $
 * @modifiedby		$LastChangedBy: nate $
 * @lastmodified	$Date: 2008-02-24 05:47:41 +0200 (Нд, 24 Лют 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset('UTF-8'); ?>
	<title>
		<?php __('Культор: Все события Донецка'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->meta('icon');

		echo $html->css('kultor');
//		echo $html->css('jqModal');
//		echo $html->css('dialogs');
		
		echo $javascript->link("jquery-1.2.6.min.js");
		echo $javascript->link("jquery.create.js");
//		echo $javascript->link("jqModal.js");
//		echo $javascript->link("jquery.dialogs.js");
		echo $asset->scripts_for_layout();  

		
	?>
</head>
<body>
<!-- Alert Dialog 
<div class="jqmAlert" id="alert">

<div id="ex3b" class="jqmAlertWindow">
	    <div class="jqmAlertTitle clearfix">
	
			<h1>Did you know?</h1><a href="#" class="jqmClose"><em>Close</em></a>
		</div>
		
		<div class="jqmAlertContent">
		<p>Please wait... <img src="inc/busy.gif" alt="loading" /></p>
		</div>
	</div>
</div>


<div class="jqmConfirm" id="confirm">
	
		<div id="ex3b" class="jqmConfirmWindow">
		    <div class="jqmConfirmTitle clearfix">
		    	<h1></h1><a href="#" class="jqmClose"><em>Закрыть</em></a>
    		</div>
	  
	  	<div class="jqmConfirmContent">
			  <p class="jqmConfirmMsg"></p>
	    	  <p></p>
	  	</div>	  
	  	<input type="submit" value="Нет" />
	  	<input type="submit" value="Да" />
	</div>
</div>-->

	<div id="container">
		<div id="header">
			<div style="float:left"><h1><b><?php echo $html->link('Культор:', 'http://kultor.ho.ua',array('style'=>'font-weight:bold'));?> </b>Все события Донецка</h1></div>
				<div class="top-menu">
					<?
			
						if (isset($user))					
							 {
							 	echo "Привет, <b>".$user['User']['login']."</b> !  <a href='/users/settings/'>Настройки</a>  <a href='/users/logout/'>Выход</a>";
						 	 } else
							 {
							 	echo "Привет, <b>Гость</b>! Можешь <a href='/users/login/'>войти</a>, или <a href='/users/register/'>зарегестрироваться</a> на сайте!";
							 }
					
					?>
				</div>
		</div>
		<div id="content">
			<?php
				if ($session->check('Message.flash')):
						$session->flash();
				endif;
			?>
						
			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
			<?php echo $html->link(
							$html->image('cake.power.gif', array('alt'=> __("CakePHP: the rapid development php framework", true), 'border'=>"0")),
							'http://www.cakephp.org/',
							array('target'=>'_new'), null, false
						);
			?>
		</div>
	</div>
	
	<?php echo $cakeDebug; ?>
	
	<? if ($_SERVER['REMOTE_ADDR']!="127.0.0.1")
	 {
	?>
	<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
	var pageTracker = _gat._getTracker("UA-2026965-4");
	pageTracker._initData();
	pageTracker._trackPageview();
	</script>
	<?
	}
	?>
</body>
</html>