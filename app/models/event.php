<?php
class Event extends AppModel {

	var $name = 'Event';
	var $actsAs = 'wikable';
	var $validate = array(
		'event_date' => array(
			"rule"=>"checkEmpty","message"=>"Необходимо выбрать дату начала события"),
		'event_end_date' =>
			array('rule'=>'checkDate','message'=>'Дата завершения должна быть позже, чем дата начала.'),
			
			
		'user_id' => array('numeric')
	);
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasOne = array(
			'User' => array('className' => 'User',
								'foreignKey' => 'id',
								'dependent' => false,
								'conditions' => '',
								'fields' => 'login',
								'order' => ''
			),
			'Place' => array('className' => 'Place',
								'foreignKey' => 'id',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)

	);
	function checkEmpty() {      
      return true;
	}
	
	function beforeSave() {
		
		
		return true;

	} 
	
	
  	public function checkDate($data) {
  		if (empty($this->data['Event']['event_end_date']['day'])) return true;
  		if ($this->data['Event']['event_end_date']<$this->data['Event']['event_date'])
	  			return false;
	  	else
		  		return true;
  	}
  		


}
?>