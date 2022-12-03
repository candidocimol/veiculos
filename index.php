<?php

 session_start();
 include "config.php";

 if(!isset($_SESSION['user'])){
   // header("Location:?pagina=usuarios&acao=login"); 
   echo 1;
   if(!isset($_POST['submit'])){
    echo 2;
        include "./paginas/usuarios/login.php";
   }else{
    echo 3;
       include "./paginas/usuarios/autenticar.php";
   }
   
 }else{
    include DIR_BASE."/template/header.php";
    include "./template/nav.php";
    include "./template/msg.php";

 
 
 
?>
<main>
    <?php
    if(isset($_GET['path'])){
        $path=explode("/", $_GET['path']);
        $pagina=$path[0];
        if(isset($path[1])){
            $acao=$path[1];
            if(isset($path[2])){
                $parametro=$path[2];
            }else{
                $parametro=null;
            }
        }else{
            $acao =null;
            $parametro=null;
        }
    }else{
        $pagina=null;
    }

    if($pagina){
        if($pagina=="veiculos"){
            include "./paginas/veiculos.php";
        }else if($pagina=="contato"){
            include "./paginas/contato.php";
        }else if($pagina=="usuarios"){
            include "./paginas/usuarios.php";
        }else{
            include "./paginas/erro_404.php";
        }

    }else{
        include "./paginas/home.php";
    }

    ?>
    
</main>
<?php
 }
?>
</body>
</html>