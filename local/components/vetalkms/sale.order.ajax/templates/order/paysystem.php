<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

	<script type="text/javascript">
	function changePaySystem(param)
	{
		if (BX("account_only") && BX("account_only").value == 'Y') // PAY_CURRENT_ACCOUNT checkbox should act as radio
		{
			if (param == 'account')
			{
				if (BX("PAY_CURRENT_ACCOUNT"))
				{
					BX("PAY_CURRENT_ACCOUNT").checked = true;
					BX("PAY_CURRENT_ACCOUNT").setAttribute("checked", "checked");
					BX.addClass(BX("PAY_CURRENT_ACCOUNT_LABEL"), 'selected');

					// deselect all other
					var el = document.getElementsByName("PAY_SYSTEM_ID");
					for(var i=0; i<el.length; i++)
					el[i].checked = false;
				}
			}
			else
			{
				BX("PAY_CURRENT_ACCOUNT").checked = false;
				BX("PAY_CURRENT_ACCOUNT").removeAttribute("checked");
				BX.removeClass(BX("PAY_CURRENT_ACCOUNT_LABEL"), 'selected');
			}
		}
		else if (BX("account_only") && BX("account_only").value == 'N')
		{
			if (param == 'account')
			{
				if (BX("PAY_CURRENT_ACCOUNT"))
				{
					BX("PAY_CURRENT_ACCOUNT").checked = !BX("PAY_CURRENT_ACCOUNT").checked;

					if (BX("PAY_CURRENT_ACCOUNT").checked)
					{
						BX("PAY_CURRENT_ACCOUNT").setAttribute("checked", "checked");
						BX.addClass(BX("PAY_CURRENT_ACCOUNT_LABEL"), 'selected');
					}
					else
					{
						BX("PAY_CURRENT_ACCOUNT").removeAttribute("checked");
						BX.removeClass(BX("PAY_CURRENT_ACCOUNT_LABEL"), 'selected');
					}
				}
			}
		}
		//submitForm();
	}
	</script>
	<div class="pay_methods">
	<?
	uasort($arResult["PAY_SYSTEM"], "cmpBySort"); // resort arrays according to SORT value
	$z=0;
	foreach($arResult["PAY_SYSTEM"] as $arPaySystem)
	{
		$z++;
	?>
		<div class="pay_method_item">
			<input class="pay_method_radiobox" type="radio" name="PAY_SYSTEM_ID" value="<?=$arPaySystem["ID"]?>" id="pay_method<?=$z?>" onclick="changePaySystem();" <?if ($arPaySystem["CHECKED"]=="Y" && !($arParams["ONLY_FULL_PAY_FROM_ACCOUNT"] == "Y" && $arResult["USER_VALS"]["PAY_CURRENT_ACCOUNT"]=="Y")) echo " checked=\"checked\"";?>>
			<label class="pay_method_label clearfix" for="pay_method<?=$z?>">
				<span class="first_word">
					<span class="bigger"><?=$arPaySystem["NAME"]?></span>
					<?
					if (!empty($arPaySystem["PSA_LOGOTIP"]["SRC"]))
					{
						$imgUrl = $arPaySystem["PSA_LOGOTIP"]["SRC"];
						?>
						<img src="<?=$imgUrl?>" alt="<?=$arPaySystem["NAME"]?>" title="<?=$arPaySystem["NAME"]?>"/>
						<?
					}
					?>
				</span>
				<span class="smaller"><?=$arPaySystem["DESCRIPTION"]?></span>
			</label>
		</div>
	<?}?>
</div>