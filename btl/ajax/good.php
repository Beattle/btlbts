<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
CModule::IncludeModule("sale");

$res = CIBlockElement::GetByID($_REQUEST["id"]);
if($ar_res = $res->GetNext())
{

	if(intval($ar_res["DETAIL_PICTURE"])>0)
	{

		$img=CFile::ResizeImageGet($ar_res["DETAIL_PICTURE"], array('width'=>90, 'height'=>90), BX_RESIZE_IMAGE_EXACT, true);
	}
	else $img["src"]="/upload/no-photo_100x100.jpg";

	if($ar_res["IBLOCK_ID"]==7)
	{
		$price=CPrice::GetBasePrice($_REQUEST["id"]);
		$arResult["PRICES"] = CIBlockPriceTools::GetCatalogPrices(1, array(	0 => "Цена продажи"));
		$arOffers = CIBlockPriceTools::GetOffersArray(
		array(
		'IBLOCK_ID' => 1,
		'HIDE_NOT_AVAILABLE' => "N",
		)
		,array(0=>$_REQUEST["id"])
		,array(
		$arParams["OFFERS_SORT_FIELD"] => "SORT",
		$arParams["OFFERS_SORT_FIELD2"] => "ASC",
		)
		,array()
		,array()
		,0
		, $arResult["PRICES"]
		,"Y"
		,$arConvertParams
		);

		$minprice=0;
		$ot=false;
		$n=0;
		foreach($arOffers as $arOffer)
		{


			foreach ($arOffer['PRICES'] as &$arOnePrices)
			{
				$n++;
				if($arOnePrices["DISCOUNT_VALUE"]>0 && $arOnePrices["DISCOUNT_VALUE"]<$arOnePrices["VALUE"])
				{
					$pr=$arOnePrices["DISCOUNT_VALUE"];
				}
				else $pr=$arOnePrices["VALUE"];
				if($pr>$minprice) $minprice=$pr;
			}

		}
		if($n>1) $ot=true;

	}
?>
<input type="hidden" name="form_text_9" value="<?=$ar_res["NAME"]?> [<?=$_REQUEST["id"]?>]"/>
					<a href="<?=$ar_res["DETAIL_PAGE_URL"]?>" class="product_image"><img width="90" height="90" src="<?=$img["src"]?>" alt="<?=$ar_res["NAME"]?>"></a>
					
				<div class="product_info" >
					<a class="product_name" href="<?=$ar_res["DETAIL_PAGE_URL"]?>"><?=$ar_res["NAME"]?></a>
					<?
					if(intval($minprice)>0)
					{
					?>
					<div class="price">цена: <span class="value"><?=CurrencyFormat($minprice,"RUB")?></span></div>
					<?}?>
					<div class="quantity">
						<div class="quantity_title">количество:</div>
						<input class="quantity_field" type="text" value="1" name="form_text_10">
					</div>
				</div>

	
<?
}
?>