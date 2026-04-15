Compreensão do Sistema 

1.1 Qual o objetivo do Sistema?

O sistema tem como principal objetivo permitir que os clientes realizem pedidos de uma pizzaria física especializada na venda de pizzas, lanches, esfihas, bebidas e combos. Além de facilitar a escolha dos produtos, o sistema também busca agilizar o processo de solicitação de entrega, reunindo em um único ambiente todas as etapas do pedido, desde a seleção dos itens até a definição da forma de pagamento e do endereço de entrega.  

     1.2 Quais são suas principais funcionalidades?

O sistema oferece diversas funcionalidades voltadas à praticidade do cliente. Entre as principais, destacam-se: Exibição de um cardápio virtual contendo todos os produtos disponíveis; Organização dos itens por categorias, combos e promoções; Navegação entre produtos semelhantes; Seleção de produtos e escolha da quantidade desejada; Inclusão de adicionais e observações específicas para cada item; Simulação de um carrinho de compras, permitindo visualizar os itens selecionados; Cálculo automático do valor total da compra; Escolha da forma de pagamento; Definição do endereço para entrega; Finalização do pedido.
Embora o cliente possa selecionar a forma de pagamento, o pagamento não é processado diretamente pelo sistema, sendo realizado posteriormente no momento da entrega ou retirada.

	1.3 Como o usuário interage com o sistema?
		
A interação do usuário ocorre por meio de uma interface simples e intuitiva, composta por botões, imagens e campos de entrada. Inicialmente, o cliente navega pelo cardápio e escolhe a categoria desejada, como pizzas, sanduíches, bebidas ou promoções. Em seguida, seleciona o produto, informa a quantidade e utiliza o botão “Adicionar ao Carrinho” para inserir o item no pedido.
Durante todo o processo, o usuário pode visualizar os produtos adicionados, alterar quantidades, inserir observações e acompanhar o valor total da compra em tempo real. Ao concluir a seleção dos itens, o cliente utiliza a opção “Finalizar Pedido”, momento em que informa a forma de pagamento e o endereço de entrega..

	1.4 Como os produtos estão organizados?

Os produtos são organizados de forma responsiva, adaptando-se ao tipo de dispositivo utilizado pelo cliente. Na versão mobile, os produtos são exibidos em uma única coluna, facilitando a navegação em telas menores. Já na versão desktop, os itens são distribuídos em duas colunas, proporcionando melhor aproveitamento do espaço e tornando a visualização mais organizada.

Além disso, o sistema possui uma barra de navegação principal dividida em três seções: categorias, combos e promoções. Dentro de cada seção, os produtos são agrupados por tipo.    

Análise de Arquitetura 

		2.1 Tipo de Arquitetura?
	
O sistema analisado apresenta uma arquitetura baseada no modelo cliente-servidor, com indícios de organização em camadas, ainda que de forma não totalmente explícita. Nesse tipo de arquitetura, há uma separação entre a interface do usuário, o processamento das requisições e o armazenamento dos dados, o que contribui para uma melhor estruturação do sistema e facilita sua manutenção.
A camada de front-end é responsável pela interação com o usuário, sendo desenvolvida com tecnologias como HTML5, CSS e JavaScript, além do uso de bibliotecas e frameworks como Bootstrap, jQuery, Modernizr e Popper. Essa camada permite a visualização do cardápio, a navegação entre categorias, combos e promoções, bem como a seleção de produtos e interação com o carrinho de compras.
A camada de back-end utiliza a linguagem PHP, que é responsável por processar as requisições enviadas pelo cliente, aplicar as regras de negócio, como cálculo do valor total do pedido e organização dos itens selecionados, e retornar as respostas adequadas ao usuário. Já a camada de dados, embora não detalhada explicitamente, é responsável pelo armazenamento das informações do sistema, como produtos e pedidos, sendo acessada pelo back-end.
O sistema utiliza o servidor web Apache e está hospedado na plataforma HostGator, caracterizando uma infraestrutura tradicional de hospedagem. 
De modo geral, a arquitetura adotada é simples e funcional, sendo adequada para aplicações de pequeno a médio porte, como um sistema de cardápio digital com pedidos online. 

Análise de design 

		3.1 Coesão, acoplamento e separação de responsabilidades.

O sistema não apresenta uma aplicação clara e bem estruturada dos princípios de coesão, acoplamento e separação de responsabilidades. Observa-se que há uma tendência de centralização de funcionalidades, onde diferentes responsabilidades podem estar concentradas em um mesmo módulo ou arquivo, especialmente no back-end em PHP e em scripts JavaScript no front-end. Isso indica uma baixa coesão, pois elementos que deveriam ter funções específicas acabam desempenhando múltiplos papéis dentro do sistema.
 
Em relação ao acoplamento, é provável que ele seja relativamente alto, uma vez que as partes do sistema parecem depender diretamente umas das outras, sem a presença de camadas bem definidas ou uso de padrões arquiteturais mais robustos. Por exemplo, a interface pode estar diretamente ligada às regras de negócio e à manipulação de dados, dificultando alterações isoladas sem impactar outras partes do sistema.

Quanto à separação de responsabilidades, embora exista uma divisão básica entre front-end e back-end, essa separação não é totalmente estruturada. Não há evidências claras de padrões como MVC (Model-View-Controller) ou outras abordagens que promovam uma divisão mais organizada entre apresentação, lógica de negócio e dados. Isso pode tornar o sistema mais difícil de manter, evoluir e escalar ao longo do tempo.

