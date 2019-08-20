<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Lista de Produtos</title>
        <!-- Bootstrap CSS - Biblioteca de estilos para o projeto -->
        <link rel="stylesheet" 
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
              crossorigin="anonymous">
    </head>
    <body>
        <div class="container pt-5">
            <div class="row">                
                <div class="col">
                    <h1>Lista de Produtos</h1>
                    <?php
                    include '../../model/Produto.php';
                    include '../../controller/ProdutoController.php';

                    /* Cria uma nova instância do controlador para acessar as funções
                      de acesso a dados */
                    $produtoController = new ProdutoController();

                    // Busca os dados da tabela 
                    $todos = $produtoController->SelecionarTodos();

                    // Verifica se é um vetor e se possui conteúdo
                    if (is_array($todos) && sizeof($todos) > 0) {
                        ?>

                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Preço</th>                                   
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($todos as $produto) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $produto->IdProduto; ?></th>
                                        <td><?php echo $produto->Produto; ?></td>
                                        <td><?php echo $produto->Preco; ?></td>                                       
                                        <td>
                                            <div class="btn-group" role="group" >
                                                <a href="inserir.php" class="btn btn-success">Incluir</a>
                                                <a href="editar.php?idProduto=<?php echo $produto->IdProduto; ?>" class="btn btn-warning">Editar</a>
                                                <a href="excluir.php?idProduto=<?php echo $produto->IdProduto; ?>" class="btn btn-danger">Excluir</a>
                                            </div></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php
                    } // Fim da verificação se há conteúdo no vetor de produtos 
                    else {
                        ?>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="inserir.php" class="btn btn-success">Incluir</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </body>
</html>
