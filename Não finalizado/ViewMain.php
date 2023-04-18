<?php

header("Content-Type: text/html; charset=utf-8",true);

include_once "Contato.class.php";
include_once "PdoConexao.class.php";
include_once "DaoContato.class.php";

// ? Atividade 4 - reescrever a função autoload
function my_autoload( $classe ){
   if(file_exists("{$classe}.php")) {
      include_once (__DIR__ . "/" . "{$classe}.php");
   } 
   else {
      echo "O arquivo {$classe}.php da classe {$classe} não foi encontrado";
   }
}

spl_autoload_register("my_autoload");

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contados</title>

    <link rel="stylesheet" href="styleMain.css">
</head>
<body>
    <div class="container">
        <h1>Contados</h1>
        <hr>

    <?php

    if(isset($_POST['cadastrar'])) 
    {
        $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);

        $contato = new Contato($nome, $telefone, $email);
        $PersitenciaContato = new DaoContato();

        if (!empty($nome) && !empty($telefone) && !empty($email)) {
            //cadastrar
            if (!$PersitenciaContato->create($contato)) {
                echo "Contato cadastrado!";
            }
        } else {
            echo "Preencha todos os campos!";
        }
    }
    ?>
        <div id="tudo">
            <form action="ContatoController.php" id="cadastrar" method="POST">
                <label>Nome</label>
                <input type="text" name="nome" value="" placeholder="Nome" required>                                

                <label>Telefone</label>
                <input type="text" name="telefone" value="" placeholder="Telefone" required>
                    
                <label>Email</label>
                <input type="email" name="email" value="" placeholder="Email" required>
                    
                <button type="submit" value="" name="cadastrar">Salvar</button>
            </form>

            <table id="tabela">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <td>
                        <?php foreach ($PersitenciaContato->read() as $contato) : ?>
                        <tr>
                            <td><?php  $contato->getId() ?></td>
                            <td><?php  $contato->getNome() ?></td>
                            <td><?php  $contato->getTelefone() ?></td>
                            <td><?php  $contato->getEmail() ?></td>
                        </tr>

                        <a href="ContatoController.php?editar=<?php $contato->getId() ?>">Editar</a>
                        <a href="ContatoController.php?deletar=<?php $contato->getId() ?>">
                            <button type="button">Excluir</button>
                        </a>
                    </td>
                    </tr>

                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>
