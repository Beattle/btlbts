<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if ($USER->IsAuthorized() || $arParams["ALLOW_AUTO_REGISTER"] == "Y") {
	if ($arResult["USER_VALS"]["CONFIRM_ORDER"] == "Y" || $arResult["NEED_REDIRECT"] == "Y") {
		if (strlen($arResult["REDIRECT_URL"]) > 0) {
			$APPLICATION->RestartBuffer();
			?>
			<script type="text/javascript">
				window.top.location.href = '<?=CUtil::JSEscape($arResult["REDIRECT_URL"])?>';
			</script>
			<?
			die();
		}

	}
}

$APPLICATION->SetAdditionalCSS($templateFolder . "/style_cart.css");
$APPLICATION->SetAdditionalCSS($templateFolder . "/style.css");

CJSCore::Init(array('fx', 'popup', 'window', 'ajax'));
?>

<a name="order_form"></a>

<div id="order_form_div" class="order-checkout">
	<NOSCRIPT>
		<div class="errortext"><?= GetMessage("SOA_NO_JS") ?></div>
	</NOSCRIPT>

	<?
	if (!function_exists("getColumnName")) {
		function getColumnName($arHeader)
		{
			return (strlen($arHeader["name"]) > 0) ? $arHeader["name"] : GetMessage("SALE_" . $arHeader["id"]);
		}
	}

	if (!function_exists("cmpBySort")) {
		function cmpBySort($array1, $array2)
		{
			if (!isset($array1["SORT"]) || !isset($array2["SORT"]))
				return -1;

			if ($array1["SORT"] > $array2["SORT"])
				return 1;

			if ($array1["SORT"] < $array2["SORT"])
				return -1;

			if ($array1["SORT"] == $array2["SORT"])
				return 0;
		}
	}
	?>

	<div class="bx_order_make">
		<?

		if ($arResult["USER_VALS"]["CONFIRM_ORDER"] == "Y" || $arResult["NEED_REDIRECT"] == "Y") {
			if (strlen($arResult["REDIRECT_URL"]) == 0) {
				include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/confirm.php");
			}
		} else {
			?>
			<script type="text/javascript">
				var BXFormPosting = false;
				function submitForm(val) {
					if (BXFormPosting === true)
						return true;
					BXFormPosting = true;
					if (val != 'Y')
						BX('confirmorder').value = 'N';
					var orderForm = BX('ORDER_FORM');
					BX.showWait();
					BX.ajax.submit(orderForm, ajaxResult);
					return true;
				}

				function ajaxResult(res) {
					try {
						var json = JSON.parse(res);
						BX.closeWait();
						if (json.error) {
							BXFormPosting = false;
							return;
						}
						else if (json.redirect) {
							window.top.location.href = json.redirect;
						}
					}
					catch (e) {
						BXFormPosting = false;
						BX('order_form_content').innerHTML = res;
					}
					BX.closeWait();
				}

				function SetContact(profileId) {
					BX("profile_change").value = "Y";
					submitForm();
				}
			</script>
			<?if ($_POST["is_ajax_post"] != "Y")
		{
			?>
			<form action="<?= $APPLICATION->GetCurPage(); ?>" method="POST" name="ORDER_FORM" id="ORDER_FORM"
				  enctype="multipart/form-data">
				<?= bitrix_sessid_post() ?>
				<div id="order_form_content">
					<?
					}
					else {
						$APPLICATION->RestartBuffer();
					}
					include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/person_type.php");
					include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/delivery.php");
					?>

					<div class="checkout_breadcrumbs clearfix">
						<ul>
							<li <?= (empty($_POST["next"]) || !empty($arResult["ERROR"]) ? 'class="active"' : '') ?>>1.
								Адрес доставки и способ оплаты
							</li>

						</ul>
					</div>
					<div class="checkout">
						<?
						if ($_POST["next"] == "Y" && empty($arResult["ERROR"]))
						{
							?>
							<div class="heading">Подтверждение заказа</div>
							<div class="final_table">
								<table>
									<tr>
										<th>Наименование товара</th>
										<th>Количество</th>
										<th>Цена</th>
										<th></th>
									</tr>

									<?
									CModule::IncludeModule("iblock");

									foreach ($arResult["BASKET_ITEMS"] as $arItem):

										$resg = CIBlockElement::GetByID($arItem["PRODUCT_ID"]);
										if ($obEl = $resg->GetNextElement()) {
											$props = $obEl->GetProperties();
											if (intval($props["CML2_LINK"]["VALUE"]) > 0) {
												$resg2 = CIBlockElement::GetByID($props["CML2_LINK"]["VALUE"]);
												if ($ar_resg2 = $resg2->GetNext()) {
													$arItem["DETAIL_PAGE_URL"] = $ar_resg2["DETAIL_PAGE_URL"];
												}
											}
										}?>
										<tr class="product_row" id="product1">
											<td class="name">
												<div class="name_container">
													<?
													if (intval($arItem["DETAIL_PICTURE"]) > 0) {
														$img = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], array('width' => 100, 'height' => 72), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);
														?>
														<img src="<?= $img["src"] ?>" alt="<?= $arItem["NAME"] ?>">
													<?
													}
													?>

													<a class="name_value"
													   href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?= $arItem["NAME"] ?></a>
												</div>
											</td>
											<td class="quantity">
												<div class="quantity_calc">
													<div class="quantity_value"><?= $arItem["QUANTITY"] ?></div>
													<input class="item_one_price" type="hidden" name="item_one_price"
														   value="<?= $arItem["PRICE"] ?>">
												</div>
											</td>
											<td class="price">
												<?= $arItem["PRICE_FORMATED"] ?>
											</td>
											<td class="delete">
												<a href="<?= $arItem["ID"] ?>">&nbsp;</a>
											</td>
										</tr>
									<?endforeach;?>
								</table>
								<div class="total_total_price clearfix">
									<div class="total_total_price_title">Итоговая стоимость</div>
									<div class="total_total_price_value"
										 id="summary_value"><?= $arResult["ORDER_PRICE_FORMATED"] ?></div>
								</div>
								<div class="final_add_info clearfix">
									<div class="left_side">
										<div class="mini_title">Контактная информация</div>
										<div
											class="mini_text"><?= $_REQUEST["ORDER_PROP_2"] ?> <?= $_REQUEST["ORDER_PROP_3"] ?></div>
										<input class="final_add_checkbox" type="checkbox" id="final_add"
											   name="ORDER_PROP_9"
											   value="Y" <?= ($_REQUEST["ORDER_PROP_9"] == "Y" ? "checked" : "") ?>>
										<label class="final_add" for="final_add">Перезвонить для уточнения</label>

										<div class="mini_title">ФИО получателя:</div>
										<input class="mini_input" type="text" name="ORDER_PROP_8"
											   value="<?= $_REQUEST["ORDER_PROP_8"] ?>">

										<div class="mini_title">Доставка</div>
										<?
										if (intval($_REQUEST["receive_address"]) > 0) {
											$resc = CIBlockElement::GetByID($_REQUEST["receive_address"]);
											if ($ar_resc = $resc->GetNext()) {
												$sres = CIBlockSection::GetByID($ar_resc["IBLOCK_SECTION_ID"]);
												if ($sar_res = $sres->GetNext()) {


													?>
													<div class="mini_text"><?= $sar_res["NAME"] ?></div>
													<div class="mini_title">Адрес</div>
													<div class="mini_text"><?= $ar_resc["NAME"] ?></div>
												<?
												}
											}
										}
										?>
									</div>
									<div class="right_side">
										<div class="mini_title">Комментарий к заказу:</div>
										<textarea class="mini_textarea" name="ORDER_DESCRIPTION"><?= $arResult["USER_VALS"]["ORDER_DESCRIPTION"] ?></textarea>
									</div>
								</div>
							</div>
							<div class="checkout_controls clearfix">
								<a class="go_back" href="#" onclick="$('#fnext').val('');submitForm('Y');return false;">Назад</a>
								<input class="go_forward" type="button" value="Продолжить"
									   onclick="$('#fnext').val('');submitForm('Y'); return false;">
							</div>
							<input type="hidden" name="receive_address" value="<?= $_POST["receive_address"] ?>"/>
							<input type="hidden" name="PAY_SYSTEM_ID" value="<?= $_POST["PAY_SYSTEM_ID"] ?>"/>
							<?
							include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/propshidden.php");
						}
						else
						{
						include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/props.php");?>

						<div class="receive_place">
							<div class="mini_heading">Где вам будет удобнее забрать заказ?</div>
							<div class="delivery_tabs_nav clearfix">
								<ul>
									<?
									$sc = 0;
									CModule::IncludeModule("iblock");
									if (intval($_REQUEST["receive_address"]) > 0) {
										$res = CIBlockElement::GetByID($_REQUEST["receive_address"]);
										if ($ar_res = $res->GetNext()) {
											$sc = intval($ar_res["IBLOCK_SECTION_ID"]);
										}

									}

									$sect = array();

									$arrFl = array("IBLOCK_ID" => 13, "ACTIVE" => "Y");
									$db_list = CIBlockSection::GetList(Array("sort" => "asc"), $arrFl);
									$z = 0;
									$g = 0;
									while ($ar_result = $db_list->GetNext()) {
										$z++;


										$sect[] = $ar_result["ID"];
										?>
										<li <?= ((($z == 1 && $sc == 0) || $sc == $ar_result["ID"]) ? 'class="active"' : '') ?>>
											<a href="#receive_table<?= $z ?>">
												<div class="round">&nbsp;</div>
												<div class="tab_name"><?= $ar_result["NAME"] ?></div>
											</a></li>
									<?
									}?>

								</ul>
							</div>
						</div>

						<div class="receive_table">
							<?
							$z = 0;
							foreach ($sect as $sct) {
								$z++;

								?>
								<table
									id="receive_table<?= $z ?>" <?= ((($z == 1 && intval($_REQUEST["receive_address"]) == 0) || $sc == $sct) ? 'class="active"' : '') ?>>
									<tr>
										<th>Адрес магазина</th>
										<th>Телефон</th>
										<th>График работы</th>
										<th>Получить</th>
									</tr>
									<?
									$arFel = array("IBLOCK_ID" => 13, "ACTIVE" => "Y", "SECTION_ID" => $sct);
									$res = CIBlockElement::GetList(Array("sort" => "asc"), $arFel);
									while ($ob = $res->GetNextElement()) {
										$darFields = $ob->GetFields();
										$props = $ob->GetProperties();
										$g++;
										?>
										<tr>
											<td class="address">
												<input class="delivery_radiobox" type="radio" name="receive_address"
													   value="<?= $darFields["ID"] ?>"
													   id="receive_address<?= $g ?>" <?= (($_REQUEST["receive_address"] == $darFields["ID"] || (intval($_REQUEST["receive_address"]) == 0 && $g == 1)) ? "checked" : "") ?>>
												<label class="delivery_label"
													   for="receive_address<?= $g ?>"><?= $darFields["NAME"] ?></label>
											</td>
											<td class="phone"><?= $props["PHONE"]["VALUE"] ?></td>
											<td class="work_time"><?= $props["GRAPHIC"]["VALUE"] ?></td>
											<td class="when_receive"><?= $props["ORDER"]["VALUE"] ?></td>
										</tr>
									<?
									}?>
								</table>
							<?
							}?>
						</div>
						<?
						if ($_REQUEST["delivery"] == 1 || $_REQUEST["DELIVERY_ID"] == 1) {
							?>
							<div class="recieve_time clearfix">
								<div class="mini_heading">Выберите удобную дату и время для самовывоза</div>
								<div class="left_side">
									<div class="time_row clearfix">
										<label>Дата</label>
										<input class="time_text" type="text" name="ORDER_PROP_6" id="ORDER_PROP_6"
											   value="<?= $_REQUEST["ORDER_PROP_6"] ?>" placeholder="дд_мм_гггг">
									</div>
									<div class="time_row clearfix">
										<label>Время</label>
										<input class="time_text" type="text" name="ORDER_PROP_7" id="ORDER_PROP_7"
											   value="<?= $_REQUEST["ORDER_PROP_7"] ?>" placeholder="чч_мм">
									</div>
								</div>
								<div class="right_side">
									<strong>Внимание!</strong><br/><br/>

									<div style="text-indent: 20px;">Точки выдачи товаров находятся на территории Бизнес-Центра, работает пропуская система.
									</div>
									<div style="text-indent: 20px;">В целях экономии Вашего времени просим заранее указывать дату и примерное время посещения офиса, для своевременного оформления пропуска. </div>
								</div>
							</div>

							<div class="line_separator">&nbsp;</div>
						<?
						}?>
						<?include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/paysystem.php");?>

						<div class="checkout_controls clearfix">
							<a class="go_back" href="/personal/cart/">Назад</a>
							<input class="go_forward" type="button" value="Продолжить" name="forward" onclick="$('#fnext').val('Y');submitForm('Y');">
							<input type="hidden" name="next" value="" id="fnext"/>
						</div>

					</div>
					<?
					/*include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/related_props.php");
					include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/summary.php");*/
					if (strlen($arResult["PREPAY_ADIT_FIELDS"]) > 0)
						echo $arResult["PREPAY_ADIT_FIELDS"];
					?>

					<?if ($_POST["is_ajax_post"] != "Y")
					{
					?>
				</div>
				<input type="hidden" name="confirmorder" id="confirmorder" value="Y">
				<input type="hidden" name="profile_change" id="profile_change" value="N">
				<input type="hidden" name="is_ajax_post" id="is_ajax_post" value="Y">
				<input type="hidden" name="json" value="Y">

			</form>
			<?
		if ($arParams["DELIVERY_NO_AJAX"] == "N")
		{
			?>
			<div
				style="display:none;"><?$APPLICATION->IncludeComponent("bitrix:sale.ajax.delivery.calculator", "", array(), null, array('HIDE_ICONS' => 'Y')); ?></div>
		<?
		}
			} else {
					?>
						<script type="text/javascript">
							top.BX('confirmorder').value = 'Y';
							top.BX('profile_change').value = 'N';
						</script>
						<? die();
					}
				}
			}

		?>
	</div>
</div>