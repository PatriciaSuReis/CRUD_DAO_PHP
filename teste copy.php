<!DOCTYPE html>
<html lang="pt-BR">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Agenda</title>
   
</head>
<body>

   <div class="formulario">
      <h1>Contato</h1>
      <form action="" method="POST">
            <label for="nome">Nome</label>
            <input type="text" name="nome" placeholder="Digite o Nome" required> <br>
            <label for="email">Email</label>
            <input type="emai" name="email" placeholder="Digite o Email" required> <br>
            <label for="telefone">Telefone</label>
            <input type="number" name="telefone" placeholder="Digite o Telefone" required> <br>

            <input type="submit" name="enviar" value="Enviar">
      </form>
   </div>
   <br>

<?php

header("Content-Type: text/html; charset=utf-8",true);

include_once "Contato.class.php";
include_once "PdoConexao.class.php";
include_once "DaoContato.class.php";

// Criamos um novo objeto DAO
$PersitenciaContato1 = new DaoContato();

// * Pegar dados do formulario e mandar para banco de dados
if (isset($_POST['enviar'])) {
   $nome = $_POST["nome"];
   $email = $_POST["email"];
   $telefone = $_POST["telefone"];

   // Criar objeto de contado e passar dados
   $contato = new Contato($nome, $email, $telefone);

   // Criar um novo objeto DAO
   $PersitenciaContato = new DaoContato();

   // Criando o contado no banco de dados
   if($PersitenciaContato->create($contato)){
      echo '<p>Contato criado com sucesso!</p>';
   } 
}// fim if (para ver se foi enviado)
  
   // * Chamar função ler todos
   $contato = $PersitenciaContato1->readAll();

   // * Mostrar Dados do BD na tabela
   echo '<table border="1">';
   // Mostrar mensagem se foi apagado ou não
   if (isset($_GET['mensagem'])) {
      $mensagem = $_GET['mensagem'];
      echo "<p>$mensagem</p>";
   } 

   echo " <thead>
               <tr>
               <th>ID</th>
               <th>Nome</th>
               <th>Email</th>
               <th>Telefone</th>
               <th>Ações</th>
               </tr>
            </thead>";
   echo "<tboby>";
   foreach($contato as $linha){
      echo '<tr>';
      echo "<td>". $linha['ID'] ."</td>";
      echo "<td>". $linha['NOME']." </td>";
      echo "<td>". $linha['EMAIL']." </td>";
      echo "<td>". $linha['TELEFONE']." </td>";
      echo "<td> <a href=\"apagar.php?id=".$linha['ID']."\">Apagar</a> </td>";
      // editar não esta pronto
      echo "<td> <a href=\"editar!.php?id=".$linha['ID']."\">Editar</a> </td>";
      
      echo '</tr>';
   }
   echo "</tboby>";
   echo '</table>';
   die();

   // Verificar se a variável "editar" está definida
if (isset($_GET['editar'])) {
   // Incluir o arquivo "editar_contato.php"
   include_once 'editar.php';
 }

   // TODO: FAZER A EDIÇÃO DOS DADOS E ORGANIZAR O CODIGO

?>


</body>
</html>

