<?php
namespace Bitrix\VetalKms\forms;

class CFormHelper{

    public function OnSendEmailAddOrder($id, &$event, &$arFields)
    {
        if (\CModule::IncludeModule('sale')) {

            // Получить информацию о заказе
            // $dbItemsInOrder = \CSaleBasket::GetList(array("ID" => "ASC"), array("ORDER_ID" => $id));

            $arFields["ORDER_LIST"] = mb_ereg_replace("\\n", "<br />", $arFields["ORDER_LIST"]);
            $arFields["CITYR"] = $_REQUEST['ORDER_PROP_1_val'];
            $arFields["NAMER"] = $_REQUEST['ORDER_PROP_2'];
            $arFields["PHONER"] = $_REQUEST['ORDER_PROP_3'];
            //$arFields["RAND"] = rand(1, 100) ." - ". $event . " - " . "<br />" . print_r($arFields, 1) ;
            if ($arFields["ORDER_REAL_ID"]) {
                \CEvent::SendImmediate($event, SITE_ID, $arFields, "N", 61);
            }

        }

    }

    public function OnBeforeEventSendMess($id, &$event, &$arFields)
    {
/*
        if ($arTemplate['ID'] == 22) {
            $emails = array();
            if (\CModule::IncludeModule('sale'))
            {
                $order = \CSaleOrder::GetByID(intval($arFields['ORDER_ID']));
                $uID = $order['USER_ID'];
                if (intval($uID) > 0)
                {
                    $rsUser = \CUser::GetByID($uID);
                    $arUser = $rsUser->Fetch();
                    $arFields["USER_NAME"] ? $arUser["NAME"] : "";
                    $arFields["USER_LAST_NAME"] ? $arUser["LAST_NAME"] : "";
                    $arFields["USER_EMAIL"] ? $arUser["EMAIL"] : "";
                    $arFields["USER_LAST_LOGIN"] ? $arUser["LAST_LOGIN"] : "";
                    $arFields["USER_PERSONAL_MOBILE"] ? $arUser["PERSONAL_MOBILE"] : "";
                    $arFields["USER_PERSONAL_PHONE"] ? $arUser["PERSONAL_PHONE"] : "";
                    $arFields["USER_WORK_PHONE"] ? $arUser["WORK_PHONE"] : "";


                }
            }
        }
*/
    }

/*
    public function SwitchForm($WEB_FORM_ID, $RESULT_ID)
    {
        if (in_array($WEB_FORM_ID, array(10, 12, 8, 14))) {
            CModule::AddAutoloadClasses(null, Array(
                'SendClientsForm' => '/bitrix/php_interface/include/class/sendclientsforms.php'
            ));
            SendClientsForm::SendForm($WEB_FORM_ID, $RESULT_ID);
        }
    }



    public function ChangeField($WEB_FORM_ID, $arFields, &$arrVALUES){

        if (CModule::IncludeModule("form")) {
            $arResult  = array();

            CForm::GetDataByID($WEB_FORM_ID, $arResult["arForm"], $arResult["arQuestions"], $arResult["arAnswers"], $arResult["arDropDown"], $arResult["arMultiSelect"], $arResult["bAdmin"] == "Y" || $arParams["SHOW_ADDITIONAL"] == "Y" || $arParams["EDIT_ADDITIONAL"] == "Y" ? "ALL" : "N");

            $arAnswers = &$arResult['arAnswers'];

            if(isset($arAnswers['IP_CLIENT'])){
                $qConfStruct = &$arAnswers['IP_CLIENT'][0];
                $confSelectName = "form_" . $qConfStruct['FIELD_TYPE'] . '_' . $qConfStruct['ID'];
                $arrVALUES[$confSelectName] = $_SERVER['REMOTE_ADDR'];
            }
        }

    }
*/
}

