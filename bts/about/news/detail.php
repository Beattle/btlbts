<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости");
?>

<?$APPLICATION->IncludeComponent("bitrix:news.detail", "", Array(
    "IBLOCK_TYPE" => "technology",	// Тип информационного блока (используется только для проверки)
    "IBLOCK_ID" => "19",	// Код информационного блока
    //"ELEMENT_ID" => $_REQUEST["ID"],	// ID новости
    "ELEMENT_CODE" => $_REQUEST["CODE"],	// Код новости
    "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
    "FIELD_CODE" => array(	// Поля
        0 => "",
        1 => "",
    ),
    "PROPERTY_CODE" => array(	// Свойства
    ),
    "IBLOCK_URL" => "",	// URL страницы просмотра списка элементов (по умолчанию - из настроек инфоблока)
    "AJAX_MODE" => "N",	// Включить режим AJAX
    "AJAX_OPTION_SHADOW" => "Y",	// Включить затенение
    "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
    "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
    "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
    "CACHE_TYPE" => "A",	// Тип кеширования
    "CACHE_TIME" => "3600",	// Время кеширования (сек.)
    "CACHE_GROUPS" => "Y",	// Учитывать права доступа
    "META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
    "META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
    "BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
    "DISPLAY_PANEL" => "N",	// Добавлять в админ. панель кнопки для данного компонента
    "SET_TITLE" => "Y",	// Устанавливать заголовок страницы
    "SET_STATUS_404" => "N",	// Устанавливать статус 404, если не найдены элемент или раздел
    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
    "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
    "ADD_ELEMENT_CHAIN" => "Y",
    "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
    "USE_PERMISSIONS" => "N",	// Использовать дополнительное ограничение доступа
    "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
    "DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
    "PAGER_TITLE" => "Страница",	// Название категорий
    "PAGER_TEMPLATE" => "",	// Название шаблона
    "PAGER_SHOW_ALL" => "Y",	// Показывать ссылку "Все"
    "DISPLAY_DATE" => "N",	// Выводить дату элемента
    "DISPLAY_NAME" => "N",	// Выводить название элемента
    "DISPLAY_PICTURE" => "Y",	// Выводить детальное изображение
    "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
    "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
),
    false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>