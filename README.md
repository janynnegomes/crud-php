# crud-php
Esse repositório foi elaborado para os alunos do SENAI como exemplo de manipulação básica de dados MySQL em PHP 

## Cadastro do produto
O usuário do sistema insere os dados necessários para cadastro básico do produto e clica no botão Adicionar. Pode clicar ainda no botão Ver lista para acessar todos os dados de produtos já inseridos.

![Tela de cadastro](https://github.com/janynnegomes/crud-php/blob/master/telas/1-%20cadastro-produto.png?raw=true)

## Confirmação do cadastro
Ao clicar no botão Adicionar o sistema salva as informações na base de dados e exibe uma mensagem de confirmação da operação.

![Confirmação do cadastro](https://github.com/janynnegomes/crud-php/blob/master/telas/1-1-cadastro-concluido.png?raw=true)

## Lista de produtos
A tela de lista de produtos está configurada como a tela principal do sistema e pode também ser acessada a partir das telas de inserção e edição do produto.

Ela permite acesso às demais operações de manutenção dos dados: alteração e exclusão.

![](https://github.com/janynnegomes/crud-php/blob/master/telas/2-listagem-produto.png?raw=true)

## Alteração do produto
Uma vez inserido, o produto pode ter suas informações modificadas, essa tela é acessível a partir da listagem e requer uma seleção prévia do produto que será alterado, clicando no botão Editar da tela **Lista de Produtos**.

![](https://github.com/janynnegomes/crud-php/blob/master/telas/3-alteracao-produto.png?raw=true)

## Exclusão de produto

Para excluir da base de dados são necessárias duas ações, a primeira é a de escolha do produto á ser excluído a partir da tela **Lista de Produtos**. Em seguida é necessária uma confirmação, visto que essa é uma ação irreversível. Ao confirmar clicando no botão vermelho Confirmar, o usuário vê a mensagem de confirmação da exclusão.

![](https://github.com/janynnegomes/crud-php/blob/master/telas/4-exclusao-produto.png?raw=true)
