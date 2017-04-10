<?

if ($APPLICATION->GetCurPage() != "/" && substr_count($APPLICATION->GetCurPage(), "/catalog/") == 0 && substr_count($APPLICATION->GetCurPage(), "/festool/") == 0 && substr_count($APPLICATION->GetCurPage(), "/contacts/") == 0 && substr_count($APPLICATION->GetCurPage(), "/about/news/") == 0 && substr_count($APPLICATION->GetCurPage(), "/about/certificates/") == 0 && substr_count($APPLICATION->GetCurPage(), "/support/articles/") == 0 && substr_count($APPLICATION->GetCurPage(), "/support/faq/") == 0 && substr_count($APPLICATION->GetCurPage(), "/support/video/") == 0 && substr_count($APPLICATION->GetCurPage(), "/actions/") == 0 && substr_count($APPLICATION->GetCurPage(), "/personal/cart/") == 0 && !defined("ERROR_404") && substr_count($APPLICATION->GetCurPage(), "/personal/order/") == 0) {
    ?>                </div></div>
    <?
}

if (substr_count($APPLICATION->GetCurPage(), "/contacts/") > 0) {
    ?>
    </div>
    </div>
    <?
}

?>

</article>
</main>
<footer class="footer">
    <div class="inner clearfix">
        <nav class="footer_navs">
            <ul>
                <? $APPLICATION->IncludeComponent("roonix:menu", "footer", array(
                    "ROOT_MENU_TYPE" => "top",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_USE_GROUPS" => "N",
                    "MENU_CACHE_GET_VARS" => array(),
                    "MAX_LEVEL" => "2",
                    "CHILD_MENU_TYPE" => "left",
                    "USE_EXT" => "N",
                    "DELAY" => "N",
                    "SECT_NAME" => "О компании",
                    "ALLOW_MULTI_SELECT" => "N"
                ),
                    false
                ); ?>
            </ul>
            <ul>
                <? $APPLICATION->IncludeComponent("roonix:menu", "footer", array(
                    "ROOT_MENU_TYPE" => "top",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_USE_GROUPS" => "N",
                    "MENU_CACHE_GET_VARS" => array(),
                    "MAX_LEVEL" => "2",
                    "CHILD_MENU_TYPE" => "left",
                    "USE_EXT" => "N",
                    "DELAY" => "N",
                    "SECT_NAME" => "Оплата и доставка",
                    "ALLOW_MULTI_SELECT" => "N"
                ),
                    false
                ); ?>
            </ul>
            <ul>
                <? $APPLICATION->IncludeComponent("roonix:menu", "footer", array(
                    "ROOT_MENU_TYPE" => "top",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_USE_GROUPS" => "N",
                    "MENU_CACHE_GET_VARS" => array(),
                    "MAX_LEVEL" => "2",
                    "CHILD_MENU_TYPE" => "left",
                    "USE_EXT" => "N",
                    "DELAY" => "N",
                    "SECT_NAME" => "Сервис",
                    "ALLOW_MULTI_SELECT" => "N"
                ),
                    false
                ); ?>
            </ul>
            <ul>
                <? $APPLICATION->IncludeComponent("roonix:menu", "footer", array(
                    "ROOT_MENU_TYPE" => "top",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_USE_GROUPS" => "N",
                    "MENU_CACHE_GET_VARS" => array(),
                    "MAX_LEVEL" => "2",
                    "CHILD_MENU_TYPE" => "left",
                    "USE_EXT" => "N",
                    "DELAY" => "N",
                    "SECT_NAME" => "Клиентская поддержка",
                    "ALLOW_MULTI_SELECT" => "N"
                ),
                    false
                ); ?>
            </ul>

        </nav>
        <div class="footer_info">
            <div class="payment_methods">
                <div class="heading">К оплате принимаем:</div>
                <ul class="clearfix">
                    <? $APPLICATION->IncludeFile("/include/pay.php", Array(), Array("MODE" => "html")); ?>

                </ul>
            </div>
            <div class="socials clearfix">
                <div class="heading">Присоединяйтесь к нам:</div>
                <ul>
                    <? $APPLICATION->IncludeFile("/include/social2.php", Array(), Array("MODE" => "html")); ?>

                </ul>
            </div>
            <div class="other">
                <p>Биржа технологий. Инструмент <strong>Festool</strong> в магазине btools.ru - официальный дилер в
                    Москве.</p>
                <p>Продажа и доставка электроинструмента <strong>фестул</strong> по всей России.</p>
            </div>
        </div>
    </div>
