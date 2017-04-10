<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
/*
 * var
 * */
use Bitrix\Main\Application;
use Bitrix\Main\Loader;

Loader::includeModule("iblock");

$request = Application::getInstance()->getContext()->getRequest();

$prop = $request->getPost('PROP');

$PROPERTY_ID = key($prop);
$value = current(current($prop));

$ibpenum = new CIBlockPropertyEnum;

$PropID = $ibpenum->Add(Array('PROPERTY_ID'=>$PROPERTY_ID, 'VALUE'=>$value));

    if($PropID){
        $arr['message'] = 'Новое значение установлено';
    } else{
        $arr['message'] = 'Ошибка';
    }

    $arr['name'] = 'PROP['.$PROPERTY_ID.'][]';


    $dbRes = $ibpenum::GetList(
        Array(
            "DEF"=>"DESC",
            "SORT"=>"ASC"
        ),
        Array(
            "IBLOCK_ID"=>1,
            "PROPERTY_ID"=>$PROPERTY_ID,
            "VALUE"=>$value
        )
    );
    if ($res = $dbRes->GetNext()){
        $arr['Props'] = $res;
    }


    global $APPLICATION;

    $APPLICATION->RestartBuffer();
    header('Content-Type: application/json; charset='.LANG_CHARSET);
    echo \Bitrix\Main\Web\Json::encode($arr);
?>

