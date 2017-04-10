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
<ul>
    <?
    $CURRENT_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"] + 1;
    $z = 0;
    $f1 = false;
    $f2 = false;
    foreach ($arResult["SECTIONS"] as $k => $arSection) {
    	if ($arSection["DEPTH_LEVEL"] == 1 || $arSection["DEPTH_LEVEL"] == 2) {
    		if ($f2) {
    			$f2 = false; ?>
				</ul>
			<? }
		}
		if ($arSection["DEPTH_LEVEL"] == 1) {
			if ($f1) { ?>
    			</ul></div></div></li>
    			<? $f1 = false;
			}
			$z++;
			if ($arResult["SECTIONS"][$k + 1]["DEPTH_LEVEL"] == 2) {
				$f1 = true; ?>
				<li>
					<a class="catalog_item<?= $z ?>" href="<?= $arSection["SECTION_PAGE_URL"] ?>"><?= $arSection["NAME"] ?></a>
					<div class="child_block">
						<a class="main_category" href="<?= $arSection["SECTION_PAGE_URL"] ?>"><?= $arSection["NAME"] ?></a>
						<div class="menu_column">
							<ul> <?
                } else {
                    $f1 = false; ?>
                    <li><a class="catalog_item<?= $z ?>"  href="<?= $arSection["SECTION_PAGE_URL"] ?>"><?= $arSection["NAME"] ?></a></li>
                <? }
                }
                if ($arSection["DEPTH_LEVEL"] == 2) {
                if ($arResult["SECTIONS"][$k + 1]["DEPTH_LEVEL"] == 3) {
                $f2 = true; ?>
                <li>
                    <div class="has_child">&nbsp;</div>
                    <a href="<?= $arSection["SECTION_PAGE_URL"] ?>"><?= $arSection["NAME"] ?> (<?= $arSection["ELEMENT_CNT"] ?>)</a>
                    <ul>
                        <? } else {
                            $f2 = false; ?>
                            <li>
                                <div class="no_child">&nbsp;</div>
                                <a href="<?= $arSection["SECTION_PAGE_URL"] ?>"><?= $arSection["NAME"] ?> (<?= $arSection["ELEMENT_CNT"] ?>)</a>
                            </li>
                        <? }
                        }
                        if ($arSection["DEPTH_LEVEL"] == 3) { ?>
                            <li>
                                <div class="no_child">&nbsp;</div>
                                <a href="<?= $arSection["SECTION_PAGE_URL"] ?>"><?= $arSection["NAME"] ?> (<?= $arSection["ELEMENT_CNT"] ?>)</a>
                            </li>
                        <? }
                        }
                        if ($f2) {
                        $f2 = false; ?>
                    </ul>
                </li>
            <? }
            if ($f1) { ?>
            </ul>
        </div>
    </div>
</li> <?
$f1 = false;
} ?>
</ul>
