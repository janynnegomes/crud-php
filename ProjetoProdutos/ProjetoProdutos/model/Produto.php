<?php class Produto {
    
    var $IdProduto;
    var $Produto;
    var $Preco;  
   
    
    function exibeReal($valor){
        return number_format($valor, '2',',','.');
    }    
   
}