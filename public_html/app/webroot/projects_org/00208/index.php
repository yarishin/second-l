<?php
require_once "../../../Controller/Component/CommonTag.php";
CommonTag::includeFilesProjects();

$fund_id = "00208";
$data = CommonTag::getFundDetail($fund_id);
$loan = CommonTag::getLoanList($fund_id);

$fund_name             = $data[COLUMN_0500020];
$max_loan_amount_total = $data[COLUMN_0500030];
$min_loan_amount_total = $data[COLUMN_0500050];
$min_investment_amount = $data[COLUMN_0500060];
$post_datetime         = $data[COLUMN_0500070];
$inviting_start        = $data[COLUMN_0500080];
$inviting_end          = $data[COLUMN_0500090];
$operating_start       = date(DATE_FORMAT, strtotime($data[COLUMN_0500100]));
$operating_end         = date(DATE_FORMAT, strtotime($data[COLUMN_0500110]));
$operating_term        = $data[COLUMN_0500120];
$target_yield          = $data[COLUMN_0500140];
$guide                 = $data[COLUMN_0500150];
$investment_amount     = $data[COLUMN_1200070];
$investment_count      = $data[COLUMN_ALIAS_COUNT];
$fund_status_code      = CommonTag::getFundStatusCode($data);
$remaining_amount      = $max_loan_amount_total - $investment_amount;
$remaining_time        = CommonTag::getRemainingTime($data, $fund_status_code);
$loan_count            = count($loan);
$url                   = URL_PROJECTS_PAGE.$fund_id."/";

$header_param[ARRAY_INDEX_OG_IMAGE] = $url."img/anken_img001.jpg";
$header_param[ARRAY_INDEX_OG_DESC]  = $fund_name."、運用利回り".$target_yield."％、投資可能額".number_format($min_investment_amount / 10000)."万円から。";
$header_param[ARRAY_INDEX_OG_URL]   = $url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
<?php CommonTag::htmlHeaderProjectDetail($header_param); ?>
        
<script type="text/javascript" src="../../js/keisan.js"></script>
<script type="text/javascript">
//<![CDATA[
function linkClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
jQuery(document).ready(function(){
   jQuery("#form").validationEngine();
});
$(function(){
	var pbar = $("#progressbar");
	pbar.progressbar({ value : <?php echo $investment_amount ?> , max : <?php echo $max_loan_amount_total ?> });
	var per = pbar.progressbar('value') / pbar.progressbar('option', 'max');
	$('#loading').text(Math.floor(per * 100) + '% 募集完了');
});
//]]>
</script>

</head>
<body>

<?php CommonTag::header(); ?>
    <div id="header_under">
		<div id="breadcrumb-area">
			<a href='<?php echo URL_SITE_TOP ?>'>HOME</a> > <a href="<?php echo URL_FUND_LIST ?>">案件一覧</a> > <?php echo $fund_name ?>
		</div>
    </div>
    
    <div id="content">
        <div id="page-title"><?php echo $fund_name ?></div>
        
        <div id="project-shousai-area"> <!-- 案件詳細エリア -->
            
			<form id="form" name="simulator" method="post" action="." enctype="multipart/form-data">
				<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
				<input type="hidden" id="<?php echo HIDDEN_ID_000000030 ?>" name="<?php echo HIDDEN_ID_000000030 ?>" value="<?php echo $fund_id ?>">
				<!--シミュレーション条件-->
				<input type="hidden" id="low_kin" value="<?php echo ($min_investment_amount / 10000) ?>"> <!--最低投資額-->
				<input type="hidden" id="max_kin" value="<?php echo ($max_loan_amount_total / 10000) ?>"> <!--上限投資額-->
				<input type="hidden" id="riritsu" value="<?php echo ($target_yield)                  ?>"> <!--利回り-->
				<input type="hidden" id="kaisu"   value="<?php echo ($operating_term)                ?>"> <!--運用期間-->
				<!--条件 ここまで-->
				
				<div id="project-shousai-left"> <!-- 左側 -->
					<div id="project-image">
						<img src="img/anken_img001.jpg">
						<h3><?php echo $fund_name ?></h3>
