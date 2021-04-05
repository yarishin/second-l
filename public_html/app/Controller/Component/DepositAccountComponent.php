<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class DepositAccountComponent extends Component {
    // 他のコンポーネントを使えるようにする。
    public $components = array(
         "AgreementHistory"
	,"Common"
	,"Document"
	,"SessionUserInfo"
	,"SessionAdminInfo"
    );
    
    public function initialize(Controller $controller) {
	$this->Controller = $controller;
    }
    
}