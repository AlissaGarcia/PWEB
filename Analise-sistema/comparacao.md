Padrões de Projeto 

	4.1 O sistema aparenta utilizar padrões?

O sistema não apresenta evidências claras da utilização explícita de padrões de projeto formais. A aplicação parece ter sido desenvolvida de maneira mais direta, utilizando PHP no back-end e JavaScript com jQuery no front-end, sem a adoção estruturada de padrões como MVC, Factory ou Singleton. Apesar disso, podem existir implementações implícitas ou não padronizadas de algumas dessas ideias, mas sem uma organização clara que caracterize o uso intencional de padrões de projeto.

	4.2 Onde poderiam existir Factory, SIngleton e MVC?

O padrão Factory poderia existir na criação de objetos relacionados ao domínio do sistema, como produtos (pizza, sanduíche, bebida) e pedidos, centralizando essa responsabilidade em uma única classe. O Singleton poderia ser aplicado na gestão da conexão com o banco de dados, garantindo que apenas uma instância seja utilizada durante a execução do sistema. Já o padrão MVC poderia existir na estrutura geral da aplicação, separando as responsabilidades entre Model (dados como produtos e pedidos), View (interface do usuário, como o cardápio) e Controller (lógica que processa as ações do usuário).

	4.3 Onde poderiam ser aplicados? 

Esses padrões poderiam ser aplicados para melhorar a organização e manutenção do sistema. O Factory poderia ser implementado na criação de objetos no back-end, evitando repetição de código. O Singleton poderia ser utilizado para gerenciar conexões com banco de dados ou configurações globais do sistema. O MVC poderia ser adotado para estruturar melhor o sistema, separando a lógica de negócio, a interface e o controle das requisições, tornando o código mais organizado, reutilizável e escalável.


Comparação com Sistema Didático

## Comparação entre Sistema Real e Sistema Didático

| Critério        | Sistema Real (Pizzaria)                                      | Sistema Didático (Acadêmico)                          |
|----------------|-------------------------------------------------------------|------------------------------------------------------|
| Arquitetura    | Cliente-servidor, com separação básica entre front e back    | Monolítica, sem divisão clara de camadas             |
| Coesão         | Baixa, com responsabilidades pouco definidas                | Baixa, com funções concentrando múltiplas tarefas    |
| Acoplamento    | Moderado a alto, com dependência entre partes do sistema     | Alto, com forte dependência entre componentes        |
| Organização    | Limitada, sem padrão arquitetural bem definido              | Pouca organização estrutural                         |
| Flexibilidade  | Baixa, com dificuldade de adaptação e evolução              | Muito baixa, difícil de modificar e expandir         |



Modelagem do Sistema.

6.1 Identificação de Entidades
	
As principais entidades do sistema estão relacionadas ao domínio de pedidos de uma pizzaria. Entre elas, destacam-se Produto, Pedido, ItemPedido, Categoria e Cliente. A entidade Produto representa os itens disponíveis para venda, como pizzas, lanches e bebidas. A entidade Categoria organiza os produtos em grupos, como combos, promoções ou tipos de alimentos. Pedido representa a compra realizada pelo cliente, contendo informações gerais da solicitação. ItemPedido é responsável por relacionar os produtos ao pedido, incluindo quantidade e possíveis observações. Já a entidade Cliente pode armazenar informações como nome, endereço e contato, necessários para a entrega do pedido.
	
6.2 Definição de Classes

A classe Produto pode possuir atributos como id, nome, descrição, preço e categoria, além de métodos como exibirDetalhes() e calcularPreco(). A classe Categoria pode conter atributos como id e nome, com métodos simples como listarProdutos(). A classe Pedido pode ter atributos como id, data, valorTotal, status e cliente, e métodos como adicionarItem(), removerItem() e calcularTotal(). A classe ItemPedido pode possuir atributos como produto, quantidade, observação e subtotal, além de métodos como calcularSubtotal().
A classe Cliente pode conter atributos como nome, telefone e endereço, com métodos como atualizarDados(). De forma geral, essas classes representam a estrutura básica do sistema e permitem organizar melhor os dados e comportamentos envolvidos no processo de compra.


6.3 Diagrama de Classes: em png

Classes
Relacionamentos
Multiplicidade



6.4 Justificativa das Escolhas:


