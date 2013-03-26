<?php 
function parse($data) 
{ 
    
    $k = str_replace('one', '1', $data); 
    $k = str_replace('two', '2', $k);
    
    
    return $k;
} 


function g(){
    ob_start('parse'); 
    echo 'one two'; 
    ob_end_flush(); // Будет выведено: «Let me see you stripped» 

}

g();

?>