from Api.database.models.projects import Project
from Api.schemas.projects import ProjectCreate
from tortoise.exceptions import DoesNotExist

class ProjectService:

    @staticmethod
    async def create_project(data: ProjectCreate) -> Project:
        return await Project.create(**data.model_dump())

    @staticmethod
    async def get_project_by_id(project_id: int) -> Project | None:
        try:
            return await Project.get(id=project_id)
        except DoesNotExist:
            return None

    @staticmethod
    async def list_projects() -> list[Project]:
        return await Project.all()

    @staticmethod
    async def delete_project(project_id: int):
        try:
            await Project.filter(id=project_id).delete()
        except DoesNotExist:
            return None
    
    
        
