from fastapi import FastAPI
from tortoise.contrib.fastapi import register_tortoise
from Api.database.connection import TORTOISE_ORM
from Api.routers.projects import router



app = FastAPI()

# Include the router from the projects module
app.include_router(router)

@app.get("/")
async def root():
    return {"message": "Hello World"}



register_tortoise(
    app,
    config=TORTOISE_ORM,
    generate_schemas=True,
    add_exception_handlers=True
)