<?php if ((FUND_STATUS_CODE_BEFORE_INVITING == $fund_status_code || FUND_STATUS_CODE_NOW_INVITING == $fund_status_code)
		&& (strtotime(date(DATETIME_FORMAT)) <= strtotime($post_datetime." +".DISP_TERM_NEW_IMAGE." day"))) { ?>
						<img src="../img/obi001.png" class="p_image_over"> <!--画像の上に設置-->
<?php } elseif (FUND_STATUS_CODE_BEFORE_OPERATING == $fund_status_code || FUND_STATUS_CODE_NOW_OPERATING == $fund_status_code || FUND_STATUS_CODE_CLOSED == $fund_status_code) { ?>
						<img src="../img/obi002.png" class="p_image_over"> <!--画像の上に設置-->
<?php } elseif (FUND_STATUS_CODE_FAILURE == $fund_status_code) { ?>
						<img src="../img/obi003.png" class="p_image_over"> <!--画像の上に設置-->
<?php } ?>
					</div>
<span style="font-size:12px;">※写真はイメージです。</span>
					<div id="ps-left_2">

							<table id="project-simulator1">
								<tr><td colspan="2" style="text-align: center;"><b>投資収益シミュレーション</b></td></tr>
								<tr><td colspan="2"><small>投資予定金額を入力して計算ボタンをクリックしてください。</small></td></tr>
								<tr><td colspan="2"><small>(<input id="sim_kin1" type="text" value="" readonly>万円　～<input id="sim_kin2" type="text" value="" readonly>万円 の範囲内で入力してください )</small></td></tr>
								<tr>
									<td class="ps1_input"><input type="text" class="validate[custom[onlyNumberSp],min[<?php echo ($min_investment_amount / 10000) ?>],max[<?php echo ($max_loan_amount_total / 10000) ?>]]" id="simulator_input"> 万円</td>
									<td class="ps1_input"><input type="button" value="計算" onclick="Add();" id="Add_bt"></td>
								</tr>
							</table>

							<table id="project-simulator2">
								<tr>
									<td class="ps2_title1"></td>
									<td class="ps2_title2_new" id="ps2_title3">Trust Lending</td>
								</tr>
								<tr>
									<td class="ps2_title1">税引前収益</td>
									<td class="ps2_kekka"><input class="kekka_text101" id="kekka_t1" readonly>円</td>
								</tr>
								<tr>
									<td class="ps2_title1">△税金（源泉税）</td>
									<td class="ps2_kekka"><input class="kekka_text101" id="kekka_t2" readonly>円</td>
								</tr>
								<tr>
									<td class="ps2_title1">税引後収益</td>
									<td class="ps2_kekka" id="shuuekiarea"><input class="kekka_text101" id="kekka_t3" readonly><span>円</span></td>
								</tr>
							</table>

							<div style="font-size: 12px;margin-top: 10px;padding: 10px;background-color: #fff;">
								※シミュレーションの結果は参考のため算出した概算値であり、将来の運用成果を保証するものではありません。<br>
								(2013年1月～2037年12月までの△税金(源泉税)には、<a href="http://www.nta.go.jp/tetsuzuki/shinsei/annai/gensen/fukko/index.htm" target="_blank">復興特別所得税</a>が含まれます。)
							</div>

							<div id="risk_bt">
								<a href="<?php echo URL_PDF_RISK_DESCRIPTION ?>" target="blank">リスク説明</a>
							</div>

					</div>
				</div>

				<div id="project-shousai-right"> <!-- 右側：案件概要 -->
					<div style="overflow: auto;margin: 0;padding: 0;">
						
						<?php if (FUND_STATUS_CODE_NOW_INVITING == $fund_status_code) { ?>
							<div id="invest_bt"><a href="<?php echo URL_INVESTMENT_INPUT."?".GET_PARAM_INDEX_FUND_ID."=".$fund_id ?>">この案件に投資する</a></div>
						<?php } ?>
						
						<table id="fund_status">
							<tr><td class="fund_status_title">応募状況</td><td class="fund_status_s1">￥<?php echo number_format($investment_amount) ?></td></tr>
							<tr><td class="fund_status_title">募集金額（※１）</td><td class="fund_status_s1">￥<?php echo number_format($max_loan_amount_total) ?></td></tr>
							<tr><td class="fund_status_title">最低成立額</td><td class="fund_status_s1">￥<?php echo number_format($min_loan_amount_total) ?></td></tr>
							<tr><td rowspan="3" class="fund_status_title">募集期間</td><td class="fund_status_s3">開始　<?php echo $inviting_start ?></td></tr>
							<tr><td class="fund_status_s3">終了　<?php echo $inviting_end ?></td></tr>
							<tr><td class="fund_status_s3">※募集金額に達した時点で終了となります。</td></tr>
							<tr><td class="fund_status_title">残り募集金額</td><td class="fund_status_s2"><font style="color: #FF2D55;"><small>あと</small>￥<?php echo number_format($remaining_amount) ?></font></td></tr>
							<tr><td class="fund_status_title">残り募集時間</td><td class="fund_status_s2"><?php echo $remaining_time ?></td></tr>
							<tr><td colspan="2"><b>進捗状況</b><div id="progressbar"><div id="loading"></div></div></td></tr> <!--プログレスバー-->
							<tr><td class="fund_status_title">投資可能金額</td><td class="fund_status_s2">￥<?php echo number_format($min_investment_amount) ?> ～</td></tr>
							<tr><td class="fund_status_title">案件数</td><td class="fund_status_s3"><?php echo $loan_count ?>案件</td></tr>
							<tr><td class="fund_status_title">想定利回り（税引前）</td><td class="fund_status_s2"><?php echo $target_yield ?>%</td></tr>
							<tr><td class="fund_status_title">貸付実行日</td><td class="fund_status_s3"><?php echo $operating_start ?></td></tr>
							<tr><td class="fund_status_title">返済完了日</td><td class="fund_status_s3"><?php echo $operating_end ?></td></tr>
							<tr><td class="fund_status_title">運用期間</td><td class="fund_status_s3"><?php echo $operating_term ?>ヶ月</td></tr>
							<tr><td class="fund_status_title">貸付条件</td><td><small>※下記ローンファンド詳細の各案件をご確認ください。</small></td></tr>
							<tr><td colspan="2"><small style="color: red;">（※１）募集期間内に募集金額に達しなかった場合、当ローンファンドは不成立となる場合があります。不成立の場合、送金いただいた出資金はお客様がご登録された銀行預金口座に返金されます。</small></td></tr>
						</table>

					</div>
				</div>
            
            <div style="clear: both;"></div>
            
            <div id="ui-tab" style="margin-top: 20px;"> <!-- 案件内容 -->
                <ul class="tab_menu">
                    <li><a href="#tab1">案件1</a></li>
                    <li><a href="#tab2">案件2</a></li>
                </ul>
                
                <div id="tab1" class="tab_content">
                    <div id="tabtitle"><b>債権担保付事業者ローン</b></div> <!-- 案件1 -->
                    <div class="tab_naiyou">
                        <dl>
                    		<dt>【借入人の概要】</dt>
                    		<dd class="padd_20">
                    			本借入人は東京都内に本社を置き、衛生面向上や環境改善といった領域で事業を行っておりますが、新規事業として燃料の流通に関わるビジネスの立ち上げを進めており、このたび特定の地域と用途に対する燃料の商流に卸売業者として参入すること（以下、「本事業」と言います）が確定致しました。本事業向けにはSPCの設立を予定しており、当該SPCを経由しての貸付となる予定です。<br>



                    			<div style="float: left;"></div>
								<div style="overflow: auto;padding-left: 10px;">					
								</div>
                    		</dd>
                        </dl>
                        <dl>
                    		<dt>【借入の目的】</dt>
                    		<dd class="padd_20">
                    			本事業は、特定地域での公共工事における重機や設備の稼働や資材運搬等で必要となる各種燃料を、スムーズに供給する流通ルートを確立するために調達と配給の集約を行うものとなります。
