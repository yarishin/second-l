<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	
	var $uses       = array(
		"MstFund"
	);
	
	var $components = array(
		 "Session"
		,"DebugKit.Toolbar"
		//,"UploadPack.Upload"
		,"Common"
		,"Fund"
		,'Maintenance.Maintenance' => array(
            'maintenanceUrl' => array(
                 'controller' => 'c910_maintenance'
                ,'action'     => 'index'
            )
			,'allowedIp' => array('117.102.194.36')
			//,'allowedIp' => array('192.168.0.1')
        )
	);
	
	public function beforeFilter() {

		$this->Common->trnRollback();
		
		if (isset($this->data[HIDDEN_ID_000000010])) {
			$this->Session->setFlash(null);
			$this->Common->setSessionEventId($this->data[HIDDEN_ID_000000010]);
		}
		
		$cumulative[ARRAY_INDEX_CUMULATIVE_LOAN] = $this->Fund->getCumulativeLoanAmount(); // 累計成約金額取得
		$this->set("cumulative", $cumulative);
			
		
	}
	
}

