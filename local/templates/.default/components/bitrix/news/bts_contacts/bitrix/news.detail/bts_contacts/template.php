<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? //echo "<pre>".print_r($arResult, 1)."</pre>"?>
<div>
	<h1 class="heading">Филиал в г. <?=$arResult["NAME"]?></h1>
</div>
<? if ($arResult["DISPLAY_PROPERTIES"]["ADDRESS"]["VALUE"]) { ?>
	<div class="address"><strong>Наш адрес:</strong> <?=$arResult["DISPLAY_PROPERTIES"]["ADDRESS"]["VALUE"]?></div>
<? } ?>
<? if ($arResult["DISPLAY_PROPERTIES"]["OURTEL"]["VALUE"]) { ?>
	<div class="ourphone"><strong>Наш телефон:</strong> <?=$arResult["DISPLAY_PROPERTIES"]["OURTEL"]["VALUE"]?></div>
<? } ?>
<? if ($arResult["PREVIEW_TEXT"] == "123") { ?>
	<div class="textprev"><?=$arResult["PREVIEW_TEXT"]?></div>
<? } ?>
<? if ($arResult["DISPLAY_PROPERTIES"]["OURBRANCH"]["LINK_ELEMENT_VALUE"]) { ?>
<div class="peoples"><strong>Наши сотрудники:</strong><br />
	<ul>
	<?php
		foreach($arResult["DISPLAY_PROPERTIES"]["OURBRANCH"]["LINK_ELEMENT_VALUE"] as $k => $v) { ?>
			<li>
				<div>
					<?
					$image = CFile::ResizeImageGet($v["PREVIEW_PICTURE"], array("width" => 200, "height" => 250), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);
					if ($image) {
						?>
						<a class="fancybox" href="<?= CFile::GetPath($v["PREVIEW_PICTURE"]) ?>">
							<img src="<?= $image['src'] ?>" width="<?= $image['width'] ?>" height="<?= $image['height'] ?>" alt="<?= $arResult["NAME"] ?>"/>
						</a>
						<?php
					}
					?>
				</div>
				<div class="username"><?=$v["NAME"]?></div>
				<? if($v["PROP"]["PROPERTY_DOLG_VALUE"]) { ?>
				<p><strong>Должность:</strong></p>
				<div><?=$v["PROP"]["PROPERTY_DOLG_VALUE"]?></div>
				<? } ?>
				<? if($v["PROP"]["PROPERTY_TEL_VALUE"]) { ?>
				<p><strong>Телефон:</strong></p>
				<div><?=$v["PROP"]["PROPERTY_TEL_VALUE"]?></div>
				<? } ?>
				<? if($v["PROP"]["PROPERTY_EMAIL_VALUE"]) { ?>
				<p><strong>E-mail:</strong></p>
				<div><?=$v["PROP"]["PROPERTY_EMAIL_VALUE"]?></div>
				<? } ?>
				<? if($v["PROP"]["PROPERTY_ZONA_VALUE"]) { ?>
				<p><strong>Зона ответственности:</strong></p>
				<div><?=$v["PROP"]["PROPERTY_ZONA_VALUE"]?></div>
				<? } ?>
			</li>
	<? } ?>
	</ul>

</div>
<? } ?>


<? //echo "<pre>".print_r($arResult["DISPLAY_PROPERTIES"]["MAPPIC"], 1)."</pre>"?>

<? if ( $arResult["DISPLAY_PROPERTIES"]["MAPPIC"]["FILE_VALUE"]) { ?>
	<div class="sheme"><strong>Схема проезда:</strong><br />
		<ul>
			<?php
			if ($arResult["DISPLAY_PROPERTIES"]["MAPPIC"]["FILE_VALUE"]["ID"]) { ?>
				<li>
					<div>
						<?
						$image = CFile::ResizeImageGet($arResult["DISPLAY_PROPERTIES"]["MAPPIC"]["FILE_VALUE"]["ID"], array("width" => 300, "height" => 250), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);
						if ($image) { ?>
							<a class="fancybox" href="<?= CFile::GetPath($arResult["DISPLAY_PROPERTIES"]["MAPPIC"]["FILE_VALUE"]["SRC"]) ?>">
								<img src="<?= $image['src'] ?>" width="<?= $image['width'] ?>" height="<?= $image['height'] ?>" alt="<?= $arResult["NAME"] ?>"/>
							</a>
							<?php
						}
						?>
					</div>
				</li>
			<? } else {
				foreach ($arResult["DISPLAY_PROPERTIES"]["MAPPIC"]["FILE_VALUE"] as $k) { ?>
					<li>
						<div>
							<?
							$image = CFile::ResizeImageGet($k["ID"], array("width" => 300, "height" => 250), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);
							if ($image) { ?>
								<a class="fancybox" href="<?= CFile::GetPath($k["SRC"]) ?>">
									<img src="<?= $image['src'] ?>" width="<?= $image['width'] ?>"
										 height="<?= $image['height'] ?>" alt="<?= $arResult["NAME"] ?>"/>
								</a>
								<?php
							}
							?>
						</div>
					</li>
				<? }
			} ?>
		</ul>

	</div>
<? } ?>

<? if ($arResult["DISPLAY_PROPERTIES"]["MAPPRINT"]["FILE_VALUE"]["SRC"]) { ?>
	<?php if (isset($arResult["DISPLAY_PROPERTIES"]["MAPPRINT"]["FILE_VALUE"]["SRC"])) { ?>
		<div class="print_sheme"><a href="<?= $arResult["DISPLAY_PROPERTIES"]["MAPPRINT"]["FILE_VALUE"]["SRC"] ?>" target="_blank">Распечатать схему проезда</a></div>
	<? }
} elseif (is_array($arResult["DISPLAY_PROPERTIES"]["MAPPRINT"]["FILE_VALUE"])) {
	foreach ($arResult["DISPLAY_PROPERTIES"]["MAPPRINT"]["FILE_VALUE"] as $kmapprint => $vmapprint) { ?>
		<div class="print_sheme"><a href="<?= $vmapprint["SRC"] ?>" target="_blank">Распечатать схему проезда</a></div>
	<? }
} ?>

<? //echo "<pre>".print_r($arResult, 1)."</pre>"?>