また、公共工事への参画企業にとっては単なる附帯業務となる燃料の調達にかかっていた工数の削減、仕入先商社にとっては個々の事業者との間で発生していた事務処理や需要情報のとりまとめ等の業務が一定範囲で集約・削減されるメリットがあります。
本事業の開始にあたっては、初期投資として燃料取引における前払金・保証金ならびに部分的な設備投資が必要となりますが対象となる公共工事の一部はデリケートな内容を含むこともあり、地元金融機関からの借入が困難であったため、当社トラストレンディングに融資の相談があったものです。

<br>
                    		</dd>
                        </dl>
                        						
                    		</dd>
 <dl>
                    		<dt>【募集金額】</dt>
                    		<dd class="padd_20">
                    			本ファンドでの募集金額は50,000,000円です。<br>
本ファンドおよび燃料卸売事業者ローンファンド193～200号、203号、207号の募集を含め、後記【担保】に記載の内容を担保として総額548,600,000円の募集を行っております。<br>
<br>
※燃料卸売事業者ローンファンド193～200号、203号、207号と同一案件の追加募集となります。本借入人の資金需要の状況によって、今後更なる追加募集の可能性があります。<br> 
※本ファンドの募集が成立した場合であっても、想定通りのスキーム構築や前提条件が整わない場合には、貸付を見送る可能性があります。その場合には、出資金は無利息でお客様に返金させて頂くこととなります。





                    		</dd>
                        </dl>
                        </dl>
                    </div> <!--本文続く-->

                    <div class="tab_naiyou_right">	<!--貸付条件-->
                        <table>
                            <tr><td colspan="2" id="tnr_table_title"><h4>貸付条件</h4></td></tr>
		            <tr><th>貸付金額</th><td class="center_align">50,000,000円</td></tr>
                            <tr><th>貸付利率</th><td class="center_align">12.50%</td></tr>
			　　<tr><th>想定利回り<br>（税引前）</th><td class="center_align">10.50%</td></tr>
			　　<tr><th>営業者報酬</th><td class="center_align">2.00%</td></tr>
                            <tr><th>借入期間</th><td class="center_align">20ヶ月</td></tr>
                            <tr><th>返済方法</th><td>元金一括返済（期限前償還あり）</td></tr>
                            <tr><th>担保</th><td class="center_align">有</td></tr>
                            <tr><th>保証</th><td class="center_align">無</td></tr>
                        </table>
                    </div>
                    	
                    <div class="tab_naiyou2">
						<dl>
							
                    		</dd>
                        </dl>

                       
                        
                        <dl>
                    		<dt>【担保】</dt>
                    		<dd class="padd_20">
					本借入人が、燃料の卸先事業者（公共工事に参画する各企業）に対して有することとなる売掛債権について、債権譲渡登記（譲渡担保）を予定しております。債権譲渡登記は本ファンドの貸付実行後、速やかに行います。<br>


                    		</dd>
                    		
                        </dl>

