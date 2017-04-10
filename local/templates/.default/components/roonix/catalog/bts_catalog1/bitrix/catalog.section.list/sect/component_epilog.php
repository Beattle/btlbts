<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
global $APPLICATION, $issections;


if ($arResult["SECTIONS_COUNT"] > 0) {
	$issections = true;
} else {
	$issections = false;
}

?>