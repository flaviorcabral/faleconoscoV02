<?php

    function __autoload($classe){
        if(file_exists("models/" . $classe . ".class.php")){
            include_once("models/" . $classe . ".class.php");
        }elseif(file_exists("controller/" . $classe . ".class.php")){
            include_once("controller/" . $classe . ".class.php");
        }elseif(file_exists("../models/" . $classe . ".class.php")){
            include_once("../models/" . $classe . ".class.php");
        }elseif(file_exists("../controller/" . $classe . ".class.php")){
            include_once("../controller/" . $classe . ".class.php");
        }
    }