<?php /* ?>
                        <dl>
                    		<dt>【保証人】</dt>
                    		<dd class="padd_20">
					本借入人(SPC)の親会社である事業会社（燃料卸売業者）が保証いたします。


                    		</dd>
<?php */ ?>
                        </dl>

                        <dl>

                    		<dt>【資金使途】</dt>
                    		<dd class="padd_20">
                    			以下の事業資金・運転資金として使用される予定です。<dl>
　① 燃料の取引にあたって必要となる保証金、前払金等<BR>
　② 設備の調達および修繕に係る費用<BR>
　③ 本事業にて本借入人が行う業務に関する労務費・外注費<BR>
　④ 本事業の企画支援に関する外部コンサルティング費用<br>
　⑤ 本ファンドからの借入金にかかる経過利息<BR>
　⑥ 担保設定に関する契約・登記に係る諸費用<BR>
　⑦ 上記各号に付随する費用<BR>
<br>
									
                    		</dd>
                        </dl>
                        
                        <dl>
                    		<dt>【返済原資】</dt>
                    		<dd class="padd_20">
                    			本事業の営業収益による返済となります。<BR>
事業の性質により仕入れる燃油に対して優遇税制措置が適用されることで高い利益率となることに加え、初年度売上30億円をボトムラインとして継続成長が計画されている売上規模となります。<br>
当社としては、本借入人との面談はもとより、対象となる公共工事に携わる事業者からもヒアリングを行ったうえで、借入人の事業計画が妥当であると判断いたしました。また、対象となる公共事業は向こう25年間の継続が見込まれ、本事業として長期のビジネスが期待できることから、本件貸付の期間を通じて本借入人が計画通りに返済を行うことは十分に可能であると考えております。<BR>
※本ファンドでの運用予定期間は20ヶ月としておりますが、事業成長により想定を超える収益拡大となった場合には、ファンド単位で出資金の早期償還となることが見込まれます。<br>
<BR>
※返済リスクに関する注意点は、後記【投資に関する注意点】の内容をよくご確認ください。


                    		</dd>
                        </dl>
                        	
                        <dl style="color: red;">
                    		<dt>【投資に関するご注意】</dt>
                    		<dd class="padd_20">
			                    			①本ファンドへの出資は元本が保証されるものではありません。<br>
								②「投資シミュレーション」の計算結果は概算の想定値であり、将来の運用成果をお約束するものではありません。<br>
								③本借入人の経営・営業及び信用状況ならびに経済状況の変化等の影響により、出資金の一部又は全部を返還することができない可能性があります。<br>
																							④本ファンドの募集が成立した場合であっても、本借入人の状況によっては貸付実行を見送る場合があります。その場合は出資金は無利息でお客様へ返金させていただくこととなります。<br>
								⑤本借入人の信用状況又は本借入人の希望により、<br>
								　・期限前償還又は返済期限の延長<br>
								　・銀行等又はトラストレンディングが新たに組成するファンドへの借換え<br>
 を行う場合があります。<br>
								⑥投資のお申込みに際しては、よくある質問、各ファンドの詳細ページやリスク説明、重要事項説明書等をよくお読みになり、内容について十分にご理解いただき、投資判断はお客様ご自身にて行っていただきますようお願いいたします。<br>
								（よくある質問）<a href="https://www.trust-lending.net/contents/qa.php" target="_blank">https://www.trust-lending.net/contents/qa.php</a>

                    		</dd>
                        </dl>
                        
                        
						
						<dl>
							<dt>【本借入人提出資料】</dt>
							<dd class="padd_20">
								本借入人の提出資料は以下のとおりです。<br>
								<ul>
									<li>本借入人の会社謄本</li>
									<li>本借入人の代表者本人確認資料</li>
                                                                        <li>仕入先商社との取引条件が確認できる文書</li>
									<li>卸先事業者の一覧表</li>
									<li>事業計画および収益計画表</li>
									<li>本件借入に関する返済計画表
