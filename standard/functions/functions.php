<?php
function replace_string($string,$replacewith,$replacepart){ 
	$R = str_replace($replacepart,$replacewith,$string);
	return $R;
}

function diff_days_of_dates($date){ 
	$now = time(); // or your date as well
	$your_date = strtotime($date);
	$datediff = $now - $your_date;
	$dif = floor($datediff / (60 * 60 * 24));
	return $dif;
}
function nice_number($n,$Type=NULL) {
		if($Type == 'format'){
			// first strip any formatting;
			$n = (0+str_replace(",", "", $n));
			// is this a number?
			if (!is_numeric($n)) return false;
			// now filter it;
			if ($n >= 1000000000000) return round(($n/1000000000000), 1).'T';
			elseif ($n >= 1000000000) return round(($n/1000000000), 1).'B';
			elseif ($n >= 1000000) return round(($n/1000000), 1).'M';
			elseif ($n >= 1000) return round(($n/1000), 1).'K';
			elseif ($n < 1000) return round(($n), 1);
			return number_format($n);
		}else{
			// first strip any formatting;
			$n = (0+str_replace(",", "", $n));
			// is this a number?
			if (!is_numeric($n)) return false;
			// now filter it;
			if ($n >= 1000000000000) return round(($n/1000000000000), 1);
			elseif ($n >= 1000000000) return round(($n/1000000000), 1);
			elseif ($n >= 1000000) return round(($n/1000000), 1);
			elseif ($n >= 1000) return round(($n/1000), 1);
			elseif ($n < 1000) return round(($n), 1);
			return number_format($n);
		}
}
function userBusinessName(){
	global $con_MAIN;
	$UserCertficationID = $_SESSION['certification_id'];
	$Q_Sub = 'SELECT  `Legal Business Name` from sbdvbe  WHERE `Certification ID`= '.$UserCertficationID.'';
	$Q_SubR = mysqli_query($con_MAIN,$Q_Sub);
	$Name = mysqli_fetch_assoc($Q_SubR);
	$BusinessName = $Name['TotalAmount'];
	return $BusinessName;
}
// global $UserdID, $UserCertID, $UserFirmID;

