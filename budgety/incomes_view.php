<?php
// This script and data application were generated by AppGini 5.76
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/incomes.php");
	include("$currDir/incomes_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('incomes');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "incomes";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`incomes`.`income_id`" => "income_id",
		"if(`incomes`.`date`,date_format(`incomes`.`date`,'%m/%d/%Y'),'')" => "date",
		"IF(    CHAR_LENGTH(`clients1`.`client`), CONCAT_WS('',   `clients1`.`client`), '') /* Client */" => "client",
		"`incomes`.`amount`" => "amount"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`incomes`.`income_id`',
		2 => '`incomes`.`date`',
		3 => '`clients1`.`client`',
		4 => '`incomes`.`amount`'
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`incomes`.`income_id`" => "income_id",
		"if(`incomes`.`date`,date_format(`incomes`.`date`,'%m/%d/%Y'),'')" => "date",
		"IF(    CHAR_LENGTH(`clients1`.`client`), CONCAT_WS('',   `clients1`.`client`), '') /* Client */" => "client",
		"`incomes`.`amount`" => "amount"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`incomes`.`income_id`" => "ID",
		"`incomes`.`date`" => "Date",
		"IF(    CHAR_LENGTH(`clients1`.`client`), CONCAT_WS('',   `clients1`.`client`), '') /* Client */" => "Client",
		"`incomes`.`amount`" => "Amount"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`incomes`.`income_id`" => "income_id",
		"if(`incomes`.`date`,date_format(`incomes`.`date`,'%m/%d/%Y'),'')" => "date",
		"IF(    CHAR_LENGTH(`clients1`.`client`), CONCAT_WS('',   `clients1`.`client`), '') /* Client */" => "client",
		"`incomes`.`amount`" => "amount"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'client' => 'Client');

	$x->QueryFrom = "`incomes` LEFT JOIN `clients` as clients1 ON `clients1`.`client_id`=`incomes`.`client` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = true;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 1;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowPrintingDV = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 100;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "incomes_view.php";
	$x->RedirectAfterInsert = "incomes_view.php?SelectedID=#ID#";
	$x->TableTitle = "Incomes";
	$x->TableIcon = "resources/table_icons/coins_add.png";
	$x->PrimaryKey = "`incomes`.`income_id`";
	$x->DefaultSortField = '`incomes`.`date`';
	$x->DefaultSortDirection = 'desc';

	$x->ColWidth   = array(  150, 150, 150);
	$x->ColCaption = array("Date", "Client", "Amount");
	$x->ColFieldName = array('date', 'client', 'amount');
	$x->ColNumber  = array(2, 3, 4);

	// template paths below are based on the app main directory
	$x->Template = 'templates/incomes_templateTV.html';
	$x->SelectedTemplate = 'templates/incomes_templateTVS.html';
	$x->TemplateDV = 'templates/incomes_templateDV.html';
	$x->TemplateDVP = 'templates/incomes_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `incomes`.`income_id`=membership_userrecords.pkValue and membership_userrecords.tableName='incomes' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `incomes`.`income_id`=membership_userrecords.pkValue and membership_userrecords.tableName='incomes' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`incomes`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: incomes_init
	$render=TRUE;
	if(function_exists('incomes_init')){
		$args=array();
		$render=incomes_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// column sums
	if(strpos($x->HTML, '<!-- tv data below -->')){
		// if printing multi-selection TV, calculate the sum only for the selected records
		if(isset($_REQUEST['Print_x']) && is_array($_REQUEST['record_selector'])){
			$QueryWhere = '';
			foreach($_REQUEST['record_selector'] as $id){   // get selected records
				if($id != '') $QueryWhere .= "'" . makeSafe($id) . "',";
			}
			if($QueryWhere != ''){
				$QueryWhere = 'where `incomes`.`income_id` in ('.substr($QueryWhere, 0, -1).')';
			}else{ // if no selected records, write the where clause to return an empty result
				$QueryWhere = 'where 1=0';
			}
		}else{
			$QueryWhere = $x->QueryWhere;
		}

		$sumQuery = "select sum(`incomes`.`amount`) from {$x->QueryFrom} {$QueryWhere}";
		$res = sql($sumQuery, $eo);
		if($row = db_fetch_row($res)){
			$sumRow = '<tr class="success">';
			if(!isset($_REQUEST['Print_x'])) $sumRow .= '<td class="text-center"><strong>&sum;</strong></td>';
			$sumRow .= '<td class="incomes-date"></td>';
			$sumRow .= '<td class="incomes-client"></td>';
			$sumRow .= "<td class=\"incomes-amount text-right\">{$row[0]}</td>";
			$sumRow .= '</tr>';

			$x->HTML = str_replace('<!-- tv data below -->', '', $x->HTML);
			$x->HTML = str_replace('<!-- tv data above -->', $sumRow, $x->HTML);
		}
	}

	// hook: incomes_header
	$headerCode='';
	if(function_exists('incomes_header')){
		$args=array();
		$headerCode=incomes_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: incomes_footer
	$footerCode='';
	if(function_exists('incomes_footer')){
		$args=array();
		$footerCode=incomes_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>