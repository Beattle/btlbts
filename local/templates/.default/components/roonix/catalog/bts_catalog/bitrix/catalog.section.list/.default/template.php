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


$CURRENT_DEPTH=$arResult["SECTION"]["DEPTH_LEVEL"]+1;
$strTitle = "";
?>
<div class="choose_types">
				
				<div class="items clearfix">
									
<?
foreach($arResult["SECTIONS"] as $arSection):?>
<a class="item" href="<?=$arSection["SECTION_PAGE_URL"]?>">
						<div class="type_name"><?=$arSection["NAME"]?></div>
						<?
						if(intval($arSection["PICTURE"]["ID"])>0)
						{
							$img=CFile::ResizeImageGet($arSection["PICTURE"]["ID"], array('width'=>158, 'height'=>118), BX_RESIZE_IMAGE_EXACT, true);
							
						}
						else $img["src"]="/upload/no-photo_158x118.jpg";
							
						?>
						<img class="type_image" src="<?=$img["src"]?>" alt="<?=$arSection["NAME"]?>">
					</a>
	<?endforeach?>
	</div>
			</div>