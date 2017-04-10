<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (!function_exists("PrintPropsForm"))
{
	function PrintPropsForm($arSource = array(), $locationTemplate = ".default")
	{
		if (!empty($arSource))
		{
			?>
				
					<?
					foreach ($arSource as $arProperties)
					{
						if($arProperties["CODE"]!="TIME" && $arProperties["CODE"]!="DATE" && $arProperties["CODE"]!="FIO" && $arProperties["CODE"]!="CALL") 
						{
						?>
						<div class="address_row clearfix">
						<?
						if ($arProperties["TYPE"] == "CHECKBOX")
						{
							?>
							<input type="hidden" name="<?=$arProperties["FIELD_NAME"]?>" value="">

							<div class="bx_block r1x3 pt8">
								<?=$arProperties["NAME"]?>
								<?if ($arProperties["REQUIED_FORMATED"]=="Y"):?>
									<span class="bx_sof_req">*</span>
								<?endif;?>
							</div>

							<div class="bx_block r1x3 pt8">
								<input type="checkbox" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>" value="Y"<?if ($arProperties["CHECKED"]=="Y") echo " checked";?>>

								<?
								if (strlen(trim($arProperties["DESCRIPTION"])) > 0):
								?>
								<div class="bx_description">
									<?=$arProperties["DESCRIPTION"]?>
								</div>
								<?
								endif;
								?>
							</div>

							<div style="clear: both;"></div>
							<?
						}
						elseif ($arProperties["TYPE"] == "TEXT")
						{
							?>
							<label for="<?=$arProperties["FIELD_NAME"]?>">
								<?=$arProperties["NAME"]?>:
								
							</label>

							
								<input class="address_text" type="text" maxlength="250" size="<?=$arProperties["SIZE1"]?>" value="<?=$arProperties["VALUE"]?>" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>">

								<?
								if (strlen(trim($arProperties["DESCRIPTION"])) > 0):
								?>
								<div class="bx_description">
									<?=$arProperties["DESCRIPTION"]?>
								</div>
								<?
								endif;
								?>
						
							<?
						}
						elseif ($arProperties["TYPE"] == "SELECT")
						{
							?>
							<br/>
							<div class="bx_block r1x3 pt8">
								<?=$arProperties["NAME"]?>
								<?if ($arProperties["REQUIED_FORMATED"]=="Y"):?>
									<span class="bx_sof_req">*</span>
								<?endif;?>
							</div>

							<div class="bx_block r3x1">
								<select name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>" size="<?=$arProperties["SIZE1"]?>">
									<?
									foreach($arProperties["VARIANTS"] as $arVariants):
									?>
										<option value="<?=$arVariants["VALUE"]?>"<?if ($arVariants["SELECTED"] == "Y") echo " selected";?>><?=$arVariants["NAME"]?></option>
									<?
									endforeach;
									?>
								</select>

								<?
								if (strlen(trim($arProperties["DESCRIPTION"])) > 0):
								?>
								<div class="bx_description">
									<?=$arProperties["DESCRIPTION"]?>
								</div>
								<?
								endif;
								?>
							</div>
							<div style="clear: both;"></div>
							<?
						}
						elseif ($arProperties["TYPE"] == "MULTISELECT")
						{
							?>
							<br/>
							<div class="bx_block r1x3 pt8">
								<?=$arProperties["NAME"]?>
								<?if ($arProperties["REQUIED_FORMATED"]=="Y"):?>
									<span class="bx_sof_req">*</span>
								<?endif;?>
							</div>

							<div class="bx_block r3x1">
								<select multiple name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>" size="<?=$arProperties["SIZE1"]?>">
									<?
									foreach($arProperties["VARIANTS"] as $arVariants):
									?>
										<option value="<?=$arVariants["VALUE"]?>"<?if ($arVariants["SELECTED"] == "Y") echo " selected";?>><?=$arVariants["NAME"]?></option>
									<?
									endforeach;
									?>
								</select>

								<?
								if (strlen(trim($arProperties["DESCRIPTION"])) > 0):
								?>
								<div class="bx_description">
									<?=$arProperties["DESCRIPTION"]?>
								</div>
								<?
								endif;
								?>
							</div>
							<div style="clear: both;"></div>
							<?
						}
						elseif ($arProperties["TYPE"] == "TEXTAREA")
						{
							$rows = ($arProperties["SIZE2"] > 10) ? 4 : $arProperties["SIZE2"];
							?>
							<br/>
							<div class="bx_block r1x3 pt8">
								<?=$arProperties["NAME"]?>
								<?if ($arProperties["REQUIED_FORMATED"]=="Y"):?>
									<span class="bx_sof_req">*</span>
								<?endif;?>
							</div>

							<div class="bx_block r3x1">
								<textarea rows="<?=$rows?>" cols="<?=$arProperties["SIZE1"]?>" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>"><?=$arProperties["VALUE"]?></textarea>

								<?
								if (strlen(trim($arProperties["DESCRIPTION"])) > 0):
								?>
								<div class="bx_description">
									<?=$arProperties["DESCRIPTION"]?>
								</div>
								<?
								endif;
								?>
							</div>
							<div style="clear: both;"></div>
							<?
						}
						elseif ($arProperties["TYPE"] == "LOCATION")
						{
							$value = 0;
							if (is_array($arProperties["VARIANTS"]) && count($arProperties["VARIANTS"]) > 0)
							{
								foreach ($arProperties["VARIANTS"] as $arVariant)
								{
									if ($arVariant["SELECTED"] == "Y")
									{
										$value = $arVariant["ID"];
										break;
									}
								}
							}
							?>
							<div class="address_row clearfix">
							<label for="checkout_address_text">Город:</label>
							<script>
							function submitForm()
							{
								return false;
							}
							</script>
								<?
								$GLOBALS["APPLICATION"]->IncludeComponent(
									"bitrix:sale.ajax.locations",
									"popup",
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
								?>
                            </div>
								<?
								if (strlen(trim($arProperties["DESCRIPTION"])) > 0):
								?>
								<div class="bx_description">
									<?=$arProperties["DESCRIPTION"]?>
								</div>
								<?
								endif;
								?>
							
							<?
						}
						elseif ($arProperties["TYPE"] == "RADIO")
						{
							?>
							<div class="bx_block r1x3 pt8">
								<?=$arProperties["NAME"]?>
								<?if ($arProperties["REQUIED_FORMATED"]=="Y"):?>
									<span class="bx_sof_req">*</span>
								<?endif;?>
							</div>

							<div class="bx_block r3x1">
								<?
								if (is_array($arProperties["VARIANTS"]))
								{
									foreach($arProperties["VARIANTS"] as $arVariants):
									?>
										<input
											type="radio"
											name="<?=$arProperties["FIELD_NAME"]?>"
											id="<?=$arProperties["FIELD_NAME"]?>_<?=$arVariants["VALUE"]?>"
											value="<?=$arVariants["VALUE"]?>" <?if($arVariants["CHECKED"] == "Y") echo " checked";?> />

										<label for="<?=$arProperties["FIELD_NAME"]?>_<?=$arVariants["VALUE"]?>"><?=$arVariants["NAME"]?></label></br>
									<?
									endforeach;
								}
								?>

								<?
								if (strlen(trim($arProperties["DESCRIPTION"])) > 0):
								?>
								<div class="bx_description">
									<?=$arProperties["DESCRIPTION"]?>
								</div>
								<?
								endif;
								?>
							</div>
							<div style="clear: both;"></div>
							<?
						}
						elseif ($arProperties["TYPE"] == "FILE")
						{
							?>
							<br/>
							<div class="bx_block r1x3 pt8">
								<?=$arProperties["NAME"]?>
								<?if ($arProperties["REQUIED_FORMATED"]=="Y"):?>
									<span class="bx_sof_req">*</span>
								<?endif;?>
							</div>

							<div class="bx_block r3x1">
								<?=showFilePropertyField("ORDER_PROP_".$arProperties["ID"], $arProperties, $arProperties["VALUE"], $arProperties["SIZE1"])?>

								<?
								if (strlen(trim($arProperties["DESCRIPTION"])) > 0):
								?>
								<div class="bx_description">
									<?=$arProperties["DESCRIPTION"]?>
								</div>
								<?
								endif;
								?>
							</div>

							<div style="clear: both;"></div><br/>
							<?
						}
						?>
						</div>
						<?
					}
				}
					?>
				
			<?
		}
	}
}
?>
<div class="heading">Контактная информация</div>
					<div class="address_form">
					<div style="padding:10px;font-size:12px;color:red;">
			<?
			echo ShowError($arResult["ERROR_MESSAGE"]);
			?>
			</div>
			<?
			PrintPropsForm($arResult["PRINT_PROPS_FORM"]["USER_PROPS_Y"], GetMessage("SALE_NEW_PROFILE_TITLE"), $arParams);
			?>
			</div>
			<div class="receive_place">
						<div class="mini_heading">Где вам будет удобнее забрать заказ?</div>
						<div class="delivery_tabs_nav clearfix">
							<ul>
							<?
							$sc=0;
							CModule::IncludeModule("iblock");
							if(intval($_REQUEST["receive_address"])>0)
							{
								$res = CIBlockElement::GetByID($_REQUEST["receive_address"]);
								if($ar_res = $res->GetNext())
								{
									$sc=intval($ar_res["IBLOCK_SECTION_ID"]);
								}

							}

							$sect=array();

							$arrFl=array("IBLOCK_ID"=>13,"ACTIVE"=>"Y");
							$db_list = CIBlockSection::GetList(Array("sort"=>"asc"), $arrFl);
							$z=0;
							$g=0;
							while($ar_result = $db_list->GetNext())
							{
								$z++;


								$sect[]=$ar_result["ID"];
							?>
								<li <?=((($z==1 && $sc==0) || $sc==$ar_result["ID"])?'class="active"':'')?>><a href="#receive_table<?=$z?>">
									<div class="round">&nbsp;</div>
									<div class="tab_name"><?=$ar_result["NAME"]?></div>
								</a></li>
								<?}?>
								
							</ul>
						</div>
					</div>
					
					<div class="receive_table">
					<?
					$z=0;
					foreach ($sect as $sct)
					{
						$z++;

					?>
						<table id="receive_table<?=$z?>" <?=((($z==1 && intval($_REQUEST["receive_address"])==0) || $sc==$sct)?'class="active"':'')?>>
							<tr>
								<th>Адрес магазина</th>
								<th>Телефон</th>
								<th>График работы</th>
								<th>Забрать</th>
							</tr>
							<?
							$arFel=array("IBLOCK_ID"=>13,"ACTIVE"=>"Y","SECTION_ID"=>$sct);
							$res = CIBlockElement::GetList(Array("sort"=>"asc"), $arFel);

							while($ob = $res->GetNextElement())
							{
								$darFields = $ob->GetFields();
								$props = $ob->GetProperties();
								$g++;


							?>
							<tr>
								<td class="address">
									<input class="delivery_radiobox" type="radio" name="receive_address" value="<?=$darFields["ID"]?>" id="receive_address<?=$g?>" <?=(($_REQUEST["receive_address"]==$darFields["ID"] || (intval($_REQUEST["receive_address"])==0 && $g==1))?"checked":"")?>>
									<label class="delivery_label" for="receive_address<?=$g?>"><?=$darFields["NAME"]?></label>
								</td>
								<td class="phone"><?=$props["PHONE"]["VALUE"]?></td>
								<td class="work_time"><?=$props["GRAPHIC"]["VALUE"]?></td>
								<td class="when_receive"><?=$props["ORDER"]["VALUE"]?></td>
							</tr>
							<?}?>
							
						</table>
						<?}?>
						
					</div>
					<?
					if($_REQUEST["delivery"]==1 || $_REQUEST["DELIVERY_ID"]==1) {
					?>
					<div class="recieve_time clearfix">
						<div class="mini_heading">Выберите удобную дату и время для самовывоза</div>
						<div class="left_side">
							<div class="time_row clearfix">
								<label>Дата</label>
								<input class="time_text" type="text" name="ORDER_PROP_6" value="<?=$_REQUEST["ORDER_PROP_6"]?>">
							</div>
							<div class="time_row clearfix">
								<label>Время</label>
								<input class="time_text" type="text" name="ORDER_PROP_7" value="<?=$_REQUEST["ORDER_PROP_7"]?>">
							</div>
						</div>
						<div class="right_side">
							<strong>Внимание!</strong><br /><br />
                            <div style="text-indent: 20px;">Точки выдачи товаров находятся на территории Бизнес-Центра, работает пропуская система.</div>
                            <div style="text-indent: 20px;">В целях экономии Вашего времени просим заранее указывать дату и примерное время посещения офиса, для своевременного оформления пропуска.</div>
						</div>
					</div>

					<div class="line_separator">&nbsp;</div>
					<?}?>

			        <div class="checkout_controls clearfix">
						<a class="go_back" href="/personal/cart/">Назад</a>
						<input class="go_forward" type="submit" name="contButton" value="Продолжить">
					</div>

			</div>
