<?php
 session_start();
 if(!isset($_SESSION['user'])){
    header("Location: login.php"); 
 }
 include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <header>
        <a href="<?php echo URL_BASE?>logout.php">Logout</a>
    </header>
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

</body>
</html>