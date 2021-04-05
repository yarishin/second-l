<?php
require_once "../../../Controller/Component/CommonTag.php";
CommonTag::includeFilesProjects();

$fund_id = "00221";
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
$remaining_time_day    = CommonTag::getRemainingTimeDay($data, $fund_status_code);//残り時間
$loan_count            = count($loan);
$url                   = URL_PROJECTS_PAGE.$fund_id."/";
$land_location                                  = $data[COLUMN_0500180];
$land_lot_number                                = $data[COLUMN_0500190];
$land_texture                                   = $data[COLUMN_0500200];
$land_area                                      = $data[COLUMN_0500210];
$land_rights_form                               = $data[COLUMN_0500220];
$building_location                              = $data[COLUMN_0500230];
$building_house_number                          = $data[COLUMN_0500240];
$building_type                                  = $data[COLUMN_0500250];
$building_structure                             = $data[COLUMN_0500260];
$building_floor_area                            = $data[COLUMN_0500270];
$building_area                                  = $data[COLUMN_0500280];
$building_rights_status                         = $data[COLUMN_0500290];
$other_transaction_modes                        = $data[COLUMN_0500300];
$other_borrowings                               = $data[COLUMN_0500310];
$real_estate_rights                             = $data[COLUMN_0500320];
$registered_holder                              = $data[COLUMN_0500330];
$city_planning_act_area_division                = $data[COLUMN_0500340];
$city_planning_law_restrictions                 = $data[COLUMN_0500350];
$building_standards_raw_restricted_area         = $data[COLUMN_0500360];
$building_standards_raw_restricted1             = $data[COLUMN_0500370];
$building_standards_raw_restricted2             = $data[COLUMN_0500380];
$building_standards_raw_restricted3             = $data[COLUMN_0500390];
$building_standards_raw_restricted4             = $data[COLUMN_0500400];
$building_standards_raw_restricted5             = $data[COLUMN_0500410];
$coverage_rate                                  = $data[COLUMN_0500420];
$floorarea_ratio                                = $data[COLUMN_0500430];
$restrictions_based_laws1                       = $data[COLUMN_0500440];
$restrictions_based_laws2                       = $data[COLUMN_0500450];
$guidance_burden                                = $data[COLUMN_0500460];
$fanility_status_drinking_water                 = $data[COLUMN_0500470];
$fanility_status_electrical                     = $data[COLUMN_0500480];
$fanility_status_gas                            = $data[COLUMN_0500490];
$fanility_status_sewage                         = $data[COLUMN_0500500];
$fanility_status_rain_water                     = $data[COLUMN_0500510];
$timeofcompletion                               = $data[COLUMN_0500520];
$division_right                                 = $data[COLUMN_0500530];
$division_shared_part                           = $data[COLUMN_0500540];
$division_usage_limit                           = $data[COLUMN_0500550];
$division_other_restrictions                    = $data[COLUMN_0500560];
$division_specific_use_permission               = $data[COLUMN_0500570];
$division_specific_exemption                    = $data[COLUMN_0500580];
$division_monthly_repair_amount                 = $data[COLUMN_0500590];
$division_total_reserves                        = $data[COLUMN_0500600];
$division_total_reserves_confirmed              = $data[COLUMN_0500610];
$division_delinquent_payment                    = $data[COLUMN_0500620];
$division_delinquent_payment_confirmed          = $data[COLUMN_0500630];
$division_monthly_management_fee                = $data[COLUMN_0500640];
$division_monthly_management_fee_confirmed      = $data[COLUMN_0500650];
$division_management_fee_delinquency            = $data[COLUMN_0500660];
$division_management_fee_delinquency_confirmed  = $data[COLUMN_0500670];
$division_management_company                    = $data[COLUMN_0500680];
$division_management_company_add                = $data[COLUMN_0500690];
$division_management_company_regist_number      = $data[COLUMN_0500700];
$division_maintenance_and_repairs1              = $data[COLUMN_0500710];
$division_maintenance_and_repairs2              = $data[COLUMN_0500720];
$division_maintenance_and_repairs3              = $data[COLUMN_0500730];
$division_maintenance_and_repairs4              = $data[COLUMN_0500740];
$division_maintenance_and_repairs5              = $data[COLUMN_0500750];
$division_maintenance_and_repairs6              = $data[COLUMN_0500760];
$warranty                                       = $data[COLUMN_0500770];
$development_land_disaster1                     = $data[COLUMN_0500780];
$development_land_disaster2                     = $data[COLUMN_0500790];
$development_land_disaster3                     = $data[COLUMN_0500800];
$sand_disaster_warning_area                     = $data[COLUMN_0500810];
$sand_disaster_warning_special_area             = $data[COLUMN_0500820];
$tsunami_disaster_warning_area                  = $data[COLUMN_0500830];
$asbestos_investigation                         = $data[COLUMN_0500840];
$asbestos_investigator                          = $data[COLUMN_0500850];
$seismic_diagnosis                              = $data[COLUMN_0500860];
$housing_performance_evaluation                 = $data[COLUMN_0500870];
$thirdparty_survey                              = $data[COLUMN_0500880];
$building_status_survey                         = $data[COLUMN_0500890];
$results_building_status_survey                 = $data[COLUMN_0500900];
$document_storage_status1                       = $data[COLUMN_0500910];
$document_storage_status2                       = $data[COLUMN_0500920];
$document_storage_status3                       = $data[COLUMN_0500930];
$document_storage_status4                       = $data[COLUMN_0500940];
$target_property_price                          = $data[COLUMN_0500950];
$calculation_method1                            = $data[COLUMN_0500960];
$calculation_method2                            = $data[COLUMN_0500970];
$calculation_method3                            = $data[COLUMN_0500980];
$real_estate_appraiser                          = $data[COLUMN_0500990];
$room                                           = $data[COLUMN_0501000];
$total_rent_income                              = $data[COLUMN_0501010];
$total_leased_area                              = $data[COLUMN_0501020];
$total_leased_area1                             = $data[COLUMN_0501030];
$total_leased_area2                             = $data[COLUMN_0501040];
$tatal_leased_area3                             = $data[COLUMN_0501050];
$total_leased_area4                             = $data[COLUMN_0501060];
$total_leased_area5                             = $data[COLUMN_0501070];
$total_leased_area6                             = $data[COLUMN_0501080];
$total_leasable_area                            = $data[COLUMN_0501090];
$t5y_occupancy_rate1                             = $data[COLUMN_0501100];
$t5y_occupancy_rate2                             = $data[COLUMN_0501110];
$t5y_occupancy_tate3                             = $data[COLUMN_0501120];
$t5y_occupancy_rate4                             = $data[COLUMN_0501130];
$t5y_occupancy_rate5                             = $data[COLUMN_0501140];
$tenant_name                                    = $data[COLUMN_0501150];
$tenant_industry                                = $data[COLUMN_0501160];
$tenant_annual_rent                             = $data[COLUMN_0501170];
$tenant_leased_area                             = $data[COLUMN_0501180];
$tenant_contract_expiration_date                = $data[COLUMN_0501190];
$tenant_renewal_method                          = $data[COLUMN_0501200];
$tenant_security_deposit                        = $data[COLUMN_0501210];
$tenant_important_subjects                      = $data[COLUMN_0501220];
$rent_payment_status                            = $data[COLUMN_0501230];
$t5y_rent_income_1                               = $data[COLUMN_0501240];
$t5y_rent_income_2                               = $data[COLUMN_0501250];
$t5y_rent_income_3                               = $data[COLUMN_0501260];
$t5y_rent_income_4                               = $data[COLUMN_0501270];
$t5y_rent_income_5                               = $data[COLUMN_0501280];
$t5y_business_rental_income_1                    = $data[COLUMN_0501290];
$t5y_business_rental_income_2                    = $data[COLUMN_0501300];
$t5y_business_rental_income_3                    = $data[COLUMN_0501310];
$t5y_business_rental_income_4                    = $data[COLUMN_0501320];
$t5y_business_rental_income_5                    = $data[COLUMN_0501330];
$ratio                                          = $data[COLUMN_0501340];
$total_investment                               = $data[COLUMN_0501350];
$investment_units                               = $data[COLUMN_0501360];
$total_priority_investment                      = $data[COLUMN_0501370];
$preferred_investment_units                     = $data[COLUMN_0501380];
$total_subordinate_investment                   = $data[COLUMN_0501390];
$subordinate_investment_units                   = $data[COLUMN_0501400];
$documents_application_start_date               = $data[COLUMN_0501410];
$documents_application_end_date                 = $data[COLUMN_0501420];
$documents_scheduled_start_date                 = $data[COLUMN_0501430];
$documents_scheduled_end_date                   = $data[COLUMN_0501440];
$documents_contract_start_date                  = $data[COLUMN_0501450];
$documents_contract_end_date                    = $data[COLUMN_0501460];
$first_calculation_date                         = $data[COLUMN_0501470];
$cycle                                          = $data[COLUMN_0501480];
$initial_distribution_schedule                  = $data[COLUMN_0501490];
$documents_expected_yield                       = $data[COLUMN_0501500];
$upfrontfee                                     = $data[COLUMN_0501510];
$management_consideration                       = $data[COLUMN_0501520];
$consideration_sale                             = $data[COLUMN_0501530];
$completion_date                                = $data[COLUMN_0501540];
$project_type                                    = $data[COLUMN_0501550];
$property_name                                   = $data[COLUMN_0501560];
$housing_display                                 = $data[COLUMN_0501570];
$property_description                            = $data[COLUMN_0501580];
$traffic_access1                                 = $data[COLUMN_0501590];
$traffic_access2                                 = $data[COLUMN_0501600];
$traffic_access3                                 = $data[COLUMN_0501610];
$neighboring_facilities1                         = $data[COLUMN_0501620];
$neighboring_facilities2                         = $data[COLUMN_0501630];
$neighboring_facilities3                         = $data[COLUMN_0501640];
$facility_1                                      = $data[COLUMN_0501650];
$facility_2                                      = $data[COLUMN_0501660];
$facility_3                                      = $data[COLUMN_0501670];
$facility_4                                      = $data[COLUMN_0501680];
$facility_5                                      = $data[COLUMN_0501690];
$facility_6                                      = $data[COLUMN_0501700];
$facility_7                                      = $data[COLUMN_0501710];
$facility_8                                      = $data[COLUMN_0501720];
$facility_9                                      = $data[COLUMN_0501730];
$facility_10                                     = $data[COLUMN_0501740];
$facility_11                                     = $data[COLUMN_0501750];
$facility_12                                     = $data[COLUMN_0501760];
$facility_13                                     = $data[COLUMN_0501770];
$facility_14                                     = $data[COLUMN_0501780];
$facility_15                                     = $data[COLUMN_0501790];


