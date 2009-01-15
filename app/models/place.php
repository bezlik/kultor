<?php
class Place extends AppModel {

	var $name = 'Place';
	var $validate = array(
		'revision_user_id' => array('numeric'),
		
	);
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'User' => array('className' => 'User',
								'foreignKey' => 'id',
								'conditions' => '',
								'fields' => 'id',
								'order' => ''
									)
	);


	function beforeSave()
	{
		return true;
	}
	
	function search($q) {
		return $this->findAll("place_name COLLATE utf8_general_ci LIKE \"%".$q."%\" GROUP BY place_id");					
	}
	
}
?>