PRÁTICA ORIENTADA 04 

Programação Web I
Prof. Dr. Renato William Rodrigues de Souza
IFCE Campus Boa Viagem
Curso: Análise e Desenvolvimento de Sistemas

Aluno: Alissa Garcia Moreira





Evolução Arquitetural, Backend em PHP e Deploy de Sistema




Boa Viagem - 2026
Justificativa Técnica

1.1 Quais problemas foram resolvidos?

Foram resolvidos problemas de alta interdependência entre partes do sistema e o risco de uma alteração quebrar todos os módulos ao mesmo tempo. Antes, por ser monolítico, qualquer mudança tinha impacto amplo e difícil de controlar.     

            1.2 Como a arquitetura melhorou o sistema?

A mudança para um modelo em camadas, com backend em PHP separado em controllers, models e services, trouxe melhor organização, separação de responsabilidades e maior facilidade de manutenção e evolução do sistema. 

	1.3 Onde os padrões foram aplicados?

O padrão Factory está implementado na classe ProdutoFactory, que centraliza a criação de objetos Produto com base em um tipo (pastel, caldo, refrigerante, suco). O padrão Singleton está implementado em PedidoRepository. No construtor de PedidoController, o repositório é obtido por PedidoRepository::getInstance(), garantindo o uso da mesma instância compartilhada durante a execução.

1.4 Como foi feita a integração frontend/backend?
	
A integração foi feita por meio do Docker, que conecta os serviços de frontend e backend em containers, permitindo que eles se comuniquem de forma padronizada e consistente. 

	1.5 Quais dificuldades no deploy?

Antes da dockerização, o deploy era mais difícil por depender de configurações específicas de ambiente e possíveis incompatibilidades entre máquinas. 

	1.6 Qual o papel do Docker no projeto?

O Docker foi responsável por containerizar a aplicação, facilitando a integração entre frontend e backend e permitindo que o sistema rode facilmente em qualquer máquina, independentemente do ambiente. 
