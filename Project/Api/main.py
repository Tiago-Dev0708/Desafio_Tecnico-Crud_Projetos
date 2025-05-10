from fastapi import FastAPI
from tortoise.contrib.fastapi import register_tortoise
from Api.database.connection import TORTOISE_ORM
from Api.routers.projects import router

message_summary = "A Project Management API é uma interface de programação de aplicações (API) projetada para facilitar o gerenciamento de projetos dentro de sistemas digitais." \
"Ela permite a integração e manipulação de dados relacionados a projetos, como a criação, leitura, atualização e exclusão de informações sobre projetos em um sistema."

app = FastAPI(
    title="Project Management API",
    summary=message_summary,
    version="1.0.2",
    openapi_url = "/openapi.json",
)

app.include_router(router)


register_tortoise(
    app,
    config=TORTOISE_ORM,
    generate_schemas=True,
    add_exception_handlers=True
)


