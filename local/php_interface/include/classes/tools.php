<?php
/**
 * User: Hipno
 * Date: 26.04.2017
 * Time: 9:51
 * Project: btlbts
 */

namespace ninjacat;

use \Bitrix\Main\Web\Uri;
use Bitrix\Main\Application;



class Tools
{
    private static $prods_exist = false;
 public static function curDir(){
     $request = Application::getInstance()->getContext()->getRequest();
     $uriString = $request->getRequestUri();
     $uri = new Uri($uriString);
     $path = $uri->getPath();
     $pathArray = explode('/', $path);



     return $pathArray[1];
 }

 public function setExistProd($bool){
    self::$prods_exist = $bool;
 }
}