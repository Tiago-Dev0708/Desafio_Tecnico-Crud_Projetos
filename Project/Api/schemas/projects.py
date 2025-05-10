from pydantic import BaseModel

class ProjectCreate(BaseModel):
    name: str
    description: str
    status: str = "active"


class UserOut(ProjectCreate):
    id: int

    model_config = {
        "from_attributes": True 
    }

class StandardResponse(BaseModel):
    message: str
    

class ProjectResponse(UserOut):
    id: int
    name: str
    description: str
    status: str = "active"
