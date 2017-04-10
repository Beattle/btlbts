<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<? //echo "<pre>".print_r($arResult["QUESTIONS"], 1)."</pre>"; ?>
<? // /bitrix/components/bitrix/sale.ajax.locations/search.php?search=Мос ?>
<?=$arResult["FORM_NOTE"]?>
<?if ($arResult["isFormNote"] != "Y") {
?>
	<h3><?=$arResult["FORM_TITLE"]?></h3>
	<div class="tabs_box">
		<ul class="tabs_menu">
			<li><a href="#tab1" class="active"><span class="fa fa_phone"></span><?=$arResult["QUESTIONS"]["SIMPLE_QUESTION_TELP"]["CAPTION"]?></a></li>
			<li><a href="#tab2"><span class="fa fa_mail"></span><?=$arResult["QUESTIONS"]["SIMPLE_QUESTION_EMAILP"]["CAPTION"]?></a></li>
		</ul>
		<?=$arResult["FORM_HEADER"]?>
		<div class="tab" id="tab1">
			<div class="tabs_form">

				<?php
				if ($arResult["QUESTIONS"]["SIMPLE_QUESTION_URLP"]['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
					echo $arResult["QUESTIONS"]["SIMPLE_QUESTION_URLP"]["HTML_CODE"];
				}
				?>
					<div>
						<input type="text" size="0" value="" name="form_text_20" placeholder="Ваш номер телефона" />
						<button <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" class="silk_bg button_bg"><?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?></button>
					</div>
			</div>
		</div>
		<div class="tab" id="tab2">
			<div class="tabs_form">
				<?php
				if ($arResult["QUESTIONS"]["SIMPLE_QUESTION_URLP"]['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
					echo $arResult["QUESTIONS"]["SIMPLE_QUESTION_URLP"]["HTML_CODE"];
				}
				?>
					<div>
						<input type="text" size="0" value="" name="form_text_21" placeholder="Ваша почта" />
						<button <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" class="silk_bg button_bg"><?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?></button>
					</div>
			</div>
		</div>
		<div>

			<div class="tabs_form">
				<input class="inputtext" type="text" size="0" value="" name="form_text_22" placeholder="Введите Ваш регион">
				<div class="regionhelper"></div>
			</div>
		</div>
		<?=$arResult["FORM_FOOTER"]?>
		<?if ($arResult["isFormErrors"] == "Y"):?><?="<br />".$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
	</div>

<? } ?>

<?
/*
$GLOBALS["APPLICATION"]->IncludeComponent(
	"bitrix:sale.ajax.locations",
	"bts_price_manage",
	array(
		"AJAX_CALL" => "N",
		"COUNTRY_INPUT_NAME" => "COUNTRY",
		"REGION_INPUT_NAME" => "REGION",
		"CITY_INPUT_NAME" => $arProperties["FIELD_NAME"],
		"CITY_OUT_LOCATION" => "Y",
		"LOCATION_VALUE" => $value,
		"ORDER_PROPS_ID" => $arProperties["ID"],
		"ONCITYCHANGE" => ($arProperties["IS_LOCATION"] == "Y" || $arProperties["IS_LOCATION4TAX"] == "Y") ? "submitForm()" : "",
		"SIZE1" => $arProperties["SIZE1"],
	),
	null,
	array('HIDE_ICONS' => 'Y')
);
*/
?>
