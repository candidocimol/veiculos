<?php
 session_start();
 if(!isset($_SESSION['user'])){
    header("Location: login.php"); 
 }
 include "config.php";
 include DIR_BASE."/template/header.php";
 include "./template/nav.php";
?>
<main>
    <div style="padding:15px">
        <form method="POST"  enctype="multipart/form-data">
        <div class="row g-3">
            <div class="col-sm-4">
                <input type="text" name="fabricante" class="form-control" placeholder="Fabricante" aria-label="fabricante">
            </div>
            <div class="col-sm-4">
                <input type="text" name="modelo" class="form-control" placeholder="Modelo" aria-label="modelo">
            </div>
            <div class="col-sm-4">
                <input type="text" name="ano" class="form-control" placeholder="Ano" aria-label="ano">
            </div>
            <div class="col-sm-4">
                <input type="text" name="placa" class="form-control" placeholder="Placa" aria-label="padding">
            </div>
            <div class="col-sm-4">
                <input type="file" name="foto" class="form-control" >
            </div>
        </div>
        <div class="row g-3">
            <input type="submit" name="enviar" value="Enviar" class="btn btn-primary" />
        </div>

        </form>
    </div>
    <hr/>
   
    <?php
        if(isset($_POST['enviar'])){
            $arquivo="./imagens/".$_FILES["foto"]["name"];
            if(move_uploaded_file($_FILES["foto"]["tmp_name"], $arquivo)){
                
                require_once "dataBase.php";
                #executar consulta no BD
                $sql="INSERT INTO veiculo (fabricante, modelo, placa, ano, foto)
                VALUES 
                ('{$_POST['fabricante']}','{$_POST['modelo']}','{$_POST['placa']}',
                '{$_POST['ano']}','{$arquivo}')";

                echo $sql;

                if(!$con->query($sql)){
                    echo "Falha ao salvar registro!";
                }

            }
        }

        include "listaVeiculos.php";
    ?>
    
</main>
</body>
</html>