<?php
class City extends AppModel {

	var $name = 'City';
	var $validate = array(
		'id' => array('decimal'),
		'name' => array('notempty')
	);

	function findNonEmpty() {
		
		$sql = 'SELECT cities.id,cities.name FROM cities right join places on places.city_id=cities.id group by id'; 
		$result = $this->query($sql);
		
		foreach($result as $v=>$k) {			
			$res[$result[$v]['cities']['id']] = $result[$v]['cities']['name'];
		}
		
		return $res;
	}

}
?>