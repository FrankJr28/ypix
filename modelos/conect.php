<?php

class Conect{
    
    static public function conectar(){
        
        $link = new PDO("mysql:host=localhost;dbname=ypix", "root", "");
        
        $link->exec("set names utf8");
        
        return $link;
    
    }
}

?>