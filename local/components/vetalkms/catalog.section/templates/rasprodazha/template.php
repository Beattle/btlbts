<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

?>
	<div class="catalog_sorting clearfix">
	<div class="catalog_items_rows clearfix">
		<?
		foreach ($arResult['ITEMS'] as $key => $arItem) {
			?>
			<div class="catalog_item clearfix" style="position: relative;">
				<? if ($arItem["PROPERTIES"]["RASPRODAZHA"]["VALUE"]) { ?>
					<div class="rasprodazha"></div>
				<? } ?>
				<a class="heading" href="<? echo $arItem['DETAIL_PAGE_URL']; ?>"><?= $arItem["NAME"] ?></a>

				<div class="left_side">
					<?
					if (!empty($arItem['PREVIEW_PICTURE']['ID'])) {
						$img = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], array('width'=>140, 'height'=>100), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);
					} else $img["src"] = "/upload/no-photo_140x100.jpg";
					?>

					<div class="left_side_img">
						<a class="item_image" href="<? echo $arItem['DETAIL_PAGE_URL']; ?>">
							<img src="<?=$img["src"]?>" alt="<?=$arItem["NAME"]?>">
						</a>
					</div>
					<?
					if (!empty($arItem['DETAIL_PICTURE']['ID'])) {
						?>
						<a class="make_bigger fancybox" href="<?= $arItem['DETAIL_PICTURE']['SRC'] ?>">увеличить фото</a>
					<?
					} ?>
					<div class="artic"><span
							class="semibold">Артикул:</span> <?= $arItem["PROPERTIES"]["CML2_ARTICLE"]["VALUE"] ?></div>
					<div class="add_to_compare">
						<input class="add_to_compare_checkbox" type="checkbox" id="compare_<?= ($key + 1) ?>"
							   rel="<?= $arItem["ID"] ?>" <?= (array_key_exists($arItem["ID"], $_SESSION["CATALOG_COMPARE_LIST"][1]["ITEMS"]) ? "checked" : "") ?>>
						<label class="compare_label" for="compare_<?= ($key + 1) ?>">к сравнению</label>
					</div>
				</div>
				<div class="middle_side">
					<div class="chars">
						<?
						foreach ($arItem['DISPLAY_PROPERTIES'] as $arOneProp) {
							?>
							<div class="char_tem">
								<span class="semibold"><? echo $arOneProp['NAME']; ?>:</span> <?
								echo(
								is_array($arOneProp['DISPLAY_VALUE'])
									? implode('/', $arOneProp['DISPLAY_VALUE'])
									: $arOneProp['DISPLAY_VALUE']
								);?>
							</div>
						<?
						} ?>
					</div>
					<? if ($arItem["PROPERTIES"]["brief_text"]["VALUE"]) { ?>
						<div class="brief_text">
							<br />
							<? if($arItem["PROPERTIES"]["brief_text"]["VALUE"]["TYPE"] == "HTML" || $arItem["PROPERTIES"]["brief_text"]["VALUE"]["TYPE"] == "html") {
								echo htmlspecialcharsBack($arItem["PROPERTIES"]["brief_text"]["VALUE"]["TEXT"]);
							} else {
								$arItem["PROPERTIES"]["brief_text"]["VALUE"]["TEXT"];
							}
							?>
							<br />
						</div>
					<? } ?>
					<div class="rating">
						<?$APPLICATION->IncludeComponent(
							"roonix:iblock.vote",
							"stars",
							array(
								"IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
								"IBLOCK_ID" => $arParams['IBLOCK_ID'],
								"ELEMENT_ID" => $arItem['ID'],
								"ELEMENT_CODE" => "",
								"MAX_VOTE" => "5",
								"VOTE_NAMES" => array("1", "2", "3", "4", "5"),
								"SET_STATUS_404" => "N",
								"DISPLAY_AS_RATING" => $arParams['VOTE_DISPLAY_AS_RATING'],
								"CACHE_TYPE" => $arParams['CACHE_TYPE'],
								"CACHE_TIME" => $arParams['CACHE_TIME']
							),
							$component,
							array("HIDE_ICONS" => "Y")
						); ?>
					</div>
					<?
					if ($arItem["COMMENT_NUM"] > 0) {
						?>
						<a class="reviews_link" href="<? echo $arItem['DETAIL_PAGE_URL']; ?>?comment=Y">Отзывы
							(<?= $arItem["COMMENT_NUM"] ?>)</a>
					<?
					} ?>
				</div>
				<div class="right_side">
					<?
					if (count($arItem["OFFERS"]) == 1) {

						?>
						<div class="prices">
							<?
							if (!empty($arItem['MIN_PRICE']['DISCOUNT_VALUE']) < $arItem['MIN_PRICE']['VALUE']) {

								$prc = CCurrencyRates::ConvertCurrency($arItem['MIN_PRICE']['VALUE'], $arItem['MIN_PRICE']["CURRENCY"], "RUB");
								$prcd = CCurrencyRates::ConvertCurrency($arItem['MIN_PRICE']['DISCOUNT_VALUE'], $arItem['MIN_PRICE']["CURRENCY"], "RUB");


								?>
								<div class="old_price">
									<div class="price_title">старая цена:</div>
									<div class="price_value"><?= CurrencyFormat($prc, "RUB") ?></div>
								</div>
								<div class="new_price">
									<div class="price_title">цена:</div>
									<div class="price_value"><?= CurrencyFormat($prcd, "RUB") ?></div>
								</div>
							<?
							} else {
								$prc = CCurrencyRates::ConvertCurrency($arItem['MIN_PRICE']['VALUE'], $arItem['MIN_PRICE']["CURRENCY"], "RUB");
								?>
								<div class="new_price">
									<div class="price_title">цена:</div>
									<div class="price_value"><?= CurrencyFormat($prc, "RUB") ?></div>
								</div>
							<?
							}?>
						</div>
						<a href="<?= $arItem["ID"] ?>" class="one_click_buy">Купить в 1 клик</a>
						<a href="<?= $arItem["OFFERS"][0]["ADD_URL"] ?>" class="add_to_cart">В корзину</a>
					<?
					} elseif (count($arItem["OFFERS"]) > 1) {
						?>
						<div class="prices">
							<?
							if (!empty($arItem['MAX_PRICE']['DISCOUNT_VALUE']) < $arItem['MAX_PRICE']['VALUE']) {
								$prc = CCurrencyRates::ConvertCurrency($arItem['MAX_PRICE']['VALUE'], $arItem['MAX_PRICE']["CURRENCY"], "RUB");
								$prcd = CCurrencyRates::ConvertCurrency($arItem['MAX_PRICE']['DISCOUNT_VALUE'], $arItem['MAX_PRICE']["CURRENCY"], "RUB");
								?>
								<div class="old_price">
									<div class="price_title">старая цена:</div>
									<div class="price_value"><?= CurrencyFormat($prc, "RUB") ?></div>
								</div>
								<div class="new_price">
									<div class="price_title">цена:</div>
									<div class="price_value"><?= CurrencyFormat($prcd, "RUB") ?></div>
								</div>
							<?
							} else {
								$prc = CCurrencyRates::ConvertCurrency($arItem['MAX_PRICE']['VALUE'], $arItem['MAX_PRICE']["CURRENCY"], "RUB");
								?>
								<div class="new_price">
									<div class="price_title">цена:</div>
									<div class="price_value"><?= CurrencyFormat($prc, "RUB") ?></div>
								</div>
							<?
							}?>
						</div>
						<a href="<?= $arItem['MAX_PRICE']["ID"] ?>" class="one_click_buy">Купить в 1 клик</a>
						<a href="<?= $arItem['MAX_PRICE']["ADD_URL"] ?>" class="add_to_cart">В корзину</a>

					<?
					} ?>
				</div>

			</div>
		<?
		}
		if ($arParams["DISPLAY_BOTTOM_PAGER"]) {
			?><? echo $arResult["NAV_STRING"]; ?><?
		}
		?>
	</div>
	<div class="usefull_info">
		<?
		if (!empty($arResult["DESCRIPTION"])) {
			?>
			<div class="heading">Полезная информация</div>
			<div class="usefull_info_inner">
				<?
				echo $arResult["DESCRIPTION"];
				?>
			</div>
		<? } ?>
	</div>

<?
require($_SERVER["DOCUMENT_ROOT"] . "/include/subscribe.php");

?>