<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="main_news_item">


	<? if ($arResult["PROPERTIES"]["PICTURES"]["VALUE"]) { ?>
		<div class="carusell carusell2 mbxslider7 carusell_ind">
			<ul class="bxslider7">
				<?php
				foreach ($arResult["PROPERTIES"]["PICTURES"]["VALUE"] as $k => $v) {
						echo "<li><div>";
						$image = CFile::ResizeImageGet($arResult["PROPERTIES"]["PICTURES"]["VALUE"][($k)], array("width" => 118, "height" => 106), BX_RESIZE_IMAGE_EXACT, true);
						if ($image) {
							?>
							<a class="fancybox" href="<?= CFile::GetPath($arResult["PROPERTIES"]["PICTURES"]["VALUE"][($k)]) ?>">
								<img src="<?= $image['src'] ?>" width="<?= $image['width'] ?>" height="<?= $image['height'] ?>" alt="<?= $arResult["NAME"] ?>"/>
							</a>
							<?php
						}
						echo "</div></li>";
				}

				?>
			</ul>
		</div>
	<?php } ?>


	<h1 class="heading"><?=$arResult["NAME"]?></h1>
	<div class="date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></div>
	<div class="main_news_content">
		<?if ($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])) {
			$img=CFile::ResizeImageGet($arResult["DETAIL_PICTURE"]["ID"], array('width'=>200, 'height'=>150), BX_RESIZE_IMAGE_EXACT, true);
			?>
			<div class="news_pic"><a title="<?=$arResult["NAME"]?>" href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" class="fancybox"><img src="<?=$img["src"]?>" title="<?=$arResult["NAME"]?>"  alt="<?=$arResult["NAME"]?>"></a></div>
		<? } ?>
	<?echo $arResult["DETAIL_TEXT"];?>
	</div>


	<? if ($arResult["PROPERTIES"]["STANKI"]["VALUE"]) { ?>
		<div class="carusell mbxslider5">
			<h2>Оборудование к новости</h2>
			<ul class="bxslider5">
				<?php
				foreach ($arResult["PROPERTIES"]["STANKI"]["VALUE"] as $k => $v) {

					$stan .=  "<li><div class=\"bl_prodduct\">";
					$image = CFile::ResizeImageGet($v["DETAIL_PICTURE"], array("width" => 119, "height" => 103), BX_RESIZE_IMAGE_EXACT, true);
					if ($image) {
						$stan .= '
                                    <div class="bl_img">
                                        <img src="'.$image['src'].'" width="'.$image['width'].'" height="'. $image['height'].'" alt="'.$arResult["NAME"]. '"/>
                                    </div>
                                    <a href="'.($v["DETAIL_PAGE_URL"]).'" class="name_pr" target="_blank">'.$v["NAME"].'</a>
                                    ';
					}
					$stan .= "</div></li>";
				}
				echo $stan;
				?>
			</ul>
		</div>
	<? } ?>

	<? if ($arResult["PROPERTIES"]["INSTRUMENTS"]["VALUE"]) { ?>
		<div class="carusell mbxslider5">
			<h2>Дополнительное оборудование к новости</h2>
			<ul class="bxslider5">
				<?php
				foreach ($arResult["PROPERTIES"]["INSTRUMENTS"]["VALUE"] as $k => $v) {
					$instr .=  "<li><div class=\"bl_prodduct\">";
					$image = CFile::ResizeImageGet($v["DETAIL_PICTURE"], array("width" => 119, "height" => 103), BX_RESIZE_IMAGE_EXACT, true);
					if ($image) {
						$instr .= '
                                    <div class="bl_img">
                                        <img src="'.$image['src'].'" width="'.$image['width'].'" height="'. $image['height'].'" alt="'.$arResult["NAME"]. '"/>
                                    </div>
                                    <a href="'.("http://btools.ru" . $v["DETAIL_PAGE_URL"]).'" class="name_pr" target="_blank">'.$v["NAME"].'</a>
                                    ';
					}
					$instr .= "</div></li>";
				}
				echo $instr;
				?>
			</ul>
		</div>
	<? } ?>

</div>