function cashFlowLast($Year){
	global $con_MAIN;
	$UserFirmID = $_SESSION['dbe_firm_id'];
	$UserVendorID = $_SESSION['vendor_id'];
	$UserCertificationID = $_SESSION['certification_id'];
	if($UserFirmID>0){
		$Q_Prime = 'SELECT  SUM(award_amount) AS TotalAmount  from cpw_main  WHERE dbe_firm_id= '.$UserFirmID.' AND YEAR(award_date) ='.$Year.''; 
		$CheckPrimesR = mysqli_query($con_MAIN,$Q_Prime);
		$TotalPrimes = mysqli_fetch_assoc($CheckPrimesR);
		$TotalPrimes1 = $TotalPrimes['TotalAmount'];		
		
		$Q_Sub = 'SELECT  SUM(subcontractor_amount) AS TotalAmount from cpw_subcontractors  WHERE dbe_firm_id= '.$UserFirmID.'';
		$CheckSubR = mysqli_query($con_MAIN,$Q_Sub);
		$TotalSub = mysqli_fetch_assoc($CheckSubR);
		$TotalSub1 = $TotalSub['TotalAmount'];
		//echo $TotalPrimes1.' '.$TotalSub1;
		$Total = $TotalPrimes1+$TotalSub1;
	}else{
		$Total = 0;
	}	
	return $Total;
}
function totalContractRevenue(){
	global $con_MAIN;
	$UserFirmID = $_SESSION['dbe_firm_id'];
	$UserVendorID = $_SESSION['vendor_id'];
	$UserCertificationID = $_SESSION['certification_id'];
	if($UserFirmID>0 && ($UserVendorID==0 && $UserCertificationID==0)){

		$Q_Prime = 'SELECT  SUM(award_amount) AS TotalAmount  from cpw_main  WHERE dbe_firm_id= '.$UserFirmID.' AND award_date = DATE_SUB( CURRENT_DATE(), INTERVAL 18 MONTH )'; 
		$CheckPrimesR = mysqli_query($con_MAIN,$Q_Prime);
		$TotalPrimes = mysqli_fetch_assoc($CheckPrimesR);
		$TotalPrimes1 = $TotalPrimes['TotalAmount'];		
		
		$Q_Sub = 'SELECT  SUM(subcontractor_amount) AS TotalAmount from cpw_subcontractors  WHERE dbe_firm_id= '.$UserFirmID.'';
		$CheckSubR = mysqli_query($con_MAIN,$Q_Sub);
		$TotalSub = mysqli_fetch_assoc($CheckSubR);
		$TotalSub1 = $TotalSub['TotalAmount'];
		
		if($TotalPrimes1>0 && $TotalPrimes1>$TotalSub1){
			//$Total = number_format($TotalPrimes1/1000000,1);
			$Total = $TotalPrimes1;
			return $Total;
		}else{
			//$Total = number_format($TotalSub1/1000000,1);
			$Total = $TotalSub1;
			return $Total;
		}
	}elseif($UserFirmID>0 && ($UserVendorID>0 || $UserCertificationID>0)){
		
		$Q_Prime = 'SELECT  SUM(award_amount) AS TotalAmount  from cpw_main  WHERE dbe_firm_id= '.$UserFirmID.' AND award_date = DATE_SUB( CURRENT_DATE(), INTERVAL 18 MONTH )';
		$CheckPrimesR = mysqli_query($con_MAIN,$Q_Prime);

		$TotalPrimes = mysqli_fetch_assoc($CheckPrimesR);
		$TotalPrimes1 = $TotalPrimes['TotalAmount'];		
		
		$Q_Sub = 'SELECT SUM(subcontractor_amount) AS TotalAmount from cpw_subcontractors  WHERE dbe_firm_id= '.$UserFirmID.'';
		$CheckSubR = mysqli_query($con_MAIN,$Q_Sub);
		$TotalSub = mysqli_fetch_assoc($CheckSubR);
		$TotalSub1 = $TotalSub['TotalAmount'];
		
		if($TotalPrimes1>0 && $TotalPrimes1>$TotalSub1){
			$Total = $TotalPrimes1; 
		}else{
			$Total = $TotalSub1; 
		}
		/////////////////
		// Get SCPR Records
		if($UserVendorID>0){
			$Check_Scpr = 'SELECT SUM(`Award Total`) AS TotalAmount from scprs_main  WHERE `Vendor ID`= '.$UserVendorID.'';
		}elseif($UserCertificationID>0){
			$Check_Scpr = 'SELECT SUM(`Award Total`) AS TotalAmount from scprs_main  WHERE `Certification ID`= '.$UserCertificationID.'';
		}
		$CheckScprR = mysqli_query($con_MAIN,$Check_Scpr);
		$TotalScpr = mysqli_fetch_assoc($CheckScprR);
		$TotalScprS = $TotalScpr['TotalAmount'];
		
		$GrandTotal = $Total+$TotalScprS;
		//return number_format($GrandTotal/1000000,1);
		return $GrandTotal;
	}elseif($UserVendorID>0 || $UserCertificationID>0){ 
		// Get SCPR Records
		if($UserVendorID>0){
			$Check_Scpr = 'SELECT SUM(`Award Total`) AS TotalAmount from scprs_main  WHERE `Vendor ID`= '.$UserVendorID.'';
		}elseif($UserCertificationID>0){
			$Check_Scpr = 'SELECT SUM(`Award Total`) AS TotalAmount from scprs_main  WHERE `Certification ID`= '.$UserCertificationID.'';
		}
		$CheckScprR = mysqli_query($con_MAIN,$Check_Scpr);
		$TotalScpr = mysqli_fetch_assoc($CheckScprR);
		$TotalScprS = $TotalScpr['TotalAmount'];
		
		$GrandTotal = $TotalScprS;
		//return number_format($GrandTotal/1000,1);
		return $GrandTotal;
	}else{
		return 0;
	}
}

