<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Grid\Options as GridOptions;
use Bitrix\Main\UI\PageNavigation;
use Bitrix\Main\Type;
use Bitrix\Main\ORM\Query;
use Bitrix\Main\Application;
use Bitrix\Main\ORM\Query\QueryHelper;
use Bitrix\Main\Localization\Loc;
CModule::IncludeModule('Sipyagova');
$arResult = [];
//Заголовок страницы
$arResult["TITLE"]=Loc::getMessage("PAGE_TITLE");
//ID таблицы
$arResult['GRID_ID'] = 'bibliotec2';
//Данные таблиц
$rows = [];
//Получим общее количество книг
$result = Bitrix\Sipyagova\BookTable::getList([
	'select' => ['ID'],
]);
//Посчитаем Книги
$arResult['COUNT']=$result->getSelectedRowsCount();
//Параметры таблицы
$grid_options = new GridOptions($arResult['GRID_ID']);
//Праметры сортировки
$sort = $grid_options->GetSorting();
$arResult['SORT']=$sort["sort"];
$arResult['SORT_VARS']=$sort["vars"];
//Навигация постраничная
$nav_params = $grid_options->GetNavParams(['nPageSize' => 10]);
$pageNum = isset($arParams['PAGE']) ? intval($arParams['PAGE']) : 1;
$nav = new PageNavigation('');
$nav->setPageSize($nav_params['nPageSize']); 
$nav->setRecordCount($arResult['COUNT']);
$nav->setCurrentPage($pageNum);
$arResult['NAV']=$nav;
$arResult['PAGE']=$pageNum;
//сдвиг элементов
$offset=($pageNum-1)*$nav_params['nPageSize'];
//Список книг с авторами
$res = Bitrix\Sipyagova\BookTable::getList([
	'select' => ['ID','TITLE','BOOK'=>'AUTHOR_TO.BOOK','AUTHOR'=>'AUTHOR_TO.AUTHOR'],
	'group'=>['BOOK'],
	'order'=>$sort['sort'],
]);
//Сформируем массив с корректеым отображением
while ($row = $res->fetch())
{
	if(!empty($rows[$row['ID']])){
		$row['AUTHOR']=$rows[$row['ID']]['data']['AUTHOR'].','.$row['AUTHOR'];
	}
	$rows[$row['ID']] = [
		'id' => $row['ID'],
		'data' => $row,
		'columns' => $row,
		];
}
$all=0;
$OnPage=0;
unset($row);
//Выберем элементы для постранички
foreach($rows as $row){
	if($all>=$offset&&$OnPage<=$nav_params['nPageSize']){
		$arResult['ROWS'][]=$row;
        $OnPage++;
	}
    $all++;
}
//Заголовки таблицы
$arResult['HEADERS'] = [
      [
        'id' => 'ID',
        'name' => 'ID',
        'sort' => 'ID',
        'first_order' => 'desc',
        'type' => 'number',
      ],
      [
        'id' => 'TITLE',
        'name' => Loc::getMessage("TITLE"),
        'sort' => 'TITLE',
        'type' => 'string',
        'default' => true,
      ],
        [
        'id' => 'AUTHOR',
        'name' => Loc::getMessage("AUTHOR"),
        'sort' => 'AUTHOR',
        'type' => 'string',
        'default' => true,
      ],
];
$this->IncludeComponentTemplate();