<?php
require_once 'Banco.php';

class ProdutoController extends Banco{
    
    private  $tabela = "Produtos";
    private  $conexao;
    private  $sql;
            
    function SelecionarTodos(){
        
        
        $this->conexao =  parent::Conexao();
        $this->sql = "SELECT `IdProduto`,`Produto`,`Preco`,`txReajuste` "
                . "FROM $this->tabela";
        $busca = mysqli_query($this->conexao, $this->sql);
        
        while($dadoProduto = mysqli_fetch_array($busca))
        {
            $prod = new Produto();
            $prod->IdProduto = $dadoProduto["IdProduto"];
            $prod->Produto = $dadoProduto["Produto"];
            $prod->Preco = $dadoProduto["Preco"];
            $prod->txReajuste = $dadoProduto["txReajuste"];
           
            $listaProdutos[] =  $prod;
        }
        
        return $listaProdutos;
       
    }
    
     function SelecionarPorID($idProduto){
        
        $this->conexao =  parent::Conexao();
        $this->sql = "SELECT `IdProduto`,`Produto`,`Preco`,`txReajuste`"
                . " FROM $this->tabela WHERE IdProduto = '$idProduto'";
        
        $busca = $this->conexao->query($this->sql);
        
        $resultado = mysqli_fetch_row($busca);
        
        
        $produto = new Produto();
        $produto->IdProduto = $resultado[0];
        $produto->Produto = $resultado[1];
        $produto->Preco  = $resultado[2];
        $produto->txReajuste  = $resultado[3];
        
        return $produto;
       
    }
    
    function Inserir( Produto $produto)
    {
        $this->conexao =  parent::Conexao();
        $this->sql = "INSERT INTO  $this->tabela "
                . "VALUES(null, "
                . "'$produto->Produto', "
                . "'$produto->Preco', "
                . "'$produto->txReajuste');";
        
       $this->conexao->query( $this->sql); 
       return $this->conexao->insert_id;
    }
    
    function Atualizar(Produto $produto)
    {
        $this->conexao =  parent::Conexao();
        $this->sql = "UPDATE $this->tabela "
                . "SET `produto`='$produto->Produto',"
                . "`preco`= '$produto->Preco', "
                . "`txreajuste`= '$produto->txReajuste' 
                    WHERE `IdProduto`= $produto->IdProduto;";
        $this->conexao->query($this->sql);
    }
    
    function Excluir($idProduto)
    {
        $this->conexao =  parent::Conexao();
        $this->sql = "DELETE FROM $this->tabela WHERE `IdProduto`=$idProduto;";
        $this->conexao->query($this->sql);
    }
}
