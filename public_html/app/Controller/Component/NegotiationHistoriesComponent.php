<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

 //拡張クラスを作成
class NegotiationHistoriesComponent extends Component {

	public $components = array(
		"SessionAdminInfo"
	);
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	/**
	 * 投資込みときに00001番ファイルを表示する
	 * 
	 * @param type $data
	 * @throws Exception
	 * 
	 */
	function insertNegotiationHistories($data) {

		try {
			
			// 管理者情報取得
			$admin_info = $this->SessionAdminInfo->getAdminInfo();
			
			$reg_data = array(
				COLUMN_1900010 => $data[OBJECT_ID_050300080]  
			   ,COLUMN_1900020 => $data[OBJECT_ID_050300090]  
			   ,COLUMN_1900030 => $data[OBJECT_ID_050300010."0"]  
			   ,COLUMN_1900040 => $data[OBJECT_ID_050300020."0"] 
			   ,COLUMN_1900050 => $data[OBJECT_ID_050300030."0"] 
			   ,COLUMN_1900060 => $data[OBJECT_ID_050300040."0"]  
			   ,COLUMN_1900070 => $data[OBJECT_ID_050300050."0"]  
			   ,COLUMN_1900080 => $data[OBJECT_ID_050300060."0"] 
			   ,COLUMN_1900090 => $data[OBJECT_ID_050300070."0"]
				
			   ,COLUMN_1900100 => date(DATETIME_FORMAT)
			   ,COLUMN_1900110 => $admin_info[LOGIN_ADMIN_ID] 
			   ,COLUMN_1900120 => $admin_info[LOGIN_ADMIN_NAME]
			   ,COLUMN_1900130 => date(DATETIME_FORMAT)
			   ,COLUMN_1900140 => $admin_info[LOGIN_ADMIN_ID] 
			   ,COLUMN_1900150 => $admin_info[LOGIN_ADMIN_NAME]
		   );

		   $this->Controller->TrnNegotiationHistories->create();
		   $this->Controller->TrnNegotiationHistories->save($reg_data, false);
			
		} catch (Exception $ex) {
			$err = "NegotiationHistories->insertNegotiationHistories で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	/**
	 * ユーザーの交渉履歴取得
	 * 
	 * @param type $user_id
	 */
	function getNegotiationHistories($user_id, $user_name) {
		try {
			
			$data = null;
			
			$data[OBJECT_ID_050300080] = $user_id;
			$data[OBJECT_ID_050300090] = $user_name;
			$data[OBJECT_ID_050300010.'0'] = "";
			$data[OBJECT_ID_050300020.'0'] = 1;
			$data[OBJECT_ID_050300030.'0'] = 1;
			$data[OBJECT_ID_050300040.'0'] = 1;
			$data[OBJECT_ID_050300050.'0'] = 1;
			$data[OBJECT_ID_050300060.'0'] = 1;
			$data[OBJECT_ID_050300070.'0'] = "";
			$data[OBJECT_ID_050300100.'0'] = 0;
			$data[OBJECT_ID_050300110.'0'] = "";
			//$data[OBJECT_ID_050300120.'0'] = "";
			
			$conditions  = null;
			$conditions[COLUMN_1900010] = $user_id;
			$conditions[COLUMN_1900160] = null;
			$status[MODEL_CONDITIONS]   = $conditions;
			
			$order = null;
			$order[COLUMN_1900030] = "desc";
			$status[MODEL_ORDER] = $order;
			$negotiation_data = $this->Controller->TrnNegotiationHistories->find(MODEL_ALL, $status);
			
			$count = 1;
			foreach ($negotiation_data as $key => $values) {
				foreach ($values as $value) {
					$data[OBJECT_ID_050300010.$count] = date(DATETIME_FORMAT, strtotime($value[COLUMN_1900030]));
					$data[OBJECT_ID_050300020.$count] = $value[COLUMN_1900040];
					$data[OBJECT_ID_050300030.$count] = $value[COLUMN_1900050];
					$data[OBJECT_ID_050300040.$count] = $value[COLUMN_1900060];
					$data[OBJECT_ID_050300050.$count] = $value[COLUMN_1900070];
					$data[OBJECT_ID_050300060.$count] = $value[COLUMN_1900080];
					$data[OBJECT_ID_050300070.$count] = $value[COLUMN_1900090];
					$data[OBJECT_ID_050300100.$count] = $value[COLUMN_1900000];
					$data[OBJECT_ID_050300110.$count] = $value[COLUMN_1900140]." ： ".$value[COLUMN_1900150];
					//$data[OBJECT_ID_050300120.$count] = $value[COLUMN_1900150];
					$count++;
				}
			}
			
			return $data;
			
		} catch (Exception $ex) {
			$err = "User->getNegotiationHistories で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
	
	function updateNegotiationHistories($data, $count, $flag) {
		try {
			
			// 管理者情報取得
			$admin_info = $this->SessionAdminInfo->getAdminInfo();
			
			$reg_data = null;
			
			if ($flag) {
				$reg_data = array(
					COLUMN_1900000 => $data[OBJECT_ID_050300100.$count]
				   ,COLUMN_1900030 => $data[OBJECT_ID_050300010.$count]
				   ,COLUMN_1900040 => $data[OBJECT_ID_050300020.$count]
				   ,COLUMN_1900050 => $data[OBJECT_ID_050300030.$count]
				   ,COLUMN_1900060 => $data[OBJECT_ID_050300040.$count]
				   ,COLUMN_1900070 => $data[OBJECT_ID_050300050.$count]
				   ,COLUMN_1900080 => $data[OBJECT_ID_050300060.$count]
				   ,COLUMN_1900090 => $data[OBJECT_ID_050300070.$count]
				   ,COLUMN_1900130 => date(DATETIME_FORMAT)
				   ,COLUMN_1900140 => $admin_info[LOGIN_ADMIN_ID]
				   ,COLUMN_1900150 => $admin_info[LOGIN_ADMIN_NAME]
				);
			}
			else {
				$reg_data = array(
					COLUMN_1900000 => $data[OBJECT_ID_050300100.$count]
//				   ,COLUMN_1900130 => date(DATETIME_FORMAT)
//				   ,COLUMN_1900140 => $admin_info[LOGIN_ADMIN_ID]
//				   ,COLUMN_1900150 => $admin_info[LOGIN_ADMIN_NAME]
				   ,COLUMN_1900160 => date(DATETIME_FORMAT)
				   ,COLUMN_1900170 => $admin_info[LOGIN_ADMIN_ID]
				   ,COLUMN_1900180 => $admin_info[LOGIN_ADMIN_NAME]
				);
			}
			
			 $this->Controller->TrnNegotiationHistories->save($reg_data, false);
			
		} catch (Exception $ex) {
			$err = "User->updateNegotiationHistories で例外発生<br>";
			throw new Exception($err.$ex->getMessage()."<br>");
		}
	}
}