$header_param[ARRAY_INDEX_OG_IMAGE] = $url."img/anken_img001.jpg";
$header_param[ARRAY_INDEX_OG_DESC]  = $fund_name."、運用利回り".$target_yield."％、投資可能額".number_format($min_investment_amount / 10000)."万円から。";
$header_param[ARRAY_INDEX_OG_URL]   = $url;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php CommonTag::htmlHeaderProjectDetail($header_param); ?>
<link rel="stylesheet" type="text/css" href="../slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="../../css/validationEngine.jquery.css">
<script type="text/javascript" src="../../js/tl_cont.js"></script>
</head>

<body>

<?php CommonTag::header(); ?>
        <!-- 商品詳細ページ -->
        <div class="g-bg-color--sky-light">
            <div class="container g-padding-y-80--xs g-padding-y-125--xsm">

				<div style="margin: 0;position: relative;">
					<div id="page-title" class="wow slideInUp" data-wow-duration="2s" data-wow-delay="0"><?php echo $fund_name ?></div>
					<div id="page-title-mask" class="wow slideOutDown" data-wow-duration="3s" data-wow-delay=".2s"></div>
				</div>

                <div class="row g-row-col--5">
                    <!-- sliderエリア -->
                    <div class="col-md-8 g-margin-b-0--xs g-margin-b-0--lg">
                        <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".1s">
                            <div class="g-text-center--xs">
								
								<div id="slider-area">
									<ul class="thumb-item">
										 <li><img src="img/anken_img001.jpg" alt="slide01" /></li>
										 <li><img src="img/prj_img_01.jpg" alt="slide02" /></li>
										 <li><img src="img/prj_img_02.jpg" alt="slide03" /></li>
										 <li><img src="img/prj_img_03.jpg" alt="slide04" /></li>
										 <li><img src="img/photo3.jpeg" alt="slide05" /></li>
										 <li><img src="img/photo6.jpeg" alt="slide06" /></li>
									</ul>
									<!-- ↓サムネイル -->
									<ul class="thumb-item-nav">
										 <li class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".1s"><img src="img/anken_img001.jpg" alt="slide01" /></li>
										 <li class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".3s"><img src="img/prj_img_01.jpg" alt="slide02" /></li>
										 <li class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".5s"><img src="img/prj_img_02.jpg" alt="slide03" /></li>
										 <li class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".7s"><img src="img/prj_img_03.jpg" alt="slide04" /></li>
										 <li class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".9s"><img src="img/photo3.jpeg" alt="slide05" /></li>
										 <li class="wow fadeIn" data-wow-duration=".3" data-wow-delay="1.2s"><img src="img/photo6.jpeg" alt="slide06" /></li>
									</ul>
								</div>

                            </div>
                        </div>
                    </div>
                    <!-- End sliderエリア -->


					<!-- 右カラム1 -->
                    <div class="col-md-4 col-sm-12 g-margin-b-10--xs g-margin-b-0--lg" style="float: right;">
                        <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".5s">
                            <div class="s-plan-v1 g-text-center--xs g-bg-color--white g-padding-y-20--xs">

								<div style="width: 90%;margin: 0 auto 20px auto;">
									<div class="box29 g-text-center--xs">
										<div class="box-title">募集金額</div>
										<p class="box29-p1"><b style="font-size: 1.5em;"><?php echo number_format($max_loan_amount_total) ?></b>円</p>
									</div>
								</div>

								<div style="width: 90%;margin: 0 auto 20px auto;">
									<div class="box29 g-text-center--xs">
										<div class="box-title">応募状況</div>
										<div class="second circle" style="padding-top: 20px;padding-bottom: 20px;"><strong></strong></div><!--プログレスバー-->
									</div>
								</div>
									
								<div style="width: 90%;margin: 0 auto 20px auto;">
									<div class="box29 g-text-center--xs">
										<div class="box-title">募集期間</div>

										<div class="col-sm-3 col-xs-3" style="font-size: 1em;font-weight: bold;padding-top: 10px;text-align: right;">開 始</div>
										<div class="col-sm-9 col-xs-9" style="font-size: 1em;font-weight: bold;padding-top: 10px;text-align: right;"><?php echo date('Y年n月j日 H:i:s', strtotime($inviting_start)) ?></div>
										<div class="col-sm-3 col-xs-3" style="font-size: 1em;font-weight: bold;padding-top: 10px;text-align: right;">終 了</div>
										<div class="col-sm-9 col-xs-9" style="font-size: 1em;font-weight: bold;padding-top: 10px;text-align: right;padding-bottom: 10px;"><?php echo date('Y年n月j日 H:i:s', strtotime($inviting_end)) ?></div>
											
										<div class="box29-p1"><b><?php echo $remaining_time ?></b></div>
									</div>
								</div>



								<div style="width: 90%;margin: 0 auto 20px auto;">
									<div class="box29 g-text-center--xs">
										<div class="box-title">応募金額</div>
										<p class="box29-p1"><b style="font-size: 1.5em;"><?php echo number_format($investment_amount) ?></b>円</p>
									</div>
								</div>

								<div style="width: 90%;margin: 0 auto 20px auto;">
									<div class="box29 g-text-center--xs">
										<div class="box-title">残り募集金額</div>
										<p class="box29-p1"><b style="font-size: 1.5em;"><small>あと</small><?php echo number_format($remaining_amount) ?></b>円</p>
									</div>
								</div>
								
								<div style="margin-bottom: 10px;">※募集金額に達した時点で終了となります。</div>

									

                            </div>
                        </div>
                    </div>
                    <!-- End 右カラム1 -->






                    <!-- 詳細エリア -->
                    <div class="col-md-8">
                        <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".6s">
                            <div class="g-text-center--xs g-padding-y-20--xs">
                                <!-- 商品詳細 タブエリア -->
				<div>
					<!-- タブ・メニュー -->
					<div id="project-tab" class="btn-group" data-toggle="buttons">
						<label class="btn btn-primary active" style="width: 20%;"><input type="radio" autocomplete="off" checked><a href="#ContentA" data-toggle="tab">プロジェクト</a></label>
						<label class="btn btn-primary" style="width: 20%;"><input type="radio" autocomplete="off"><a href="#ContentB" data-toggle="tab">物件情報</a></label>
						<label class="btn btn-primary" style="width: 20%;"><input type="radio" autocomplete="off"><a href="#ContentC" data-toggle="tab">投資スキーム</a></label>
						<label class="btn btn-primary" style="width: 20%;"><input type="radio" autocomplete="off"><a href="#ContentD" data-toggle="tab">リスク案内</a></label>
						<?php if (isset($_SESSION[SESSION_LOGIN_USER_INFO])) { ?>
							<label class="btn btn-primary" style="width: 20%;"><input type="radio" autocomplete="off"><a href="#ContentE" data-toggle="tab">添付書類</a></label>
						<?php } else { ?>
							<label class="btn btn-primary disabled" style="width: 20%;" title="会員限定">添付書類</label>
						<?php }	?>
					</div>


					<!-- タブ内容 -->
					<div class="tab-content g-bg-color--white" style="margin-top: 20px;font-size: 14px;">
						<!-- プロジェクト概要 -->
						<div class="tab-pane active" id="ContentA" style="padding: 10px;">
							<dl>
								<dd style="margin: 10px;overflow: hidden;">
									<div class="row g-row-col--5">
										<!-- Plan -->
										<div class="col-md-6 col-xs-6 g-margin-b-4--xs g-margin-b-0--lg">
											<div class="wow fadeIn" data-wow-duration=".7" data-wow-delay=".9s">
												<div class="box29 g-text-center--xs">
													<div class="box-title">想定分配率</div>
													<p class="box29-p2"><?php echo $target_yield ?>％</p>
												</div>
												
											</div>
										</div>
										<!-- End Plan -->
                    
										<!-- Plan -->
										<div class="col-md-6 col-xs-6">
											<div class="wow fadeIn" data-wow-duration=".9" data-wow-delay="1.2s">
												<div class="box29 g-text-center--xs">
													<div class="box-title">運用日数</div>
													<p class="box29-p2"><?php echo $remaining_time_day ?>日</p>
												</div>
											</div>
										</div>
										<!-- End Plan -->
									</div>
								</dd>
							</dl>

							<dl class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".1s">
								<dt>＜概要説明＞</dt>
								<dd>
									<p style="text-align: left;">
										<?php echo $guide ?>
									</p>
									<div class="col-md-12 col-xs-12">
										<table class="table table-striped" style="text-align: left;border: 1px solid #cccccc;">
											<tbody>
												<tr><th>所在地		</th><td><?php echo $housing_display ?></td></tr>
												<tr><th>物件名称	</th><td><?php echo $property_name ?></td></tr>
												<tr><th>物件概要	</th><td><?php echo $property_description ?></td></tr>
												<tr><th>竣工日		</th><td><?php echo date('Y年n月j日', strtotime($completion_date)) ?></td></tr>
												<tr><th>契約期間	</th><td><?php echo $documents_contract_start_date ?></td></tr>
												<tr><th>募集期間	</th><td><?php echo $documents_application_start_date ?></td></tr>
												<tr><th>募集金額	</th><td><?php echo number_format($max_loan_amount_total) ?>円</td></tr>
												<tr><th>一口出資額	</th><td><?php echo number_format($min_investment_amount) ?>円 ～</td></tr>
												<tr><th>最低出資口数</th><td>1口</td></tr>
												<tr><th>想定利回り	</th><td><?php echo $documents_expected_yield ?>％</td></tr>
											</tbody>
										</table>
									</div>
								</dd>

								<dt>＜入居状況＞</dt>
								<dd style="overflow: hidden;">
								
								<?php if(isset($_SESSION[SESSION_LOGIN_USER_INFO])) { ?>
									
									<p style="text-align: right;">過去4年間（％）</p>
									<div class="col-md-12 col-xs-12">
										<table class="table table-striped" style="border: 1px solid #cccccc;">
											<tbody>
												<tr><th style="width: 50%;text-align: center;">2015年 7 ～ 12月</th><td style="width: 50%;text-align: center;">91</td></tr>
												<tr><th style="width: 50%;text-align: center;">2016年 1 ～ 6月</th><td style="width: 50%;text-align: center;">100</td></tr>
												<tr><th style="width: 50%;text-align: center;">2016年 7 ～ 12月</th><td style="width: 50%;text-align: center;">100</td></tr>
												<tr><th style="width: 50%;text-align: center;">2017年 1 ～ 6月</th><td style="width: 50%;text-align: center;">83</td></tr>
												<tr><th style="width: 50%;text-align: center;">2017年 7 ～ 12月</th><td style="width: 50%;text-align: center;">91</td></tr>
												<tr><th style="width: 50%;text-align: center;">2018年 1 ～ 6月</th><td style="width: 50%;text-align: center;">100</td></tr>
												<tr><th style="width: 50%;text-align: center;">2018年 7 ～ 12月</th><td style="width: 50%;text-align: center;">100</td></tr>
												<tr><th style="width: 50%;text-align: center;">2019年 1 ～ 6月</th><td style="width: 50%;text-align: center;">91</td></tr>
											</tbody>
										</table>
									</div>
									<?php
									} else { ?>

									<div style="width: 100%;padding: 50px;text-align: center;background-color: #f5f5f5;">
										【会員限定】<br>入居状況の閲覧にはログインが必要です。
									</div>

									<?php }	?>

								</dd>

								<dt>＜想定収支表＞</dt>
								<dd style="overflow: hidden;">

								<?php if(isset($_SESSION[SESSION_LOGIN_USER_INFO])) { ?>

									<p>
										運用期間中における収支想定は以下の通りです。
									</p>
									
									<div class="col-md-12" style="margin: 0 auto 10px auto;text-align: center;font-size: 1.2em;">対象期間 <?php echo $documents_contract_start_date ?></div>

									<div class="col-md-12 col-xs-12">
										<table class="table table-striped">
											<tbody>
												<tr><th colspan="2" style="text-align: center;">収　入</th></tr>
												<tr><th>賃料収入		</th><td style="text-align: right;">1,258,000	</td></tr>
												<tr><th>共益費			</th><td style="text-align: right;">38,500		</td></tr>
												<tr><th>駐輪場			</th><td style="text-align: right;">4,500		</td></tr>
												<tr><th>　				</th><td style="text-align: right;">　			</td></tr>
												<tr><th>賃料収入合計	</th><td style="text-align: right;">1,301,000	</td></tr>
											</tbody>
										</table>
									</div>
									<div class="col-md-12 col-xs-12">
										<table class="table table-striped">
											<tbody>
												<tr><th colspan="2" style="text-align: center;">支　出</th></tr>
												<tr><th>管理手数料		</th><td style="text-align: right;">51,860	</td></tr>
												<tr><th>掃除管理費		</th><td style="text-align: right;">15,000	</td></tr>
												<tr><th>消防設備管理	</th><td style="text-align: right;">2,000	</td></tr>
												<tr><th>公租公課		</th><td style="text-align: right;">60,000	</td></tr>
												<tr><th>保険料			</th><td style="text-align: right;">4,120	</td></tr>
												<tr><th>光熱費			</th><td style="text-align: right;">5,243	</td></tr>
												<tr><th>　				</th><td style="text-align: right;">　		</td></tr>
												<tr><th>賃料支出合計	</th><td style="text-align: right;">138,223	</td></tr>
											</tbody>
										</table>
									</div>
									<div class="col-md-12 col-xs-12">
										<table class="table table-striped">
											<tbody>
												<tr><th colspan="2" style="text-align: center;">分　配</th></tr>
												<tr><th>賃料損益		</th><td style="text-align: right;">1,162,777	</td></tr>
												<tr><th>　				</th><td style="text-align: right;">　			</td></tr>
												<tr><th>優先出資者配当	</th><td style="text-align: right;">813,944		</td></tr>
												<tr><th>劣後出資者配当	</th><td style="text-align: right;">348,833		</td></tr>
											</tbody>
										</table>
									</div>

									<?php
									} else { ?>

									<div style="width: 100%;padding: 50px;text-align: center;background-color: #f5f5f5;">
										【会員限定】<br>想定収支表の閲覧にはログインが必要です。
									</div>

									<?php }	?>


								</dd>

								<dt>＜分配金の計算方法＞</dt>
								<dd>
									<p>
										上記の賃貸損益から優先募集総額に予定分配率（年利）を乗じ、計算期間に応じて1年を365日とする日割り計算で算出した金額を上限に投資家様へ分配を行います。
									</p>
								</dd>

								<dt>＜各種スケジュール＞</dt>
								<dd>
									<div class="center-block" style="border-bottom: 1px solid #999999;margin: 10px;overflow: auto;">
										<div class="col-sm-6 g-padding-y-5--xs"><b style="font-size: 15px;color: #000000;">運用期間</b></div>
										<div class="col-sm-6 g-padding-y-5--xs g-text-left--sm g-text-center--xs">
											<?php echo date('Y年n月j日', strtotime($documents_scheduled_start_date)) ?>　から　<?php echo date('Y年n月j日', strtotime($documents_scheduled_end_date)) ?>
										</div>
									</div>

									<div class="center-block" style="border-bottom: 1px solid #999999;margin: 10px;overflow: auto;">									
										<div class="col-sm-6 g-padding-y-5--xs"><b style="font-size: 15px;color: #000000;">初回配当予定日</b></div>
										<div class="col-sm-6 g-padding-y-5--xs g-text-left--sm g-text-center--xs">
											<?php echo date('Y年n月j日', strtotime($initial_distribution_schedule)) ?>　以後　<?php echo $cycle ?>毎
										</div>
									</div>

									<div class="center-block" style="border-bottom: 1px solid #999999;margin: 10px;overflow: auto;">
										<div class="col-sm-6 g-padding-y-5--xs"><b style="font-size: 15px;color: #000000;">財産管理報告書送交付予定日</b></div>
										<div class="col-sm-6 g-padding-y-5--xs g-text-left--sm g-text-center--xs">
											<?php echo date('Y年n月j日', strtotime($documents_contract_end_date)) ?>
										</div>
									</div>

									<div class="center-block" style="border-bottom: 1px solid #999999;margin: 10px;overflow: auto;">
										<div class="col-sm-6 g-padding-y-5--xs"><b style="font-size: 15px;color: #000000;">出資金払戻予定日</b></div>
										<div class="col-sm-6 g-padding-y-5--xs g-text-left--sm g-text-center--xs">
											<?php echo date('Y年n月j日', strtotime($documents_application_end_date)) ?>
										</div>
									</div>
								</dd>

							</dl>


						</div>
						<!-- 概要説明 ここまで -->

						<!-- 物件情報 -->
						<div class="tab-pane" id="ContentB" style="padding: 10px;background-color: #fff;">
							<dl class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".1s">
								<dt>＜物件の立地＞</dt>
								<dd>
									<div id="gmap-area" style="margin-top: 20px;overflow: hidden;">
										<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6485.078456497481!2d139.66842274809286!3d35.639084122579966!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f4a2b34ead71%3A0x8dc4ff5b7a931426!2z44CSMTU0LTAwMTEg5p2x5Lqs6YO95LiW55Sw6LC35Yy65LiK6aas77yR5LiB55uu77yT77yW4oiS77yR77yQ!5e0!3m2!1sja!2sjp!4v1572335231901!5m2!1sja!2sjp" width="100%" height="350" frameborder="0" style="border: 1px solid #cccccc;margin-bottom: 10px;" allowfullscreen=""></iframe>
									</div>
									<div class="col-md-6 col-xs-12" style="overflow: auto;margin: 10px 0 20px 0;">
										<table style="width: 100%;">
											<tr><th style="padding: 5px;">交通・アクセス</th></tr>
											<tr><td style="padding: 5px;">・・・</td></tr>
											<tr><td style="padding: 5px;">・・・</td></tr>
											<tr><td style="padding: 5px;">東急バス 黒06系　日大前バス停徒歩3分</td></tr>
										</table>
									</div>
									<div class="col-md-6 col-xs-12" style="overflow: auto;margin: 10px 0 20px 0;">
										<table style="width: 100%;">
											<tr><th style="padding: 5px;">周辺施設</th></tr>
											<tr><td style="padding: 5px;">・・・</td></tr>
											<tr><td style="padding: 5px;">・・・</td></tr>
											<tr><td style="padding: 5px;">・・・</td></tr>
										</table>
									</div>
								</dd>
							</dl>

							<dl class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".1s">
								<dt>＜エリア情報＞</dt>
								<dd style="padding: 10px;">
									<div class="col-sm-7">
										三軒茶屋エリアは、かつて、大山街道沿いの街として発展しました。現在は、「エコー仲見世商店街」など昭和レトロな商店街が残る一方で、再開発で誕生し便利な施設が集まる「キャロットタワー」などもあり、歴史の伝統を生かしつつ新しい時代に合った街に変化を遂げています。「世田谷公園」や「目黒天空庭園」など緑豊かな公園、三宿・池尻・下馬エリアのおしゃれなお店など、暮らしを彩るスポットにも恵まれ、住まいの場として常に高い人気を誇る街です。<br><br>
										鉄道路線は、東急田園都市線と東急世田谷線。田園都市線で、渋谷までわずか5分。東急バス・小田急バスが利用可で、弦巻、等々力、祖師谷大蔵行きなどが利用できます。
									</div>
									<div class="col-sm-5" style="height: 300px;border: 1px solid #cccccc;">
										<img src="">
									</div>
								</dd>
							</dl>



							<dl class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".1s">
								<dt>＜賃料相場＞</dt>
								<dd>
									<div class="col-md-6 col-xs-12" style="margin: 10px 0 20px 0;">
										<table class="table table-bordered" style="width: 100%;">
											<tr><td>			</td><td style="text-align: center;">情報誌</td><td style="text-align: center;">サイト</td></tr>
											<tr><td>ワンルーム	</td><td style="text-align: right;">134,000</td><td style="text-align: right;">129,000</td></tr>
											<tr><td>１Ｋ		</td><td style="text-align: right;">134,000</td><td style="text-align: right;">133,000</td></tr>
										</table>
									</div>
									<div class="col-md-6 col-xs-12" style="margin: 10px 0 20px 0;">
										<table class="table table-bordered" style="width: 100%;">
											<tr><td>			</td><td style="text-align: center;">情報誌		</td><td style="text-align: center;">サイト</td></tr>
											<tr><td>ワンルーム	</td><td style="text-align: right;">28,000,000	</td><td style="text-align: right;">28,500,000</td></tr>
											<tr><td>１Ｋ		</td><td style="text-align: right;">30,000,000	</td><td style="text-align: right;">30,800,000</td></tr>
										</table>
									</div>
								</dd>
							</dl>

							<dl class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".1s">
								<dt>＜当該物件情報＞</dt>
								<dd style="padding: 10px;">
									<table class="table table-bordered">
										<tr><th style="width: 20%;">物件名称</th><td colspan="2"><?php echo $property_name ?></td></tr>
										<tr><th>物件所在地					</th><td colspan="2"><?php echo $housing_display ?></td></tr>
										<tr><th>土　地						</th><td colspan="2"><?php echo nl2br($land_lot_number) ?></td></tr>
										<tr><th>建　物						</th><td colspan="2"><?php echo nl2br($building_house_number) ?></td></tr>
										<tr><th rowspan="3">その他の事項	</th><td>用途地域等	</td><td><?php echo nl2br($registered_holder) ?></td></tr>
										<tr>									<td>私道負担	</td><td><?php echo $building_floor_area ?></td></tr>
										<tr>									<td>施設設備	</td><td><?php echo nl2br($fanility_status_drinking_water) ?></td></tr>
										
										<?php	//有無コード変換
											$stbcount = 0;
											for ($stbcount = 0; $stbcount <= 15; $stbcount++){
												if (${'facility_'.$stbcount} <> 0){
													${'facility_'.$stbcount} = "○";
												} else {
													${'facility_'.$stbcount} = "×";
												}
											}
										?>
										
										<tr><th rowspan="15">設　備</th><td>バス・トイレ別				</td><td><?php echo $facility_1 ?></td></tr>
										<tr>						    <td>エアコン					</td><td><?php echo $facility_2 ?></td></tr>
										<tr>						    <td>システムキッチン			</td><td><?php echo $facility_3 ?></td></tr>
										<tr>						    <td>TVモニター付きインターホン	</td><td><?php echo $facility_4 ?></td></tr>
										<tr>						    <td>洗浄機能付き便座			</td><td><?php echo $facility_5 ?></td></tr>
										<tr>						    <td>室内洗濯機置き場			</td><td><?php echo $facility_6 ?></td></tr>
										<tr>						    <td>エレベーター				</td><td><?php echo $facility_7 ?></td></tr>
										<tr>						    <td>敷地内ゴミ置き場			</td><td><?php echo $facility_8 ?></td></tr>
										<tr>						    <td>宅配ボックス				</td><td><?php echo $facility_9 ?></td></tr>
										<tr>						    <td>オートロック				</td><td><?php echo $facility_10 ?></td></tr>
										<tr>						    <td>バルコニー					</td><td><?php echo $facility_11 ?></td></tr>
										<tr>						    <td>駐輪場						</td><td><?php echo $facility_12 ?></td></tr>
										<tr>						    <td>バイク置き場				</td><td><?php echo $facility_13 ?></td></tr>
										<tr>						    <td>駐車場						</td><td><?php echo $facility_14 ?></td></tr>
										<tr>						    <td>防犯カメラ					</td><td><?php echo $facility_15 ?></td></tr>
									</table>
								</dd>
							</dl>



						</div>
						<!-- 物件情報 ここまで -->
						
						<!-- 投資スキーム -->
						<div class="tab-pane" id="ContentC" style="padding: 10px;background-color: #fff;">
							<dl class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".1s">
								<dt>＜投資スキーム＞</dt>
								<dd style="text-align: center;"><img src="img/scheme1.png" width="80%"></dd>
								<dd>
									<b>オンラインで資金お預かり<br>不動産を運用して生じた利益から配当</b><br><br>
									投資家様と匿名組合契約を締結し、優先出資金として資金をお預かりいたします。
								</dd>
								
								<dd style="text-align: center;"><img src="img/scheme2.png" width="80%"></dd>
								<dd>
									<b>優先出資者の元本の安全性を高める</b><br><br>
									当社がプロジェクトの全体20%を出資することで価格下落が生じた場合も20%までの下落であれば、投資家様の元本は守られる仕組みを採用<br>
									●　最大限の安全性を確保しました。<br>
									●　投資家の方々には優先出資者としてご参加頂き、当社が劣後出資金として出資します。
								</dd>
							</dl>
						</div>
						<!-- 投資スキーム ここまで -->

						<!-- リスク案内 -->
						<div class="tab-pane" id="ContentD" style="padding: 10px;background-color: #fff;height: 100vh;">
							<dl class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".1s">
								<h4>リスク案内</h4>
								<dt><strong>元本リスク</strong></dt>
								<dd>
									<p>
										本ファンドは、出資法により元本保証をするものではありません。<br>
										不動産市場の要因によって不動産価値が下落した場合等、元本が損失する恐れがあります。
									</p>
								</dd>

								<dt><strong>流動性リスク</strong></dt>
								<dd>
									<p>
										不動産市場の要因により想定した時期・条件で売却できない場合、収益に悪影響を与える可能性があります。
									</p>
								</dd>

								<dt><strong>不動産リスク</strong></dt>
								<dd>
									<p>
										不動産市場の要因により空室が多発した場合、想定の分配金に満たない可能性があります。
									</p>
								</dd>

								<dt><strong>法規制リスク</strong></dt>
								<dd>
									<p>
										法規制・税法が変更された場合、収益の減少または費用の増加により分配金が減少する恐れがあります。
									</p>
								</dd>
							</dl>
						</div>
						<!-- リスク説明 ここまで -->

						<!-- 添付書類 -->
						<div class="tab-pane" id="ContentE" style="padding: 10px;background-color: #fff;height: 100vh;border: 1px solid #666666;">
							<dl class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".1s">
								<dt>＜添付書類＞</dt>
								<dd>
									<ul>
										<li><a href="" target="_blank">図面</a></li>
										<li><a href="" target="_blank">不動産調査報告書概要</a></li>
										<li><a href="" target="_blank">管理規約</a></li>
									</ul>
								</dd>
							</dl>
						</div>
						<!-- 添付書類 ここまで -->

					</div>
					<!-- タブ ここまで -->
				</div>
				<!-- 商品詳細 タブエリア ここまで --> 
                            </div>
                        </div>
                    </div>
                    <!-- End 詳細エリア -->






                    
                    


					<!-- 右カラム2 -->
                    <div class="col-md-4">
						<div class="wow fadeIn" data-wow-duration=".3" data-wow-delay="2s">
                            <div class="s-plan-v1 g-text-center--xs g-bg-color--white g-padding-y-20--xs">
								
                                <?php if(isset($_SESSION[SESSION_LOGIN_USER_INFO])) { ?>

									<div style="margin-bottom: 20px;">
										<?php if (FUND_STATUS_CODE_NOW_INVITING == $fund_status_code) { ?>
											<button type="button" class="btn-block s-btn s-btn--dark-bg g-radius--10 g-padding-x-50--xs" style="padding: 10px 0;width: 80%;margin-bottom: 10px;" onclick="window.open().location.href='<?php echo URL_PROJECTS_PAGE.$fund_id."/template/0000100001.pdf" ?>'">契約成立前交付書面</button>
											<button type="button" class="btn-block s-btn s-btn--dark-bg g-radius--10 g-padding-x-50--xs" style="padding: 10px 0;width: 80%;margin-bottom: 10px;" onclick="window.open().location.href='<?php echo URL_PROJECTS_PAGE.$fund_id."/template/0000100008.pdf" ?>'">電子取引業務に係る重要事項</button>
											<button type="button" class="btn-block s-btn s-btn--dark-bg g-radius--10 g-padding-x-50--xs" style="padding: 10px 0;width: 80%;margin-bottom: 10px;" onclick="window.open().location.href='<?php echo URL_COOLINGOFF_PAGE ?>'">クーリングオフについて</button>
											
											<button type="button" class="btn-block s-btn s-btn--pinky-bg g-radius--50 g-padding-x-50--xs" style="padding: 15px 0;width: 80%;" onclick="location.href='<?php echo URL_INVESTMENT_INPUT."?".GET_PARAM_INDEX_FUND_ID."=".$fund_id ?>'">この商品に出資する</button>
										<?php } ?>
										<p><b>投資可能金額　10,000円 ～</b></p>
									</div>

								<div style="overflow: hidden;width: 94%;margin: 20px auto;">
								
									<div class="col-xs-12 img-rounded psimulator">
										<form id="form" name="simulator" method="post" action="." enctype="multipart/form-data" style="margin: 0;">

											<input type="hidden" id="<?php echo HIDDEN_ID_000000010 ?>" name="<?php echo HIDDEN_ID_000000010 ?>" value="">
											<input type="hidden" id="<?php echo HIDDEN_ID_000000030 ?>" name="<?php echo HIDDEN_ID_000000030 ?>" value="<?php echo $fund_id ?>">
											<!--シミュレーション条件-->
											<input type="hidden" id="low_kin" value="<?php echo ($min_investment_amount / 10000) ?>"> <!--最低投資額-->
											<input type="hidden" id="max_kin" value="<?php echo ($max_loan_amount_total / 10000) ?>"> <!--上限投資額-->
											<input type="hidden" id="riritsu" value="<?php echo ($target_yield)                  ?>"> <!--利回り-->
											<input type="hidden" id="kaisu"   value="<?php echo ($remaining_time_day)            ?>"> <!--運用期間-->
											<!--条件 ここまで-->

											<div class="col-xs-12"><b>出資シミュレーション</b></div>
											<div class="col-xs-12" style="text-align: left;font-size: 13px;padding: 5px 0 0 0;">出資金額をご入力いただくことで運用試算をすることができます。</div>
											<div class="col-xs-12 sim_input" style="margin-bottom: 10px;text-align: center;font-weight: bold;"><input type="text" class="validate[custom[onlyNumberSp],min[<?php echo ($min_investment_amount / 10000) ?>],max[<?php echo ($max_loan_amount_total / 10000) ?>]]" id="simulator_input" oninput="Add()" style="padding-right: 10px;" /> 万円</div>

											<table id="sim_kekka-table">
												<tr><td style="width: 50%;font-size: 14px;text-align: left;text-indent: 20px;">税引前収益</td><td style="width: 50%;"><input class="kekka_text101" id="kekka_t1" readonly />円</td></tr>
												<tr><td style="width: 50%;font-size: 14px;text-align: left;text-indent: 20px;">△源泉徴収税</td><td style="width: 50%;"><input class="kekka_text101" id="kekka_t2" readonly />円</td></tr>
											</table>


											<div class="col-xs-12" style="text-align: left;font-size: 13px;margin-top: 10px;padding: 10px;background-color: #fff;">
												※シミュレーションの結果は利益が生ずることが確実であることを保証するものではございませんのでご注意下さい。<br>
												(2013年1月～2037年12月までの△源泉徴収税には、<a href="https://www.nta.go.jp/taxes/tetsuzuki/shinsei/annai/gensen/fukko/index.htm" target="_blank">復興特別所得税</a>が含まれます。)
											</div>
										</form> <!--simulator end-->
									</div>

								</div>


								<?php
								} else { ?>

									<button type="button" class="btn-block s-btn s-btn--orange-bg g-radius--50 g-padding-x-50--xs" style="padding: 15px 0;width: 80%;" onclick="location.href='<?php echo URL_REGISTRATION_PAGE ?>'">新規会員登録</button>

								<?php }	?>

                            </div>
                        </div>
                    </div>
                    <!-- End 右カラム2 -->


					<!-- ボタンエリア -->
                    <div class="col-md-12 col-xs-12 hidden-xs">
                        <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".3s">
                            <div class="g-text-center--xs g-padding-y-20--xs">

									<?php if (isset($_SESSION[SESSION_LOGIN_USER_INFO])) {
										if (FUND_STATUS_CODE_NOW_INVITING == $fund_status_code) { ?>
											<button type="button" class="btn-block s-btn s-btn--pinky-bg g-radius--50 g-padding-x-50--xs" style="padding: 15px 0;width: 80%;" onclick="location.href='<?php echo URL_INVESTMENT_INPUT."?".GET_PARAM_INDEX_FUND_ID."=".$fund_id ?>'">この商品に出資する</button>
									<?php }
									} else { ?>
									
									<p>はじめてご利用の方は、こちらから会員登録を行って下さい。</p>
									<button type="button" class="btn-block s-btn s-btn--orange-bg g-radius--50 g-padding-x-50--xs" style="padding: 15px 0;width: 80%;" onclick="location.href='<?php echo URL_REGISTRATION_PAGE ?>'">新規会員登録</button>

									<?php }	?>
				
                            </div>
                        </div>
                    </div>
                    <!-- End ボタンエリア -->


                </div>
            </div>
        </div>
        <!-- End Plan -->



