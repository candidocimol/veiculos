<?php

if(isset($acao)){
    if($acao=="login"){
        include "./paginas/usuarios/login.php";
    }else if($acao=="logout"){
        include "./paginas/usuarios/logout.php";
    }
}