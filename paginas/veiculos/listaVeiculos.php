    <div id="veiculos"> 
    <?php
        require_once "dataBase.php";
        $sql="SELECT * FROM veiculo";
        $resultado=$con->query($sql);
        
        while($veiculo=$resultado->fetch_array()){
            echo '<div class="card" >
            <img class="card-img-top" src="'.$veiculo['foto'].'" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">'.$veiculo['modelo'].'</h5>
                <p class="card-text">'.$veiculo['fabricante'].'</p>
                <p class="card-text">'.$veiculo['placa'].'</p>
                <p class="card-text">'.$veiculo['ano'].'</p>
                <a href="#" class="card-link">Editar</a>
                <a href="#" class="card-link">Excluir</a>
            </div>    
            </div>';
        }
    ?>
        
    </div>