function totalPrimeContracts(){
	global $con_MAIN;
	$UserFirmID = $_SESSION['dbe_firm_id'];
	$UserVendorID = $_SESSION['vendor_id'];
	$UserCertificationID = $_SESSION['certification_id'];
	
	if($UserFirmID>0 && ($UserVendorID==0 && $UserCertificationID==0)){
	$Q_Prime = 'SELECT  COUNT(contract_number) AS TotalPrimeContracts from cpw_main  WHERE dbe_firm_id = '.$UserFirmID.' AND award_date = DATE_SUB( CURRENT_DATE(), INTERVAL 18 MONTH )'; 
	$CheckPrimesR = mysqli_query($con_MAIN,$Q_Prime);
	$TotalPrimes = mysqli_fetch_assoc($CheckPrimesR);
	$TotalPrimes1 = $TotalPrimes['TotalPrimeContracts'];
	return $TotalPrimes1;
	}elseif($UserFirmID>0 && ($UserVendorID>0 || $UserCertificationID>0)){
		// Get AWT Records
		$Q_Prime = 'SELECT  COUNT(contract_number) AS TotalPrimeContracts from cpw_main  WHERE dbe_firm_id = '.$UserFirmID.' AND award_date = DATE_SUB( CURRENT_DATE(), INTERVAL 18 MONTH )'; 
		$CheckPrimesR = mysqli_query($con_MAIN,$Q_Prime);
		$TotalPrimes = mysqli_fetch_assoc($CheckPrimesR);
		$TotalPrimes1 = $TotalPrimes['TotalPrimeContracts'];
		//////////////
		// Get SCPR Records
		if($UserVendorID>0){
			$Check_Scpr = 'SELECT SUM(TotalContracts) TotalContracts FROM ( SELECT  COUNT(`Contract ID`) AS TotalContracts from scprs_main  WHERE `Vendor ID`= '.$UserVendorID.' AND DATE_SUB( CURRENT_DATE(), INTERVAL 18 MONTH ) GROUP BY `Purchase Order ID`, `Certification ID`, `Vendor ID` ) AS TotalContracts';
		}elseif($UserCertificationID>0){
			$Check_Scpr = 'SELECT SUM(TotalContracts) TotalContracts FROM ( SELECT  COUNT(`Contract ID`) AS TotalContracts from scprs_main  WHERE `Certification ID`= '.$UserCertificationID.' AND DATE_SUB( CURRENT_DATE(), INTERVAL 18 MONTH ) GROUP BY `Purchase Order ID`, `Certification ID`, `Vendor ID` ) AS TotalContracts';
		} 
		$CheckSCPrR = mysqli_query($con_MAIN,$Check_Scpr);
		$TotalSCPRs = mysqli_fetch_assoc($CheckSCPrR);
		$TotalSCPRs1 = $TotalSCPRs['TotalContracts'];
		
		if($TotalSCPRs1 == 0){
			if($UserVendorID>0){
			$Check_Scpr = 'SELECT SUM(TotalContracts) TotalContracts FROM ( SELECT  COUNT(`Contract ID`) AS TotalContracts from scprs_main  WHERE `Vendor ID`= '.$UserVendorID.' AND DATE_SUB( CURRENT_DATE(), INTERVAL 18 MONTH ) GROUP BY `Purchase Order ID`, `Certification ID`, `Vendor ID` ) AS TotalContracts';
			}elseif($UserCertificationID>0){
				$Check_Scpr = 'SELECT SUM(TotalContracts) TotalContracts FROM ( SELECT  COUNT(`Contract ID`) AS TotalContracts from scprs_main  WHERE `Certification ID`= '.$UserCertificationID.' AND DATE_SUB( CURRENT_DATE(), INTERVAL 18 MONTH ) GROUP BY `Purchase Order ID`, `Certification ID`, `Vendor ID` ) AS TotalContracts';
			}  
			$CheckSCPrR = mysqli_query($con_MAIN,$Check_Scpr);
			$TotalSCPRs = mysqli_fetch_assoc($CheckSCPrR);
			$TotalSCPRs1 = $TotalSCPRs['TotalContracts'];
		}
		
		$GrandTotal = $TotalSCPRs1+$TotalPrimes1;
		return $GrandTotal;
	}elseif($UserVendorID>0 || $UserCertificationID>0){ 
		// Get SCPR Records
		if($UserVendorID>0){
			$Check_Scpr = 'SELECT SUM(TotalContracts) TotalContracts FROM ( SELECT  COUNT(`Contract ID`) AS TotalContracts from scprs_main  WHERE `Vendor ID`= '.$UserVendorID.' AND DATE_SUB( CURRENT_DATE(), INTERVAL 18 MONTH ) GROUP BY `Purchase Order ID`, `Certification ID`, `Vendor ID` ) AS TotalContracts';
		}elseif($UserCertificationID>0){
			$Check_Scpr = 'SELECT SUM(TotalContracts) TotalContracts FROM ( SELECT  COUNT(`Contract ID`) AS TotalContracts from scprs_main  WHERE `Certification ID`= '.$UserCertificationID.' AND DATE_SUB( CURRENT_DATE(), INTERVAL 18 MONTH ) GROUP BY `Purchase Order ID`, `Certification ID`, `Vendor ID` ) AS TotalContracts';
		}  
		$CheckSCPrR = mysqli_query($con_MAIN,$Check_Scpr);
		$TotalSCPRs = mysqli_fetch_assoc($CheckSCPrR);
		$TotalSCPRs1 = $TotalSCPRs['TotalContracts'];
		if($TotalSCPRs1 == 0){
			if($UserVendorID>0){
			$Check_Scpr = 'SELECT SUM(TotalContracts) TotalContracts FROM ( SELECT  COUNT(`Contract ID`) AS TotalContracts from scprs_main  WHERE `Vendor ID`= '.$UserVendorID.' AND DATE_SUB( CURRENT_DATE(), INTERVAL 18 MONTH ) GROUP BY `Purchase Order ID`, `Certification ID`, `Vendor ID` ) AS TotalContracts';
			}elseif($UserCertificationID>0){
				$Check_Scpr = 'SELECT SUM(TotalContracts) TotalContracts FROM ( SELECT  COUNT(`Contract ID`) AS TotalContracts from scprs_main  WHERE `Certification ID`= '.$UserCertificationID.' AND DATE_SUB( CURRENT_DATE(), INTERVAL 18 MONTH ) GROUP BY `Purchase Order ID`, `Certification ID`, `Vendor ID` ) AS TotalContracts';
			}  
			$CheckSCPrR = mysqli_query($con_MAIN,$Check_Scpr);
			$TotalSCPRs = mysqli_fetch_assoc($CheckSCPrR);
			$TotalSCPRs1 = $TotalSCPRs['TotalContracts'];
		}
		
		$GrandTotal = $TotalSCPRs1;
		return $GrandTotal;
	}else{
		return 0;
	}
}
function totalSubContracts(){
	global $con_MAIN;
	$UserFirmID = $_SESSION['dbe_firm_id'];
	$UserVendorID = $_SESSION['vendor_id'];
	$UserCertificationID = $_SESSION['certification_id'];
	if($UserFirmID>0){
	$Q_Prime = 'SELECT  COUNT(contract_number) AS TotalSubContracts from cpw_subcontractors  WHERE dbe_firm_id = '.$UserFirmID.''; 
	$CheckPrimesR = mysqli_query($con_MAIN,$Q_Prime);
	$TotalPrimes = mysqli_fetch_assoc($CheckPrimesR);
	$TotalSubs1 = $TotalPrimes['TotalSubContracts'];
	return $TotalSubs1;
	}else{
		return 0;
	}
}

