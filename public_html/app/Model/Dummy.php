<?php
App::uses('AppModel', 'Model');
 
class Dummy extends AppModel {
	
//	public $primaryKey = 'fund_id';
	
    private static $count = 0;

    public function setCount($count = 0) {
        self::$count = $count;
    }
        
    public function paginate() {
        return range(1, self::$count);
    }

    public function paginateCount() {
        return self::$count;
    }

}
