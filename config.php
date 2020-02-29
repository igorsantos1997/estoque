<?php
    spl_autoload_register(function($classe){
        $file=dirname(__FILE__).DIRECTORY_SEPARATOR."classes".DIRECTORY_SEPARATOR.$classe.".php";
        if (file_exists($file)) require_once($file);
        //$_SERVER[‘DOCUMENT_ROOT’] -> pode-se usar isso ao invés de dirname(__FILE__)
        
    });
?>