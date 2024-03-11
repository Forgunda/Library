<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->SetTitle($arResult['TITLE']);
$APPLICATION->IncludeComponent(
	'bitrix:crm.interface.grid',
	'titleflex',
	 [
		'GRID_ID' => $arResult['GRID_ID'],
		'HEADERS' => $arResult['HEADERS'],
		'SHOW_ROW_CHECKBOXES' => false,
		'ROWS' => $arResult['ROWS'],
		'TOTAL_ROWS_COUNT' => $arResult['COUNT'],
		'ALLOW_COLUMNS_SORT'=> true,
		'SHOW_SELECTED_COUNTER'=> false,
		'ALLOW_SORT' => true,
		'ENABLE_FIELDS_SEARCH'=>true,
		'ENABLE_LABEL' => true,
		'NAV_OBJECT' =>$arResult['NAV'],
		'PAGINATION' => [
            'PAGE_NUM' => $arResult['PAGE'],
            'ENABLE_NEXT_PAGE' => $arResult['NAV']->getCurrentPage() < $arResult['NAV']->getPageCount(),
		],
		'SORT'=>$arResult['SORT'],
	 	'SORT_VARS'=>$arResult['SORT_VARS'],
		'AJAX_MODE' => 'Y',
		'AJAX_LOADER' => null,
		'AJAX_ID' => '',
		'AJAX_OPTION_JUMP' => 'N',
	],
	null,
	['HIDE_ICONS' => 'Y',]
);