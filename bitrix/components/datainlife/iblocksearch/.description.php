<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use \Bitrix\Main\Localization\Loc as Loc;

Loc::loadMessages(__FILE__);

$arComponentDescription = array(
	"NAME" => Loc::getMessage('DI_IBLOCKSEARCH_DESCRIPTION_NAME'),
	"DESCRIPTION" => Loc::getMessage('DI_IBLOCKSEARCH_DESCRIPTION_DESCRIPTION'),
	"ICON" => '/images/icon.gif',
	"SORT" => 10,
	"PATH" => array(
		"ID" => 'datainlife',
		"NAME" => Loc::getMessage('DI_IBLOCKSEARCH_DESCRIPTION_GROUP'),
		"SORT" => 10,
		"CHILD" => array(
			"ID" => 'iblocksearch',
			"NAME" => Loc::getMessage('DI_IBLOCKSEARCH_DESCRIPTION_DIR'),
			"SORT" => 20
		)
	),
);


?>