<?php /* ?><li>工事実績</li><?php */ ?>
								</ul>
							</dd>
						</dl>
                    </div>
                    	
					<div style="clear: both;margin: 0 10px;color: red;">
						※上記資料は本借入人から審査のため提出されたもので、当社がその正確性や真偽を保証するものではありませんのでご了承ください。
					</div>

				

					<div class="fund_image">
						<h4>【スキーム説明】</h4>
						<div style="text-align: center;width: 100%;">
							<img src="img/img_001.jpg" alt="スキーム図">
						</div>
						
						<h4>【募集期間、貸付実行及び分配金等について（予定）】<div style="margin: 40px 10px 20px 10px;"></h4>
						
						<img src="img/img_period.jpg"><br>

						※募集終了前であっても募集総額に達した場合は、その時点で募集終了となります。
						</div><br />
						<h4 style="text-align: center">投資ご検討のほど、よろしくお願いいたします。</h4>
						
					</div>
        	</div><!--/tab1-->
      		
      		
        	<div id="tab2" class="tab_content">
                    <div id="tabtitle"><b>事業者ローン</b></div> <!-- 案件2 -->
                    <div class="tab_naiyou">
                        <dl>
                    		<dt>【借入人の概要】</dt>
                    		<dd class="padd_20">
                    			本借入人は東京都内に本社を置き、主に有価証券の売買、投資、保有及び運用を事業目的とする企業です。<br><br>

