<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexao
 *
 * @author janynne
 */
class Banco {

    var $usuario = "root";
    var $senha = "2384";
    var $banco = "loja";
    var $servidor = "localhost";

    function Conexao() {
        $conexao = new mysqli($this->servidor, $this->usuario, $this->senha, $this->banco);

        // Verificar conexão
        if (!$conexao) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        return $conexao;
    }

}
