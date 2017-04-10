<? if(!ISINDEX) {
	if ($pathArray[2] === 'articles' ||
		$pathArray[2] === 'exhibitions' ||
		$pathArray[2] === 'requisites' ||
		$pathArray[2] === 'technology' ||
		$pathArray[2] === 'news' ||
		$pathArray[1] === 'service' ||
		$pathArray[1] === 'auth' ||
		$pathArray[1] === 'register' ||
		ERROR_404 == 'Y' || ERROR_403 == 'Y'){
		?>
		</aside>
	<?} else {?>
		</div>
	<?}?>
<? } ?>

	<footer>
		<div class="wrap-back-top">
			<div class="back-top"></div>
		</div>
		<div class="footer">
			<? $APPLICATION->IncludeFile("/include/menu_footer.php", Array(), Array("MODE" => "html")); ?>
		</div>
	</footer>
</div>

<div id="fadescreen">&nbsp;</div>

<div class="popupotziv review_add">
	<a class="close_popup" href="#">Закрыть</a>
	<div class="heading">Оставить отзыв</div>
	<div id="comment_data">
		<?$APPLICATION->IncludeComponent(
			"bitrix:iblock.element.add.form",
			"comment",
			Array(
				"IBLOCK_TYPE" => "catalogue",
				"IBLOCK_ID" => "23",
				"STATUS_NEW" => "NEW",
				"LIST_URL" => "",
				"USE_CAPTCHA" => "N",
				"USER_MESSAGE_EDIT" => "Спасибо, Ваш отзыв добавлен. После модерации он появится в списке отзывов.",
				"USER_MESSAGE_ADD" => "Спасибо, Ваш отзыв добавлен. После модерации он появится в списке отзывов.",
				"DEFAULT_INPUT_SIZE" => "30",
				"RESIZE_IMAGES" => "N",
				"PROPERTY_CODES" => array("71","75","NAME","PREVIEW_TEXT"),
				"PROPERTY_CODES_REQUIRED" => array("NAME","PREVIEW_TEXT"),
				"GROUPS" => array("2"),
				"STATUS" => "ANY",
				"ELEMENT_ASSOC" => "CREATED_BY",
				"MAX_USER_ENTRIES" => "100000",
				"MAX_LEVELS" => "100000",
				"LEVEL_LAST" => "Y",
				"MAX_FILE_SIZE" => "0",
				"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
				"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
				"SEF_MODE" => "N",
				"CUSTOM_TITLE_NAME" => "Ваше имя",
				"CUSTOM_TITLE_TAGS" => "",
				"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
				"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
				"CUSTOM_TITLE_IBLOCK_SECTION" => "",
				"CUSTOM_TITLE_PREVIEW_TEXT" => "Ваш отзыв",
				"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
				"CUSTOM_TITLE_DETAIL_TEXT" => "",
				"CUSTOM_TITLE_DETAIL_PICTURE" => ""
			)
		);?>
	</div>
</div>

<div class="popup" id="popup">
<?
$APPLICATION->IncludeComponent("vetalkms:empty", "bts_call", array(
	"WEB_FORM_ID" => "4",
	"VARIABLE_ALIASES" => array(
		"WEB_FORM_ID" => "WEB_FORM_ID",
		"RESULT_ID" => "RESULT_ID",
	),
), false);
?>
</div>

<div class="popup" id="popup5">
	<?
	$APPLICATION->IncludeComponent("vetalkms:empty", "bts_service", array(
		"WEB_FORM_ID" => "5",
		"FORM_NAME" => "bts_get_pusk",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		),
	), false);
	?>
</div>

<div class="popup" id="popup6">
	<?
	$APPLICATION->IncludeComponent("vetalkms:empty", "bts_service", array(
		"WEB_FORM_ID" => "6",
		"FORM_NAME" => "bts_get_rem",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		),
	), false);
	?>
</div>


<? if (ISPRODUCTION) { ?>
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
		(function (d, w, c) {
			(w[c] = w[c] || []).push(function () {
				try {
					w.yaCounter40571375 = new Ya.Metrika({
						id: 40571375,
						clickmap: true,
						trackLinks: true,
						accurateTrackBounce: true,
						webvisor: true,
						trackHash: true
					});
				} catch (e) {
				}
			});

			var n = d.getElementsByTagName("script")[0],
				s = d.createElement("script"),
				f = function () {
					n.parentNode.insertBefore(s, n);
				};
			s.type = "text/javascript";
			s.async = true;
			s.src = "https://mc.yandex.ru/metrika/watch.js";
			if (w.opera == "[object Opera]") {
				d.addEventListener("DOMContentLoaded", f, false);
			} else {
				f();
			}
		})(document, window, "yandex_metrika_callbacks");
	</script>
	<noscript>
		<div><img src="https://mc.yandex.ru/watch/40571375" style="position:absolute; left:-9999px;" alt=""/></div>
	</noscript>
	<!-- /Yandex.Metrika counter -->

	<script>
		(function (i, s, o, g, r, a, m) {
			i['GoogleAnalyticsObject'] = r;
			i[r] = i[r] || function () {
					(i[r].q = i[r].q || []).push(arguments)
				}, i[r].l = 1 * new Date();
			a = s.createElement(o),
				m = s.getElementsByTagName(o)[0];
			a.async = 1;
			a.src = g;
			m.parentNode.insertBefore(a, m)
		})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
		ga('create', 'UA-86461836-2', 'auto');
		ga('require', 'displayfeatures');
		ga('send', 'pageview');
	</script>

	<script crossorigin="anonymous" async type="text/javascript" src="//api.pozvonim.com/widget/callback/v3/5f23f1490f03a0bf1f5ac27c7d3a3225/connect" id="check-code-pozvonim" charset="UTF-8"></script>
<? } ?>

</body>
</html>