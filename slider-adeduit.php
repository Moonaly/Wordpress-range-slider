/*Range Slide - from austmoney*/
function range_slide($atts){
	$postid = get_the_ID();
	extract(shortcode_atts(array( 
		"postid" => get_the_ID()
		), $atts));
		$ret=""; ?>


<?php
	$currentpostid= get_the_ID();
	$currentlanguage= get_field('language',$currentpostid);
	if ($currentlanguage['value'] == "cn"){
		$title = "您的个人贷款计算器";
		$sliderdescription="Lorem ipsum dolor sit amet, consectetur adipiscing elit.";			
		$la="申请数额";
		$interest="利息";
		$month="1个月";
		$tp="期";
		$ra="申请总额";
		$tr=" 偿还总额";
		$apply="立即申请";

	} else if ($currentlanguage['value'] == "ms"){
		$title = "Kalkulator Pinjaman Anda";
		$sliderdescription="Lorem ipsum dolor sit amet, consectetur adipiscing elit.";			
		$la="Jumlah Pinjaman";
		$interest="Kadar Faedah";
		$month="1 Bulan";
		$tp="Tempoh";
		$ra="Jumlah Yang Dimohon";
		$tr=" Jumlah Pembayaran ";
		$apply="Memohon Sekarang";

	} else if ($currentlanguage['value'] == "th"){
		$title = "Your Personal Loan Calculator";
		$sliderdescription="Lorem ipsum dolor sit amet, consectetur adipiscing elit.";			
		$la="Loan Amount";
		$interest="Interest";
		$month="1 Month";
		$tp="Tenure Period";
		$ra="Requested Amount";
		$tr=" to repay";
		$apply="Apply For This Loan";

	} else {
		$title = "Your Personal Loan Calculator";
		$sliderdescription="Lorem ipsum dolor sit amet, consectetur adipiscing elit.";			
		$la="Loan Amount";
		$interest="Interest";
		$month="1 Month";
		$tp="Tenure Period";
		$ra="Requested Amount";
		$tr=" to repay";
		$apply="Apply For This Loan";
	}
?>

<div class="range_slider_wrap">
	<h2><?php echo $title;?></h2>
<!-- 	<p class="slider_desc"><?//php echo $sliderdescription;?></p> -->
	<div class="range-slider">
		<span class="label"><?php echo $la;?></span>
    	<span id="rs-bullet" class="rs-label">RM 300</span>
    	<input id="rs-range-line" class="rs-range" type="range" value="300" min="300" max="15000">
		<span id="rs-rangeline"></span>
    </div>
	<div class="box-minmax">
		<span>RM 300</span><span>RM 15,000</span>
	</div>
	<div class="container_rangeresult">
		<div class="range_result">
			<div class="col_5">
				<p>0%</p>
				<span><?php echo $interest;?></span>
			</div>
			<div class="col_4 tp">	
				<p><?php echo $month;?></p>
				<span><?php echo $tp;?></span>	
			</div>
			<div class="col_4">
				<p>RM <span id="total_amount">300</span></p>
				<span><?php echo $ra;?></span>
			</div>
		</div>
	</div>
	<div class="repay text-center"><span class="theme_color">RM <span id="requested_amount">300 </span></span>&nbsp;<span class="ml-2"> <?php echo $tr;?></span></div>
			<?php 
			$upload_dir = wp_get_upload_dir(); 
		?>
	<div class="apply_btn"><a href="https://app.jomtunai.com" class="btn_apply"><?php echo $apply;?></a><img class="px-2" src="<?php echo $upload_dir['baseurl']; ?>/2022/10/Icon-arrow-right.png"></div>
</div>

<script>
//Range Slider
var rangeSlider = document.getElementById("rs-range-line");
var rangeBullet = document.getElementById("rs-bullet");
var rsrangeline = document.getElementById("rs-rangeline");
var requestedAmount = document.getElementById("requested_amount");
var totalAmount = document.getElementById("total_amount");
var rangeWidth = document.getElementById("range_slide_w");

rangeSlider.addEventListener("input", showSliderValue, false);

	
function showSliderValue() {
	
// 	rangeBullet.innerHTML = "RM" + rangeSlider.value;
// 	requestedAmount.innerHTML = rangeSlider.value;
	
	var rangeBulletNum = rangeSlider.value;
	var requestedAmountNum = rangeSlider.value;	
	
	var totalPaid = (rangeSlider.value * 1);
	var bulletPosition = ((rangeSlider.value - 300) /(rangeSlider.max - 300));
	if(jQuery (window).width()<768){
		rangeBullet.style.left = ((bulletPosition * 100 * 158)/168) + "%"; 	
		rsrangeline.style.width = ((bulletPosition * 100 * 158)/168) + "%"; 	
	}else{
		rangeBullet.style.left = ((bulletPosition * 100 * 235)/240) + "%"; 	
		rsrangeline.style.width = ((bulletPosition * 100 * 235)/240) + "%"; 	
	}	
	rangeBullet.innerHTML = "RM" + totalPaid.toLocaleString("en-US");
	requestedAmount.innerHTML = totalPaid.toLocaleString("en-US");
	totalAmount.innerHTML = "" +totalPaid.toLocaleString("en-US");
}

// loanamountlbl.innerText = "RM" + actualLoanAmount.toLocaleString("en-US");	
	
</script>
<?php
	return $ret;
}
add_shortcode('range_slide','range_slide');
/*********End Range Slide**********/