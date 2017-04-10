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


    $z = 0;
    $f1 = false;
    $f2 = false;
    foreach ($arResult["SECTIONS"] as $k => $arSection) {
    if ($arSection["DEPTH_LEVEL"] == 1 || $arSection["DEPTH_LEVEL"] == 2) {
    if ($f2) {
    $f2 = false; ?>

        </ul></div>

<? }
}
if ($arSection["DEPTH_LEVEL"] == 1) {
if ($f1) { ?>
    </div>
    </li>
    </ul>
    </div>
    </div>

    <? $f1 = false;
}
$z++;
if ($arResult["SECTIONS"][$k + 1]["DEPTH_LEVEL"] == 2) {
$f1 = true; ?>
<div class="accordionbig">
    <div class="namerazdelclild">
        <div class="namerazdel"><?= $arSection["NAME"] ?></div>
        <ul class="ul-big">
            <li>
                <div class="accordion">
                <? }
                }
                if ($arSection["DEPTH_LEVEL"] == 2) {
                if ($arResult["SECTIONS"][$k + 1]["DEPTH_LEVEL"] == 3) {
                $f2 = true; ?>


                    <h3><a href="<?= "/".$arParams["BASE_SECTION_CODE"].$arSection["SECTION_PAGE_URL"] ?>"><?= $arSection["NAME"] ?> (<?= $arSection["ELEMENT_CNT"] ?>)</a></h3>
                    <div>
                    <ul class="ul-small">
                        <? } else {
                            $f2 = false; ?>
                            <a href="<?= "/".$arParams["BASE_SECTION_CODE"].$arSection["SECTION_PAGE_URL"] ?>"><div class="h3"><?= $arSection["NAME"] ?> (<?= $arSection["ELEMENT_CNT"] ?>)</div></a>

                        <? }
                        }
                        if ($arSection["DEPTH_LEVEL"] == 3) { ?>
                            <li>
                                <a href="<?= "/".$arParams["BASE_SECTION_CODE"].$arSection["SECTION_PAGE_URL"] ?>"><?= $arSection["NAME"] ?> (<?= $arSection["ELEMENT_CNT"] ?>)</a>
                            </li>
                        <? }
                        }
                        if ($f2) {
                        $f2 = false; ?>

                        </ul>
                        </div>

            <? }
            if ($f1) { ?>
                </div>
            </li>

</ul>
    </div>
</div>
            <?
$f1 = false;
} ?>