<?php CommonTag::footer(); ?> <!-- フッター -->

<script src="../../js/keisan.js"></script>
<script src="../../js/jquery.1.8.2.min.js"></script>
<script src="../../js/circle-progress.js"></script>
<script src="../../js/header-sticky.min.js"></script>
<script src="../../js/wow.min.js"></script>
<script src="../slick/slick.js"></script>

<script type="text/javascript">
//<![CDATA[
function linkClick(eventId) {
	document.getElementById('<?php echo HIDDEN_ID_000000010 ?>').value = eventId;
	document.form.submit();
}
jQuery(document).ready(function(){
   jQuery("#form").validationEngine();
});

(function($) {
	$('.second.circle').circleProgress({
    value : <?php echo $investment_amount ?> / <?php echo $max_loan_amount_total ?>
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html(Math.floor(<?php echo $investment_amount ?> / <?php echo $max_loan_amount_total ?> * 100 * progress) + '<i>%</i>');
  });
})(jQuery);


//slick
$(function() {
	    $('.thumb-item').slick({
	        infinite: true,
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        arrows: false,
	        fade: true,
	        asNavFor: '.thumb-item-nav' //サムネイルのクラス名
	    });
	    $('.thumb-item-nav').slick({
	        infinite: true,
	        slidesToShow: 5,
	        slidesToScroll: 1,
	        asNavFor: '.thumb-item', //スライダー本体のクラス名
	        focusOnSelect: true,
	    });	
});


$(function() { 
    // show popupボタンクリック時の処理
    $('#show').click(function(e) {
        $('#popup, #coolingoff').show();
    });     
    // ポップアップのcloseボタンクリック時の処理
    $('#close, #coolingoff').click(function(e) {
        $('#popup, #coolingoff').hide();
    });     
});

//]]>
</script>

</body>
</html>