※本借入人は当社（エーアイトラスト株式会社）の関係会社に該当します。<br>
※本借入人はトラストレンディングでの貸付、返済及び完済実績があります。
                    		</dd>
                        </dl>
	                    <dl>
                    		<dt>【借入の目的】</dt>
                    		<dd class="padd_20">
                    			本借入人が投資事業を行うにあたっての機動的な資金を確保するため、本ファンドで事業資金・運転資金として募集いたします。<br>
具体的な資金使途については、後記【資金使途】にてご確認ください。
<br>
                    		</dd>
                        </dl>

						<dl>
                    		<dt>【募集金額】</dt>
                    		<dd class="padd_20">
                    			本ファンドでの募集金額は100,000円です。
                    		</dd>
                        </dl>
	                <dl>
                    		<dt>【担保について】</dt>
                    		<dd class="padd_20">
                    			無担保にて融資します。
                    		</dd>
                        </dl>

                        
                        <dl>
                    		<dt>【資金使途】</dt>
                    		<dd class="padd_20">
                    			以下の運転資金として使用する予定です。<br>
                    			
									①家賃、人件費などの販管費<br>
									②借入金（Trust Lendingからの借入を含む）の経過利息<br>
									③上記各号に付随する費用<br>

                    		</dd>
                        </dl>
                        
                        <dl>
                    		<dt>【返済原資】</dt>
                    		<dd class="padd_20">本借入人の事業収益により返済される予定です。<br>

当社は、本借入人の営業・財務状況等から、貸付金額が少額であること、本借入人の事業は今後も継続して行われる見込みであることなどから、借入人からの返済は十分可能であると判断しました。<br><br>

※返済リスクに関する注意点は、後記【投資に関する注意点】の内容をよくご確認ください。
</dd>
                        </dl>
                    </div>            
					<div class="tab_naiyou_right">
                        <table>
                            <tr><td colspan="2" id="tnr_table_title"><h4>貸付条件</h4></td></tr>
							<tr><th>貸付金額</th><td class="center_align">100,000円</td></tr>
                            <tr><th>貸付利率</th><td class="center_align">12.50%</td></tr>
							<tr><th>想定利回り（税引前）</th><td class="center_align">10.50%</td></tr>
							<tr><th>営業者報酬</th><td class="center_align">2.00%</td></tr>
                            <tr><th>借入期間</th><td class="center_align">20ヶ月</td></tr>
                            <tr><th>返済方法</th><td>元金一括返済（期限前償還あり）</td></tr>
                            <tr><th>担保</th><td class="center_align">無</td></tr>
                            <tr><th>保証</th><td class="center_align">無</td></tr>
                        </table>
                    </div>
					
					 <div class="tab_naiyou2">
                        <dl style="color: red;">
                    		<dt>【投資に関するご注意】</dt>
                    		<dd class="padd_20">
								①本ファンドへの出資は元本が保証されるものではありません。<br>
								②「投資シミュレーション」の計算結果は概算の想定値であり、将来の運用成果をお約束するものではありません。<br>
								③本借入人の経営、営業及び信用状況ならびに経済状況等の変化により、出資金の一部又は全部を返還することができない可能性があります。<br>
								④本借入人の信用状況又は本借入人の希望により、<br>
								　・期限前償還又は返済期限の延長<br>
								　・銀行等又はトラストレンディングが新たに組成するファンドへの借換え<br>
