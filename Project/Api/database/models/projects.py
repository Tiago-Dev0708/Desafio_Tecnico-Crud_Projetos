from tortoise.models import Model
from tortoise import fields
from datetime import datetime

class Project(Model):
    id = fields.IntField(primary_key=True, autoincrement=True, index=True)
    name = fields.TextField(max_lenght=120, nullable=False)
    description = fields.TextField()
    status = fields.TextField(default="active")
    created_at = fields.DatetimeField(default=datetime.now())

