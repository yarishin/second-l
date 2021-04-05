<?php
App::uses('AppController', 'Controller');

class C060PdfController extends AppController {
	
	public $uses = array(
		 "MstAdmin"
		,"MstCalendar"
		,"MstCompany"
		,"MstDocument"
		,"MstFund"
		,"MstLoan"
		,"MstUser"
//		,"MstZip"
		,"Transaction"
		,"TrnAdminMailHistory"
		,"TrnAgreementHistory"
		,"TrnAnnualTradeReport"
		,"TrnDividendHistory"
		,"TrnInformationHistory"
		,"TrnInfoAttachment"
		,"TrnInvestmentHistory"
		,"TrnLoanRepayment"
		,"TrnNegotiationHistory"
		,"TrnOperatingReportLoan"
		,"TrnRewardHistory"
		,"TrnSecondOperatingReport"
		,"TrnTradeBalanceReport"
		,"WrkDividend"
		,"WrkFund"
		,"WrkFundRepayment"
		,"WrkLoan"
		,"WrkLoanRepayment"
		,"WrkUser"
	);
	
	public $components = array(
		 "Admin"
		,"AdminMailHistory"
		,"AgreementHistory"
		,"AnnualTradeReport"
		,"Calendar"
		,"CheckC050"
		,"Common"
		,"Company"
		,"DividendHistory"
		,"Document"
		,"DummyData"
		,"Fund"
		,"InformationHistory"
		,"InvestmentHistory"
		,"LoanRepayment"
		,"Mail"
		,"NegotiationHistory"
		,"OperatingReport"
		,"Pdf"
		,"SessionAdminInfo"
		,"SessionUserInfo"
		,"TradeBalanceReport"
		,"User"
	);

	public $helpers = array(
		 "Common"
	);
	
	/**
	 * PDF出力
	 */
	function v010showpdf() {
		
		try {
			
			$user_id = "";
			if ($this->SessionAdminInfo->checkAdminInfo()) {
				
				// GETパラメータの正当性チェック
				$this->Pdf->validateUrlAdmin($this->params["url"]);
				
				// 投資家ID取得
				$user_id = $this->Common->getSessionUserId();
			}
			elseif ($this->SessionUserInfo->checkUserInfo()) {
				
				// GETパラメータの正当性チェック
				$this->Pdf->validateUrlUser($this->params["url"]);
				
				// 投資家ID取得
				$user_id = $this->SessionUserInfo->getUserId();
			}
			else {
				
				// セッションが無ければ例外処理
				throw new NotFoundException();
			}
			
			$fund_id  = $this->params["url"][GET_PARAM_INDEX_FUND_ID];
			$doc_id   = $this->params["url"][GET_PARAM_INDEX_DOC_ID];
		
			$revision = 1;
			if (isset($this->params["url"][GET_PARAM_INDEX_REVISION])) {
				$revision = $this->params["url"][GET_PARAM_INDEX_REVISION];
			}
			
			$doc_param = "";
			if (isset($this->params["url"][GET_PARAM_INDEX_DOC_PARAM])) {
				$doc_param = $this->params["url"][GET_PARAM_INDEX_DOC_PARAM];
			}
			
			// 書面パラメータがある場合は作成済みのPDFを表示するだけ
			if (strcmp("", $doc_param) != 0) {
				$this->Pdf->showPdf($user_id, $fund_id, $doc_id, $doc_param, $revision);
			}
			
			// 書面パラメータが無い場合はテンプレートを使用してPDFの生成を行う
			if (strcmp(REG_DOC_CAT_ID, $fund_id) == 0) {
				
				// 投資家登録申込時同意書面(表示のみ)
				$this->Pdf->makePdfLenderReg($doc_id);
				
			}
			else {
				
				if (strcmp(INV_DOC_ID_00001, $doc_id) == 0 || strcmp(INV_DOC_ID_00002, $doc_id) == 0) {
					
					// 投資申込前同意書面(表示のみ)
					$this->Pdf->makePdfInvBf($fund_id, $doc_id);
				}
				elseif (strcmp(INV_DOC_ID_00005, $doc_id) == 0) {
					
					
					// 取引残高報告書(表示のみ)
					$this->Pdf->makePdf00005();
				}
			}
			
			throw new NotFoundException();
			
		} catch (NotFoundException $ex) {
			throw new NotFoundException();
		} catch (Exception $ex) {
			
			// 例外処理
			$err_str = "C060PdfController/v010showpdf で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
	/**
	 * 認証キーのPDFファイルを表示する
	 */
	function v020showpdfauthkey() {
		try {
			
			// セッションが無ければログイン画面へ
			if (!$this->SessionAdminInfo->checkAdminInfo()) {
				$this->Common->redirectCommon(REDIRECT_C050, REDIRECT_A050010);
			}
			
			$user_id = $this->Common->getSessionUserId();
			
			$this->Pdf->makePdfAuthKey($user_id);
			
		} catch (Exception $ex) {
			// 例外処理
			$err_str = "c050_admin/v020showpdfauthkey で例外発生<br>".$ex->getMessage()."<br>";
			if (isset($ex->queryString)) {
				$err_str .= "SQL : ".$ex->queryString."<br>";
			}
			$this->Session->setFlash($err_str);
		}
	}
	
}
 