function awardingAgencies(){
	global $con_MAIN;
	$UserFirmID = $_SESSION['dbe_firm_id'];
	$UserVendorID = $_SESSION['vendor_id'];
	$UserCertificationID = $_SESSION['certification_id'];
	if($UserVendorID>0 || $UserCertificationID>0){
		if($UserVendorID>0){
			$Check_Scpr = "SELECT count(DISTINCT `Business Unit`) AS business_unit FROM scprs_main WHERE `Vendor ID`= ".$UserVendorID."";
		}elseif($UserCertificationID>0){
			$Check_Scpr = "SELECT count(DISTINCT `Business Unit`) AS business_unit FROM scprs_main WHERE `Certification ID`= ".$UserCertificationID."";
		}
		$CheckSCPrR = mysqli_query($con_MAIN,$Check_Scpr);
		$TotalSCPRs = mysqli_fetch_object($CheckSCPrR);
		$totalDistinct = $TotalSCPRs->business_unit;
		return $totalDistinct;
	}else{
		return 0;
	}
}

function businessIndexRating(){
	global $con_MAIN;
	$UserdID = $_SESSION['user_id'];
	$Query = "SELECT business_index_rating FROM user where user_id = ".$UserdID."";
	$query_R1 = mysqli_query($con_MAIN,$Query);
	$res = mysqli_fetch_object($query_R1);
	$rating = $res->business_index_rating;
	return $rating;
}
function newBusinessOpp(){ 
	global $con_MAIN;
	$UserFirmID = $_SESSION['dbe_firm_id'];
	$UserVendorID = $_SESSION['vendor_id'];
	$UserCertificationID = $_SESSION['certification_id'];
	if($UserFirmID>0 && ($UserVendorID==0 && $UserCertificationID==0)){
	$Q_Prime = 'SELECT  COUNT(contract_number) AS TotalOops  from cpw_main  WHERE dbe_firm_id= '.$UserFirmID.' AND MONTH(bid_open_date) = '.date('m').''; 
	$CheckPrimesR = mysqli_query($con_MAIN,$Q_Prime);
	$TotalPrimes = mysqli_fetch_assoc($CheckPrimesR);
	$TotalSubs1 = $TotalPrimes['TotalOops'];
	return $TotalSubs1;
	}elseif($UserFirmID>0 && ($UserVendorID>0 || $UserCertificationID>0)){
		// Get AWT Records
		$Q_Prime = 'SELECT  COUNT(contract_number) AS TotalOops  from cpw_main  WHERE dbe_firm_id= '.$UserFirmID.' AND MONTH(bid_open_date) = '.date('m').''; 
		$CheckPrimesR = mysqli_query($con_MAIN,$Q_Prime);
		$TotalPrimes = mysqli_fetch_assoc($CheckPrimesR);
		$TotalSubs1 = $TotalPrimes['TotalOops'];
		//////////////
		// Get SCPR Records
		$CurrentMonth = date('n');
		$CurrentYear = date('Y');
		if($UserVendorID>0){
			$Check_Scpr = 'SELECT SUM(TotalContracts) TotalContracts FROM ( SELECT  COUNT(`Contract ID`) AS TotalContracts from scprs  WHERE `Vendor ID`= '.$UserVendorID.' AND DATE_FORMAT(STR_TO_DATE(`Transaction Date`,"%m/%d/%Y"),"%Y-%m-%d") BETWEEN "'.$CurrentYear.'-'.$CurrentMonth.'-1" AND "'.$CurrentYear.'-'.$CurrentMonth.'-31" GROUP BY `Purchase Order ID`, `Certification ID`, `Vendor ID` ) AS TotalContracts';
		}elseif($UserCertificationID>0){
			$Check_Scpr = 'SELECT SUM(TotalContracts) TotalContracts FROM ( SELECT  COUNT(`Contract ID`) AS TotalContracts from scprs  WHERE `Certification ID`= '.$UserCertificationID.' AND DATE_FORMAT(STR_TO_DATE(`Transaction Date`,"%m/%d/%Y"),"%Y-%m-%d") BETWEEN "'.$CurrentYear.'-'.$CurrentMonth.'-1" AND "'.$CurrentYear.'-'.$CurrentMonth.'-31" GROUP BY `Purchase Order ID`, `Certification ID`, `Vendor ID` ) AS TotalContracts';
		}
		$CheckSCPrR = mysqli_query($con_MAIN,$Check_Scpr);
		$TotalSCPRs = mysqli_fetch_assoc($CheckSCPrR);
		$TotalSCPRs1 = $TotalSCPRs['TotalContracts'];
		if($TotalSCPRs1 == 0){
			if($UserVendorID>0){
			$Check_Scpr = 'SELECT SUM(TotalContracts) TotalContracts FROM ( SELECT  COUNT(`Contract ID`) AS TotalContracts from scprs  WHERE `Vendor ID`= '.$UserVendorID.' AND DATE_FORMAT(STR_TO_DATE(`Entered Date`,"%m/%d/%Y"),"%Y-%m-%d") BETWEEN "'.$CurrentYear.'-'.$CurrentMonth.'-1" AND "'.$CurrentYear.'-'.$CurrentMonth.'-31" GROUP BY `Purchase Order ID`, `Certification ID`, `Vendor ID` ) AS TotalContracts';
			}elseif($UserCertificationID>0){
				$Check_Scpr = 'SELECT SUM(TotalContracts) TotalContracts FROM ( SELECT  COUNT(`Contract ID`) AS TotalContracts from scprs  WHERE `Certification ID`= '.$UserCertificationID.' AND DATE_FORMAT(STR_TO_DATE(`Entered Date`,"%m/%d/%Y"),"%Y-%m-%d") BETWEEN "'.$CurrentYear.'-'.$CurrentMonth.'-1" AND "'.$CurrentYear.'-'.$CurrentMonth.'-31" GROUP BY `Purchase Order ID`, `Certification ID`, `Vendor ID` ) AS TotalContracts';
			}
			$CheckSCPrR = mysqli_query($con_MAIN,$Check_Scpr);
			$TotalSCPRs = mysqli_fetch_assoc($CheckSCPrR);
			$TotalSCPRs1 = $TotalSCPRs['TotalContracts'];
		}
		
		$GrandTotal = $TotalSCPRs1+$TotalSubs1;
		return $GrandTotal;
	}elseif($UserVendorID>0 || $UserCertificationID>0){  
		//////////////
		// Get SCPR Records
		$CurrentMonth = date('n');
		$CurrentYear = date('Y');
		if($UserVendorID>0){
			$Check_Scpr = 'SELECT SUM(TotalContracts) TotalContracts FROM ( SELECT  COUNT(`Contract ID`) AS TotalContracts from scprs  WHERE `Vendor ID`= '.$UserVendorID.' AND DATE_FORMAT(STR_TO_DATE(`Transaction Date`,"%m/%d/%Y"),"%Y-%m-%d") BETWEEN "'.$CurrentYear.'-'.$CurrentMonth.'-1" AND "'.$CurrentYear.'-'.$CurrentMonth.'-31" GROUP BY `Purchase Order ID`, `Certification ID`, `Vendor ID` ) AS TotalContracts';
		}elseif($UserCertificationID>0){
			$Check_Scpr = 'SELECT SUM(TotalContracts) TotalContracts FROM ( SELECT  COUNT(`Contract ID`) AS TotalContracts from scprs  WHERE `Certification ID`= '.$UserCertificationID.' AND DATE_FORMAT(STR_TO_DATE(`Transaction Date`,"%m/%d/%Y"),"%Y-%m-%d") BETWEEN "'.$CurrentYear.'-'.$CurrentMonth.'-1" AND "'.$CurrentYear.'-'.$CurrentMonth.'-31" GROUP BY `Purchase Order ID`, `Certification ID`, `Vendor ID` ) AS TotalContracts';
		}
		$CheckSCPrR = mysqli_query($con_MAIN,$Check_Scpr);
		$TotalSCPRs = mysqli_fetch_assoc($CheckSCPrR);
		$TotalSCPRs1 = $TotalSCPRs['TotalContracts'];
		
		if($TotalSCPRs1 == 0){
			if($UserVendorID>0){
			$Check_Scpr = 'SELECT SUM(TotalContracts) TotalContracts FROM ( SELECT  COUNT(`Contract ID`) AS TotalContracts from scprs  WHERE `Vendor ID`= '.$UserVendorID.' AND DATE_FORMAT(STR_TO_DATE(`Entered Date`,"%m/%d/%Y"),"%Y-%m-%d") BETWEEN "'.$CurrentYear.'-'.$CurrentMonth.'-1" AND "'.$CurrentYear.'-'.$CurrentMonth.'-31" GROUP BY `Purchase Order ID`, `Certification ID`, `Vendor ID` ) AS TotalContracts';
			}elseif($UserCertificationID>0){
				$Check_Scpr = 'SELECT SUM(TotalContracts) TotalContracts FROM ( SELECT  COUNT(`Contract ID`) AS TotalContracts from scprs  WHERE `Certification ID`= '.$UserCertificationID.' AND DATE_FORMAT(STR_TO_DATE(`Entered Date`,"%m/%d/%Y"),"%Y-%m-%d") BETWEEN "'.$CurrentYear.'-'.$CurrentMonth.'-1" AND "'.$CurrentYear.'-'.$CurrentMonth.'-31" GROUP BY `Purchase Order ID`, `Certification ID`, `Vendor ID` ) AS TotalContracts';
			}
			$CheckSCPrR = mysqli_query($con_MAIN,$Check_Scpr);
			$TotalSCPRs = mysqli_fetch_assoc($CheckSCPrR);
			$TotalSCPRs1 = $TotalSCPRs['TotalContracts'];
		}
		
		$GrandTotal = $TotalSCPRs1;
		if($GrandTotal == ''){$GrandTotal=0;}
		return $GrandTotal;
	}else{
		return 0;
	}
}


