    <div style="padding:20px; display:flex; "> 
    <?php
        require_once "dataBase.php";
        $sql="SELECT * FROM veiculo";
        $resultado=$con->query($sql);
        
        while($veiculo=$resultado->fetch_array()){
            echo '<div class="card" style="width:20vw;">
            <img class="card-img-top" src="'.$veiculo['foto'].'" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">'.$veiculo['modelo'].'</h5>
                <p class="card-text">'.$veiculo['fabricante'].'</p>
                <p class="card-text">'.$veiculo['placa'].'</p>
                <p class="card-text">'.$veiculo['ano'].'</p>
                
            </div>';
        }
    ?>
        
    </div>