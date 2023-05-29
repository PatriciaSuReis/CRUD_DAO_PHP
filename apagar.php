<?php
header("Content-Type: text/html; charset=utf-8",true);

include_once "Contato.class.php";
include_once "PdoConexao.class.php";
include_once "DaoContato.class.php";

if (isset($_GET['id'])) {
  $idContato = $_GET['id'];
  
  // Instanciar a classe DaoContato
  $persistenciaContato = new DaoContato();
  
    // Chamar o método delete para excluir o contato
    if ($persistenciaContato->delete($idContato)) {
        // Contato excluído com sucesso
        $mensagem = "Contato excluído com sucesso!";
    } else {
        // Erro ao excluir o contato
        $mensagem = "Erro ao excluir o contato.";
    }

    // Redirecionar para a página principal com a mensagem
    header("Location: teste copy.php?mensagem=" . urlencode($mensagem));
    exit();

}

?>
