<?php
header("Content-Type: text/html; charset=utf-8",true);

include_once "Contato.class.php";
include_once "PdoConexao.class.php";
include_once "DaoContato.class.php";

if (isset($_GET['id'])) {
  $idContato = $_GET['id'];

  // Instanciar a classe DaoContato
  $persistenciaContato = new DaoContato();

  // Verificar se o formulário foi submetido
  if (isset($_POST['enviar'])) {
    // Recuperar os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    // Criar um objeto Contato com os novos dados
    $contatoAtualizado = new Contato($nome, $email, $telefone);
    $contatoAtualizado->setNome($nome);
    $contatoAtualizado->setEmail($email);
    $contatoAtualizado->setTelefone($telefone);

    // Chamar a função update para atualizar o contato
    if ($persistenciaContato->update($contatoAtualizado, $idContato)) {
      // Contato atualizado com sucesso
      echo "Contato atualizado com sucesso!";

    } else {
      // Erro ao atualizar o contato
      echo "Erro ao atualizar o contato.";
    }
  }

}
?>
