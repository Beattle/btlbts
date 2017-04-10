<?php
/**
 * User: Hipno
 * Date: 23.03.2017
 * Time: 12:10
 * Project: btools
 */

use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\Page\Asset;

$request = Application::getInstance()->getContext()->getRequest();
$iblock = htmlspecialchars($request->getQuery("IBLOCK_ID"));
$NameValues = '"";';
CJSCore::Init(array("jquery"));
if ($GLOBALS['APPLICATION']->GetCurPage()=='/bitrix/admin/iblock_element_edit.php' && (int)$iblock===1 ) {
    Loader::includeModule("iblock");
    CJSCore::Init(array("jquery"));
    CUtil::InitJSCore( array('ajax' , 'jquery' , 'popup' ));


$arSelect = array("ID");
    $idChildGroup = false;
    $db_old_groups = CIBlockElement::GetElementGroups($ID, true,$arSelect);
    if($ar_group = $db_old_groups->Fetch()){
        $idChildGroup = $ar_group['ID'];
    }

    $nav = CIBlockSection::GetNavChain(false, $idChildGroup,$arSelect);
    while ($objSect = $nav->Fetch() ){
        $groupIDs[] = $objSect['ID'];
    }
    $NameValues = '';
    foreach ($groupIDs as $groupID){
        $arUF = $GLOBALS["USER_FIELD_MANAGER"]->GetUserFields("IBLOCK_1_SECTION",$groupID,"UF_PROPERTIES");
        if(!empty($arUF['UF_PROPERTIES']['VALUE'])){
            $values = $arUF['UF_PROPERTIES']['VALUE'];

            $rsGender = CUserFieldEnum::GetList(array(), array(
                "USER_FIELD_NAME" => "UF_PROPERTIES",
                'ID' => $values
            ));

            while($ufProp = $rsGender->GetNext()){
                $NameValues[] = $ufProp['VALUE'];
            }

        }
    }
    $NameValues = json_encode($NameValues,JSON_UNESCAPED_UNICODE);
    $script = <<<JS
    var propNames = $NameValues;
JS;

    Asset::getInstance()->addString("<script type='text/javascript'>$script</script>");
    Asset::getInstance()->addJs('/local/php_interface/include/setParamsView.js');
}

if($GLOBALS['APPLICATION']->GetCurPage()=='/bitrix/admin/iblock_section_edit.php' && (int)$iblock===1 ){
    Asset::getInstance()->addString('<link href="/local/php_interface/include/chosen/chosen.min.css" rel=\'stylesheet\' type=\'text/css\'>');
    Asset::getInstance()->addJs('/local/php_interface/include/chosen/chosen.jquery.min.js');
    Asset::getInstance()->addCss('/local/php_interface/include/chosen/chosen.min.css');
    Asset::getInstance()->addJs('/local/php_interface/include/select.js');
}


