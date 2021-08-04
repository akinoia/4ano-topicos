<?php
if(isset($_POST)){
    if($_POST["botao"] == "Cadastrar"){
        include_once "config.php";
        $query = "insert into contatos (nome_cad,email_cad,senha_cad) values ('".$_POST["nome_cad"]."','".$_POST["email_cad"]."','".$_POST["senha_cad"]."')";
        if (mysqli_query($conn, $query)) {
            mysqli_close($conn);
            header("location: index.html");
        } 
    }
    if($_POST['botao'] == "Escrever"){
        include_once "config.php";
        $query = "update mensagem = '".$_POST['ms'];
        if (mysqli_query($conn, $query)) {
            mysqli_close($conn);
            header("location: index.html");
        } 
    }
}
?>