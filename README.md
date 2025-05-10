## DESAFIO TÉCNICO: CRUD DE PROJETOS
    Projeto dedicado a avaliação de nivél técnico, com o intuito de saber se estou apto a trabalhar com as tecnologias utilizadas na empresa!

## STACKS UTILIZADAS

![FastAPI](https://img.shields.io/badge/FastAPI-005571?style=for-the-badge&logo=fastapi)
![Tortoise](https://img.shields.io/badge/Tortoise-%23C72C41.svg?style=for-the-badge&logo=Tortoise-orm&logoColor=white)
![Php](https://img.shields.io/badge/php-%2300599C.svg?style=for-the-badge&logo=php&logoColor=white)
![Apache](https://img.shields.io/badge/apache-%231287B1.svg?style=for-the-badge&logo=apache&logoColor=white)
![Docker](https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white)
![Postgres](https://img.shields.io/badge/postgres-%23316192.svg?style=for-the-badge&logo=postgresql&logoColor=white) 
![Html](https://img.shields.io/badge/Html-005571?style=for-the-badge&logo=Html5)
![css](https://img.shields.io/badge/css-005571?style=for-the-badge&logo=css3)
![JS](https://img.shields.io/badge/JS-005571?style=for-the-badge&logo=javascript)

## INSTALAÇÃO 

    git clone git@github.com:Tiago-Dev0708/Desafio_Tecnico-Crud_Projetos.git
    cd Desafio_Tecnico-Crud_Projetos/Project

## INSTALE E ATIVE UM AMBIENTE VIRTUAL PYTHON 
### INSTALAÇÃO
    python3 -m venv venv
     
### ATIVAÇÃO
    Linux: source venv/bin/activate
    Windows: .\venv\Scripts\activate

## INSTALE AS DEPENDÊNCIAS PARA SUBIR O BACKEND
    pip install -r requirements.txt

##  CRIE "caso não tenha" UM ARQUIVO .env E COLE O SEGUINTE TRECHO DE CÓDIGO
    PG_USER=admin
    PG_PASS=admin
    PG_DB=CrudProject
    PG_HOST=postgres
    PG_PORT=5432

    PGADMIN_EMAIL="admin@gmail.com"
    PGADMIN_PASSWORD="admin"

    DATABASE_URL="postgres://admin:admin@postgres:5432/CrudProject"

## APÓS A INSTALAÇÃO DE DEPENDÊNCIAS, RODE O O COMANDO

    docker compose up -d --build

## AUTOR
- [@Tiago-Dev0708](https://github.com/Tiago-Dev0708)

## COLABORADOR
- [@Rodrigo-Kelven](https://github.com/Rodrigo-Kelven)
