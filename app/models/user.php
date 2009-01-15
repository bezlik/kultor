<?php
class User extends AppModel {

	var $name = 'User';
	var $validate = array(
		
		  'login' => array(
            'custom1' => array(
                'rule' => array('custom', "/^[a-z0-9][a-z0-9.-_]{2,18}$/i") ,
                'allowEmpty' => false,
                'message'    => 'Username can contain only a-z,0-9, "-", 
                                     "_" & "." and cannot be more then 18 characters',
            ),
            'custom2' => array(
                'rule' => array('checkUnique', 'login') ,
                'message' => 'This username is already registered. Try other.',
            )
        ),
		
		'password' => array('rule'=>VALID_NOT_EMPTY,'message'=>'please, enter the password!'),
		
		'email' => array(
			'custom1' => array(
                'rule' => array('checkUnique', 'email'),
                'message' => 'This email is already registered.'),
            'custom2' => array(
                'rule' => array('custom',  VALID_EMAIL) ,
                'allowEmpty' => false,
                'message'    => 'Input valid email')
			)
	);


   public function checkUnique($data, $fieldName) {
        $valid = false;
        
        if (isset($fieldName) && $this->hasField($fieldName)) {
            $valid = $this->isUnique(array(
                $fieldName => $this->data['User'][$fieldName]
            ));
        }
 
        return $valid;
    }
    
     function beforeSave() {
        if (@$this->data['User']['password'] != '') {
            
        } else {
            unset($this->data['User']['password']);
        }
       
        return true;
    }

}
?>