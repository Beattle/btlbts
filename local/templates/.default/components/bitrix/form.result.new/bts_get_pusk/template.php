<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<?=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y") {
?>
	<div class="question">
	<h3><?=$arResult["FORM_TITLE"]?></h3>
		<?if ($arResult["isFormErrors"] == "Y"):?><?="<br />".$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
	<div class="form_question">
		<?=$arResult["FORM_HEADER"]?>

	<? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
			if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
				echo $arQuestion["HTML_CODE"];
			} else { ?>
			<div>
				<? if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])): ?>
					<span class="error-fld" title="<?=$arResult["FORM_ERRORS"][$FIELD_SID]?>"></span>
				<?endif;?>
				<?=$arQuestion["CAPTION"]?>
				<?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
				<?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
				<? echo $arQuestion["HTML_CODE"] = str_ireplace("<br />", "", $arQuestion["HTML_CODE"]);?>
			</div>
			<?	}
		} ?>

		<?
		if($arResult["isUseCaptcha"] == "Y")
		{
			?>
			<div><b><?=GetMessage("FORM_CAPTCHA_TABLE_TITLE")?></b></div>
			<div>
				<input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" />
			</div>
			<div><?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><?=$arResult["REQUIRED_SIGN"];?></div>
			<div><input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" /></div>
			<?
		}
		?>
		<input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" class="silk_bg button_bg" />
		<?if ($arResult["F_RIGHT"] >= 15):?>
			&nbsp;<input type="hidden" name="web_form_apply" value="Y" /><input type="submit" name="web_form_apply" value="<?=GetMessage("FORM_APPLY")?>" class="silk_bg button_bg" />
		<?endif;?>
		&nbsp;<input type="reset" value="<?=GetMessage("FORM_RESET");?>" class="silk_bg button_bg" />
		<p>
			<?=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")?>
		</p>
		<?=$arResult["FORM_FOOTER"]?>
		</div>
		</div>
<? } ?>

