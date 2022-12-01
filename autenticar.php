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
        $msg['msg']="Sucesso!";
        $msg['class']="success";
        $_SESSION['msgs'][]=$msg;
      }
     }else{
      #não
        #mensagem de falha
        $msg['msg']="Falhao!";
        $msg['class']="danger";
        $_SESSION['msgs'][]=$msg;        
    }  
}   
 
#recarega para a página inicial
header("Location: index.php");


