<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main;
use \Bitrix\Main\Loader;
use \Bitrix\Main\Localization\Loc as Loc;

Loc::loadMessages(__FILE__);

$catalogIncluded = Loader::includeModule('catalog');
$arSort = CIBlockParameters::GetElementSortFields(
    array('SHOWS', 'SORT', 'TIMESTAMP_X', 'NAME', 'ID', 'ACTIVE_FROM', 'ACTIVE_TO'),
    array('KEY_LOWERCASE' => 'Y')
);

$arPrice = array();
if ($catalogIncluded) {
    $arSort = array_merge($arSort, CCatalogIBlockParameters::GetCatalogSortFields());
    $arPrice = CCatalogIBlockParameters::getPriceTypesList();
} else {
    $arPrice = array();
}

try {
    $arComponentParameters = array(
        'PARAMETERS' => array(
            'RANDOM_ELEMENTS_COUNT' => array(
                'PARENT' => 'BASE',
                'NAME' => Loc::getMessage('DI_IBLOCKSEARCH_RANDOM_ELEMENTS_COUNT'),
                'TYPE' => 'STRING',
                'DEFAULT' => '1'
            ),
            'RANDOM_ELEMENTS_PICTURE_FIELD' => array(
                'PARENT' => 'BASE',
                'NAME' => Loc::getMessage('DI_IBLOCKSEARCH_RANDOM_ELEMENTS_PICTURE_FIELD'),
                'TYPE' => 'LIST',
                'VALUES' => array(
                    'PREVIEW_PICTURE' => 'PREVIEW_PICTURE',
                    'DETAIL_PICTURE' => 'DETAIL_PICTURE'
                ),
                'DEFAULT' => 'PREVIEW_PICTURE'
            ),
            'RANDOM_ELEMENTS_PICTURE_WIDTH' => array(
                'PARENT' => 'BASE',
                'NAME' => Loc::getMessage('DI_IBLOCKSEARCH_RANDOM_ELEMENTS_PICTURE_WIDTH'),
                'TYPE' => 'STRING',
                'DEFAULT' => '100'
            ),
            'RANDOM_ELEMENTS_PICTURE_HEIGHT' => array(
                'PARENT' => 'BASE',
                'NAME' => Loc::getMessage('DI_IBLOCKSEARCH_RANDOM_ELEMENTS_PICTURE_HEIGHT'),
                'TYPE' => 'STRING',
                'DEFAULT' => '100'
            ),
            'SECTIONS_COUNT_TOP' => array(
                'PARENT' => 'BASE',
                'NAME' => Loc::getMessage('DI_IBLOCKSEARCH_SECTIONS_COUNT_TOP'),
                'TYPE' => 'STRING',
                'DEFAULT' => '5'
            ),
            "PRICE_CODE" => array(
                "PARENT" => "BASE",
                "NAME" => Loc::getMessage("DI_IBLOCKSEARCH_PRICE_CODE"),
                "TYPE" => "LIST",
                "MULTIPLE" => "Y",
                "VALUES" => $arPrice,
            ),
            'RESULT_CONTAINER_ID' => array(
                'PARENT' => 'VISUAL',
                'NAME' => Loc::getMessage('DI_IBLOCKSEARCH_RESULT_CONTAINER_ID'),
                'TYPE' => 'STRING',
                'DEFAULT' => 'di-search-result'
            ),
            'CATALOG_FOLDER' => array(
                'PARENT' => 'BASE',
                'NAME' => Loc::getMessage('DI_IBLOCKSEARCH_CATALOG_FOLDER'),
                'TYPE' => 'STRING',
                'DEFAULT' => '/catalog/'
            ),
            'EXT_FILTER' => array(
                'PARENT' => 'BASE',
                'NAME' => Loc::getMessage('DI_IBLOCKSEARCH_EXT_FILTER'),
                'TYPE' => 'STRING',
                'DEFAULT' => 'shopFilter'
            ),
            'INPUT_ID' => array(
                'PARENT' => 'VISUAL',
                'NAME' => Loc::getMessage('DI_IBLOCKSEARCH_INPUT_ID'),
                'TYPE' => 'STRING',
                'DEFAULT' => 'di-search-input'
            ),
            'CONTAINER_ID' => array(
                'PARENT' => 'VISUAL',
                'NAME' => Loc::getMessage('DI_IBLOCKSEARCH_CONTAINER_ID'),
                'TYPE' => 'STRING',
                'DEFAULT' => 'di-search'
            ),
            'INPUT_SECTION_ID' => array(
                'PARENT' => 'VISUAL',
                'NAME' => Loc::getMessage('DI_IBLOCKSEARCH_INPUT_SECTION_ID'),
                'TYPE' => 'STRING',
                'DEFAULT' => 'di-search-section-id-input'
            ),
            'SECTION_ID' => array(
                'PARENT' => 'VISUAL',
                'NAME' => Loc::getMessage('DI_IBLOCKSEARCH_SECTION_ID'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
            ),
        )
    );
} catch (Main\LoaderException $e) {
    ShowError($e->getMessage());
}
?>