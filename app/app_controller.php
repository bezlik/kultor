<?php
/* SVN FILE: $Id: app_controller.php 6296 2008-01-01 22:18:17Z phpnut $ */
/**
 * Short description for file.
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @subpackage		cake.app
 * @since			CakePHP(tm) v 0.2.9
 * @version			$Revision: 6296 $
 * @modifiedby		$LastChangedBy: phpnut $
 * @lastmodified	$Date: 2008-01-02 00:18:17 +0200 (Ср, 02 Січ 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Short description for class.
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		cake
 * @subpackage	cake.app
 */
Configure::load('kultor');
class AppController extends Controller {

var $components = array('Auth','RequestHandler');
var $helpers = array('Asset','time');
	
		function beforeFilter(){

	        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
		    $this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'display', 'home');
		    $this->Auth->fields['username']='login';
		    $this->Auth->authorize = 'controller';
		    $this->Auth->autoRedirect = false;	    
		    
		}
		
		
		
		function isAuthorized() {
          		
                  if (!$this->Auth->user()) {
                      return false;
                  }              
                  
              return true;
         }

}
?>