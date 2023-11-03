# API - FastService
Aplicação Controle de Estoque - É um Sofwate para controle o controle e gestão de estoque.

Desenvolvido com as seguintes tecnologias:
- Conceitos de boas práticas e qualidade no código, usando Design Patterns, Clean Architecture, Domain Driven Design (DDD) e Princípios SOLID
- Laravel
- HTML
- CSS
- Bootstrap
- Javascript
- Banco de dados relacional **MySQL**
- **Docker**

 ### Funcionalidades do software
 - Clientes
    - Filtrar clientes
    - Cadastrar cliente
    - Atualizar cliente
    - Remove cliente

- Fornecedores
    - Filtrar fornecedores
    - Cadastrar um fornecedor
    - Atualizar fornecedor
    - Remover fornecedor
    - Visualizar um único fornecedor

- Produtos
    - Filtrar produtos
    - Cadastrar um produto
    - Atualizar um produto
    - Remover um produto
    - Visualizar um único produto
    - Fazer upload de imagem do produto

- Categorias
    - Filtrar categorias
    - Cadastrar uma categoria
    - Atualizar uma categoria
    - Remove uma categoria
 
- Usuários
    - Visualizar informações de perfil de usuário
    - Atualizar informações de perfil de usuário que não foram cadastradas ainda (null)
    - Fazer upload de imagem de usuário
    
- Entradas
    - Cadastrar uma entrada

- Saidas
    - Cadastrar uma saída
 
- Consultas de Entradas
    - Consultar as entradas por filtro
    - Fazer upload de relatório de entradas

- Consultas de Saídas
    - Consultar as saídas por filtro
    - Fazer upload de relatório de saídas

- Autenticação
    - Autenticação de usuário
    
# Diagrama Entidade e Relacionamento

![Diagrama](https://github.com/juniorsilvacc/logistics-api/assets/43589505/81003074-3a46-4dcf-a7e8-f53093699d42)

---
## Como executar o projeto

1. Baixe e instale o Docker Desktop
2. Faça o Download do zip do projeto ou clone o repositório Git e extraia o conteúdo do arquivado compactado
3. Navegue até a pasta do projeto e abra o Prompt de Comando do Windows ou Terminal do GNU/Linux
4. Execuete o comando `mvn clean package -DskipTests`. Ele irá gerar os target jar
5. Execute o comando `docker-compose up -d --build`. Ele irá criar um container chamado api-fastservice e db_fastservice-postgres contendo a imagem do banco de dados PostgreSQL e Jdk19.

![Captura de tela 2023-04-12 203236](https://user-images.githubusercontent.com/43589505/231607980-d6ce2108-7ed0-4e8e-b681-4b9d2b0a6603.png)

6.  Abra o VSCode ou IDE de sua preferência.
7.  Importe o projeto baixado: Vá em File > Open Projects from File System. Selecione a pasta pela opção "Directory" e pressione Finish.
9.  Abra a pasta do projeto e execute com o comando `php artisan serve`.
10.  O projeto irá ser executado.
11.  Entre com a url http://localhost:8000/; 

### Autor
Feito por Cícero Júnior. 👋🏽 Entre em contato! <br>
<a href="https://www.linkedin.com/in/juniiorsilvadev/" target="_blank"><img src="https://img.shields.io/badge/-LinkedIn-%230077B5?style=for-the-badge&logo=linkedin&logoColor=white" target="_blank"></a> 




