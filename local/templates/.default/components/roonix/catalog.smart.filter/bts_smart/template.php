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
<div class="catalog_filters clearfix">
	<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
		<? foreach ($arResult["HIDDEN"] as $arItem) { ?>
			<input type="hidden" name="<? echo $arItem["CONTROL_NAME"] ?>" id="<? echo $arItem["CONTROL_ID"] ?>"
				   value="<? echo $arItem["HTML_VALUE"] ?>"/>
		<? } ?>
		<?
		$f = true;

		$str = '';
		foreach ($arResult["ITEMS"] as $k => $arItem) { ?>
			<? if ($arItem["PROPERTY_TYPE"] == "N"){ ?>

			<div class="left_side">
				<div class="sliderui_item">
					<label for="parametr1_from">Цена</label>
					<div class="values">
						от <input class="sluderui_value" type="text" name="<? echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"] ?>"
								  id="parametr1_from" value="<? echo $arItem["VALUES"]["MIN"]["HTML_VALUE"] ?>" size="5"
								  onkeyup="smartFilter.keyup(this)"/>
						до <input class="sluderui_value" type="text" name="<? echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"] ?>"
								  id="parametr1_to" value="<? echo $arItem["VALUES"]["MAX"]["HTML_VALUE"] ?>" size="5"
								  onkeyup="smartFilter.keyup(this)"/>
						руб.
					</div>
					<div id="slider-range1"></div>
				</div>
				<script>
					$(function () {
						$("#slider-range1").slider({
							range: true,
							min: <?=intval($arItem["VALUES"]["MIN"]["VALUE"])?>,
							max: <?=intval($arItem["VALUES"]["MAX"]["VALUE"])?>,
							values: [<?=(!empty($arItem["VALUES"]["MIN"]["HTML_VALUE"])?$arItem["VALUES"]["MIN"]["HTML_VALUE"]:0)?>, <?=(!empty($arItem["VALUES"]["MAX"]["HTML_VALUE"])?$arItem["VALUES"]["MAX"]["HTML_VALUE"]:intval($arItem["VALUES"]["MAX"]["VALUE"]))?>],
							slide: function (event, ui) {
								$("#parametr1_from").val(ui.values[0]);
								$("#parametr1_to").val(ui.values[1]);
							}
						});
						$("#parametr1_from").val($("#slider-range1").slider("values", 0));
						$("#parametr1_to").val($("#slider-range1").slider("values", 1));
					});
				</script>
				<?
				};
			};

							foreach($arResult["ITEMS"] as $k=>$arItem):
							if($arItem["PROPERTY_TYPE"] != "N" && !isset($arItem["PRICE"]) && !empty($arItem["VALUES"])):

							if ($f) {
								$f=false;
								?>
								</div>
								<div class="right_side">
								<? } ?>
							<?
							$dsp=false;
							foreach($arItem["VALUES"] as $val => $ar) {
								if($_REQUEST[$ar["CONTROL_NAME"]]==$ar["HTML_VALUE"] && empty($_REQUEST["del_filter"])) $dsp=true;
							} ?>

							<div class="manufacturers_filter<?=($dsp?' showed-params':'')?>">
								<div class="heading"><?=$arItem["NAME"]?></div>
								<ul id="ul_<?echo $arItem["ID"]?>" <?=($dsp?'style="display:block;"':'')?>>
									<li class="clearfix"><a class="select_all" href="#">Выбрать все</a></li>
									<? foreach($arItem["VALUES"] as $val => $ar) {
										if($_REQUEST[$ar["CONTROL_NAME"]]==$ar["HTML_VALUE"]) $str.='<input type="hidden" name="'.$ar["CONTROL_NAME"].'" value="'.$ar["HTML_VALUE"].'" id="'.$ar["CONTROL_NAME"].'"/>';
									?>
									<li class="clearfix"><a class="man_name<?=($_REQUEST[$ar["CONTROL_NAME"]]==$ar["HTML_VALUE"] && empty($_REQUEST["del_filter"])?" active":"")?>" href="<?echo $ar["CONTROL_NAME"]?>" rel="<?echo $ar["HTML_VALUE"]?>"><?echo $ar["VALUE"];?></a><a <?=($_REQUEST[$ar["CONTROL_NAME"]]==$ar["HTML_VALUE"] && empty($_REQUEST["del_filter"])?'style="display:block;"':"")?> class="close" href="<?echo $ar["CONTROL_NAME"]?>" >Отменить</a></li>
									<? } ?>
								</ul>
							</div>
				<? endif; ?>
			<? endforeach;

			if ($f) {
				$f=false; ?>
				</div>
				<div class="right_side">
			<? } ?>

			<div id="valdf" style="display:none;"><? if(empty($_REQUEST["del_filter"])) echo $str; ?></div>


			<div class="filter-buttons">
				<a class="clear_filters" id="clear_filters" href="#">очистить</a>
				<input class="filters_submit" type="submit" id="set_filter" name="set_filter" value="Фильтровать" />
			</div>
			</div>

			<div class="modef" id="modef" <?if(!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"';?>>
				<?echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
				<a href="<?echo $arResult["FILTER_URL"]?>" class="showchild"><?echo GetMessage("CT_BCSF_FILTER_SHOW")?></a>
				<!--<span class="ecke"></span>-->
			</div>

	</form>
</div>

<script>
$(function() {

	$( "#slider-range2" ).slider({
		range: true,
		min: 0,
		max: 300000,
		values: [30000, 270000],
		slide: function( event, ui ) {
			$( "#parametr2_from" ).val(ui.values[ 0 ]);
			$( "#parametr2_to" ).val(ui.values[ 1 ]);
		}
	});
	$( "#parametr2_from" ).val($( "#slider-range2" ).slider( "values", 0 ));
	$( "#parametr2_to" ).val($( "#slider-range2" ).slider( "values", 1 ));
	$( "#slider-range3" ).slider({
		range: true,
		min: 0,
		max: 300000,
		values: [30000, 270000],
		slide: function( event, ui ) {
			$( "#parametr3_from" ).val(ui.values[ 0 ]);
			$( "#parametr3_to" ).val(ui.values[ 1 ]);
		}
	});
	$( "#parametr3_from" ).val($( "#slider-range3" ).slider( "values", 0 ));
	$( "#parametr3_to" ).val($( "#slider-range3" ).slider( "values", 1 ));
	$( "#slider-range4" ).slider({
		range: true,
		min: 0,
		max: 300000,
		values: [30000, 270000],
		slide: function( event, ui ) {
			$( "#parametr4_from" ).val(ui.values[ 0 ]);
			$( "#parametr4_to" ).val(ui.values[ 1 ]);
		}
	});
	$( "#parametr4_from" ).val($( "#slider-range4" ).slider( "values", 0 ));
	$( "#parametr4_to" ).val($( "#slider-range4" ).slider( "values", 1 ));

	$("#parametr1_from").keyup(function() {
		$( "#slider-range1" ).slider({
			values: [$(this).val(), $('#parametr1_to').val()]
		});
	});
	$("#parametr1_to").keyup(function() {
		$( "#slider-range1" ).slider({
			values: [$('#parametr1_from').val(), $(this).val()]
		});
	});
	$("#parametr2_from").keyup(function() {
		$( "#slider-range2" ).slider({
			values: [$(this).val(), $('#parametr2_to').val()]
		});
	});
	$("#parametr2_to").keyup(function() {
		$( "#slider-range2" ).slider({
			values: [$('#parametr2_from').val(), $(this).val()]
		});
	});
	$("#parametr3_from").keyup(function() {
		$( "#slider-range3" ).slider({
			values: [$(this).val(), $('#parametr3_to').val()]
		});
	});
	$("#parametr3_to").keyup(function() {
		$( "#slider-range3" ).slider({
			values: [$('#parametr3_from').val(), $(this).val()]
		});
	});
});
</script>