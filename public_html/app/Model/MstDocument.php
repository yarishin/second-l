<?php
App::uses('AppModel', 'Model');
 
class MstDocument extends AppModel {
	
    /**
	 * 投資家登録時同意書面取得<br>
	 * 投資家登録時同意書面のリビジョンが最新のものを取得する。<br>
	 * @return array $data
	 */
	public function getRegistrationDocuments() {
		
		$sql = ""
			."select "
			."    a.* "
			."from "
			."    mst_documents a "
			."        join ( "
			."            select "
			."                doc_category_id, doc_id, max(revision) as revision "
			."            from "
			."                mst_documents "
			."            where 1 "
			."                and doc_category_id = :doc_category_id "
			."            group by "
			."                doc_category_id, doc_id "
			."        ) b "
			."        on 1 "
			."        and a.doc_category_id  = b.doc_category_id "
			."        and a.doc_id   = b.doc_id "
			."        and a.revision = b.revision "
			."order by "
			."    a.doc_id "
			.";";
		
		$params = array(
			"doc_category_id" => REG_DOC_CAT_ID
		);
		
		$data = $this->query($sql, $params);
		
		return $data;
		
	}

    /**
	 * 投資申込時同意書面１取得<br>
	 * 投資申込時(契約締結前)同意書面のリビジョンが最新のものを取得する。<br>
	 * @return array $data
	 */
	public function getInvestmentDocuments1() {
		
		$sql = ""
			."select "
			."    a.* "
			."from "
			."    mst_documents a "
			."        join ( "
			."            select "
			."                doc_category_id, doc_id, max(revision) as revision "
			."            from "
			."                mst_documents "
			."            where 1 "
			."                and doc_category_id  =  :doc_category_id "
			."                and doc_id  in (:doc_id_1, :doc_id_2) "
			."            group by "
			."                doc_category_id, doc_id "
			."        ) b "
			."        on 1 "
			."        and a.doc_category_id  = b.doc_category_id "
			."        and a.doc_id   = b.doc_id "
			."        and a.revision = b.revision "
			."order by "
			."    a.doc_id "
			.";";
		
		$params = array(
			 "doc_category_id"  => INV_DOC_CAT_ID
			,"doc_id_1" => INV_DOC_ID_00001
			,"doc_id_2" => INV_DOC_ID_00002
		);
		
		$data = $this->query($sql, $params);
		
		return $data;
		
	}

    /**
	 * 投資申込時同意書面２取得<br>
	 * 投資申込時(契約締結時)同意書面のリビジョンが最新のものを取得する。<br>
	 * @return array $data
	 */
	public function getInvestmentDocuments2() {
		
		$sql = ""
			."select "
			."    a.* "
			."from "
			."    mst_documents a "
			."        join ( "
			."            select "
			."                doc_category_id, doc_id, max(revision) as revision "
			."            from "
			."                mst_documents "
			."            where 1 "
			."                and doc_category_id  =  :doc_category_id "
			."                and doc_id  in (:doc_id_1) "
			."            group by "
			."                doc_category_id, doc_id "
			."        ) b "
			."        on 1 "
			."        and a.doc_category_id  = b.doc_category_id "
			."        and a.doc_id   = b.doc_id "
			."        and a.revision = b.revision "
			."order by "
			."    a.doc_id "
			.";";
		
		$params = array(
			 "doc_category_id"  => INV_DOC_CAT_ID
			,"doc_id_1" => INV_DOC_ID_00003
		);
		
		$data = $this->query($sql, $params);
		
		return $data;
		
	}

        public function getInvestmentDocuments7() {

                $sql = ""
                        ."select "
                        ."    a.* "
                        ."from "
                        ."    mst_documents a "
                        ."        join ( "
                        ."            select "
                        ."                doc_category_id, doc_id, max(revision) as revision "
                        ."            from "
                        ."                mst_documents "
                        ."            where 1 "
                        ."                and doc_category_id  =  :doc_category_id "
                        ."                and doc_id  in (:doc_id_1) "
                        ."            group by "
                        ."                doc_category_id, doc_id "
                        ."        ) b "
                        ."        on 1 "
                        ."        and a.doc_category_id  = b.doc_category_id "
                        ."        and a.doc_id   = b.doc_id "
                        ."        and a.revision = b.revision "
                        ."order by "
                        ."    a.doc_id "
                        .";";

                $params = array(
                         "doc_category_id"  => INV_DOC_CAT_ID
                        ,"doc_id_1" => INV_DOC_ID_00007
                );

                $data = $this->query($sql, $params);

                return $data;

        }



    /**
	 * 運用報告書情報取得<br>
	 * 運用報告書のリビジョンが最新のものを取得する。<br>
	 * @return array $data
	 */
	public function getLatestDocument($cat_id, $doc_id_list = null) {
		
		$sql = ""
			."select "
			."    a.* "
			."from "
			."    mst_documents a "
			."        join ( "
			."            select "
			."                doc_category_id, doc_id, max(revision) as revision "
			."            from "
			."                mst_documents "
			."            where 1 "
			."                and doc_category_id = :doc_category_id "
			."";
		
		if (!is_null($doc_id_list) && is_array($doc_id_list)) {
			$sql .= "and doc_id  in (";
			$count = 1;
			foreach ($doc_id_list as $doc_key => $doc_value) {
				$sql .= $count > 1 ? ", " : "";
				$sql .= ":doc_id_".$count++;
			}
			$sql .= ") ";
		}
		
		$sql .= ""
			."            group by "
			."                doc_category_id, doc_id "
			."        ) b "
			."        on 1 "
			."        and a.doc_category_id  = b.doc_category_id "
			."        and a.doc_id   = b.doc_id "
			."        and a.revision = b.revision "
			."order by "
			."    a.doc_id "
			.";";
		
//		$params = array(
//			 "doc_category_id" => INV_DOC_CAT_ID
//			,"doc_id"  => INV_DOC_ID_00004
//		);

		$params["doc_category_id"] = $cat_id;
		if (!is_null($doc_id_list) && is_array($doc_id_list)) {
			$count = 1;
			foreach ($doc_id_list as $doc_key => $doc_value) {
				$params["doc_id_".$count++] = $doc_value;
			}
		}
		
		$data = $this->query($sql, $params);
		
		return $data;
		
	}
	
	
}
