<?$APPLICATION->IncludeComponent("bitrix:search.title", "visual1", Array(
    "CATEGORY_0" => array(	// Ограничение области поиска
        0 => "iblock_catalogue",
    ),
    "CATEGORY_0_TITLE" => "",	// Название категории
    "CATEGORY_0_iblock_1c_catalog" => array(
        0 => "1",
    ),
    "CHECK_DATES" => "N",	// Искать только в активных по дате документах
    "COMPOSITE_FRAME_MODE" => "A",	// Голосование шаблона компонента по умолчанию
    "COMPOSITE_FRAME_TYPE" => "AUTO",	// Содержимое компонента
    "CONTAINER_ID" => "title-search",	// ID контейнера, по ширине которого будут выводиться результаты
    "CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
    "INPUT_ID" => "title-search-input",	// ID строки ввода поискового запроса
    "NUM_CATEGORIES" => "1",	// Количество категорий поиска
    "ORDER" => "date",	// Сортировка результатов
    "PAGE" => "#SITE_DIR#search/index.php",	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
    "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода
    "PRICE_CODE" => "",	// Тип цены
    "PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
    "SHOW_INPUT" => "Y",	// Показывать форму ввода поискового запроса
    "SHOW_OTHERS" => "N",	// Показывать категорию "прочее"
    "SHOW_PREVIEW" => "Y",	// Показать картинку
    "TOP_COUNT" => "8",	// Количество результатов в каждой категории
    "USE_LANGUAGE_GUESS" => "N",	// Включить автоопределение раскладки клавиатуры
    "COMPONENT_TEMPLATE" => "visual",
    "PREVIEW_WIDTH" => "75",	// Ширина картинки
    "PREVIEW_HEIGHT" => "75",	// Высота картинки
    "CATEGORY_0_iblock_catalogue" => array(	// Искать в информационных блоках типа "iblock_catalogue"
        0 => "17",
    )
),
    false
);?>