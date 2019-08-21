<?php
require_once 'Banco.php';

class ProdutoController extends Banco{
    
    private  $tabela = "Produtos";
    private  $conexao;
    private  $sql;
            
    function SelecionarTodos(){
        
        
        $this->conexao =  parent::Conexao();
        $this->sql = "SELECT `IdProduto`,`Produto`,`Preco` "
                . "FROM $this->tabela";
        $busca = mysqli_query($this->conexao, $this->sql);
        
        // Ver documentação: https://www.php.net/manual/pt_BR/mysqli-result.fetch-object.php
        while($dadoProduto = mysqli_fetch_object($busca,'Produto'))
        {           
            $listaProdutos[] =  $dadoProduto;
        }
        
        return $listaProdutos;
       
    }
    
     function SelecionarPorID($idProduto){
        
        $this->conexao =  parent::Conexao();
        $this->sql = "SELECT `IdProduto`,`Produto`,`Preco`"
                . " FROM $this->tabela WHERE IdProduto = '$idProduto'";
        
        $busca = $this->conexao->query($this->sql);
        
        // Ver documentação: https://www.php.net/manual/pt_BR/mysqli-result.fetch-object.php
        $resultado = mysqli_fetch_object($busca,'Produto');  
        
        return $resultado;
       
    }
    
    function Inserir( Produto $produto)
    {
        $this->conexao =  parent::Conexao();
        $this->sql = "INSERT INTO  $this->tabela "
                . "VALUES(null, "
                . "'$produto->Produto', "
                . "'$produto->Preco');";
        
       $this->conexao->query( $this->sql); 
       return $this->conexao->insert_id;
    }
    
    function Atualizar(Produto $produto)
    {
        $this->conexao =  parent::Conexao();
        $this->sql = "UPDATE $this->tabela "
                . "SET `produto`='$produto->Produto',"
                . "`preco`= '$produto->Preco'  
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
