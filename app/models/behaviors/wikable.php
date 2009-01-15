<?php

class WikableBehavior extends ModelBehavior {
	
	function afterSave(&$Model) {
		$wikiModel =& ClassRegistry::init('Wiki'); 
		$wikiData['Wiki']['wiki_to_controller'] = $Model->name;
		$wikiData['Wiki']['wiki_to_id'] = $Model->id;
		$wikiData['Wiki']['date'] = NULL;
		$wikiData['Wiki']['text'] = $Model->data[$Model->name]['wikiText'];		

		$wikiData['Wiki']['author_id']  = Configure::read("kultor.user_id");

		$wikiModel->create();
		$wikiModel->save($wikiData);		
	
	}
	
	function afterFind(&$Model,$query) {
		
		$wikiModel =& ClassRegistry::init('Wiki'); 
		$ids = "";
		if (!isset($query[0][$Model->name])) {
			return;
		}
		
		foreach($query as $item) {
			$ids.=$item[$Model->name]['id'].",";
		}
		
		$ids = substr($ids,0,strlen($ids)-1);
		$sql = "SELECT * FROM Wikis as Wiki WHERE wiki_to_controller='{$Model->name}' AND wiki_to_id IN ({$ids}) ORDER BY date desc";
		$res = $wikiModel->query($sql);

		foreach($query as &$item) {			
			foreach($res as $ritem) {
				if (isset($item['Wiki'])) continue;
				if ($ritem['Wiki']['wiki_to_id'] === $item[$Model->name]['id']) {
						$item['Wiki'] = $ritem['Wiki'];
				}
			}			
		}
		
		
		return $query;
	}
}

?>