</footer>
<div id="fadescreen">&nbsp;</div>

<div class="popup videot">
    <a class="close_popup" href="#">Закрыть</a>
    <div class="heading">Видеожурнал</div>
    <div id="vcont" style="padding:10px;">
    </div>

</div>


<div class="popup faq">
    <a class="close_popup" href="#">Закрыть</a>
    <div class="heading">Задать вопрос</div>
    <div id="ask_div">
        <? $APPLICATION->IncludeComponent(
            "roonix:iblock.element.add.form",
            "faq",
            Array(
                "IBLOCK_TYPE" => "faq",
                "IBLOCK_ID" => "11",
                "STATUS_NEW" => "NEW",
                "LIST_URL" => "",
                "USE_CAPTCHA" => "N",
                "USER_MESSAGE_EDIT" => "Спасибо, Ваш вопрос добавлен.",
                "USER_MESSAGE_ADD" => "Спасибо, Ваш вопрос добавлен.",
                "DEFAULT_INPUT_SIZE" => "30",
                "RESIZE_IMAGES" => "N",
                "PROPERTY_CODES" => array("66", "67", "NAME", "DATE_ACTIVE_FROM"),
                "PROPERTY_CODES_REQUIRED" => array("66", "67", "NAME"),
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
                "CUSTOM_TITLE_NAME" => "Ваш вопрос",
                "CUSTOM_TITLE_TAGS" => "",
                "CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
                "CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
                "CUSTOM_TITLE_IBLOCK_SECTION" => "",
                "CUSTOM_TITLE_PREVIEW_TEXT" => "",
                "CUSTOM_TITLE_PREVIEW_PICTURE" => "",
                "CUSTOM_TITLE_DETAIL_TEXT" => "",
                "CUSTOM_TITLE_DETAIL_PICTURE" => ""
            )
        ); ?>
    </div>


</div>

<div class="popup buyinoneclick">
    <a class="close_popup" href="#">Закрыть</a>
    <div class="heading">Покупка в 1 клик</div>
    <div class="product clearfix">
        <div id="oneclk">
            <? $APPLICATION->IncludeComponent("bitrix:form.result.new", "oneclick", Array(
                "WEB_FORM_ID" => "2",    // ID веб-формы
                "IGNORE_CUSTOM_TEMPLATE" => "N",    // Игнорировать свой шаблон
                "USE_EXTENDED_ERRORS" => "N",    // Использовать расширенный вывод сообщений об ошибках
                "SEF_MODE" => "N",    // Включить поддержку ЧПУ
                "VARIABLE_ALIASES" => array(
                    "WEB_FORM_ID" => "WEB_FORM_ID",
                    "RESULT_ID" => "RESULT_ID",
                ),
                "CACHE_TYPE" => "A",    // Тип кеширования
                "CACHE_TIME" => "3600",    // Время кеширования (сек.)
                "LIST_URL" => "",    // Страница со списком результатов
                "EDIT_URL" => "",    // Страница редактирования результата
                "SUCCESS_URL" => "",    // Страница с сообщением об успешной отправке
                "CHAIN_ITEM_TEXT" => "",    // Название дополнительного пункта в навигационной цепочке
                "CHAIN_ITEM_LINK" => "",    // Ссылка на дополнительном пункте в навигационной цепочке
            ),
                false
            ); ?>
        </div>
    </div>
</div>


