from pydantic import BaseModel, Field
from datetime import datetime

class ProjectCreate(BaseModel):
    name: str
    description: str
    status: str = "active"
    created_at: datetime = Field(default_factory=datetime.now)


class UserOut(ProjectCreate):
    id: int

    model_config = {
        "from_attributes": True 
    }

class StandardResponse(BaseModel):
    message: str
    
