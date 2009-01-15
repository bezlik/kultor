<div class="events form">
	<?php echo $form->create('Event');?>
		<fieldset>
	 		<legend><?php __('Edit Event');?></legend>
		<?php
			echo $form->input('id');
			echo $form->input('event_title');			
			echo $form->input('event_date');
			echo $form->input('event_end_date');
			//__()			
			echo $form->input('wikiText', array('type'=>'textarea','label'=>"Description",'value'=>$this->data['Wiki']['text']));
			
			echo $form->input('city',array('value'=>$city));
			echo $form->input('place_id');
		?>
		</fieldset>
	<?php echo $form->end('Submit');?>
</div>

<script type="text/javascript" charset="utf-8">
	
	$("#EventCity").click(function() {		
		//<bydłocode>
			if (this.prevElem == undefined)  this.prevElem = "<?=$city?>";
			if (this.prevElem == $("#EventCity").val()) return;
			this.prevElem = $("#EventCity").val();
		//</bydłocode>
		
		jQuery.getJSON(
			"/events/ajax/?q="+this.prevElem, null,			
			function(res,status){
				$("#EventPlaceId").html("");		

				for(var i in res) {
					if (typeof(res[i])=="function") continue;
					$("#EventPlaceId").append("<option value='"+i+"'>"+res[i]+"</option>");	
				}
				
			}
		);
		
		
	});
</script>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Events', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Users', true), array('controller'=> 'users', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller'=> 'users', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Places', true), array('controller'=> 'places', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Place', true), array('controller'=> 'places', 'action'=>'add')); ?> </li>
	</ul>
</div>
