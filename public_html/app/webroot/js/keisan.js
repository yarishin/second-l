// ページ表示時の処理
window.onload = function(){
    document.simulator.sim_kin1.value = document.simulator.low_kin.value;
    document.simulator.sim_kin2.value = addComma(document.simulator.max_kin.value);
    
    //最低投資額の取得と表示
    var exvalue = document.simulator.low_kin.value;
    document.simulator.simulator_input.value = exvalue;
    
	simulation();
}

// 計算ボタンクリック時の処理
function Add(){
	
	var amount = document.simulator.simulator_input.value;
	
	// 整数チェック
	if(!amount.match(/^-?[0-9]+$/)){
		return false;
	}
	// 最小値チェック
	if (parseInt(document.simulator.low_kin.value) > parseInt(amount)) {
		return false;
	}
	// 最大値チェック
	if (parseInt(document.simulator.max_kin.value) < parseInt(amount)) {
		return false;
	}
	simulation();
}

function simulation() {

    //金額の取得
	var kingaku = document.simulator.simulator_input.value * 10000;
	
	//利回り
	var t_ritsu = document.simulator.riritsu.value / 100;           // trust
	var b_ritsu = 0.0003;						// 銀行
	
	//回数の取得
	var kai = document.simulator.kaisu.value / 365;          	// 年数に直す
	
	//源泉徴収税率
	var gensen = 0.2042;
	
	
	
	
	//TrustLending
	var kekka_t1 = parseInt(kingaku * t_ritsu * kai);		//税引前
	var kekka_t2 = parseInt(kingaku * t_ritsu * kai * gensen);	//源泉
	var kekka_t3 = parseInt(kekka_t1 - kekka_t2);			//収益
	
	
	//銀行
	var kekka_b1 = parseInt(kingaku * b_ritsu * kai);		//税引前
	var kekka_b2 = parseInt(kingaku * b_ritsu * kai * gensen);	//源泉
	var kekka_b3 = parseInt(kekka_b1 - kekka_b2);			//収益
	

	
	// 結果表示
	
	//TrustLending
	document.simulator.kekka_t1.value = addComma(kekka_t1);
	document.simulator.kekka_t2.value = addComma(kekka_t2);
	document.simulator.kekka_t3.value = addComma(kekka_t3);
	
	
	//銀行
	document.simulator.kekka_b1.value = addComma(kekka_b1);
	document.simulator.kekka_b2.value = addComma(kekka_b2);
	document.simulator.kekka_b3.value = addComma(kekka_b3);
}

// カンマ
function addComma(value){
	value = String(value);
	var i;
	for(i = 0; i < value.length/3; i++){
		value = value.replace(/^([+-]?\d+)(\d\d\d)/,"$1,$2");
	}
	return value;
}
