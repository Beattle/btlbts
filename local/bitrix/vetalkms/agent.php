<?
namespace Bitrix\VetalKms;

class Agent{

    /**
     * Удаление неактивированных пользователей ровно через сутки после создания или изменения профиля
     * @return string
     */
    public static function removeNotActUsers()
    {

        if (\CModule::IncludeModule("main")) {

            $arFilter = array(
                "TIMESTAMP_X_2" => (date('d', strtotime("-1 day"))) . "." . date('m') . "." . date('Y') . " " . date('H') . ":" . date('i') . ":" . date('s'),
                "ACTIVE" => "N"
            );

            $rsUser = \CUser::GetList(($by="id"), ($ord="desc"), $arFilter);
            while ($arUser = $rsUser->Fetch($rsUser))
            {
                \CUser::Delete($arUser["ID"]);
                $current = date('Y').".".date('m').".".date('d')." ".date('H').":".date('i').":".date('s') . " - Пользователь не активирован, удаляем - " . $arUser["LOGIN"] . " - " . $arUser["NAME"] . " - " . $arUser["ID"] . "\n";
                file_put_contents(realpath($_SERVER[DOCUMENT_ROOT]."/local/tmp")."/agent.log", $current, FILE_APPEND);
            }
        }

        return '\Bitrix\VetalKms\Agent::removeNotActUsers();';
    }

}