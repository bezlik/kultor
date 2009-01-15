<?php
class JmycakeHelper extends AppHelper {
	var $helpers = array('Javascript');
	var $output ='';
    
	/*
	 * $idInput = ID dell'input text su cui fare l'autocomplete
	 * $modelSearch = Modello/NomeCampo nel quale cercare al stringa inserita nell'input
	 * $other = Array che contiene l'id del campo da aggiornare ed il nome del campo da prendere dal db
	 * $numResult = Numero di risultati da mostrare nella lista
	 * $strlen = Numero di caratteri dopo i quali iniziare le richieste dell'autocomplete
	 */
	function autocomplete($idInput,$modelSearch,$other=null,$numResult=7,$strlen=1) {
		$fields= "";
		$setBody = "";		
		$search = explode("/",$modelSearch);
		if (is_array($other)) { 
			foreach ($other As $k => $v) {
				$fields .= $v.',';
				$setBody .= "$('#".$k."').val(".$v.");";
			}
		}
		$fields .= $search[1];

		$this->output.=$this->Javascript->codeBlock('
			$("#'.$idInput.'").ready(function(){
				$("#'.$idInput.'").attr("onkeyup","query_'.$idInput.'(this.value)");
				$("#'.$idInput.'").attr("autocomplete","off");
				$("#'.$idInput.'").after("<span id=\"span_'.$idInput.'\" class=\"autocomplete_live\"></span>");
			});
		
			function query_'.$idInput.'(txt) {
    			if(txt.length >= '.$strlen.') {
					$.post("'.$this->webroot.$this->params["controller"].'/autocomplete", {query: txt, fields: "'.$fields.'", search: "'.$search[1].'", model: "'.$search[0].'", numresult: "'.$numResult.'", rand: "'.$idInput.'"}, function(data){
						$("#span_'.$idInput.'").html("<ul id=\'ul_'.$idInput.'\' class=\'autocomplete_live\'>"+data+"</ul>");
						$("#ul_'.$idInput.'").width($("#'.$idInput.'").width());
						$("#span_'.$idInput.'>ul>li>a").keypress(function(e) {       
							pressedKey = e.charCode || e.keyCode || -1;
							switch(pressedKey) {
								case 38://up
			                    	position=position-1;
			                        if (position<0) {
			                        	position=dimensione-1;
									}
			                        $("#span_'.$idInput.'>ul>li>a").eq(position).focus();
			                        return false;
								break;
			                    
								case 40://down
									position=position+1;
			                        if (position>=dimensione) {position=0;}
			                        	$("#span_'.$idInput.'>ul>li>a").eq(position).focus();
			                            return false;
									break;
			                }
						});						
					});	
				}			
			}
			
			$("#'.$idInput.'").keypress(function(e) {       
				pressedKey = e.charCode || e.keyCode || -1;
                dimensione=$("#span_'.$idInput.'>ul>li").size();
                switch(pressedKey) {
                	case 38://up
                    	$("#span_'.$idInput.'>ul>li>a").eq($("#span_'.$idInput.'>ul>li").size()-1).focus();
                        position = $("#span_'.$idInput.'>ul>li").size()-1;
					break;
                
					case 40://down
                		$("#span_'.$idInput.'>ul>li>a").eq(0).focus();
                        position=0;
					break;
                }
        	});
			
			function set_'.$idInput.'('.$fields.') {
				'.$setBody.'
				$("#'.$idInput.'").val('.$search[1].');
				$("#span_'.$idInput.'").html("");
			}
		');
		return $this->output;
    }
}
?>