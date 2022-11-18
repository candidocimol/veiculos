<?php
session_start();
#incluir conexão com banco de dados
include "dataBase.php";
#verificar de os dados estão vindo do formulário
if(isset($_POST['submit'])){
    #sim
     #realizar consulta na tabela 
     $email=$_POST['email'];
     $senha=md5($_POST['senha']);
     $sql="SELECT id, nome, email
     FROM usuario
     WHERE
        email='$email' AND senha='$senha'";
      //echo $sql;
    $resultado=$con->query($sql);
    ///var_dump($resultado);   
     #verica se retornou algum registro
     if($resultado){
      if($resultado->num_rows>0){
       #sim
       $user=$resultado->fetch_array();
        #Armamazena as informações do usuário na sessão
        $_SESSION['user']=$user;
        
        #mensagem de sucesso
        $_SESSION['msg']="Sucesso!";
      }
     }else{
      #não
        #mensagem de falha
        $_SESSION['msg']="Falha!";
    }  
}   
 
#recarega para a página inicial
header("Location: index.php");


