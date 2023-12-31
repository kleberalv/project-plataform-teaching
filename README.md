# Projeto Plataforma de estudos
Projeto feito com laravel e docker.

## Descrição
Aplicação em PHP usando Laravel para criar uma plataforma de matrícula em cursos online. A plataforma permite a autenticação de administradores, gerenciamento de áreas de cursos (CRUD), gestão de alunos (CRUD) e matrículas (CRUD). Além disso, realiza consulta por nome, e-mail ou matéria. O projeto destaca boas práticas de Orientação a Objetos, migrations para o banco de dados e documentação de instalação.

Aqui está uma visão detalhada de cada contêiner:

1. app:

Este contêiner é responsável por hospedar a aplicação principal desenvolvida em PHP. Ele é construído a partir de um Dockerfile personalizado que foi configurado para operar em conjunto com o servidor PHP. O uso do Xdebug facilita as atividades de desenvolvimento e depuração, tornando o processo mais eficiente.

2. db:

O contêiner MariaDB é dedicado ao armazenamento dos dados do aplicativo. Ele oferece um ambiente seguro para a persistência de informações cruciais, como tabelas e registros. A presença desse contêiner é fundamental para garantir o funcionamento correto e a integridade dos dados.

3. phpmyadmin:

Este contêiner hospeda uma interface web do phpMyAdmin, uma ferramenta de administração de banco de dados. Através dele, é possível interagir com o banco de dados MariaDB de maneira intuitiva e conveniente, facilitando tarefas administrativas e manipulação de dados.

4. nginx:

Atuando como servidor web, o contêiner Nginx direciona as solicitações HTTP para a aplicação PHP. Além disso, ele proporciona uma camada extra de segurança e otimização de desempenho, contribuindo para uma experiência de usuário mais eficiente e segura.

## Licença

Este projeto é licenciado sob a [Licença MIT](LICENSE). Consulte o arquivo [LICENSE](LICENSE) para obter mais detalhes.

### Responsabilidade

O autor deste projeto não assume nenhuma responsabilidade pelo uso indevido ou violação dos termos de licença. Você é o único responsável por garantir o uso adequado e ético deste código-fonte.

### Isenção de Garantia

Este projeto é fornecido "no estado em que se encontra", sem garantias de qualquer tipo. O autor não se responsabiliza por quaisquer danos ou consequências decorrentes do uso deste software.

## Instruções

Siga as etapas abaixo para configurar e executar o projeto:

1. Clone o repositório project-plataform-teaching em seu sistema.

2. Abra um terminal e navegue até o diretório project-plataform-teaching.

3. Copie os dados do arquivo .env.example, crie um arquivo na raiz do projeto chamado .env e cole dentro dele os dados presentes em .env.example.

4. Execute o seguinte comando para construir e iniciar os contêineres:
`docker-compose up -d --build`

5. Após o download e a criação dos contêineres, acesse o contêiner app através do terminal:
`docker exec -it apllication-server-app /bin/bash`

6. Dentro do contêiner app, execute o seguinte comando:
`composer install`

7. Após a instalação das dependências, rode o seguinte comando para a criar e popular o banco de dados:
`php artisan migate` e `php artisan db:seed`

8. Agora, você pode acessar o projeto em seu navegador através do link: http://localhost:8080/.

## Tecnologias utilizadas
<div align="left">
    <img align="center" alt="PHP" src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white">
    <img align="center" alt="Laravel" src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white">
    <img align="center" alt="Xdebug" src="https://img.shields.io/badge/Xdebug-DB1F29?style=for-the-badge&logo=xdebug&logoColor=white">
</div>

## Ferramentas de desenvolvimento utilizadas
<div align="left">
    <img align="center" alt="Docker" src="https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white"> 
    <img align="center" alt="Git" src="https://img.shields.io/badge/git-%23F05033.svg?style=for-the-badge&logo=git&logoColor=white"> 
    <img align="center" alt="Composer" src="https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=composer&logoColor=white">
    <img align="center" alt="MariaDB" src="https://img.shields.io/badge/MariaDB-003545?style=for-the-badge&logo=mariadb&logoColor=white">
    <img align="center" alt="phpMyAdmin" src="https://img.shields.io/badge/phpMyAdmin-4479A1?style=for-the-badge&logo=phpmyadmin&logoColor=white">
</div>

# Copyright ©
Copyright © Developed by: Kleber Alves Bezerera Junior - Full Stack Developer 2023.
