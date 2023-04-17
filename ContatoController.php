<?php

include_once "Contato.class.php";
include_once "PdoConexao.class.php";
include_once "DaoContato.class.php";

$contato = new Contato();
$PersitenciaContato = new DaoContato();

//pega todos os dados passado por POST

$d = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição
if(isset($_POST['cadastrar'])){

    $contato->setNome($d['nome']);
    $contato->setTelefone($d['telefone']);
    $contato->setEmail($d['email']);

    $PersitenciaContato->create($contato);

    header("Location: ../../");
} 
// se a requisição for editar
else if(isset($_POST['editar'])){

    $contato->setNome($d['nome']);
    $contato->setTelefone($d['telefone']);
    $contato->setEmail($d['email']);
    $contato->setId($d['id']);

    $PersitenciaContato->update($contato);

    header("Location: ../../");
}
// se a requisição for deletar
else if(isset($_GET['deletar'])){

    $contato->setId($_GET['deletar']);

    $PersitenciaContato->delete($contato);

    header("Location: ../../");
}else{
    header("Location: ../../");
}


?>