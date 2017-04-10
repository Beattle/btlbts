<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");


$json = ["Количество Зубьев (режущих элементов)","Тип Расходного Материала","Акция","Овчина","Диагональный пропил при 90°/90°","Материал ножа","Ход фрезы","Ёмкость аккумулятора","Max глубина пропила под углом 45°","Max глубина пропила под углом 90°","Max глубина реза","Max глубина строгания","Max диаметр сверления (металл)","Max диаметр сверления буром (бетон)","Max диаметр сверления коронкой (бетон)","Max количество колебаний","Max крутящий момент","Max рабочая температура","Max размер цанги","Max сила удара","Max скорость ленты","Max частота колебаний","Max число оборотов","Max ширина паза","Max ширина пропила под углом 45°","Max ширина пропила под углом 90°","Min частота колебаний","Амплитуда колебаний","Бесключевая регулировка натяжения цепи","Вес","Виброзащита","Возможность подключения к пылесосу","Возможность работы с направляющей шиной","Глубина резания","Горизонтальное перемещение","Давление","Диаметр всасывающего шланга","Диаметр инструмента","Диаметр разъёма пылеудаления","Длина кабеля","Длина ленты","Длина шины","Для работы с металлом","Зажимное приспособление","Количество звеньев","Количество рабочих дисков","Количество режимов","Комплектация","Максимальный размер скоб","Масса","Мах диаметр сверления (дерево)","Мах толщина пропила (дерево)","Мах толщина пропила (металла)","Маятниковый ход","Минимальный размер скоб","Модель","Мощность","Наличие реверса","Напряжение","Объем бака","Патрон","Патрубок для аспирации","Плавный пуск","Подходящая расходка","Посадочный диаметр диска","Привод","Производитель","Рабочее давление (напор)","Рабочий ход фрезы","Размер хода платформы","Разрежение","Распродажа","Расход воздуха","Реверс","Регулировка глубины реза","Регулировка мощности","Регулировка оборотов","Регулировка температуры","Регулировка хода","Регулировка частоты вращения","Режим сверления","Резка алмазными дисками","Розетка для электроинструмента","Сверлильный патрон","Система очистки фильтра","Тип","Тип диска","Тип патрона","Тип хвостовика","Функция выдувания","Частота колебаний","Частота ударов","Число оборотов холостого хода","Шаг цепи","Ширина ленты","Ширина паза","Ширина резания","Электр. регулировка оборотов","Оснастка","скорость подачи","Фрезерование для соединения в ус","Max. энергия удара","Смешиваемое количество","Производительность","Глуб. пропила 45°/45° (справа)","Глубина пропила 90°/90°","Внутренний минимальный радиус оклейки","Скорость ленты при номинальной нагрузке","Max толщина кром. материала","для станка модели:","Минимальное разрежение","Макс. диаметр фрезы","Ширина кромочного материала, max","Регулируемая высота","Внешний угол","Высота стола (на MFT)","Сменная шлифовальная подошва","Производ. насоса при 50 Гц","Радиусы","Число скоростей","Макс. объем резервуара","Расходный материал","Max. частота ударов","Вес нетто","Глубина пропила 45°/90°","Рабочее давление (давление сжатого воздуха)","Температурный режим","Тип аккумулятора","Диапазон угла","Уровень звукового давления","Толщина кромочного материала","Скорость при движении ROTEX","Подшипник","Точная регулировка глубины фрезерования","Способ крепления ножа","Ход шлифования","Сменная шлифовальная тарелка Ø","Максимальный крутящий момент по металлу","Масса базового модуля","Спец. глуб. пропила 45°/90° (сл.)","Полировальный материал","Губка","Масса 1x18 В/2x18 В","Тип двигателя","Ограничитель глубины фрезерования","Ширина ножа","Скорость при эксцентр. движении","Пятно шлифования","свободно (для станка)","Тип отверстия","Наличие подсветки","Высота стола без ножек","Тип крепления мешалки","Спец. глубина пропила 45°/90°","Диагональный пропил при 45°/90°","D - диаметр хвостовика","Глубина реза без/с шиной-направляющей","Тип привода","Глуб. пропила 50°/90° (слева)","Толщина ножа","h - высота рабочей части","Макс. ширина заготовки","Напряжение аккумулятора","Наличие удара","Макс. скорость вращения вала","Шлифовальная подошва StickFix","Max высота кромоч. материала","Диаметр диска","Длина сетевого кабеля с резиновой изоляцией","Максимальная глубина фрезерования, вертикально","Ширина обработки","Высота стола на ножках","Высота клеевого слоя","Система клеенанесения","Специализация","Размеры (ДxШxВ)","Политура","Фетр","Максимальный крутящий момент, I / II","Количество режущих граней на фрезе","Длина","раб. высота/с откидн. ножками","Тип крепления бура","Ширина","Уровень эмиссии колебаний м/с2 (по одной оси)","Производ. насоса при 60 Гц","Спец. глубина пропила 90°/90°","Шлифовальная тарелка FastFix Ø","R - радиус режущей части","Глубина пропила, угол 90°/45°","Высота реза","Мощность подключаемого инструмента, макс.","Число рабочих ходов","Угол скоса","Глуб. пропила 60°/90°(справа)","Время зарядки аккумулятора","Расход воздуха при номинальной нагрузке","Потребляем. мощность при 50 Гц","Диаметр сверления дерево\\сталь","Диаметр","Макс. глубина фрезерования","Площадь фильтроэлемента","Регулировка наклона","Длина ленты x ширина ленты","Ширина фрезерования","Внутренний угол","Макс. скорость пылеудаления","Диаметр посадочный","Число оборотов, об/мин.","Толщина пропила","Глубина реза","Диаметр шлицевой фрезы DOMINO","Зернистость","Толщина торцевания","Мощность потребляемая","L - длина сверла общая","Рабочая высота стола","Мах. диаметр сверления бетона","Производитель","Макс. высота заготовки","Максимальная глубина фрезерования, горизонтально","Диаметр внешний","Макс. диаметр полировальной тарелки","Диаметр разъема пылеудаления","Количество зубьев","Макс. разрежение","Глубина реза при 45°","Макс. диаметр насадки-мешалки","Глубина реза по: дерево/цвет.мет./сталь","Уровень эмиссии колебаний м/с2 (по трем осям)","Диаметр зажимной цанги","Количество в упаковке","Регулировка высоты фрезы","Диапазон зажима патрона","Тип ручки","Глубина обработки","d - диаметр рабочей части","Тарелка полировальная","Глуб. пропила 45°/45° (слева)","Макс. глубина четверти","Шпиндель","Размер абразива/Тип машинки","Длина ножа","Длина протяжки","Потребляем. мощность при 60 Гц","Размеры модульного кронштейна","Заточка"];

CModule::IncludeModule("iblock");

$obEnum = new  CUserFieldEnum;

foreach ($json as $key=>$value){
    $obEnum->SetEnumValues(21,array(
        "n$key" => array(
            "VALUE" => $value
        )
    ));
}

$arr = array();

$arFields = CUserFieldEnum::GetList(array(), array(
    "USER_FIELD_ID" => 21
));
while($arFres = $arFields->GetNext()){
    $arr[] =  $arFres['VALUE'];
}









