A partir da análise da interface e do comportamento visível do sistema, foi possível identificar alguns problemas relacionados à usabilidade, organização e fluxo de interação, bem como propor melhorias para tornar a aplicação mais eficiente e intuitiva.

Um dos principais pontos observados é a organização da interface, que não apresenta uma estrutura visual bem definida. Elementos como categorias e produtos, especialmente os combos, acabam ficando visualmente misturados, o que pode confundir o usuário durante a navegação. Como melhoria, recomenda-se uma melhor separação por seções, uso de espaçamentos adequados e hierarquia visual mais clara.

Outro problema identificado está relacionado ao posicionamento dos botões, que em alguns casos ficam muito próximos das bordas da tela ou com pouco espaçamento entre si. Isso dificulta a visualização e pode prejudicar a interação, principalmente em dispositivos móveis. Como solução, sugere-se aplicar princípios de design responsivo, com margens e paddings mais equilibrados.

Também foi observado que o sistema não realiza o processamento automático de pagamento, o que já é uma funcionalidade comum em sistemas de delivery atuais. A ausência dessa funcionalidade pode tornar o processo mais demorado e menos prático. Como melhoria, seria interessante integrar meios de pagamento online, como Pix, cartão de crédito ou carteiras digitais.

Além disso, o sistema apresenta uma redundância no fluxo de pedido, exigindo que o usuário selecione mais de uma vez o tamanho da pizza para concluir a compra. Esse tipo de repetição torna a experiência cansativa e pouco eficiente. A melhoria proposta é simplificar o fluxo, permitindo a seleção do tamanho apenas uma vez, de forma clara e direta.

Por fim, os alertas do sistema são pouco intuitivos, sendo exibidos como caixas padrão do navegador, com textos simples e pouco explicativos. Isso compromete a experiência do usuário, pois não há personalização nem clareza nas mensagens. Recomenda-se a implementação de alertas personalizados (como modais ou notificações visuais), com linguagem mais amigável e orientações mais claras.


Além dos problemas de interface e usabilidade, também é possível identificar limitações relacionadas à qualidade do código e da arquitetura do sistema, mesmo sem acesso direto ao backend, com base no comportamento observado e na estrutura típica desse tipo de aplicação.

Um dos principais pontos é a baixa coesão em algumas partes do sistema. Como melhoria, recomenda-se aplicar o princípio da responsabilidade única (SRP), dividindo melhor as funções e organizando o código em camadas, como apresentação, lógica de negócio e acesso a dados.

Outro problema identificado é o alto acoplamento, especialmente na comunicação entre interface e processamento de dados. Isso torna o sistema mais rígido e difícil de modificar, pois mudanças em uma parte podem impactar várias outras. Como solução, sugere-se utilizar uma arquitetura mais desacoplada, com uso de APIs bem definidas e separação clara entre frontend e backend.

Também se observa uma possível deficiência na divisão de tarefas entre componentes do sistema. Funcionalidades como gerenciamento de carrinho, cálculo de valores e manipulação de pedidos poderiam estar melhor distribuídas em módulos ou classes específicas. A melhoria proposta é modularizar o sistema, criando componentes independentes (por exemplo: módulo de carrinho, módulo de pedidos, módulo de produtos), facilitando testes, manutenção e reutilização de código.

Outro ponto relevante é a ausência de um padrão arquitetural bem definido, como MVC (Model-View-Controller). Isso pode causar mistura entre regras de negócio e interface, dificultando a organização do sistema. A adoção de um padrão arquitetural ajudaria a estruturar melhor o projeto, separando responsabilidades e tornando o código mais escalável.

Além disso, há indícios de pouca padronização na validação e tratamento de erros, já que os alertas são simples e pouco informativos. Isso pode refletir uma ausência de camadas específicas para validação e feedback ao usuário. Como melhoria, recomenda-se implementar validações mais robustas tanto no frontend quanto no backend, além de mensagens mais claras e estruturadas.

Por fim, o sistema poderia se beneficiar da adoção de boas práticas de engenharia de software, como uso de padrões de projeto (ex: Factory para criação de objetos, ou Repository para acesso a dados), versionamento de código, documentação e testes automatizados.