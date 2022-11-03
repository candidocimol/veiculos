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
            if(move_uploaded_file($_FILES["foto"]["tmp_name"], $_FILES["foto"]["name"])){
                $img="<img src='".$_FILES["foto"]["name"]."' />";
                
                include "dataBase.php";
                #executar consulta no BD
                $sql="INSERT INTO veiculo (fabricante, modelo, placa, ano, foto)
                VALUES 
                ('{$_POST['fabricante']}','{$_POST['modelo']}','{$_POST['placa']}',
                '{$_POST['ano']}','{$_FILES["foto"]["name"]}')";

                echo $sql;

                $con->query($sql);


            }else{
                $img="<img src='data:image/png;base64,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' />";
            }
    ?>
    <div style="padding:20px">      
        <div class="card" style="width: 18rem;">
            <?php
            echo $img;
            ?>
            <div class="card-body">
                <h5 class="card-title"><?PHP echo $_POST['fabricante'] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?PHP echo $_POST['fabricante'] ?></h6>
                <p class="card-text"><?PHP echo $_POST['ano'] ?></p>
                <p class="card-text"><?PHP echo $_POST['placa'] ?></p>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
</body>
</html>