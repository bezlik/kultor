<h3><?=__("Shoutbox")?></h3>
<br/>
<?
function makeName($obj)
	{
		return $obj->name.".".$obj->action.".".implode($obj->params['pass'],".");
	}


function get_username_html_color($username )
{
   return '#' . substr( md5($username ), 0, 6 );
}


$data = $this->requestAction('comments/getComments/'.makeName($this));


	if ($data != null)
	{
		foreach($data as $comment): ?>
			
			<li><span style="color:<?=get_username_html_color($comment['User']['display_name'])?>"><?php echo $comment['User']['display_name'] ?></span>
				
				
				(<?= $html->link($comment['User']['login'],"/users/view/".$comment['User']['id']);?>)&nbsp; 
				<span style="color:#999999"><?php echo $time->timeAgoInWords($comment['comment']['comment_date'])?></span> написал
					&laquo;<?=strip_tags($comment['comment']['comment_text']);?>&raquo;</li>
				
		<?php endforeach;
	}
?>
<br/>
<?php echo $form->create("Comments");?>

	
 		
	<?php
		echo $form->input('comment.comment_text',array("label"=>"","type"=>"text"));
		echo $form->hidden('comment.comment_to',array("value"=>makeName($this)));
	?>
	
<?php echo $form->end("Скажи");?>