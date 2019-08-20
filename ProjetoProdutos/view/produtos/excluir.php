<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Exclusão de Produtos</title>
        <!-- Bootstrap CSS - Biblioteca de estilos para o projeto -->
        <link rel="stylesheet" 
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
              crossorigin="anonymous">
    </head>
    <body>
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-6">
                    <?php
                   
                    include '../../model/Produto.php';
                    include '../../controller/ProdutoController.php';

                    // verifica se há informação de produto vinda do formulário
                    if (isset($_GET["idProduto"])) {
                        
                        $produtoForm = new Produto();
                        
                        $idProduto = $_GET["idProduto"];

                        $produtoController = new ProdutoController();

                        $produtoForm = $produtoController->SelecionarPorID($idProduto);

                    }
                    ?>
                    <h1>Exclusão de Produto</h1>
                    <form action="excluir.php?idProduto=<?php echo $idProduto;?>" 
                          method="post" 
                          class="mt-5">
                        <div class="form-group">
                            <label>Confirma exclusão desse produto?</label>
                            
                        </div>
                        <div class="form-group">
                            <?php 
                            echo '<ul>';
                            echo "<li>#ID:      $produtoForm->IdProduto </li>";
                            echo "<li>Produto:  $produtoForm->Produto</li>";
                            echo "<li>Preço:" . $produtoForm->exibeReal($produtoForm->Preco) . "</li>";
                            echo '</ul>'; ?>                            
                        </div>                        
                        <input type="hidden" name="confirma_exclusao" value="sim"/>
                        <div class="form-group">
                            <input type="submit" 
                                   id="btnEnviar" 
                                   class="btn btn-danger" 
                                   value="Confirmar"/>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <?php
                    // verifica se há informação de produto vinda do formulário
                    if (isset($_POST["confirma_exclusao"])) {
                        
                        $produtoController->Excluir($idProduto);
                        echo "<h1>Produto excluído com sucesso!</h1>";
                    }
                    ?>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="listar.php" class="btn btn-success">Ver lista</a>                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
