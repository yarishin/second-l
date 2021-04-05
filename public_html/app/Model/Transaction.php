<?php
App::uses('AppModel', 'Model');
 
class Transaction extends AppModel {
	
	public $useTable = false;
	
	public function begin() {
		$dataSource = $this->getDataSource();
		$dataSource->begin($this);
		return $dataSource;
	} 

	public function commit($dataSource) {
		$dataSource->commit();
	}

	public function rollback($dataSource) {
		$dataSource->rollback();
	}
	
}
