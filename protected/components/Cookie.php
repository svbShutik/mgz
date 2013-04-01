<?php
class Cookie
{
    // Ищем печеньку, если найдена возвращаем значение
    public static function get($name) {
        $cookie = Yii::app()->request->cookies[$name] ;
        if(!$cookie)
            return false ;
       else
            return $cookie->value ;
    }

    //Создаем печенку
    public static function set($name, $value, $expiration = 0) {
        $cookie = new CHttpCookie($name, $value) ;
        $cookie->expire = $expiration ;
        Yii::app()->request->cookies[$name] = $cookie ;
        return true ;
    }

    public static function remove($name){
        if(!Yii::app()->request->cookies[$name]) {
            return null ;
        } else {
            Yii::app()->request->cookies->remove($name) ;
            return true ;
        }

    }

}

?>