function totalTransactions($PurchaseOrderId){
	global $con_MAIN;
	$Check_Scpr = 'SELECT  COUNT(`Contract ID`) AS totalTransactions from scprs  WHERE `Purchase Order ID`= "'.$PurchaseOrderId.'"';
	$CheckSCPrR = mysqli_query($con_MAIN,$Check_Scpr);
	$TotalSCPRs = mysqli_fetch_assoc($CheckSCPrR);
	$TotalSCPRsC = $TotalSCPRs['totalTransactions'];
	return $TotalSCPRsC;
}
function totalTransaction_Amount($PurchaseOrderId){
	global $con_MAIN;
	$Check_Scpr = 'SELECT  SUM(`PO Line Total`) AS totalTransactionAmount from scprs  WHERE `Purchase Order ID`= "'.$PurchaseOrderId.'"';
	$CheckSCPrR = mysqli_query($con_MAIN,$Check_Scpr);
	$TotalSCPRs = mysqli_fetch_assoc($CheckSCPrR);
	$TotalSCPRsC = $TotalSCPRs['totalTransactionAmount'];
	return $TotalSCPRsC;
}
function awardTotal($PurchaseOrderId){
	global $con_MAIN;
	$Check_Scpr = 'SELECT  SUM(`Award Total`) AS awardTotal from scprs  WHERE `Purchase Order ID`= "'.$PurchaseOrderId.'"';
	$CheckSCPrR = mysqli_query($con_MAIN,$Check_Scpr);
	$TotalSCPRs = mysqli_fetch_assoc($CheckSCPrR);
	$TotalSCPRsC = $TotalSCPRs['awardTotal'];
	return $TotalSCPRsC;
}
function paginate_three($reload, $page, $tpages, $adjacents) {	
if($page<=0)  $page  = 1;
if($adjacents<=0) $adjacents = 4;

	$prevlabel = "&lsaquo; Previous";
	$nextlabel = "Next &rsaquo;";	
	$out = "<ul class='paging'>";	
	// previous
	if($page==1) {
		$out.= "<li class='paginationli the_basic_buttons  paginglis paginglis_previous'><a><span>" . $prevlabel . "</span></a>\n</li>";
	}
	elseif($page==2) {
		$out.= "<li class='paginationli the_basic_buttons  paginglis paginglis_previous'><a onclick=\"load_basic_practice(".$reload.")\">" . $prevlabel . "</a>\n</li>";
	}
	else {
		$out.= "<li class='paginationli the_basic_buttons  paginglis paginglis_previous'><a onclick=\"load_basic_practice(".($page-1).")\">" . $prevlabel . "</a>\n</li>";
	}	
	// first
	if($page>($adjacents+1)) {
		$out.= "<li class='paginationli'><a onclick=\"load_basic_practice(1)\">1</a>\n</li>";
	}	
	// interval
	if($page>($adjacents+2)) {
		$out.= "<li class='paginationli'><a>...\n</a></li>";
	}	
	// pages
	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
	$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$page) {
			$out.= "<li class='paginationli'><a class='active'><span class=\"current\">" . $i . "</span>\n</a></li>";
		}
		elseif($i==1) {
			$out.= "<li class='paginationli'><a onclick=\"load_basic_practice(".$i.")\">" . $i . "</a>\n</li>";
		}
		else {
			$out.= "<li class='paginationli'><a onclick=\"load_basic_practice(".$i.")\">" . $i . "</a>\n</li>";
		}
	}	
	// interval
	if($page<($tpages-$adjacents-1)) {
		$out.= "<li class='paginationli'><a>...\n</a></li>";
	}	
	// last
	if($page<($tpages-$adjacents)) {
		$out.= "<li class='paginationli'><a onclick=\"load_basic_practice(".$tpages.")\">" . $tpages . "</a></li>";
	}	
	// next
	if($page<$tpages) {
		$out.= "<li class='paginationli the_basic_buttons the_basic_buttons_next paginglis paginglis_next'><a onclick=\"load_basic_practice(".($page+1).")\">" . $nextlabel . "</a>\n</li>";
	}
	else {
		$out.= "<li class='paginationli the_basic_buttons the_basic_buttons_next paginglis paginglis_next'><a><span>" . $nextlabel . "</span>\n</a></li>";
	}	
	$out.= "</ul>";	
	return $out;
}
function paginate_five($reload, $page, $tpages, $adjacents) {	
if($page<=0)  $page  = 1;
if($adjacents<=0) $adjacents = 4;

	$prevlabel = "&lsaquo; Previous";
	$nextlabel = "Next &rsaquo;";	
	$out = "<ul class='paging'>";	
	// previous
	if($page==1) {
		$out.= "<li class='paginationli the_basic_buttons  paginglis paginglis_previous'><a><span>" . $prevlabel . "</span></a>\n</li>";
	}
	elseif($page==2) {
		$out.= "<li class='paginationli the_basic_buttons  paginglis paginglis_previous'><a onclick=\"load_basic_practice_bidwin(".$reload.")\">" . $prevlabel . "</a>\n</li>";
	}
	else {
		$out.= "<li class='paginationli the_basic_buttons  paginglis paginglis_previous'><a onclick=\"load_basic_practice_bidwin(".($page-1).")\">" . $prevlabel . "</a>\n</li>";
	}	
	// first
	if($page>($adjacents+1)) {
		$out.= "<li class='paginationli'><a onclick=\"load_basic_practice_bidwin(1)\">1</a>\n</li>";
	}	
	// interval
	if($page>($adjacents+2)) {
		$out.= "<li class='paginationli'><a>...\n</a></li>";
	}	
	// pages
	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
	$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$page) {
			$out.= "<li class='paginationli'><a class='active'><span class=\"current\">" . $i . "</span>\n</a></li>";
		}
		elseif($i==1) {
			$out.= "<li class='paginationli'><a onclick=\"load_basic_practice_bidwin(".$i.")\">" . $i . "</a>\n</li>";
		}
		else {
			$out.= "<li class='paginationli'><a onclick=\"load_basic_practice_bidwin(".$i.")\">" . $i . "</a>\n</li>";
		}
	}	
	// interval
	if($page<($tpages-$adjacents-1)) {
		$out.= "<li class='paginationli'><a>...\n</a></li>";
	}	
	// last
	if($page<($tpages-$adjacents)) {
		$out.= "<li class='paginationli'><a onclick=\"load_basic_practice_bidwin(".$tpages.")\">" . $tpages . "</a></li>";
	}	
	// next
	if($page<$tpages) {
		$out.= "<li class='paginationli the_basic_buttons the_basic_buttons_next paginglis paginglis_next'><a onclick=\"load_basic_practice_bidwin(".($page+1).")\">" . $nextlabel . "</a>\n</li>";
	}
	else {
		$out.= "<li class='paginationli the_basic_buttons the_basic_buttons_next paginglis paginglis_next'><a><span>" . $nextlabel . "</span>\n</a></li>";
	}	
	$out.= "</ul>";	
	return $out;
}
////////////////////////////////////////////
function bidWonLost(){
	global $con_MAIN;
	$UserFirmID = $_SESSION['dbe_firm_id'];
	$UserVendorID = $_SESSION['vendor_id'];
	$UserCertificationID = $_SESSION['certification_id'];
	
	
	// Get Prime COntracts
	if($UserFirmID>0){
	$Q_Prime = 'SELECT  COUNT(contract_number) AS TotalPrimeContracts from cpw_main  WHERE dbe_firm_id = '.$UserFirmID.''; 
	$CheckPrimesR = mysqli_query($con_MAIN,$Q_Prime);
	$TotalPrimes = mysqli_fetch_assoc($CheckPrimesR);
	$TotalPrimesC = $TotalPrimes['TotalPrimeContracts'];
	}else{
		$Q_Prime = '';
		$TotalPrimesC = 0;
	} 
	
	
	// Get Sub Contracts
	if($UserFirmID>0){
	$Q_Sub = 'SELECT  COUNT(contract_number) AS TotalSubContracts from cpw_subcontractors  WHERE dbe_firm_id = '.$UserFirmID.''; 
	$CheckSubR = mysqli_query($con_MAIN,$Q_Sub);
	$TotalSubs = mysqli_fetch_assoc($CheckSubR);
	$TotalSubsC = $TotalSubs['TotalSubContracts'];
	}else{
		$Q_Sub = '';
		$TotalSubsC = 0;
	} 
	
	
	// Get SCPRs
	if($UserVendorID!=0 || $UserCertificationID!=0){
	if($UserVendorID>0){
		$Check_Scpr = 'SELECT  COUNT(`Contract ID`) AS TotalContracts from scprs  WHERE `Vendor ID`= '.$UserVendorID.'';
	}elseif($UserCertificationID>0){
		$Check_Scpr = 'SELECT  COUNT(`Contract ID`) AS TotalContracts from scprs  WHERE `Certification ID`= '.$UserCertificationID.'';
	}
	$CheckSCPrR = mysqli_query($con_MAIN,$Check_Scpr);
	$TotalSCPRs = mysqli_fetch_assoc($CheckSCPrR);
	$TotalSCPRsC = $TotalSCPRs['TotalContracts'];
	}else{
		$Check_Scpr = 'VendorID And CertificationID both are 0';
		$TotalSCPRsC = 0;
	} 
	
	$TotalRows = $TotalPrimesC+$TotalSubsC+$TotalSCPRsC;
	$rand_number = rand(10,18);
	$BidWinFactor = $rand_number*0.01; 
	$Ncp  = $BidWinFactor*$TotalRows;
	if($Ncp == 0 || $TotalRows == 0){
		return 0;
	}
	$WinRate = $TotalRows/$Ncp;
	$BidWinRate = number_format($WinRate,2);
	return $BidWinRate;
}

?>