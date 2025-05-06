from fastapi import FastAPI
from tortoise.contrib.fastapi import register_tortoise
from Api.database.connection import TORTOISE_ORM
from Api.routers.projects import router



app = FastAPI()

app.include_router(router)


register_tortoise(
    app,
    config=TORTOISE_ORM,
    generate_schemas=True,
    add_exception_handlers=True
)


