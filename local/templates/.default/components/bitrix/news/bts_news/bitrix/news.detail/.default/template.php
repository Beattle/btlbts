<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="main_news_item">
				<h1 class="heading"><?=$arResult["NAME"]?></h1>
				<div class="date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></div>
				<div class="main_news_content">
					<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img class="detail_picture" border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>"  title="<?=$arResult["NAME"]?>" />
	<?endif?>

					<p><?echo $arResult["DETAIL_TEXT"];?></p>
				</div>
			</div>