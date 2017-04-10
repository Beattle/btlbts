<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

<div class="product_main_page second_view clearfix">
				<h1 class="product_name"><?=$arResult["NAME"]?></h1>
				<div class="left_side clearfix">
					<div class="image_area">
						<div class="main_image">
						<?
						if(intval($arResult["DETAIL_PICTURE"]["ID"])>0)
						{
							$img=CFile::ResizeImageGet($arResult["DETAIL_PICTURE"]["ID"], array('width'=>220, 'height'=>200), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);
						}
						else $img="/pload/no-photo_220x200.jpg";
						
						if(intval($arResult["DETAIL_PICTURE"]["ID"])>0)
						{
						?>
							<a class="fancybox" data-fancybox-group="products" href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"><img src="<?=$img["src"]?>"  alt="<?=$arResult["NAME"]?>"></a>
							<?}
							else 
							{
								?>
								<a><img src="<?=$img["src"]?>" width="220" height="200" alt="<?=$arResult["NAME"]?>"></a>
								<?
								
							}
							?>
						</div>
						<?
						if(intval($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"][0])>0)
						{
							
						
						?>
						<div class="other_images">
							<div class="other_images_sliderarrows">
								<a id="other_images_prev" href="#">Назад</a>
								<a id="other_images_next" href="#">Вперед</a>
							</div>
							<div class="cycle-slideshow images_slider"
							data-cycle-fx="scrollHorz"
							data-cycle-timeout="0"
							data-cycle-prev="#other_images_prev"
							data-cycle-next="#other_images_next"
							data-cycle-slides="> div"
							>
							
							<?
							$fg=0;
							foreach ($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $p=>$photo)
							{
								$fg++;
								if($fg==1)
								{
									?>
									<div class="slider_wrap">
									<?

								}
								$img=CFile::ResizeImageGet($photo, array('width'=>33, 'height'=>30), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);
								?>
								<a class="fancybox" data-fancybox-group="products" href="<?=CFile::GetPath($photo)?>"><img src="<?=$img["src"]?>" alt="<?=$arResult["NAME"]?>"></a>
								<?if($fg==4)
								{
									$fg=0;
									?>
									</div>
									<?
								}
							}
							if($fg>0) echo "</div>";
							?>
								
							</div>
						</div>
						<?}?>
					</div>
					<div class="product_info">
					<?
					if(!empty($arResult["PROPERTIES"]["CML2_ARTICLE"]["VALUE"]))
					{
					?>
						<div class="product_code">код товара: <?=$arResult["PROPERTIES"]["CML2_ARTICLE"]["VALUE"]?></div>
						<?}
						?>
						<div class="product_rating clearfix">
							<div class="product_rating_title">Рейтинг товара:</div>
							<div class="product_rating_bar">
								<?$APPLICATION->IncludeComponent(
			"bitrix:iblock.vote",
			"stars",
			array(
				"IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
				"IBLOCK_ID" => $arParams['IBLOCK_ID'],
				"ELEMENT_ID" => $arResult['ID'],
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
		);?>
							</div>
						</div>
						
						<a class="reviews" id="show_reviews" href="#">Отзывы (<?=intval($arResult["COMMENT_NUM"])?>)</a>
						
						
					</div>
				</div>
				
							
							
							
							<a class="one_click_buy_second one_click_buy" href="<?=$arResult["ID"]?>">Купить в 1 клик</a>
							
							
							
						
					
			</div>
			<?
			if(count($arResult["PROPERTIES"]["RECOMMEND_GOODS"]["VALUE"][0])>0)
			{
			?>
			<?
			global $garrFilter;
			$garrFilter=array("ID"=>$arResult["PROPERTIES"]["RECOMMEND_GOODS"]["VALUE"]);
			?>
			<?$APPLICATION->IncludeComponent("bitrix:catalog.section", "good", Array(
	"IBLOCK_TYPE" => "1c_catalog",	// Тип инфоблока
	"IBLOCK_ID" => "1",	// Инфоблок
	"SECTION_ID" => "",	// ID раздела
	"SECTION_CODE" => "",	// Код раздела
	"SECTION_USER_FIELDS" => array(	// Свойства раздела
		0 => "",
		1 => "",
	),
	"ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем элементы
	"ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки элементов
	"ELEMENT_SORT_FIELD2" => "",	// Поле для второй сортировки элементов
	"ELEMENT_SORT_ORDER2" => "",	// Порядок второй сортировки элементов
	"FILTER_NAME" => "garrFilter",	// Имя массива со значениями фильтра для фильтрации элементов
	"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
	"SHOW_ALL_WO_SECTION" => "Y",	// Показывать все элементы, если не указан раздел
	"HIDE_NOT_AVAILABLE" => "N",	// Не отображать товары, которых нет на складах
	"PAGE_ELEMENT_COUNT" => "10",	// Количество элементов на странице
	"LINE_ELEMENT_COUNT" => "1",	// Количество элементов выводимых в одной строке таблицы
	"PROPERTY_CODE" => array(	// Свойства
		0 => "",
		1 => "",
	),
	"OFFERS_LIMIT" => "0",	// Максимальное количество предложений для показа (0 - все)
	"TEMPLATE_THEME" => "",	// Цветовая тема
	"PRODUCT_SUBSCRIPTION" => "N",	// Разрешить оповещения для отсутствующих товаров
	"SHOW_DISCOUNT_PERCENT" => "N",	// Показывать процент скидки
	"SHOW_OLD_PRICE" => "Y",	// Показывать старую цену
	"MESS_BTN_BUY" => "Купить",	// Текст кнопки "Купить"
	"MESS_BTN_ADD_TO_BASKET" => "В корзину",	// Текст кнопки "Добавить в корзину"
	"MESS_BTN_SUBSCRIBE" => "Подписаться",	// Текст кнопки "Уведомить о поступлении"
	"MESS_BTN_DETAIL" => "Подробнее",	// Текст кнопки "Подробнее"
	"MESS_NOT_AVAILABLE" => "Нет в наличии",	// Сообщение об отсутствии товара
	"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
	"DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
	"SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
	"AJAX_MODE" => "N",	// Включить режим AJAX
	"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
	"AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
	"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
	"CACHE_TYPE" => "A",	// Тип кеширования
	"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
	"CACHE_GROUPS" => "N",	// Учитывать права доступа
	"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
	"META_KEYWORDS" => "",	// Установить ключевые слова страницы из свойства
	"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
	"META_DESCRIPTION" => "",	// Установить описание страницы из свойства
	"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
	"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
	"DISPLAY_COMPARE" => "N",	// Выводить кнопку сравнения
	"SET_TITLE" => "N",	// Устанавливать заголовок страницы
	"SET_STATUS_404" => "N",	// Устанавливать статус 404, если не найдены элемент или раздел
	"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
	"PRICE_CODE" => array(	// Тип цены
		0 => "Цена продажи",
	),
	"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
	"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
	"PRICE_VAT_INCLUDE" => "N",	// Включать НДС в цену
	"CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
	"BASKET_URL" => "/personal/cart/",	// URL, ведущий на страницу с корзиной покупателя
	"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
	"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
	"USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
	"ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
	"PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
	"PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
	"PRODUCT_PROPERTIES" => array(	// Характеристики товара
		0 => "RECOMMEND_GOODS",
	),
	"PAGER_TEMPLATE" => "",	// Шаблон постраничной навигации
	"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
	"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
	"PAGER_TITLE" => "",	// Название категорий
	"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
	"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
	"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
	"OFFERS_FIELD_CODE" => array(	// Поля предложений
		0 => "",
		1 => "",
	),
	"OFFERS_PROPERTY_CODE" => array(	// Свойства предложений
		0 => "CML2_ARTICLE",
		1 => "CML2_BASE_UNIT",
		2 => "MORE_PHOTO",
		3 => "CML2_MANUFACTURER",
		4 => "CML2_TRAITS",
		5 => "CML2_TAXES",
		6 => "FILES",
		7 => "CML2_ATTRIBUTES",
		8 => "CML2_BAR_CODE",
		9 => "",
	),
	"OFFERS_SORT_FIELD" => "",	// По какому полю сортируем предложения товара
	"OFFERS_SORT_ORDER" => "",	// Порядок сортировки предложений товара
	"OFFERS_SORT_FIELD2" => "",	// Поле для второй сортировки предложений товара
	"OFFERS_SORT_ORDER2" => "",	// Порядок второй сортировки предложений товара
	"PRODUCT_DISPLAY_MODE" => "N",	// Схема отображения
	"ADD_PICT_PROP" => "-",	// Дополнительная картинка основного товара
	"LABEL_PROP" => "-",	// Свойство меток товара
	"OFFERS_CART_PROPERTIES" => array(	// Свойства предложений, добавляемые в корзину
		0 => "CML2_ARTICLE",
	)
	),
	false
);?>
			
			
			<?}?>
			<div class="product_tabs">
				<div class="tabs_navigation clearfix" id="tabs_navigation">
					<a href="#tab1" class="active"><span>Выбор товара</span></a>
					<a href="#tab2"><span>Подробная информация</span></a>
					<a href="#tab3"><span>Заточка</span></a>
					<a href="#reviews_tab" id="reviews_tablink"><span>Отзывы (<?=intval($arResult["COMMENT_NUM"])?>)</span></a>
					<a href="#tab5"><span>Кредит</span></a>
				</div>
				<div class="tabs_content">
					<div class="inner_tab" id="tab1">
					
							<table class="second_product_choose">
								<tr>
								<?
								$prp=array();
								foreach ($arResult["OFFERS"][0]["DISPLAY_PROPERTIES"] as $prop)
								{
									$prp[]=$prop["CODE"];
								?>
									<th><?=$prop["NAME"]?></th>
									<?}?>
									
									<th>Артикул</th>
									<th>Цена</th>
									<th>Количество</th>
									<th>Наличие</th>
									<th>Добавить в корзину</th>
								</tr>
								
								<?
								foreach ($arResult["OFFERS"] as $offer)
								{
									?>
									<tr>
									<?
									foreach ($offer["DISPLAY_PROPERTIES"] as $prop)
									{
										if(in_array($prop["CODE"],$prp))
										{
									?>
									<td class="td1"><?=$prop["DISPLAY_VALUE"]?></td>
									<?}
									}
									?>
									
									<td class="td5"><?=$offer["PROPERTIES"]["CML2_ARTICLE"]["VALUE"]?></td>
									<td class="td6">
									
									<?foreach($offer["PRICES"] as $code=>$arPrice):?>
				<?if($arPrice["CAN_ACCESS"]):?>
					
					<?if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
						<?=$arPrice["PRINT_DISCOUNT_VALUE"]?>
					<?else:?>
						<?=$arPrice["PRINT_VALUE"]?>
					<?endif?>
					
				<?endif;?>
			<?endforeach;?>
									</td>
									<td class="td7">
									<form action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data" id="form_<?echo $offer["ID"]?>">
									<input type="text" name="<?echo $arParams["PRODUCT_QUANTITY_VARIABLE"]?>" value="1" class="second_value">
									<input type="hidden" name="<?echo $arParams["ACTION_VARIABLE"]?>" value="BUY">
					<input type="hidden" name="<?echo $arParams["PRODUCT_ID_VARIABLE"]?>" value="<?echo $offer["ID"]?>">
					
					<input type="hidden" name="<?echo $arParams["ACTION_VARIABLE"]."ADD2BASKET"?>" value="Y">
									</form>
									</td>
									<td class="td8">
									<?
									if($offer["CAN_BUY"])
									{
									?>
									<img src="<?=SITE_TEMPLATE_PATH?>/images/instockyes.png" alt="">
									<?}
									else 
									{
										?>
										<img src="<?=SITE_TEMPLATE_PATH?>/images/instockno.png" alt="">
										<?
									}
									?>
									</td>
									<td class="td9"><input class="second_submit" type="submit" value="В корзину" onclick="$('#form_<?echo $offer["ID"]?>').submit();return false;"></td>
								</tr>
									<?
								}
								?>
								
								
							</table>
						
						</div>
					<div class="inner_tab" id="tab2">
						<div class="product_usabilities product_benefits">
						<?=$arResult["DETAIL_TEXT"]?>	
						
						</div>
					</div>
					<div class="inner_tab" id="tab3">
						<div class="product_usabilities product_benefits">еееZATOCH</div>
							
					</div>
					<div class="inner_tab" id="reviews_tab">
						<div class="reviews_tab">
							<div class="heading">Отзывы об <?=$arResult["NAME"]?></div>
							<div class="sorting clearfix">
								<div class="sort_by">
									<div class="sort_title">Сортировать по:</div>
									<select class="sort_select" name="sort">
									<option value="ACTIVE_FROM">Дате добавления</option>
										<option value="PROPERTY_YES">Популярности</option>
										
										<option value="NAME">Названию</option>
										
									</select>
								</div>
								<div class="show_by">
									<div class="show_title">Показывать по:</div>
									<select class="show_select" name="page">
										<option value="5">5</option>
										<option value="10">10</option>
										<option value="20">20</option>
										<option value="30">30</option>
									</select>
									отзывов
								</div>
								<a class="add_a_review" href="<?=$arResult["ID"]?>">написать отзыв</a>
							</div>
							<?
							global $cFilter;
							$cFilter=array("PROPERTY_GOOD"=>$arResult["ID"]);
							
							?>
							<div id="list_comm">
							<?$APPLICATION->IncludeComponent("bitrix:news.list", "comment", array(
	"IBLOCK_TYPE" => "1c_catalog",
	"IBLOCK_ID" => "12",
	"NEWS_COUNT" => "5",
	"SORT_BY1" => "ACTIVE_FROM",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "",
	"SORT_ORDER2" => "",
	"FILTER_NAME" => "cFilter",
	"FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "EMAIL",
		1 => "YES",
		2 => "NO",
		3 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"PREVIEW_TRUNCATE_LEN" => "",
	"ACTIVE_DATE_FORMAT" => "d,m,Y",
	"SET_STATUS_404" => "N",
	"SET_TITLE" => "N",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	"ADD_SECTIONS_CHAIN" => "N",
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"PARENT_SECTION" => "",
	"PARENT_SECTION_CODE" => "",
	"INCLUDE_SUBSECTIONS" => "Y",
	"PAGER_TEMPLATE" => "",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => "N",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
</div>
							
						</div>
					</div>
					<div class="inner_tab" id="tab5">
						<div class="credit">
							<div class="heading">Хотите взять этот продукт в кредит?</div>
							<p>
								Мы позаботились о том, чтобы у вас была возможность быстро, удобно и выгодно купить в кредит понравившиеся товары. Больше не нужно откладывать на потом покупку новой техники. Больше не нужно копить по несколько месяцев на новый телевизор. Кредит в интернет-магазине Биржа технологий еще никогда не был таким выгодным.
							</p>
						</div>
					</div>
				</div>
			</div>
			<?
			global $arrFgh;
			$arrFgh=array("!ID"=>$arResult["ID"]);
			?>
			<?$APPLICATION->IncludeComponent("bitrix:catalog.section", "recommend", Array(
	"IBLOCK_TYPE" => "1c_catalog",	// Тип инфоблока
	"IBLOCK_ID" => "1",	// Инфоблок
	"SECTION_ID" => $arResult["IBLOCK_SECTION_ID"],	// ID раздела
	"SECTION_CODE" => "",	// Код раздела
	"SECTION_USER_FIELDS" => array(	// Свойства раздела
		0 => "",
		1 => "",
	),
	"ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем элементы
	"ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки элементов
	"ELEMENT_SORT_FIELD2" => "",	// Поле для второй сортировки элементов
	"ELEMENT_SORT_ORDER2" => "",	// Порядок второй сортировки элементов
	"FILTER_NAME" => "arrFgh",	// Имя массива со значениями фильтра для фильтрации элементов
	"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
	"SHOW_ALL_WO_SECTION" => "Y",	// Показывать все элементы, если не указан раздел
	"HIDE_NOT_AVAILABLE" => "N",	// Не отображать товары, которых нет на складах
	"PAGE_ELEMENT_COUNT" => "40",	// Количество элементов на странице
	"LINE_ELEMENT_COUNT" => "1",	// Количество элементов выводимых в одной строке таблицы
	"PROPERTY_CODE" => array(	// Свойства
		0 => "",
		1 => "",
	),
	"OFFERS_LIMIT" => "0",	// Максимальное количество предложений для показа (0 - все)
	"TEMPLATE_THEME" => "",	// Цветовая тема
	"PRODUCT_SUBSCRIPTION" => "N",	// Разрешить оповещения для отсутствующих товаров
	"SHOW_DISCOUNT_PERCENT" => "N",	// Показывать процент скидки
	"SHOW_OLD_PRICE" => "Y",	// Показывать старую цену
	"MESS_BTN_BUY" => "Купить",	// Текст кнопки "Купить"
	"MESS_BTN_ADD_TO_BASKET" => "В корзину",	// Текст кнопки "Добавить в корзину"
	"MESS_BTN_SUBSCRIBE" => "Подписаться",	// Текст кнопки "Уведомить о поступлении"
	"MESS_BTN_DETAIL" => "Подробнее",	// Текст кнопки "Подробнее"
	"MESS_NOT_AVAILABLE" => "Нет в наличии",	// Сообщение об отсутствии товара
	"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
	"DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
	"SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
	"AJAX_MODE" => "N",	// Включить режим AJAX
	"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
	"AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
	"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
	"CACHE_TYPE" => "A",	// Тип кеширования
	"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
	"CACHE_GROUPS" => "N",	// Учитывать права доступа
	"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
	"META_KEYWORDS" => "",	// Установить ключевые слова страницы из свойства
	"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
	"META_DESCRIPTION" => "",	// Установить описание страницы из свойства
	"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
	"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
	"DISPLAY_COMPARE" => "N",	// Выводить кнопку сравнения
	"SET_TITLE" => "N",	// Устанавливать заголовок страницы
	"SET_STATUS_404" => "N",	// Устанавливать статус 404, если не найдены элемент или раздел
	"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
	"PRICE_CODE" => array(	// Тип цены
		0 => "Цена продажи",
	),
	"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
	"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
	"PRICE_VAT_INCLUDE" => "N",	// Включать НДС в цену
	"CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
	"BASKET_URL" => "/personal/cart/",	// URL, ведущий на страницу с корзиной покупателя
	"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
	"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
	"USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
	"ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
	"PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
	"PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
	"PRODUCT_PROPERTIES" => array(	// Характеристики товара
		0 => "RECOMMEND_GOODS",
	),
	"PAGER_TEMPLATE" => "",	// Шаблон постраничной навигации
	"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
	"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
	"PAGER_TITLE" => "",	// Название категорий
	"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
	"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
	"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
	"OFFERS_FIELD_CODE" => array(	// Поля предложений
		0 => "",
		1 => "",
	),
	"OFFERS_PROPERTY_CODE" => array(	// Свойства предложений
		0 => "CML2_ARTICLE",
		1 => "CML2_BASE_UNIT",
		2 => "MORE_PHOTO",
		3 => "CML2_MANUFACTURER",
		4 => "CML2_TRAITS",
		5 => "CML2_TAXES",
		6 => "FILES",
		7 => "CML2_ATTRIBUTES",
		8 => "CML2_BAR_CODE",
		9 => "",
	),
	"OFFERS_SORT_FIELD" => "",	// По какому полю сортируем предложения товара
	"OFFERS_SORT_ORDER" => "",	// Порядок сортировки предложений товара
	"OFFERS_SORT_FIELD2" => "",	// Поле для второй сортировки предложений товара
	"OFFERS_SORT_ORDER2" => "",	// Порядок второй сортировки предложений товара
	"PRODUCT_DISPLAY_MODE" => "N",	// Схема отображения
	"ADD_PICT_PROP" => "-",	// Дополнительная картинка основного товара
	"LABEL_PROP" => "-",	// Свойство меток товара
	"OFFERS_CART_PROPERTIES" => array(	// Свойства предложений, добавляемые в корзину
		0 => "CML2_ARTICLE",
	)
	),
	false
);?>
			
			
						
							
							
							
							
			</div>
			<?
	require($_SERVER["DOCUMENT_ROOT"]."/include/subscribe.php");
	
?>