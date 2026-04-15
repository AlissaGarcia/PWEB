Problemas Identificados: 

	7.1 Limitações de arquitetura

O sistema apresenta limitações relacionadas à sua arquitetura, que aparenta ser simples e pouco estruturada. Não há indícios claros de uma separação bem definida em camadas ou da utilização de padrões arquiteturais como MVC. Além disso, o uso de tecnologias mais tradicionais, como PHP sem framework e bibliotecas JavaScript desatualizadas, indica uma arquitetura mais monolítica e menos preparada para escalabilidade. Isso dificulta a evolução do sistema, especialmente caso seja necessário adicionar novas funcionalidades, como integração com sistemas de pagamento ou aplicativos móveis.

	
	7.2 Alto acoplamento 

O sistema demonstra um nível elevado de acoplamento entre seus componentes, principalmente entre a interface (front-end) e a lógica de negócio. É provável que scripts JavaScript estejam diretamente ligados à manipulação de dados e que o PHP misture regras de negócio com apresentação. Esse alto acoplamento faz com que alterações em uma parte do sistema impactem diretamente outras, reduzindo a flexibilidade e aumentando o risco de erros durante modificações.


	7.3 Dificuldade de manutenção

Devido à ausência de uma estrutura bem organizada, à falta de separação clara de responsabilidades e ao alto acoplamento, o sistema tende a apresentar dificuldades de manutenção. A leitura e compreensão do código tornam-se mais complexas, principalmente para novos desenvolvedores. Além disso, a atualização de funcionalidades ou correção de erros pode exigir alterações em múltiplos pontos do sistema, aumentando o tempo de desenvolvimento e a possibilidade de introdução de novos problemas.


Proposta de Arquitetura

	8.1 Organização de camadas ou MVC:

Como proposta de melhoria, recomenda-se a adoção do padrão MVC (Model-View-Controller) para organizar melhor a estrutura do sistema. Nesse modelo, o Model seria responsável pelos dados e regras de negócio, como Produto, Pedido e Cliente. A View ficaria encarregada da interface com o usuário, exibindo o cardápio, carrinho e telas de finalização. Já o Controller atuaria como intermediador, recebendo as requisições do usuário, processando as ações (como adicionar itens ao pedido) e retornando as respostas adequadas. Essa organização em camadas contribui para um código mais limpo, reutilizável e de fácil manutenção.

	8.2 Separação de responsabilidades:

A separação de responsabilidades deve ser aplicada de forma clara entre as partes do sistema. Cada classe ou módulo deve ter uma única responsabilidade bem definida. Por exemplo, classes de modelo devem apenas representar dados e regras de negócio, enquanto controladores devem gerenciar o fluxo da aplicação e as views devem cuidar apenas da apresentação. Além disso, a lógica de acesso a dados pode ser isolada em componentes específicos, como repositórios ou serviços, evitando que o código fique misturado e difícil de manter.
	
	8.3 Componentes principais:

Na nova arquitetura proposta, o sistema pode ser dividido em componentes principais bem definidos. Entre eles, destacam-se o módulo de gerenciamento de produtos, responsável por cadastrar, listar e organizar os itens do cardápio; o módulo de pedidos, responsável por criar, atualizar e finalizar pedidos; o módulo de clientes, que gerencia dados como nome, telefone e endereço; e o módulo de pagamento, que pode futuramente integrar formas de pagamento online. Além disso, há o componente de interface (front-end), responsável pela interação com o usuário, e o componente de back-end, que processa as regras de negócio e realiza a comunicação com o banco de dados. Essa divisão torna o sistema mais organizado, escalável e preparado para futuras melhorias.


Aplicação de Padrões

	9.1 Como aplicar o Factory

O padrão Factory pode ser aplicado no sistema para centralizar a criação de objetos relacionados ao domínio, como Produto, Pedido e ItemPedido. Em vez de instanciar esses objetos diretamente em diferentes partes do código, seria criada uma classe responsável por essa criação, como uma “ProdutoFactory” ou “PedidoFactory”. Por exemplo, ao criar um produto, a factory poderia receber o tipo (pizza, sanduíche, bebida) e retornar o objeto já configurado corretamente. Isso evita repetição de código, facilita a manutenção e permite adicionar novos tipos de produtos sem alterar várias partes do sistema. Além disso, a lógica de criação fica isolada em um único local, tornando o sistema mais organizado.


	9.2 Como aplicar o Singleton

O padrão Singleton pode ser aplicado para gerenciar recursos que devem ter apenas uma única instância durante a execução do sistema, como a conexão com o banco de dados. Nesse caso, seria criada uma classe de conexão que garante que apenas um objeto seja instanciado. Sempre que o sistema precisar acessar o banco, ele utilizaria essa mesma instância. Isso melhora o controle de recursos, evita múltiplas conexões desnecessárias e pode contribuir para o desempenho da aplicação. Além disso, o Singleton também pode ser utilizado para gerenciar configurações globais do sistema, como parâmetros de ambiente ou configurações gerais da aplicação.


Reflexão Crítica

	10.1 É possível modelar um sistema sem ver o código?

Sim, é possível modelar um sistema mesmo sem ter acesso ao código-fonte. A modelagem pode ser realizada com base na observação do funcionamento do sistema, na análise da interface, nas funcionalidades disponíveis e no comportamento esperado. A partir disso, é possível identificar entidades, fluxos, regras de negócio e interações entre os componentes. No entanto, essa modelagem tende a ser mais abstrata e pode não refletir exatamente a implementação real, já que detalhes internos e decisões técnicas não ficam visíveis.

	10.2 Qual a importância da modelagem?

A modelagem é fundamental no desenvolvimento de sistemas, pois permite compreender, organizar e representar a estrutura e o funcionamento da aplicação antes ou durante sua implementação. Ela auxilia na identificação de entidades, relacionamentos e responsabilidades, além de facilitar a comunicação entre desenvolvedores e outros envolvidos no projeto. Uma boa modelagem contribui para a redução de erros, melhora a qualidade do sistema e torna o desenvolvimento mais eficiente, além de servir como base para manutenção e evolução futura.

	10.3 Qual a diferença entre sistema real e didático?
O sistema real foi desenvolvido e pensado para atender necessidades práticas, envolvendo usuários reais, requisitos, regras de negócio mais estabelecidas integrações externas, segurança, desempenho e escalabilidade. Já o sistema didático foi criado com fins educacionais, focando na compreensão de conceitos e técnicas de desenvolvimento, com menor complexidade e sem a necessidade de atender todos os requisitos de um ambiente real. O sistema real jpa aplica uma arquitetura mais consolidada de cliente-servidor. Já o sistema didático é um monolítico.