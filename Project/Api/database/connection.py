from Api.core import config

TORTOISE_ORM = {
    "connections": {
        "default": config.DATABASE_URL
    },
    "apps": {
        "models": {
            "models": ["Api.database.models.projects"],
            "default_connection": "default",
        },
    },
}