　を行う場合があります。<br>
								⑤本ファンドの募集が成立した場合であっても、本借入人の状況によっては貸付実行を見送る場合があります。その場合は出資金は無利息でお客様へ返金させていただくこととなります。<br>
								⑥投資のお申込みに際しては、よくある質問、各ファンドの詳細ページやリスク説明、重要事項説明書等をよくお読みになり、内容について十分にご理解いただき、投資判断はお客様ご自身にて行っていただきますようお願いいたします。<br>
								（よくある質問）<a href="https://www.trust-lending.net/contents/qa.php" target="_blank">https://www.trust-lending.net/contents/qa.php</a>
							</dd>
						</dl>
						<dl>
							<dt>【本借入人提出資料】</dt>
							<dd class="padd_20">
								本借入人の提出資料は以下のとおりです。<br>
								<ul>
									<li>会社謄本</li>
									<li>代表者本人確認資料</li>
								</ul>
							</dd>
						</dl>
									<div style="clear: both;margin: 0 10px;color: red;">
						※上記資料は本借入人から審査のため提出されたもので、当社がその正確性や真偽を保証するものではありませんのでご了承ください。
					</div>
					<div class="fund_image">
						<h4>【スキーム説明】</h4>
						<div style="text-align: center;width: 100%;">
							<img src="img/img_002.jpg" alt="スキーム図2">
						</div>

	</div>

						 
					<div style="margin: 40px 10px 20px 10px;">
						<b>【募集期間、貸付実行及び分配金等について（予定）】</b><br>
						<img src="img/img_period.jpg"><br>
						※募集終了前であっても募集総額に達した場合は、その時点で募集終了となります。
					</div>
											<h4 style="text-align: center;">
							投資ご検討のほど、よろしくお願いいたします。
						</h4>
					</div>
                </div><!--/tab2-->
            </div> <!-- ui-tab end -->
			
			<?php if (FUND_STATUS_CODE_NOW_INVITING == $fund_status_code) { ?>
				<div id="invest_bt"><a href="<?php echo URL_INVESTMENT_INPUT."?".GET_PARAM_INDEX_FUND_ID."=".$fund_id ?>">この案件に投資する</a></div>
			<?php } ?>

			</form> <!--simulator end-->
			
         <!-- 案件詳細エリア end -->
        
        <div id="banner_area">
            <!--<a href='<?php echo URL_REGISTRATION_PAGE ?>'><img src="../../img/banner001.jpg" alt="新規会員登録"></a>-->
            <center><a href='<?php echo URL_TRUSTLENDING_PAGE ?>'><img src="../../img/banner002.jpg" alt="トラストレンディングについて"></a></center>
        </div>
		
		<!-- ソーシャルボタン start -->
		<div id="sns_bt_area">
			<div id="share">
				<ul class="clearfix">
					<li class="facebook"><a href="http://www.facebook.com/share.php?u=<?php echo $url ?>" target="_blank"><i class="fontawesome-facebook"></i><img src="../../img/sns_img001.png" alt="facebook"></a></li>
					<li class="twitter">
						<a class="button-twitter" href="https://twitter.com/intent/tweet?hashtags=TrustLending&original_referer=<?php echo $url ?>%2F&ref_src=twsrc%5Etfw&related=lending_trust&text=<?php echo $fund_name ?>&tw_p=tweetbutton&url=<?php echo $url ?>&via=lending_trust" onclick="window.open(encodeURI(decodeURI(this.href)), 'tweetwindow', 'width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=1' ); return false;" target="_blank"><i class="fontawesome-twitter"></i><img src="../../img/sns_img002.png" alt="Twitter"></a>
					</li>

					<li class="hatebu"><a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url ?>&title=TrustLending" target="_blank"><img src="../../img/sns_img003.png" alt="はてなブックマーク"></a></li>
					<li class="pocket"><a href="http://getpocket.com/edit?url=<?php echo $url ?>" target="_blank"><i class="zocial-pocket"></i><img src="../../img/sns_img004.png" alt="Pocket"></a></li>
				</ul>
			</div><!-- / #share -->
		</div> <!--sns_bt_area end-->
        <!-- ソーシャルボタン end -->
    </div> <!-- content end -->
    </div>
<?php CommonTag::footer(); ?>
</body>
</html>
