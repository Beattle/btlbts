<div class="heading">Способы оплаты заказа</div>
<div class="pay_methods">
	<?
	uasort($arResult["PAY_SYSTEM"], "cmpBySort"); // resort arrays according to SORT value
	$z=0;
	foreach($arResult["PAY_SYSTEM"] as $arPaySystem)
	{
		$z++;
	?>
						<div class="pay_method_item">
							<input class="pay_method_radiobox" type="radio" name="PAY_SYSTEM_ID" value="<?=$arPaySystem["ID"]?>" id="pay_method<?=$z?>" <?if ($arPaySystem["CHECKED"]=="Y" && !($arParams["ONLY_FULL_PAY_FROM_ACCOUNT"] == "Y" && $arResult["USER_VALS"]["PAY_CURRENT_ACCOUNT"]=="Y")) echo " checked=\"checked\"";?>>
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
					
					<div class="checkout_controls clearfix">
						
						<input class="go_back" type="submit" name="backButton" value="Назад">
						<input class="go_forward" type="submit" name="contButton" value="Продолжить">
					</div>