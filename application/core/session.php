<?php
/**
 * class Session
 * ...
 * ...
 * ...
 */
class Session {
    
           
    /**
     * метод get для витягнення информации з сесии
     * 
     * @param string $key ключ массиву сессии
     * @return all O_o xD
     */
    public static function get($key){
        return $_SESSION[$key];
    }
    
    
    /**
     * метод set для збереження инфи в сесии
     * 
     * @param string $key
     * @param string/int/array/Object/function(maybe) $value
     */
    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }
    
    
    
    /**
     * метод init инициализуе сессию
     */
    public static function init(){
        session_start();
    }
    
    
    /**
     * метод issets перевирка на иснування елементу в масиви
     * 
     * @param string $key
     * @return boolean
     */
    public static function issets($key){
        if(isset($_SESSION[$key]))
            return true;
        else
            return false;
    }
    
    
    
    /**
     * метод trace виведення елементу з сессии
     * 
     * @param string $key
     */
    public static function trace($key){
        echo $_SESSION[$key];
    }
    
    
    /**
     * метод close вбивае сессию
     */
    public static function close(){
        $_SESSION = array();
        session_destroy();
    }

}