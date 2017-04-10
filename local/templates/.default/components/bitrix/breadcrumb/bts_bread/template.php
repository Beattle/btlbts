<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

//delayed function must return a string
if (empty($arResult))
	return "";
$strReturn = '<div class="pagi"><ul><li><a href="/">Главная</a></li>
					<li class="separator">|&nbsp;</li>';

$num_items = count($arResult);
for ($index = 0, $itemSize = $num_items; $index < $itemSize; $index++) {
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	if ($arResult[$index]["LINK"] <> "" && $index != $itemSize - 1)
		$strReturn .= '<li><a href="' . $arResult[$index]["LINK"] . '" title="' . $title . '">' . $title . '</a></li><li class="separator">&nbsp;|&nbsp;</li>';
	else
		$strReturn .= '<li>' . $title . '</li>';
}

$strReturn .= '</ul></div>';

return $strReturn;
?>