<?php

    class Errors{
        
            public static $ERRORS  =   array(
                "registration" => array("O_o", "Bad login reg!", "Bad password reg!", "Bad connect reg!"),
                "authorization" => array("o_O", "Bad login auth!", "Bad password auth!", "Bad connect reg!", "BAD LOGIN OR PASSWORD!!!!"),
                "other" => array("O_o o_O O_O o_o")
            );
            
            
            public static function getError($type, $number){
                if(isset(Errors::$ERRORS[$type][$number]) && !empty(Errors::$ERRORS[$type][$number]))
                    $result = Errors::$ERRORS[$type][$number];
                else    
                    $result = Errors::$ERRORS['other'][0];
                
                return $result;
            }
        
        
    }