<div class="popup review_add">
    <a class="close_popup" href="#">Закрыть</a>
    <div class="heading">Оставить отзыв</div>
    <div id="comment_data">
        <? $APPLICATION->IncludeComponent(
            "bitrix:iblock.element.add.form",
            "comment",
            Array(
                "IBLOCK_TYPE" => "1c_catalog",
                "IBLOCK_ID" => "12",
                "STATUS_NEW" => "NEW",
                "LIST_URL" => "",
                "USE_CAPTCHA" => "N",
                "USER_MESSAGE_EDIT" => "Спасибо, Ваш отзыв добавлен. После модерации он появится в списке отзывов.",
                "USER_MESSAGE_ADD" => "Спасибо, Ваш отзыв добавлен. После модерации он появится в списке отзывов.",
                "DEFAULT_INPUT_SIZE" => "30",
                "RESIZE_IMAGES" => "N",
                "PROPERTY_CODES" => array("71", "75", "NAME", "PREVIEW_TEXT"),
                "PROPERTY_CODES_REQUIRED" => array("NAME", "PREVIEW_TEXT"),
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
        ); ?>
    </div>
</div>

<div class="popup ordercall">
    <a class="close_popup" href="#">Закрыть</a>
    <div class="heading">Заказать звонок</div>


    <div id="fcall">

        <? $APPLICATION->IncludeComponent("bitrix:form.result.new", "call", Array(
            "WEB_FORM_ID" => "1",    // ID веб-формы
            "IGNORE_CUSTOM_TEMPLATE" => "N",    // Игнорировать свой шаблон
            "USE_EXTENDED_ERRORS" => "N",    // Использовать расширенный вывод сообщений об ошибках
            "SEF_MODE" => "N",    // Включить поддержку ЧПУ
            "VARIABLE_ALIASES" => array(
                "WEB_FORM_ID" => "WEB_FORM_ID",
                "RESULT_ID" => "RESULT_ID",
            ),
            "CACHE_TYPE" => "A",    // Тип кеширования
            "CACHE_TIME" => "3600",    // Время кеширования (сек.)
            "LIST_URL" => "",    // Страница со списком результатов
            "EDIT_URL" => "",    // Страница редактирования результата
            "SUCCESS_URL" => "",    // Страница с сообщением об успешной отправке
            "CHAIN_ITEM_TEXT" => "",    // Название дополнительного пункта в навигационной цепочке
            "CHAIN_ITEM_LINK" => "",    // Ссылка на дополнительном пункте в навигационной цепочке
        ),
            false
        ); ?>

    </div>

</div>


<div class="popup credit">
    <a class="close_popup" href="#">Закрыть</a>
    <div class="heading">Оформить кредит</div>
    <div id="fcredit">
        <form action="" method="POST">
            <label class="credit_label" for="credit_fio">Ваше ФИО<span class="red">*</span>:</label>
            <input class="credit_text" type="text" id="credit_fio" name="NAME">
            <label class="credit_label" for="credit_email">Ваш e-mail:</label>
            <input class="credit_text" type="text" id="credit_email" name="EMAIL">
            <label class="credit_label" for="credit_phone">Ваш номер телефона<span class="red">*</span>:</label>
            <input class="credit_text" type="text" id="credit_phone" name="PHONE">
            <label class="credit_label" for="credit_comment">Ваш комментарий<span class="red">*</span>:</label>
            <textarea class="credit_textarea" id="credit_comment" name="COMMENT"></textarea>
            <input class="credit_submit" type="submit" value="Отправить" name="SEND">
            <input type="hidden" name="SEND" value="Y"/>
        </form>
    </div>
</div>

<section class="float_block">
    <div class="compare">
        <a class="compare_link" href="/compare/">Сравнить товары
            (<?= count($_SESSION["CATALOG_COMPARE_LIST"][1]["ITEMS"]) ?>)</a>
    </div>
    <div class="cart">
        <span class="cart_heading">Корзина:</span> <span
            class="basketready"><? $APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "cart", Array(
                "PATH_TO_BASKET" => SITE_DIR . "personal/cart/",    // Страница корзины
                "PATH_TO_PERSONAL" => SITE_DIR . "personal/",    // Персональный раздел
                "SHOW_PERSONAL_LINK" => "N",    // Отображать персональный раздел
                "SHOW_NUM_PRODUCTS" => "Y",    // Показывать количество товаров
                "SHOW_TOTAL_PRICE" => "Y",    // Показывать общую сумму по товарам
                "SHOW_PRODUCTS" => "N",    // Показывать список товаров
                "POSITION_FIXED" => "N",    // Отображать корзину поверх шаблона
            ),
                false
            ); ?>
            </span>
    </div>
    <div class="login">

        <?
        if ($USER->IsAuthorized()) {
            ?>
            <div class="logout_links">
                <a href="?logout=yes">Выход</a>
            </div>
        <?
        } else {
            ?>
            <div class="login_links">
                <a href="/auth/">Вход</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="/register/">Регистрация</a>
            </div>
            <?
        }

        ?>


    </div>
</section>
<? if (ISPRODUCTION) { ?>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function () {
                try {
                    w.yaCounter40517915 = new Ya.Metrika({
                        id: 40517915,
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
        <div><img src="https://mc.yandex.ru/watch/40517915" style="position:absolute; left:-9999px;" alt=""/></div>
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
        ga('create', 'UA-86461836-1', 'auto');
        ga('require', 'displayfeatures');
        ga('send', 'pageview');
    </script>

    <script crossorigin="anonymous" async type="text/javascript" src="//api.pozvonim.com/widget/callback/v3/ff74709363491917846b84174abc8833/connect" id="check-code-pozvonim" charset="UTF-8"></script>
<? } ?>
</body>
</html>
